<?php

class email_model extends CI_Model {

    function __construct() {

        parent::__construct();

        //$this->load->model("store_model");
        //$this->load->model("user_model");
    }

    /*     * *********************************************** Email functions starts ************************************************* */

    public function sendIndividualEmail($emailarr) {

        $this->load->library('email');
        $this->config->load('email');
        $this->load->library('parser');
        $this->email->set_newline("\r\n");
        $this->email->to($emailarr["to"]); // change it to yours
        $this->email->from('SEEK@gmail.com', "Seek");

        $this->email->subject($emailarr["subject"]);
        $this->email->message($emailarr["message"]);
        //$result = $this->email->send();
        //$result = $this->email->send();
        if ($this->email->send()) {
            $err = 0;
            
        } else {
            //show_error($this->email->print_debugger());
            $this->email->print_debugger();
            $err = 1;
            //die();
        }
        return $err;
    }

    public function sendEmailToAllStores($emailarr) {

        $resultset = $this->store_model->getStoreData();

        foreach ($resultset as $emailkey => $emailval) {

            $this->email->clear();

            $this->email->to($emailval["store_email"]);

            $this->email->from($this->config->item("adminemail"));

            $this->email->subject($emailarr["subject"]);

            $this->email->message($emailarr["message"]);

            $this->email->send();
        }



        $getdata["subject"] = $emailarr["subject"];

        $getdata["message"] = $emailarr["message"];

        $getdata["emailto"] = $emailarr["mailto"];

        $getdata["time"] = time();

        return $this->db->insert("ugk_email_history", $getdata);
    }

    public function sendEmailToAllAdvertisers($emailarr) {

        return true;  // because no section to advertiser is there so we are just making this function without body
    }

    public function sendEmailToAllUsers($emailarr) {

        $resultset = $this->user_model->getUserData();

        foreach ($resultset as $emailkey => $emailval) {

            $this->email->clear();

            $this->email->to($emailval["store_email"]);

            $this->email->from($this->config->item("adminemail"));

            $this->email->subject($emailarr["subject"]);

            $this->email->message($emailarr["message"]);

            $this->email->send();
        }



        $getdata["subject"] = $emailarr["subject"];

        $getdata["message"] = $emailarr["message"];

        $getdata["emailto"] = $emailarr["mailto"];

        $getdata["time"] = time();

        return $this->db->insert("ugk_email_history", $getdata);
    }

    public function getEmailHistory($searchdata = array()) {

        $this->db->select("*");

        $this->db->from("ugk_email_history");

        if (isset($searchdata["search"]) && $searchdata["search"] != "search" && $searchdata["search"] != "") {

            $this->db->like('ugk_email_history.subject', $searchdata["search"]);

            $this->db->or_like('ugk_email_history.emailto', $searchdata["search"]);
        }

        $query = $this->db->get();

        $resultset = $query->result_array();
        ;

        return $resultset;
    }

    public function getIndividualEmailHistory($emailid) {

        $this->db->select("*");

        $this->db->from("ugk_email_history");

        $this->db->where(array("id" => $emailid));

        $query = $this->db->get();

        $resultset = $query->row_array();
        ;

        return $resultset;
    }

    /*     * *********************************************** Email function ends ************************************************* */
}
