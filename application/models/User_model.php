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

	public function get_referrer($email)
	{
		$this->db->select('u.username,u.status, ua.visit, ua.earning, date(pu.created_at) as date, p.Duration, sum(w.Amount) as paid, my_earning')
				 ->from('users u')
				 ->join('(SELECT count(id) as visit, sum(amount) as earning, user_id, SUM(referrer_amount) as my_earning FROM user_ads_view group by user_id) ua', 'ua.user_id = u.id', 'left')
				 ->join('plan_user pu', 'pu.user_id = u.id', 'left')
				 ->join('pricing_plan p', 'pu.pricing_plan_id = p.id', 'left')
				 ->join('withdraw w', 'w.User = u.id and w.Status = "Approve"', 'left')
				 ->group_by('u.id')
				 ->where('u.referrer', $email);
		$result =  $this->db->get()->result_array();
		return $result;
	}


	public function get_referer_user_data($referrer_email)
	{
		$this->db->select('u.*, pp.Refer_Click_Price')
		->from('users u')
		->join('plan_user pu', 'pu.user_id = u.id')
		->join('pricing_plan pp', 'pp.id = pu.pricing_plan_id')
		->where('u.email', $referrer_email);
		$result = $this->db->get()->row_array();
		return $result;
	}
}