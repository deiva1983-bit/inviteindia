$(document).ready(function()
  {
	 
 
	 
 $("button, input:submit, a", ".demo").button();
  
  $(".addques").click(function(){
								     	var my_ans = $('#txt_my_ans').val();
										 
										 	var glb_url = $('#hdn_glb_url').val();
											var ques_id = $('#hdn_ques_id').val();
											var user_id = $('#hdn_user_id').val();
											if(user_id=="")
												{
												  $("#alert-text").parent().css('display','block');
                                				  $("#alert-text").html("Please login, then add your answers.").fadeIn(3000);
                             					  $("#alert-text").fadeOut(5000);
												  
												return false;
												}
												 
											else
												return true;
												
											
											//alert (my_ans+".."+glb_url+".."+ques_id+".."+user_id); return false;
								   });
});

 
	
	
	
	 

 
		