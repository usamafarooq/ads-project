<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->module = 'role';
        $this->user_type = $this->session->userdata('user_type');
        $this->id = $this->session->userdata('user_id');
        $this->permission = $this->get_permission($this->module,$this->user_type);
    }

    public function index()
	{
		if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Roles';
		if ( $this->permission['view_all'] == '1'){
			$this->data['roles'] = $this->Role_model->all_rows('user_type');
		}
		elseif ($this->permission['view'] == '1') {
			$this->data['roles'] = $this->Role_model->get_rows('user_type',array('user_id'=>$this->id));
		}
		$this->data['permission'] = $this->permission;
		$this->load->template('admin/role/index',$this->data);
	}

	public function create()
	{
		if ( $this->permission['created'] == '0') 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Create Role';
		$this->data['modules'] = $this->Role_model->all_rows('modules');
		$this->load->template('admin/role/create',$this->data);
	}

	public function insert()
	{
		if ( $this->permission['created'] == '0') 
		{
			redirect('admin/home');
		}
		$data['modules'] = $this->Role_model->all_rows('modules');
		$role = array(
			'name' => $this->input->post('role'),
			'user_id' => $this->session->userdata('user_id')
		);
		$user_type_id = $this->Role_model->insert('user_type',$role);
		$permission = [] ;
		foreach ($data['modules'] as $module) 
		{
			$permission[] = array(
				'user_type_id' => $user_type_id , 
				'user_id' => $this->session->userdata('user_id'), 
				'module_id' => $module['id'], 
				'view' => (isset($this->input->post($module['id'])['view'] )) ?1 : 0 , 
				'edit' => (isset($this->input->post($module['id'])['edit'] )) ?1 : 0 , 
				'deleted' => (isset($this->input->post($module['id'])['deleted'] )) ?1 : 0 , 
				'created' => (isset($this->input->post($module['id'])['created'] )) ?1 : 0 , 
				'view_all' => (isset($this->input->post($module['id'])['view_all'] )) ?1 : 0 ,
				'disable' => (isset($this->input->post($module['id'])['disable'] )) ?1 : 0 ,
			);
			
		}
		$this->Role_model->insert_batch('permission',$permission);
		redirect('admin/role');
	}

	public function edit($id)
	{
		if ($this->permission['edit'] == '0') 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Edit Role';
		$this->data['modules'] = $this->Role_model->all_rows('modules');
		$this->data['user_type'] = $this->Role_model->get_row_single('user_type',array('id'=>$id));
		$this->data['permission'] = $this->Role_model->get_rows('permission',array('user_type_id'=>$id));
		$this->load->template('admin/role/edit',$this->data);
	}

	public function update()
	{
		if ($this->permission['edit'] == '0') 
		{
			redirect('admin/home');
		}
		$data['modules'] = $this->Role_model->all_rows('modules');
		$role = array(
			'name' => $this->input->post('role')
		);
		$user_type_id = $this->input->post('role_id');
		$this->Role_model->delete('permission',array('user_type_id'=>$user_type_id));
		$permission = [] ;
		foreach ($data['modules'] as $module) 
		{
			$permission[] = array(
				'user_type_id' => $user_type_id , 
				'user_id' => $this->session->userdata('user_id'), 
				'module_id' => $module['id'], 
				'view' => (isset($this->input->post($module['id'])['view'] )) ?1 : 0 , 
				'edit' => (isset($this->input->post($module['id'])['edit'] )) ?1 : 0 , 
				'deleted' => (isset($this->input->post($module['id'])['deleted'] )) ?1 : 0 , 
				'created' => (isset($this->input->post($module['id'])['created'] )) ?1 : 0 , 
				'view_all' => (isset($this->input->post($module['id'])['view_all'] )) ?1 : 0 ,
				'disable' => (isset($this->input->post($module['id'])['disable'] )) ?1 : 0 ,
			);
			
		}
		$this->Role_model->insert_batch('permission',$permission);
		redirect('admin/role');
	}

	public function delete($id)
	{
		if ( $this->permission['deleted'] == '0') 
		{
			redirect('admin/home');
		}
		$this->Role_model->delete('user_type',array('id'=>$id));
		$this->Role_model->delete('permission',array('user_type_id'=>$id));
		redirect('admin/role');
	}
}