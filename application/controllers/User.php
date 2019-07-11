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


		$this->data['title'] = 'Signup';
		$this->data['pricing_plan'] = $this->User_model->all_rows('pricing_plan');

		 $rules =
		 	[
		        [
	                'field' => 'first_name',
	                'label' => 'First name',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 'last_name',
	                'label' => 'Last name',
	                'rules' => 'required'
		        ],

		        [
	                'field' => 'username',
	                'label' => 'Username',
	                'rules' => 'required|is_unique[users.username]'
		        ],
		        [
	                'field' => 'phone',
	                'label' => 'Mobile No',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 're_email',
	                'label' => 'Re-Type Email',
	                'rules' => 'required|matches[email]'
		        ],
		        [
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 'con_password',
	                'label' => 'Confirm Password',
	                'rules' => 'required|matches[password]'
		        ],

		        [
	                'field' => 'cnic',
	                'label' => 'CNIC',
	                'rules' => 'required|matches[password]'
		        ],
		        [
	                'field' => 'jazz_no',
	                'label' => 'jazz Cash',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 'city_id',
	                'label' => 'city',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 'package',
	                'label' => 'package',
	                'rules' => 'required'
		        ],
		        [
	                'field' => 'terms',
	                'label' => 'terms',
	                'rules' => 'required'
		        ],
		    ];

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
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
			$this->session->set_flashdata('success', 'Register successfully and waiting for admin approval');
			redirect('user/signup','refresh');
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
			if ($user['status'] == 'Pending') $message = 'Your account will be active when admin will approve your account';
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