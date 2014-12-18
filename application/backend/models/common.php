<?php 
class common extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$http="";
		if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]=="on")
		{
			$http="http://";	
		}
		else
		{
			$http="https://";	
		}
		$prevurl=array("prevurl"=>base_url());
		$this->session->set_userdata($prevurl);
		$this->session->set_userdata("currenturl",base_url());
    }
	//RG function to ensure uniq random entry in a table
	public function user_uniq($table, $column, $length){
	  $uniq = $this->random_generator($length);
	  
	  $sql = "SELECT count(*) from $table where $column='$uniq'";
	  $exec = mysql_query($sql);
	  list($num) = mysql_fetch_row($exec);
	  if($num == 0){return $uniq;}
	  else{return user_uniq($table, $column, $length);}
	 }

	public function get_extension($file_name = NULL){
		$ext = explode('.', $file_name);
		$ext = array_pop($ext);
		//print_r($this->config->item("allowedimages"));die;
		if(!in_array($ext,$this->config->item("allowedimages"))){
			$this->session->set_flashdata("errormsg","Wrong file format only jpg,png,gif allowded");
		}
		else{
			return strtolower($ext);
		}
	}
	
	function validate_email($email = NULL)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);	
	}
	
	//to check login status
	public function check_authentication() {
		$admin = $this->config->item('backend');
               
	  $controllername=$this->router->class;
	  $methodname=$this->router->method;
	
	  if(($controllername=="login") && $methodname!="logout")
	  {
  		 $username=$this->session->userdata("username");
  		 if(isset($username) && $username!="")
  		 {
  		  redirect("dashboard"); 
  		 }
 	  }
	  
 	 if($controllername !="login"){
                
	  	 if($this->config->item("usertype")=="admin"){
                     $email = $this->session->userdata('email');
                     if(isset($email) and !empty($email)){
			  $this->db->select("email");
			  $this->db->from("users");
              $this->db->where('email', $this->session->userdata('email'));
			  $query=$this->db->get();
			  $resultset=$query->result();
                         
			  if(count($resultset)<1)
                          {
                              
                              redirect ('login');
                          }
                     }
                      else
                      {
                          redirect('login');
                      }
			 
		 }
	   }
       
	}
	public function checkpasswordvalidity($arr = NULL)
	{
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where("username",$this->session->userdata("username"));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
		
		if($this->validateHash($arr["oldpassword"],$result["password"])){
			return false;	
		}	
		else{
			return true;	
		}
	}
	//update user profile data
	public function update_profile($arr = NULL)
	{
		//2736f2f2cb760b84488b342f26e6210e:xl
		$newarr["password"] = $this->salt_password(array("password" => $arr["newpassword"]));
		if(isset($arr["username"]) && $arr["username"]!="")
		{
			$newarr["username"] = $arr["username"];
		}
		return $this->db->update("admin",$newarr);
	}
	
	//remove parameter from url
	public function removeUrl($parametername = NULL,$querystring = NULL)
	{
		$newquerystring="";
		$querystring=explode("&",$querystring);
			
		foreach($querystring as $key=>$val)
		{
			$newval=explode("=",$val);
			if($newval[0]!="")
			{
				if($newval[0]!=$parametername)
				{
					$newquerystring.="&".$newval[0]."=".$newval[1];	
				}
			}
		}		
		
		$newquerystring=substr($newquerystring,1,strlen($newquerystring));
		
		return $newquerystring;
	}
	
	public function addUrl($parametername = NULL,$parametervalue = NULL,$querystring = NULL)
	{
		
		//echo $parametername."=".$parametervalue;		
		$querystring=explode("&",$querystring);
		$newquerystring="";
		$i=0;
		if(count($querystring)!=0 && $querystring[0]!="")
		{
			foreach($querystring as $key=>$val)
			{
					$valnew=explode("=",$val);
					if($valnew[0]!=$parametername)
					{
						$newquerystring.="&".$valnew[0]."=".$valnew[1];
					}
					else
					{
						$newquerystring.="&".$parametername."=".$parametervalue;	
						$i=1;
					}
			}
		}
		if($i==0)
		{
				$newquerystring.="&".$parametername."=".$parametervalue;
		}
		return $newquerystring=substr($newquerystring,1,strlen($newquerystring));
	}
	//to checl user login status 	
	public function is_logged_in(){
		
   		 $is_logged_in = $this->session->userdata('is_logged_in');
		 if($is_logged_in != true){
			$this->session->set_flashdata("errormsg","Authentication failed. You need to login to access this page");
			redirect(base_url()."users/sign_in");
			return false;
       		// echo 'You need to login to access this page';
       		 //die();
  		 }
		 else{
			  $this->db->select("*");
			  $this->db->from("users"); 
			  $this->db->where(array("id"=>$this->session->userdata("userid"),"archive <>"=>"1"));
			  $result=$this->db->get();
			  $row=$result->row_array();
			  $num_row = $result->num_rows();
		     
		       $err=0;
			  if($num_row == 0){
			  	 $err =1; 
			  }
			  else
			  {
				   $data_array= array("userid"=>$row['id']);
				   $this->session->set_userdata($data_array);
				   $err=0;
			  }
			  if($err==1)
			  {
			   redirect(base_url()."users/sign_in");
			  }
		 }
	}
	
	//to checl user login status 	
	public function is_admin_logged_in(){
		
   		 $is_logged_in = $this->session->userdata('is_admin_logged_in');
		 if($is_logged_in != true){
			$this->session->set_flashdata("errormsg","Authentication failed. You need to login to access this page");
			redirect(base_url()."admin/login");
			return false;
       		// echo 'You need to login to access this page';
       		//die();
  		 }
		 else{
			 /* $this->db->select("*");
			  $this->db->from("admin"); 
			  $this->db->where(array("username"=>$this->session->userdata("username")));
			  $result=$this->db->get();
			  $row=$result->row_array();
			  $num_row = $result->num_rows();
		     
		       $err=0;
			  if($num_row == 0){
			  	 $err =1; 
			  }
			  else
			  {
				   $data_array= array("username"=>$row['username']);
				   $this->session->set_userdata($data_array);
				   $err=0;
			  }
			  if($err==1)
			  {
			   redirect(base_url()."admin/login");
			  }*/
		 }
	}
	
	//login user and set session 
	public function authenticateUserLogin($loginarray = NULL)
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where(array("email" => $loginarray["email"],"archive <>"=>"1","status <>"=>"0"));
		$result=$this->db->get();
		//echo $this->db->last_query();
		 $countrows=$result->num_rows();
		
		$result=$result->row_array();
		
		if($loginarray["email"] == ""){
			$this->session->set_flashdata("errormsg","Authentication failed. Invalid email");
			return false;	
		}
		else if($loginarray["password"] == ""){
			$this->session->set_flashdata("errormsg","Authentication failed. Invalid Password");
			return false;	
		}
	    else if($this->validateHash($loginarray["password"],$result["password"]))
		{
		
			$this->session->set_userdata("userid",$result["id"]);
			$this->session->set_userdata("first_name",$result["first_name"]);
			$this->session->set_userdata("last_name",$result["last_name"]);
			$this->session->set_userdata("email",$result["email"]);
			$this->session->set_userdata("user_type",$result["user_type"]);
			$this->session->set_userdata("is_logged_in",true);
			return true;
		}
		else
		{
			$this->session->set_flashdata("errormsg","Authentication failed. Invalid email/password or your account is not Verified Yet");
			return false;	
		}
	}
	//make encrypted. password
	public function salt_password($arr = NULL){
		//print_r($arr["password"]);die;
		 $salt_key = $this->common->random_generator(2);
		 $pas = md5($salt_key. $arr["password"]);
		 $column = ':';
		 return $pas.$column.$salt_key;
	}
	
	public function validateHash($password = NULL, $hash = NULL)
	{
		$hashArr = explode(':', $hash);
		if(md5($hashArr[1].$password) === $hashArr[0])
		{
			//echo "matched";die;
			return true;	
		}
		else
		{//
			//echo "not matched";die;
			return false;	
		}
	}
	//to empty session values
	public function empty_filed()
	{
		return  $this->session->unset_userdata('tempdata'); 
	}
	//check blog name already exists
	public function check_blog_name($arr = NULL){
		
		$this->db->select("name");
		$this->db->from("blog");	
		if($arr["id"] == ""){
			$this->db->where(array("name"=>$arr["name"],"archive <>" => "1"));
		}
		else{
			$this->db->where(array("name"=>$arr["name"],"archive <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	//check email already exists
	public function validate_email_exist($arr = NULL){
		
		$this->db->select('email');
		$this->db->from('users');
		if($arr["id"] == ""){
			$this->db->where(array("email" => $arr["email"],"archive <>" => "1"));
		}
		else{
			$this->db->where(array("email" => $arr["email"],"archive <>" => "1","id <>" => $arr["id"]));
		}
		$query = $this->db->get();
		//$this->db->last_query();
		$resultset = $query->num_rows();
		
		if($resultset==0)
		{
			return true;
	    }
		else
		{
			return false;	
		}	
	}
	public function validate_coupon_email_exist($arr = NULL){
		
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where(array("email" => $arr["email"],"archive <>" => "1"));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->num_rows();
		
		if($resultset==0)
		{
			return false;
	    }
		else
		{
			return true;	
		}	
	}
	public function validate_forgot_email_exist($arr = NULL){
		
		$this->db->select('email');
		$this->db->from('users');
		if($arr["id"] == ""){
			$this->db->where(array("email" => $arr["email"],"archive <>" => "1"));
		}
		else{
			$this->db->where(array("email" => $arr["email"],"archive <>" => "1","id <>" => $arr["id"]));
		}
		$query = $this->db->get();
		//echo	$this->db->last_query();die;
		$resultset = $query->num_rows();
		
		if($resultset==0)
		{
			return false;
	    }
		else
		{
			return true;	
		}	
	}
			
	//check user name already exists
	public function validate_username_exist($arr = NULL){
		
		$this->db->select("username");
		$this->db->from("users");
		
		if($arr["id"] == ""){
			$this->db->where(array("username" => $arr["username"],"archive <>" => "1"));
		}
		else{
			$this->db->where(array("username" => $arr["username"],"archive <>" => "1","id <>" => $arr["id"]));
		}
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$resultset = $query->num_rows();
		
		if($resultset==0)
		{
			return true;
	    }
		else
		{
			return false;	
		}	
	}
	public function random_generator($digits = NULL){
    // function starts
		srand((double) microtime() * 10000000);
		$input = array("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a", "b", "c", "d", "e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$random_generator="";
		// Initialize the string to store random numbers
		for ($i=1; $i<=$digits; $i++) {
			// Loop the number of times of required digits
			if (rand(1,2) == 1) {
				// to decide the digit should be numeric or alphabet
				// Add one random alphabet
				$rand_index = array_rand($input);
				$random_generator .=$input[$rand_index];
				// One char is added
			} else {
				// Add one numeric digit between 1 and 9
				$random_generator .=rand(1,9);
				// one number is added
			}
			// end of if else
		}
		// end of for loop
		return $random_generator;
	}
	public function check_state_name($arr = NULL){
		
		$this->db->select("name");
		$this->db->from("states");	
		if($arr["id"] == ""){
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1"));
		}
		else{
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	public function check_city_name($arr = NULL){
		/*echo "<pre>";
		print_r($arr);
		die;*/
		$this->db->select("name");
		$this->db->from("cities");	
		if($arr["id"] == ""){
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1"));
		}
		else{
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		//echo  $this->db->last_query();die;
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	public function check_region_name($arr = NULL){
		/*echo "<pre>";
		print_r($arr);
		die;*/
		$this->db->select("name");
		$this->db->from("regions");	
		if($arr["id"] == ""){
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1"));
		}
		else{
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		//echo  $this->db->last_query();die;
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	public function check_category_name($arr = NULL){
		/*echo "<pre>";
		print_r($arr);
		die;*/
		$this->db->select("name");
		$this->db->from("food_club_category");	
		if($arr["id"] == ""){
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1"));
		}
		else{
			$this->db->where(array("name"=>$arr["name"],"archived <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		//echo  $this->db->last_query();die;
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
///===================================================================================================/
	public function check_ingredients_name_availability($ingredientsarr = NULL)
	{
		$this->db->select('*');
		$this->db->from('ad_on_ingredients');
		if($ingredientsarr['id']=='')
		{
			$this->db->where(array('ingredient_name'=>$ingredientsarr['ingredient_name'],"ingredient_archived <>"=>'1'));
		}
		else
		{
			$this->db->where(array('ingredient_name'=>$ingredientsarr['ingredient_name'],"id <>"=>$ingredientsarr['id'],"ingredient_archived <>"=>'1'));
		}
		$query=$this->db->get();
		$resultset=$query->num_rows();
		
		if($resultset==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}		
	}
public function check_size_name_group_availability($groupsizearr = NULL)
{
	
	$this->db->select('*');
	$this->db->from('size_attributes');
	$this->db->join("food_group_sizes","food_group_sizes.attribute_value=size_attributes.id");
	if($groupsizearr["id"] == ""){
		$this->db->where(array('food_group_sizes.food_group_id'=>$groupsizearr['food_group_id'],'size_attributes.attribute_name' => $groupsizearr['attribute_name'],'attribute_status'=>1));
	}
	else{
		$this->db->where(array('food_group_sizes.food_group_id'=>$groupsizearr['food_group_id'],'size_attributes.attribute_name' => $groupsizearr['attribute_name'],'attribute_status'=>1,"food_group_sizes.id <> " => $groupsizearr["id"]));
	}
	$query=$this->db->get();
	$resultset=$query->num_rows();
	//echo $this->db->last_query();die;
	
	if($resultset==0)
	{
		return true;	
	}
	else
	{
		return false;	
	}	
	
}	
	public function get_time_stamp($date = NULL){
		$date=explode("-",$date);
		$date=$date[2]."-".$date[1]."-".$date[0];//d-m-y
		$time=strtotime($date);
		return $time;	
	}
	//logged in person coins
	public function my_coins(){
		
		$this->db->select('coins');
		$this->db->from('users');
		$this->db->where(array('id' => $this->session->userdata("userid")));
		$result=$this->db->get();
		$num = $result->num_rows();
		//echo  $this->db->last_query();die;
		$result = $result->row_array();
		if($num==0)
		{
			$data = 0;	
		}
		else
		{
			$data = $result["coins"];	
		}	
		return $data;
	}
	public function user_name($id = NULL){
		$this->db->select('first_name,last_name');
		$this->db->from('users');
		$this->db->where(array('id' => $id,"archive <> "=>1));
		$result=$this->db->get();
		$num = $result->num_rows();
		//echo  $this->db->last_query();die;
		$result = $result->row_array();
		if($num==0)
		{
			$data = 0;	
		}
		else
		{
			$data = ucfirst($result["first_name"]." ".$result["last_name"]);	
		}	
		return $data;
	}
	public function coins_byid($id = NULL){
		
		$this->db->select('coins');
		$this->db->from('food_club_offers');
		$this->db->where(array('id' => $id,"status" =>1,"archived <> "=>1));
		$result=$this->db->get();
		$num = $result->num_rows();
		//echo  $this->db->last_query();die;
		$result = $result->row_array();
		if($num==0)
		{
			$data = 0;	
		}
		else
		{
			$data = $result["coins"];	
		}	
		return $data;
	}
	public function check_group_name($arr = NULL){
		
		$this->db->select("fg_name");
		$this->db->from("food_groups");	
		if($arr["id"] == ""){
			$this->db->where(array("fg_name"=>$arr["fg_name"],"fg_archived <>" => "1"));
		}
		else{
			$this->db->where(array("fg_name"=>$arr["fg_name"],"fg_archived <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		//echo  $this->db->last_query();die;
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	public function check_ingredients_group_name($arr = NULL){
		
		$this->db->select("ingredient_id");
		$this->db->from("food_group_ingredients");	
		if($arr["id"] == ""){
			$this->db->where(array("food_group_id" => $arr["food_group_id"],"ingredient_id"=>$arr["ingredient_id"],"fgi_archived <>" => "1"));
		}
		else{
			$this->db->where(array("food_group_id" => $arr["food_group_id"],"ingredient_id"=>$arr["ingredient_id"],"fgi_archived <>" => "1","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		//echo  $this->db->last_query();die;
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	public function check_availability($arr = NULL){
		
		if($arr["id"]==""){
			if($arr["available"] > $this->common->get_time_stamp(date('Y-m-d'))){
				return true;
			}
		}
		else if($arr["id"] != ""){
			/*echo $arr["available"]."<br/>";
			echo $this->common->get_time_stamp(date('Y-m-d'));die;*/
			if($arr["available"] < $this->common->get_time_stamp(date('Y-m-d'))){
				return true;
			}
		}
		else{
			return false;
		}
	 }
	 
	 
	 public function convert_date($arr){
		
		  
		    $from_data=explode(' ',$arr);
			$from_data1=explode('/',$from_data[0]);
			$from_data2=explode(':',$from_data[1]);
			 $from = strtotime($from_data1[1]."-".$from_data1[0]."-".$from_data1[2]." ".$from_data2[0].":".$from_data2[1].":00 ".$from_data[2]);

		   
        return $from;
	 }
	 
	 public function check_zip($arr){
		 
		$this->db->select("zip");
		$this->db->from("regions");	
		 if($arr["id"] == ""){
			$this->db->where(array("zip" => $arr["zip"],"archived <>" => "1"));
		 }
		 else{
			 $this->db->where(array("zip" => $arr["zip"],"archived <>" => "1","id <>"=>$arr["id"]));
		 }
		$result=$this->db->get();
		//echo  $this->db->last_query();die;
		$resultset = $result->num_rows();
		
		if($resultset==0)
		{
			return false;
	    }
		else
		{
			return true;	
		}	
	 }
	 
	 public function get_coupon_by_rest_id($id){
		 
		$this->db->select("*");
		$this->db->from("coupons");	
	    $this->db->where(array("restaurant_id" => $id,"archive <>" => "1","status "=>1));
		$result=$this->db->get();
		$num = $result->num_rows();
		//echo  $this->db->last_query();die;
		$result = $result->result_array();
		if($num == 0)
		{
			$data = 0;	
		}
		else
		{
			$data = $result;	
		}	
		return $data;
	 }
}
if(FRONTPATH !="frontend")
{
	$common= new common;	
	$common->check_authentication();
}