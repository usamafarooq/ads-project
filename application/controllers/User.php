<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function signup()
	{
		$this->data['title'] = 'Signup';
		$this->data['pricing_plan'] = $this->User_model->all_rows('pricing_plan');
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
			$this->session->set_flashdata('success', 'Register successfully and waiting for admin approval');
			// redirect('user/signup','refresh');
		}
		$this->load->front_template('user/signup',$this->data);
	}


	public function login()
	{
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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}

}