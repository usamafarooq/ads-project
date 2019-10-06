<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{
		$this->data['title'] = 'Withdraw Cash';
		$id = $this->session->userdata('id');
		// $this->data['user'] = $this->User_model->get_row_single('users',array('id'=>$id));
		// $this->data['user'] = $user = $this->User_model->get_users($id)[0];
		$this->load->front_template('withdraw',$this->data);
	}

	public function cash()
	{
		$id = $this->session->userdata('id');
		$user = $this->User_model->get_users($id)[0];
		$amount = round($user['amount']);
		if ($user['amount'] >= $user['withdraw_limit']) {
			if (is_open() == false){
				$this->session->set_flashdata('error', 'Withdraw time is 10:30 AM - 09:00 PM' );
			}
			$data = array(
				'User' => $id,
				'Amount' => $amount,
				'Status' =>'Pending',
				'withrawal_type' => $user['withrawal_type'],
				'account_number' => $user['account_number'],
			);
			$withdraw_id = $this->User_model->insert('withdraw', $data);
			$this->User_model->update('users',array('amount'=>0),array('id'=>$id));

			$this->session->set_userdata(['amount' => 0]);

			$template = $this->load->view('email/withdraw_request', $user, TRUE);
			send_mail(NULL, $user['email'], 'Withdrawal Request', $template);
			$this->session->set_flashdata('success', 'Your withdraw request generated successfully');
		}
		else{
			$this->session->set_flashdata('error', 'you cannot withdraw because Your amount is lower then Rs.'.$this->session->userdata('withdraw_limit') );	
		}
		redirect('withdraw');
	}

}