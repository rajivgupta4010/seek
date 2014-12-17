<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        
        $this->load->model('user_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*     * *********************************************Login function starts ************************************************************* */

    public function index() {
        $data["master_title"] = $this->config->item('sitename') . " | Dashboard";
        $data['master_body'] = 'users';
		$data['parent_class'] = 'users';
		$data['sidebar_main'] = 'users';
        $this->load->theme('dashboard/index', $data);
    }
	public function all_users($id=0)
	{
		
		$data["master_title"] = $this->config->item('sitename') . " | Dashboard";
        $data['master_body'] = 'users';
        $data['parent_class'] = 'users';
		$data['sidebar_main'] = 'users';
		$data['alldata'] = $this->user_model->get_entry(array('status'=> 1, 'user_type'=>$id));
	//	print_r($data['alldata']);
        $this->load->theme('dashboard/index', $data);
		

		
	}
   
   public function modal2($id=0)
		{
			if(isset($id)and !empty($id))
			{
				$search = array('id' => $id);
             	$data['edit_item'] = $this->user_model->get_entry($search);
				
			}
			$data['allusers'] = $this->user_model->get_entry(array('status'=> 1));
				//print_r($data['sublocation']);
			
			$this->load->view($this->router->class.'/modal_view',$data);
		}
    /*     * *********************************************Login function ends ************************************************************* */
}
