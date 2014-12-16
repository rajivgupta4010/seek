<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class classifications extends CI_Controller {

	public function __construct(){
		parent::__construct();
                $this->load->model('classifications_model');
                $this->deteteitem();
                
	}
	public function index(){
		
                $data["master_title"]=$this->config->item('sitename')." | Classifications";   
		$data["master_body"]="classification";  
                $data["nav"] = "classifications";
                $data["main_nav"] = "jobs";
                $data['classifications']= $this->classifications_model->get_items();
		$this->load->theme('adminlayout',$data);
	}
        public function deteteitem()
        {
            if(isset($_GET['deleteitem'])and!empty($_GET['deleteitem']))
            {
                 $itemid = $this->input->get('deleteitem');
                $result = $this->classifications_model->deleteItem($itemid);
                if($result==1)
                {
                    $this->session->set_flashdata('success', 'Item removed successfully');


                }
                
            }
        }
        public function sub_classification($parent=NULL){
            $data["master_title"]=$this->config->item('sitename')." | Sub Classifications";   
		$data["master_body"]="sub_classification";  
                $data["nav"] = "classifications";   
            if(empty($parent))
                {
                 $this->load->theme('404',$data); 
                 return;
                }
                
               
                $parent_name= $this->classifications_model->get_item($parent);
                if(count($parent_name)==1)
                {
                    $data["sub_nav"] = $parent_name[0]->name;
                    $data["main_nav"] = "jobs";
                    $data['classifications']= $this->classifications_model->get_items($parent);
                    $this->load->theme('adminlayout',$data);
                    return;
                }
                else
                {
                    $this->load->theme('404',$data);
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
                     $parent_id = $this->input->post('parent_id');
                     $status = $this->input->post('status');
                     $cat = $this->classifications_model->get_item_by_name($name, $parent_id);
                     if(count($cat)<1)
                     {
                     $insert_id =  $this->classifications_model->insert_item($name,$parent_id,$status);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     }
                     else
                     {
                         
                         $data['Error']='Classification already existes!';
                         
                     }
                }
                
            }
            
            
            
                $data["master_title"]=$this->config->item('sitename')." | New Classifications";   
		$data["master_body"]="newitem";  
                $data["nav"] = "classifications";
                $data["main_nav"] = "jobs";
                $parent = 0;
                $data['classifications']= $this->classifications_model->get_items($parent);
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
                     $parent_id = $this->input->post('parent_id');
                     $status = $this->input->post('status');
                       $oldid = $this->input->post('id');
                     $cat = $this->classifications_model->get_item_by_name($name, $parent_id);
                     
                     if((count($cat)<1)or((count($cat)==1)and $cat[0]->id==$oldid))
                     {
                         
                     $insert_id =  $this->classifications_model->update_item($name,$parent_id,$status,$oldid);
                        if($insert_id)
                        {
                            $data['sucess']= 1;
                        }
                     }
                     else
                     {
                         
                         $data['Error']='Classification already existes!';
                         
                     }
                }
                
            }
            
            
            
                $data["master_title"]=$this->config->item('sitename')." | Edit Classifications";   
		$data["master_body"]="edititem";  
                $data["nav"] = "classifications";
                $data["main_nav"] = "jobs";
                $parent = 0;
                $data['classifications']= $this->classifications_model->get_items($parent);
                $data['item'] = $this->classifications_model->get_item($id);
                
		$this->load->theme('adminlayout',$data);
        }
        
}

