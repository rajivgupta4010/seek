<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class jobseekers extends CI_Controller {

	public function __construct(){
		parent::__construct();
                $this->load->model('user');
                $this->deteteitem();
	}
	    public function index(){
		
                $data["master_title"]=$this->config->item('sitename')." | Job Seekers";   
		$data["master_body"]="jobseekers";  
                $data["singular"]="Job Seeker";  
                $data["nav"] = "jobseekers";
                $data["main_nav"] = "users";
                $data['classifications']= $this->user->get_all_seekers();
               
		$this->load->theme('adminlayout',$data);
	}
         public function deteteitem()
        {
            if(isset($_GET['deleteitem'])and!empty($_GET['deleteitem']))
            {
                 $itemid = $this->input->get('deleteitem');
                $result = $this->user->deleteItem($itemid);
                if($result==1)
                {
                    $this->session->set_flashdata('success', 'Item removed successfully');


                }
                
            }
        }
        
          public function new_item()
        {
                
            $status = $this->input->post('status');
            if(isset($_POST)and !(empty($_POST)))
            {
                    $errorflag = 0;
                $this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
                        $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $name = $this->input->post('name');
                   
                     $status = $this->input->post('status');
                     $cat = $this->user->get_item_by_name($name);
                     if(count($cat)<1)
                     {
                     $insert_id =  $this->user->insert_item($name,$status);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     }
                     else
                     {
                         
                         $data['Error']='Employer type already existes!';
                         
                     }
                }
                
            }
            
                $data["master_title"]=$this->config->item('sitename')." | New Work type";   
		$data["master_body"]="newitem";  
                $data["nav"] = "employertypes";
                $data["singular"] = "employertype";
                $data["main_nav"] = "jobs";
                $parent = 0;
                //$data['classifications']= $this->user->get_items($parent);
		$this->load->theme('adminlayout',$data);
        }
        
        
         function edit_item($id=NULL)
        {
            
            $status = $this->input->post('status');
            $this->output->enable_profiler(TRUE);

            if(isset($_POST)and(!empty($_POST)))
            {
                $errorflag = 0;
                
                $this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
                        $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $name = $this->input->post('name');
                     //$parent_id = $this->input->post('parent_id');
                     $status = $this->input->post('status');
                       $oldid = $this->input->post('id');
                     $cat = $this->user->get_item_by_name($name);
                  
                    if((count($cat)<1)or((count($cat)==1)and $cat[0]->id==$oldid))
                     {
                         
                     $insert_id =  $this->user->update_item($name,$status,$oldid);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     }
                     else
                     {
                         
                         $data['Error']='User already exists!';
                         
                     }
                }
                
            }
            
            
            
                $data["master_title"]=$this->config->item('sitename')." | Edit Users";   
		$data["master_body"]="edititem";  
                $data["nav"] = "jobseekers";
                $data["main_nav"] = "jobs";
                $parent = 0;
          //      $data['classifications']= $this->user->get_items($parent);
               // $data['item'] = $this->user->get_item($id);
                
		$this->load->theme('adminlayout',$data);
        }
}

