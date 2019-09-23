<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->module = 'user';
        $this->user_type = $this->session->userdata('user_type');
        $this->id = $this->session->userdata('user_id');
        $this->permission = $this->get_permission($this->module,$this->user_type);
    }

    public function index()
    {
        if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
        {
            redirect('admin/home');
        }
        $this->data['title'] = 'Users';
        if ( $this->permission['view_all'] == '1'){
            $this->data['users'] = $this->User_model->get_users();
        }
        elseif ($this->permission['view'] == '1') {
            $this->data['users'] = $this->User_model->get_users($this->id);
        }

        $this->data['permission'] = $this->permission;
        $this->load->template('admin/user/index',$this->data);
    }

    public function create()
    {
        if ( $this->permission['created'] == '0') 
        {
            redirect('admin/home');
        }
        $this->data['title'] = 'Create User';
        $this->data['role'] = $this->User_model->all_rows('user_type');
        $this->load->template('admin/user/create',$this->data);
    }

    public function insert()
    {
        if ( $this->permission['created'] == '0') 
        {
            redirect('admin/home');
        }
        $data = $this->input->post();
        $username = $this->User_model->get_row_single('users',array('username'=>$data['username']));
        if (!empty($username)) {
            $this->session->set_flashdata('error', 'Username Already Exist');
            redirect("admin/users/create");
        }
        $email = $this->User_model->get_row_single('users',array('email'=>$data['email']));
        if (!empty($email)) {
            $this->session->set_flashdata('error', 'Email Already Exist');
            redirect("admin/users/create");
        }
        $data['password'] = md5($data['password']);
        $id = $this->User_model->insert('users',$data);
        if ($id) {
            redirect('admin/users');
        }
    }

    public function edit($id)
    {
        if ($this->permission['edit'] == '0') 
        {
            redirect('admin/home');
        }
        $this->data['title'] = 'Edit Module';
        $this->data['user'] = $this->User_model->get_row_single('users',array('id'=>$id));
        $this->data['role'] = $this->User_model->all_rows('user_type');
        $this->load->template('admin/user/edit',$this->data);
    }

    public function update()
    {
        if ( $this->permission['edit'] == '0') 
        {
            redirect('admin/home');
        }
        $data = $this->input->post();
        $id = $data['id'];
        unset($data['id']);
        if (!empty($data['password'])) {
            $data['password'] = md5($data['password']);
        }
        else{
            unset($data['password']);
        }
        $id = $this->User_model->update('users',$data,array('id'=>$id));
        if ($id) {
            redirect('admin/users');
        }
    }

    public function delete($id)
    {
        if ( $this->permission['deleted'] == '0') 
        {
            redirect('admin/home');
        }
        $this->User_model->delete('users',array('id'=>$id));
        redirect('admin/users');
    }

    public function status($user_id, $status)
    {
        $data = ['status' => ucfirst($status)];
        $this->User_model->update('users', $data, ['id' => $user_id]);
        $this->session->set_flashdata('success', 'Successfully updated');
        if ($status == 'approved') {
            $user = $this->User_model->get_row_single('users', ['id' => $user_id]);
            
            $planuser = $this->User_model->get_row_single('plan_user', ['user_id' => $user_id]);
            
            if($planuser['expire_at'] == 0){
                $plan = $this->User_model->get_row_single('pricing_plan', ['id' => $planuser['pricing_plan_id']]);
                print_r($plan['Duration']);

                $expirydate = ['expire_at' => date('Y-m-d', strtotime("+".$plan['Duration']." months", strtotime($planuser['created_at'])))];
                $this->User_model->update('plan_user', $expirydate, ['user_id' => $user_id]);
            }
            $template = $this->load->view('email/approved', $user, TRUE);
            send_mail(NULL, $user['email'], 'Account Confirmation', $template);
        }
        redirect('admin/users');
    }

    // Database Expiry Date Of All Approved Users has been updated
    public function updateExpiryDateAllApprovedUsers(){
        $aproved_users = $this->User_model->all_rows('users');

        for($i = 0; $i < sizeof($aproved_users); $i++){
            $user_id = $aproved_users[$i]['id'];

            $planuser = $this->User_model->get_row_single('plan_user', ['user_id' => $user_id]);
            
            if($planuser['expire_at'] == 0){

                $plan = $this->User_model->get_row_single('pricing_plan', ['id' => $planuser['pricing_plan_id']]);

                $expirydate = ['expire_at' => date('Y-m-d', strtotime("+".$plan['Duration']." months", strtotime($planuser['created_at'])))];

                $this->User_model->update('plan_user', $expirydate, ['user_id' => $user_id]);

            }
        }
        


    }
}