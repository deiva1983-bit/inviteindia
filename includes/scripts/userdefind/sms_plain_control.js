$(document).ready(function()
  {
 
 	 

	$(".butt_send_sms_plain").live('click',function(){
		

		var smstxt = $("#msgText"),mobno = $("#txt_mob_no") ,allFields_L = $([]).add(smstxt).add(mobno),
										tips = $("#sms_plain_tips");
		
 			var hid_smsopx = $("#hid_smsopx").val().substring(7,8);
			if(hid_smsopx == 2)
			blink($("#mobileactivate_activate"));
		else if(hid_smsopx == 3)
		 	blink($("#mobilelogin_activate"));
			/*  if(hid_smsopx!=1)
				{  
				open_register_account();  
				}			 
			return false; */



		var bValid = true;										
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkEmpty(mobno,"Mobile number",tips);
		bValid = bValid && checkEmpty(smstxt,"SMS Text",tips);			
			
		if (bValid)  
			{
			var hid_smsopx = $("#hid_smsopx").val().substring(7,8);
			// var del_id = $(this).attr("name");
			if(hid_smsopx == 2)
				return false;
			else if(hid_smsopx == 3)
				return false;
			alert ($("#mobno").numeric()); return false;
			 	/*$.post("ajax_sms.php",{chk_action:'select_frd'},function(result) 
																							{	 		 		 
									var myArray = result.split(','); 
 
									var availableTags = myArray;	 
 
									$("#txt_mob_no").autocomplete({
									source: availableTags
									});
																							}); */
			}
		else
			{
			return false;
			}
		
		});





 
$("button, input:submit, a", ".demo").button();  var availableTags;

	$.post("ajax_sms.php",{chk_action:'select_frd'},function(result) 
																							{	 		 		 
									var myArray = result.split(','); 
 
									var availableTags = myArray;	 
 
									$("#txt_mob_no").autocomplete({
									source: availableTags
									});
																							});
							

 
	
		


$(".butt_send_sms_clear").live('click',function(){
 $("#msgText").val("");
 $("#txt_mob_no").val("");
return false;
});
$(function() {
	 
					/* if($("#mobile_status").val() == "mob_no")
					{
 					var mob_num = $("#mobile_num"),	
					allFields = $([]).add(mob_num),		 
					tips = $(".validateTips");
					updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter Valid Mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Mobile must 10 digits",tips,10);		 
					if (bValid) {				 
						 
							$.post("ajaxfiles/smsajax.php",{mobnum:mob_num.val(),chk_action:'mobile_activte'},function(result) 
																							{
								if(result)
									{
									$('#mobile_activate').hide();$('#pin_activate').show();
									$("#mobile_status").val("mobile_pin");
									}
									
																							});

						}
					}	
					else
					{
					 var mob_pin_num = $("#mobile_pin"),	
					allFields = $([]).add(mob_pin_num),		 
					tips = $(".validateTips");

					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid1 = bValid && checkEmpty(mob_pin_num,"Pin number",tips);						
						if (bValid1) {				 
						 
							$.post("ajaxfiles/smsajax.php",{mob_pinnum:mob_pin_num.val(),chk_action:'pin_activte'},function(result) 
																							{
								if(result)
									{		
										$(this).dialog('close');					 parent.location.reload();
									}
									
																							});

							}


					}*/
					 
 				 
			 
		 
		
	 

		

	});
});

	 
	
 
	 
		

 
		