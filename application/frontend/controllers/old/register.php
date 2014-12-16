<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class register extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('user');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));
        $this->load->library('session');
        $this->load->helper('login');
    }

    ////////////////site landing page //////////////////	
    public function index() {

        check_auth();
        $data["master_title"] = $this->config->item("sitename") . " | Home";
        $data['page_identifier'] = 'register';
        $data['requirepagejs'] = 1;

        $data["master_body"] = "home";
        $this->load->theme('login/main', $data);
    }

    public function register_user() {
        $config = array(
            array(
                'field' => 'password',
                'label' => ' ',
                'rules' => 'trim|required|min_length[6]|max_length[12]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email ',
                'rules' => 'trim|required|valid_email|is_unique[users.email]'
            ),
            array(
                'field' => 'first_name',
                'label' => ' ',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'last_name',
                'label' => ' ',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red; ">', '</div>');
        $this->form_validation->set_message('is_unique', '%s aleady Registered.');

        // var_dump($this->form_validation->run());
        $this->session->set_flashdata('successmsg', 'Login Successful');
        if ($this->form_validation->run() == TRUE) {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['jobseeker'] = 1;
            $result = $this->user->inser_user($data);
            if ($result):
                //$this->session->set_flashdata('successmsg', 'Login Successful');
                $data['status'] = '1';
                $data["master_title"] = $this->config->item("sitename") . " | Home";
                $data["master_body"] = "home";
                $user_status = array(
                    'username' => $data['first_name'] . ' ' . $data['last_name'],
                    'email' => $data['email'],
                    'user_type' => 'jobseeker',
                    'logged_in' => TRUE
                );
                $this->session->set_userdata('tempdata', $user_status);
                $this->load->theme('login/main', $data);
            else:
                $this->session->set_userdata('tempdata', '');
                return FALSE;
            endif;
        }
        $data["master_title"] = $this->config->item("sitename") . " | Home";
        $data["master_body"] = "home";
        $this->load->theme('login/main', $data);
    }

}
