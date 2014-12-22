<?php

class template_model extends CI_Model {

    var $tablename = 'templates'; 
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
            $this->db->where('id', $id);
            $query = $this->db->update($this->tablename, $data);
            return $this->db->affected_rows();
    }
}

?>