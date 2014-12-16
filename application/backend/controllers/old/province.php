<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class province extends CI_Controller {

	public function __construct(){
		parent::__construct();
                $this->load->model('province_model');
                $this->deteteitem();
	}
        public function index(){
		
                $data["master_title"]=$this->config->item('sitename')." | Province";   
				$data["master_body"]="province";  
                $data["singular"]="province";  
                $data["nav"] = "locations";
				 $data["sub_nav"] = "province";
				
                $data["main_nav"] = "jobs";
                $data['province']= $this->province_model->get_items();
		$this->load->theme('adminlayout',$data);
	}
        public function deteteitem()
        {
            if(isset($_GET['deleteitem'])and!empty($_GET['deleteitem']))
            {
                 $itemid = $this->input->get('deleteitem');
                $result = $this->province_model->deleteItem($itemid);
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

		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[province.name]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
                        $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $name = $this->input->post('name');
                   
                     $status = $this->input->post('status');
                   
                    
                     $insert_id =  $this->province_model->insert_item($name,$status);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     
                }
                
            }
            
                $data["master_title"]=$this->config->item('sitename')." | New Province";   
		$data["master_body"]="newitem";  
                $data["nav"] = "locations";
                $data["singular"] = "province";
                $data["main_nav"] = "jobs";
				 $data["sub_nav"] = "province";
                $parent = 0;
                $data['classifications']= $this->province_model->get_items($parent);
		$this->load->theme('adminlayout',$data);
        }
		function id($parent=NULL)
		{
			
           		$data["master_title"]=$this->config->item('sitename')." | Locations";   
				$data["master_body"]="sub_location";  
                $data["nav"] = "locations";   
				 $data["sub_nav"] = "locations";
            	if(empty($parent))
                {
                 $this->load->theme('404',$data); 
                 return;
                }
                
               
                $parent_name= $this->province_model->get_item($parent);
				//echo "<pre>";
//				print_r($parent_name);
//				return;
                if(count($parent_name)==1)
                {
                    $data["sub_nav"] = $parent_name[0]->name;
					
                    $data["main_nav"] = "jobs";
                    $data['classifications']= $this->province_model->get_sub_items($parent);
                    $this->load->theme('adminlayout',$data);
                    return;
                }
                else
                {
                    $this->load->theme('404',$data);
                }
                
            
        
		}
      
        function edititem($id=NULL)
        {
            
            $status = $this->input->post('status');
           // $this->output->enable_profiler(TRUE);

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
                     
                     $status = $this->input->post('status');
                     $oldid = $this->input->post('id');
                    // $cat = $this->province_model->get_item_by_name($name, $parent_id);
                     
                    // if((count($cat)<1)or((count($cat)==1)and $cat[0]->id==$oldid))
                     //{
                         
                     $insert_id =  $this->province_model->update_item($name,$status,$oldid);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                   //  }
                    
                }
                
            }
            
            
            
                $data["master_title"]=$this->config->item('sitename')." | Edit Location";   
		$data["master_body"]="edititem";  
                $data["nav"] = "locations";
                $data["main_nav"] = "jobs";
				$data["sub_nav"] = "province";
                $parent = 0;
                $data['classifications']= $this->province_model->get_items($parent);
                $data['item'] = $this->province_model->get_item($id);
                
		$this->load->theme('adminlayout',$data);
        }
        
}

