$(document).ready(function()
  {
	 
 $("button, input:submit, a", ".demo").button();
	$("#contactus_submit").click(function()
	{
	var name = $("#full_name"), contact_msgs = $("#contact_msgs") ,fp_email_txt = $("#full_email"),allFields_L = $([]).add(name).add(fp_email_txt).add(contact_msgs),tips = $("#fp_sec_validate"),bValid = true;
	
	
	allFields_L.removeClass('ui-state-error');
	
	bValid = bValid && checkLengthminmax(name,"Fullname",2,30,tips);		
	 
								
								
	//bValid = bValid && checkLength(fp_email_txt,"email",6,80,tips);
	bValid = bValid && checkRegexp(fp_email_txt,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "Please enter valid email address - eg. contact@gmail.com.",tips);
	
	
	bValid = bValid && checkLengthminmax(contact_msgs,"Your Messages",2,1000,tips);
	if (bValid) {
				var loadimg = "<img src='images/loading.gif' align='center'>";
				tips.html(loadimg);
					$.post("ajaxfiles/userajax.php",{uemail:fp_email_txt.val(),uname:name.val(),contactmsgs:contact_msgs.val(),chk_action:'contactus'},function(res) 
					{ 
					 	if(res==1)
								{
								tips.html("Thanks for contact us. Out Supporting team will contact soon");						
								 $("#full_name").val("");
								  $("#full_email").val("");
								   $("#contact_msgs").val("");
								}
					});
				}
	});
}); 