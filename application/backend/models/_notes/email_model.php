<?php 

class email_model extends CI_Model { 

 

    function __construct()

    {

        parent::__construct();
        $this->load->model("user_model");
		$this->load->library("email");
}

	

	/************************************************* Email functions starts **************************************************/	

		


	public function sendIndividualEmail($emailarr){
     
      $this->load->library('email', $config);
      $this->load->library('parser', $config);
	  
	  $this->email->set_newline("\r\n");
	  $this->email->to($emailarr["to"]);// change it to yours
      $this->email->from($config['smtp_user'], 'Club Hop');
	  $this->email->subject($emailarr["subject"]);
	  $this->email->message($emailarr["message"]);
	  $result = $this->email->send();
	  if($result){
	   	$err=0;
	  }
 	  else{
		 $this->email->print_debugger();
		 $err=1;
	  }
	   return $err;
 }
	

	

	/************************************************* Email function ends **************************************************/

	

}