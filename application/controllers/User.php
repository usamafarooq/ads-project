<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');

    }

	public function signup()
	{
		if ($this->session->userdata('role') == 2) {
        	redirect('/','refresh');
        }
        $this->data['cities'] = $this->db->where_in('state_id', ['2723', '2724', '2725', '2726', '2727', '2728', '2729'])->get('cities')->result_array();
        

		$this->data['title'] = 'Signup';
		$this->data['pricing_plan'] = $this->User_model->all_rows('pricing_plan');
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
		if ($this->form_validation->run()) {
		
			if ($this->input->post()) {
				$package = $this->input->post('package');
				$data = $this->input->post();
				unset($data['package'], $data['re_email'], $data['con_password'], $data['terms']);
				$data['password'] = md5($data['password']);
				$data['role'] = 2;
				$user_id = $this->User_model->insert('users', $data);
				$data = [
					'user_id' => $user_id,
					'pricing_plan_id' => $package,
				];
				$this->User_model->insert('plan_user', $data);
				$template = $this->load->view('email/signup', $data, TRUE);
				send_mail(NULL, $data['email'], 'Signup', $template);
				$this->session->set_flashdata('success', 'Register successfully and waiting for admin approval');
				redirect('user/signup','refresh');
			}
		}
		$this->load->front_template('user/signup',$this->data);
	}


	public function login()
	{
		if ($this->session->userdata('role') == 2) {
        	redirect('/','refresh');
        }
		$this->data['title'] = 'Login';
		// $this->data['pricing_plan'] = $this->User_model->all_rows('pricing_plan');
		if ($this->input->post()) {
			$user = $this->User_model->get_row_single('users', ['email' => $this->input->post('email')]);
			if (empty($user)) {
				$message = 'Incorrect Email address';
				$this->session->set_flashdata('error', $message);
				redirect('user/login','refresh');
			}
			if ($user['status'] == 'Pending'){
				$created_at = date_create(date('Y-m-d', strtotime($user['created_at'])));
				$today = date_create(date('Y-m-d'));

				if (date_diff($created_at, $today)->days > 5 ) {
					$message = 'Your account will be active when admin will approve your account';
				}
			} 
			if ($user['status'] == 'Inactive') $message = 'Your account is Inactive please contact admin to active your account';
			if ($user['password'] != md5($this->input->post('password'))) $message = 'Incorrect Password';
			if (!empty($message)) {
				$this->session->set_flashdata('error', $message);
				redirect('user/login','refresh');
			}

			$this->session->set_userdata($user);
			redirect('/clickads','refresh');
		}
		$this->load->front_template('user/login',$this->data);
	}

	public function edit()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
        $this->data['cities'] = $this->db->where_in('state_id', ['2723', '2724', '2725', '2726', '2727', '2728', '2729'])->get('cities')->result_array();
		$this->data['title'] = 'Edit Profile';
		$id = $this->session->userdata('id');
		if ($this->input->post()) {
        	$data = $this->input->post();
        	unset($data['con_password']);
        	if (!empty($data['password'])) {
        		$data['password'] = md5($data['password']);
        	}
        	else{
        		unset($data['password']);
        	}
        	$this->User_model->update('users',$data,array('id'=>$id));
        	$this->session->set_flashdata('success', 'profile has been updated');
        	redirect('user/edit');
        }
		$this->data['user'] = $this->User_model->get_row_single('users',array('id'=>$id));
		$this->load->front_template('user/edit',$this->data);
	}

	public function referrals()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
		$email = $this->session->userdata('email');
		$this->data['title'] = 'My Referrals';
		$this->data['users'] = $this->User_model->get_referrer($email);
		$this->load->front_template('user/referrals',$this->data);
	}

	public function payments()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
		$id = $this->session->userdata('id');
		$this->data['title'] = 'Payment History';
		$this->data['payments'] = $this->User_model->get_rows('withdraw',array('User'=>$id));
		$this->load->front_template('user/payments',$this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}

}