<?php
class cms_pages_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function get_item($id)
    {
        
       $this->db->where('id', $id);
        $query = $this->db->get('cms_pages');
        return $query->result(); 
    }
    function insert_item($name)
    {
         $this->name   = $name; // please read the below note
       // $this->parent_id = $parent_id;
        

        $this->db->insert('cms_pages', $this);
        return $this->db->insert_id();
    }
    
    

    function update_item($content,$userid,$id,$title='')
    {
        $this->content   = $content;
        $this->title   = $title;
       // $this->parent_id = $parent_id;
        $this->updated_by    = $userid;

        $this->db->update('cms_pages', $this, array('id' => $id));
    }
    function deleteItem($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cms_pages'); 
       return  $this->db->affected_rows();
    }
}