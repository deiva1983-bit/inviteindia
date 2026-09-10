$(document).ready(function(){
$("#butt_comments").click(function(){
var uname = $('#comm_name').val();
var mmsg = $('#comm_email').val();
var ud = $('#user_comments').val();
var page_id = $('#page_id').val();
var glb_url = $('#glb_site_url').val();
url=glb_url+"ajaxfiles/ajax_wish.php";
	var comm_name = $("#comm_name"), comm_email = $("#comm_email"), user_comments = $("#user_comments"), page_id = $("#page_id") ,glb_url = $("#glb_site_url"), allFields_L = $([]).add(comm_name).add(comm_email).add(user_comments),tips = $("#validateCMD"),bValid = true;
	allFields_L.removeClass('ui-state-error');
	bValid = bValid && checkEmpty(comm_name,"your name",tips);
	if(comm_email.val().length)
		bValid = bValid && checkRegexp(comm_email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"Please enter valid email.", tips);
	bValid = bValid && checkEmpty(user_comments,"your comments",tips);
	bValid = bValid && checkLengthminmax(user_comments,"your review",5,2000,tips);
	if (bValid) {
		$.post(url,{ comm_name:comm_name.val(), comm_email:comm_email.val(), user_comments:user_comments.val(), page_id: page_id.val(), chk_action:'tips_comm' } ,function(res) {
			updateTips_Success("Thank you for your comments and suggestions.", tips);
			comm_name.val('');
			comm_email.val('');
			user_comments.val('');
		});
	}
	});
$("#butt_reset").click(function(){
	var comm_name = $("#comm_name"), comm_email = $("#comm_email"), user_comments = $("#user_comments");
	comm_name.val('');
	comm_email.val('');
	user_comments.val('');
});
});