<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model('user_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*     * *********************************************Login function starts ************************************************************* */

    public function index() {
      
        $data["master_title"] = $this->config->item('sitename') . " | Login";
      //  $username = trim($this->input->post('username'));
      
        $this->load->theme('static/soon', $data);
    }

  

    /*     * *********************************************Login function ends ************************************************************* */
}
