<?php
class Ads_model extends MY_Model{


	public function get_available_for_user($user, $limit)
	{
		if ($limit <= 0) {
			return [];
		}

		$this->db->select('ad_id')
		        ->from('user_ads_view')
		        ->where('user_id', $user['id'])
		        ->where('created_at >=', date('Y-m-d'))
		        ->where('created_at <=', date('Y-m-d 23:59:59'));


		$subquery = $this->db->get_compiled_select();;
		$this->db->select()
		->from('ads a')
		// ->where('click >' ,'total_clicked', false)
		->where_not_in('a.id', $subquery, false)
		->limit($limit);
		$result = $this->db->get()->result_array();
		return $result;
	}



	public function checkViewedAds($user_id, $date)
	{
		$this->db->select()
		->from('user_ads_view')
		->where(['user_id' => $user_id, 'DATE(created_at)' => date('Y-m-d')]);
		$result = $this->db->get()->result_array();
		return $result;
	}
}