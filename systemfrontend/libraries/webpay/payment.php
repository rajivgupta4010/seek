<?php
require 'autoload.php';
use WebPay \ WebPay;
function make_payment($arr)
{
$Webpay = new WebPay( 'test_secret_5wa9pj5iD518aRh2zaeQAcPq' ); 
$response=$Webpay->charge->create ( array ( 
   "amount" => $arr['amount'] , 
   "currency" => "jpy" , 
   "card" => 
    array ("number" => $arr['number'] , 
     "exp_month" => $arr['exp_month'] , 
     "exp_year" => $arr['exp_year'] , 
     "cvc" => $arr['cvc'] , 
     "name" => $arr['name'] ), 
   "description" => "sale of product"
 ));	
 return $response;
}
			 
		
		




 
 
 

		
		
?>