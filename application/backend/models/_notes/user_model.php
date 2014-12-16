<?php 
class user_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

	public function get_user(){
		$this->db->select("*");	
		$this->db->from('users');
		$where=array("status" =>1,"archive <> " => 1);
		$this->db->where($where);
		$this->db->order_by("name asc");
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;	
	}
	
	//edit user for admin
	 public function add_edit_user($arr){
		
		if($arr["id"] == ""){
		    $arr["password"] = $this->common->salt_password($arr);//generate salted password 
		    $arr["status"]=0;
			$arr["time"]=time();
			return $this->db->insert("users",$arr);
		}
		else{
			if($arr["password"]!=""){
				$arr["password"] = $this->common->salt_password($arr);//generate salted password 
			}
		    $arr["time"]=time();
			$id= $arr["id"];
			unset($arr["id"]);
			$this->db->where(array("id"=>$id));
			return $this->db->update("users",$arr);
			}
	 }
	 
	 
	 //used for admin panel
	/* public function edit_user($arr){
		if($arr["password"] <> ""){
			$arr["password"] = $this->common->salt_password($arr);//generate salted password 
		}
		$sql = "SELECT max(sort) from users";
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		$data = $query->result_array();
		if($data[0]['max(sort)'] == NULL){
			$arr["sort"] = 0;
		}
		else{
			$arr["sort"] = ($data[0]['max(sort)']+1);
		}
		$arr["status"]=1;
		$arr["time"]=time();
		$id= $arr["id"];
		unset($arr["id"]);
		$this->db->where(array("id"=>$id));
		return $this->db->update("users",$arr);
		//echo $this->db->last_query();die;
	 }*/
	 
	 public function verify_email($id)  
	{	
		$this->db->select('count(*) as count');
		$this->db->from('users');
		$this->db->where(array('id'=>$id,'status' => 0));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$verfied = $query->row_array();
		if($verfied["count"] > 0){
			$arr = array("status"=>1);
			$this->db->where(array('id'=>$id));
			$result = $this->db->update("users",$arr);
			$data='0';
		}
		else{
			$data='1';
		}
		return $data;
	}
	
	public function forgot_password($arr){
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('email' => $arr["email"],'status' => 1));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset;
	}
	public function update_forgot_password($arr){
		$email = $arr["email"];
		unset($arr["email"]);
		$this->db->where(array("email" => $email));
		return $this->db->update("users",$arr);
		//echo $this->db->last_query();die;
	}
	
	function get_user_data($user_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('id' => $user_id));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset;
	}
	
	public function view_user($id){
		$this->db->select("*");	
		$this->db->from('users');
		$where=array("id" =>$id,"archive <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();
		$resultset=$query->row_array();
		return $resultset;	
	}
	public function enable_disable_user($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("users",$arr);
		//return $this->db->last_query();
	}
	public function delete_user($id){
		$this->db->where("id",$id);
		$arr=array("archive"=>1);
		return $this->db->update("users",$arr);
		//echo $this->db->last_query();die;
	}
	
	 public function save_request($email,$device){
		
	  $arr['email'] = $email;
	   $arr['device'] = $device;
	    $arr['time'] =time();
	   if($this->db->insert("notification_requests",$arr))
	   {
		  return true;   
	   }
		else
		{
		return false;	
		}
	}
	  public function save_coupon_request($arr,$device){
	 
	   $table = $arr['table'];
	   unset($arr['table']);
	   unset($arr['type']);
	   $arr['time'] = time();
	   $arr['device_type'] = $device;
	   
	        $this->db->select('*');
			$this->db->from($table);
			$this->db->where(array('coupon_id' => $arr['coupon_id'],'email'=>$arr['email']));
			$query = $this->db->get();
			$resultset = $query->row_array();
			if(count($resultset)>0)
			{
				return 2;	
			}
			else
			{ 
			   if($this->db->insert($table,$arr)){
				  return 1;   
			   }
			   else{
				  return 0;	
			   }
			}
	}	
		
	


	public function get_order_data($id,$rid){
	   
		$this->db->select("orders.*,coupons.coupon_name,coupons.expire_date,restaurants.city,restaurants.state,restaurants.country,restaurants.address,restaurants.phone");	
		$this->db->from('orders');
		$this->db->join("coupons","orders.coupon_id=coupons.id");
		$this->db->join("restaurants","orders.restaurant_id=restaurants.id");
		$where=array("orders.user_id" =>$id,"restaurant_id"=>$rid);
		$this->db->where($where);
		$query = $this->db->get();
	// echo $this->db->last_query();die;
		return $query->result_array();
	}	
	
	public function comming_soon_request($arr){
		//debug($arr);die;
		$this->db->select("*");
		$this->db->from("comming_soon_requests");		
		$this->db->where(array("email" => $arr["email"],"app_notification <>" =>4));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return $resultset;
	}
	 public function delete_noti_request($id,$type){
		
		 $this->db->where("id",$id);
		 $arr=array("app_notification" => 4);
		 
		 if($type == "comming_soon"){
		 	return $this->db->update("comming_soon_requests",$arr);
		 }
		 else if($type == "what_missed"){
			 return $this->db->update("what_missed_requests",$arr);
		 }
	 }
	 
	 public function turnon_noti_request($id,$type){
		
		 $this->db->where("id",$id);
		 $arr = array("app_notification" => 1);
		 
		 if($type == "comming_soon"){
		 	return $this->db->update("comming_soon_requests",$arr);
		 }
		 else if($type == "what_missed"){
			 return $this->db->update("what_missed_requests",$arr);
		 }
	 }
	 
	 public function turnoff_noti_request($id,$type){
		
		 $this->db->where("id",$id);
		 $arr = array("app_notification" => 0);
		 
		 if($type == "comming_soon"){
		 	return $this->db->update("comming_soon_requests",$arr);
		 }
		 else if($type == "what_missed"){
			 return $this->db->update("what_missed_requests",$arr);
		 }
	 }
	 
	 
	 
	  public function get_userorder_data($id){
	   
		$this->db->select("orders.*,coupons.coupon_name,coupons.expire_date,restaurants.city,restaurants.state,restaurants.country,restaurants.address,restaurants.phone");	
		$this->db->from('orders');
		$this->db->join("coupons","orders.coupon_id=coupons.id");
		$this->db->join("restaurants","orders.restaurant_id=restaurants.id");
		$where=array('orders.user_id' => $id,'orders.mark_delivered' => '1');
		$this->db->where($where);
		$this->db->order_by("status asc");
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	
	public function what_missed_request($arr){
		//debug($arr);die;
		$this->db->select("*");
		$this->db->from("what_missed_requests");
		$this->db->where(array("email" => $arr["email"],"app_notification <>" =>4));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->result_array();
		return $resultset;
	}
	
	
	
	
	public function getuserstats($searchdata,$type){
		
		$sql="select count(*) as count, avg(points)as apoint , group_concat(id) as uids from users where 1=1";
		if($searchdata['from']!="" && $searchdata['to']!="")
        {

			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
           $sql.=" and users.time >= '".$from."' and users.time <='".$to."'";
		}
		if($type=='male' || $type=='female')
		{
			 $sql.=" and users.sex = '".$type."' and users.archive <>'1'";
		}
		else {
			$sql.=" and users.device = '".$type."' and users.archive <>'1'";
		}
		
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		$sql.="and ( users.first_name LIKE '%".urldecode($searchdata['search'])."%' or users.last_name LIKE '%".urldecode($searchdata['search'])."%' or users.email LIKE '%".urldecode($searchdata['search'])."%' )";
		}
		$sql.=" order by users.id desc";
		
	    $query = $this->db->query($sql);
		
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset ;
	}
	
	
	public function getuserData($searchdata){
		
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
			
		/*$this->db->select("*");
		$this->db->from("users");*/
		$sql="select * from users where 1=1";
		if($searchdata['from']!="" && $searchdata['to']!="")
        {

			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
	         $sql.=" and users.time >= '".$from."' and users.time <='".$to."'";

		}
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		$sql.=" and ( users.first_name LIKE '%".urldecode($searchdata['search'])."%' or users.last_name LIKE '%".urldecode($searchdata['search'])."%' or users.email LIKE '%".urldecode($searchdata['search'])."%' )";
		}
		$sql.=" and archive <> '1' order by users.id desc";
		
	    if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				//$this->db->limit($recordperpage,$startlimit);
				$sql.=" limit $startlimit,$recordperpage";
			}
			
		}
		
		$query = $this->db->query($sql);
		//echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
	
		
}


