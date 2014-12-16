 <section class="footersection">
     <div class="container">
     <div class="row">
      <div class="col-md-7 fotr col-sm-12">
       <ul class="footerul">
       <li><a href="<?php echo base_url();?>pages/contact_us">Contact us</a></li>
       <li>|</li>
        <li><a href="<?php echo base_url();?>pages/about_us">About us</a></li>
        <li>|</li>
         <li><a href="<?php echo base_url();?>pages/help">FAQ </a></li>
         <li>|</li> <li><a href="<?php echo base_url();?>pages/privacy_policy">Privacy policy</a></li>
          <li>|</li>
           <li><a href="<?php echo base_url();?>pages/terms">Terms &amp; conditions</a></li>
           <!--<li>|</li>
            <li><a href="<?php echo base_url();?>pages/jobs">jobs</a></li>
            <li>|</li>
             <li><a href="<?php echo base_url();?>pages/press">press</a></li>-->
       </ul>
       <div class="clear"></div>
      <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3 col-xs-offset-4">
       <ul class="socialicon">
  <!--     <li><a href="#" class="ins"></a></li>
       <li><a href="#" class="rss"></a></li>
       <li><a href="#" class="gp"></a></li>
       <li><a href="#" class="pin"></a></li>-->
       <li><a href="https://twitter.com/Restaurant_Dine"  target="_blank" class="tw"></a></li>
       <li><a href="https://www.facebook.com/RestaurantDining" target="_blank" class="fb"></a></li>
       <li><a href="#" target="_blank" class="ins"></a></li>
       
       </ul>
       </div>
       
       </div>
      </div>
      <div class="col-md-5 col-sm-12 fotr">
         <div class="join_sign ">
            <h3>join our newsletter</h3>
            <p>Sign up for our newsletter to get the lastest offers </p>
         </div>  
         
          
         <div class="right_last col-xs-12">
           <form action="javascript:void(0);" name="post" id="notification_request">
            <div id="error1" style="color:red;"></div>
           <input type="text"  class="txt" id="email_notification" name="email"/>
           <input type="submit" value="Submit" class="subm" onclick="return send_notification();"/>
           </form>
          
         </div>
          
      </div>
      </div>
     </div>
  </section>
  <script language ="javascript" type = "text/javascript" >
	var BASEURL='<?php echo base_url();?>';
    function send_email()
	{
	  var email=$("#email").val();	
	  var coupon_id=$("#coupon_id").val();	
	  var table=$("#table").val();	
	   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if(email=="")
	   {
	    var error="Please enter your email.";
		$('#email').focus();
	   }
	   else if(!filter.test(email))
	   {
	    var error="Please enter a valid email address";
		$('#email').focus();
	   }
	    if(error != "" && error != null)
	  {
			$('#error').html(error);
			$('#error').show("normal");
			return false;
	  }
      else
	   {
		 
	   $.ajax({
		   
		   url: BASEURL+'users/submit_application',
		        data:'type=json&email='+email+'&coupon_id='+coupon_id+'&table='+table,
				type: 'GET',
				dataType: 'html',
				beforeSend: function() 
				{
					$("#error").html('');
					$("#progress").html('<font color="red">Please wait.sending request....</font>');
				},
				success: function(data)
				{
					
					if(data=="success")
					{
					$("#progress").html('');	
					$('#error').html("<font color='green'>Request sent successfully.</font>");	
				       $('#email').val('');
					}
					else if(data=="allready")
					{
					$("#progress").html('');	
					$('#error').html("<font color='red'>you have already notified this coupon.</font>");	
				     $('#email').val('');
					}
					else
					{
					$("#progress").html('');	
					$('#error').html("There is some technical error to send request.Please conact to admin.");	
				  }
					
				} 
		   
	   })
	  }
	}
	function send_notification()
	{
	  var email=$("#email_notification").val();	
	   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if(email=="")
	   {
	    var error="Enter your email.";
		$('#email').focus();
	   }
	   else if(!filter.test(email))
	   {
	    var error="Enter valid email";
		$('#email').focus();
	   }
	    if(error != "" && error != null)
	  {
			$('#error1').html(error);
			$('#error1').show("normal");
			return false;
	  }
      else
	   {
		   
	   $.ajax({
		  
		   url: BASEURL+'users/notification_request',
				data:'type=json&email='+email,
				type: 'GET',
				success: function(data)
				{
					
					if(data=="success")
					{
						$('#error1').html("<font color='green'>Request sent successfully.</font>");	
				       $('#email_notification').val('');
					}
					
				} 
		  })
	  }
	}
	</script>