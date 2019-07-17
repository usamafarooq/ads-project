<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Pricing_plan_model');
        if ($this->session->userdata('role') == 2) {
        	redirect('/','refresh');
        }
    }

	public function index()
	{
		$this->data['title'] = 'Convenient Pricing Packages with Maximum Return | Click Pay Earn';
		$this->data['description'] = 'Get yourself registered at Click Pay Earn in most affordable prices and get huge amount of return.';

		$this->data['pricing_plan'] = $this->Pricing_plan_model->all_rows('pricing_plan');
		$this->load->front_template('pricing',$this->data);
	}

}