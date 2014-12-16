<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Site URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */
/*if ( ! function_exists('get_result'))
{
	function get_result($table,$column,$where=array())
	{
		$CI =& get_instance();
		$CI->db->select(implode(",",$column))->from($table)->where($where);
		$result=$CI->db->get();
		return $result->result_array();
	}
}*/

if ( ! function_exists('get_result'))
{
	function get_result($table,$where=array())
	{
		$CI =& get_instance();
		$CI->db->select("*")->from($table)->where($where);
		$result=$CI->db->get();
		//$result=$CI->db->get()->row_array();
		//return $result->result_array->row();
		//return $result;
		return $result->result_array();
	}
}

if(! function_exists('join_using'))
{
function join_using($table, $key) 
{
    $CI = get_instance();
    $join = 'JOIN '. $table .' USING (`'. $key .'`)';
    return $CI->db->ar_join[] = $join;
} 
}
if ( ! function_exists('clean')){
	function clean($arr = array())
	{
		$ci = & get_instance();
   		$ci->load->database();
		//debug($arr);
		return  trim(mysqli_real_escape_string($ci->db->conn_id,$arr));
	}
}
/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */