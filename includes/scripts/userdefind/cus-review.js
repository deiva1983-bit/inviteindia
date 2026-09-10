$(document).ready(function(){
	$("#butt_review").click(function(){
	var name = $("#cus_name"), rev_msgs = $("#cus_review"), scode = $("#security_code") ,allFields_L = $([]).add(name).add(rev_msgs),tips = $("#validateCR"),bValid = true;
	allFields_L.removeClass('ui-state-error');
	bValid = bValid && checkEmpty(name,"your name",tips);
	bValid = bValid && checkEmpty(rev_msgs,"your review",tips);
	bValid = bValid && checkLengthminmax(rev_msgs,"your review",5,1000,tips);
	bValid = bValid && checkEmpty(scode,"security code",tips);
	if (bValid) {
		return true;
	} else {
		return false;
	}
	});
});