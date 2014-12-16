<div class="default_container">
 
   <div class="tool_container">
      <ul class="tools_inner_nav">
      <li <?php if(isset($sub_navigation)and $sub_navigation=='manage_user') echo 'class="active"';?>  ><a href="<?php echo site_url('account');?>">Users</a></li>
      <li <?php if(isset($sub_navigation)and $sub_navigation=='details') echo 'class="active"';?> ><a href="<?php echo site_url('account/Details');?>">Account details</a></li>     
      </ul> 
  
      <div class="l-row l-clear-fix">
        <div class="functions_title grid_2_with_2gutters l-clear-fix">
            <h2>Add User</h2>
        </div>
      </div>
  </div>
  
  <div class="clearfix"></div>
  <div class="l-row">
	  <div class="grid_9 panel-padded-border l-clear-fix l-spacer mb25">
		 <div>
			<form id="new_user" method="post" action="">
				<h3 class="create_user_title">Step 2 of 2 - user details &amp; permissions</h3>
				<label class="fw600">Email</label>
				<br>
				<div class="l-spacer-top-tiny">
                        <div><?php  echo $userdata[0]->email; ?></div>
                    </div>
				<div class="l-clear-fix l-spacer-top">
                        <div class="l-float-left grid_3  fw600">
                            <label for="FirstName">First name</label>
                        </div>

                        <div class="grid_3 l-column fw600">
                            <label for="LastName">Last name</label>
                        </div>

                        <div class="l-clear"></div>

                        <div class="grid_3_with_1gutter l-float-left">
                            <div class="grid_3 l-input-spacer step_2_2_user_details">
                               <?php if(isset($userExists) and $userExists==1): 
							   echo "<strong>" . $userdata[0]->first_name . "</strong>"; 
							   ?>
                               <input type="hidden" name="new_user_id" value="<?PHP echo $userdata[0]->id;?>"  />
                               <input type="hidden" name="type" value="already"  />
                               <?PHP
							    else :?> 
                               <input type="text" name="first_name"  class="grid_3 l-border-box text-capitalize">
                                 <input type="hidden" name="new_user_i" value="<?PHP echo $userdata[0]->unique_id;?>"  /> 
                                 <input type="hidden" name="type" value="new"  />
                               
                               <?php endif;?>
                                <span class="field-validation-valid"></span>
                            </div>
                        </div>

                        <div class="grid_3 l-float-left l-input-spacer step_2_2_user_details">
                           <?php if(isset($userExists) and $userExists==1): 
							   echo "<strong>" . $userdata[0]->last_name . "</strong>";
							   
							    else :?> 
                            <input type="text" name="last_name" class="grid_3 l-border-box text-capitalize">
                             <?php endif;?>
                            <span class="field-validation-valid"></span>
                        </div>
                    </div>
                    <div class="l-clear"></div>

					<div class="l-spacer-top-small l-spacer-bottom-large">
                      <h3 class="fw600">Advertiser centre access type</h3>
                      <!-- ko 'ifnot': isEditingSelf -->
                      <div class="l-spacer-top-small adoinl">
                        <label><input type="radio"  value="1" name="userType" checked="checked">Administrator</label>
                        <ul class="l-spacer-top-tiny list-dash">
                          <li>Can create jobs</li>
                          <li>Access all jobs</li>
                          <li>Add and manage users</li>
                        </ul>

                        <label>
                          <input type="radio"  value="2" name="userType">All jobs access
                        </label>
                        <ul class="l-spacer-top-tiny list-dash">
                          <li>Can create jobs</li>
                          <li>Access all jobs</li>
                        </ul>

                        <label>
                          <input type="radio" value="3" name="userType">Specific jobs access
                        </label>
                        <ul class="l-spacer-top-tiny list-dash">
                          <li>Can create jobs</li>
                          <li>Access to jobs created by or assigned to user</li>
                        </ul>
                      </div>
                      <!-- /ko -->
                      <!-- ko 'if': isEditingSelf --><!-- /ko -->
                    </div>

				<div class="grid_2 l-input-spacer l-float-left add_user_btn submit">
					<div class="btn add_user_btn_large state-btn-primary">
						<div class="l-clear-fix">
							<div class="btn_text">Next
							</div>
						</div>
					</div>
				</div>
				<div class="grid_3 l-input-spacer l-column btn_large_spacer btn_text-only add_user_cancel_btn">
					<a href="account.html">Cancel</a>
				</div>
			</form>
			<div class="clearfix"></div>
		 </div>	
	  </div>
	  <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</div>