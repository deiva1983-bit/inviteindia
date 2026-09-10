$(document).ready(function()
{

$("#butt_login").click(function(){

//$("#msgbox").removeClass().addClass('messagebox').text('Validating').fadeIn(1000);
$("#alert-text").parent().css('display','block');
$("#alert-text").html("Validating").fadeIn(3000);
$("#alert-text").fadeOut(5000);
								
var uname = $('#txt_usr_name').val();
var pword = $('#txt_pass_word').val();  
	var glb_url = $('#glb_site_url').val();
	url=glb_url+"ajax_login.php";
 
if((uname.length) && (pword.length)) 
{ 
$.post(url,{ user_name:uname,password:pword,rand:Math.random() } ,function(res)
        { 
		 
		  if(res!=1) 
		  {
				$("#alert-text").parent().css('display','block');
                $("#alert-text").html("Your login detail wrong, please try again").fadeIn(3000);
                $("#alert-text").fadeOut(5000);
				$('#txt_usr_name').val("");
				$('#txt_pass_word').val("");	  			
		  }
		  else 
		  {		  	 
			 					$("#alert-text").parent().css('display','block');
                                $("#alert-text").html("Logging in").fadeIn(3000);
                                $("#alert-text").fadeOut(5000);
								$('#txt_usr_name').val("");
								$('#txt_pass_word').val("");			   
				 				document.location.reload();//='secure.php'; 
			   
		  	
          }
				
        });
 
 
	}
else
	{
				$("#alert-text").parent().css('display','block');
                                $("#alert-text").html("Please Enter username & password.").fadeIn(3000);
                                $("#alert-text").fadeOut(5000);
				$('#txt_usr_name').val("");
				$('#txt_pass_word').val("");
	}

		
	});


$("#butt_log_clear").click(function(){
									$('#txt_usr_name').val("");
									$('#txt_pass_word').val("");
									return false;
									});
$("#create-user").click(function(){
								 var glb_url = $('#glb_site_url').val();
							url=glb_url+"signup.php";
	 
									 window.location.href=url;
									});


 /*
$("#logout_button").click(function(){
								   var val = "logout";
								   	var glb_url = $('#hdn_glb_url').val();
									url=glb_url+"ajax_login.php";
 

								    $.post(url,{ flag:val } ,function(res)
        							{
										 if(res==1) 
		 									 {
												 $("#alert-text").parent().css('display','block');
                                $("#alert-text").html("Logged out").fadeIn(3000);
                                $("#alert-text").fadeOut(5000);
								
												 document.location.reload();
											 }
									});
			
			
								   	}); 
*/



/* $("#button-submit-signup").click(function(){
								   var val = "logout";
								    
								   }); 
*/

	
	 
});