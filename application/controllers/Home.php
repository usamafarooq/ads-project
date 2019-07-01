<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

	public function index()
	{
		$this->data['title'] = 'Dashboard';
		$this->load->front_template('home',$this->data);
	}

}