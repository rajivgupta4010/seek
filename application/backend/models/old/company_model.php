<?php 
class company_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

	
	function insertEntry($data)
	{
        $this->db->insert('company', $data);
		return $this->db->insert_id();
	}
	function getCompleteProfile($id)
	{
		$this->db->select('*');
		$this->db->join('company', 'company.user_id = users.id');
		$this->db->where('users.id', $id);
		$query = $this->db->get('users');
		return $query->result();

	}
		
	
	
}
?>