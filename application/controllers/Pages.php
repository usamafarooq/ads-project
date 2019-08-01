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
		$this->data['title'] = 'Learn About Our Company | Click Pay Earn.';
		$this->data['description'] = 'Want to Earn easy money online? Contact Click Pay Earn and get paid on each ad you view.';
		$this->load->front_template('pages/about',$this->data);
	}

	public function Terms()
	{
		$this->data['title'] = 'Terms';
		$this->load->front_template('pages/terms',$this->data);
	}

	public function Contact()
	{
		if ($this->input->post()) {
			$template = "Name: {$this->input->post('name')} <br>";
			$template .= "From: {$this->input->post('email')} <br>";
			$template .= $this->input->post('message');
			send_mail($from = null, 'info@clickpayearn.com', $this->input->post('subject').' - Contact Form', $template, $data = []);
			echo 'success'; die();
		}
		$this->data['title'] = 'Contact Us';
		$this->load->front_template('pages/contact',$this->data);
	}

	public function thankyou()
	{
		$this->data['title'] = 'Thankyou';
		$this->load->front_template('pages/thankyou',$this->data);
	}

}