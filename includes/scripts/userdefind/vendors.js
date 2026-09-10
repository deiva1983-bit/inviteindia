$(document).ready(function(){
	$("button, input:submit, a", ".demo").button();
	$("#states_drop").change(function() {
		var dropvalue = $('#states_drop').val();
		var divhtml = $("#citylists");
		var loadimg = "<img src='../images/loading.gif' align='center'>";
		divhtml.html(loadimg);
		$.post("../ajaxfiles/userajax.php",{val:dropvalue,chk_action:'dropstates'},function(res) 
					{
						divhtml.html(res); $('#arealists').css('display', 'none');
					 	//if(res==1)
						//		{
						//		tips.html("Thanks for contact us. Out Supporting team will contact soon");						
						//		 $("#full_name").val("");
						//		  $("#full_email").val("");
						//		   $("#contact_msgs").val("");
						//		} */
					});
	});
	$( "#city_drop" ).live( "change", function() {
	//$("#city_drop").change(function() {
		var cityvalue = $('#city_drop').val();
		var statevalue = $('#states_drop').val();
		var divhtml = $("#arealists");
		$.post("../ajaxfiles/userajax.php",{cityv:cityvalue,statev:statevalue,chk_action:'dropcity'},function(res) 
					{	
						if(res != 'no') {
						divhtml.html(res);
						$('#arealists').css('display', 'block');
						}
						else{
						$('#arealists').css('display', 'none');
						}
					});
	});
	$("#butt_create_vendors").click(function(){
		var ven_uname = $("#ven_username"),ven_uemail = $("#ven_email"),ven_upassword = $("#ven_pword"),allFields_L = $([]).add(ven_uname).add(ven_uemail).add(ven_upassword),tips = $("#validateTipsVenLogin");
		var bValid = true;
		
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(ven_uname,"username",3,16,tips);
		bValid = bValid && checkLengthminmax(ven_uemail,"email",6,80,tips);
		bValid = bValid && checkRegexp(ven_uemail,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com", tips);
		bValid = bValid && checkLengthminmax(ven_upassword,"password",5,16, tips);
  			if (bValid) {
				return true;
			} else {
			return false;
			}
		});
});