$(document).ready(function()
  {
	$('#forget_pass_box').hide();  var i=0;
	$('#new-user-reg').hide();  var j=0;
    $("#forget_pass").click(function(){i++;var show_sts = (i%2) ? $('#forget_pass_box').show('slow'):$('#forget_pass_box').hide('slow');});
	$("#user-signup").click(function(){j++;var show_sts = (j%2) ? $('#new-user-reg').show('slow'):$('#new-user-reg').hide('slow');});
	$("#trigger_fp").click(function()
	{	
	var fp_email_txt = $("#txt_email_fp"),allFields_L = $([]).add(fp_email_txt),tips = $("#fp_sec_validate"),bValid = true;
	allFields_L.removeClass('ui-state-error');
	bValid = bValid && checkLength(fp_email_txt,"email",6,80,tips);
	bValid = bValid && checkRegexp(fp_email_txt,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com", tips);
	if (bValid) {
				var loadimg = "<img src='images/loading.gif' align='center'>";
				tips.html(loadimg);
					$.post("ajaxfiles/userajax.php",{uemail:fp_email_txt.val(),chk_action:'forget_p', types:'1'},function(res) 
					{ 
					if(res == "invalid")
					{updateTips("Sorry, It seems your a new user. Please register your account.", tips);}
					else
						{					 	
						updateTips_sucess("Please verify your email, We shared your account details.", tips);
						}					
					false;					 
				});
				}
	});
}); 