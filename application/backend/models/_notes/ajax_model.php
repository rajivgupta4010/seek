<?php 
class ajax_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function showIngredientsPrice($ingredient_id)
	{
		$i=0;
		$ingredient_id;
		$this->db->select("*");
		$this->db->from("ad_on_ingredients");
		$this->db->where(array("id"=>$ingredient_id,"ingredient_status"=>"1"));
		//$this->db->where(array("ingredient_status"=>"1"));	
		$query=$this->db->get();
		$resultset=$query->row_array();
		echo $resultset['ingredient_price'];
		
	}
	/*public function getCitybyStateId($search=array())
	{
		$StateId=$search["StateId"];
		$this->db->select("*");
		$this->db->from("cities");
		$this->db->where("stateID",$StateId);
		
		$this->db->where(array("cities.status <>"=>"4"));	
		$query=$this->db->get();
		return $resultset=$query->result_array();
		
	}
	public function getSubCategoryFromCategory($search=array())
	{
		$categoryid=$search["parent_category"];
		$this->db->select("*");
		$this->db->from("sub_category");
		$this->db->where("parent_category",$categoryid);
		
		$this->db->where(array("sub_category.sub_category_status"=>"1"));	
		$query=$this->db->get();
		return $resultset=$query->result_array();
		
	}
	public function getProductNameFromBrandId($search=array())
	{
		$brandid=$search["brand_list_id"];
		$this->db->select("*");
		$this->db->from("product_list");
		$this->db->where("brand_list_id",$brandid);
		$this->db->where(array("product_list_status"=>"1"));	
		$query=$this->db->get();
		return $resultset=$query->result_array();
		
	}*/
 	
}
?>