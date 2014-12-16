<?php 
class configuration_model extends CI_Model {
	var $tablename = 'config';
	var $sidebar= array();
    function __construct()
    {
        parent::__construct();
		$this->getEntries();
		//print_r($this->sidebar);
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
//$pricing = new pricing_model;
//print_r($pricing);

?>