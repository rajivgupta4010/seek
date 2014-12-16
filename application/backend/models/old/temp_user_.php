<?php 
class temp_user extends CI_Model {
    var $table = 'temp_users';
    
    function __construct()
    {
        parent::__construct();
    }
    function inser_entry($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    
	function get_entry($data)
	{
		//$this->output->enable_profiler(TRUE);
		$this->db->where($data);
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result();
	}
	function delete_entry($arry)
	{
		$this->db->where($arry);
		$this->db->delete($this->table);
		return 1;
	}
}
?>