
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
              <div class="form-body">
              
                <div class="form-group ">
                  <label for="exampleInputEmail1">
                   Title
                    </label>
                    <input type="hidden" name="id" value="<?php echo $item[0]->id;?>"   />
                  <input type="text" value="<?php echo $item[0]->name;?>" class="form-control "  name="name" placeholder="Enter Name">
                </div>
                <div class="form-group ">
                  <label>Price</label>
                  <input type="text" value="<?php echo $item[0]->price;?>" class="form-control "  name="price" placeholder="Enter Price">
                  <span class="help-block"> Leave Empty for free </span>
               </div>
               <div class="form-group ">
                  <label>Feature1</label>
                  <input type="text" value="<?php echo $item[0]->feature1;?>" class="form-control "  name="feature1" placeholder="Plan Feature">
                  
               </div><div class="form-group ">
                  <label>Feature2</label>
                  <input type="text" value="<?php echo $item[0]->feature2;?>" class="form-control "  name="feature2" placeholder="Plan Feature">
                  
               </div><div class="form-group ">
                  <label>Feature3</label>
                  <input type="text" value="<?php echo $item[0]->feature3;?>" class="form-control "  name="feature3" placeholder="Plan Feature">
                  
               </div><div class="form-group ">
                  <label>Feature4</label>
                  <input type="text" value="<?php echo $item[0]->feature4;?>" class="form-control "  name="feature4" placeholder="Plan Feature">
                  
               </div>
               <div class="form-group ">
                  <label>No of Jobs</label>
                  <input type="text" value="<?php echo $item[0]->no_jobs;?>" class="form-control "  name="jobs" placeholder="No of jobs">
                  
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
