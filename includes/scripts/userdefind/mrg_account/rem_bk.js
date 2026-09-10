$(document).ready(function()
  {
   $("button, input:submit, a", ".demo").button();
$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$("#dialog-form").dialog("destroy");
			var rem_mobno = $("#rem_mobno"),
			rem_name = $("#rem_name"),
			rem_email = $("#rem_email"),
			rem_date = $("#marriage_date"),	
			wed_a_id = $("#wed_auto_id"),
			wed_valid_date = $("#wed_validation_date"),
			wed_curr_date = $("#wed_curr_date"),
			
			allFields_L = $([]).add(rem_name).add(rem_mobno).add(rem_email).add(rem_date).add(wed_a_id),
			tips1 = $(".validateTipsRem"); //alert (rem_mobno.val());
			 updateTips("All fields are required.",tips1);
			 rem_mobno.addClass('ui-rem-error');
			 rem_email.addClass('ui-rem-error');
			 rem_date.addClass('ui-rem-error');
			var errmsgs =$("#valid1").val();
					/*if (endDate <= todaydate) {
					updateTips("Sorry, You cant set remainder for thid wedding, Because The wedding is already done.",tips1);
					bValid=false;					
					}		*/			
					//if (endDate == todaydate) {
					//updateTips("Sorry, You cant set remainder for thid wedding, Because Today is wedding date.",tips1);
					//bValid=false;
					//return false;
					//}
		$("#dialog-form").dialog({
						
						
								 
			autoOpen: false,
			height: 500,
			width: 430,
			modal: true,
			buttons: {
				'Set Remainder': function() {					
					/*if ($(".ui-button-text").text() == "Set Remainder")
						{
						alert ('ff');
						$(".ui-button-text").text("dd");
						} */
							var bValid = true;
								
 if(rem_date.val() != '')
				{
var todaydate = new Date(wed_curr_date.val());	
					var endDate = new Date(wed_valid_date.val());				
				var startDate = new Date(rem_date.val());				
				//if (startDate > todaydate && startDate <= endDate) {
				if (startDate > endDate) {
					updateTips("Please select valid date. Please select your remainder date before wedding.",tips1);
					bValid=false;
				}
				if (startDate < todaydate) {
					updateTips("Please select valid date.",tips1);
					bValid=false;
				}
				
				
			 
			 }					
					bValid = bValid && checkEmpty(rem_name,"Your name",tips1);	
					bValid = bValid && checkLengthminmax(rem_name,"Your name must 2 to 20 digits only", 2, 20, tips1);
					bValid = bValid && checkEmpty(rem_date,"Date",tips1);
					if (bValid)
					{
					if((jQuery.trim(rem_mobno.val()).length == 0 ) && (jQuery.trim(rem_email.val()).length == 0 ) &&  (jQuery.trim(wed_a_id.val()).length != 0 ) )
					{
					updateTips(errmsgs, tips1);
					bValid=false;
					}
					else
					{
						if(jQuery.trim(rem_mobno.val()).length)
						{
						bValid = bValid && checkEmpty(rem_mobno,"Mobile number",tips1);
						bValid = bValid && checkNumberOnly(rem_mobno,"Enter Valid Mobile number",tips1);	
						bValid = bValid && checkLength(rem_mobno,"Mobile must 10 digits",tips1,10);	
						}
					
						if(jQuery.trim(rem_email.val()).length)
						{
						bValid = bValid && checkEmpty(rem_email,"Email",tips1);
						bValid = bValid && checkRegexp(rem_email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"Please enter valid email. eg. contact@gmail.com", tips1);
						}				
					
					}
					}
 				if (bValid) {
						var loadimg = "<img src='images/loading.gif' align='center'> Please wait..";												
						tips1.html(loadimg);
						$.post("ajaxfiles/setrem.php",{rem_nam:rem_name.val(), remail:rem_email.val(),rmobno:rem_mobno.val(),rdate:rem_date.val(),wed_au_id:wed_a_id.val(),chk_action:'setrem'},function(result) 
							{
							if(result == "sendpin")	
								{
								$('#activation_codes').show('slow');																												
								updateTips("Please activate your mobile number..",tips1);
								}
							else if(result == "success")		
							{								 
									updateTips_Success("Congrats, Your remainder successfully updated..",tips1);
									rem_name.val("");rem_email.val("");	rem_mobno.val("");rem_date.val("");
									}
							});
					}
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				allFields.val('').removeClass('ui-state-error');
			}
		});
		
		
		$('#activate_now')			
			.click(function() {
			var rem_mobno = $("#rem_mobno"),							
			rem_act_code = $("#rem_activate_code"),			
			allFields_L = $([]).add(rem_mobno).add(rem_act_code),
			tips1 = $(".validateTipsRem"); //alert (rem_mobno.val());
			var bValid = true;	
			bValid = bValid && checkEmpty(rem_mobno,"Mobile number",tips1);
			bValid = bValid && checkNumberOnly(rem_mobno,"Enter Valid Mobile number",tips1);	
			bValid = bValid && checkLength(rem_mobno,"Mobile must 10 digits",tips1,10);
			bValid = bValid && checkEmpty(rem_act_code,"Mobile Activation code. We sent code your mobile number.",tips1);
			if(bValid) {
					$.post("ajaxfiles/setrem.php",{act_code:rem_act_code.val(),rmobno:rem_mobno.val(),chk_action:'doActivate'},function(result) 
							{
							if(result == "wrong")
								{ 								
								updateTips("Please enter valid activation code. We sent code your mobile number.",tips1);
								rem_act_code.val("");
								rem_act_code.focus();
								}
							else
								{
								updateTips_Success("Congrats, Your number activated successfully. Please click the Set Remainder button now!...",tips1);																
								rem_act_code.val("");
								$('#activation_codes').hide('slow');	
								}
							
							});
					}
			});
		
		$('#call_remaninder')			
			.click(function() {
				$('#dialog-form').dialog('open');
				 tips = $(".validateTips");
				 tips
				.text("All form fields are required.")
				.addClass('ui-state-highlight');
				/*setTimeout(function() {
				tips.removeClass('ui-state-highlight', 1500);
			}, 500); */
			
			
			
			});

	});

	

 			  
 
}); 

function chg_img(vals)
{

var rem_mobno = $("#glb_site_url").val();
var imgurl= rem_mobno+'templates/default/mrg_template/wedgifts/gift'+vals+'.gif';
var imgsrc = "<img width=100 height=100 border=0 src='"+imgurl+"' >";
$("#theme_gift_id").val(vals)
document.getElementById("blessimg").innerHTML=imgsrc;
//document.getElementById('bicon_id').value=val;
} 

function FillValueInField(vals)
{
var title = $("#tmpl_"+vals).attr("text");
document.getElementById("guest_msg").value=title;
//document.getElementById('bicon_id').value=val;
} 	