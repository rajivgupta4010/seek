<?php 
class states_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }


	public function get_states(){
		$this->db->select("*");	
		$this->db->from('states');
		$where=array("status" =>1,"archived <> " => 1);
		$this->db->where($where);
		$this->db->order_by("name asc");
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;	
	}
	
	 public function add_edit_states($arr){
		
	    /*$sql = "SELECT max(sort) from states";
		$query = $this->db->query($sql);
		$data = $query->result_array();
	
		if($data[0]['max(sort)'] == NULL){
			$arr["sort"] = 0;
		}
		else{
			$arr["sort"] = ($data[0]['max(sort)']+1);
		}*/
	    $arr["status"]=1;
		$arr["time"]=time();
		if($arr["id"]==""){
			return $this->db->insert("states",$arr);
			//echo $this->db->last_query();
		}	
		else{
			$this->db->where("id",$arr["id"]);
			 return $this->db->update("states",$arr);
		}
	 }
	 
	public function getstateData($searchdata){
		$recordperpage="";
		$startlimit="";
		if(!isset($searchdata["page"]) || $searchdata["page"]=="")
		{
			$searchdata["page"]=0;
		}
	    if(!isset($searchdata["countdata"]))
		{
			if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
			{
				$recordperpage=$searchdata["per_page"];
			}
			else
			{
				$recordperpage=1;
			}
			if(isset($searchdata["page"]) && $searchdata["page"]!="")
			{
				$startlimit=$searchdata["page"];
			}
			else
			{
				$startlimit=0;
			}
		}		
		$this->db->select("*");
		$this->db->from("states");
		foreach($searchdata as $key=>$val)
		{
			if(isset($searcharray[$key]) && $searchdata[$key]!="")
			{
				if(array_key_exists($key,$searcharray))
				{
					$where=array($searcharray[$key]=>$val);
					$this->db->where($where);
				}
			}
		}
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		  $this->db->like('name', urlencode($searchdata["search"]));
		}
		
		
		$where=array('archived <> '=>'1');
		$this->db->where($where);
		$this->db->order_by("id DESC");
		
		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				$this->db->limit($recordperpage,$startlimit);
			}
		}
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
 }

	public function view_states($id){
		
		$this->db->select("*");	
		$this->db->from('states');
		$where=array("id" =>$id,"archived <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->row_array();
		return $resultset;	
	}
	public function enable_disable_states($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("states",$arr);
		//return $this->db->last_query();
	}
	public function delete_states($id){
		$this->db->where("id",$id);
		$arr=array("archived"=>1);
		return $this->db->update("states",$arr);
	//	echo $this->db->last_query();
	}
	
	
/*
CITY MODELS STARTS
*/	
	
	
	 public function get_state_byid($id){
	   //echo $id;
		$this->db->select("name");	
		$this->db->from('states');
		$where=array("id" =>$id,"archived <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
   
	public function get_city(){
		$this->db->select("*");	
		$this->db->from('cities');
		$where=array("status" =>1,"archived <> " => 1);
		$this->db->where($where);
		$this->db->order_by("name asc");
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;	
	}
	
	 public function add_edit_city($arr){
		
	    $arr["status"]=1;
		$arr["time"]=time();
		if($arr["id"]==""){
			return $this->db->insert("cities",$arr);
			//echo $this->db->last_query();
		}	
		else{
			$this->db->where("id",$arr["id"]);
			 return $this->db->update("cities",$arr);
		}
	 }
	 
	public function getcityData($searchdata=array()){
		
		$recordperpage="";
		$startlimit="";
		if(!isset($searchdata["page"]) || $searchdata["page"]=="")
		{
			$searchdata["page"]=0;
		}
	    if(!isset($searchdata["countdata"]))
		{
			if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
			{
				$recordperpage=$searchdata["per_page"];
			}
			else
			{
				$recordperpage=1;
			}
			if(isset($searchdata["page"]) && $searchdata["page"]!="")
			{
				$startlimit=$searchdata["page"];
			}
			else
			{
				$startlimit=0;
			}
		}		
		$this->db->select("*");
		$this->db->from("cities");
		foreach($searchdata as $key=>$val)
		{
			if(isset($searcharray[$key]) && $searchdata[$key]!="")
			{
				if(array_key_exists($key,$searcharray))
				{
					$where=array($searcharray[$key]=>$val);
					$this->db->where($where);
				}
			}
		}
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		  $this->db->like('name', urlencode($searchdata["search"]));
		}
		
		$where=array('archived <> '=>'1');
		$this->db->where($where);
		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				$this->db->limit($recordperpage,$startlimit);
			}
		}
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
}
	public function view_city($id){
		$this->db->select("*");	
		$this->db->from('cities');
		$where=array("id" =>$id,"archived <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();
		$resultset=$query->row_array();
		return $resultset;	
	}
	public function enable_disable_city($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("cities",$arr);
		//return $this->db->last_query();
	}
	public function delete_city($id){
		$this->db->where("id",$id);
		$arr=array("archived"=>1);
		return $this->db->update("cities",$arr);
	//	echo $this->db->last_query();
	}
	
/****************************************************************************************************************************
region MODELS STARTS
*********************************************************************************************************************************/	
	
	//function to call on onchange state
	 public function get_city_byid($id){
	   //echo $id;
		$this->db->select("*");	
		$this->db->from('cities');
		$where=array("state" =>$id,"status" => 1,"archived <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	  	//echo $this->db->last_query();die;
		return $query->result_array();
	}
	public function get_city_name($id){
	   //echo $id;
		$this->db->select("*");	
		$this->db->from('cities');
		$where=array("id" =>$id,"status" => 1,"archived <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	  	//echo $this->db->last_query();die;
		return $query->result_array();
	}
	 public function add_edit_region($arr){
		
	    $arr["status"]=1;
		$arr["time"]=time();
		if($arr["id"]==""){
			return $this->db->insert("regions",$arr);
			//echo $this->db->last_query();
		}	
		else{
			$this->db->where("id",$arr["id"]);
			 return $this->db->update("regions",$arr);
		}
	 }
	 
	public function getregionData($searchdata=array()){
		
		$recordperpage="";
		$startlimit="";
		if(!isset($searchdata["page"]) || $searchdata["page"]=="")
		{
			$searchdata["page"]=0;
		}
	    if(!isset($searchdata["countdata"]))
		{
			if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
			{
				$recordperpage=$searchdata["per_page"];
			}
			else
			{
				$recordperpage=1;
			}
			if(isset($searchdata["page"]) && $searchdata["page"]!="")
			{
				$startlimit=$searchdata["page"];
			}
			else
			{
				$startlimit=0;
			}
		}		
		$this->db->select("*");
		$this->db->from("regions");
		foreach($searchdata as $key=>$val)
		{
			if(isset($searcharray[$key]) && $searchdata[$key]!="")
			{
				if(array_key_exists($key,$searcharray))
				{
					$where=array($searcharray[$key]=>$val);
					$this->db->where($where);
				}
			}
		}
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		  $this->db->like('name', urlencode($searchdata["search"]));
		}
		
		$where=array('archived <> '=>'1');
		$this->db->where($where);
		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				$this->db->limit($recordperpage,$startlimit);
			}
		}
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
}
	public function view_region($id){
		$this->db->select("*");	
		$this->db->from('regions');
		$where=array("id" =>$id,"archived <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();
		$resultset=$query->row_array();
		return $resultset;	
	}
	public function enable_disable_region($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("regions",$arr);
		//return $this->db->last_query();
	}
	public function delete_region($id){
		$this->db->where("id",$id);
		$arr=array("archived"=>1);
		return $this->db->update("regions",$arr);
	//	echo $this->db->last_query();
	}
}
?>