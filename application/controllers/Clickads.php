<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clickads extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Ads_model');
        $this->load->model('User_model');
        if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
    }

	public function index()
	{
		$user_id = $this->session->userdata('id');
		$user = $this->User_model->get_users($user_id);
		$this->data['title'] = 'Ads List';
		$this->data['ads'] = $this->Ads_model->get_available_for_user($user[0]);
		$this->load->front_template('ads/index',$this->data);

	}

	public function view($id)
	{
		$this->data['ads'] = $this->Ads_model->get_row_single('ads', ['id' => $id]);
		$this->data['title'] = $this->data['ads']['Name'];
		$this->load->view('ads/view', $this->data);
		// $this->load->front_template('ads/view',$this->data);
	}


	public function save_view()
	{
		$id = $this->input->post('id');
		$user_id = $this->session->userdata('id');
		$user = $this->User_model->get_users($user_id);
		$this->db->set('total_clicked', 'total_clicked+1', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ads');
		$data = [
			'user_id' => $user_id,
			'ad_id' => $id,
			'amount' => $user[0]['Click_Price'],
			'referrer_amount' => $user[0]['Refer_Click_Price']
		];
		
		$this->db->set('amount', 'amount+'.$user[0]['Click_Price'], FALSE);
		$this->db->where('id', $user_id);
		$this->db->update('users');

		if (!empty($user[0]['referrer'])) {
			$this->db->set('amount', 'amount+'.$user[0]['Refer_Click_Price'], FALSE);
			$this->db->where('id', $user_id);
			$this->db->update('users');
		}

		$this->User_model->insert('user_ads_view', $data);
		echo json_encode(['status' => 200]);
	}


	public function checkViewedAds()
	{
		$user_id = $this->session->userdata('id');
		$response = $this->Ads_model->checkViewedAds($user_id, date('Y-m-d'));
		echo json_encode(['status' => 200, 'data' => $response]);
		
	}



}