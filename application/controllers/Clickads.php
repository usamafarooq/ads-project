<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clickads extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Ads_model');
    }

	public function index()
	{
		$this->data['title'] = 'Ads List';
		$this->data['ads'] = $this->Ads_model->get_available_for_user();
		$this->load->front_template('ads/index',$this->data);

	}

	public function view($id)
	{
		$this->data['ads'] = $this->Ads_model->get_row_single('ads', ['id' => $id]);
		$this->data['title'] = $this->data['ads']['Name'];
		$this->load->front_template('ads/view',$this->data);
	}


	public function save_view()
	{
		
	}



}