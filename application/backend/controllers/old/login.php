<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
                //$this->output->enable_profiler(TRUE);

	}
	
	/***********************************************Login function starts **************************************************************/
	public function index(){
		$data["master_title"]=$this->config->item('sitename')." | Login"; 
		$username= trim($this->input->post('username'));
		if(isset($username)and(!empty($username)))
		{
			$username= trim($this->input->post('username'));
			$password= trim($this->input->post('password'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['errorflag']=1;
			}
			if(!isset($data['errorflag']))
			{
				$user = $this->user->getadmin($username); // Username and type = admin
				
                              //  die();
                              
				if(count($user)==1)
				{
                                   
                                   
					// $dbpassword = $this->encrypt->decode($user[0]->password);
                                      $password = $this->encrypt->sha1($password);
                                      
                                     $dbpassword = $user[0]->password;
                                     
                                  // die();
                                        
                                        
					if($dbpassword==$password)
					{
                                           
						$data['sucess']= 1;
						$userdata = array(
					   'username'  => $user[0]->username,
					   'email'     => $user[0]->email,
					   'admin'     => 1,
					   'logged_in' => TRUE
				   );
	
					$this->session->set_userdata($userdata);
                                        redirect('dashboard');
					}
					
				}
				else{  // count >1
				$data['error'] = 1;
				}
				
				
				
				
				
			}
				$data['error'] = 1;

		}
		
		$this->load->theme('login',$data); 	
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata("successmsg","Log out successfully");	
		redirect(base_url()."login");
	}
	
	
	/***********************************************Login function ends **************************************************************/
}