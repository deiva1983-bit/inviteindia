$(document).ready(function(){
	$('#vsignup-win').hide();
	$('#vactivate-signin-label').hide();
	
	
	
	$("#activate-vendor-signup").click(function(){
	$('#vsignin-win').hide();
	$('#vfp-win').hide();
	$('#vsignup-win').show();
	$('#vactivate-signup-label').hide();
	$('#vactivate-signin-label').show();
	});

	$("#activate-vendor-signin").click(function(){
	$('#vsignin-win').show();
	$('#vfp-win').show();
	$('#vsignup-win').hide();
	$('#vactivate-signup-label').show();
	$('#vactivate-signin-label').hide();
	});

	$("#ven_login").click(function(){
		var l_username = $("#ven_l_username"),l_pword = $("#ven_l_pword"),allFields_L = $([]).add(l_username).add(l_pword),tips = $("#validateTipsVenLogin");
		var bValid = true;
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(l_username,"User Name",3,15,tips);
		bValid = bValid && checkLengthminmax(l_pword,"Password",3,15,tips);
		
		
		if (bValid) {
			$.post("../ajaxfiles/userajax.php",{uname:l_username.val(),pwd:l_pword.val(),log_a:$("#ven_login_hidd").val(),chk_action:'ven_login'},function(res){
			if(res == 1) {
			window.location.href ='business-supplier.php';
			}else if(res == 2){
			updateTips("Please activate your account.", tips);
			}else if(res == 3){
			updateTips("Please register your account.", tips);
			}
			});
		} else {
		return false;
		}
	});

	$("#butt_create_vendors").click(function(){
		var r_username = $("#ven_rusername"),r_email = $("#ven_remail"),r_pword = $("#ven_r_pword"),r_cat = $("#tbl_cat_select").val(),allFields_L = $([]).add(r_username).add(r_email).add(r_pword),tips = $("#validateTipsVenSignup");
		//$("#validateTipsVenSignup").style("display": none);
		//$("#validateTipsVenSignup").hide();
		var bValid = true;
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(r_username,"User Name",3,15,tips);
		bValid = bValid && checkRegexp(r_username,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.",tips);
		bValid = bValid && checkLengthminmax(r_email,"email",6,80,tips);
		bValid = bValid && checkRegexp(r_email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com",tips);
		// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
		bValid = bValid && checkLengthminmax(r_pword,"Password",3,15,tips);
		bValid = bValid && checkRegexp(r_pword,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9",tips);
		if(bValid) {
			if(r_cat == 0){
			updateTips("Please select your business category.", tips);
			bValid = false;
			}
		}
		if (bValid) {
			$.post("../ajaxfiles/userajax.php",{uname:r_username.val(),mail:r_email.val(),pwd:r_pword.val(),res_cat:r_cat,log_a:$("#ven_register").val(),chk_action:'ven_reg'},function(res){
			if(res == 1) {
			//window.location.href ='products.php';
			updateTips("Your account has been successfully registered, we have sent the activation link to your email, Activate your account using the link.", tips);
			}else if(res == 2){
			updateTips("Username already exists, Please enter different username.", tips);
			}else if(res == 3){
			updateTips("We already have an account with this email, please login your account.", tips);
			}
			});
		} else {
		return false;
		}


	});


});