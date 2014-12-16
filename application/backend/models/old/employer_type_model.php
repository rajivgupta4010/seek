<?php
class employer_type_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_item_by_name($name)
    {
          $this->db->where('name', $name); 
       //   $this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->get('employer_type');
        return $query->result();
    }
      function get_published_items($parent=0)
    {
      
        
         $this->db->where('status', 1); 
        $query = $this->db->get('employer_type');
        return $query->result();
    }
    function get_items($parent=0)
    {
      
        //$this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->get('employer_type');
        return $query->result();
    }
    function get_item($id)
    {
        
       $this->db->where('id', $id);
        $query = $this->db->get('employer_type');
        return $query->result(); 
    }
    function insert_item($name,$status)
    {
         $this->name   = $name; // please read the below note
       // $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->insert('employer_type', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$status,$id)
    {
        $this->name   = $name;
       // $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->update('employer_type', $this, array('id' => $id));
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('employer_type'); 
       return  $this->db->affected_rows();
    }
}