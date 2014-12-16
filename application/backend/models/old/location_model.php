<?php
class location_model extends CI_Model {

  

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
        $query = $this->db->get('location');
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
	function get_published_complete_items()
	{
		
	}
    function get_items($parent=0)
    {
        //$this->db->where('parent_id', $parent); 
        // $this->db->where('status', 1); 
        $query = $this->db->select('location.name,location.id,location.status,province.name as pname');
		

		$this->db->join('province', 'province.id = location.parent_id');
		$query = $this->db->get('location');
        return $query->result();
    }
    function get_items_by_in($parent=0)
    {
        $arr=explode(',',$parent);
        $this->db->where_in('parent_id', $arr); 
        $this->db->where('status', 1); 
        $query = $this->db->get('sublocation');
		//$this->db->join('sublocation', 'comments.id = blogs.id');
        return $query->result();
    }
    function get_item($id)
    {
        
       $this->db->where('id', $id);
        $query = $this->db->get('location');
        return $query->result(); 
    }
    function insert_item($name,$parent_id,$status)
    {
         $this->name   = $name; // please read the below note
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->insert('location', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($name,$parent_id,$status,$id)
    {
        $this->name   = $name;
        $this->parent_id = $parent_id;
        $this->status    = $status;

        $this->db->update('location', $this, array('id' => $id));
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('location'); 
       return  $this->db->affected_rows();
    }
	
	function getFrontendLocation()
	{
		//$this->db->select('province.id pid, province.name as pname, location.name as lname, location.id locid, sublocation.name as subname, sublocation.id subid');
		$this->db->select('province.id pid, province.name as pname, location.name as lname, location.id locid');
		$this->db->from('province','sublocation','location');
		$this->db->join('location', 'location.parent_id = province.id');
		//$this->db->join('sublocation', 'sublocation.parent_id = location.id');
		$this->db->where('province.status', 1); 
		$this->db->where('location.status', 1); 
		//$this->db->where('sublocation.status', 1); 
		$query = $this->db->get();
		return $query->result();
	}
	
	function getProvinceLocation($pid)
	{
		       $this->db->where('parent_id', $pid);
        $query = $this->db->get('location');
        return $query->result(); 

	}
}