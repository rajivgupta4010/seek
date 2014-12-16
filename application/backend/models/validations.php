<?php 
class validations extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }
	//reset password
	public function validate_change_password($arr)
	{
		if($arr["oldpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter Current password");	
			$err=1;	
		}	
		else if($arr["newpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter new password");	
			$err=1;	
		}
		else if(preg_match('/[#$@%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["newpassword"]))
		{
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in new password");
			$err=1;	
		}	
		else if(strlen($arr["newpassword"]) < 5 || strlen($arr["newpassword"]) > 10)
		{
			$this->session->set_flashdata("errormsg","Your password must be between 5 and 10 characters long ");
			$err=1;	
		}
		else if($arr["confirmnewpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please confirm your password");	
			$err=1;	
		}
		else if(preg_match('/[#$@%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["confirmnewpassword"]))
		{
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in confirm password");
			$err=1;	
		}
		else if($arr["confirmnewpassword"]!=$arr["newpassword"])
		{
			$this->session->set_flashdata("errormsg","new password and confirm password should match.");	
			$err=1;	
		}
		
		else
		{
			$err=0;	
		}
		if($err==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	
		
	/******************************************Profile validation starts ****************************************/
	public function validatepasswords($arr)
	{
		if($arr["oldpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter old password");	
			$err=1;	
		}	
		else if($this->common->checkpasswordvalidity($arr))
		{
			$this->session->set_flashdata("errormsg","Wrong old password");	
			$err=1;	
		}
		else if($arr["newpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter new password");	
			$err=1;	
		}
		else if(preg_match('/[#$@%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["newpassword"]))
		{
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in new password");
			$err=1;	
		}
		else if(strlen($arr["newpassword"]) < 5 || strlen($arr["newpassword"]) > 15)
		{
			$this->session->set_flashdata("errormsg","Your password must be between 5 and 15 characters long ");
			$err=1;	
		}
		else if($arr["confirmnewpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please confirm your password");	
			$err=1;	
		}
		
		else if($arr["newpassword"]!=$arr["confirmnewpassword"])
		{
			$this->session->set_flashdata("errormsg","Both passwords do not matches");	
			$err=1;	
		}
		else
		{
			$err=0;	
		}
		if($err==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	public function update_password($arr)
	{
		$err=0;
		if($arr["password"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter your password");
			$err=1;	
		}	
		else if($arr["confirmpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please confirm your password");
			$err=1;	
		}
			
		
		if($err==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}

	
	public function validate_user_admin($arr){
		   
		  
		   if($arr["email"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter Email Id");	
			}
			else if(!$this->common->validate_email($arr["email"]))
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Email should be valid");	
			}
			else if(!$this->common->validate_email_exist($arr))
			{
				$this->session->set_flashdata("errormsg","This email  already exists");
				$err=1;	
			}
			else if($arr["id"]=="" && $arr["password"]=="")
			{
				$err=1;	
				$this->session->set_flashdata("errormsg","Please enter password");
			}
			
			else if($arr["password"]!="" && (strlen($arr["password"]) < 6 || strlen($arr["password"]) > 15))
			{
					
				$err=1;	
				$this->session->set_flashdata("errormsg","Your password must be between 6 and 15 characters long ");
					
			}
			else if($arr["sex"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please choose Gender");	
			}
		    else
			{
			  $err = 0;
			}
			if($err==1)
			{
				return false;	
			}	
			else
			{
				return true;	
			}
	
	}
	
	/* signup function start*/
	public function add_sign_up($arr){
		
			$err=0;
		   if($arr["first_name"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter first name");	
			}
			else if(preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["first_name"]))
			{
				$this->session->set_flashdata("errormsg","Spacial characters are not allowed in first name");
				$err=1;	
			}
			else if($arr["last_name"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter last name");	
			}
			else if(preg_match('/[#@$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["last_name"]))
			{
				$this->session->set_flashdata("errormsg","Spacial characters are not allowed in lastname");
				$err=1;	
			}
			else if($arr["email"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter Email Id");	
			}
			else if(!$this->common->validate_email($arr["email"]))
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Email should be valid");	
			}
			else if(!$this->common->validate_email_exist($arr))
			{
				$this->session->set_flashdata("errormsg","This email  already exists");
				$err=1;	
			}
			else if($arr["username"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter username");	
			}
			else if(preg_match('/[#@$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["username"]))
			{
				$this->session->set_flashdata("errormsg","Spacial characters are not allowed in username");
				$err=1;	
			}
			else if(!$this->common->validate_username_exist($arr))
			{
				$this->session->set_flashdata("errormsg","This username already exists");
				$err=1;	
			}
			else if($arr["password"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter password");	
			}
			else if(strlen($arr["password"]) < 6 || strlen($arr["password"]) > 15)
			{
				$this->session->set_flashdata("errormsg","Your password must be between 8 and 15 characters long ");
				$err=1;	
			}
			else if($arr["cpassword"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please Enter Confirm password");	
			}
			else if(strlen($arr["cpassword"]) < 6 || strlen($arr["cpassword"]) > 15)
			{
				$this->session->set_flashdata("errormsg","Your password must be between 8 and 15 characters long ");
				$err=1;	
			}
			else if($arr["cpassword"] != $arr["password"])
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Both password did not matches");	
			}
			else if($arr["zip"] == "")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please Enter zip");	
			}
			else if($arr["address"] == "")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please Enter address");	
			}
			else if($arr["phone"] == "")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please Enter phone number.");	
			}
			else if(!preg_match('/^\d{3}-\d{3}-\d{4}$/',$ccarr["billing_phone"]))
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter valid phone number.");	
			}
			else {
				$err=0;
			}
			if($err==1)
			{
				return false;	
			}	
			else
			{
				return true;	
			}
			
		}

	public function edit_sign_up($arr){
			
			if($arr["first_name"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter first name");	
			}
			else if(preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["first_name"]))
			{
				$this->session->set_flashdata("errormsg","Spacial characters are not allowed in first name");
				$err=1;	
			}
			else if($arr["last_name"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter last name");	
			}
			else if(preg_match('/[#@$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["last_name"]))
			{
				$this->session->set_flashdata("errormsg","Spacial characters are not allowed in lastname");
				$err=1;	
			}
			else if($arr["phone"] == "")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please Enter phone");	
			}
			else if(!preg_match('/^\d{3}-\d{3}-\d{4}$/',$arr["phone"]))
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter valid phone number (e:g 333-333-3333).");	
			}
			
			else if($arr["email"]=="")
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter Email Id");	
			}
			
			else if(!$this->common->validate_email($arr["email"]))
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Email should be valid");	
			}
			else if(!$this->common->validate_email_exist($arr))
			{
				$this->session->set_flashdata("errormsg","This email  already exists");
				$err=1;	
			}
			else if($arr["password"] != "")
			{
				if(strlen($arr["password"]) < 6 || strlen($arr["password"]) > 15){
					$err=1;	
					$this->session->set_flashdata("errormsg","Your password must be between 6 and 15 characters long.");
				}
				else if($arr["new_password"]=="")
				{
				    $err=1;	
					$this->session->set_flashdata("errormsg","Please enter new password.");	
				}
				else if($arr["new_password"]=="" && (strlen($arr["password"]) < 6 || strlen($arr["password"]) > 15)){
					$err=1;	
					$this->session->set_flashdata("errormsg","Your password must be between 6 and 15 characters long.");
				}
				else if($arr["cpassword"] != $arr["new_password"])
				{
					$err=1;	
					$this->session->set_flashdata("errormsg","New Password and confirm password must match.");
				}
				
			}
			/*else if($arr["new_password"] !="")
			{
				if(strlen($arr["password"]) < 6 || strlen($arr["password"]) > 15){
					$err=1;	
					$this->session->set_flashdata("errormsg","Your password must be between 6 and 15 characters long.");
				}
			}
			else if($arr["cpassword"] != $arr["new_password"])
			{
				$err=1;	
			    $this->session->set_flashdata("errormsg","New Password and confirm password must match.");
			}*/
		
			
			else{
				$err=0;
			}
			if($err==1)
			{
				return false;	
			}	
			else
			{
				return true;	
			}
	}
	
	


	public function validate_forgot_password($arr){
		
		/*echo "<pre>";
		print_r($arr);die;*/
		if($arr["email"] == ""){
			$this->session->set_flashdata("errormsg","Please enter email");	
			$err=1;
		}
		else if(!$this->common->validate_email($arr["email"])){
			$err=1;
			$this->session->set_flashdata("errormsg","Email should be valid");	
		}
		else if(!$this->common->validate_forgot_email_exist($arr)){
			$this->session->set_flashdata("errormsg","This email  doesnot  exists in our database");
			$err=1;	
		}
		else{
			$err=0;	
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	//slideshow page
	public function validate_slideshow_data($slideshowarray){
		
		
		if($slideshowarray["title"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter title");
			$err=1;		
		}
		else if($slideshowarray["discription"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter discription");
			$err=1;		
		}
		
		else if($slideshowarray["image"]==""  && $slideshowarray["id"]=="")
		{
			$this->session->set_flashdata("errormsg","Please select image");
			$err=1;		
		}
		else if(isset($slideshowarray["sld_images"]) && $slideshowarray["sld_images"]!="" && !in_array($this->common->get_extension($slideshowarray["images"]),$this->config->item("allowedimages")))
		{
			$this->session->set_flashdata("errormsg","File type is not valid");
			$err=1;	
		}
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
			
	}

   public function validate_restaurants_data($arr){
		
		if($arr["restaurant_id"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter restaurant id");
			$err=1;		
		}
		else if($arr["restaurant_name"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter name");
			$err=1;		
		}
		else if($arr["address"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter address");
			$err=1;		
		}
		else if($arr["city"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter city");
			$err=1;		
		}
		else if($arr["state"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter state");
			$err=1;		
		}
		
		else if($arr["country"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter country");
			$err=1;		
		}
		else if($arr["zip"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter postal code");
			$err=1;		
		}
		else if(trim($arr["phone"])=="")
		{
			$this->session->set_flashdata("errormsg","Please enter phone");
			$err=1;	
		}
		else if(!preg_match('/^\d{3}-\d{3}-\d{4}$/',$arr["phone"]))
			{
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter valid phone number (e:g 333-333-3333).");	
			}
		
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
			
	}
 public function validate_menus_data($arr){
	 
		
		if($arr["menu_name"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter menu name");
			$err=1;		
		}
		if($arr["restaurant_id"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please select restaurant id");
			$err=1;		
		}
		else if($arr["details"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter detail");
			$err=1;		
		}
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
			
	}


  public function validate_coupons_data($arr){
	 
		
		if($arr["coupon_name"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter coupon name");
			$err=1;		
		}
		if(strlen($arr["coupon_name"]) > 20 )
		{
			$this->session->set_flashdata("errormsg","coupon name can't more then 20 chrecters.");
			$err=1;		
		}
		else if($arr["restaurant_id"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please select restaurant id");
			$err=1;		
		}
		/*else if($arr["price"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter price");
			$err=1;		
		}*/
		else if($arr["price"]!="" && !preg_match('/^[0-9 \.+-]+$/i', $arr["price"]))
		{
			$this->session->set_flashdata("errormsg","Coupon price must be numeric");
			$err=1;	
		}
		else if($arr["points"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter points");
			$err=1;		
		}
		else if(!preg_match('/^[0-9 \.+-]+$/i', $arr["points"]))
		{
			$this->session->set_flashdata("errormsg","Coupon points must be numeric");
			$err=1;	
		}
		else if($arr["quantity"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter quantity");
			$err=1;		
		}
		else if(!preg_match('/^[0-9 \.+-]+$/i', $arr["quantity"]))
		{
			$this->session->set_flashdata("errormsg","Coupon quantity must be numeric");
			$err=1;	
		}
		
		else if($arr["sale_start_date_time"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter Sale Start Time");
			$err=1;		
		}
		
		else if($arr["sale_end_date_time"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter Sale End Time");
			$err=1;		
		}
		
		else if($arr["sale_start_date_time"] >= $arr["sale_end_date_time"])
		{
				$this->session->set_flashdata("errormsg","End time must be greater then start time.");
			$err=1;	
		}
		
		else if($arr["expire_date"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter Coupon Expire Time");
			$err=1;		
		}
		else if($arr["sale_end_date_time"] >= $arr["expire_date"])
		{
			$this->session->set_flashdata("errormsg","Expire time must be greater then end time.");
			$err=1;	
		}
		else if($arr["coupon_image"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please choose Image");
			$err=1;		
		}
		else if($arr["discription"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please choose discription");
			$err=1;		
		}
		else if($arr["offer_details"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please choose offer details");
			$err=1;		
		}
		else if($arr["how_to_redeem"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please choose how to redeem");
			$err=1;		
		}
		
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
			
	}

  public function validate_restaurant_image_data($arr){
		
		
		 if($arr["image"] == ""){
			$this->session->set_flashdata("errormsg","Please Choose image.");	
			$err=1;
		}
		
		else{
			$err=0;	
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
//===========================================Size Add To Group End==================================================//
	
	
//Check Credit card validations
	public function credit_card_validation($ccarr)
	{
		//debug($ccarr);
		$err=0;
		
		if($ccarr["type"]=='price')
		{
			
			 if(trim($ccarr["name"])=="")
			 {
				$this->session->set_flashdata("errormsg","Please enter Full Name");
				$err=1;	
			 }
			else if(trim($ccarr["ccnumber"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter card number");
				$err=1;	
			}
			else if(trim($ccarr["expiry_month"])=="")
			{
				$this->session->set_flashdata("errormsg","Please select expiry month");
				$err=1;	
			}
			else if(trim($ccarr["expiry_year"])=="")
			{
				$this->session->set_flashdata("errormsg","Please select expiry year");
				$err=1;	
			}
			else if(trim($ccarr["cv_code"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter CVV number");
				$err=1;	
			}
			else if(trim($ccarr["billing_first_name"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter first name");
				$err=1;	
			}
			else if(trim($ccarr["billing_last_name"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter last name");
				$err=1;	
			}
			else if(trim($ccarr["billing_address1"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter address");
				$err=1;	
			}
			else if(trim($ccarr["billing_city"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter city");
				$err=1;	
			}else if(trim($ccarr["billing_state"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter state");
				$err=1;	
			}else if(trim($ccarr["billing_zip"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter zip");
				$err=1;	
			}else if(trim($ccarr["billing_email"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter email");
				$err=1;	
			}
			else if(!$this->common->validate_email($ccarr["billing_email"]))
				{
					$err=1;
					$this->session->set_flashdata("errormsg","Email should be valid");	
				}
			
			else if(trim($ccarr["billing_phone"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter phone");
				$err=1;	
			}
			else if(!preg_match('/^\d{3}-\d{3}-\d{4}$/',$ccarr["billing_phone"]))
				{
					$err=1;
					$this->session->set_flashdata("errormsg","Please enter valid phone number (e:g 333-333-3333).");	
				}
				
		}
		else
		{
			
			if(trim($ccarr["billing_first_name"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter first name");
				$err=1;	
			}
			else if(trim($ccarr["billing_last_name"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter last name");
				$err=1;	
			}
			else if(trim($ccarr["billing_address1"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter address");
				$err=1;	
			}
			else if(trim($ccarr["billing_city"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter city");
				$err=1;	
			}else if(trim($ccarr["billing_state"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter state");
				$err=1;	
			}else if(trim($ccarr["billing_zip"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter zip");
				$err=1;	
			}else if(trim($ccarr["billing_email"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter email");
				$err=1;	
			}
			else if(!$this->common->validate_email($ccarr["billing_email"]))
				{
					$err=1;
					$this->session->set_flashdata("errormsg","Email should be valid");	
				}
			
			else if(trim($ccarr["billing_phone"])=="")
			{
				$this->session->set_flashdata("errormsg","Please enter phone");
				$err=1;	
			}
			else if(!preg_match('/^\d{3}-\d{3}-\d{4}$/',$ccarr["billing_phone"]))
				{
					$err=1;
					$this->session->set_flashdata("errormsg","Please enter valid phone number (e:g 333-333-3333).");	
				}	
			
			
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	
	 public function validate_page_admin($arr){
	 
		
		if($arr["name"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter page name");
			$err=1;		
		}
		else if($arr["contant"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter contant.");
			$err=1;		
		}
		
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
			
	}
 public function validate_surcharge_data($arr){
		
		if(!preg_match("/^[0-9]{1,7}(?:\.[0-9]{1,2})?$/", $arr['value'])){
		$this->session->set_flashdata("errormsg","Only integer value allowed.");	
			$err=1;
		}
		else{
			$err=0;	
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	
	/*
	Admin panel offers section validation ends */
	//==========================================Admin Pannel Validation End====================================================//

}