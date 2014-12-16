<?php 
ob_start();
class login_model extends CI_Model { 
    function __construct(){
        parent::__construct();
    }
	
/************************************************* Admin login functions starts ***********************************************/	
	public function check_admin_login($arr){
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where(array("username" => $arr["username"]));
		$result=$this->db->get();
		//echo $this->db->last_query();die;
		$countrows=$result->num_rows();
		$result=$result->row_array();
		return $result;
	}
/************************************************* Admin login functions ends *************************************************/
//==========================Restaurant Login Function Starts=================================//
	public function check_restaurant_login($arr)
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where(array("username" => $arr["username"],"password"=>$arr['password']));
		$result=$this->db->get();
		//echo $this->db->last_query();die;
		$countrows=$result->num_rows();
		$result=$result->row_array();
		return $result;
	}
//==========================Restaurant Login Function Ends=================================//
}