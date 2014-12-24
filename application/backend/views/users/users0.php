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
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
               
            </div>
            
        </div>
     
        <div class="row">
            <div class="col-md-12">
               
                <h3 class="page-title">
                    <?php if ($type == '0') echo 'Administrator'; ?>
                    <?php if ($type == '1') echo 'Parent'; ?>
                    <?php if ($type == '2') echo 'Tutor'; ?>
                    <?php if ($type == '3') echo 'Student'; ?>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo site_url('dashboard'); ?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php if (isset($parent_class) and ! empty($parent_class)): ?>
                            <a href="<?php echo site_url($parent_class); ?>">
                                <?php echo ucwords($parent_class); ?>
                            </a>
                        <?php endif; ?>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <!--<a href="#">Advanced Datatables</a>-->
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i><?php if ($type == '0') echo 'Administrator'; ?>
                            <?php if ($type == '1') echo 'Parent'; ?>
                            <?php if ($type == '2') echo 'Tutor'; ?>
                            <?php if ($type == '3') echo 'Student'; ?>
                        </div>
                       
                        <div class="tools">
                       
                        </div>
                        
                    </div>
                   
                    <div class="portlet-body">
                   <div class="table-toolbar">
								<div class="btn-group">
									<a href="<?php echo site_url('users/edit_user'); ?>" id="sample_editable_1_new" class="btn green">
									Add New user <i class="fa fa-plus"></i>
									</a>
								</div>
								
							</div>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Name 
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>

                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php foreach ($alldata as $data): ?>

                                    <tr>
                                        <td>
                                            <?php echo ucwords($data->first_name . " " . $data->last_name); ?>
                                        </td>
                                        <td>
                                            <?php echo $data->email; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $status = $data->status;
                                            switch ($status) {
                                                case "0":
                                                    echo '<a href="#" class="btn btn-xs yellow">
											Pending <i class="fa fa-edit"></i>
											</a>';
                                                    break;
                                                case '1':
                                                    echo '<a href="#" class="btn btn-xs green">
											Approved <i class="fa fa-edit"></i>
											</a>';
                                                    break;
                                                case "2":
                                                    echo '<a href="#" class="btn btn-xs red">
											Blocked <i class="fa fa-edit"></i>
											</a>';
                                                    break;
                                               
                                            }
                                            ?>
                                        </td>

                                        <td class=" "> 
                                            <a  href="<?php echo site_url('users/edit_user').'/'.$data->id;?>" data-target="" data-id="<?php echo $data->id;?>" data-toggle="modal" class="btn default btn-xs purple">
                                                <i class="fa fa-edit"></i> Edit </a>
                                            <a href="#" class="btn confirm default btn-xs black">
                                                <i class="fa fa-trash-o"></i> Delete </a>



                                        </td>

                                    </tr>
<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                            
                            
                </div>
            </div>
            
        </div>
        <!-- END PAGE CONTENT-->
      
        
    </div>
</div>