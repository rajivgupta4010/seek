
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        <?php include($view_path . 'jobs/title.php'); ?>
        <ul class="page-breadcrumb breadcrumb">
          <?php include($view_path . 'jobs/breadcrumbs.php'); ?>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB--> 
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 "> 
        <!-- BEGIN SAMPLE FORM PORTLET-->
        
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-reorder"></i> Registration Email Template </div>
            <div class="tools"> <a href="" class="collapse"> </a> </div>
          </div>
          <div class="portlet-body form">
            <form role="form" method="post">
              <?php if (isset($valerror)and ( $valerror == 1)): ?>
              <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
              <?php endif; ?>
              <?php if (isset($sucess)and ( $sucess == 1)): ?>
              <div class="alert alert-success"> <strong>Success!</strong> Record added. </div>
              <?php endif; ?>
              <?php if (isset($Error)and ( !empty($Error))): ?>
              <div class="alert alert-danger"> <strong>Error!</strong> <?php echo $Error; ?> </div>
              <?php endif; ?>
              <div class="form-body">
                <div class="form-group ">
                  <label> Name</label>
                  <input type="text" class="form-control " value="<?PHP echo $item[0]->name;?>"  name="name" placeholder="Enter Name">
                </div>
                <div class="form-group ">
                  <textarea class="ckeditor1" cols="80" id="editor1" name="cms" rows="10"><?PHP echo $item[0]->content;?></textarea>
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
