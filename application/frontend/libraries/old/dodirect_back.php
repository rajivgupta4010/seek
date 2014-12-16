<?php

class DodirectComponent extends CI_Controller 
{
   var $name='Dodirect';
   var $environment = 'sandbox';	// or 'beta-sandbox' or 'live'


/**

 * Send HTTP POST Request

 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body

 */

function PPHttpPost($methodName_, $nvpStr_,$API_UserName,$API_Password,$API_Signature,$API_Endpoint) 

{

	 $name='Dodirect';
	 $environment = 'sandbox';

	

	global $environment;
	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('testing.slinfy02_api1.gmail.com'); // set your spi username
	$API_Password = urlencode('1373275897'); // set your spi password
	$API_Signature = urlencode('AoNBG1CBIgLS5QaKlVpODjsaTncPABthzh5N-Nzz5tOodumbgF0TvVDq'); // set your spi Signature
	
	/*live credentails*/
	//$API_UserName = urlencode('perottiuk_api1.hotmail.com'); // set your spi username
	//$API_Password = urlencode('SHKCTWGS397CGPY5'); // set your spi password
	//$API_Signature = urlencode('An5ns1Kso7MWUdW4ErQKJJJ4qi4-AHExE3LH4btAPGNcDLsx7VGQ5XEp'); // set your spi Signature
	
	$API_Endpoint = "https://api-3t.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	/*if("live" === $environment) 
	{
		$API_Endpoint = "https://api-3t.paypal.com/nvp";
	}*/
	$version = urlencode('51.0');



	// Set the curl parameters.

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);

	curl_setopt($ch, CURLOPT_VERBOSE, 1);



	// Turn off the server and peer verification (TrustManager Concept).

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);



	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLOPT_POST, 1);



	// Set the API operation, version, and API signature in the request.

	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";



	// Set the request as a POST FIELD for curl.

	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);



	// Get response from the server.

	$httpResponse = curl_exec($ch);



	if(!$httpResponse) 

	{

		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');

	}



	// Extract the response details.

	$httpResponseAr = explode("&", $httpResponse);



	$httpParsedResponseAr = array();

	foreach ($httpResponseAr as $i => $value) 

	{

		$tmpAr = explode("=", $value);

		if(sizeof($tmpAr) > 1) 

		{

			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];

		}

	}



	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) 

	{

		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");

	}



		return $httpParsedResponseAr;

	}	

}

?>