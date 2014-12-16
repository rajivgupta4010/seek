
<div class="page-content-wrapper">
		<div class="page-content">
                    <div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					
                                        <?php include($view_path.'users/title.php'); ?>
                                       
					<ul class="page-breadcrumb breadcrumb">
						
                  	<?php include($view_path.'users/breadcrumbs.php'); ?>
                                                
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
                    <div class="row">
                        
                        <div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> New <?php if(isset($singular)and!empty($singular)) echo $singular;?>    
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								
							</div>
						</div>
                                      
						<div class="portlet-body form">
                                                    <form role="form" method="post">
                                                        <?php if(isset($valerror)and ($valerror==1)): ?>
                                                        <div class="alert alert-danger">
								<?php echo validation_errors();?>
							</div>
                                                        <?php endif;?>
                                                          <?php if(isset($sucess)and ($sucess==1)): ?>
                                                        <div class="alert alert-success">
								<strong>Success!</strong> Record added.
							</div>
                                                        <?php endif;?>
                                                          <?php if(isset($Error)and (!empty($Error))): ?>
                                                        <div class="alert alert-danger">
								<strong>Error!</strong> <?php echo $Error; ?>
							</div>
                                                        <?php endif;?>
                                                        
								<div class="form-body">
									<div class="form-group ">
										<label for="exampleInputEmail1"> First Name</label>
                                                                             
                                                                                <input type="text" class="form-control "  name="first_name" placeholder="Enter First Name">
										
                                                                                
									</div>
                                                                    <div class="form-group ">
										<label for="exampleInputEmail1"> Last Name</label>
                                                                             
                                                                                <input type="text" class="form-control "  name="last_name" placeholder="Enter Last Name">
										
                                                                                
									</div>
                                                                    <div class="form-group ">
										<label for="exampleInputEmail1">Email - (Username)</label>
                                                                             
                                                                                <input type="email" class="form-control "  name="email" placeholder="Enter Name">
										
                                                                                
									</div>
                                                                    <div class="form-group ">
										<label for="exampleInputEmail1"> User Type</label>
                                                                             
                                                                                <div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="type" id="optionsRadios4" value="a" checked> Admin </label>
											<label class="radio-inline">
											<input type="radio" name="type" id="optionsRadios5" value="s"> Job Seeker</label>
                                                                                         <label class="radio-inline">
											<input type="radio" name="type" id="optionsRadios5" value="e"> Employer</label>
											
										</div>
										
                                                                                
									</div>
                                                                   
									
									
									
								</div>
								<div class="form-actions">
									<button type="submit" class="btn blue">Submit</button>
								
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
                    </div>
                </div>
</div>