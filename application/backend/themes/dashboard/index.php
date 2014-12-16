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
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php include_once('css.php')?>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>



<body class="page-header-fixed page-quick-sidebar-over-content">
    
    <?php include_once('header.php');
    ?>
    <!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include_once('sidebar.php');?>
        
        
        <?php

foreach($this->_ci_view_paths as $key=>$val)

{

	$view_path=$key;	

}
$controllername=$this->router->class;

?>
    <?php if(isset($master_body) && $master_body!=""){?>
      <?php include($view_path.$controllername."/".$master_body.".php"); ?>

       <?php } ?>   

	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
    
        </div>
	<?php include_once('footer.php'); ?>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
    