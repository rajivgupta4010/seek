<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

|

*/
if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "127.0.0.1"){
	$usertype = explode("/",$_SERVER["REQUEST_URI"]);
}
else if($_SERVER['SERVER_NAME'] == "192.168.1.226" || $_SERVER['SERVER_NAME'] == "112.196.33.85"){
	$usertype = explode("/",$_SERVER["REQUEST_URI"]);
}
else{
	//for live server
}
$key1 = array_search('admin', $usertype);
$usertype = $usertype[$key1];

if($usertype !="admin"){
	//$route['default_controller'] = "moderator_panel";
	$route['default_controller'] = "restaurant_panel";
}
else{
	$route['default_controller'] = "login";	
}
$route['404_override'] = '';
/* End of file routes.php */

/* Location: ./application/config/routes.php */