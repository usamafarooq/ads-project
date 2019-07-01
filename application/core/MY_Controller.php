<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('Main_model');
		$this->data['menus'] = $this->get_modules();
	}

	public function is_login()
	{
		if (!$this->session->userdata('user_id')) {
			redirect("login");
		}
	}

	public function get_modules()
	{
		$role = $this->session->userdata('user_type');
		$menu = $this->Main_model->get_menu($role);
		return $menu;
	}

	public function get_permission($module,$role)
    {
    	$permission = $this->Main_model->get_user_permission($module,$role);
        return $permission;
    }

    public function create_module($module_name,$fileds,$tablename)
    {
    	$file = $_SERVER['DOCUMENT_ROOT'].'/crud/application/models/'.ucfirst($module_name).'.php';
		if(!is_file($file)){
		    $contents = '<?php
		    ';
		    $contents .= 'class '.ucfirst($module_name).' extends MY_Model{

		    	';
		    $key = array_search('1', array_column($fileds, 'is_relation'));
		    if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$keys = array();
	        		foreach ($fileds as $f) {
						if ($f['is_relation'] == 1) {
							$column = explode(',', $f['value_column']);
							for ($i=0; $i < sizeof($column); $i++) { 
								$keys[] = $f['relation_table'].'.'.$column[$i];
							}
						}
					}
	        		$contents .= "public function get_".$tablename."(%id = null)
					{
						%this->db->select('".$tablename.".*,".implode(',', $keys)."')
								 ->from('".$tablename."')";
						foreach ($fileds as $f) {
							if ($f['is_relation'] == 1) {
								$contents .= "->join('".$f['relation_table']."', '".$f['relation_table'].".".$f['relation_column']." = ".$tablename.".".$f['name']."')";
							}
						}
						$contents .= "; if (%id != null) {
								%this->db->where('".$tablename.".user_id', %id);
							}";
						$contents .= "return %this->db->get()->result_array();
					}";
	        	}
	        }
		    $contents .= '}';
		    if ($key >= -1) {
			    if (array_key_exists($key,$fileds)) {
			    	$contents = str_replace("%","$",$contents);
			    }
			}
		    file_put_contents($file, $contents);
		}
    }

    public function create_controller($controller_name,$module_name,$tablename,$fileds)
    {
    	$file = $_SERVER['DOCUMENT_ROOT'].'/crud/application/admin/controllers/'.ucfirst($controller_name).'.php';
		if(!is_file($file)){
		    $contents = '<?php
		    ';
		    $contents .= 'class '.ucfirst($controller_name).' extends MY_Controller{

		    	';
		    $contents .= $this->create_construct($module_name,$tablename);	
		    $contents .= $this->create_index($controller_name,$tablename,$module_name,$fileds);	
		    $contents .= $this->create_create($controller_name,$tablename,$module_name,$fileds);
		    $contents .= $this->create_edit($controller_name,$tablename,$module_name,$fileds);	
		    $contents .= $this->create_delete($controller_name,$tablename,$module_name);	
		    $contents .= '}';
		    $contents = str_replace("%","$",$contents);
		    file_put_contents($file, $contents);
		}
    }

    public function create_construct($module_name,$tablename)
    {
    	return "public function __construct()
	    {
	        parent::__construct();
	        %this->load->model('".ucfirst($module_name)."');
	        %this->module = '".$tablename."';
	        %this->user_type = %this->session->userdata('user_type');
	        %this->id = %this->session->userdata('user_id');
	        %this->permission = %this->get_permission(%this->module,%this->user_type);
	    }";
    }

    public function create_index($controller_name,$tablename,$module_name,$fileds)
    {
    	$contents = "public function index()
		{
			if ( %this->permission['view'] == '0' && %this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			%this->data['title'] = '".ucfirst($controller_name)."';
			if ( %this->permission['view_all'] == '1'){";
			$key = array_search('1', array_column($fileds, 'is_relation'));
			if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$contents .= "%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->get_".$tablename."();";
	        	}
				else{
					$contents .= "%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->all_rows('".$tablename."');";
				}	
			}
			else{
				$contents .= "%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->all_rows('".$tablename."');";
			}
			$contents .="}
			elseif (%this->permission['view'] == '1') {";
			$key = array_search('1', array_column($fileds, 'is_relation'));
			if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$contents .= "%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->get_".$tablename."(%this->id);";
	        	}
				else{
					$contents .= "%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->get_rows('".$tablename."',array('user_id'=>%this->id));";
				}
			}
			else{
				$contents .= "%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->get_rows('".$tablename."',array('user_id'=>%this->id));";
			}
				// %this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->get_rows('".$tablename."',array('user_id'=>%this->id));
			$contents .="}
			%this->data['permission'] = %this->permission;
			%this->load->template('admin/".$controller_name."/index',%this->data);
		}";
		return $contents;
    }

    public function create_create($controller_name,$tablename,$module_name,$fileds)
    {
    	$contents = "public function create()
		{
			if ( %this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			%this->data['title'] = 'Create ".ucfirst($controller_name)."';";
			foreach ($fileds as $f) {
				if ($f['is_relation'] == 1) {
					$contents .= "%this->data['table_".$f['relation_table']."'] = %this->".ucfirst($module_name)."->all_rows('".$f['relation_table']."');";
				}
			}
			$contents .= "%this->load->template('admin/".$controller_name."/create',%this->data);
		}
		public function insert()
		{
			if ( %this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			%data = %this->input->post();
			%data['user_id'] = %this->session->userdata('user_id');";
			$key = array_search('checkbox', array_column($fileds, 'filed_type'));
			if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$contents .= "%data['".$fileds[$key]['name']."'] = implode(',', %data['".$fileds[$key]['name']."']);";
	        	}
	        }
	        $key = array_search('file', array_column($fileds, 'filed_type'));
			if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$contents .= "%config['upload_path']          = './uploads/';
					                %config['allowed_types']        = '".str_replace(',', '|', $fileds[$key]['options'])."';
					                %config['max_size']             = 1000;
					                %config['max_width']            = 1024;
					                %config['max_height']           = 768;

					                %this->load->library('upload', %config);

					                if ( %this->upload->do_upload('".$fileds[$key]['name']."'))
					                {
					                        %data['".$fileds[$key]['name']."'] = '/uploads/'.%this->upload->data('file_name');
					                }
					                ";
	        	}
	        }
			$contents .= "%id = %this->".ucfirst($module_name)."->insert('".$tablename."',%data);
			if (%id) {
				redirect('admin/".$controller_name."');
			}
		}";
		return $contents;
    }

    public function create_edit($controller_name,$tablename,$module_name,$fileds)
    {
    	$contents = "public function edit(%id)
		{
			if (%this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			%this->data['title'] = 'Edit ".ucfirst($controller_name)."';
			%this->data['".$controller_name."'] = %this->".ucfirst($module_name)."->get_row_single('".$tablename."',array('id'=>%id));";
			foreach ($fileds as $f) {
				if ($f['is_relation'] == 1) {
					$contents .= "%this->data['table_".$f['relation_table']."'] = %this->".ucfirst($module_name)."->all_rows('".$f['relation_table']."');";
				}
			}
			$contents .= "%this->load->template('admin/".$controller_name."/edit',%this->data);
		}

		public function update()
		{
			if ( %this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			%data = %this->input->post();
			%id = %data['id'];
			unset(%data['id']);";
			$key = array_search('checkbox', array_column($fileds, 'filed_type'));
			if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$contents .= "%data['".$fileds[$key]['name']."'] = implode(',', %data['".$fileds[$key]['name']."']);";
	        	}
	        }
	        $key = array_search('file', array_column($fileds, 'filed_type'));
			if ($key >= -1) {
	        	if (array_key_exists($key,$fileds)) {
	        		$contents .= "%config['upload_path']          = './uploads/';
					                %config['allowed_types']        = '".str_replace(',', '|', $fileds[$key]['options'])."';
					                %config['max_size']             = 1000;
					                %config['max_width']            = 1024;
					                %config['max_height']           = 768;

					                %this->load->library('upload', %config);

					                if ( %this->upload->do_upload('".$fileds[$key]['name']."'))
					                {
					                        %data['".$fileds[$key]['name']."'] = '/uploads/'.%this->upload->data('file_name');
					                }
					                ";
	        	}
	        }
			$contents .= "%id = %this->".ucfirst($module_name)."->update('".$tablename."',%data,array('id'=>%id));
			if (%id) {
				redirect('admin/".$controller_name."');
			}
		}";
		return $contents;
    }

    public function create_delete($controller_name,$tablename,$module_name)
    {
    	return "public function delete(%id)
		{
			if ( %this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			%this->".ucfirst($module_name)."->delete('".$tablename."',array('id'=>%id));
			redirect('admin/".$controller_name."');
		}";
    }

    public function create_folder($url)
    {
    	$directoryName = $_SERVER['DOCUMENT_ROOT'].'/crud/application/admin/views/'.$url;
		if(!is_dir($directoryName)){
		    mkdir($directoryName, 0755);
		}
    }

    public function create_main_view($controller_name,$module_name,$tablename,$fileds)
    {
    	$file = $_SERVER['DOCUMENT_ROOT'].'/crud/application/admin/views/'.$controller_name.'/index.php';
		if(!is_file($file)){
		    include 'create_index.php';
		    $contents = str_replace("%","$",$contents);
		    file_put_contents($file, $contents);
		}
		else{
			echo '1';
		}
    }

    public function create_create_view($controller_name,$module_name,$tablename,$fileds)
    {
    	$file = $_SERVER['DOCUMENT_ROOT'].'/crud/application/admin/views/'.$controller_name.'/create.php';
		if(!is_file($file)){
		    include 'create_create.php';
		    $contents = str_replace("%","$",$contents);
		    file_put_contents($file, $contents);
		}
		else{
			echo '1';
		}
    }

    public function create_edit_view($controller_name,$module_name,$tablename,$fileds)
    {
    	$file = $_SERVER['DOCUMENT_ROOT'].'/crud/application/admin/views/'.$controller_name.'/edit.php';
		if(!is_file($file)){
		    include 'create_edit.php';
		    $contents = str_replace("%","$",$contents);
		    file_put_contents($file, $contents);
		}
		else{
			echo '1';
		}
    }

}