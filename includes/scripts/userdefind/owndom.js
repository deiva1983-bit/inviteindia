$(document).ready(function(){
$("#submitpay").click(function(){
	var mypaytpe = $('input:radio[name=paytype]:checked').val();
	var myplantype = $('input:radio[name=myplan]:checked').val();
	if (typeof myplantype === "undefined") {
	alert ("Please select your plan.");
	return false;
	}
	if (typeof mypaytpe === "undefined") {
	alert ("Please select your payment type.");
	return false;
	}
	$('#pay_plan').val(myplantype);
	$('#merchant_param1').val(myplantype);
	
	var wed_list = $("#wedding_inv_lists"), own_dom = $("#own_domain_name"), contact_name = $("#own_contact_name"), contact_no = $("#own_contact_no"), allFields_L = $([]).add(wed_list).add(own_dom), tips = $("#validateTipsPay");
    var bValid = true;
    allFields_L.removeClass('ui-state-error');
    //bValid = bValid && checkLength(own_dom,"password",5,16,tips);
	bValid = bValid && checkDropDown(wed_list,"Please select your wedding URL","select", tips);
	bValid = bValid && checkEmpty(own_dom,"website name",tips);
	bValid = bValid && validweburl(own_dom,"valid website name, Example: www.akash-weds-nisash.com OR www.akashwedsnisash.com" ,tips);
	bValid = bValid && checkEmpty(contact_name,"Contact name",tips);
	bValid = bValid && checkEmpty(contact_no,"Contact number",tips);
    if (bValid) {} else { return false; }


	if(mypaytpe == 'pay'){
	$('#own_domain_names').val(own_dom.val());
	document.forms["paypal_form"].submit();
	}
	else{
	$('#merchant_param5').val(own_dom.val());
	$('#contact_name_cc').val(contact_name.val());
	$('#contact_no_cc').val(contact_no.val());
	$('#delivery_name').val($('#billing_name').val());
	$('#delivery_address').val($('#billing_address').val());
	$('#delivery_city').val($('#billing_city').val());
	$('#delivery_state').val($('#billing_state').val());
	$('#delivery_zip').val($('#billing_zip').val());
	$('#delivery_country').val($('#billing_country').val());
	$('#delivery_tel').val($('#billing_tel').val());
	document.forms["indian_form"].submit();
	}

});

$("#wedding_inv_lists").change(function(){
$('#merchant_param4').val(this.value);
$('#inv_id').val(this.value);
});





 $(function() {
		$("button, input:submit, a", ".demo").button();
	});



});function setShemp(a){
if(a){
	$('#india_payment').show("fast");
}else{
	$('#india_payment').hide("fast");
}

}

function domainType(v) {
	if(v == '1'){ // .in
	
	} else if (v == '2'){ // .com
	
	}
$('#dom_plan_cc').val(v);
$('#dom_plan_pay').val(v);
$('#merchant_param1').val(v);

}