<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cms_pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cms_pages_model');
        $this->load->model('user');
    }

    public function index() {

        $data["master_title"] = $this->config->item('sitename') . " | Home page";
        $data["master_body"] = "dashboard";
        $data["nav"] = "cms_pages";
        $data["main_nav"] = "jobs";
        $this->load->theme('adminlayout', $data);
    }

    public function employer_help() {
        if (isset($_POST)and ! (empty($_POST))) {
			
            $errorflag = 0;
            $this->load->library('form_validation');

            $this->form_validation->set_rules('cms', 'Content', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['valerror'] = 1;
                $errorflag = 1;
            }
            if ($errorflag == 0) {
				
                $content = htmlentities($this->input->post('cms'));
                $cms_id = 2;

                $insert_id = $this->cms_pages_model->update_item($content, 2, $cms_id);
                if ($insert_id) {
                    $data['sucess'] = 1;
                }
            }
        }
        $data["master_title"] = $this->config->item('sitename') . " | Employer Help Template";
        $data["master_body"] = "index";
        $data['page_identifier'] = 'registration';
        $data["nav"] = "cms_pages";
        $data["main_nav"] = "jobs";
        $data['item'] = $this->cms_pages_model->get_item(2);


        $this->load->theme('adminlayout', $data);
    }

}
