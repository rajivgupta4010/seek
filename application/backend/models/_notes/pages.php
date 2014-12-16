<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model("page_model");
	}
	
	public function _remap()
	{
		$pagedata=$this->uri->segment(2);
		if($pagedata == 'about_us'){
			$this->about_us($pagedata);	
		}
	}
	
	public function about_us($pagedata){
		$data['item'] ='About Us';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = "About Us";
		$data['master_body'] = 'about_us';
		$this->load->theme('mainlayout_contant',$data);
	}
	
}
