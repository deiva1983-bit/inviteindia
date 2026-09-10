$(document).ready(function(){
    $("button, input:submit, a", ".demo").button();
    $("a", ".demo").click(function() { return false; }); 
 
$("#butt_login").click(function(){
    var uname = $("#txt_uname"), upassword = $("#txt_pword"), allFields_L = $([]).add(uname).add(upassword), tips = $("#validateTipsLogin");
    var bValid = true;
    allFields_L.removeClass('ui-state-error');
    bValid = bValid && checkLength(uname,"username",3,16,tips);
    bValid = bValid && checkLength(upassword,"password",5,16,tips);
    bValid = bValid && checkRegexp(uname,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.",tips);
    bValid = bValid && checkRegexp(upassword,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9",tips);
    if (bValid) { return true; } else { return false; }
    });
$("#butt_register").click(function(){
    var name = $("#name"),email = $("#email"),password = $("#password"),allFields = $([]).add(name).add(email).add(password),tips = $(".validateTips_registar");
    var bValid = true;
    bValid = bValid && checkLength(name,"username",3,16,tips);
	bValid = bValid && checkLength(password,"password",5,16,tips);
	bValid = bValid && checkLength(email,"email",6,80,tips);
	bValid = bValid && checkRegexp(name,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.",tips);
	// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
	bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9",tips);
	bValid = bValid && checkRegexp(email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com",tips);
    if (bValid) {
		$.post("ajaxfiles/userajax.php",{uname:name.val(),pword:password.val(),uemail:email.val(),chk_action:'create_user'},function(result){
    		if(result == "exist-un")
                updateTips("Sorry, User name already exist. Please enter another name.", tips);
			else if(result == "exist-email")
                updateTips("Sorry, Email already exist. Please enter another email.", tips);
			else 
				{
				//updateTips("Congrats, Successfully created account.", tips);
				updateTips_sucess("<img src='images/loading.gif' align='center'> Congrats, Successfully created account.  Please wait while you are being redirected to account page.", tips);
				setTimeout(function(){	 window.location.href ='e-wedding.php';}, 3000);
				}
                

            name.val("");password.val("");email.val("");
    });
    }
    return false;
});


});


function updateLoading(txt, tips) {
    tips.html(t); 
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
		