<div class="footer">
	<div class="footer-inner">
            2014 &copy; Design &AMP; Developed by Slinfy.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>

<?PHP if(isset($page_identifier)and $page_identifier=='registration'):?>
<script src="<?php echo base_url();?>assets/plugins/editor/ckeditor.js"></script>
<link href="<?php echo base_url();?>assets/plugins/editor/summernote.css" rel="stylesheet" type="text/css"/>

<?php endif;?>
<script src="<?php echo base_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?php echo base_url();?>assets/scripts/core/app.js"></script>
<?php
if(isset($requirepagejs) && !empty($requirepagejs) )
{	
		if(isset($page_identifier)) {
			?>
		
		

		<script src="<?PHP echo base_url()."assets/scripts/page/".$page_identifier.".js";?>" type="text/javascript"></script>
		
			<?PHP
		}
		

}
?>


<script>
jQuery(document).ready(function() {   
   // initiate layout and plugins
   App.init();
});
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>