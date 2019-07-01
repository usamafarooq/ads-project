<?php
		    class Pricing_plan extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Pricing_plan_model');
	        $this->module = 'pricing_plan';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Pricing_plan';
			if ( $this->permission['view_all'] == '1'){$this->data['pricing_plan'] = $this->Pricing_plan_model->all_rows('pricing_plan');}
			elseif ($this->permission['view'] == '1') {$this->data['pricing_plan'] = $this->Pricing_plan_model->get_rows('pricing_plan',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/pricing_plan/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Pricing_plan';$this->load->template('admin/pricing_plan/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Pricing_plan_model->insert('pricing_plan',$data);
			if ($id) {
				redirect('admin/pricing_plan');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Pricing_plan';
			$this->data['pricing_plan'] = $this->Pricing_plan_model->get_row_single('pricing_plan',array('id'=>$id));$this->load->template('admin/pricing_plan/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Pricing_plan_model->update('pricing_plan',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/pricing_plan');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Pricing_plan_model->delete('pricing_plan',array('id'=>$id));
			redirect('admin/pricing_plan');
		}}