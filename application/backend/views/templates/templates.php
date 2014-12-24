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
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    <?php echo $type; ?>
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
                        <i class="fa fa-angle-right">

                        </i><?php if (isset($type)) echo $type; ?>
                    </li>
                    <li>

                    </li>
                </ul>

            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i><?php echo $type; ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body form">

                        <form role="form" method="post" action="" class="template">
                           
                            <div class="form-body">
                                 <?php if(isset($sucess) and !empty($sucess)): ?>
                                <div class="alert alert-success">
                                    <strong>Success!</strong> The page has been updated.
                                </div>
                                <?php endif;?>
                                <div class="form-group">
                                    <label>Title </label>
                                    <div class="input-group">

                                        <input type="text" value="<?php echo $content[0]->title;?>" name="title" class="form-control required" placeholder="Title">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class=" form-control" rows="25" name="content"><?php echo $content[0]->content;?></textarea>
                                    <span class="help-block">
                                        ###URL### for the link 
                                     </span>
                                    <input type="hidden" value="<?php echo $content[0]->id;?>" name="id" />	

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
                            <p>
                                One fine body…
                            </p>
                            <p>
                                One fine body…
                            </p>
                            <p>
                                One fine body…
                            </p>
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