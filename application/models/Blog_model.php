<?php
		    class Blog_model extends MY_Model{

		    	public function get_blog($id = null)
					{
						$this->db->select('blog.*,blog_category.Name')
								 ->from('blog')->join('blog_category', 'blog_category.id = blog.category'); if ($id != null) {
								$this->db->where('blog.user_id', $id);
							}return $this->db->get()->result_array();
					}}