$('#example_job_title').focus(function() {
    $('div.example_job_title').show();
    $(document).bind('focusin.example_job_title click.example_job_title', function(e) {
        if ($(e.target).closest('.example_job_title, #example_job_title').length)
            return;
        $(document).unbind('.example_job_title');
        $('div.example_job_title').fadeOut('medium');
    });
});
$('div.example_job_title').hide();

$('#example_job_summery').focus(function() {
    $('div.example_job_summery').show();
    $(document).bind('focusin.example_job_summery click.example_job_summery', function(e) {
        if ($(e.target).closest('.example_job_summery, #example_job_summery').length)
            return;
        $(document).unbind('.example_job_summery');
        $('div.example_job_summery').fadeOut('medium');
    });
});
$('div.example_job_summery').hide();

$('#example_job_summery2').focus(function() {
    $('div.example_job_summery2').show();
    $(document).bind('focusin.example_job_summery2 click.example_job_summery2', function(e) {
        if ($(e.target).closest('.example_job_summery2, #example_job_summery2').length)
            return;
        $(document).unbind('.example_job_summery2');
        $('div.example_job_summery2').fadeOut('medium');
    });
});
$('div.example_job_summery2').hide();

$('#example_salary').focus(function() {
    $('div.example_salary').show();
    $(document).bind('focusin.example_salary click.example_salary', function(e) {
        if ($(e.target).closest('.example_salary, #example_salary').length)
            return;
        $(document).unbind('.example_salary');
        $('div.example_salary').fadeOut('medium');
    });
});
$('div.example_salary').hide();

$('#editor1').focus(function() {
    $('div.ckeditor_tips').show();
    $(document).bind('focusin.ckeditor_tips click.ckeditor_tips', function(e) {
        if ($(e.target).closest('.ckeditor_tips, #editor1').length)
            return;
        $(document).unbind('.ckeditor_tips');
        $('div.ckeditor_tips').fadeOut('medium');
    });
});
$('div.ckeditor_tips').hide();

$('#example_contact').focus(function() {
    $('div.example_contact').show();
    $(document).bind('focusin.example_contact click.example_contact', function(e) {
        if ($(e.target).closest('.example_contact, #example_contact').length)
            return;
        $(document).unbind('.example_contact');
        $('div.example_contact').fadeOut('medium');
    });
});
$('div.example_contact').hide();

$('#example_frequency').focus(function() {
    $('div.example_frequency').show();
    $(document).bind('focusin.example_frequency click.example_frequency', function(e) {
        if ($(e.target).closest('.example_frequency, #example_frequency').length)
            return;
        $(document).unbind('.example_frequency');
        $('div.example_frequency').fadeOut('medium');
    });
});
$('div.example_frequency').hide();

$('#example_internal_ref').focus(function() {
    $('div.example_internal_ref').show();
    $(document).bind('focusin.example_internal_ref click.example_internal_ref', function(e) {
        if ($(e.target).closest('.example_internal_ref, #example_internal_ref').length)
            return;
        $(document).unbind('.example_internal_ref');
        $('div.example_internal_ref').fadeOut('medium');
    });
});
$('div.example_internal_ref').hide();

$('#add_other_fqs').click(function() {
    $(".add_others_frequency").css("display", "block");
    $("#add_other_fqs").css("display", "none");
});


$('#example_selling_point').focus(function() {
    $('div.example_selling_point').show();
    $(document).bind('focusin.example_selling_point click.example_selling_point', function(e) {
        if ($(e.target).closest('.example_selling_point, #example_selling_point').length)
            return;
        $(document).unbind('.example_selling_point');
        $('div.example_selling_point').fadeOut('medium');
    });
});
$('div.example_selling_point').hide();

// Select Ad_option
// $('#classic_type_ad').on('change',function(){
//    if( $(this).val()==="2"){      
//      $(".standout_bullets, .widthLogo_sumry").show()
//      $(".widthoutLogo_sumry").hide();
//      $(".panel-padded-border_r > div.example_salary").css("margin-top","396px");
//    }
//    else{
//      $(".standout_bullets, .widthLogo_sumry").hide()
//      $(".widthoutLogo_sumry").show();
//    }
//});

// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1');
$('.submit').click(function() {
    $('#job').submit();
});

$('div.div-hover-notifier-onjob').hide();
$('#hover-notifier-onjob').hover(function() {
    $('div.div-hover-notifier-onjob').toggle();

});

$("#job").validate({
  
});