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
	$('body').on('change', '#city_drop', function () {
	//$("#city_drop").change(function() {
		var cityvalue = $('#city_drop').val();
		var statevalue = $('#states_drop').val();
		var divhtml = $("#arealists");
		$.post("../ajaxfiles/userajax.php",{cityv:cityvalue,statev:statevalue,chk_action:'dropcity_pdts'},function(res) 
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
	$("#supp_reg").click(function(){
		var ven_uname = $("#ven_cont_name"),serv_name = $("#ven_serv_name"),serv_desc = $("#ven_serv_desc"),state_drop = $("#states_drop"),city_drop = $("#city_drop"),ven_addr1 = $("#ven_addr_1"),venpincode = $("#ven_pincode"),ven_pno = $("#ven_pno"),allFields_L = $([]).add(ven_uname),tips = $("#validateTipsVenLogin");
		var bValid = true;
		var pdt_services = $('#states_pdt_services');
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(ven_uname,"Contact Name",3,16,tips);
		bValid = bValid && checkLengthminmax(serv_name,"Service Name",3,16,tips);
		bValid = bValid && checkDropDown(pdt_services,"Product Service",0,tips);
		bValid = bValid && checkLengthminmax(serv_desc,"Service Description",10,2000,tips);
		bValid = bValid && checkDropDown(state_drop,"State",0,tips);
		bValid = bValid && checkDropDown(city_drop,"City",0,tips);
		bValid = bValid && checkLengthminmax(ven_addr1,"Address - 1",5,1000,tips);
		bValid = bValid && checkLengthminmax(venpincode,"Pincode",1,10,tips);
		bValid = bValid && checkLengthminmax(ven_pno,"Phone number",1,13,tips);
		if (bValid) {
			return true;
			} else {
			return false;
			}
		});

	$("#ven_edit").click(function(){
		var ven_uname = $("#ven_cont_name"),serv_name = $("#ven_serv_name"),serv_desc = $("#ven_serv_desc"),state_drop = $("#states_drop"),city_drop = $("#city_drop"),ven_addr1 = $("#ven_addr_1"),venpincode = $("#ven_pincode"),ven_pno = $("#ven_pno"),allFields_L = $([]).add(ven_uname),tips = $("#validateTipsVenLogin");
		var bValid = true;
		var pdt_services = $('#pdt_services_drop');
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(ven_uname,"Contact Name",3,16,tips);
		bValid = bValid && checkLengthminmax(serv_name,"Service Name",3,16,tips);
		bValid = bValid && checkDropDown(pdt_services,"Product Service",0,tips);
		bValid = bValid && checkLengthminmax(serv_desc,"Service Description",10,2000,tips);
		bValid = bValid && checkDropDown(state_drop,"State",0,tips);
		bValid = bValid && checkDropDown(city_drop,"City",0,tips);
		bValid = bValid && checkLengthminmax(ven_addr1,"Address - 1",5,1000,tips);
		bValid = bValid && checkLengthminmax(venpincode,"Pincode",1,10,tips);
		bValid = bValid && checkLengthminmax(ven_pno,"Phone number",1,13,tips);
		if (bValid) {
			return true;
			} else {
			return false;
			}
		});
});