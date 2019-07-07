<?php
class Ads_model extends MY_Model{


	public function get_available_for_user()
	{
		$this->db->select()
		->from('ads a');
		// ->limit('SELECT ')
		$result = $this->db->get()->result_array();
		return $result;
	}
}