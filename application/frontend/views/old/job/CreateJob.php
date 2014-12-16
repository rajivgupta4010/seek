<div class="default_container">
 
   <div class="tool_container_progress"  style="display:none">
     <div class="l-row">
     	<div class="loading_navigation_bar">
        	<ul class="loading_nav" >
                <li class="active">
                    <a href="javascript;">Write job</a>  
                    <span class="arrow-down"><span>                                     
                </li>
                <li>
                    <a href="">Classify job</a>                                      
                </li>
                <li>
                   <a href="">Preview</a>                                      
                </li>
                <li>
                   <a href="">Checkout</a>                                     
                </li>
                <li>
                    <a href="">Completed</a>                                      
                </li>
            </ul>
        </div>
     </div>
     
     <div class="l-row">
     	<div class="progress_background">
        	<div class="progress_set-area progress_write">
            	<div class="progress_icon"></div>
            </div>
        </div>
     </div>
     <div class="clearfix"></div> 
      <div class="l-row l-clear-fix">
        <div class="functions_title grid_2_with_2gutters l-clear-fix">
            <h2>Our Products</h2>
        </div>
      </div>
  </div>  
  <div class="clearfix"></div> 
  
  <div class="l-row">
     <form id="job"  method="post" enctype="multipart/form-data">      
        <div class="support_subheading_3">
            <h3 class="l-float-left grid_5">What jobseekers see in the <strong>search results</strong></h3>
            
        </div>
        <?php if(isset($valerror)and $valerror==1) echo validation_errors(); ?>
        <?php if(isset($sucess)) 
		{
			 echo '<p class="success">Job listed, waiting for admin approval</p>'; 
			//$this->output->set_header('refresh:5;url=job'); 
		}?>
        
        <div class="grid_8 panel-padded-border_r">

            <div class="ad_classic grid_7">
                <label for="JobTitle">Job title</label><br>
                <input name="job_title" type="text" class="grid_7 required"  id="example_job_title" >
                
            </div>            
            
            
          
            <div class="example_selling_point grid_4 help-bubble caja_write-job_help-bubble caja_selling-point_help-bubble">
                <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                <p>Sell this job to jobseekers.<br>Identify why it is appealing<br>e.g. unique aspects about the job, team/culture, benefits &amp; location details. </p>
            </div>

            <div class="example_job_title job_title_tips grid_4 help-bubble caja_write-job_help-bubble caja_job-title_help-bubble">
                <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                <p>Helps jobseekers match themselves to your job ad.</p><p>Use a title that best reflects the job within your industry.</p>
            </div>
            <div class="caja_job-summary l-clear-fix widthoutLogo_sumry">
                <div class="l-float-left ad_options grid_5">
                    <label>Job summary</label><br>
                    <textarea class="grid_5 required" rows="3" name="job_summary" id="example_job_summery"></textarea>
                </div>
            </div>
            

            <div class="caja_salary grid_3 ad_classic">
                <label>Salary &amp; benefits (optional)</label><br>
                <input type="text" class="grid_3" name="job_salary_benefits" id="example_salary">
            </div>
            
            <div class="grid_4 example_salary help-bubble caja_write-job_help-bubble caja_salary_help-bubble">
                <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                <p>Jobseekers use salary to determine if the job is relevant to them. Specify the salary or salary range + benefits.</p>
                <p>This information improves the likelihood jobseekers will view your job ad.</p>
            </div>
            
			<!--<div class="clearfix"></div>-->
            <div class="grid_3 ad_options">
                <label>Work type</label><br>
                <div>
                    <select name="work_type" class="grid_3 required">
                        <option value="1">Full time</option>
                        <option value="2">Part time</option>
                        <option value="3">Contract/temp</option>
                        <option value="4">Casual/vacation</option>
                    </select>
                </div>
            </div>
  			<div class="grid_4 example_job_summery help-bubble caja_write-job_help-bubble caja_job_summary_help-bubble">
            <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
            <p>Jobseekers use this to see if the job is relevant to them. Expand on the job title so that jobseekers know enough to continue through to the job ad.</p>
            <p class="non-classic_help-text">Avoid repeating the key selling points.</p>
            <p class="classic_help-text">
                Identify why it is appealing<br>
                e.g. unique aspects about the job, benefits &amp; location details.
            </p>
        </div>
      <div class="grid_4 example_job_summery2 help-bubble caja_write-job_help-bubble caja_job_summary_help-bubble">
          <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
          <p>Jobseekers use this to see if the job is relevant to them. Expand on the job title so that jobseekers know enough to continue through to the job ad.</p>
          <p class="non-classic_help-text">Avoid repeating the key selling points.</p>
          <p class="classic_help-text">
              Identify why it is appealing<br>
              e.g. unique aspects about the job, benefits &amp; location details.
          </p>
      </div>
          <!-- ko 'if': jobSummaryFocus --><!-- /ko -->
        </div>
        <div class="clearfix"></div>
        
        <div class="support_subheading_3">
        	<h3 id="WriteJobAd">What jobseekers see in the <strong>job ad</strong></h3>
        </div>
        <div class="clearfix"></div>
        <div class="grid_8 panel-padded-border">     
        	<div class="validation_input">
            	<label for="JObDetails">Job details </label><br>
                
                    <textarea class="required" name="job_details" id="editor1" rows="10" cols="80">
                       
                    </textarea>
                    
                
            </div>    
            
            <div class="grid_4 ckeditor_tips help-bubble caja_write-job_help-bubble caja_job-details_help-bubble">
                    <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                    <p>Be concise. Candidates may be reading your ad on a phone or tablet.</p>
                    <p>Candidates are looking for the essentials to determine if this job is the right fit for them. Where possible consider the following:</p>
                    <p><strong>Top 3 Selling Points</strong></p>
                    <ul>
                        <li>Showcase the Top 3 most interesting aspects of the role, benefits or company</li>
                    </ul>

                    <p><strong>About the role</strong></p>
                    <ul>
                        <li>Describe the primary purpose of the role</li>
                    </ul>

                    <p><strong>Duties &amp; responsibilities</strong></p>
                    <ul>
                        <li>List out the core duties they will perform</li>
                    </ul>

                    <p><strong>Skills &amp; experience</strong></p>
                    <ul>
                        <li>List out the experience level, qualifications or specific skills required</li>
                    </ul>

                    <p><strong>Benefits &amp; culture</strong></p>
                    <ul>
                        <li>Describe why candidates would enjoy working in your business</li>
                        <li>Include information on culture, career development &amp; work-life balance</li>
                        <li>List out key benefits</li>
                    </ul>

                    <p><strong>About the company</strong></p>
                    <ul>
                        <li>Describe the company’s size, reach &amp; industry speciality</li>
                    </ul>

                    <p>Please note that links to other websites are not supported.</p>
                </div>
                                             
            <div class="validation_input ad_options">
                <label for="ContactDetails">Contact details (optional)</label><br>
                <textarea id="example_contact" rows="4" class="grid_7" maxlength="5000" name="contact_details"></textarea>
                <span data-valmsg-replace="true" data-valmsg-for="ContactDetails" class="field-validation-valid"></span>
            </div>    
            
            <div class="grid_4 example_contact help-bubble caja_write-job_help-bubble caja_contact-details_help-bubble">
                    <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                    <p>Provide information so the jobseekers can contact you in your preferred way.</p><p>Specify a closing date if there is one.</p>
                </div> 
            <div class="clearfix"></div>
        </div>
        
         <div class="clearfix"></div>
         <div class="support_subheading_3">
        	<h3>What are your <strong>candidate requirements</strong></h3> 
         </div>
         <div class="clearfix"></div>
            <div class="grid_8 panel-padded-border_r">
                <div>
                    <label class="label-with-control"><input name="country_check" value="1" type="checkbox">Candidates must have the right to work in this country</label><br>
                    <span><label class="label-with-control"><input name="entry_level_candidates" value="1" type="checkbox">Role is applicable to recent graduates and entry level candidates</label></span>
                </div>
            </div>
         <div class="clearfix"></div>
         <div class="support_subheading_3">
         	<h3>How often you want to receive <strong>application notifications</strong></h3>
         </div>   
         <div class="clearfix"></div>
         <div class="grid_8 panel-padded-border_r">         
         <div>
                <div class="management-settings_normal">
                    <div class="l-clear-fix l-spacer-bottom-small">
                        <label>How often would you and other users like to be notified of applications?</label>&nbsp;
                        <a href="#" class="career_notification_tip_icon"><span id="hover-notifier-onjob" class="glyphicon glyphicon-question-sign"></span></a>
                        <div class="career_notification_tip grid_4 help-bubble caja_write-job_help-bubble caja_notifications-select_help-bubble div-hover-notifier-onjob">
                            <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                            <p>Choose one of the notification options:</p>
                            <p>
                                <strong>Daily/Weekly summary</strong><br>
                                Save your inbox from overflowing - receive a daily/weekly email
                                updating you on the number of new applicants and manage candidates on SEEK.
                            </p>                                
                        </div>
                    </div>

                    <div class="l-float-left grid_1 l-spacer-top-small spacer_top_mall">
                        <span class="glyphicon glyphicon-user icon_grey"></span>&nbsp;You
                    </div>
                    <div class="grid_3">
                        <div class="ad_options_ahv">
                            <select name="notifications_frequency" class="required" id="example_frequency">
                            	<option>Select a frequency</option>
                                <option value="1">Daily summary email</option>
                                <option value="2">Weekly summary email</option>
                                <option value="3">Email every application</option>
                                <option value="4">Don't send notifications</option>
                            </select>
                            <i class="text_pink select-validation-icon" data-icon="" aria-hidden="true"></i>
                        </div>

                        <!-- ko 'if': showNotifyFreqError --><!-- /ko -->
                    </div>
						
                    <div class="grid_4 example_frequency help-bubble caja_write-job_help-bubble caja_notifications-select_help-bubble">
                        <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                        <p>Choose one of the notification options:</p>
                        <p>
                            <strong>Daily/Weekly summary</strong><br>
                            Save your inbox from overflowing - receive a daily/weekly email
                            updating you on the number of new applicants and manage candidates on SEEK.
                        </p>
                        <p>
                            <strong>Email every application</strong><br>
                            Get applications straight to your inbox, as Candidates apply.
                        </p>
                    </div>    
                    <div class="l-clear"></div>
                </div>   
                                                            
                <div class="l-clear"></div>
               
                
                
                
            </div>
            <!-- /ko -->
        </div>
        <div class="grid_8 panel-padded-border_r management-settings_normal">
            <div class="validation_input">
                <label for="InternalReference">Internal reference(optional)</label><br>
                <input type="text" name="internal_reference" class="grid_5" id="example_internal_ref">
                <span class="field-validation-valid"></span>                
            </div> 
            
            <div class="grid_4 example_internal_ref help-bubble caja_write-job_help-bubble caja_ref-no_help-bubble">
                <span class="arrow arrow_left_help-bubble"><span class="arrow arrow_left_help-bubble_inner"></span></span>
                <p>This will appear on invoices we send to you and can be used for record keeping purposes.</p>
                <p>It will <strong>not</strong> appear on your job ad. </p>
            </div>
            <br>           
        </div>    
        
</form>
  </div>
  <div class="clearfix"></div>
  <div class="content-base_dark">
  	<div class="l-row">
    	<div class="grid_2 l-float-left">
        	<div class="btn btn_large state-btn-primary">
            	<div class="l-clear-fix btn_shadow_dark">
                    <div class="btn_text">
                        
                        <input type="submit" class="white submit"  value="Continue"  />
                    </div>
                </div>
            </div>
        </div>
        <div class="grid_2 l-float-left btn_large">
        	<a href="#" class="btn_white">Save</a>
        </div>
    </div>
  </div>
  
</div>
<script type="text/javascript">
</script>