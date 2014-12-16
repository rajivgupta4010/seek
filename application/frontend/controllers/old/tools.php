<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tools extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('user');
        $this->load->model('countries_model');
        $this->load->model('company_model');
        $this->load->model('worktype_model');
        $this->load->model('location_model');
        $this->load->model('classifications_model');
        $this->load->model('employer_type_model');
        $this->load->model('salary_range_model');
        $this->load->model('email_model');

        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));
      	$status = $this->auth_emp->is_logged_in();
    }

       public function index()
		{
			    $data["master_title"] = $this->config->item("sitename") . " | Tools";
				$data["master_body"] = "index";
				$data["navigation"] = "tools";
				$this->load->theme('dashboard/welcome', $data);
			
		}
    
}
