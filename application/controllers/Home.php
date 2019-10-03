<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Pricing_plan_model');
        $this->load->model('Ads_model');
    }

	public function index()
	{
		$this->data['title'] = 'Earn Easy Money by Viewing Ads | Click Pay Earn';
		$this->data['description'] = 'Welcome to Click Pay Earn! We’re providing you the opportunity to earn as more money as you can by just viewing ads.';
		$this->data['slider'] = true;
		$this->data['pricing_plan'] = $this->Pricing_plan_model->all_rows('pricing_plan');
		$this->load->front_template('home',$this->data);
	}


	public function add_sub()
	{
		$email = $this->input->post('email');
		$this->Home_model->insert('newsletter', ['email' => $email]);
		echo json_encode(['status' => 200]);
	}


	public function remove_view_logs()
	{
		$affected = $this->Ads_model->remove_view_logs();
		echo $affected.' rows deleted';
	}

}