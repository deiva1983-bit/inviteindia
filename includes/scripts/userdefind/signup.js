$(document).ready(function()
  {
	 
 $('#datepicker').datepicker({
			changeMonth: true,
			changeYear: true
		});
	 
 $("button, input:submit, a", ".demo").button();
 

 
 $('#butt_register').click(function() { 
						    var name = $("#name"),
							email = $("#email"),
								password = $("#password"),
								allFields = $([]).add(name).add(email).add(password),
								tips = $(".validateTips");
								var bValid = true;										
								allFields.removeClass('ui-state-error');
								bValid = bValid && checkEmpty(name,"User name",tips);																
								bValid = bValid && checkLengthminmax(name,"username",5,16,tips);		
								bValid = bValid && checkRegexp(name,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.",tips);
								
								bValid = bValid && checkEmpty(password,"Password",tips);										
								bValid = bValid && checkLengthminmax(password,"password",5,16,tips); 
								bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9.",tips);

								bValid = bValid && checkEmpty(email,"Email",tips);										
								bValid = bValid && checkRegexp(email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com.",tips);
 								if (bValid) {
									var glb_url = $('#glb_site_url').val();
									url=glb_url+"ajaxfiles/userajax.php";
									 
									$.post(url,{uname:name.val(),pword:password.val(),uemail:email.val(),chk_action:'create_user'},function(res) 
																			{
																				 

																			if(res == "exist")		
																				updateTips("Sorry, User name already exist. Please choose another name.",tips);															
																			else 
																				{
																				updateTips("Congrats, your successfully added.",tips);
																				// Time
																				document.location.href='myprofile.php'; 
																				}
																				
																				 
																			});
									
									
						 
						
						 
											}
											else
												{
													return false;
													}
					
					
					
						   });
 
  
});

 
	
	
	
	 

 
		