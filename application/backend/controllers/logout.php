<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
    }

    /*     * *********************************************Login function starts ************************************************************* */

  

    public function index() {
		$this->session->sess_destroy();
        redirect('login');
    }

    /*     * *********************************************Login function ends ************************************************************* */
}
