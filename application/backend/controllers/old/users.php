<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employer_type_model');
        $this->load->model('user');
        $this->deteteitem();
    }

    public function index() {

        $data["master_title"] = $this->config->item('sitename') . " | Users";
        $data["master_body"] = "users";
        $data["singular"] = "jobseekers Type";
        $data["nav"] = "employertypes";
        $data["main_nav"] = "jobs";
        $data['classifications'] = $this->employer_type_model->get_items();

        $this->load->theme('adminlayout', $data);
    }

    public function deteteitem() {
        if (isset($_GET['deleteitem'])and ! empty($_GET['deleteitem'])) {
            $itemid = $this->input->get('deleteitem');
            $result = $this->user->deleteItem($itemid);
            if ($result == 1) {
                $this->session->set_flashdata('success', 'Item removed successfully');
            }
        }
    }

    public function new_item() {


        if (isset($_POST)and ! (empty($_POST))) {
            $errorflag = 0;
            $this->load->library('form_validation');

            //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_message('is_unique', 'The %s is already registered with us');
            if ($this->form_validation->run() == FALSE) {
                $data['valerror'] = 1;
                $errorflag = 1;
            }
            if ($errorflag == 0) {

                $user['first_name'] = $this->input->post('first_name');
                $user['last_name'] = $this->input->post('last_name');
                $user['email'] = $this->input->post('email');
                $user1['type'] = $this->input->post('type');
                $user['c_code'] = md5(microtime());


                switch ($user1['type']) {
                    case 'a':
                        $user['username'] = $user['email'];
                        $user['admin'] = 1;
                        $type = 'Admin';
                        break;
                    case 's':
                        $user['jobseeker'] = 1;
                        $type = 'Jobseeker';
                        break;
                    case 'e':
                        $user['employer'] = 1;
                        $type = 'Employer';
                        break;
                }


                $insert_id = $this->user->inser_user($user);
                if ($insert_id) {
                    $data['sucess'] = 1;
                    $this->load->model('cms_pages_model');
                     $message = $this->cms_pages_model->get_item(1);
                     
                     $message = $message[0]->content;
                 $name = "Rajiv";
                    $subject = "Confirm your New " . $type . " Account ";
                    $message =  str_replace("##NAME##", $name, $message);
                    $message =  html_entity_decode($message);
                    
                    $this->load->library('email');
                    $this->email->set_mailtype("html");

                    $this->email->from(ADMIN, ADMIN_MAIL);
                    //$this->email->to($user['email']);
                     $this->email->to('rajivgupta.php@slinfy.com');

                    $this->email->subject($subject);
                    //$this->email->message("Testing the email class. {$user['c_code']}");
                    $this->email->message($message);

                    if (!$this->email->send())
                        show_error($this->email->print_debugger());
                    else
                    {
                       $data['Sucesss']= "Successfull";
                    }
                    
                } else {

                    $data['Error'] = 'User already existes!';
                }
            }
        }

        $data["master_title"] = $this->config->item('sitename') . " | New User";
        $data["master_body"] = "newitem";
        $data["nav"] = "NewUser";
        $data["singular"] = "user";
        $data["main_nav"] = "users";
        $parent = 0;
        $data['classifications'] = $this->employer_type_model->get_items($parent);
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
                $name = $this->input->post('name');
                //$parent_id = $this->input->post('parent_id');
                $status = $this->input->post('status');
                $oldid = $this->input->post('id');
             $udata=array( 'status'=> $status);

                    $insert_id = $this->user->update_user($udata, $oldid);
                    if ($insert_id) {
                        $data['sucess'] = 1;
                    }
                 else {

                    $data['Error'] = 'User Not updated!';
                }
            }
        }



        $data["master_title"] = $this->config->item('sitename') . " | Edit Employer Types";
        $data["master_body"] = "edititem";
        //$data["nav"] = "Edituser";
        $data["main_nav"] = "users";
         $data["singular"] = "user";
        $parent = 0;
        
        //$data['classifications'] = $this->employer_type_model->get_items($parent);
        $data['item'] = $this->user->getUserByID($id);

        $this->load->theme('adminlayout', $data);
    }

    function test_mail() {

        $this->load->library('email');
        $this->email->set_newline("\r\n");

        $this->email->from('slinfydotcom@gmail.com', 'Raj Name');
        $this->email->to('rajivgupta.php@slinfy.com');

        $this->email->subject(' CodeIgniter Rocks Socks ');
        $this->email->message('Hello World');


        if (!$this->email->send())
            show_error($this->email->print_debugger());
        else
            echo 'Your e-mail has been sent!';
    }

    public function jobseekers() {

        $data["master_title"] = $this->config->item('sitename') . " | Job Seekers";
        $data["master_body"] = "jobseekers";
        $data["singular"] = "Job Seeker";
        $data["nav"] = "jobseekers";
        $data["main_nav"] = "users";
        $data['classifications'] = $this->user->get_all_seekers();
		

        $this->load->theme('adminlayout', $data);
    }

    public function employers() {

        $data["master_title"] = $this->config->item('sitename') . " | Employers";
        $data["master_body"] = "employers";
        $data["singular"] = "employer";
        $data["nav"] = "employers";
        $data["main_nav"] = "users";
        $data['classifications'] = $this->user->get_all_employers();

        $this->load->theme('adminlayout', $data);
    }

    public function administrator() {

        $data["master_title"] = $this->config->item('sitename') . " | Administrators";
        $data["master_body"] = "administrator";
        $data["singular"] = "Administrator";
        $data["nav"] = "administrator";
        $data["main_nav"] = "users";
        $data['classifications'] = $this->user->get_all_admins();

        $this->load->theme('adminlayout', $data);
    }

}
