<?php 

class Main_model extends MY_Model
{
	public function get_menu($role)
	{
		return $this->db->query('SELECT m.* FROM modules m JOIN permission p ON p.module_id = m.id WHERE p.user_type_id = '.$role.' AND (p.view = 1 OR p.view_all = 1) GROUP BY m.id ORDER BY m.sort')->result_array();
	}

	public function get_user_permission($module,$role)
	{
		$this->db->select('p.*')
				 ->from('permission p')
				 ->join('modules m','m.id = p.module_id')
				 ->where('m.main_name',$module)
				 ->where('p.user_type_id',$role);
		return $this->db->get()->row_array();
	}
}