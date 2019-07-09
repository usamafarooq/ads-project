<?php
		    class Withdraw_model extends MY_Model{

		    	public function get_withdraw($id = null)
					{
						$this->db->select('withdraw.*,users.first_name,users.last_name,users.jazz_no')
								 ->from('withdraw')->join('users', 'users.id = withdraw.User'); if ($id != null) {
								$this->db->where('withdraw.user_id', $id);
							}return $this->db->get()->result_array();
					}}