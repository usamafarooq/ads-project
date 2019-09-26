<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->module = 'user';
        $this->load->library('form_validation');
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
        $this->data['cities'] = $this->User_model->all_rows('cities');
        $this->data['packages'] = $this->User_model->all_rows('pricing_plan');
        $this->data['plan_user'] = $this->User_model->get_row_single('plan_user', array('user_id'=>$id));
        $this->data['pricing_plan'] = $this->User_model->get_row_single('pricing_plan', array('id'=> $this->data['plan_user']['pricing_plan_id']));
        $this->load->template('admin/user/edit',$this->data);
    }

    public function update()
    {
        if ( $this->permission['edit'] == '0') 
        {
            redirect('admin/home');
        }
        if($this->input->post('user_role') == "Admin"){
	        $data = $this->input->post();
	        unset($data['user_role']);
	        if (!empty($data['password'])) {
	            $data['password'] = md5($data['password']);
	        }
	        else{
	            unset($data['password']);
	        }
	        $id = $data['id'];
	        $id = $this->User_model->update('users',$data,array('id'=>$id));
	        if ($id) {
	            redirect('admin/users');
	        }	
        } else if($this->input->post('user_role') == "User"){
        	$data = $this->input->post();
        	unset($data['user_role']);
        	unset($data['package']);
        	if (!empty($data['password'])) {
	            $data['password'] = md5($data['password']);
	        }
	        else{
	            unset($data['password']);
	        }
	        $this->form_validation->set_rules('referrer', 'Referrer Email	', 'callback_referrer_check');
			if ($this->form_validation->run() == false) {
				$this->edit($data['id']);
			} else {
                $plan_user_packages = ['expire_at'=>$data['expire_at'], 'pricing_plan_id'=>$data['pricing_plan_id']];
				$this->User_model->update('plan_user',$plan_user_packages, ['user_id'=>$data['id']]);
	        	unset($data['expire_at']);
                unset($data['pricing_plan_id']);
	        	$this->User_model->update('users',$data, ['id'=>$data['id']]);
	        }
	        redirect('admin/users');
        }

    }
    function referrer_check($str)
	{
		$field_value = $str; 

		$getReferrerUser = $this->User_model->get_row_single('users', ['email'=>$field_value, 'status'=> 'Approved']);

		if(count($getReferrerUser) > 0){
			$checkExpiry = $this->User_model->get_row_single('plan_user', ['user_id'=>$getReferrerUser['id']]);

			$plan_expiry_date = date_create(date('Y-m-d', strtotime($checkExpiry['expire_at'])));
			$today = date_create(date('Y-m-d'));

			$expiry = date_format($plan_expiry_date,"Y-m-d");
			$date_diff = date_diff($today, $plan_expiry_date);
			if ($date_diff->days == 0 || $date_diff->invert == 1) {
				$this->form_validation->set_message('referrer_check','{field} is Expired!');
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			$this->form_validation->set_message('referrer_check','{field} is Not Exist!');
			return FALSE;
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