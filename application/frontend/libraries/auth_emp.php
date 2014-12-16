<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class auth_emp {

	function __construct()
	{
		$this->ci =& get_instance();

		//$this->ci->load->config('tank_auth', TRUE);

		$this->ci->load->library('session');
		
		$this->ci->load->database();
		$this->ci->load->model('user');

		// Try to autologin
		//$this->autologin();
	}
	
    public function is_logged_in()
    {
		$status =  $this->ci->session->userdata('logged_in');
		$email =  $this->ci->session->userdata('email');
		$user = 1;
	
		if($status==1)
		{
			$user = $this->ci->user->getUserByEmail($email);
			
		}
		
		
		$url = $this->ci->router->fetch_class();
		
		$requiredLoginUrl = array('account','tools','welcome','job');
		
		 
		if ((in_array($url, $requiredLoginUrl)))
		{
			if(!(is_array($user)))
			{
				$this->ci->session->sess_destroy();
				redirect('advertiser');
			}
		} 
		
		$unRequiredLoginUrl = array('advertiser');
		if ((in_array($url, $unRequiredLoginUrl) and (is_array($user))))
		{
			redirect('account');
			
		} 
		
    }
}

/* End of file auth_emp.php */