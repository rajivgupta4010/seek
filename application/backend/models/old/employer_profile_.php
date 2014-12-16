<?php 
class employer_profile extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

	
	function new_employer_profile($cname,$saddress,$country,$city,$state,$postcode,$industry,$type,$required_employee_count,$promotional_code,$inser_id,$address)
	{
		$this->cname   = $cname; // please read the below note
        $this->saddress = $saddress;
        $this->address = $address;
        $this->country    = $country;
        $this->city    = $city;

        $this->state    = $state;
        $this->postcode    = $postcode;
        $this->industry    = $industry;
        $this->required_employee_count    = $required_employee_count;
        $this->promotional_code    = $promotional_code;
       
         $this->user_id    = $inser_id;

        $this->db->insert('employer_profile', $this);
		return $this->db->insert_id();


	}
	
	function getCompleteProfile($id)
	{
		$this->db->select('*');
		$this->db->join('employer_profile', 'employer_profile.user_id = users.id');
		$this->db->where('users.id', $id);
		$query = $this->db->get('users');
		return $query->result();

	}
		
	
	
}
?>