public function getcomming_soonData($searchdata){
		
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
		$this->db->select("comming_soon_requests.*");
		$this->db->from("comming_soon_requests");
		$this->db->join("coupons","comming_soon_requests.coupon_id=coupons.id");
		$this->db->join("restaurants","coupons.restaurant_id=restaurants.id");
		if($searchdata['from']!="" && $searchdata['to']!="")
        {

			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
			
			$where=array('comming_soon_requests.time >='=> $from,'comming_soon_requests.time <= '=>$to);
		    $this->db->where($where);
	    }
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		 $this->db->like('restaurants.restaurant_name', trim($searchdata["search"]));
		}
		
		$this->db->order_by("comming_soon_requests.id DESC");
		
		
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
	
	public function getcomming_soonstats($searchdata,$type){
		
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
		$this->db->select("count(*) as count");
		$this->db->from("comming_soon_requests");
		$this->db->join("coupons","comming_soon_requests.coupon_id=coupons.id");
		$this->db->join("restaurants","coupons.restaurant_id=restaurants.id");
		if($searchdata['from']!="" && $searchdata['to']!="")
        {

			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
			$where=array('comming_soon_requests.time >='=> $from,'comming_soon_requests.time <= '=>$to);
		    $this->db->where($where);
	    }
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="search" && $searchdata["search"]!="")
		{
		 $this->db->like('restaurants.restaurant_name', trim($searchdata["search"]));
		}
		
		
		$where=array('comming_soon_requests.device_type '=> $type);
		$this->db->where($where);
			
			
		$this->db->order_by("comming_soon_requests.id DESC");
		
		
		if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
		{
			if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
			{
				$this->db->limit($recordperpage,$startlimit);
			}
		}
		$query=$this->db->get();
	   // echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;
}	
	
	public function getwhat_missedData($searchdata){
		
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
		$this->db->select("what_missed_requests.*");
		$this->db->from("what_missed_requests");
		$this->db->join("coupons","what_missed_requests.coupon_id=coupons.id");
		$this->db->join("restaurants","coupons.restaurant_id=restaurants.id");
		if($searchdata['from']!="" && $searchdata['to']!="")
        {

			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
			$where=array('what_missed_requests.time >='=> $from,'what_missed_requests.time <= '=>$to);
		    $this->db->where($where);
	    }
		
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
		 $this->db->like('restaurants.restaurant_name', trim($searchdata["search"]));
		}
		
		$this->db->order_by("what_missed_requests.id DESC");
		
		
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

