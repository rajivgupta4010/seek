<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class configurations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('user');
    }

    public function index() {
        
    }

    public function paypal() {
        $data["master_title"] = $this->config->item('sitename') . " | Configurations";
        $data["master_body"] = "configurations";
        $data["singular"] = "Configuration";
        $data["nav"] = "paypal";
        $data["main_nav"] = "configurations";
        $data['classifications'] = $this->configuration_model->getEntries();
       // print_r($data);
        $this->load->theme('adminlayout', $data);
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
                $post['value'] = $this->input->post('name');
                $insert_id = $this->configuration_model->update_entry($post, $id);
                    if ($insert_id) {
                        $data['sucess'] = 1;
                    }
                } else {

                    $data['Error'] = 'Error!';
                }
            
        }



        $data["master_title"] = $this->config->item('sitename') . " | Edit Employer Types";
        $data["master_body"] = "edititem";
        $data["nav"] = "paypal";
        $data["main_nav"] = "configurations";
        $parent = 0;
        $data['classifications'] = $this->configuration_model->getEntries($parent);
        $data['item'] = $this->configuration_model->getEntry($id);

        $this->load->theme('adminlayout', $data);
    }

}
