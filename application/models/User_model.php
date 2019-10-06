<?php 

class User_model extends MY_Model
{
	public function get_users($id = null, $status = null)
	{
		$this->db->select('u.*,ut.name as role, pp.name as package, pp.Amount as package_amount, pu.pricing_plan_id, pp.Click_Price, pp.Refer_Click_Price, pp.Daily_Ads, approve_amount, pending_amount, pu.created_at as user_plan_created, pp.Duration as duration, pp.withdraw_limit, pu.expire_at')
				 ->from('users u')
				 ->join('user_type ut', 'ut.id = u.role')
				 ->join('plan_user pu', 'pu.user_id = u.id', 'left')
				 ->join('pricing_plan pp', 'pp.id = pu.pricing_plan_id', 'left')
				 ->join('(select User, SUM(CASE WHEN status = "Approve" THEN Amount ELSE 0 END) AS approve_amount, SUM(CASE WHEN status = "Pending" THEN Amount ELSE 0 END) AS pending_amount from withdraw group by User) w', 'w.User = u.id', 'left');
		if ($id != null) {
			$this->db->where('u.id', $id);
		}
		if (!empty($status) ) {
			if ($status == 'Approved') {
				$this->db->where('u.status', 'Approved');
			}
			else{
				$this->db->where('u.status !=', 'Approved');
			}
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