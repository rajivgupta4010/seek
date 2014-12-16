$(function() {
    $('.default-hide').hide();
	 $('.more_button').css('float','right');
	 $('.more_button').css('padding-right','35px');
	 
	
      $this = $('.annually select.salarystart');
    intvalofselect = $this.find('option:selected').attr('rel');
    $.post( "home/get_range", { id: intvalofselect})
  .done(function( data ) {
  
      $("select.salalryend >option").remove();
            $("select.salalryend").append(data);
  });
  
 $this = $('.hourly select.salarystart');
    intvalofselect = $this.find('option:selected').attr('rel');
    $.post( "home/get_range", { id: intvalofselect,type:'h'})
  .done(function( data ) {
  
      $("select.salalryend_hourly >option").remove();
            $("select.salalryend_hourly").append(data);
  });

// Handler for .ready() called.
    $("#more_options").click(function(e) {

        $('select.can-expanded').attr("multiple", "multiple");
        $('select.can-expanded').attr("size", "8");
        $("#more_options").hide();
        $("#few_options").show();
        $('.default-hide').show();
        e.preventDefault();

    });
    $("#few_options").click(function(e) {

        $('select.can-expanded').removeAttr("multiple");
        $('select.can-expanded').attr("size", "1");
        $("#few_options").hide();
        $("#more_options").show();
        $('.default-hide').hide();
        e.preventDefault();

    });
//vik-->>>funtions
    $(".location").change(function() {
		
		
    var id = "";
    $( "select.location option:selected" ).each(function() {
      id += $( this ).val() + ",";
    });
	id += "0";
	
   //alert(str);
		
        //var a = $('select.can-expanded').attr("multiple");
        //if (a == 'multiple') {
			
			//var id = $( "select.location option:selected").val();
			//alert(id);
			
			
			
			//var test =  $("select.location>option:selected");
//            $("select.location>option:selected").each(function() {
//                var select_id = $(this).val();
//				alert(test);
//                var hidden = $("#dropdown_location").val().trim();
//                if (hidden != '') {
//                    $("#dropdown_location").val(hidden + ',' + select_id);
//                } else {
//                    $("#dropdown_location").val(select_id);
//                }
//            });
        //} else {

          //  var id = $("option:selected", this).val();
        //}
        //var id = $("#dropdown_location").val();
        $.ajax({
            datatype: "JSON",
            type: "POST",
            url: "home/location_category",
            data: {
                id: id
            }, success: function(data, textStatus, XmlHttpRequest) {
                $("select.locationArea>option").remove();
                $("select.locationArea").append(data);
                $("#dropdown_location").val('');
            }, error: function(textStatus, XmlRequest, errorThrown) {
                //alert(errorThrown);
            }
        });


    });

    $(".classifications").change(function() {
        //var a = $('select.classifications').attr("multiple");
        //if (a == 'multiple') {
            $("select.classifications>option:selected").each(function() {
                var select_id = $(this).val();
                var hidden = $("#dropdown_location").val().trim();
                if (hidden != '') {
                    $("#dropdown_location").val(hidden + ',' + select_id);
                } else {
                    $("#dropdown_location").val(select_id);
                }
            });
        //} else {

           // var id = $("option:selected", this).val();
        //}
        var id = $("#dropdown_location").val();
        //alert('id=' + id);
        $.ajax({
            datatype: "JSON",
            type: 'POST',
            url: "home/sub_category",
            data: {
                id: id
            },
            success: function(data, textStatus, XmlHttpRequest) {
                //alert('data='+data);
                $("select.Sub-Classification >option").remove();
                $("select.Sub-Classification").append(data);
                $("#dropdown_location").val('');
            }, error: function(textStatus, XmlHttpResult, errorThrown) {
                //alert(errorThrown);
            }
        });
    });
//vik--<<<
});
