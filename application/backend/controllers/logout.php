<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*     * *********************************************Login function starts ************************************************************* */

  

    public function index() {
        $this->session->sess_destroy();
        $this->session->set_flashdata("successmsg", "Log out successfully");
        redirect('login');
    }

    /*     * *********************************************Login function ends ************************************************************* */
}
