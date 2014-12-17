<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $master_title; ?></title>
        <!-- Bootstrap -->
        <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?PHP echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?PHP echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        <style>
            .login-btn {
                -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
                -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
                box-shadow:inset 0px 1px 0px 0px #ffffff;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9) );
                background:-moz-linear-gradient( center top, #f9f9f9 5%, #e9e9e9 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9');
                background-color:#f9f9f9;
                -webkit-border-top-left-radius:5px;
                -moz-border-radius-topleft:5px;
                border-top-left-radius:5px;
                -webkit-border-top-right-radius:5px;
                -moz-border-radius-topright:5px;
                border-top-right-radius:5px;
                -webkit-border-bottom-right-radius:5px;
                -moz-border-radius-bottomright:5px;
                border-bottom-right-radius:5px;
                -webkit-border-bottom-left-radius:5px;
                -moz-border-radius-bottomleft:5px;
                border-bottom-left-radius:5px;
                text-indent:0;
                border:1px solid #dcdcdc;
                display:inline-block;
                color:#e31258;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                font-style:normal;
                height:33px;
                line-height:33px;
                width:100px;
                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #ffffff;
                float: right;
            }
            .login-btn:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9) );
                background:-moz-linear-gradient( center top, #e9e9e9 5%, #f9f9f9 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9');
                background-color:#e9e9e9;
                color:#e31258;
                text-decoration: none;
            }.login-btn:active {
                position:relative;
                top:1px;
            }
        </style>
    </head>
    <body>
        <header class="header">
            <div class="top_head">
                <div class="top_area">
                    <ul>
                        <li><a class="active" href="#">Jobs</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Industrial Training</a></li>
                        <li><a href="#">Volunteering</a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="main_header">
                <div class="header_area">
                    <div class="logo"><a href="<?php echo site_url('home'); ?>"><img src="<?PHP echo base_url(); ?>assets/images/logo.png"></a></div>
                  <!-- <div class="add"><img src="<?PHP echo base_url(); ?>assets/images/add.jpg"></div> -->
                    <?php
                    //print_r($this->session->all_userdata());
                    $session_data = $this->session->all_userdata();

                    if (isset($session_data['tempdata']['logged_in'])):
                        echo '<div class="login_user" style="float:rignt; color:#e60a7c;  ">';
                        echo 'Welcome ' . $session_data['tempdata']['username'];
                        echo '</div>';
                        ?>
                        <a href="<?php echo site_url('login/logout'); ?>" class="login-btn "> Logout </a>
                    <?php else:
                        ?>
                        <a href="<?php echo site_url('login'); ?>" class="login-btn "> Login </a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>
        <div id="main_div">
            <?PHP if (!(isset($skip_nav)and ( $skip_nav == 1))) : ?>
                <?php include('navigation.php'); ?>
            <?PHP endif; ?>
            <div class="clearfix"></div>