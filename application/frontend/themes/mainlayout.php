<?PHP include('header.php');?>
<body>
    
    <?php

foreach($this->_ci_view_paths as $key=>$val)

{

	$view_path=$key;	

}

?>
    <?php

$controllername=$this->router->class;

?>
         <?php if(isset($master_body) && $master_body!=""){?>
      <?php include($view_path.$controllername."/".$master_body.".php"); ?>

       <?php } ?>

<?php include('footer.php')?>
</body>
</html>

    