<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class employers extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user');
        $this->deteteitem();
    }

    public function index() {

        $data["master_title"] = $this->config->item('sitename') . " | Job Seekers";
        $data["master_body"] = "index";
        $data["singular"] = "Job Seeker";
        $data["nav"] = "employers";
        $data["main_nav"] = "users";
        $data['classifications'] = $this->user->get_all_employers();

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

}
