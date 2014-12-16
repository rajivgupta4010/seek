<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        
       // $this->load->model('user_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*     * *********************************************Login function starts ************************************************************* */

    public function index() {
        $data["master_title"] = $this->config->item('sitename') . " | Dashboard";
        $data['master_body'] = 'dashboard';
        $this->load->theme('dashboard/index', $data);
    }

   
    /*     * *********************************************Login function ends ************************************************************* */
}
