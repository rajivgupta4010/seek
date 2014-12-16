<div class="container">
	<div class="registration">
    	<div class="registration_area">
        	<div class="left_logo"><img src="<?PHP echo base_url()."assets/images/"?>logo.png"></div>
            <div class="right_form">
            	<h4>Email sent</h4>
                <div class="clearfix"></div>
                <p>We just sent an email to <a href="#"> <?php echo $email;?> </a>with instructions to complete your account registration.</p>
                <h5>Didn't receive it?</h5>
    			<p>Check your SPAM folder or click below and we'll resend the email.<br>
If you need help please contact  <a href="#"> Customer Service</a> on <?PHP echo TOLLFREENO;?>.</p>
<div class="clearfix"></div>
				
                <a class="btn btn-warning" href="<?php echo site_url("advertiser/resendmail/{$email}");?>" > Resend email </a>
    
    
            </div>
        </div>
    </div>
</div>