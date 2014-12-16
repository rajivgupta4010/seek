<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class account extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('user');
      //  $this->load->model('temp_user');
        $this->load->model('countries_model');
        $this->load->model('company_model');
		$this->load->model('user_company_model');
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

    public function index() {
        $data["master_title"] = $this->config->item("sitename") . " | Welcome dashboard";
        $data["master_body"] = "index";
        $data["navigation"] = "account";
        $data["sub_navigation"] = "manage_user";
        $data['emp_profile'] = $this->user_company_model->getCompleteProfile($this->session->userdata('account_id'));
        $data['users'] = $this->user_company_model->getAllCompanyAdmin($data['emp_profile'][0]->company_id);
		
        $this->load->theme('dashboard/welcome', $data);
    }

    public function NewUser() {
		
		$this->session->keep_flashdata('Sucess');
        $uniqid = $this->input->get('uniqid');
        if ((isset($uniqid)and empty($uniqid)) or ( !isset($uniqid))) {
            redirect("account/uniqid");
        }
        $_POST['uniqid'] = $uniqid;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uniqid', 'uniqid', 'is_unique[users.unique_id]');
        if ($this->form_validation->run() == FALSE) {
            redirect("account/uniqid");
        }
		
		if(isset($_POST['email'])and !empty($_POST['email']) and !empty($uniqid))
		{
			$users = array(
			'email' => $this->input->post('email')
			);
			$temp_users = array(
			'unique_id' => $uniqid,
			'email' => $this->input->post('email')
			);
			$this->session->unset_userdata('SESSION_unique_id');
			$this->session->unset_userdata('SESSION_user_id');

			$data['users'] = $this->user->checkUserDetails($users);
			if(empty($data['users'])) // New TEMP entry and session (UNIQUE ID)
			{
				//$this->temp_user->inser_entry($temp_users);
				$this->user->inser_user($temp_users);
				$this->session->set_userdata('SESSION_unique_id',$uniqid);
				redirect('account/NewUser2/?uniqid='.$uniqid);
				
			} 
			else    // SESSION (USER ID, UNIQUE ID)
			{
				$this->session->set_userdata('SESSION_user_id',$data['users'][0]->id);
				$this->session->set_userdata('SESSION_unique_id',$uniqid);
				redirect('account/NewUser2/?uniqid='.$uniqid);
				  
			}
						
		}
        //die('ff');
        // $data['insert_id'] = $this->temp_user->inser_entry(array('unique_id' => $uniqid));
        // print_r($data);
        $data["master_title"] = $this->config->item("sitename") . " | New User";
        $data['page_identifier'] = 'NewUser';
        $data['requirejs'] = 1;
        $data["master_body"] = "New_User";
        $data["navigation"] = "accounew_usernt";
        $data["sub_navigation"] = "manage_user";
        $this->load->theme('dashboard/welcome', $data);
    }
	
	public function NewUser2()
	{
		
		
		 $uniqid = $this->input->get('uniqid');
		 $session_uniqid = $this->session->userdata('SESSION_unique_id');
		 $user_temp_id = $this->session->userdata('SESSION_user_id');
		
		 $data['employer']=$this->user_company_model->getCompleteProfile($this->session->userdata('account_id'));
		// print_r($data);
		
		if((empty($session_uniqid)))
		{
			redirect('account/NewUser');
		}
		if(($uniqid!=$session_uniqid))
		{
			redirect('account/NewUser');
		}
		
		if(!empty($user_temp_id))
		{
			$data['userExists'] = 1;
			$data['userdata'] = $this->user->getUserByID($user_temp_id);
		}
		else
		{
			$data['userExists'] = 0;
			$data['userdata'] = $this->user->get_entry(array('unique_id'=>$session_uniqid));
		}
		if(isset($_POST['userType'])and!empty($_POST['userType']))
		{
			//print_r($_POST);
			$new_user_id = $this->input->post('new_user_id');
			$userType = $this->input->post('userType');
			$account_type = $this->input->post('type');
			
			if($account_type=='new')
			{
				$temp = $this->user->get_entry(array('unique_id'=>$session_uniqid));
				
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $temp[0]->email;
				$new_user_db_id = $this->user->update_user(array('first_name' => $first_name,'last_name ' => $last_name,'email' => $email, 'employer' =>1,'employer_role'=>$userType),$temp[0]->id);
				$this->user_company_model->insertEntry(array('company_id'=>$data['employer'][0]->company_id,'user_id'=>$temp[0]->id));
				
				
				$this->session->unset_userdata('SESSION_unique_id');
				//die('123');
                $this->session->set_userdata('Sucess', 'New administrator has been created');
				

				redirect('account/NewUser');
			}
			if($account_type=='already')
			{
				$this->user->update_user(array('employer'=>1,'employer_role'=>$userType),$new_user_id);
			
				$this->user_company_model->insertEntry(array('company_id'=>$data['employer'][0]->company_id,'user_id'=>$new_user_id));
				$this->session->unset_userdata('SESSION_unique_id');
				//die('456');
				$this->session->set_userdata('Sucess', 'New administrator has been created');
				
				redirect('account/NewUser');
			}
			
			
			
			
		}
		
		
		$data["master_title"] = $this->config->item("sitename") . " | New User 2";
        $data['page_identifier'] = 'NewUser';
        $data['requirejs'] = 1;
        $data["master_body"] = "New_User2";
        $data["navigation"] = "accounew_usernt";
        $data["sub_navigation"] = "manage_user";
        $this->load->theme('dashboard/welcome', $data);

	}

    public function uniqid() {
        $uniqid = md5(uniqid());
        $url = "account/NewUser?uniqid={$uniqid}";
        redirect($url);
        return;
    }

    public function ManageUser() {

        $this->index();
    }

    public function Details() {
       // $data['emp_profile'] = $this->company_model->getCompleteProfile($this->session->userdata('account_id'));
		$data['emp_profile'] = $this->user_company_model->getCompleteProfile($this->session->userdata('account_id'));

        $data["master_title"] = $this->config->item("sitename") . " | Account Details";
        $data["master_body"] = "details";
        $data["navigation"] = "account";
        $data["sub_navigation"] = "details";
        $this->load->theme('dashboard/welcome', $data);
    }


			function checkdata()
			{
				$this->session->set_flashdata('item', 'value');
				redirect('account/checkdata2');
			}
			function checkdata2()
			{
					echo $this->session->flashdata('item');
			
			}
}
