<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->module = 'dashboard';
        $this->user_type = $this->session->userdata('user_type');
        $this->permission = $this->get_permission($this->module,$this->user_type);
    }

	public function index()
	{
		if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Dashboard';
		$this->load->template('admin/home',$this->data);
	}

}