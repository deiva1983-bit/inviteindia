$(document).ready(function(){
	$("button, input:submit, a", ".demo").button();

	$("#ven_login").click(function(){
		var ven_uname = $("#ven_username"),ven_upassword = $("#ven_pword"),allFields_L = $([]).add(ven_uname).add(ven_upassword),tips = $("#validateTipsVenLogin");
		var bValid = true;
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(ven_uname,"username",3,16,tips);
		bValid = bValid && checkLengthminmax(ven_upassword,"password",5,16, tips);
  			if (bValid) {
				return true;
			} else {
			return false;
			}
	});
});