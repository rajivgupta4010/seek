  <nav role="navigation" class="navbar navbar-fixed-top111 navbar-default" id="topnav">
		<div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url();?>" class="navbar-brand"><img src="<?php echo base_url();?>images/logo.jpg" alt="" /></a>
          </div>
    
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse custom_menu">
            <ul class="nav navbar-nav navbar-right">
                <?php 
				$url=$this->uri->segment(2);
				?>
                <li <?php if($url==''){echo 'class="active"';}?>><a href="<?php echo base_url();?>">Home</a></li>
                   
                <li <?php if($url=='how_it_work'){echo 'class="active"';}?>><a href="<?php echo base_url();?>pages/how_this_work">How This Works</a></li> 
                <?php if($this->session->userdata('userid') != '' && $this->session->userdata('user_type')=='user'){?>
                <li <?php if($url=='profile'){echo 'class="active"';}?>><a href="<?php echo base_url();?>users/profile">Profile</a></li>
                <li <?php if($url=='profile'){echo 'class="active"';}?>><a href="<?php echo base_url();?>users/log_out">Logout</a></li>
                
                <?php }else {?>
                <li <?php if($url=='sign_in'){echo 'class="active"';}?>><a href="<?php echo base_url();?>users/sign_in">Sign in</a></li>
                 <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse --> 
        </div>	
	</nav>
