<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Register_model');
    }

	public function index()
	{
		$data['role'] = $this->Register_model->all_rows('user_type');
		$this->load->view('admin/register',$data);
	}

	public function is_login()
	{
		if ($this->session->userdata('user_id')) {
			redirect("admin/home");
		}
	}

	public function insert_user()
	{
		$data = $this->input->post();
		$username = $this->Register_model->get_row_single('users',array('name'=>$data['name']));
		if (!empty($username)) {
			$this->session->set_flashdata('error', 'Username Already Exist');
			redirect("admin/Register");
		}
		$email = $this->Register_model->get_row_single('users',array('email'=>$data['email']));
		if (!empty($email)) {
			$this->session->set_flashdata('error', 'Email Already Exist');
			redirect("admin/Register");
		}
		$data['password'] = md5($data['password']);
		$id = $this->Register_model->insert('users',$data);
		if ($id) {
			redirect('admin/login');
		}
	}
}