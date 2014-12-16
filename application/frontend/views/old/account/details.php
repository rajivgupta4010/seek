<div class="jobs_container">
 <!--jobs tabs-->
 <!--  <div> -->
   <!-- Nav tabs -->
       <?php include_once('navigation.php');?>

  <!-- </div> -->
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane" id="account_users">
          
      </div>
      <div class="tab-pane active" id="account_details">
         <div class="job_open_tab_row">
              <div class="account_details_title">
                <h2>Account Details</h2>
              </div>
              <!-- <div class="job_open_create">
                 <a href="#"  class="create_job">
                   <span class="glyphicon glyphicon-plus-sign text_pink"></span> Create job
                 </a>
              </div> -->
             <!--  <div class="job_search_bar">                 
                    <div class="search-bar_input">                       
                        <input type="text" placeholder="Search open jobs">                       
                    </div>
                    <div class="search-bar_button"><span class="glyphicon glyphicon-search"></span></div>
              
              </div> -->
              <div class="clearfix"></div>
             
            <div class="content-wrapper">
              <div class="l-row l-clear-fix l-spacer-bottom">
                  <div class="grid_4">
                    <h3 class="account_details_sub_title">Your details</h3>
                    <div class="grid_4 panel-padded-border">
                      <div>
                        <div><strong>Name</strong></div>
                        <div class="float_left"><?php echo $emp_profile[0]->first_name ." ". $emp_profile['0']->last_name ;?></div><span class="glyphicon glyphicon-edit float_left mrgn_left10"></span>
                        <div class="l-spacer"><strong>Email</strong></div>
                        <div><?php echo  $emp_profile['0']->email;?> </div>
                      </div>
                    </div>
                  </div>
                  <div class="grid_4  l-column">
                    <h3>Company details</h3>
                    <div class="grid_4 panel-padded-border l-overflow ">
                    <div>
                        <div class="text-highlight text-larger">Company</div>
                        <div><?php echo $emp_profile['0']->cname;?></div>
                    </div>

                    <div>
                        <div class="text-highlight text-larger">Account Number</div>
                        <div><?php echo   $this->session->userdata['account_id'];?></div>
                    </div>
                    <div>
                        <div class="text-highlight text-larger">Primary Contact</div>
                        <div><?php echo   $emp_profile['0']->first_name . " ". $emp_profile['0']->last_name;?></div>
                        <div><a href="mailTo:<?php echo   $emp_profile['0']->email ;?>"><?php $emp_profile['0']->email;?></a></div>
                            <div>p: <?php echo   $emp_profile['0']->phone_no ;?></div>    
                                            </div>
                    <div>
                        <div class="text-highlight text-larger">Address</div>
                        <div><?php echo $emp_profile['0']->address;?></div>
                        <div><?php echo $emp_profile['0']->saddress;?></div>
                    </div>
                    <div>
                        <div class="text-highlight text-larger">Billing Address</div>
                            <div>As above</div>
                    </div>
                </div>
                  </div>
                  <div class="grid_4 l-column l-float-left state-panel-update-details">
                    <div class="grid_4 panel-padded-border state_panel-border-thicker l-overflow">
                        <div>
                            <p>To change your company name, please email <a href="mailto:accounts@seek.com.au">accounts@jobs.com.au</a>.</p>
                            <p>For any other changes please contact Customer Service on 1300 658 700 or email <a href="mailto:customerservice@seek.com.au">customerservice@jobs.com.au</a>.</p>
                        </div>
                    </div>
                 </div>
                  
              </div>
            </div>   
          </div>
      </div>     
    </div>

 <!--/jobs tabs-->
</div>