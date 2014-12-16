<?php
	
	function getPricing()
	{
		$CI =& get_instance();
		$sidebar = $CI->pricing_model->getEntries();
	 return $sidebar;
	}




?>