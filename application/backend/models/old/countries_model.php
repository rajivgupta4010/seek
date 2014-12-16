<?php
class countries_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
  
    function get_all()
    {
        $query = $this->db->get('countries');
        return $query->result(); 
    }
    function get_item($id)
    {
       $this->db->where('id', $id);
        $query = $this->db->get('countries');
        return $query->result(); 
    }
    function insert_item($name,$parent_id,$status)
    {
         $this->name   = $name; // please read the below note

        $this->db->insert('countries', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$parent_id,$status,$id)
    {
        $this->name   = $name;
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->update('countries', $this, array('id' => $id));
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('countries'); 
       return  $this->db->affected_rows();
    }
	
}