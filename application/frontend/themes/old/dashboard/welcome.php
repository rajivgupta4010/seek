  <?PHP  include('header.php');?>

<div class="clearfix"></div>
<div id="main_div">
  <?PHP  include('nav.php');?>
  <div class="clearfix"></div>
 <?php
 foreach($this->_ci_view_paths as $key=>$val){ $view_path=$key;	} ?>
<?php $controllername=$this->router->class;?>
 <?php //echo $b; 
 
 
 if(isset($master_body) && $master_body!=""){?>
	 <?php include($view_path.$controllername."/".$master_body.".php"); ?>
     <?php } ?>


  

</div>
<div class="clearfix"></div>




  <?PHP  include('footer.php');?>
