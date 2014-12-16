<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
                //$this->output->enable_profiler(TRUE);

	}
	public function index(){
		
                
		
               
                $data["main_nav"] = "dashboard";    
                 $data["master_title"]=$this->config->item('sitename')." | Dashboard";   
		$data["master_body"]="dashboard";  
		$this->load->theme('adminlayout',$data);
	}
}

