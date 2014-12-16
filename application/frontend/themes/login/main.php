
<!DOCTYPE html>

<head>
<meta charset="utf-8" />
<title><?php echo $master_title; ?></title>
<?PHP include('header.php'); ?> 
</head>
<body>
    
    <?php
 foreach($this->_ci_view_paths as $key=>$val){ $view_path=$key;	} ?>
<?php $controllername=$this->router->class;?>

 <?php //echo $b; 
 
 
 if(isset($master_body) && $master_body!=""){?>
	 <?php include($view_path.$controllername."/".$master_body.".php"); ?>
     <?php } ?>
	 
	 
         

<?php include('footer.php')?>
</body>
</html>

    