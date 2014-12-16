<?php 
class user_company_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

	
	function insertEntry($data)
	{
        $this->db->insert('user_company', $data);
		return $this->db->insert_id();
	}
	function getCompleteProfile($id)
	{
				$this->db->select('*');
				$this->db->join('user_company', 'user_company.user_id = users.id');
				$this->db->join('company', 'user_company.company_id = company.id');
				$this->db->where('employer', 1); 
				//$this->db->where('expire_at >', date("Y-m-d H:i:s"));  
                $this->db->where('status', 1); 
				$this->db->where('users.id', $id); 
				$query = $this->db->get('users');
                return $query->result();	

	}
	function getAllCompanyAdmin($id)
	{
				$this->db->select('*');
				$this->db->join('user_company', 'user_company.user_id = users.id');
				$this->db->join('company', 'user_company.company_id = company.id');
				$this->db->where('employer', 1); 
		//$this->db->where('expire_at >', date("Y-m-d H:i:s"));  
               // $this->db->where('status', 1); 
				$this->db->where('company.id', $id); 
				$query = $this->db->get('users');
                return $query->result();	
	}
	function getCompany_payments($id)
	{
		$this->db->select('*');
				$this->db->join('user_company', 'user_company.user_id = users.id');
				$this->db->join('company', 'user_company.company_id = company.id');
				$this->db->join('pricing', 'pricing.id = company.package_id');
				$this->db->where('employer', 1); 
				//$this->db->where('expire_at >', date("Y-m-d H:i:s"));  
                $this->db->where('status', 1); 
				$this->db->where('users.id', $id); 
				$query = $this->db->get('users');
                return $query->result();	
	}
	
}
?>