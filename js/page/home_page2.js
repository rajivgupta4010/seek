$(".salarystart").change(function(){


    var value=$(this).val();
    $this = $(this);
    id = $this.find('option:selected').attr('rel');
    if((value=='hourly' )|| (value=='annually') )
    {
		if(value=='hourly')
		{
		
			$('div.annually select option:first-child').attr("selected", "selected");
		}
		if(value=='annually')
		{
			
			$('div.hourly select option:first-child').attr("selected", "selected");
		}
		
		
		
        $('div.hourly').toggle();
		//$('div.annually select').removeAttr('selected');
		
        $('div.annually').toggle();
	//	$('div.hourly select').removeAttr('selected');
    }
    
    $.ajax({
        type:'POST',
        url:"home/get_range",
        data:{
            id:id
        },
        success:function(data){
            $("select.salalryend >option").remove();
            $("select.salalryend").append(data);
        },error:function(errorThrown){
            //alert(errorThrown);   
        }
    });
});