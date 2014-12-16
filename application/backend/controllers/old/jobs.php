<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jobs_users_company_model');
        $this->load->model('user');
    }

    public function index() {
        
    }

    public function latestjobs() {
		
		 $data["master_title"]=$this->config->item('sitename')." |Latest jobs";   
				$data["master_body"]="jobs";  
                $data["singular"]="Jobs";  
                $data["nav"] = "latestjobs";
                $data["main_nav"] = "jobs";
               $data['jobs']= $this->jobs_users_company_model->getEntries();
               //print_r($data);
		$this->load->theme('adminlayout',$data);
		}

    function id($id = NULL) {
		 $data["master_title"]=$this->config->item('sitename')." | Edit";   
				$data["master_body"]="edititem";  
                $data["singular"]="Jobs";  
                $data["nav"] = "latestjobs";
                $data["main_nav"] = "jobs";
               $data['jobs']= $this->jobs_users_company_model->getEntries();
               //print_r($data);
		$this->load->theme('adminlayout',$data);
		}

}
