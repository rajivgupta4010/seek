<div class="page-content-wrapper">
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body"> Widget settings form goes here </div>
          <div class="modal-footer">
            <button type="button" class="btn blue">Save changes</button>
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog --> 
    </div>
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title"> <?php echo $type; ?> </h3>
        <ul class="page-breadcrumb breadcrumb">
          <li> <i class="fa fa-home"></i> <a href="<?php echo site_url('dashboard'); ?>">Home</a> <i class="fa fa-angle-right"></i> </li>
          <li>
            <?php if (isset($parent_class) and ! empty($parent_class)): ?>
            <a href="<?php echo site_url($parent_class); ?>"> <?php echo ucwords($parent_class); ?> </a>
            <?php endif; ?>
            <i class="fa fa-angle-right"> </i>
            <?php if (isset($type)) echo $type; ?>
          </li>
          <li> </li>
        </ul>
      </div>
    </div>
    <!-- END PAGE HEADER--> 
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
      <div class="col-md-12">
        <div class="portlet box blue-hoki">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-globe"></i><?php echo $type; ?> </div>
            <div class="tools"> </div>
          </div>
          <div class="portlet-body form">
            <form role="form" method="post" action="" class="template">
              <div class="form-body">
                <?php if (isset($sucess) and ! empty($sucess)): ?>
                <div class="alert alert-success"> <?php echo $sucess?> </div>
                <?php endif; ?>
                
                <?php if (isset($error_flag) and ! empty($error_flag)): ?>
                <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
                <?php endif; ?>
                
                
                <div class="form-group col-md-12">
                  <label>First Name </label>
                  <div class="input-group col-md-12">
                    <input type="text" name="first_name" value="<?php if(isset($user[0]->first_name)) echo $user[0]->first_name; ?>" class="form-control  required" placeholder="First Name">
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label>Last Name </label>
                  <div class="input-group col-md-12">
                    <input type="text" name="last_name" value="<?php if(isset($user[0]->last_name)) echo $user[0]->last_name; ?>" class="form-control required" placeholder="Last Name">
                    <?php  if(isset($user[0]->id) and !empty($user[0]->id)):?>
                    <input type="hidden" name="id" value="<?php echo $user[0]->id; ?>">
					<?php endif;?>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label>Email </label>
                  <div class="input-group col-md-12">
                    <input <?php if(isset($user[0]->email)) { ?> disabled="" <?php }?> type="email" name="email" value="<?php if(isset($user[0]->email)) echo $user[0]->email; ?>" class="form-control required" placeholder="Email Address">
                  </div>
                </div>
                <div class="form-group ">
                  <label>User Role</label>
                  <div class="checkbox-list col-md-12">
                    <label class="checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox1" name="admin" value="1" <?php if (isset($user[0]->admin) and ($user[0]->admin) == 1) echo 'checked'; ?>>
                      Admin </label>
                      <label class="checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox1" name="parent" value="1" <?php if (isset($user[0]->parent) and ($user[0]->parent) == 1) echo 'checked'; ?>>
                      Parent </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox2" name="teacher" value="1" <?php if (isset($user[0]->teacher) and ($user[0]->teacher) == 1) echo 'checked'; ?>>
                      Tutor </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox3" name="child" value="1" <?php if (isset($user[0]->child)and($user[0]->child) == 1) echo 'checked'; ?> >
                      Student </label>
                  </div>
                </div>
                <div class="form-group ">
                  <label>Status</label>
                  <div class="checkbox-list col-md-12">
                    <label class="checkbox-inline">
                      <input type="radio" id="inlineCheckbox1" name="status" value="1" <?php if (isset($user[0]->status) and ($user[0]->status) == 1) echo 'checked'; ?>>
                      Approved </label>
                      <label class="checkbox-inline">
                      <input type="radio" id="inlineCheckbox1" name="status" value="0" <?php if (isset($user[0]->status) and ($user[0]->status) == 0) echo 'checked'; ?>>
                      Pending </label>
                      <label class="checkbox-inline">
                      <input type="radio" id="inlineCheckbox1" name="status" value="2" <?php if (isset($user[0]->status) and ($user[0]->status) == 2) echo 'checked'; ?>>
                      Blocked </label>
                    
                    
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn blue">Submit</button>
              </div>
            </form>
          </div>
          <div id="ajax-modal" class="modal fade" tabindex="-1" data-focus-on="input:first" aria-hidden="true" style="display: none; margin-top: -200px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Stack One</h4>
            </div>
            <div class="modal-body">
              <p> One fine body… </p>
              <p> One fine body… </p>
              <p> One fine body… </p>
              <div class="form-group">
                <input class="form-control" type="text" data-tabindex="1">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" data-tabindex="2">
              </div>
              <button class="btn blue" data-toggle="modal" href="#stack2">Launch modal</button>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
              <button type="button" class="btn btn-primary">Ok</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
