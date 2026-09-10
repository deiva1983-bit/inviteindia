$(document).ready(function(){
var disvalue = 139 - 16; 
$("#total_char").val(disvalue);

$("#create_admin_acc").click(function(){
 					var mob_num = $("#admin_mobile_num"),allFields = $([]).add(mob_num),tips = $(".validateTips_admin");
					//updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter valid mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Please enter valid mobile number",tips,10);		 
					if (bValid) {	
						$.post("ajaxfiles/message_ajax.php",{mobnum:mob_num.val(),action:'create_account'},function(result) {  
								if(result) {  
									//updateTips("Updated successfully..",tips);
										if(result == 1) { // Show activate panel											
											$('#input_panel').hide('slow');
											$('#activate_link').show('slow');
											$('#activate_panel').show('slow');
											$('#activatepin_panel').show('slow');
											$('#admin_mobile_num_active_panel').val(mob_num.val());
										}
									}

						});
						}
					else
						{
						return false;
						}
});



$("#send_pin_now").click(function(){
 					var mob_num = $("#admin_mobile_num_active_panel"),allFields = $([]).add(mob_num),tips = $(".validateTips_admin");
					//updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter valid mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Please enter valid mobile number",tips,10);		 
					if (bValid) {	
						$.post("ajaxfiles/message_ajax.php",{mobnum:mob_num.val(),action:'send_pin'},function(result) {  
								if(result) {
										if(result == 1) { // Show activate panel
										updateTips("We sent activation pin to your mobile number. Please enter your phone using the pin number.",tips);
											$('#activatepin_panel').show('slow');
										} else if(result == 2){  // invalidno
										updateTips("Something went wrong. Your mobile number doesn't match with our system record.",tips);
										} else if(result == 3){  // already verified
										updateTips("Your mobile already verified. You can send invite your guests.",tips);
										} else if(result == 4){  // already sent, waiting for verifications.
										updateTips("We already sent activate pin to your mobile, please check it. If you want new pin please try after 2 hours.",tips);
										}
									}

						});
						}
					else
						{
						return false;
						}
});

$("#verify_mobile").click(function(){
					var mob_num = $("#admin_mobile_num_active_panel"),mobile_pin_no = $("#admin_mobile_pin_no"),allFields = $([]).add(mob_num),tips = $(".validateTips_admin");
					//updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter valid mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Please enter valid mobile number",tips,10);

					bValid = bValid && checkEmpty(mobile_pin_no,"Pin number",tips);
					bValid = bValid && checkLength(mobile_pin_no,"Please enter valid pin number",tips,4);		 

					if (bValid) {	
						$.post("ajaxfiles/message_ajax.php",{mobnum:mob_num.val(), pinno:mobile_pin_no.val(),action:'verifypin'},function(result) {  
								if(result) { 
										if(result == 1) { // Show activate panel
										updateTips_Success("<img src='images/loading.gif' align='center'> Your mobile has been verified successfully. You can invite your guests. Please wait a seconds, we are loading SMS count based on your membership account...",tips);
											setTimeout(function () { location.reload(1); }, 5000);
										} else if(result == 2){  // invalidno
										updateTips("Something went wrong. Your mobile number doesn't match with our system record.",tips);
										} else if(result == 4){  // invalidno
										updateTips("Your pin number is wrong. Please try again.",tips);
										}

									}

						});
						}
					else
						{
						return false;
						}
});



$("#share_by_sms").click(function(){

	var mobile_no = $("#friends_mobile_no"),invitedetails = $("#invite_details"),securitycode = $("#security_code"),tips = $(".validateTips_input"),allFields = $([]).add(mobile_no).add(invitedetails).add(securitycode).add(tips);
					//updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					var fmobiles,lastchar,mob_array,l,allw,pnos, mob_arr_len, tot_sms_avilable;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mobile_no,"your friends mobile number(s)",tips);
					fmobiles = mobile_no.val();
					lastchar = fmobiles.slice(-1);
					if (lastchar == ',')
						fmobiles = fmobiles.slice(0, -1);
					mob_array = fmobiles.split(",");
					allw = 0; pnos='';
					$.each(mob_array,function(i){
					l = mob_array[i].length;					
					if(l < 10) {
					allw = 1;
					pnos = pnos + mob_array[i] + ',';
					}
					
					});
					if(allw) {
					pnos = pnos.slice(0, -1);
					updateTips("Please check your friends mobile number. Seems following mobile numbers are invalid - " + pnos,tips);			
					$("#friends_mobile_no").addClass("ui-state-error");
					bValid = false;
					}
					mob_arr_len = mob_array.length;
					tot_sms_avilable = $("#sms_avilable").val();
					if(mob_arr_len > tot_sms_avilable) {
					updateTips("Sorry, Your available SMS count is: " + tot_sms_avilable,tips);			
					$("#friends_mobile_no").addClass("ui-state-error");
					bValid = false;
					}
					bValid = bValid && checkEmpty(invitedetails,"your messages",tips);					
					bValid = bValid && checkLengthminmax(invitedetails,"your messages",50,disvalue,tips);
					var mysms_type = $('input:radio[name=sms_type]:checked').val();
					var remdate = $("#sms_date").val();
					if(mysms_type == '2') {
					bValid = bValid && checkEmpty($("#sms_date"),"valid date",tips);
					} else {
						if(!tot_sms_avilable){
						updateTips("Sorry, Your available SMS count is: " + tot_sms_avilable,tips);						
						bValid = false;
						}
					}
					if (remdate != '') {
					var endDate = new Date($("#glb_last_date").val());
					var rem_date = new Date(remdate);
					var today_date = new Date();
					if (rem_date > endDate) {
                            updateTips("Please select valid date. Kindly set your remainder date before your marriage.",tips);
							$("#sms_date").addClass("ui-state-error");
                            bValid=false;
                            }
					if (today_date > rem_date){
							updateTips("Please select valid date. Kindly set your remainder date before your marriage.",tips);
							$("#sms_date").addClass("ui-state-error");
                            bValid=false;
					}

					}
                    


					bValid = bValid && checkEmpty(securitycode,"your security code",tips);

					return bValid;
});


$('#friends_mobile_no').keyup(function(e) {
  if ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode < 106 && e.keyCode > 95)) {
    this.value = this.value.replace(/(\d{10})\,?/g, '$1,');
    return true;
  }
  
  //remove all chars, except dash and digits
  this.value = this.value.replace(/[^\,0-9]/g, '');
});


});


function setType(a){
if(a){
	$('#schedule_sms').hide("fast");
	$("#sms_date").val('');
}else{
	$('#schedule_sms').show("fast");
}

}

function msgcount(a){
var domainspan = $("#domain_span").val();
if(domainspan != '')
	domainspan = domainspan.length;
else 
	domainspan = 0;

var finlen = a.length + domainspan;
var disvalue = 139 - finlen; 
$("#total_char").val(disvalue);
}