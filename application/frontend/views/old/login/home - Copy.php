<div class="container"> 
  <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade in" id="myModal" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
          <a href="<?php echo site_url('home/index');?>"><button data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><img src="<?php echo base_url();?>assets/images/close_icon.png" alt="close_icon"></span><span class="sr-only">Close</span></button></a>
                <div class="col-md-12 pdng_none heading">
      <h2>Get more out of SEEK</h2>

          <a class="btn btn-success" href="<?PHP echo site_url('advertiser');?>" type="button"><span class="glyphicon glyphicon-briefcase"></span>Employers<span class="glyphicon glyphicon-chevron-right"></span> </a></div>        
          <div class="clearfix"></div>   
        <div class="modal-body">
      <div class="clearfix"></div>
          <div class="col-md-12 pdng_none">		  
		  <div class="col-md-5 pdng_none">
		  	<div class=" left_area">
		  	<div class="icon"><img src="<?php echo base_url();?>assets/images/pc-icon.png"></div>
			<div class="text">
			<p>Apply faster with pre-filled applications and stored resumes.</p>
			</div>
			</div>
			 <div class="clearfix"></div> 
			 	<div class=" left_area">
		  	<div class="icon"><img src="<?php echo base_url();?>assets/images/phn-icon.png"></div>
			<div class="text">
			<p>Apply faster with pre-filled applications and stored resumes.</p>
			</div>
			</div>
			 <div class="clearfix"></div>
		 	<div class=" left_area">
		  	<div class="icon"><img src="<?php echo base_url();?>assets/images/search-icon.png"></div>
			<div class="text">
			<p>Apply faster with pre-filled applications and stored resumes.</p>
			</div>
			</div>
			 <div class="clearfix"></div> 
			 	<div class=" left_area">
		  	<div class="icon"><img src="<?php echo base_url();?>assets/images/msg-icon.png"></div>
			<div class="text">
			<p>Apply faster with pre-filled applications and stored resumes.</p>
			</div>
			</div>
			</div>
		<div class="col-md-6 pdng_none right_area">
                <form method="post" action=""  >
      <div class="form-group">
        <h1 style="color: #e60a7c; font-size:26px; margin: 0 0 12px 17px;">Candidate sign in</h1>
		<div class="clearfix"></div>
                <div id="signin_error" style="color:red;"></div>
                <div class="col-md-12 margn_b"><input type="email" name="email"  placeholder="Email address" id="signin_email" class="form-control"></div>
                <div class="col-md-12"><input type="password" name="password" placeholder="Password" id="signin_password" class="form-control"></div>
		<div class="clearfix"></div>
		<div class="checkbox pd">
        <label><input type="checkbox"> Stay signed in</label>
		<p style="color: #06c; font-size:12px; margin: 10px 0;"><a href="#">Trouble signing in?</a></p>
      </div>
      </div>
	<div class="clearfix"></div>
	<div class="col-md-12 pdng_none">
		<div class="botoom_area">
                    <button type="button" class="btn btn-warning"  onclick="validate_login();">Sign in</button>
		</div>
	</div>
	 </form>
		  </div>
    </div>
    <div class="clearfix"></div>
	<div class="col-md-12 pdng_none">
		<p class="standard">Don't have an account? <a href="<?PHP echo site_url('register')?>">Register</a></p>
	</div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div>