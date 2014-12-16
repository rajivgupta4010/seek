 <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">    
     
<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
   
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
 <script>
    // placeholder polyfill
    $(document).ready(function(){
        function add() {
            if($(this).val() == ''){
                $(this).val($(this).attr('placeholder')).addClass('placeholder');
            }
        }

        function remove() {
            if($(this).val() == $(this).attr('placeholder')){
                $(this).val('').removeClass('placeholder');
            }
        }

        // Create a dummy element for feature detection
        if (!('placeholder' in $('<input>')[0])) {

            // Select the elements that have a placeholder attribute
            $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add);

            // Remove the placeholder text before the form is submitted
            $('form').submit(function(){
                $(this).find('input[placeholder], textarea[placeholder]').each(remove);
            });
        }
    });
</script>
 <!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->





