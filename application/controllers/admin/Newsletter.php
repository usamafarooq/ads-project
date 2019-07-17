<?php
		    class Newsletter extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Newsletter_model');
	        $this->module = 'Newsletter';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Newsletter';
			if ( $this->permission['view_all'] == '1' || $this->permission['view'] == '1')
			{
				$this->db->select('id, Email')->from('newsletter');
				$this->data['newsletter'] = $this->db->group_by('Email')->get()->result_array();
			}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/newsletter/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Newsletter';$this->load->template('admin/newsletter/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Newsletter_model->insert('Newsletter',$data);
			if ($id) {
				redirect('admin/newsletter');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Newsletter';
			$this->data['newsletter'] = $this->Newsletter_model->get_row_single('Newsletter',array('id'=>$id));$this->load->template('admin/newsletter/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Newsletter_model->update('Newsletter',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/newsletter');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Newsletter_model->delete('Newsletter',array('id'=>$id));
			redirect('admin/newsletter');
		}}