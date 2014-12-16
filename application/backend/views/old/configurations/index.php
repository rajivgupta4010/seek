
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
            <div class="caption"> <i class="fa fa-reorder"></i> 
              <?php if(isset($singular)and!empty($singular)) echo $singular;?>
            </div>
            <div class="tools"> <a href="" class="collapse"> </a> </div>
          </div>
          <div class="portlet-body form">
            <form role="form" method="post">
              <?php if(isset($valerror)and ($valerror==1)): ?>
              <div class="alert alert-danger"> <?php echo validation_errors();?> </div>
              <?php endif;?>
              <?php if(isset($sucess)and ($sucess==1)): ?>
              <div class="alert alert-success"> <strong>Success!</strong> Record updated. </div>
              <?php endif;?>
              <?php if(isset($Error)and (!empty($Error))): ?>
              <div class="alert alert-danger"> <strong>Error!</strong> <?php echo $Error; ?> </div>
              <?php endif;?>
              <div class="form-body col-md-12">
              
                <div class="form-group">
										<label class="col-md-2 control-label">Paypal Email </label>
										<div class="col-md-5	">
											<input type="text" class="form-control email" placeholder="Enter Email">
											
										</div>
									</div>
                
              </div>
              <div class="form-actions col-md-12">
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
