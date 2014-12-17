<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<?PHP
if(isset($requirepagejs)and!empty($requirepagejs))
{
	if(isset($page_identifier)and( $page_identifier=='register'))
	{
		?>
		<script src="<?php echo base_url();?>assets/js/page/<?PHP echo $page_identifier?>.js"></script>
        <?php
	}
	if(isset($page_identifier)and( $page_identifier=='adv_register'))
	{
		?>
		<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/page/<?PHP echo $page_identifier?>.js"></script>
        <?php
	}
}
?>