public function getwhat_missedstats($searchdata,$type){
		
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
		$this->db->select("count(*) as count");
		$this->db->from("what_missed_requests");
		$this->db->join("coupons","what_missed_requests.coupon_id=coupons.id");
		$this->db->join("restaurants","coupons.restaurant_id=restaurants.id");
		if($searchdata['from']!="" && $searchdata['to']!="")
        {
            $from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
			$where=array('what_missed_requests.time >='=> $from,'what_missed_requests.time <= '=>$to);
		    $this->db->where($where);
	    }
		
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
		 $this->db->like('restaurants.restaurant_name', trim($searchdata["search"]));
		}
		$where=array('what_missed_requests.device_type '=> $type);
		$this->db->where($where);
			
		$this->db->order_by("what_missed_requests.id DESC");
		
		
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

public function getnewslatterData($searchdata){
		
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
		$this->db->from("notification_requests");
		if($searchdata['from']!="" && $searchdata['to']!="")
        {
           
			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
			$where=array('notification_requests.time >='=> $from,'notification_requests.time <= '=>$to);
		    $this->db->where($where);
	    }
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
		 $this->db->like('email', trim($searchdata["search"]));
		}
		
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
   	
public function getnewslatterstats($searchdata,$type){
		
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
		$this->db->select("count(*) as count");
		$this->db->from("notification_requests");
		if($searchdata['from']!="" && $searchdata['to']!="")
        {

			$from_data=explode(' ',$searchdata['from']);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			$from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

			$to_data=explode(' ',$searchdata['to']);
			$to_data1=explode('/',$to_data[0]);
			$to_data2=explode(':',$to_data[1]);
			$to = strtotime($to_data1[1]."-".$to_data1[0]."-".$to_data1[2]." ".$to_data2[0].":".$to_data2[1].":00 ".$to_data[2]);
			
			$where=array('notification_requests.time >='=> $from,'notification_requests.time <= '=>$to);
		    $this->db->where($where);
	    }
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
		 $this->db->like('email', trim($searchdata["search"]));
		}
		$where=array('notification_requests.device'=> $type);
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
   	
		
	
	
}
?>