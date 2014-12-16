<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $master_title; ?></title>

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/ugk.ico" />

 <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php include("head.php");?>    <!-- incluse all the scripts and css here in this file -->

</head>

<?php

foreach($this->_ci_view_paths as $key=>$val)

{

	$view_path=$key;	

}

?>

  <body class=""> 
  
    <div class="navbar">
        <div class="navbar-inner">
        
                <ul class="nav pull-right">
                    
                  
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> Admin
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>commonfunctions/updateprofile">My Account</a></li>
                            <li class="divider"></li>
                           <li><a tabindex="-1" href="<?php echo base_url();?>login/logout">Logout</a></li>
                        </ul>
                     </li>
                    
                </ul>
                
                <a class="brand" href="<?php echo base_url();?>"><span class="first">Restaurant Dining</span> </a>
        </div>
    </div>
    
     <?php include("left_panel.php");?> 

<?php

$controllername=$this->router->class;

?>




                      

                    

 <script src="<?php echo base_url();?>lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>

</body>

</html>
