function reload_win(){
	location.reload();
}
//--vik-->>>
$(document).ready(function() {
 $('.btn_signin').click(function(e){

     });


});
function validate_signin2(e){
    var email = $('#inputEmail3').val().trim();
var mob = $('#inputMobile3').val().trim();
var pass = $('#inputMobile3').val().trim();
alert('email='+email+'--mob'+mob+'-pass='+pass);
if(email!='' && mob!='' && pass!=''){
$.ajax({
   url:'http://192.168.1.226/solitaire/demo/donnie_kim/home/signin', 
   data:{
       action:'validate'
   },
   type:'POST',
   success:function(data , textStatus , XMLHttpRequest){
       alert('data=');
       e.preventDefault();
   },
   error:function(XMLHttepRequest , testStatus ,  errorThrown){
       alert(errorThrown);
       e.preventDefault();
   }
});

}else if(pass==''){
    alert('password can not be empty');
}else if(mob==''){
    alert('please fill mobile no.');
}
}

//--vik--<<<
 
