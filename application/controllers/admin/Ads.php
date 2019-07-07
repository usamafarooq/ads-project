<?php
		    class Ads extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Ads_model');
	        $this->module = 'ads';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Ads';
			if ( $this->permission['view_all'] == '1'){$this->data['ads'] = $this->Ads_model->all_rows('ads');}
			elseif ($this->permission['view'] == '1') {$this->data['ads'] = $this->Ads_model->get_rows('ads',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/ads/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Ads';$this->load->template('admin/ads/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$config['upload_path']          = './uploads/';
					                $config['allowed_types']        = '*';
					                $config['max_size']             = 1000;
					                $config['max_width']            = 1024;
					                $config['max_height']           = 768;

					                $this->load->library('upload', $config);

					                if ( $this->upload->do_upload('image'))
					                {
					                        $data['image'] = '/uploads/'.$this->upload->data('file_name');
					                }
					                $id = $this->Ads_model->insert('ads',$data);
			if ($id) {
				redirect('admin/ads');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Ads';
			$this->data['ads'] = $this->Ads_model->get_row_single('ads',array('id'=>$id));$this->load->template('admin/ads/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$config['upload_path']          = './uploads/';
					                $config['allowed_types']        = 'file';
					                $config['max_size']             = 1000;
					                $config['max_width']            = 1024;
					                $config['max_height']           = 768;

					                $this->load->library('upload', $config);

					                if ( $this->upload->do_upload('image'))
					                {
					                        $data['image'] = '/uploads/'.$this->upload->data('file_name');
					                }
					                $id = $this->Ads_model->update('ads',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/ads');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Ads_model->delete('ads',array('id'=>$id));
			redirect('admin/ads');
		}}