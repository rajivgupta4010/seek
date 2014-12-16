<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('common');
        $this->load->model('validations');
        $this->load->model('user');
        $this->load->helper('login');
    }

    public function index() {
        //echo 123;
        check_auth();
        $data["master_title"] = $this->config->item("sitename") . " | Home";
        $data["master_body"] = "home";
        $data['page_identifier'] = 'register';
        $data['requirepagejs'] = 1;
        //$this->output->enable_profiler();
        $this->load->theme('login/main', $data);
    }

    public function logout() {
        $this->session->sess_destroy();

        $this->session->unset_userdata('tempdata');
        redirect(base_url());
    }

    public function signin() {
        echo 123;
        exit;
    }

    public function userdata() {
        $data['email'] = $this->input->post('Email');
        $data['password'] = $this->input->post('Password');
        $result = $this->user->userdata($data);
        if ($result['password'] == md5($data['password'])):
            $user_status = array(
                'username' => $result['first_name'] . ' ' . $result['last_name'],
                'email' => $result['email'],
                'user_type' => 'jobseeker',
                'logged_in' => TRUE
            );
            $this->session->set_userdata('tempdata', $user_status);
            echo '1';
        elseif ($result == ''):
            echo '-1';
        else:
            echo '0';
        endif;
    }

    public function testing() {
        $data = array();
        print_r($data);
        // exit;
    }

}
