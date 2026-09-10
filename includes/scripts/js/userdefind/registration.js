$(document).ready(function(){
$("#butt_login").click(function(){
    var uname = $("#txt_uname"), upassword = $("#txt_pword"), allFields_L = $([]).add(uname).add(upassword), tips = $("#validateTipsLogin");
    var bValid = true;
    allFields_L.removeClass('ui-state-error');
    bValid = bValid && checkLength(uname,"username",3,80,tips);
    bValid = bValid && checkLength(upassword,"password",5,16,tips);
    // bValid = bValid && checkRegexp(uname,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.",tips);
    bValid = bValid && checkRegexp(upassword,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9",tips);
    // if (bValid) { return true; } else { return false; }
	if (bValid) {
		$.post("ajaxfiles/userajax.php",{uname:uname.val(),pword:upassword.val(),chk_action:$("#do").val()},function(result){
			if(result == "1") {
				window.location.href ='e-wedding.php';
			} else if(result == "2") {
			updateTips("Your email ID or password doesn't match our system. Please try again with a valid account.", tips);
			return false;
			} else {
				window.location.href =result;
			}
		});
	}
    });
$("#butt_register").click(function(){
    var name = $("#name"),email = $("#email"),password = $("#password"),allFields = $([]).add(name).add(email).add(password),tips = $("#validateTipsLogin");
    var bValid = true;
    allFields.removeClass('ui-state-error');
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
                updateTips("Username is already in use. Please use a different name.", tips);
			else if(result == "exist-email")
                updateTips("Email addresses already exist. Please provide a different email.", tips);
			else 
				{
				//updateTips("Congrats, Successfully created account.", tips);
				updateTips_sucess("<img src='images/loading.gif' align='center'>Congratulations on successfully creating an account! You will now be redirected to the account page; kindly wait.", tips);
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
				tips.show('slow');
				o.addClass('ui-state-error');
				updateTips("Length of " + n + " must be between "+min+" and "+max+".",tips);
				return false;
			} else {
				return true;
			}
		}
		function checkRegexp(o,regexp,n,tips) {
			if ( !( regexp.test( o.val() ) ) ) {
				tips.show('slow');
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
			tips.show();
		}
		function updateTips_sucess(t,tips) {
		tips.removeClass('ui-state-error');
			tips
				.html(t)
				.addClass('ui-state-highlight');
		tips.show();
		}
		function updateLoading(t) {
			tips
				.html(t);
			 
		}
		