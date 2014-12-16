<div class="container">
	<div class="registration">
    	<div class="registration_area">
        	<div class="left_logo"><img src="<?PHP echo base_url()."assets/images/"?>logo.png"></div>
            <div class="right_form">
            	<h4 class="green">Your Account is activated successfully</h4>
                <div class="clearfix"></div>
              <img src="<?PHP echo base_url()."assets/images/"?>success.png" alt="success" width="400">
    			<p style="margin:30px 0 70px; font-size:16px;">Please wait you are redirecting to login page ...<p>
                <div class="clearfix"></div>
                
     <?php $uri = site_url('advertiser'); header("Refresh:5;url=".$uri);    ?>
    
            </div>
        </div>
    </div>
</div>