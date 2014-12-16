<?php 
class restaurant_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

      public function add_edit_restaurants($arr){
		
	   if($arr["id"]==""){ 
	          return $this->db->insert("restaurants",$arr);
		 }	
		else{
			
			$this->db->where("id",$arr["id"]);
       		 return $this->db->update("restaurants",$arr);
		}
	 }
	public function get_restaurants(){
		$this->db->select("*");	
		$this->db->from('restaurants');
		$where=array("status" =>1);
		$this->db->where($where);
		$this->db->order_by("restaurant_name asc");
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;	
	}
	
	 public function check_restaturant_id($arr){
		 if($arr["id"]==""){ 
		    $this->db->select("restaurant_id");	
			$this->db->from('restaurants');
			$where=array("restaurant_id" =>$arr['restaurant_id'],"archive <> " => 1);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array();
			if(count($resultset) > 0 )
			{
			return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 else
		 {
			$this->db->select("restaurant_id");	
			$this->db->from('restaurants');
			$where=array("restaurant_id" =>$arr['restaurant_id'],"archive <> " => 1,"id <> " => $arr["id"]);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array(); 
			 if(count($resultset) > 0 )
			{
			return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 
	 }
	public function check_restaturant_name($arr){
		 if($arr["id"]==""){ 
		    $this->db->select("restaurant_name");	
			$this->db->from('restaurants');
			$where=array("restaurant_name" =>$arr['restaurant_name'],"archive <> " => 1);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array();
			if(count($resultset) > 0 )
			{
			  return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 else
		 {
			$this->db->select("restaurant_name");	
			$this->db->from('restaurants');
			$where=array("restaurant_name" =>$arr['restaurant_name'],"archive <> " => 1,"id <> " => $arr["id"]);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array(); 
			 if(count($resultset) > 0 )
			{
			return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 
	 }
	
	 public function save_request($email){
		
	   if($email==""){ 
	          return $this->db->insert("notification_requests",$arr);
		 }	
		else{
			
			
       		 return false;
		}
	 }
	 
	public function getrestaurantsData($searchdata){
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
		$this->db->from("restaurants");
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
		
		if(isset($searchdata["name"])  && $searchdata["name"]!="")
		{
		  $this->db->like('restaurant_name', urldecode($searchdata["name"]));
		}
		
		
		$where=array('archive <> '=>'1');
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

	public function view_restaurants($id){
		
		$this->db->select("*");	
		$this->db->from('restaurants');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->row_array();
		return $resultset;	
	}
	public function enable_disable_restaurants($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("restaurants",$arr);
		//return $this->db->last_query();
	}
	public function delete_restaurants($id){
		$this->db->where("id",$id);
		$arr=array("archive"=>1);
		return $this->db->update("restaurants",$arr);
		
	//	echo $this->db->last_query();
	}
	
	

	 public function get_restaurants_byid($id){
	   //echo $id;
		$this->db->select("restaurant_name");	
		$this->db->from('restaurants');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		return $query->result_array();
	}
  
  ///////////////////////////// menus functions /////////////////////////////////
  
	 public function getmenusData($searchdata){
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
		$this->db->select("menus.*");
		$this->db->from("menus");
		$this->db->join("restaurants","menus.restaurant_id=restaurants.id");
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
		
		if(isset($searchdata["restaurant"]) && $searchdata["restaurant"]!="")
		{
			
		  $this->db->where('restaurants.id', trim($searchdata["restaurant"]));
		}
		
		
		$where=array('menus.archive <> '=>'1');
		$this->db->where($where);
		$this->db->order_by("menus.id DESC");
		
		
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
	public function view_menu($id){
		
		$this->db->select("*");	
		$this->db->from('menus');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	   
		$resultset=$query->row_array();
		return $resultset;	
	} 

	public function enable_disable_menus($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("menus",$arr);
		//return $this->db->last_query();
	}
	public function delete_menus($id){
		$this->db->where("id",$id);
		$arr=array("archive"=>1);
		return $this->db->update("menus",$arr);
	}
	 public function get_menu_byid($id){
	   //echo $id;
		$this->db->select("menu_name");	
		$this->db->from('menus');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
	public function getrestaturant_menu($id){
	   $this->db->select("*");	
		$this->db->from('menus');
		$where=array("restaurant_id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	   return $query->result_array();
	}
	public function check_menu_name($arr){
		 if($arr["id"]==""){ 
		    $this->db->select("menu_name");	
			$this->db->from('menus');
			$where=array("menu_name" =>$arr['menu_name'],"archive <> " => 1,"restaurant_id <> " => $arr["restaurant_id"]);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array();
			if(count($resultset) > 0 )
			{
			  return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 else
		 {
			$this->db->select("menu_name");	
			$this->db->from('menus');
			$where=array("menu_name" =>$arr['menu_name'],"archive <> " => 1,"id <> " => $arr["id"],"restaurant_id <> " => $arr["restaurant_id"]);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array(); 
			 if(count($resultset) > 0 )
			{
			return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 
	 }
	
	 public function add_edit_menus($arr){
		
	   if($arr["id"]==""){ 
	          return $this->db->insert("menus",$arr);
		 }	
		else{
			
			$this->db->where("id",$arr["id"]);
       		 return $this->db->update("menus",$arr);
		}
	 }
	//////////////////////////////////////////////////////////////////////
	
	
	
	public function view_coupon($id){
		
		$this->db->select("*");	
		$this->db->from('coupons');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->row_array();
		return $resultset;	
	} 

	public function enable_disable_coupons($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("coupons",$arr);
		//return $this->db->last_query();
	}
	public function delete_coupons($id){
		$this->db->where("id",$id);
		$arr=array("archive"=>1);
		return $this->db->update("coupons",$arr);
	}
	 public function get_coupon_byid($id){
	   //echo $id;
		$this->db->select("*");	
		$this->db->from('coupons');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	 // echo $this->db->last_query();die;
		return $query->result_array();
	}
	public function get_coupon_restaurantbyid($id){
		
	    $this->db->select("*,restaurants.id as rid");
		$this->db->from('coupons');
		$this->db->join("restaurants","restaurants.id=coupons.restaurant_id");
		$where=array("coupons.id" =>$id,"coupons.status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
	public function check_coupon_name($arr){
		 if($arr["id"]==""){ 
		    $this->db->select("coupon_name");	
			$this->db->from('coupons');
			$where=array("coupon_name" =>$arr['coupon_name'],"archive <> " => 1,"restaurant_id <> " => $arr["restaurant_id"]);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array();
			if(count($resultset) > 0 )
			{
			  return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 else
		 {
			$this->db->select("coupon_name");	
			$this->db->from('coupons');
			$where=array("coupon_name" =>$arr['coupon_name'],"archive <> " => 1,"id <> " => $arr["id"],"restaurant_id <> " => $arr["restaurant_id"]);
			$this->db->where($where);
			$query = $this->db->get();
			$resultset=$query->row_array(); 
			 if(count($resultset) > 0 )
			{
			return false;	
			}	
		    else
		    {
			   return true;
		    }
		 }
		 
	 }
	
	
	 public function add_edit_coupons($arr){
		
	   if($arr["id"]==""){ 
	          return $this->db->insert("coupons",$arr);
		 }	
		else{
			
			$this->db->where("id",$arr["id"]);
       		 return $this->db->update("coupons",$arr);
		}
	 }
	 
	  public function currentweekData(){
        /////// get cuurent week count from year first week /////////////
		$sql1="SELECT week(NOW(),0) as currentweekno";
	    $query = $this->db->query($sql1);
	    $resultset=$query->row_array();
        /////// gselect all records for  current week /////////////  

	  $sql= "SELECT * FROM coupons WHERE DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%Y') = '".date('Y',time())."' and
DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%U') = '".$resultset['currentweekno']."' and status=1 and  archive <> 1 order by id desc limit 0,4";	
		$query = $this->db->query($sql);
	//echo	$this->db->last_query();die;
	    $resultset=$query->result_array();
		
	    return $resultset;
	 }
	 
	 
	 public function nextweekData(){
        /////// get cuurent week count from year first week /////////////
		$sql1="SELECT week(NOW(),0) as currentweekno";
	    $query = $this->db->query($sql1);
	    $resultset=$query->row_array();
        /////// gselect all records for  current week /////////////  

	  $sql= "SELECT * FROM coupons WHERE DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%Y') = '".date('Y',time())."' and
DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%U') = '".($resultset['currentweekno']+1)."' and status=1 and  archive <> 1 order by id desc limit 0,4";	
		$query = $this->db->query($sql);
		//echo	$this->db->last_query();die;
	    $resultset=$query->result_array();
	    return $resultset;
		
	 }
	 
	 
	 
	 public function lastweekData(){
        /////// get cuurent week count from year first week /////////////
		$sql1="SELECT week(NOW(),0) as currentweekno";
	    $query = $this->db->query($sql1);
	    $resultset=$query->row_array();
        /////// gselect all records for  current week /////////////  

	  $sql= "SELECT * FROM coupons WHERE DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%Y') = '".date('Y',time())."' and
DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%U') = '".($resultset['currentweekno']-1)."' and status=1 and  archive <> 1 order by id desc limit 0,4";	
		$query = $this->db->query($sql);
		//echo	$this->db->last_query();die;
	    $resultset=$query->result_array();
	    return $resultset;
	 }
	 
	 
	 public function getnextweektime(){
		 /////// get cuurent week count from year first week /////////////
		$sql1="SELECT week(NOW(),0) as currentweekno";
	    $query = $this->db->query($sql1);
	    $resultset=$query->row_array();
        /////// gselect all records for  current week /////////////  

	   $sql= "SELECT sale_start_date_time FROM coupons WHERE DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%Y') = '".date('Y',time())."' and
DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%U') = '".($resultset['currentweekno']+1)."' and status=1 and  archive <> 1 order by sale_start_date_time  asc limit 0,1";	
		$query = $this->db->query($sql);
	    $resultset=$query->row_array();
		if(!empty($resultset))
		{
		 return $resultset['sale_start_date_time'];	
		}
		else
		{
		  return '';	
		}
		
	 }
	 
	 
	 public function get_restaurant_images(){
		$this->db->select("*");	
		$this->db->from('restaurant_images');
		$where=array("status" =>1);
		$this->db->where($where);
		
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;	
	}
	
	
	 public function add_edit_restaurant_images($arr){
		
	   if($arr["id"]==""){ 
			return $this->db->insert("restaurant_images",$arr);
			//echo $this->db->last_query();
		}	
		else{
			$this->db->where("id",$arr["id"]);
			 return $this->db->update("restaurant_images",$arr);
		}
	 }
	 
	public function getrestaurant_imagesData($searchdata,$id){
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
		$this->db->from("restaurant_images");
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
		
		
		$where=array('restaurant_id'=>$id,'archive <>'=>1);
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
		//echo $this->db->last_query();
		$resultset=$query->result_array();
		return $resultset;
 }

	public function view_restaurant_images($id){
		
		$this->db->select("*");	
		$this->db->from('restaurant_images');
		$where=array("id" =>$id,"status" => 1);
		$this->db->where($where);
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->row_array();
		return $resultset;	
	}
	public function enable_disable_restaurant_images($id,$status){
		//echo $id;
		//echo $status;
		$this->db->where("id",$id);
		$arr=array("status" => $status);
		return $this->db->update("restaurant_images",$arr);
		//return $this->db->last_query();
	}
	public function delete_restaurant_images($id){
		$this->db->where("id",$id);
		$arr=array("archive"=>1);
		return $this->db->update("restaurant_images",$arr);
		
	//	echo $this->db->last_query();
	}
	
	

	 public function get_restaurant_images_byid($id){
	   //echo $id;
		$this->db->select("image");	
		$this->db->from('restaurant_images');
		$where=array("id" =>$id,"status <> " => 1);
		$this->db->where($where);
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
	 public function get_orderdatadata($id){
	   //echo $id;
		$this->db->select("*");	
		$this->db->from('orders');
		$where=array("id" =>$id);
		$this->db->where($where);
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
	 
	 public function getstates(){
	  $sql= "SELECT * FROM states WHERE id not in ('1','2') and status=1  order by id asc";	
		$query = $this->db->query($sql);
		//echo	$this->db->last_query();die;
	    return $resultset=$query->result_array();
	}
	
	 public function getstatesnamebyid($id){
	  $sql= "SELECT name FROM states WHERE id ='".$id."'";	
		$query = $this->db->query($sql);
		$resultset=$query->row_array();
		return $resultset['name'];
	}
	
	 public function make_order($arr){
	     
	           if($this->db->insert("orders",$arr)){
				   $order_id=$this->db->insert_id();
				   
				   //// update invantory of cpupon //////
				   
				    $this->db->select("quantity");
					$this->db->from("coupons");
					$this->db->where(array("id"=>$arr["coupon_id"]));
					$result=$this->db->get();
					$result=$result->row_array();
					$updatearr["quantity"]=$result["quantity"]-$arr["qty"];	
					$this->db->where(array("id"=>$arr["coupon_id"]));
					$this->db->update("coupons",$updatearr);
					///////////// update user point //////
					
					$this->db->select("points");
					$this->db->from("coupons");
					$this->db->where(array("id"=>$arr["coupon_id"]));
					$result1=$this->db->get();
					$result1=$result1->row_array();
					
					
					$user_id = $this->session->userdata('userid');
					if($user_id!="" && $arr["type"]!="points")   /// for guest user and for point system no rewoard will given pon purchace
					{
						$this->db->select("points");
						$this->db->from("users");
						$this->db->where(array("id"=>$user_id));
						$result2=$this->db->get();
						
						$result2=$result2->row_array();
						$arr_user["points"]=$result2["points"]+($result1["points"]*$arr['qty']);	
						$this->db->where(array("id"=>$user_id));
						$this->db->update("users",$arr_user);
					}
				 return $order_id;
				 }
		       else{
			  return 0;}
	}
	 public function update_user_points($arr){
	   
		$this->db->select("points");
		$this->db->from("users");
		$this->db->where(array("id"=>$arr['user_id']));
		$result=$this->db->get();
		$result=$result->row_array();
		
		$arr_user["points"]=$result["points"]-$arr["points"];	
		$this->db->where(array("id"=>$arr['user_id']));
		if($this->db->update("users",$arr_user))
		{
		return true;	
		}
		else
		{
		return false;
		}
	}
	
	
	 public function make_app_order($arr){
	     
	           if($this->db->insert("orders",$arr)){
				   $order_id=$this->db->insert_id();
				   
				   //// update invantory of cpupon //////
				   
				    $this->db->select("quantity");
					$this->db->from("coupons");
					$this->db->where(array("id"=>$arr["coupon_id"]));
					$result=$this->db->get();
					$result=$result->row_array();
					
					
					$updatearr["quantity"]=$result["quantity"]-$arr["qty"];	
					$this->db->where(array("id"=>$arr["coupon_id"]));
					$this->db->update("coupons",$updatearr);
					
					
					///////////// update user point //////
					
					$this->db->select("points");
					$this->db->from("coupons");
					$this->db->where(array("id"=>$arr["coupon_id"]));
					$result1=$this->db->get();
					$result1=$result1->row_array();
					
					
					$user_id = $arr['user_id'];
					if($user_id!="" && $arr["type"]!="points")
					{
						$this->db->select("points");
						$this->db->from("users");
						$this->db->where(array("id"=>$user_id));
						$result2=$this->db->get();
						$result2=$result2->row_array();
						$arr_user["points"]=$result2["points"]+($result1["points"]*$arr['qty']);
						$this->db->where(array("id"=>$user_id));
						$this->db->update("users",$arr_user);
					}
				 return $order_id;
				 }
		       else{
			  return 0;}
	}
	
	
	
	 public function getordersbyemail($email,$id){
	   
		$this->db->select("orders.*,coupons.coupon_name,coupons.expire_date,restaurants.city,restaurants.state,restaurants.country,restaurants.address,restaurants.phone");	
		$this->db->from('orders');
		$this->db->join("coupons","orders.coupon_id=coupons.id");
		$this->db->join("restaurants","orders.restaurant_id=restaurants.id");
		$where=array('orders.billing_email' => $email,'orders.restaurant_id'=>$id,'orders.mark_delivered' => '1');
		$this->db->where($where);
		$this->db->order_by("status asc");
		$query = $this->db->get();
	   //echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	public function getordersbyphone($phone,$id){
		$this->db->select("orders.*,coupons.coupon_name,coupons.expire_date,restaurants.city,restaurants.state,restaurants.country,restaurants.address,restaurants.phone");	
		$this->db->from('orders');
		$this->db->join("coupons","orders.coupon_id=coupons.id");
		$this->db->join("restaurants","orders.restaurant_id=restaurants.id");
		$where=array('orders.billing_phone' => $phone,'orders.restaurant_id'=>$id,'orders.mark_delivered' => '1');
		$this->db->where($where);
		$this->db->order_by("status asc");
		$query = $this->db->get();
	// echo $this->db->last_query();die;
		return $query->result_array();
	}
	public function getrestaurant_databyid($id){
			$this->db->select('*');
			$this->db->from('restaurants');
			$this->db->where(array('restaurant_id' => $id));
			$query = $this->db->get();
			//echo $this->db->last_query();
			$resultset = $query->row_array();
			return $resultset;
	}
	public function update_order($array){
		
	       
		    $this->db->select('*');
			$this->db->from('orders');
			$this->db->where(array('id' => $array['id']));
			$query = $this->db->get();
			$resultset = $query->row_array();
			
			$result['used_qty']=$resultset['used_qty']+$array['qty'];
			if($result['used_qty']==$resultset['qty'])
			{
			  $result['status']='1';
			}
			$result['used_on']=time();
			$this->db->where("id",$array["id"]);
       		if($this->db->update("orders",$result))
			{
			   $data['order_id']=$array['id'];
			    $data['qty']=$array['qty'];
			   $data['restaurant_id']=$array['rid'];
			   $data['time']=time();
			   $this->db->insert("coupons_redeemed_trackings",$data);
		       return true;
			}
			else
			{
				return false;
			}
	 }
	 
	 
	 
	 
	 function getOrdersdata($searchdata=array())

	{
      
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

		     $sql="select orders.*,coupons.coupon_name,coupons.expire_date,restaurants.city,restaurants.state,restaurants.country,restaurants.address,restaurants.phone from orders  ";
		     $sql.="  join coupons on (orders.coupon_id=coupons.id) ";
		     $sql.=" join restaurants on (orders.restaurant_id=restaurants.id) ";
			 $sql.=" where 1=1";
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
				
				 $sql.=" and orders.time >= '".$from."' and orders.time <='".$to."'";
	        }
			if(isset($searchdata["user_id"])  && $searchdata["user_id"]!="")
			{
			$sql.=" and orders.user_id ='".$searchdata["user_id"]."' ";
			}
			if(isset($searchdata["cid"])  && $searchdata["cid"]!="")
			{
			$sql.=" and orders.coupon_id ='".$searchdata["cid"]."' ";
			}
			if(isset($searchdata["state"])  && $searchdata["state"]!="")
			{
			$sql.=" and restaurants.state ='".$searchdata["state"]."' ";
			}
			 $sql.="  order by orders.id desc";
		     if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
             {
             if($recordperpage!="" && ($startlimit!="" || $startlimit==0))
             {
                $sql.=" limit $startlimit,$recordperpage";
				//$this->db->limit($recordperpage,$startlimit);
             }
           }
          $query = $this->db->query($sql);
      //  echo $this->db->last_query();die;
		$resultset=$query->result_array();

		return $resultset;

	}


    public function getordersbyid($id){
	   
		$this->db->select("orders.*,coupons.coupon_name,coupons.expire_date,restaurants.city,restaurants.state,restaurants.country,restaurants.address,restaurants.phone");	
		$this->db->from('orders');
		$this->db->join("coupons","orders.coupon_id=coupons.id");
		$this->db->join("restaurants","orders.restaurant_id=restaurants.id");
		$where=array('orders.id' => $id,'orders.mark_delivered' => '1');
		$this->db->where($where);
		$this->db->order_by("status asc");
		$query = $this->db->get();
	  // echo $this->db->last_query();die;
		return $query->row_array();
	}
	
	 public function order_details($id){
	   
		$this->db->select("*");	
		$this->db->from('coupons_redeemed_trackings');
	     $where=array('coupons_redeemed_trackings.order_id' => $id);
		$this->db->where($where);
		$this->db->order_by("time asc");
		$query = $this->db->get();
	     //echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	public function get_state($id){
	   
		$this->db->select("*");	
		$this->db->from('states');
	     $where=array('id' => $id);
		$this->db->where($where);
		
		$query = $this->db->get();
	     //echo $this->db->last_query();die;
		$result= $query->row_array();
		return $result['name'];
	}
	
	public function make_delivered($id){
	   
	$this->db->where("id",$id);
	$arr=array("mark_delivered" => 1);
    if($this->db->update("orders",$arr))
    {
	 return  true;   
    }else {return  false;   } 
  }
  
  
  
	  public function get_cuurentwek_data_app()
	  {
		/////// get cuurent week count from year first week /////////////
			$sql1="SELECT week(NOW(),0) as currentweekno";
			$query = $this->db->query($sql1);
			$resultset=$query->row_array();
			/////// gselect all records for  current week /////////////  
			$sql= "SELECT group_concat(id) as coupon_id FROM coupons WHERE DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%Y') = '".date('Y',time())."' and
	DATE_FORMAT(FROM_UNIXTIME(sale_start_date_time), '%U') = '".$resultset['currentweekno']."' and status=1 and  archive <> 1 order by id desc limit 0,4";	
			$query = $this->db->query($sql);
		//echo	$this->db->last_query();die;
			$resultset=$query->row_array();
			
			$sql_q="select * from comming_soon_requests where coupon_id in (".$resultset['coupon_id'].") and app_notification=1 and status=1";
			$query = $this->db->query($sql);
			return $resultset=$query->result_array();  
		  
	  }
	  
	  public function getuserorders($id){
	   
	   
	    $sql="select count(*) as count from orders where user_id in ($id)";
		$query = $this->db->query($sql);
		$resultset=$query->row_array();
		return $resultset['count'];
	}
	
	
	 function getOrdersgross($searchdata)
    {
      
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

		     $sql="select  sum(amount) as totalamount from orders";
		     $sql.="  join coupons on (orders.coupon_id=coupons.id) ";
		     $sql.=" join restaurants on (orders.restaurant_id=restaurants.id) ";
			 $sql.=" where 1=1";
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
				
				$sql.=" and orders.time >= '".$from."' and orders.time <='".$to."'";
	        }
			if(isset($searchdata["state"])  && $searchdata["state"]!="")
			{
			$sql.=" and restaurants.state ='".$searchdata["state"]."' ";
			}
			
			if(isset($searchdata["user_id"])  && $searchdata["user_id"]!="")
			{
			$sql.=" and orders.user_id ='".$searchdata["user_id"]."' ";
			}
				
		   if(isset($searchdata["cid"])  && $searchdata["cid"]!="")
			{
			$sql.=" and orders.coupon_id ='".$searchdata["cid"]."' ";
			}		
				$sql.=" and orders.type = 'price' ";
			 $sql.="  order by orders.id desc";
		     if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
             {
             if($recordperpage!="" && ($startlimit!="" || $startlimit==0))
             {
                $sql.=" limit $startlimit,$recordperpage";
				//$this->db->limit($recordperpage,$startlimit);
             }
           }
          $query = $this->db->query($sql);
      //  echo $this->db->last_query();die;
		$resultset=$query->result_array();

		return $resultset;

	}

	 function getOrderstotal($searchdata)
    {
      
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

		     $sql="select count(*) as count from orders";
		     $sql.="  join coupons on (orders.coupon_id=coupons.id) ";
		     $sql.=" join restaurants on (orders.restaurant_id=restaurants.id) ";
			 $sql.=" where 1=1";
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
			
				 $sql.=" and orders.time >= '".$from."' and orders.time <='".$to."'";
	        }
			if(isset($searchdata["state"])  && $searchdata["state"]!="")
			{
			$sql.=" and restaurants.state ='".$searchdata["state"]."' ";
			}
			
			if(isset($searchdata["user_id"])  && $searchdata["user_id"]!="")
			{
			$sql.=" and orders.user_id ='".$searchdata["user_id"]."' ";
			}
			if(isset($searchdata["cid"])  && $searchdata["cid"]!="")
			{
			$sql.=" and orders.coupon_id ='".$searchdata["cid"]."' ";
			}	
			 $sql.="  order by orders.id desc";
		     if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
             {
             if($recordperpage!="" && ($startlimit!="" || $startlimit==0))
             {
                $sql.=" limit $startlimit,$recordperpage";
				//$this->db->limit($recordperpage,$startlimit);
             }
           }
          $query = $this->db->query($sql);
      //  echo $this->db->last_query();die;
		$resultset=$query->result_array();

		return $resultset;

	}
	
	 function getOrdersstats($searchdata,$type)
    {
   
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

		     $sql="select count(*) as count from orders";
		     $sql.="  join coupons on (orders.coupon_id=coupons.id) ";
			 $sql.=" join restaurants on (orders.restaurant_id=restaurants.id) ";
			 $sql.="  left join users on (orders.user_id=users.id) ";
			 $sql.=" where 1=1";
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
			
				 $sql.=" and orders.time >= '".$from."' and orders.time <='".$to."'";
	        }
			if(isset($searchdata["state"])  && $searchdata["state"]!="")
			{
			$sql.=" and restaurants.state ='".$searchdata["state"]."' ";
			}
			if(isset($searchdata["user_id"])  && $searchdata["user_id"]!="")
			{
			$sql.=" and orders.user_id ='".$searchdata["user_id"]."' ";
			}
			 if(isset($searchdata["cid"])  && $searchdata["cid"]!="")
			{
			$sql.=" and orders.coupon_id ='".$searchdata["cid"]."' ";
			}
			
			if($type=='male' || $type=='female')
			{
				 $sql.=" and users.sex = '".$type."'";
			}
			else {
				$sql.=" and orders.device = '".$type."'";
			}
			
			
			$sql.="  order by orders.id desc";
		     if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
             {
             if($recordperpage!="" && ($startlimit!="" || $startlimit==0))
             {
                $sql.=" limit $startlimit,$recordperpage";
				//$this->db->limit($recordperpage,$startlimit);
             }
           }
          $query = $this->db->query($sql);
        // echo $this->db->last_query();
		$resultset=$query->result_array();

		return $resultset;

	}
	
	 public function getcouponsData($searchdata){
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
		$this->db->select("coupons.*");
		$this->db->from("coupons");
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
			
			$where=array('coupons.sale_start_date_time >='=> $from,'coupons.sale_start_date_time <= '=>$to);
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
		
		if(isset($searchdata["restaurant"]) && $searchdata["restaurant"]!="")
		{
			
		  $this->db->where('restaurants.id', trim($searchdata["restaurant"]));
		}
		
		
		$where=array('coupons.archive <> '=>'1');
		$this->db->where($where);
		$this->db->order_by("coupons.id DESC");
		
		
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
 
  public function add_edit_surcharges($arr){
		
	   if($arr["id"]==""){ 
	          return $this->db->insert("surchagers",$arr);
		 }	
		else{
			
			$this->db->where("id",$arr["id"]);
       		 return $this->db->update("surchagers",$arr);
		}
	 }
	public function getsurchargeData(){
		$this->db->select("*");	
		$this->db->from('surchagers');
		$where=array("status" =>1);
		$this->db->where($where);
		
		$query = $this->db->get();
	   
		$resultset=$query->row_array();
		return $resultset;	
	}
	  
}
?>