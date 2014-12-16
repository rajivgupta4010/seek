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
	  <div class="grid_9 panel-padded-border l-clear-fix l-spacer">
		 <div>
         
         <?php echo $this->session->userdata('Sucess'); $this->session->unset_userdata('Sucess');?>


                     <form id="new_user" action="" method="post">
				<h3 class="create_user_title">Step 1 of 2 - set email address/username</h3>
				<div class="l-spacer-bottom-small">
					<label class="add_user_email" for="Email">Email</label><br>
					<div class="grid_4 l-input-spacer">
						<input  name="email"  class="grid_4 l-border-box add_user_input_radius required" type="email">
						<span class="field-validation-valid"></span>
						<div class="text-lighter l-spacer-top-tiny">Users email - used to sign in</div>
					</div>
				</div>
				<div class="grid_2 l-input-spacer l-float-left add_user_btn ">
					<div class="btn add_user_btn_large state-btn-primary">
						<div class="l-clear-fix">
							<div class="btn_text submit">Next
							</div>
						</div>
					</div>
				</div>
                                
				<div class="grid_3 l-input-spacer l-column btn_large_spacer btn_text-only add_user_cancel_btn">
					<a href="<?php echo site_url('account');?>">Cancel</a>
				</div>
			</form>
		 </div>	
	  </div>
  </div>
</div>
   
   
  
