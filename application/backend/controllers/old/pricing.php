<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pricing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pricing_model');
    }

    public function index($url = 1) {
		
		$data['item'] = $this->pricing_model->getEntry($url);
	
		if(count($data)>0)
		{
		
		
		if(isset($_POST)and!empty($_POST))
		{
			$errorflag = 0;
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Title', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('feature1', 'Feature1', 'required');
            $this->form_validation->set_rules('feature2', 'Feature2', 'required');
            $this->form_validation->set_rules('feature3', 'Feature3', 'required');
            $this->form_validation->set_rules('feature4', 'Feature4', 'required');
            $this->form_validation->set_rules('jobs', 'No of Jobs', 'required');
			 if ($this->form_validation->run() == FALSE) {
                $data['valerror'] = 1;
                $errorflag = 1;
            }
            if ($errorflag == 0) {
				$input['name'] = $this->input->post('name');
				$input['price'] = $this->input->post('price');
				$input['feature1'] = $this->input->post('feature1');
				$input['feature2'] = $this->input->post('feature2');
				$input['feature3'] = $this->input->post('feature3');
				$input['feature4'] = $this->input->post('feature4');
				$id = $this->input->post('id');
				$input['no_jobs'] = $this->input->post('jobs');
				 $insert_id = $this->pricing_model->update_entry($input, $id);
                    if ($insert_id) {
                        $data['sucess'] = 1;
                    }else {

                    $data['Error'] = 'No recored updated';
                }
                } 
		     }
			
		$data['item'] = $this->pricing_model->getEntry($url);
        $data["master_title"] = $this->config->item('sitename') . " | Work Types";
        $data["master_body"] = "index";
        $data["singular"] = "Pricing Table";

        $data["nav"] = "pricing";
        $data["main_nav"] = "jobs";
        //$data['classifications'] = $this->worktype_model->get_items();

        $this->load->theme('adminlayout', $data);
		}
		else
		{
			 $this->load->theme('404', $data);
		}
    }

    function edit_item($id = NULL) {

        $status = $this->input->post('status');
        // $this->output->enable_profiler(TRUE);

        if (isset($_POST)and ( !empty($_POST))) {
            $errorflag = 0;

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['valerror'] = 1;
                $errorflag = 1;
            }
            if ($errorflag == 0) {
                $name = $this->input->post('name');
                //$parent_id = $this->input->post('parent_id');
                $status = $this->input->post('status');
                $oldid = $this->input->post('id');
                $cat = $this->worktype_model->get_item_by_name($name);

                if ((count($cat) < 1)or ( (count($cat) == 1)and $cat[0]->id == $oldid)) {

                    $insert_id = $this->worktype_model->update_item($name, $status, $oldid);
                    if ($insert_id) {
                        $data['sucess'] = 1;
                    }
                } else {

                    $data['Error'] = 'Work Type already exists!';
                }
            }
        }



        $data["master_title"] = $this->config->item('sitename') . " | Edit Work Types";
        $data["master_body"] = "edititem";
        $data["nav"] = "worktypes";
        $data["main_nav"] = "jobs";
        $parent = 0;
        $data['classifications'] = $this->worktype_model->get_items($parent);
        $data['item'] = $this->worktype_model->get_item($id);

        $this->load->theme('adminlayout', $data);
    }


}
