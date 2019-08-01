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
		$this->data['user'] = $this->User_model->get_row_single('users',array('id'=>$id));
		$this->load->front_template('withdraw',$this->data);
	}

	public function cash()
	{
		$id = $this->session->userdata('id');
		$user = $this->User_model->get_row_single('users',array('id'=>$id));
		$amount = round($user['amount']);
		$data = array(
			'User' => $id,
			'Amount' => $amount,
			'Status' =>'Pending'
		);
		$withdraw_id = $this->User_model->insert('withdraw', $data);
		$this->User_model->update('users',array('amount'=>0),array('id'=>$id));

		$template = $this->load->view('email/withdraw_request', $user, TRUE);
		send_mail(NULL, $user['email'], 'Withdrawal Request', $template);
		$this->session->set_flashdata('success', 'Your withdraw request generated successfully');
		redirect('withdraw');
	}

}