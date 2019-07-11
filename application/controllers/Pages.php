<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

	public function About()
	{
		$this->data['title'] = 'About Us';
		$this->load->front_template('pages/about',$this->data);
	}

	public function Terms()
	{
		$this->data['title'] = 'Terms';
		$this->load->front_template('pages/terms',$this->data);
	}

	public function Contact()
	{
		$this->data['title'] = 'Contact Us';
		$this->load->front_template('pages/contact',$this->data);
	}

}