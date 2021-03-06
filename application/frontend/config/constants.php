<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
if($_SERVER['SERVER_NAME']=="192.168.1.226")
{
define('BASEURL', 'http://192.168.1.226/solitaire/demo/donnie_kim/');
}
else if($_SERVER['SERVER_NAME']=='112.196.33.85')
{
define('BASEURL', 'http://112.196.33.85/solitaire/demo/donnie_kim/');
}
else if($_SERVER['SERVER_NAME']=='64.15.154.229')
{
	define('BASEURL', 'http://64.15.154.229/donnie_kim/');
}
else 
{
define('BASEURL', 'http://weebuy.net/donnie_kim/');
}
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('ADMIN', 'Rajiv Gupta');
define('ADMIN_MAIL', 'rajivgupta4010@gmail.com');
define('TOLLFREENO','123456');

/* End of file constants.php */
/* Location: ./application/config/constants.php */