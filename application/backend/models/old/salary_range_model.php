<?php
class salary_range_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_item_by_name($name,  $parent, $type)
    {
          $this->db->where('name', $name); 
           $this->db->where('type', $type); 
          $this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->get('salary_range');
        return $query->result();
    }
      function get_published_items($parent=0,$type='a')
    {
      
        $this->db->where('parent_id', $parent); 
        $this->db->where('status', 1); 
          $this->db->where('type', $type); 
          $this->db->order_by("name", "value"); 

        $query = $this->db->get('salary_range');
        return $query->result();
        
                
    }
    function get_items($parent=0,$type='a')
    {
      
        $this->db->where('parent_id', $parent); 
        $this->db->where('type', $type); 
        $query = $this->db->get('salary_range');
        return $query->result();
    }
    function get_item($id)
    {
        
       $this->db->where('id', $id);
        $query = $this->db->get('salary_range');
        return $query->result(); 
    }
    function insert_item($name,$parent_id,$status,$value,$type)
    {
         $this->name   = $name; // please read the below note
        $this->parent_id = $parent_id;
        $this->status    = $status;
          $this->type    = $type;
         $this->value    = $value;

        $this->db->insert('salary_range', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$parent_id,$status,$id,$value,$type)
    {
        $this->name   = $name;
        $this->parent_id = $parent_id;
        $this->status    = $status;
         $this->value    = $value;
          $this->type    = $type;

        $this->db->update('salary_range', $this, array('id' => $id));
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('salary_range'); 
       return  $this->db->affected_rows();
    }
}