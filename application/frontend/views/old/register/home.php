
<div class="container">
  <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade in l-row1" id="myModal" style="display: block;">
    <div class="modal-dialog l-row3s">
      <div class="modal-content">

          <a href="<?php echo site_url('home/index');?>" class="reg_close_btn_rs">  <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><img src="<?php echo base_url();?>assets/images/close_icon.png" alt="close_icon"></span><span class="sr-only">Close</span></button></a>

                <div class="col-md-12 pdng_none heading">
      <h2>Get more out of SEEK</h2>
          <button class="btn btn-success" type="button"><span class="glyphicon glyphicon-briefcase"></span>Employers<span class="glyphicon glyphicon-chevron-right"></span> </button></div>
          
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
                      <form  action="<?php echo site_url('register/register_user'); ?>" method="POST">
      <div class="form-group">
        <h1 style="color: #e60a7c; font-size:26px; margin: 0 0 12px 17px;">Register</h1>
        <div id="disp_error" style="color: red">     
                                      <?php     
                                     if(isset($status) && $status=='1'):
                                         echo 'Registration Successful';
                                     ?> 
            <img id="loader" style="width: 10%;height: 10%;" src="<?php echo base_url(); ?>images/loading.gif">
                                      <?php
                                         header("refresh:3;url=".base_url());
                                 endif;
                                         ?>
        </div> 
        <div id="disp_error"></div>
		<div class="clearfix"></div>
                
                <div class="col-md-6"><input type="text" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name'); ?>" id="first_name" class="form-control" required="required"></div>
		<div class="col-md-6"><input type="text" placeholder="Last Name"  name="last_name" id="last_name" class="form-control" required="required"></div>
                <div class="first_name_error" ><?php echo form_error('first_name'); ?></div>
                <div class="last_name_error" >
                <?php echo form_error('last_name'); ?></div>               
		<div class="col-md-12 margn_b"><input type="email" placeholder="Email address" name="email" id="email" class="form-control" required="required"></div>
                <?php echo form_error('email'); ?>
                <div class="col-md-12"><input type="password" placeholder="Password" name="password" id="password" class="form-control" required="required"></div>
                <?php echo form_error('password'); ?>
		
                <div class="clearfix"></div>
		<div class="checkbox pd">
        <label><input type="checkbox"> Stay signed in</label>
		<p style="color: #777777; font-size:12px; margin: 10px 0;">By registering you agree to the SEEK privacy policy. </p>
      </div>
      </div>
    
	<div class="clearfix"></div>
	
	<div class="col-md-12 pdng_none">
		<div class="botoom_area">
                    <input type="submit" class="btn btn-warning" value="Continue">
		</div>
            
	</div></form>
	
		  </div>
      
      
    </div>
    
    <div class="clearfix"></div>
	
	<div class="col-md-12 pdng_none">
		<p class="standard">Already registered? <a href="<?php echo site_url('login');?>">Sign in here</a></p>
	</div>
        </div>       
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  
  
  
  
  
  
  
  

</div>
