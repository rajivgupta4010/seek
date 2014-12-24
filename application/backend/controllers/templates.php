<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class templates extends CI_Controller {

    public function __construct() {
        parent::__construct();


        $this->load->model('user_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*     * *********************************************Login function starts ************************************************************* */

    public function index() {

        $data["master_title"] = $this->config->item('sitename') . " | Dashboard";
        $data['master_body'] = 'templates';

        $data['parent_class'] = 'email_templates';
        $data['sidebar_main'] = 'email_templates';
        $this->load->theme('dashboard/index', $data);
    }

    public function forgot_password() {
        $this->load->model('template_model');
        
        if (isset($_POST) and ! empty($_POST)) {
           $id = $this->input->post('id');
           unset($_POST['id']);
           $data['sucess'] = $this->template_model->update_entry($_POST,$id);
           
        }
        
        $data['content'] = $this->template_model->get_entry(array('id'=>1));
        $data['js'] = array('templates.js');
        $data["master_title"] = $this->config->item('sitename') . " | Dashboard";
        $data['master_body'] = 'templates';

        $data['parent_class'] = 'email_templates';
        $data['sidebar_main'] = 'email_templates';
        $data['sidebar_base'] = 'forgot';
        $data['type'] = 'Forgot Password Template';
        $this->load->theme('dashboard/index', $data);
    }
	
    public function new_user() {
        $this->load->model('template_model');
        
        if (isset($_POST) and ! empty($_POST)) {
           $id = $this->input->post('id');
           unset($_POST['id']);
           $data['sucess'] = $this->template_model->update_entry($_POST,$id);
           
        }
        
        $data['content'] = $this->template_model->get_entry(array('id'=>2));
        $data['js'] = array('templates.js');
        $data["master_title"] = $this->config->item('sitename') . " | Dashboard";
        $data['master_body'] = 'templates';

        $data['parent_class'] = 'email_templates';
        $data['sidebar_main'] = 'email_templates';
        $data['sidebar_base'] = 'new_user';
        $data['type'] = 'Forgot Password Template';
        $this->load->theme('dashboard/index', $data);
    }
	


    /*     * *********************************************Login function ends ************************************************************* */
}
