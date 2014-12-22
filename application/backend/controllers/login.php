<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        //$this->output->enable_profiler(TRUE);
    }

    /*     * *********************************************Login function starts ************************************************************* */

    public function index() {
        $data["master_title"] = $this->config->item('sitename') . " | Login";
        $username = trim($this->input->post('username'));
        $forget = 0;
        
        if(isset($_POST)and isset($_POST['forget_pass']))
        {
            $forget = 1;
            $email_detail = $this->user_model->get_entry(array('email' => $this->input->post('email'), 'admin' => 1, 'status'=>1));
            // Send email 
            $this->load->model('email_model');
            if(count($email_detail)>0)
            {
                $key = sha1(microtime());
                $email_array['to'] = $email_detail[0]->email;
                $email_array['subject'] = 'Password reset request';
                $email_array['message'] = $key;
                $this->load->model('template_model');
                $forgotpage = $this->template_model->get_entry(array('id'=>1));
                $this->user_model->update_entry(array('reset_key'=>$key),$email_detail[0]->id);
                $key = site_url('login/reset')."?key={$key}&email={$this->input->post('email')}";
                $email_array['message'] = str_replace("###URL###",$key,$forgotpage[0]->content);
                $this->email_model->sendIndividualEmail($email_array);
                $data['sucess'] = 'Please check your email address ';
                
            }  else {
            
                 $data['error'] = 'Invalid Email!';
            }
            //
            
        }
        if (isset($_POST)and ( !empty($_POST)) and $forget==0) {
            $username = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');
            if ($this->form_validation->run() == FALSE) {
                $data['errorflag'] = 1;
            }

            if (!isset($data['errorflag'])) {
                $user = $this->user_model->get_entry(array('email' => $username, 'admin' => 1));


                if (count($user) == 1) {
                    // $dbpassword = $this->encrypt->decode($user[0]->password);
                     $password = $this->encrypt->sha1($password);

                    $dbpassword = $user[0]->password;

                    // die();


                    if ($dbpassword == $password) {

                        $data['sucess'] = 1;
                        $userdata = array(
                            'email' => $user[0]->email,
                            'username' => $user[0]->email,
                            'admin' => 1,
                            'logged_in' => TRUE
                        );

                        $this->session->set_userdata($userdata);
                       // print_r($this->session->userdata);
                        //die;
                        redirect('dashboard');
                    }
                } else {  // count >1
                    $data['error'] = 'Password does not match!';
                }
            }
            
        }
     //   print_r($data);

        $this->load->theme('login', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata("successmsg", "Log out successfully");
        redirect(base_url() . "login");
    }
    public function reset()
    {
        $key = $this->input->get('key');
        $email = $this->input->get('email');
        if(empty($key) or empty($email))
        {
            redirect('login');
            
        }
        
        $data['user'] = $this->user_model->get_entry(array('email' => $email, 'reset_key' => $key, 'admin'=>1));
        //print_r($data);
        if(count($data['user'])==1)
        {
            if(isset($_POST)and !empty($_POST))
            {
                $password = $this->input->post('password');
                 $email = $this->input->post('email');
                 $password = $this->encrypt->sha1($password);
                $data['sucess'] = $this->user_model->update_entry(array('password'=>$password,'reset_key'=>''), $email);
                redirect('login');
            // print_r($data['sucess']);   
            }
            
            $this->load->view('login/reset',$data);
        }
        else
        {
            redirect('login');
        }
            
        
    }
    /*     * *********************************************Login function ends ************************************************************* */
}
