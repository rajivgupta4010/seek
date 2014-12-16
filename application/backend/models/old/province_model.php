<?php
class Province_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_item_by_name($name,  $parent)
    {
          $this->db->where('name', $name); 
         
        // $this->db->where('status', 1); 
        $query = $this->db->get('province');
        return $query->result();
    }
      function get_published_items($parent=0)
    {
      
          $sql = 'select location.name  as root_name  , down1.name as down1_name from location as root left outer   join location as down1 on down1.parentid = root.id where root.parentid is 0 order     by root_name      , down1_name ' ;
          $sql = "select c.id main_id,c2.id sub_id, c.name main_location, c2.name sublocation from location c   left join location c2 on c.id = c2.parent_id where c.parent_id  = 0 ";
          $query = $this->db->query($sql);
          //echo 'qry='.$query;
         
        return $query->result();
        
                
    }
	
    function get_sub_items($id)
    {
        
         $this->db->where('parent_id', $id); 
        $query = $this->db->get('location');
        return $query->result();
    }
	 function get_items()
    {
        
        // $this->db->where('status', 1); 
        $query = $this->db->get('province');
        return $query->result();
    }
    function get_items_by_in($parent=0)
    {
        $arr=explode(',',$parent);
        $this->db->where_in('parent_id', $arr); 
        $this->db->where('status', 1); 
        $query = $this->db->get('province');
        return $query->result();
    }
    function get_item($id)
    {
        
       $this->db->where('id', $id);
        $query = $this->db->get('province');
        return $query->result(); 
    }
    function insert_item($name,$status)
    {
         $this->name   = $name; // please read the below note
        
        $this->status    = $status;

        $this->db->insert('province', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$status,$id)
    {
        $this->name   = $name;
        $this->status    = $status;
        $this->db->update('province', $this, array('id' => $id));
		 return $this->db->insert_id();
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('province'); 
       return  $this->db->affected_rows();
    }
	  function get_published_pitem()
    {
      
      
         $this->db->where('status', 1); 
        $query = $this->db->get('province');
        return $query->result();
    }
}