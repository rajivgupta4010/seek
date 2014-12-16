
<div class="page-content-wrapper">
		<div class="page-content">
                    <div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					
                                        <?php include($view_path.'jobs/title.php'); ?>
                                       
					<ul class="page-breadcrumb breadcrumb">
						
                  	<?php include($view_path.'jobs/breadcrumbs.php'); ?>
                                                
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
										<label for="exampleInputEmail1">  Start salary</label>
                                                                             
                                                                                <input type="text" class="form-control "  name="name" placeholder="Enter salary">
										
                                                                                
									</div>
									<div class="form-group ">
										<label for="exampleInputEmail1"> <?php if(isset($singular)and!empty($singular)) echo ucfirst($singular);?> Value in numbers</label>
                                                                             
                                                                                <input type="text" class="form-control "  name="value" placeholder="Enter Value">
										
                                                                                
                                    </div>
<div class="form-group">                                         <label>Range
Type</label>                                         <div class="radio-list">
<label class="radio-inline range">
<input type="radio" name="type" id="optionsRadios4" value="a" checked>
Annually </label>                                             <label class
="radio-inline">                                             <input
type="radio" name="type" id="optionsRadios5" value="h"> Hourly</label>
											
										</div>
									</div>
									<div class="form-group annually">
										<label>Parent SalaryRange</label>
                                           <select name="parent_id_annually" class="form-control">
											<option>Default</option>
											<?php if(isset($classifications)) : foreach($classifications as $row) :?>
                                                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
											<?PHP endforeach; endif;?>
										</select>
                                                                                <span class="help-block">
											Leave default for root range
										</span>
									</div>
									<div class="form-group hourly">
										<label>Parent SalaryRange</label>
                                           <select name="parent_id_hourly" class="form-control">
											<option>Default</option>
											<?php if(isset($hourly)) : foreach($hourly as $row) :?>
                                                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
											<?PHP endforeach; endif;?>
										</select>
                                                                                <span class="help-block">
											Leave default for root range
										</span>
									</div>
                                                                      
									<div class="form-group">
										<label>Status</label>
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="status" id="optionsRadios4" value="1" checked> Publish </label>
											<label class="radio-inline">
											<input type="radio" name="status" id="optionsRadios5" value="0"> Unpublish</label>
											
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