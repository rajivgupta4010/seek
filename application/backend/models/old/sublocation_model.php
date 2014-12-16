<?php
class sublocation_model extends CI_Model {

  

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
        $query = $this->db->get('sublocation');
        return $query->result();
    }
      function get_published_items($parent=0)
    {
      
          $sql = 'select sublocation.name  as root_name  , down1.name as down1_name from sublocation as root left outer   join sublocation as down1 on down1.parentid = root.id where root.parentid is 0 order     by root_name      , down1_name ' ;
          $sql = "select c.id main_id,c2.id sub_id, c.name main_sublocation, c2.name subsublocation from sublocation c   left join sublocation c2 on c.id = c2.parent_id where c.parent_id  = 0 ";
          $query = $this->db->query($sql);
          //echo 'qry='.$query;
         
        return $query->result();
        
                
    }
	
	 function get_loc_items($parent=0)
    {
		
		
        //$this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->select('sublocation.name,sublocation.id,sublocation.status,location.name as lname');
		

		$this->db->join('location', 'location.id = sublocation.parent_id');
			$this->db->where('location.id', $parent); 
		$query = $this->db->get('sublocation');
	

        return $query->result();
    }
    function get_items($parent=0)
    {
        //$this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
       // $query = $this->db->get('sublocation');
//        return $query->result();
		
		  $query = $this->db->select('sublocation.name,sublocation.id,sublocation.status,location.name as lname');
		

		$this->db->join('location', 'location.id = sublocation.parent_id');
		$query = $this->db->get('sublocation');
        return $query->result();
    }
    function get_items_by_in($parent=0)
    {
        $arr=explode(',',$parent);
        $this->db->where_in('parent_id', $arr); 
        $this->db->where('status', 1); 
        $query = $this->db->get('sublocation');
        return $query->result();
    }
    function get_item($id)
    {
        
       $this->db->where('parent_id', $id);
        $query = $this->db->get('sublocation');
        return $query->result(); 
    }
    function insert_item($name,$parent_id,$status)
    {
         $this->name   = $name; // please read the below note
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->insert('sublocation', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$parent_id,$status,$id)
    {
        $this->name   = $name;
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->update('sublocation', $this, array('id' => $id));
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sublocation'); 
       return  $this->db->affected_rows();
    }
}