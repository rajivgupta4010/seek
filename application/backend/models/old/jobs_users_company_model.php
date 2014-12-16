<?php 
class jobs_users_company_model extends CI_Model {
	var $tablename = 'jobs_users_company';
	
    function __construct()
    {
        parent::__construct();
    }

	
	function insertEntry($data)
	{
        $this->db->insert($this->tablename, $data);
		return $this->db->insert_id();
	}

	function update_entry($data, $id)
    {
       
        $this->db->update($this->tablename, $data, array('id' => $id));
		return $this->db->affected_rows();
    }
	function getEntries()
    {
       
		$this->db->join('users', 'users.id = jobs_users_company.user_id');
		$this->db->join('company', 'company.id = jobs_users_company.company_id');
		$this->db->join('jobs', 'jobs.id = jobs_users_company.job_id');
		//$this->db->join('user_company', 'user_id.id = jobs_users_company.job_id');
		 $query = $this->db->get($this->tablename);
        return  $query->result();
    }
	
	function getEntry($id)
    {
        $this->db->where('id',$id);
		$query = $this->db->get($this->tablename);
        return  $query->result();
    }
	
}

?>