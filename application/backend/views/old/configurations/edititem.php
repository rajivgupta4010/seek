
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
            <div class="caption"> <i class="fa fa-reorder"></i> Edit 
              <?php echo $item[0]->title;?>
            </div>
            <div class="tools"> <a href="" class="collapse"> </a> </div>
          </div>
          <div class="portlet-body form">
            <form role="form" method="post">
              <?php if(isset($valerror)and ($valerror==1)): ?>
              <div class="alert alert-danger"> <?php echo validation_errors();?> </div>
              <?php endif;?>
              <?php if(isset($sucess)and ($sucess==1)): ?>
              <div class="alert alert-success"> <strong>Success!</strong> Record Updated. </div>
              <?php endif;?>
              <?php if(isset($Error)and (!empty($Error))): ?>
              <div class="alert alert-danger"> <strong>Error!</strong> <?php echo $Error; ?> </div>
              <?php endif;?>
              <div class="form-body">
              <?php if($item[0]->id!=2):?>
                <div class="form-group ">
                  <label for="exampleInputEmail1">
                    <?php if(isset($singular)and!empty($singular)) echo ucfirst($singular);?>
                    <?php echo $item[0]->title;?></label>
                  <input value="<?php echo $item[0]->value;?>" type="text" class="form-control "  name="name" placeholder="Enter <?php echo $item[0]->title;?>">
                  <input type="hidden" name="id" value="<?php echo $item[0]->id;?>" >
                </div>
                <?php else:?>
               
                <div class="form-group">
										<label><?php echo $item[0]->title;?></label>
										<div class="radio-list">
											<label class="radio-inline">
											<input type="radio" name="name" id="optionsRadios4" value="Sandbox" <?PHP if($item[0]->value =='Sandbox') echo "checked" ?>> Sandbox </label>
											<label class="radio-inline">
											<input type="radio" name="name" id="optionsRadios5" value="Live" <?PHP if($item[0]->value =='Live') echo "checked" ?>> Live</label>
											
										</div>
									</div>
                <?php endif;?>
               
                
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
