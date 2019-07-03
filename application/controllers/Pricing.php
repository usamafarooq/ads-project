<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Pricing_plan_model');
    }

	public function index()
	{
		$this->data['title'] = 'Pricing Plan';
		$this->data['pricing_plan'] = $this->Pricing_plan_model->all_rows('pricing_plan');
		$this->load->front_template('pricing',$this->data);
	}

}