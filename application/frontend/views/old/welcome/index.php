<div class="jobs">
	<div class="left_area_job"><h1>Jobs</h1><div class="clearfix"></div>

        <div class="open_job">
    	<div class="create_job">
        	<a href="#"><div class="jobpnl">
            	<span>Open jobs</span>
            <strong>0</strong>
             </div></a>
             <div class="clearfix"></div>
             <hr>
             <div class="clearfix"></div>
             <div class="jobpnl">
            	<a href="#"><span>Ads expiring soon0</span>
                </a> <strong>0</strong>
             </div>
             
             <div class="jobpnl">
            	<a href="#"><span>Draft jobs</span>
                </a> <strong>0</strong>
             </div>
             
             <div class="jobpnl">
            	<a href="#"><span>Closed jobs</span>
                </a> <strong>0</strong>
             </div>
             
             <div class="clearfix"></div>
             <a href="<?php echo site_url('job/CreateJob');?>"  type="button" class="btn btn-warning"> <span class="glyphicon glyphicon-plus"></span>Create job</a>
             
             
        </div>
        <div class="job_post">
        	<div class="no_job">
            	<h1>You have no open jobs</h1>
                <p>To start finding candidates <a href="<?php echo site_url('job/CreateJob');?>">create a new job</a></p>
                <h2><span class="glyphicon glyphicon-plus-sign"></span></h2>
            </div>
            <div class="clearfix"></div>
            <div class="no_job_msg">
           	Save time and <a href="#">use a previous job</a> as a starting point for a new job </div>
        </div>
    </div>
    </div>
<div class="right_area_job">
    <h1> Your Account <?php echo $this->session->userdata('account_id');?> </h1>
<div class="clearfix"></div>
<div class="purchase_ad">
	<div class="save_up">
    	<p><a href="#">Purchase ad packs</a> - save up to 40% </p>
    </div>
<div class="clearfix"></div>
<div class="user">
	<div class="lft_usr"><a href="<?php echo site_url('account'); ?>"> Users </a><span class="glyphicon glyphicon-question-sign"></span>    </div>
    <div class="right_usr"><a href="<?php echo site_url('account/NewUser'); ?>"><span class="glyphicon glyphicon-plus"></span>User</a></div>
</div>  
  <div class="clearfix"></div>  
<div class="ad_new_usr">
You are the only user for this account.
  <a href="<?php echo site_url('account/NewUser'); ?>">Add a new user</a> to give others access. </div>

    </div>
 
 <div class="clearfix"></div>  
 
 <h2>Help</h2>
<div class="purchase_ad">
	<h3>Explore our new features</h3>
    <p><a href="#">Take a tour</a></p>
<p>-or- </p>
<p><a href="#">Check out our intro video </a></p>

 <div class="clearfix"></div> 
 
	<h3>Customer Service</h3>
    <p>Give us a call on  1300 658 700</p>
<p><a href="#">Contact us online</a></p>


    </div>
    
    
     
    
</div>  
</div>