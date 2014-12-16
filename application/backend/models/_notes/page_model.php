<?php 

class page_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		
    }
	/********************************************************Blog function starts***************************************************/
	public function getPageData()

	{
		
		
		$this->db->select("*");
		$this->db->from("content_pages");
		$this->db->where(array("archive"=>"0"));
		$query=$this->db->get();//run query 
		$resultset=$query->result_array();
		return $resultset; 
	}
	//get conent pages data for front end 
	
	public function get_page_data($id){
		
		$this->db->select("*");
		$this->db->from("content_pages");
		$this->db->where(array("id"=>$id,"status"=>"1"));
		$query=$this->db->get();
		$resultset=$query->row_array();//echo $this->db->last_query();die;
		return $resultset; 
	}
	
	
	public function add_edit_page($arr){
		
	   if($arr["id"]==""){ 
	          return $this->db->insert("content_pages",$arr);
		 }	
		else{
			
			$this->db->where("id",$arr["id"]);
       		 return $this->db->update("content_pages",$arr);
		}
	 }
	
	
	
	public function enable_disable_pages($id,$status){
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("content_pages",$arr);
		//return $this->db->last_query();
	}
	public function delete_page($id){
		$this->db->where("id",$id);
		$arr=array("archive"=>1);
		return $this->db->update("content_pages",$arr);
		//echo $this->db->last_query();die;
	}
	
	
	
}

?>