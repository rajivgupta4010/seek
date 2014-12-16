<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class job extends CI_Controller {

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
        $this->load->model('user_company_model');
        $this->load->model('pricing_model');
        $this->load->model('jobs_model');
        $this->load->model('jobs_users_company_model');

        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));
        $status = $this->auth_emp->is_logged_in();
    }

    public function index() {
        $data["master_title"] = $this->config->item("sitename") . " | Jobs dashboard";
        $data['requirejs'] = 1;

        $data["master_body"] = "index";
        $data["navigation"] = "jobs";
        $this->load->theme('dashboard/welcome', $data);
    }

    public function CreateJob() {
       // $dat = $this->ManageJob();
	  // echo "<pre>";
	  // print_r($this->session);
	  if(isset($_POST)and(!empty($_POST)))
	  {
       //print_r($_POST);
       $errorflag = 0;
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('job_title', 'Job Title', 'required');
		$this->form_validation->set_rules('job_summary', 'Job summary', 'required');
		$this->form_validation->set_rules('work_type', 'Work type', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
             $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $val['job_title'] = $this->input->post('job_title');
                     $val['job_summary'] = $this->input->post('job_summary');
                     $val['job_salary_benefits'] = $this->input->post('job_salary_benefits');
                     $val['work_type'] = $this->input->post('work_type');
                     $val['job_details'] = $this->input->post('job_details');
                     $val['contact_details'] = $this->input->post('ContactDetails');
                     $val['notifications_frequency'] = $this->input->post('notifications_frequency');
                     $val['internal_reference'] = $this->input->post('internal_reference');
                   
                     $insert_id =  $this->jobs_model->insertEntry($val);
					 
                        if($insert_id)
                        {
							$val2['job_id'] = $insert_id;
							$val2['user_id'] = $this->session->userdata('account_id');
							$val2['company_id'] = $this->session->userdata('company_id');
                    		 $insert_id =  $this->jobs_users_company_model->insertEntry($val2);
                            $data['sucess']= 1;
                        }
                     
                     else
                     {
                         
                         $data['Error']='Error!';
                         
                     }
                }
                
            
	  }
	   
        $dat=array('6'); 
        if ($dat != 0) {
			$data['requirejs'] = 1;
			$data['page_identifier'] = 'create_jobs';
			$data['page_identifier2'] = 'ckeditor';
			
            $data["master_title"] = $this->config->item("sitename") . " | Jobs dashboard";
            $data["master_body"] = "CreateJob";
            $data["navigation"] = "jobs";
            $this->load->theme('dashboard/welcome', $data);
        }
    }

    public function ManageJob() {
        $data['emp_profile'] = $this->user_company_model->getCompany_payments($this->session->userdata('account_id'));
        if (empty($data['emp_profile'])) {
            $data["master_title"] = $this->config->item("sitename") . " | Jobs dashboard";
            $data["master_body"] = "ManageJob";
            $data["navigation"] = "jobs";
            $this->load->theme('dashboard/welcome', $data);
            return 0;
        }
    }

    public function checkout($id = 1) {
        $data['price'] = $this->pricing_model->getEntry($id);
        if (count($data['price']) > 0) {
            $data["master_title"] = $this->config->item("sitename") . " | Checkout ";
            $data["master_body"] = "checkout";
            $data["navigation"] = "jobs";
            $this->load->theme('dashboard/welcome', $data);
        } else // no plan
            redirect('job');
    }

}
