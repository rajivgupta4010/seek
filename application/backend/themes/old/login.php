<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Club Hop</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/theme.css">
    <link rel="stylesheet" href="<?php echo base_url();?>lib/font-awesome/css/font-awesome.css">
    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

 
  </head>

  <body class=""> 

    
   <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="<?php echo base_url();?>/admin">Restaurant Dining</a>
        </div>
    </div>


    

       
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
       
            <p class="block-heading">Sign In</p>
            <?php 
			 $error= $this->session->flashdata('errormsg');
			 $successmsg= $this->session->flashdata('successmsg');
			 if($error!="" || $successmsg!="") { ?>
             <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>  <font color='red'> <?php echo $this->session->flashdata('errormsg'); ?></font>
         <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font></strong>
         </div>
         <?php } ?>
         
            <div class="block-body">
                 <form name="login" action="<?php echo base_url();?>login/check_login" method="post" class="upload" >
                
                    <label>Username</label>
                    
                     <input class="span12" type="text" name="username" maxlength="12" autocomplete="off" />
                    <label>Password</label>
                    
                     <input class="span12" type="password" name="password" maxlength="15" autocomplete="off" />
                   
                     <input type="submit" name="submitbtn"  value=" Login " class="btn btn-primary pull-right" />
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
       
        <!--<p><a href="reset-password.html">Forgot your password?</a></p>-->
    </div>
</div>


    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>