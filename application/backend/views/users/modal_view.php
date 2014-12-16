<style type="text/css">
.new_input{margin:10px auto 0;}
.mb20{margin-bottom:20px;}  
</style>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php if(isset($items))  echo $items;?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
      <div class="col-md-12 "> 
        <!-- BEGIN SAMPLE FORM PORTLET-->
        
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-reorder"></i> <?php if(isset($singleIndustry) and !empty($singleIndustry)) echo 'Update';  else echo 'New';?>
              Course            </div>
            
          </div>
         
          <div class="portlet-body form">  <div class="sucess" >
          </div>
            <form role="form" id="form2" method="post" >
                                                        <div class="form-body">
                <div class="form-group sp1">
                  <label for="exampleInputEmail1">
                    Course Name</label>
                  <input type="text" value="<?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->name; ?>" class="form-control name required input_course" name="name" placeholder="Enter Name" aria-required="true">                  
                </div>
                                                           
                <?php if(isset($singleIndustry) and !empty($singleIndustry)) echo '<input type="hidden" name="id"  value="'.$singleIndustry[0]->id.'"  />'; ?>
                
                <?php /*?><div class="form-group ">
                  <label for="urlkey"> URL key </label>
                  <input type="text" class="form-control url_key required " value = "<?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->url_key; ?>" name="url_key" placeholder="Enter URL" aria-required="true">
                </div><?php */?>
                <div class="form-group ">
                  <label for="logo"> Description </label>
                 
                <textarea name="description" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->description; ?></textarea>
               </div>
               <div class="form-group ">
                  <label for="exampleInputEmail1">
                    Qualification</label>
                  
                  <select name="qualification" class="form-control course">
                    
                    <?php  foreach ($qualifications as $qualification) : ?>
                      <option  <?php if(isset($singleIndustry) and !empty($singleIndustry)) :
					  	if( $singleIndustry[0]->qualification == $qualification->id ) echo 'selected="selected"  ';
					  endif; ?> value="<?php echo $qualification->id?>"><?php echo $qualification->name?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group ">
                  <label for="logo"> Recognition </label>
                 
                <textarea name="recognition"  class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->recognition; ?></textarea>
               </div>
               
                
                <div class="form-group ">
                  <label for="exampleInputEmail1">
                   Provider</label>
                  <select name="provider" class="form-control course">
                    
                    <?php  foreach ($course_providers as $providers) : ?>
                      <option  <?php if(isset($singleIndustry) and !empty($singleIndustry)) :
					  	if( $singleIndustry[0]->provider == $providers->id ) echo 'selected="selected"  ';
					  endif; ?> value="<?php echo $providers->id?>"><?php echo $providers->name?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                
                 <div class="form-group ">
                  <label for="exampleInputEmail1">
                   Industry</label>
                  <select name="industry" class="form-control course">
                    
                    <?php  foreach ($industries as $providers) : ?>
                      <option  <?php if(isset($singleIndustry) and !empty($singleIndustry)) :
					  	if( $singleIndustry[0]->industry == $providers->id ) echo 'selected="selected"  ';
					  endif; ?> value="<?php echo $providers->id?>"><?php echo $providers->name?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group ">
                  <label for="logo"> Prerequisites </label>
                 
                <textarea name="Prerequisites" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->Prerequisites; ?></textarea>
               </div>
               
               <div class="form-group ">
                  <label for="exampleInputEmail1">
                    Study mode</label>
                  <select name="study_mode" class="form-control course">
                    <option value="0">Default</option>
                    <?php foreach ($study as $industry) : ?>
                      <option  <?php if(isset($singleIndustry) and !empty($singleIndustry)) :
					  	if( $singleIndustry[0]->study_mode == $industry->id ) echo 'selected="selected"  ';
					  endif; ?> value="<?php echo $industry->id?>"><?php echo $industry->name?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group ">
                  <label for="exampleInputEmail1">
                    Location</label>
                  <select name="location" class="form-control course">
                   
                    <?php foreach ($location as $industry) : ?>
                      <option  <?php if(isset($singleIndustry) and !empty($singleIndustry)) :
					  	if( $singleIndustry[0]->location == $industry->id ) echo 'selected="selected"  ';
					  endif; ?> value="<?php echo $industry->id?>"><?php echo $industry->name?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group ">
                  <label for="logo"> Study load </label>
                 
                <textarea name="study_load" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->study_load; ?></textarea>
               </div>
              
              <div class="form-group ">
                  <label for="logo"> Assessment </label>
                 
                <textarea name="assessment" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->assessment; ?></textarea>
               </div>
               <div class="form-group ">
                  <label for="logo"> Start date </label>
                 
                <textarea name="start_date" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->start_date; ?></textarea>
               </div>
             <div class="form-group ">
                <label for="logo"> Career outcomes </label>
                 
                <textarea name="career_outcomes" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->career_outcomes; ?></textarea>
               </div>
               
                <div class="form-group ">
                  <label for="logo">Course features </label>
                 
                <textarea name="features" class="required form-control description_field" ><?php if(isset($singleIndustry) and !empty($singleIndustry)) echo $singleIndustry[0]->features; ?></textarea>
               </div>
               
               
               
                <div class="form-group">
                  <label>Status</label>
                  <div class="radio-list">
                    <label class="radio-inline">
                      <div class="radio" id="uniform-optionsRadios4"><span class="checked"><input type="radio" name="status" id="optionsRadios4"  value="1" checked=""></span></div>
                      Publish </label>
                    <label class="radio-inline">
                      <div class="radio" id="uniform-optionsRadios5"><span><input type="radio" name="status" id="optionsRadios5" value="0"></span></div>
                      Unpublish</label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="submit_form" type="submit" class="btn btn-primary">Submit</button>
      </div>
            </form>
          </div>
        </div>
        <!-- END SAMPLE FORM PORTLET--> 
      </div>
    </div>
      </div>
      
    </div>
    

    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script> 

  <script type= "text/javascript">
    jQuery(document).ready(function() {
      // Add dynamic fields through jquery
      var add_button = $("#add_courses");
      var wrapper    = $(".sp1"); 
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();           
            $(wrapper).append('<div class="new_input"><input type="text" class="form-control new_input name required" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
          });

       $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove();
      })
   });   // JavaScript Document  
    
  // console.log( jQuery(".portlet  #form2"));
    jQuery(".portlet  #form2").validate({
        submitHandler: function(form) {
			
            jQuery.post("<?php echo site_url($this->uri->segment(1).'/new_item'); ?>", jQuery(".portlet  #form2").serialize(), function(data) {
               
				var obj = jQuery.parseJSON( data );
                                 error = 0;
                                jQuery( "#form2 .url_keyerror" ).remove();
                                 jQuery( "#form2 .nameerror" ).remove();
								 	jQuery( "#form2 .sucess" ).remove();
                                 jQuery('#form2 .name').css('border','1px solid #e5e5e5');
                                 jQuery('#form2 .url_key').css('border','1px solid #e5e5e5');
                                if (typeof obj.name != 'undefined') {
                                     error = 1;
                                  jQuery('#form2 .name').css('border','1px solid red');
                                  
                                  jQuery('#form2 .name').after('<div class="error nameerror">'+ obj.name +'  </div>');
                                }
                                if (typeof obj.url_key != 'undefined') {
                                    error = 1;
                                  jQuery('.url_key').css('border','1px solid red');
				
                                  jQuery('.url_key').after('<div class="error url_keyerror">'+ obj.url_key +'  </div>');
                                }
                                if (error === 0 )
                                {
                                   
								   if(obj.sucess ==1)
								    jQuery('.sucess').html("<div class='alert alert-success'><p class=''>Sucess</p></div>");								document.getElementById("form2").reset();
                                    
                                }
                            }
            

            );


            //jQuery(form).submit();
        
        }

    });  
    
 


  </script>