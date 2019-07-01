<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Modules_model');
        $this->module = 'modules';
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
		$this->data['title'] = 'Modules';
		if ( $this->permission['view_all'] == '1'){
			$this->data['modules'] = $this->Modules_model->all_rows('modules');
		}
		elseif ($this->permission['view'] == '1') {
			$this->data['modules'] = $this->Modules_model->get_rows('modules',array('user_id'=>$this->id));
		}
		$this->data['permission'] = $this->permission;
		$this->load->template('admin/module/index',$this->data);
	}

	public function create()
	{
		if ( $this->permission['created'] == '0') 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Create Module';
		$this->load->template('admin/module/create',$this->data);
	}

	public function insert()
	{
		if ( $this->permission['created'] == '0') 
		{
			redirect('admin/home');
		}
		$data = $this->input->post();
		$data['user_id'] = $this->session->userdata('user_id');
		$id = $this->Modules_model->insert('modules',$data);
		if ($id) {
			redirect('admin/modules/fileds/'.$id);
		}
	}

	public function get_colume($table)
	{
		$result = $this->Modules_model->query('SHOW COLUMNS FROM '.$table)->result_array();
		echo json_encode($result);
	}

	public function fileds($id)
	{
		if ( $this->permission['created'] == '0') 
		{
			redirect('admin/home');
		}
		$this->data['tables'] = $this->db->list_tables();
		$this->data['id'] = $id;
		$this->data['title'] = 'Create Fileds';
		$this->load->template('admin/module/fileds',$this->data);
	}

	public function fields_insert()
	{
		$id = $this->input->post('module_id');
		$module = $this->Modules_model->get_row_single('modules',array('id'=>$id));
		$tablename = $module['main_name'];
		$tablename = str_replace(" ","_",$tablename);
		$url = $module['url'];
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$filed_type = $this->input->post('filed-type');
		$options = $this->input->post('options');
		$length = $this->input->post('length');
		$required = $this->input->post('required');
		$relation = $this->input->post('relation_table');
		$table = $this->input->post('table');
		$relation_column = $this->input->post('relation');
		$against_column = $this->input->post('against');
		$value_column = $this->input->post('value');
		for ($i=0; $i < sizeof($name); $i++) {
			if ($relation == 'yes') {
			 	$key = array_search($name[$i], $against_column);
		        if (array_key_exists($key,$against_column)) {
		          	$is_relation = '1';
		          	$is_table = $table[$key];
		          	$is_relation_column = $relation_column[$key];
		          	$is_value_column = implode(',', $value_column[$key]);
		        }
		        else{
		        	$is_relation = '0';
			        $is_table = NULL;
			        $is_relation_column = NULL;
			        $is_value_column = NULL;
		        }
			}
			else{
				$is_relation = '0';
		        $is_table = NULL;
		        $is_relation_column = NULL;
		        $is_value_column = NULL;
			} 
			$text = str_replace(" ","_",$name[$i]);
			$fileds[] = array(
				'name' => $text, 
				'type' => $type[$i], 
				'filed_type' => $filed_type[$i], 
				'options' => $options[$i], 
				'length' => $length[$i], 
				'required' => (isset($required[$i])) ? 1 : 0, 
				'module_id' => $id, 
				'is_relation' => $is_relation, 
				'relation_table' => $is_table, 
				'relation_column' => $is_relation_column, 
				'value_column' => $is_value_column, 
			);
			$filed[$i] = $text;
			$filed[$i] .= ' '.$type[$i];
			if ($type[$i] != 'DATE') {
				$filed[$i] .= '('.$length[$i].')';
			}
			$filed[$i] .= (isset($required[$i])) ? ' NOT NULL' : ' NULL';
		}
		$this->Modules_model->insert_batch('modules_fileds',$fileds);
		$query = 'CREATE TABLE IF NOT EXISTS '.$tablename.' (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, '.implode(',', $filed).', user_id int(11) NOT NULL, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';
		$q = $this->Modules_model->query($query);
		$this->create_module($url.'_model',$fileds,$tablename);
		$this->create_controller($url,$url.'_model',$tablename,$fileds);
		$this->create_folder($url);
		$this->create_main_view($url,$url.'_model',$tablename,$fileds);
		$this->create_create_view($url,$url.'_model',$tablename,$fileds);
		$this->create_edit_view($url,$url.'_model',$tablename,$fileds);
		redirect('admin/modules');
	}

	public function edit($id)
	{
		if ($this->permission['edit'] == '0') 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Edit Module';
		$this->data['module'] = $this->Modules_model->get_row_single('modules',array('id'=>$id));
		$this->load->template('admin/module/edit',$this->data);
	}

	public function update()
	{
		if ( $this->permission['edit'] == '0') 
		{
			redirect('admin/home');
		}
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$id = $this->Modules_model->update('modules',$data,array('id'=>$id));
		if ($id) {
			redirect('admin/modules');
		}
	}

	public function delete($id)
	{
		if ( $this->permission['deleted'] == '0') 
		{
			redirect('admin/home');
		}
		$this->Modules_model->delete('modules',array('id'=>$id));
		redirect('admin/modules');
	}

}