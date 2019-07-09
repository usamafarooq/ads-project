<?php 

class User_model extends MY_Model
{
	public function get_users($id = null)
	{
		$this->db->select('u.*,ut.name as role, pp.name as package, pu.pricing_plan_id, pp.Click_Price, pp.Refer_Click_Price, pp.Daily_Ads')
				 ->from('users u')
				 ->join('user_type ut', 'ut.id = u.role')
				 ->join('plan_user pu', 'pu.user_id = u.id', 'left')
				 ->join('pricing_plan pp', 'pp.id = pu.pricing_plan_id', 'left');
		if ($id != null) {
			$this->db->where('u.id', $id);
		}
		return $this->db->get()->result_array();
	}
}