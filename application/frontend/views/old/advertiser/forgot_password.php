<style>
    	body{ background:#333;}
    </style>
<div class="l-body-container_dark">
            <div class="bare-bones l-clear-fix">
                        <div class=" l-row1">
                            <div class="l-row2s l-clear-fix bare-bones_body">
                                <div class="grid_2_with_gutter_s l-float-left">

                                    <div class="logo_forgot-pass"><img src="<?PHP echo base_url()."assets/images/"?>logo.png" alt="logo"></div>
                                </div>
                                <div class="grid_8 bare-bones_content l-float-right l-clear-fix">
                                    <div class="grid_1 l-float-left">
                                        &nbsp;
                                    </div>
                                    <div class="grid_7 l-column bare-bones_content_right l-clear-fix">
                                        <div>
                                            <br>
                                            <h2 id="forgot_password">Trouble signing in?</h2>
                                            
                                            <p class="text-larger text-highlight_pink">Have you tried signing in with your email address?</p><p>

                                            </p><p><a href="<?php echo site_url('advertiser');?>">Go back to sign-in page</a></p><p>

                                            </p><p class="l-spacer-top-large">
                                                Career View  employer usernames are case and space sensitive.<br>
                                                Check your username is exactly as it was when registered.
                                            </p>

                                            <p class="text-highlight l-spacer-top-large">Forgotten your sign in details?</p>
                                            <p>
                                                Enter the email for your Career View  employer account and we'll send you<br>instructions to change your password.
                                            </p>

                        <form  id="register" method="post" >
                            <div><label for="Email">Email</label></div>
                            <div class="grid_3 l-input-spacer l-clear-fix validation_input forgot_pass_email-r">
                                <input type="email" value="" name="email" class="grid_3 l-border-box required">
                                <span data-valmsg-replace="true" data-valmsg-for="Email" class="field-validation-valid"></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="grid_2 l-input-spacer l-float-left">
                                <div class="btn btn_large btn_large_input state-btn-primary">
                                    <div class="l-clear-fix">
                                        <input type="submit" class="forgot_pass_submit-r" value="Send">
                                    </div>
                                </div>

                            </div>
                            <div class="grid_3 l-input-spacer l-column btn_large_spacer btn_text-only forgot_pass_cancl_r">
                                <a href="<?php echo site_url('advertiser');?>">Cancel</a>
                            </div>
                            <div class="l-clear"></div>
                        </form>      
                        <p>
                            If you need additional help, please email <a href="">Customer Service</a> or give<br>
                            them a call on <strong><i data-icon="" aria-hidden="true"></i><?php echo TOLLFREENO;?></strong>.
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>