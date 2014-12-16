<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class advertiser extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('user');
        $this->load->model('countries_model');
        $this->load->model('company_model');
        $this->load->model('user_company_model');
        $this->load->model('worktype_model');
        $this->load->model('location_model');
        $this->load->model('classifications_model');
        $this->load->model('employer_type_model');
        $this->load->model('salary_range_model');
        $this->load->model('email_model');

        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));
        $status = $this->auth_emp->is_logged_in();
    }

    ////////////////site landing page //////////////////	
    public function index() {
//$this->output->enable_profiler(TRUE);

        $signin = $this->input->post('sign_in');
        if (!empty($signin)) {

            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('password'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]');
            if ($this->form_validation->run() == FALSE) {
                $data['errorflag'] = 1;
            }
            if (!isset($data['errorflag'])) {
                $user = $this->user->getEmpUser($username); // Username and type = Emp



                if (count($user) == 1) {

                    // $dbpassword = $this->encrypt->decode($user[0]->password);
                    $password = $this->encrypt->sha1($password);
                    $dbpassword = $user[0]->password;
                    if ($dbpassword == $password) {
                        $data['sucess'] = 1;
                        $userdata = array(
                            'username' => $user[0]->username,
                            'name' => $user[0]->first_name . ' ' . $user[0]->last_name,
                            'email' => $user[0]->email,
                            'account_id' => $user[0]->uid,
                            'company_name' => $user[0]->cname,
                            'company_id' => $user[0]->cid,
                            'emp' => 1,
                            'logged_in' => TRUE
                        );

                        $this->session->set_userdata($userdata);
                        //print_r(   $this->session->userdata);

                        redirect('welcome');
                    }
                } else {  // count >1
                    $data['errorpass'] = 1;
                }
            }
            $data['error'] = 1;
        }

        $data['page_identifier'] = 'advertiser';
        $data['requirepagejs'] = 0;
        $data["master_title"] = $this->config->item("sitename") . " | Home";
        $data["master_body"] = "advertiser";
        $data["skip_nav"] = "1";

        $this->load->theme('frontend/main', $data);
    }

    public function register() {

        if (isset($_POST)and ! (empty($_POST))) {
            //print_r($_POST);
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $cname = $this->input->post('cname');
            $saddress = $this->input->post('saddress');
            $address = $this->input->post('address');
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $postcode = $this->input->post('postcode');
            $industry = $this->input->post('industry');
            $type = $this->input->post('type');
            $required_employee_count = $this->input->post('required_employee_count');
            $promotional_code = $this->input->post('promotional_code');
            $terms = $this->input->post('terms');
            $subscribe = $this->input->post('subscribe');
            $micro = microtime();
            $micro = md5($micro);
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('cname', 'Company Name', 'trim|required|is_unique[company.cname]');
            $this->form_validation->set_rules('address', 'Street Address', 'trim|required');
            $this->form_validation->set_rules('saddress', 'Street Address', 'trim');
            $this->form_validation->set_rules('country', 'Country ', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('state', 'State', 'trim|required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'trim|required');
            $this->form_validation->set_rules('industry', 'Industry', 'trim|required');
            $this->form_validation->set_rules('type', 'Employer Type', 'trim|required');
            $this->form_validation->set_rules('employee_count', 'Number of employees', 'trim|required');
            $this->form_validation->set_rules('promotional_code', 'Promotional code', 'trim');
            $this->form_validation->set_rules('terms', 'Terms & Conditions', 'trim|required');
            $errorflag = 0;
            if ($this->form_validation->run() == FALSE) {
                $errorflag = 1;
            }
            if ($errorflag == 0) {
                $inser_id = $this->user->new_employer($fname, $lname, $email, $phone, $subscribe, $micro);
                if ($inser_id) {

                    $this->load->model('cms_pages_model');

                    $message = $this->cms_pages_model->get_item(1);
                    $message = $message[0]->content;
                    $url = base_url() . "advertiser/confirm?c_code={$micro}&email={$email}";
                    $subject = "Confirm your New Account ";

                    $message = str_replace("##URL##", $url, $message);
                    $message = html_entity_decode($message);
                    $message .= $micro;
                    $emailarr["to"] = $email;
                    $emailarr["subject"] = $subject;
                    $emailarr["message"] = $message;
                    $this->email_model->sendIndividualEmail($emailarr);
                    $companydata = array(
                        'cname' => $cname,
                        'saddress' => $saddress,
                        'country' => $country,
                        'city' => $city,
                        'state' => $state,
                        'postcode' => $postcode,
                        'industry' => $industry,
                        'type' => $type,
                        'required_employee_count' => $required_employee_count,
                        'promotional_code' => $promotional_code,
                        //	'user_id' => $inser_id,
                        'address' => $address
                    );
                    $company_id = $this->company_model->insertEntry($companydata);
                    $user_company = array(
                        'company_id' => $company_id,
                        'user_id' => $inser_id
                    );
                    $this->user_company_model->insertEntry($user_company);
                    $this->session->set_userdata('email', $email);



                    redirect('advertiser/sent');
                }
            }
        }


        $data["master_title"] = $this->config->item("sitename") . " | Register";
        $data["master_body"] = "register";
        $data['page_identifier'] = 'adv_register';
        $data['requirepagejs'] = 1;
        $data['countries'] = $this->countries_model->get_all();
        $data['classifications'] = $this->classifications_model->get_items();

        $this->load->theme('login/main', $data);
    }

    function sent() {
        $data['email'] = $this->session->userdata('email');
        if (empty($data['email']))
            redirect('advertiser');
        $data["master_title"] = $this->config->item("sitename") . " | Sent";
        $data["master_body"] = "sent";
        $this->load->theme('login/main', $data);
        $this->session->unset_userdata('email');
    }

    function resendmail($email) {
        if (isset($email)and filter_var($email, FILTER_VALIDATE_EMAIL)) {


            $data['user'] = $this->user->getempbyemail($email);

            if (count($data['user']) > 0) {
                $c_code = $data['user'][0]->c_code;
                $status = $data['user'][0]->status;
                $id = $data['user'][0]->id;

                if (!empty($c_code)and $status == 0) {
                    $this->load->model('cms_pages_model');
                    $message = $this->cms_pages_model->get_item(1);
                    $message = $message[0]->content;
                    $micro = microtime();
                    $micro = md5($micro);
                    $url = base_url() . "advertiser/confirm?c_code={$micro}&email={$email}";
                    $subject = "Confirm your New Account ";
                    $message = str_replace("##URL##", $url, $message);
                    $message = html_entity_decode($message);
                    $message .= $micro;
                    $emailarr["to"] = $email;
                    $emailarr["subject"] = $subject;
                    $emailarr["message"] = $message;
                    $this->email_model->sendIndividualEmail($emailarr);
                    $this->user->update_code_employer($micro, $id);
                    $this->session->set_userdata('email', $email);
                    redirect('advertiser/sent');
                } else {
                    echo "Already activated";
                    redirect('advertiser', 5);
                }
            }
        } else
            redirect('advertiser');
    }

    function confirm() {

        $mail_code = $this->input->get('c_code');
        $email = $this->input->get('email');
        $data['error'] = 0;
        $data["master_title"] = $this->config->item("sitename") . " | Confirm mail";
        $this->load->library('form_validation');
        if (isset($email)and filter_var($email, FILTER_VALIDATE_EMAIL)and ( !empty($mail_code))) {

            $data['user'] = $this->user->getempbyemail($email);
            if (count($data['user']) > 0) {
                $c_code = $data['user'][0]->c_code;
                $status = $data['user'][0]->status;
                $id = $data['user'][0]->id;
                $data['email'] = $email;
                $data['firstname'] = $data['user'][0]->first_name;
                $data['lastname'] = $data['user'][0]->last_name;
                $data['userid'] = $data['user'][0]->id;

                if ($status == 0 and $c_code == $mail_code) {

                    if (isset($_POST)and ! empty($_POST)):
                        $data['Errorpost'] = 0;
                        $password = $this->input->post('password');
                        $userid = $this->input->post('tokenid');
                        $cpassword = $this->input->post('confirmpassword');

                        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[confirmpassword]');
                        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]');
                        $this->form_validation->set_rules('aggrement', 'Agreement', 'trim|required');
                        if ($this->form_validation->run() == FALSE) {
                            $data['Errorpost'] = 1;
                        } else {
                            $password = $this->encrypt->sha1($password);
                            $data['password'] = $this->user->updatePassword($password, $userid);
                            $data['status'] = $this->user->changeStatus($userid, 1);
                            $data['code'] = $this->user->removeC_code($userid);
                            $data['sucess'] = 1;
                            $newdata = array(
                                'activate' => '1'
                            );

                            $this->session->set_userdata($newdata);
                            redirect('advertiser/activate');
                        }
                    endif;
                    $data["master_body"] = "confirm";
                    $data['page_identifier'] = 'adv_register';
                    $data['requirepagejs'] = 1;
                    $data["master_title"] = $this->config->item("sitename") . " | Confirm mail";
                    // $this->load->theme('login/main', $data);

                    $this->session->unset_userdata('email');
                } else {
                    $data["master_body"] = "Errormail";
                    $data["master_title"] = $this->config->item("sitename") . " | Error mail";
                }
            } else {
                $data["master_body"] = "Errormail";
                $data["master_title"] = $this->config->item("sitename") . " | Error mail";
            }
        } else {
            $data["master_body"] = "Errormail";
            $data["master_title"] = $this->config->item("sitename") . " | Error mail";
            $data['error'] = 1;
            $data['errormsg'] = 'Invalid Code';
        }
        //$this->load->theme('login/main', $data);

        $this->load->theme('login/main', $data);
    }

    function forgot_password() {
        if (isset($_POST['email'])and ! empty($_POST['email'])) {
            $email = $this->input->post('email');
            $user = $this->user->getUserByEmail($_POST['email']);
            if (count($user) > 0) {
                $id = $user[0]->id;
                $this->load->model('cms_pages_model');
                $message = $this->cms_pages_model->get_item(1);
                $message = $message[0]->content;
                $micro = microtime();
                $micro = md5($micro);
                $url = base_url() . "advertiser/new_password?c_code={$micro}&email={$email}";
                $subject = "Reset your Account Password";
                $message = str_replace("##URL##", $url, $message);
                $message = html_entity_decode($message);
                $message .= $micro;
                $emailarr["to"] = $email;
                $emailarr["subject"] = $_POST['email'];
                $emailarr["message"] = $message;
                $this->email_model->sendIndividualEmail($emailarr);
                $this->user->update_code_employer($micro, $id);
                $this->session->set_userdata('email', $email);
                redirect('advertiser/sent');
            }
        }
        $data["master_title"] = $this->config->item("sitename") . " | Forgot Password";

        $data['page_identifier'] = 'adv_register';
        $data['requirepagejs'] = 1;

        $data["master_body"] = "forgot_password";
        $this->load->theme('login/main', $data);
    }

    function activate() {
        $activate = $this->session->userdata("activate");
        if (isset($activate)and ( $activate) == 1) {
            $data["master_title"] = $this->config->item("sitename") . " | Confirm mail";
            $data["master_body"] = "activate";
            $this->load->theme('login/main', $data);
            $this->session->unset_userdata('activate');
        } else {
            redirect('advertiser');
        }
    }

    function new_password() {


        $mail_code = $this->input->get('c_code');
        $email = $this->input->get('email');
        $data['error'] = 0;
        $data["master_title"] = $this->config->item("sitename") . " | New password";
        $this->load->library('form_validation');
        if (isset($email)and filter_var($email, FILTER_VALIDATE_EMAIL)and ( !empty($mail_code))) {

            $data['user'] = $this->user->getempbyemail($email);
            if (count($data['user']) > 0) {
                $c_code = $data['user'][0]->c_code;
                $status = $data['user'][0]->status;
                $id = $data['user'][0]->id;
                $data['email'] = $email;
                $data['firstname'] = $data['user'][0]->first_name;
                $data['lastname'] = $data['user'][0]->last_name;
                $data['userid'] = $data['user'][0]->id;

                if ($c_code == $mail_code) {

                    if (isset($_POST)and ! empty($_POST)):
                        $data['Errorpost'] = 0;
                        $password = $this->input->post('password');
                        $userid = $this->input->post('tokenid');
                        $cpassword = $this->input->post('confirmpassword');

                        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[confirmpassword]');
                        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]');
                        $this->form_validation->set_rules('aggrement', 'Agreement', 'trim|required');
                        if ($this->form_validation->run() == FALSE) {
                            $data['Errorpost'] = 1;
                        } else {
                            $password = $this->encrypt->sha1($password);
                            $data['password'] = $this->user->updatePassword($password, $userid);
                            $data['status'] = $this->user->changeStatus($userid, 1);
                            $data['code'] = $this->user->removeC_code($userid);
                            $data['sucess'] = 1;
                            $newdata = array(
                                'activate' => '1'
                            );

                            $this->session->set_userdata($newdata);
                            redirect('advertiser/activate');
                        }
                    endif;
                    $data["master_body"] = "confirm";
                    $data['page_identifier'] = 'adv_register';
                    $data['requirepagejs'] = 1;
                    $data["master_title"] = $this->config->item("sitename") . " | Confirm mail";
                    // $this->load->theme('login/main', $data);

                    $this->session->unset_userdata('email');
                } else {
                    $data["master_body"] = "Errormail";
                    $data["master_title"] = $this->config->item("sitename") . " | Error mail";
                }
            } else {
                $data["master_body"] = "Errormail";
                $data["master_title"] = $this->config->item("sitename") . " | Error mail";
            }
        } else {
            $data["master_body"] = "Errormail";
            $data["master_title"] = $this->config->item("sitename") . " | Error mail";
            $data['error'] = 1;
            $data['errormsg'] = 'Invalid Code';
        }
        //$this->load->theme('login/main', $data);

        $this->load->theme('login/main', $data);
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect(base_url() . "advertiser");
    }

    public function welcom1e() {
        $data["master_title"] = $this->config->item("sitename") . " | Welcome dashboard";
        $data["master_body"] = "welcome";
        $this->load->theme('dashboard/welcome', $data);
    }

    function test() {
        $text = '<h1>HELLLLOOOO </h1>';
        $emailarr["to"] = "rajivgupta.php@slinfy.com";
        $emailarr["subject"] = "IPN";
        $emailarr["message"] = $text;
        echo 123;
////
        $this->email_model->sendIndividualEmail($emailarr);
    }

}
