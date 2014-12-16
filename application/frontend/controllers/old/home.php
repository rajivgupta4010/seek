<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {

        parent::__construct();
		//$this->session->sess_destroy();

        $this->load->model('user');
        $this->load->model('worktype_model');
        $this->load->model('location_model');
        $this->load->model('classifications_model');
        $this->load->model('employer_type_model');
        $this->load->model('salary_range_model');
        $this->load->model('province_model');
        
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));
    }

    ////////////////site landing page //////////////////	
    public function index() {
		
        $data['classifications'] = $this->classifications_model->get_published_items();
        $data['sub_classifications'] = $this->classifications_model->get_sub_published_items();
        $data['employer_type'] = $this->employer_type_model->get_published_items();
        $data['location'] = $this->location_model->getFrontendLocation();
        $data['worktype'] = $this->worktype_model->get_published_items();
        $data['salary_range'] = $this->salary_range_model->get_published_items();
        $data['salary_range_hourly'] = $this->salary_range_model->get_published_items($parent=0,$type='h');
		$data['province'] = $this->province_model->get_published_pitem();
        $data['page_identifier'] = 'home_page';
        $data['page_identifier2'] = 'home_page2';
        $data['requirepagejs'] = 1;
        $data["master_title"] = $this->config->item("sitename") . " | Home";
        $data["master_body"] = "home";
		
        $this->load->theme('frontend/main', $data);
return 1;    }

    public function sub_category() {

     
            $id = $_POST['id'];
            $items = $this->classifications_model->get_items_by_in($id);
              // print_r($items);
            //exit;
            echo '<option>Any Sub-Classification</option>';
            foreach ($items as $item):
                echo '<option id="'.$item->id.'" >' . $item->name . '</option>';
            endforeach;
      
    }

    public function location_category() {
     
            $id = $_POST['id'];
            $items = $this->location_model->get_items_by_in($id);
            //print_r($items);
            //exit;
            echo '<option>Everywhere in South Africa</option>';
            foreach ($items as $item):
                echo '<option id="'.$item->id.'" >' . $item->name . '</option>';
            endforeach;
        }

    public function get_sub_locations() {
     
            $id = $_POST['id'];
            $items = $this->location_model->get_items_by_in($id);
            //print_r($items);
            //exit;
            echo '<option>Everywhere in South Africa</option>';
            foreach ($items as $item):
                echo '<option id="'.$item->id.'" >' . $item->name . '</option>';
            endforeach;
        }


public function get_range() {
     
            $id = $_POST['id'];
           $type= $this->input->post('type');

            $items = $this->salary_range_model->get_published_items($id,$type);
            //print_r($items);
            //exit;
            foreach ($items as $item):
                echo '<option id="'.$item->value.'" >' . $item->name . '</option>';
            endforeach;
        }


}
