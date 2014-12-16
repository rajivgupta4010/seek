<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_templates extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cms_pages_model');
        $this->load->model('user');
       
    }

    
public function index()
{
    
}    
    
    public function registration()
    {
         if(isset($_POST)and !(empty($_POST)))
            {
                $errorflag = 0;
                $this->load->library('form_validation');
                 
		$this->form_validation->set_rules('cms', 'Content', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
                        $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $content = htmlentities($this->input->post('cms'));
                     $cms_id = 1;
                     
                     $insert_id =  $this->cms_pages_model->update_item($content,1,$cms_id);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     
                     
                }
                
            }
        $data["master_title"] = $this->config->item('sitename') . " | Registration Template";
        $data["master_body"] = "index";
        $data['page_identifier']= 'registration';
        $data["nav"] = "registration";
        $data["main_nav"] = "email_templates";
        $data['item'] = $this->cms_pages_model->get_item(1);
        
       
        $this->load->theme('adminlayout', $data);
    }
	public function email($cms_id)
	{
		//$cms_id = 1;
		
         if(isset($_POST)and !(empty($_POST)))
            {
                $errorflag = 0;
                $this->load->library('form_validation');
                 
		$this->form_validation->set_rules('cms', 'Content', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
                        $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $content = htmlentities($this->input->post('cms'));
                    $title = $this->input->post('name');
                     
                     $insert_id =  $this->cms_pages_model->update_item($content,1,$cms_id,$title);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     
                     
                }
                
            }
        $data["master_title"] = $this->config->item('sitename') . " | Registration Template";
        $data["master_body"] = "index";
        $data['page_identifier']= 'registration';
        $data["nav"] = "registration";
        $data["main_nav"] = "email_templates";
        $data['item'] = $this->cms_pages_model->get_item(3);
        
       
        $this->load->theme('adminlayout', $data);
    
	}
}
