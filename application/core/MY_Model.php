<?php

class MY_Model extends CI_Model
{
    public function all_rows($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function get_row_single($table,$where)
    {
        return $this->db->get_where($table,$where)->row_array();
    }

    public function get_rows($table,$where)
    {
        return $this->db->get_where($table,$where)->result_array();
    }

    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function update($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
        return $this->db->affected_rows();
    }

    public function delete($table,$where)
    {
        $this->db->delete($table,$where); 
    }

    public function insert_batch($table,$data)
    {
        $this->db->insert_batch( $table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function query($query)
    {
        return $this->db->query($query);
    }

    public function query_result($query)
    {
        return $this->db->query($query)->result_array();
    }

    public function query_single_result($query)
    {
        return $this->db->query($query)->row_array();
    }



    public function view_scm_code_ckeck($column,$data,$table_data)
    {
        $query = 'SELECT * FROM '.$table_data.' WHERE LTRIM('.$column.') = '.$data;
        return $this->query_single_result($query);

    }




}