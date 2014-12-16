<?php

class user_model extends CI_Model {

    var $tablename = 'users'; 
    function __construct() {
        parent::__construct();
    }

    function get_entry($data)
    {

        $this->db->select('*');
        $this->db->from($this->tablename);
        $this->db->where($data); 
        $query = $this->db->get();
        //echo $this->db->last_query();
       // print_r($query->result());
        return $query->result();
        
    }
    
    function insert_entry($data)
    {
       $this->db->insert($this->tablename, $data);
       return $this->db->insert_id();
    }

    function update_entry($data, $id)
    {
            $this->db->update($this->tablename, $data, array('id' => $id));
            return $this->db->num_rows();
    }
}

?>