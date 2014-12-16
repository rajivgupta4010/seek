<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta property="og:title" content="<?php echo $master_title;?>" />
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
<title><?php echo $master_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/favicon.ico">
<?php  include("mainlayout_head.php");  ?>
<!-- incluse all the scripts and css here in this file -->
<?php 
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50874810-1', 'restaurantdining.com');
  ga('send', 'pageview');

// ]]>
</script>
</head>
<?php
foreach($this->_ci_view_paths as $key=>$val)
{
	$view_path=$key;	
}
?>
<?php $controllername=$this->router->class; ?>
<body>

    <?php include("mainlayout_header.php");?>
    
    <?php if(isset($master_body) && $master_body!=""){?>
    <?php include($view_path.$controllername."/".$master_body.".php"); ?>
    <?php } ?>
    
    <?php include("mainlayout_footer.php");?>
    
</body>
</html>
<?php
if($this->config->item("process")=="yes")
{
 $this->output->enable_profiler(TRUE);
}
?>