<div class="page-content-wrapper">
		<div class="page-content">
                    <div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					
                                        <?php include($view_path.'jobs/title.php'); ?>
                                       
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Actions
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="<?PHP echo site_url('classifications/new_item');?>">
										Add New Classification
									</a>
								</li>
								<li>
									<a href="#">
										Another action
									</a>
								</li>
								<li>
									<a href="#">
										Something else here
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">
										Separated link
									</a>
								</li>
							</ul>
						</li>
                  	<?php include($view_path.'jobs/breadcrumbs.php'); ?>
                                                
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
                    <div class="row">
			
				<div class="col-md-12">
					<!-- BEGIN BORDERED TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-coffee"></i>Classifications 
                                                                 <?php if(isset($sub_nav)&&(!empty($sub_nav))) : ?>
					
                                                                &Colon;
							
								<?php echo ucfirst($sub_nav);?>
							
							
					</li>
                                                <?PHP endif; ?>
							</div>
							
						</div>
                                            
                                            
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
                                                        <?PHP echo $sucess = $this->session->flashdata('sucess');?> 
                                                        <?PHP $error = $this->session->flashdata('sucess');?> 
                                                        <?php if(isset($sucess)and !empty($sucess)):?>
                                                        <div class="alert alert-danger">
								<?php echo $sucess;?>
							</div>
                                                        <?php endif;?>

								<tr>
									<th>
										 #
									</th>
									<th>
										 Classification
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
								<?php $count = 1; foreach($classifications as $item):?>
								<tr>
									<td>
										 <?php echo $count;?>
									</td><td>
                                                                            <?php echo $item->name;?>
									</td>
									
									
									<td>
										
                                                                          <?php   if(($item->status)==1) :  ?>
                                                                             <span class="label label-sm label-success">
											 Published
										</span>
                                                                            <?php elseif(($item->status)==0):?>
                                                                            <span class="label label-sm label-danger">
											 Unpublish
										</span>
                                                                            <?php endif;?>
                                                                            
									</td>
                                                                        <td>
                                                                            <a href='<?php echo base_url()."classifications/edit_item/{$item->id}";?>' class="btn default btn-xs purple">
											<i class="fa fa-edit"></i> Edit
										</a>
                                                                            <a href='<?php echo current_url()."?deleteitem={$item->id}";?>' class="btn default btn-xs black delete_confirm">
											<i class="fa fa-trash-o"></i> Delete
										</a>
                                                                            
                                                                        </td>
								</tr>
                                                                <?php $count++; ?>
								<?php endforeach; ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END BORDERED TABLE PORTLET-->
				</div>
			</div>
                </div></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" >
     
    $( ".delete_confirm" ).click(function() {
   var r = confirm("Are you sure to delete the current item!");
    if (r == true) {
       
    } else {
        return false;
    }
});
    
</script> 