<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $master_title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php include("css.php");?> 
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<?php

foreach($this->_ci_view_paths as $key=>$val)

{

	$view_path=$key;	

}

?>
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<?php include("header.php");?> 
<!-- END HEADER -->
<div class="clearfix">
</div>
    
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
<?php include("sidebar.php");?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<?php

$controllername=$this->router->class;

?>
         <?php if(isset($master_body) && $master_body!=""){?>
      <?php include($view_path.$controllername."/".$master_body.".php"); ?>

       <?php } ?>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php include("footer.php");?>
