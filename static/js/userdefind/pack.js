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
	var bname = $("#billing_name"), baddr = $("#billing_address"), bcity = $("#billing_city"), bstate = $("#billing_state"), bzip = $("#billing_zip"), bcountry = $("#billing_country"), btel = $("#billing_tel"), allFields = $([]).add(bname).add(baddr).add(bcity).add(bstate).add(bzip).add(bcountry).add(btel),tips = $(".validateTips");
	var bValid = true;
    bValid = bValid && checkLength(bname,"Billing name",1,20,tips);
    bValid = bValid && checkLength(baddr,"Billing address",3,50,tips);
    bValid = bValid && checkLength(bcity,"Billing city",3,50,tips);
    bValid = bValid && checkLength(bstate,"Billing state",2,50,tips);
    bValid = bValid && checkLength(bzip,"Billing zip",2,10,tips);
    bValid = bValid && checkLength(bcountry,"Billing country",2,20,tips);
    bValid = bValid && checkLength(btel,"Mobile number",2,20,tips);
	bValid = bValid && checkNumberOnly(btel,"Please enter valide mobile number",tips);
    if (bValid) {
	$('#delivery_name').val($('#billing_name').val());
	$('#delivery_address').val($('#billing_address').val());
	$('#delivery_city').val($('#billing_city').val());
	$('#delivery_state').val($('#billing_state').val());
	$('#delivery_zip').val($('#billing_zip').val());
	$('#delivery_country').val($('#billing_country').val());
	$('#delivery_tel').val($('#billing_tel').val());
	document.forms["indian_form"].submit();
	}
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

function updateLoading(txt, tips) {
    tips.html(t); 
    }
function checkLength(o,n,min,max,tips) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips("Length of " + n + " must be between "+min+" and "+max+".",tips);
				return false;
			} else {
				o.removeClass('ui-state-error');
				return true;
			}
		}
		function checkRegexp(o,regexp,n,tips) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass('ui-state-error');
				updateTips(n,tips);
				return false;
			} else {
				return true;
			}

		}
	function checkNumberOnly(o,txt,tips) {
	if (!Number(o.val())) {
		o.addClass('ui-state-error');
		updateTips(txt +".",tips);
		return false;
	} else {
		return true;
	}
	}
	function updateTips(t,tips) {
			tips
				.text(t)
				.addClass('ui-state-error');			
		}
		function updateTips_sucess(t,tips) {
		tips.removeClass('ui-state-error');
			tips
				.html(t)
				.addClass('ui-state-highlight');			
		}
		function updateLoading(t) {
			tips
				.html(t);
			 
		}