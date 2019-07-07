<?php 

class User_model extends MY_Model
{
	public function get_users($id = null)
	{
		$this->db->select('u.*,ut.name as role, pp.name as package')
				 ->from('users u')
				 ->join('user_type ut', 'ut.id = u.role')
				 ->join('user_package up', 'up.user_id = u.id', 'left')
				 ->join('pricing_plan pp', 'pp.id = up.package_id', 'left');
		if ($id != null) {
			$this->db->where('u.id', $id);
		}
		return $this->db->get()->result_array();
	}
}