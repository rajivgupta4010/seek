<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $master_title; ?></title>
<!-- Bootstrap -->
<link href="<?PHP echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?PHP echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
.add ul.nav{
	min-width:55%;
}
</style>
<body>
<header class="header">
  <!--<div class="top_head">
    <div class="top_area">
      <ul>
        <li><a class="active" href="#">Jobs</a></li>
        <li><a href="#">Courses</a></li>
        <li><a href="#">Industrial Training</a></li>
        <li><a href="#">Volunteering</a></li>
      </ul>
    </div>
  </div>-->
  <div class="clearfix"></div>
  <div class="main_header">
    <div class="header_area">
      <div class="logo"><a href="<?php echo base_url();?>"><img src="<?PHP echo base_url();?>assets/images/logo.png"></a></div>
      <div class="add">
      <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" id="fat-menu">
              <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><?php echo "<b>". ucwords($this->session->userdata('name') . '</b>' ." ". $this->session->userdata('company_name')) ;?> (<?php echo $this->session->userdata('account_id');?>)<span class="caret"></span></a>
              <ul aria-labelledby="drop3" role="menu" class="dropdown-menu">
                <li role="presentation"><a href="<?php echo site_url('logout')?>">Sign  out</a></li>
              </ul>
            </li>
          </ul>
           <div class="clearfix"></div>
          <div class="customer_service"> <a href="#">Customer Service</a><span class="glyphicon glyphicon-earphone"></span> <?php echo TOLLFREENO;?></div>
      </div>
    </div>
  </div>
</header>