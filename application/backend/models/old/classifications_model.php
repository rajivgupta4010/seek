<?php
class Classifications_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_item_by_name($name,  $parent)
    {
          $this->db->where('name', $name); 
          $this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->get('classification');
        return $query->result();
    }
    
    function get_items($parent=0)
    {
        $this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->get('classification');

        return $query->result();
    }
    function get_items_by_in($parent=0)
    {
        $arr=explode(',',$parent);
        if(count($arr)=='1' && $arr[0]=='default'):
            $this->db->where_not_in('parent_id', $arr); 
            else:
           $this->db->where_in('parent_id', $arr); 
        endif;
         $this->db->where('status', 1); 
        $query = $this->db->get('classification');
        return $query->result();
    }
     function get_published_items($parent=0)
    {
      
        $this->db->where('parent_id', $parent); 
         $this->db->where('status', 1); 
        $query = $this->db->get('classification');
        return $query->result();
    }
    
     function get_sub_published_items()
    {
        $this->db->where_not_in('parent_id', ''); 
         $this->db->where('status', 1); 
        $query = $this->db->get('classification');
        return $query->result();
    }
    
    function get_item($id)
    {
        
       $this->db->where('id', $id);
        $query = $this->db->get('classification');
        return $query->result(); 
    }
    function insert_item($name,$parent_id,$status)
    {
         $this->name   = $name; // please read the below note
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->insert('classification', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$parent_id,$status,$id)
    {
        $this->name   = $name;
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->update('classification', $this, array('id' => $id));
        return $this->db->affected_rows();
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('classification'); 
       return  $this->db->affected_rows();
    }
}