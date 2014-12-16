<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class salaryrange extends CI_Controller {

	public function __construct(){
		parent::__construct();
                $this->load->model('salary_range_model');
                $this->deteteitem();
	}
    public function index(){
		
        redirect('salaryrange/annually');
               
	}
    public function hourly()
    {
        $data["master_title"]=$this->config->item('sitename')." | Salary Range";   
                $data["master_body"]="index";  
                $data["singular"]="Salary Range";  
                $data["nav"] = "salaryrange";
                $data["main_nav"] = "jobs";
                $data["sub_nav"] = "hourly";
                 
                $data['classifications']= $this->salary_range_model->get_items(0,'h');
        $this->load->theme('adminlayout',$data);  
    }

    public function annually()
    {
         $data["master_title"]=$this->config->item('sitename')." | Salary Range";   
                $data["master_body"]="index";  
                $data["singular"]="Salary Range";  
                $data["nav"] = "salaryrange";
                $data["main_nav"] = "jobs";
                $data["sub_nav"] = "annually";
                
                $data['classifications']= $this->salary_range_model->get_items(0,'a');
        $this->load->theme('adminlayout',$data);
    }
        public function deteteitem()
        {
            if(isset($_GET['deleteitem'])and!empty($_GET['deleteitem']))
            {
                 $itemid = $this->input->get('deleteitem');
                $result = $this->salary_range_model->deleteItem($itemid);
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
                 $this->form_validation->set_rules('type', 'Type', 'required');
                 $this->form_validation->set_rules('value', 'Value', 'required|numeric');
		
        		if ($this->form_validation->run() == FALSE)
        		{
        			$data['valerror']=1;
                                $errorflag = 1;
        		}
                if($errorflag==0)
                {
                     $name = $this->input->post('name');
                     $type = $this->input->post('type');
                     $parent_id = 0;
                     if($type=='a')
                     {
                        $parent_id = $this->input->post('parent_id_annually');
                     }
                      if($type=='h')
                     {
                        $parent_id = $this->input->post('parent_id_hourly');
                     }
                   
                     
                     $value = $this->input->post('value');
                     $status = $this->input->post('status');
                      $cat = $this->salary_range_model->get_item_by_name($name, $parent_id, $type);
                     if(count($cat)<1)
                     {
                     $insert_id =  $this->salary_range_model->insert_item($name,$parent_id,$status,$value,$type);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     }
                      else
                     {
                         
                         $data['Error']='Range already exists!';
                         
                     }
                     
                   
                   

                }
                
            }

            
                $data["master_title"]=$this->config->item('sitename')." | Salary Range";   
		$data["master_body"]="newitem";  
                $data["nav"] = "salaryrange";
                $data["singular"] = "Salary Range";
                $data["main_nav"] = "jobs";
                  $data['page_identifier'] = 'salaryrange_newitem';
                 $data['requirepagejs'] = 1;
                $parent = 0;
                $data['classifications']= $this->salary_range_model->get_items($parent,'a');
              //  print_r($data['classifications']);
               // $this->output->enable_profiler(TRUE);

             
                $data['hourly']= $this->salary_range_model->get_items($parent,'h');
		$this->load->theme('adminlayout',$data);
        }

        public function subitems($parent=NULL){
            $data["master_title"]=$this->config->item('sitename')." | Sub Items";   
		$data["master_body"]="sub_items";  
                $data["nav"] = "salaryrange";   

            if(empty($parent))
                {
                 $this->load->theme('404',$data); 
                 return;
                }
                
               
                $parent_name= $this->salary_range_model->get_item($parent);
                if(count($parent_name)==1)
                {
                    $data["sub_nav"] = $parent_name[0]->name;
                    $data["main_nav"] = "jobs";
                    if($parent_name[0]->type=='h')
                    {
                       $data['classifications']= $this->salary_range_model->get_items($parent,'h'); 
                    }
                    else
                    $data['classifications']= $this->salary_range_model->get_items($parent);
                    $this->load->theme('adminlayout',$data);
                    return;
                }
                else
                {
                    $this->load->theme('404',$data);
                }
                
            
        }
        function edit_item($id=NULL)
        {
            
            $status = $this->input->post('status');
           // $this->output->enable_profiler(TRUE);

            if(isset($_POST)and(!empty($_POST)))
            {
                $errorflag = 0;
                
                $this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
         $this->form_validation->set_rules('type', 'Type', 'required');
                 $this->form_validation->set_rules('value', 'Value', 'required|numeric');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['valerror']=1;
                        $errorflag = 1;
		}
                if($errorflag==0)
                {
                     $name = $this->input->post('name');
                     $type = $this->input->post('type');
                     $parent_id = 0;
                     if($type=='a')
                     {
                        $parent_id = $this->input->post('parent_id_annually');
                     }
                      if($type=='h')
                     {
                        $parent_id = $this->input->post('parent_id_hourly');
                     }
                     $status = $this->input->post('status');
                        $value = $this->input->post('value');
                     $oldid = $this->input->post('id');
                     $cat = $this->salary_range_model->get_item_by_name($name, $parent_id, $type);
                     
                     if((count($cat)<1)or((count($cat)==1)and $cat[0]->id==$oldid))
                     {
                         echo $parent_id;
                     $insert_id =  $this->salary_range_model->update_item($name,$parent_id,$status,$oldid,$value,$type);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     }
                     else
                     {
                         
                         $data['Error']='Range already existes!';
                         
                     }
                }
                
            }
            
            
            
                $data["master_title"]=$this->config->item('sitename')." | Edit Location";   
		$data["master_body"]="edititem";  
                $data["nav"] = "salaryrange";
                $data["main_nav"] = "jobs";
                $parent = 0;
                   $data['page_identifier'] = 'salaryrange_newitem';
                 $data['requirepagejs'] = 1;
                 $data['classifications']= $this->salary_range_model->get_items($parent,'a');
                $data['hourly']= $this->salary_range_model->get_items($parent,'h');
                $data['item'] = $this->salary_range_model->get_item($id);
                
		$this->load->theme('adminlayout',$data);
        }
        
}

