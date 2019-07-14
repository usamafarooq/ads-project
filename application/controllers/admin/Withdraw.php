<?php
		    class Withdraw extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Withdraw_model');
	        $this->module = 'withdraw';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Withdraw';
			if ( $this->permission['view_all'] == '1'){$this->data['withdraw'] = $this->Withdraw_model->get_withdraw();}
			elseif ($this->permission['view'] == '1') {$this->data['withdraw'] = $this->Withdraw_model->get_withdraw($this->id);}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/withdraw/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Withdraw';$this->data['table_users'] = $this->Withdraw_model->all_rows('users');$this->load->template('admin/withdraw/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Withdraw_model->insert('withdraw',$data);
			if ($id) {
				redirect('admin/withdraw');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Withdraw';
			$this->data['withdraw'] = $this->Withdraw_model->get_row_single('withdraw',array('id'=>$id));$this->data['table_users'] = $this->Withdraw_model->all_rows('users');$this->load->template('admin/withdraw/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Withdraw_model->update('withdraw',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/withdraw');
			}
		}
		public function approve($id)
		{
			$id = $this->Withdraw_model->update('withdraw',array('Status'=>'Approve', 'approve_date'=>date('Y-m-d H:i:s')),array('id'=>$id));
			if ($id) {

				$withdraw = $this->User_model->get_row_single('withdraw',array('id'=>$id));
				$user = $this->User_model->get_row_single('users',array('id'=>$withdraw['User']);
				$template = $this->load->view('email/withdraw_request_approved', $user, TRUE);
				send_mail(NULL, $user['email'], 'Withdraw request Approved', $template);
				
				$this->session->set_flashdata('success', 'Record updated');
				redirect('admin/withdraw');
			}
		}
		public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Withdraw_model->delete('withdraw',array('id'=>$id));
			redirect('admin/withdraw');
		}}