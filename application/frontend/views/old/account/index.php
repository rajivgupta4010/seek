<div class="jobs_container">
 <!--jobs tabs-->
 <!--  <div> -->
   <!-- Nav tabs -->
   <?php include_once('navigation.php');?>
  <!-- </div> -->
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="account_users">
          <div class="job_open_tab_row">
              <div class="job_open_title">
                <h2> Your Users</h2>
              </div>
              <div class="create_new_user">
                 <a href="<?php echo site_url('account/NewUser');?>"  class="btn_extra btn_large">
                   <span class="glyphicon glyphicon-plus-sign text_pink"></span> Create new user
                 </a>
              </div>
              <!-- <div class="job_search_bar">                 
                    <div class="search-bar_input">                       
                        <input type="text" placeholder="Search open jobs">                       
                    </div>
                    <div class="search-bar_button"><span class="glyphicon glyphicon-search"></span></div>
              
              </div> -->
              <div class="clearfix"></div>
              <!--table-->
              <div class="job_table_header">
                <div class="job_table_row">                   
                   <div class="grid_3">Name</div>

                    <div class="grid_1 l-column l-text-height"></div>

                    <div class="grid_3 l-column">Email</div>

                    <div class="grid_2 l-column">Access type</div>

                    <div class="grid_2 l-column">Last sign in</div>

                    <div class="grid_1 l-column"></div>
                    <!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'draft' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'closed' --><!-- /ko -->
                    <!-- ko 'if' : filteredBy() == 'premiumAdSlot' --><!-- /ko -->
                </div>
            </div>
              <!--/table-->
            <!-- <div class="no_open_jobs grid_8">
              <h2>You have no open jobs</h2>
            </div> -->  
            <div class="user_records">
            <?php //print_r($users);?>
            <?php foreach($users as $user): ?>
              <div class="l-row l-clear-fix l-spacer-top-tiny">
                  <div class="grid_3 l-overflow">
                    <a href="<?php echo   $user->user_id ?>"><?php echo   $user->first_name . ' '.  $user->last_name ;?></a><!--/ko-->
                      <!--/ko-->
                      <div class="text-lighter l-spacer-top-tiny">&nbsp;</div>
                  </div>
                  <div class="state_account-user-list_pending l-text-height"></div>
                  <div class="grid_3 l-column"><?php echo   $user->email ;?></div>
                  <div class="grid_2 l-column">
                  <?php if(($user->employer_role)==1):?>
                  	<?php echo "Administrator"?>
                  
                  <?php elseif(($user->employer_role)==2):?>
                  	<?php echo "All jobs access"?>
                 
                  <?php elseif(($user->employer_role)==3):?>
                  	<?php echo "Specific jobs access"?>
                <?php else: ?>
                <?php echo "NOTHING"?>
                  <?php endif;?>
                  
                  </div>
                  <div class="grid_2 l-column">10 Sep 14</div>
              </div>
              
              <?php endforeach;?>
            </div>
            <div class="border_panel grid_10 l-spacer">
                <div>
                   <div class="float_left text_pink">
                      <h2><span class="glyphicon glyphicon-plus-sign"></span></h2>
                   </div>
                   <div class="text_center">
                        Would you like to give others<br>
                        access to this account?<br>
                        <a href="<?php echo site_url('account/NewUser');?>">Create new user</a>
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="tab-pane" id="account_details">
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
             
            <div class="no_open_jobs">
              <h2>You have no draft jobs</h2>
            </div>   
          </div>
      </div>     
    </div>

 <!--/jobs tabs-->
</div>