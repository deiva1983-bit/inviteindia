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
	if(mypaytpe == 'pay'){
	document.forms["paypal_form"].submit();
	}
	else{
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