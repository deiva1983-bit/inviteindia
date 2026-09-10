$(document).ready(function()
  {
	 
 
		$("#tabs").tabs();
		$('#datepicker').datepicker({
			changeMonth: true,
			changeYear: true
		});
	 

     $("#butt_login_account").click(function(){		
									    var cpassword = $("#cpassword"),			 
										password = $("#password") ,
										allFields_L = $([]).add(cpassword).add(password),
										tips = $("#validateAccount");
										
										var bValid = true;
										allFields_L.removeClass('ui-state-error');

										 
									bValid = bValid && checkEmpty(cpassword,"Current Password",tips);	
									bValid = bValid && checkEmpty(password,"New Password",tips);										
									bValid = bValid && checkLengthminmax(password,"New Password",5,16,tips); 
									bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"New Password field only allow : a-z 0-9.",tips);



					 					 if (bValid)  
													{
														 var loadimg = "<img src='images/loading.gif' align='center'>";
														 updateLoading(loadimg,tips);
														 var glb_url = $('#glb_site_url').val();
					  									 url=glb_url+"ajaxfiles/userajax.php";  
														 $.post(url,{cpass:cpassword.val(),pword:password.val(),chk_action:'update_accounts'},function(result) 
																			{
																			tips.removeClass('ui-state-error');
																			if(result == "not")		
																				updateLoading_Error("Sorry, Your Current password doesn't match our database.",tips); 
																				
																			else 
																				updateTips_Success("Congrats, your password updated successfully.",tips); 
																				 
																			});
														//return true;
													}
												  else
													return false;
			
			
									 });
	 
	 
	  $("#butt_clear_account").click(function(){		
											    $("#cpassword").val("");			 
										        $("#password").val("");
												return false;
											  });
	 	  $("#butt_clear_profile_img").click(function(){		
											  
												return false;
											  });
	 
	 
	  $("#butt_clear_profile").click(function(){		
											  
												return false;
											  });
	  
	  $("#butt_login_profile").click(function(){		
									    
														 var fname = $("#txt_fname"),			 
														 lname = $("#txt_lname") , dob = $("#datepicker") ,
														 mobile_nos = $("#mobile_no"), tips = $("#validateProfile");
														 tips.show();									
													     var loadimg = "<img src='images/loading.gif' align='center'>";
														 updateLoading(loadimg,tips);
														 $.post("ajaxfiles/userajax.php",{txt_fname:fname.val(),lname:lname.val(),dob:dob.val(),mobilenos:mobile_nos.val(),chk_action:'update_personal'},function(result) 
																			{
																				 if(result==1)		
																				 updateTips_Success("Congrats, your successfully updated.",tips); 																
																				
																			else 
																				updateLoading_Error("Sorry, Server is busy. Please try again.",tips); 
																				 
																			}); 
			
									 });
	    $("#butt_login_profile_img").click(function(){		
									    				var tips = $("#validateProfile_img");
														tips.show();
														 $.post("ajaxfiles/userajax.php",{chk_action:'update_profile_img'},function(result) 
																			{
																				 if(result==1)		
																				 updateTips_Success("Congrats, your successfully updated.",tips); 																
																				
																			else 
																				updateLoading_Error("Sorry, Server is busy. Please try again.",tips); 
																				 
																			}); 
			
									 });
	  
	  
	  
	  
	  
	 
 
});

	$(function() {
		$(".demo button").button({
            icons: {
                primary: 'ui-icon-disk'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon-circle-close'
            }
        });
	});
	
 
		
	 
	
	
	
	
 

		 

	 
		
		

 
		