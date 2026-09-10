$(document).ready(function(){
$("#butt_login_account").click(function(){
    var name = $("#uname"), email = $("#email"), password = $("#cpassword"), npassword = $("#npassword"), uemail = $("#uemail"), ulogid = $("#ulogid").val(), allFields = $([]).add(name).add(email).add(password).add(npassword).add(uemail),tips = $(".validateTips_registar");
    var bValid = true;
    bValid = bValid && checkLength(name,"username",3,16,tips);
	bValid = bValid && checkLength(password,"Current password",5,16,tips);
	bValid = bValid && checkLength(npassword,"New password",5,16,tips);  
	bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9",tips);
	bValid = bValid && checkRegexp(npassword,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9",tips);
	bValid = bValid && checkRegexp(uemail,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com",tips);
    if (bValid) {
		$.post("ajaxfiles/userajax.php",{uname:name.val(),cpword:password.val(),npword:npassword.val(),uemail:uemail.val(),uid:ulogid,chk_action:'passchange'},function(result){
    		if(result == "ok")
                updateTips("Your password has been updated successfully.", tips);
			else 
				updateTips_sucess("Please verify your current password, and try again.", tips);
                return false;
    });
    }
    return false;
});
$("#butt_reset_pwd").click(function(){
var password = $("#txt_new_pword"), npassword = $("#txt_new_pword_again"), tips = $("#validateTips_resetpwd"), tpuid = $("#tpuid");
var name = allFields = $([]).add(password).add(npassword).tips = $("#validateTips_resetpwd");
var bValid = true;
bValid = bValid && checkLength(tpuid,"Something went wrong. Please try again",1,16,tips);
bValid = bValid && checkLength(password,"New password",5,16,tips);
bValid = bValid && checkLength(npassword,"Retype new password",5,16,tips);  
bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"New password field only allow : a-z 0-9",tips);
bValid = bValid && checkRegexp(npassword,/^([0-9a-zA-Z])+$/,"Retype new password field only allow : a-z 0-9",tips);
bValid = bValid && compareStr(password, npassword, tips);
if (bValid) {
	$.post("ajaxfiles/userajax.php",{cpword:password.val(), npword:npassword.val(), uid:tpuid.val(), chk_action:'resetpwd'},function(result){
		if (result) {
			updateTips_sucess("Your Password Has Been Successfully Updated.",tips);
		} else {
			updateTips("Something went wrong, please try again..",tips);
		}
	password.val("");npassword.val("");tpuid.val("");
	});
}
return false;
});

});

function updateLoading(txt, tips) {
    tips.html(t); 
    }
function compareStr(first_str,sec_str,tips) {
			if ( first_str.val() !==  sec_str.val() ) {
				updateTips("Password should be equal.",tips);
				return false;
			} else {
				return true;
			}
		}
function checkLength(o,n,min,max,tips) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips("Length of " + n + " must be between "+min+" and "+max+".",tips);
				return false;
			} else {
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