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
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER --><!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
			  <div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					User Type1</small>
				  </h3>
				  <ul class="page-breadcrumb breadcrumb">
					  <li>
						  <i class="fa fa-home"></i>
						  <a href="<?php echo site_url('dashboard');?>">Home</a>
						  <i class="fa fa-angle-right"></i>
					  </li>
					  <li>
						  <?php if(isset($parent_class) and !empty($parent_class)): ?>
                          <a href="<?php   echo site_url($parent_class); ?>">
                         <?php   echo ucwords($parent_class); ?>
                                                    </a>
                           <?php endif;?>
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
								<i class="fa fa-globe"></i>Administrator
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
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
							<?php foreach($alldata as $data):?>
							
							<tr>
								<td>
									 <?php echo ucwords( $data->first_name. " " . $data->last_name) ;?>
								</td>
								<td>
									 <?php echo $data->email;?>
								</td>
                                	<td>
									 <?php echo $data->status;?>
								</td>
								
									 <td class=" "> 
                                     <a href="#" data-target="#ajax" data-toggle="modal" class="btn default btn-xs purple">
										<i class="fa fa-edit"></i> Edit </a>
                                <a href="#" class="btn confirm default btn-xs black">
										<i class="fa fa-trash-o"></i> Delete </a>
                               
                                      
                                
								</td>
								
							</tr>
                            <?php endforeach;?>
							</tbody>
							</table>
						</div>
				  </div>
				  <!-- END EXAMPLE TABLE PORTLET-->
				  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
				  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
				  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
				  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
				  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>