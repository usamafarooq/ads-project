<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clickads extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Ads_model');
        $this->load->model('User_model');
        if ($this->session->userdata('role') != 2 ) {
        	redirect('/','refresh');
        }
    }

	public function index()
	{
		
		$user_id = $this->session->userdata('id');
		$user = $this->User_model->get_users($user_id)[0];
		$this->db->select('ad_id')
		        ->from('user_ads_view')
		        ->where('user_id', $user['id'])
		        ->where('created_at >=', date('Y-m-d'))
		        ->where('created_at <=', date('Y-m-d 23:59:59'));
		$query = $this->db->get()->result();

		$limit = $user['Daily_Ads'] - count($query);
		$this->data['limit'] = ($limit <= 0 ) ? 0 : $limit;


		$this->data['user'] = $user;
		$this->data['title'] = 'Ads List';
		$this->data['ads'] = $this->Ads_model->get_available_for_user($user, $this->data['limit']);
		$this->load->front_template('ads/index',$this->data);

	}

	public function view($id)
	{
		if ($this->session->userdata('status') != 'Approved') {
			$this->session->set_flashdata('error', 'Your account is not approved');
			redirect('/clickads');
		}
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
		$referrer_amount = 0;
		if (!empty($user[0]['referrer'])) {
			$referrer = $this->User_model->get_referer_user_data( $user[0]['referrer'] );
			if (!empty($referrer)) {
				$referrer_amount = $referrer['Refer_Click_Price'];
			}
		}

		
		$data = [
			'user_id' => $user_id,
			'ad_id' => $id,
			'amount' => $user[0]['Click_Price'],
			'referrer_amount' => $referrer_amount,
			'created_at' => date('Y-m-d H:i:s')
		];
		
		$this->db->set('amount', 'amount+'.$user[0]['Click_Price'], FALSE);
		$this->db->where('id', $user_id);
		$this->db->update('users');

		if (!empty($user[0]['referrer'])) {
			$this->db->set('amount', 'amount+'.$referrer_amount, FALSE);
			$this->db->where('email', $user[0]['referrer']);
			$this->db->update('users');
		}

		$this->User_model->insert('user_ads_view', $data);
		echo json_encode(['status' => 200]);
	}


	public function checkViewedAds()
	{
		$user_id = $this->session->userdata('id');
		$user = $this->User_model->get_users($user_id)[0];
		$this->session->set_userdata('status', $user['status']);
		$response = $this->Ads_model->checkViewedAds($user_id, date('Y-m-d'));
		$available_limit = $user['Daily_Ads'] - count($response);
		if ($available_limit <= 0) {
			$available_limit = 0;
		}
		echo json_encode(['status' => 200, 'data' => $response, 'available_limit' => $available_limit]);
		
	}



}