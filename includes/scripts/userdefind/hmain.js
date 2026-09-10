$(document).ready(function()
  { 
 
$(function() {
		$('#slidorion').slidorion();
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$("#d+0ialog").dialog("destroy");
		
		var name = $("#name"),
			email = $("#email"),
			password = $("#password"),
			allFields = $([]).add(name).add(email).add(password),
			tips = $(".validateTips");

		function updateTips(t) {
			tips
				.text(t)
				.addClass('ui-state-error');
			/*setTimeout(function() {
				tips.removeClass('ui-state-highlight', 1500);
			}, 500); */
		}
		function updateTips_sucess(t) {
		tips.removeClass('ui-state-error');
			tips
				.html(t)
				.addClass('ui-state-highlight');
		}
		function updateLoading(t) {
			tips
				.html(t);
			 
		}
		
		

		function checkLength(o,n,min,max) {

			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips("Length of " + n + " must be between "+min+" and "+max+".");
				return false;
			} else {
				return true;
			}

		}

		function checkRegexp(o,regexp,n) {

			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass('ui-state-error');
				updateTips(n);
				return false;
			} else {
				return true;
			}

		}
		
		$("#dialog-form").dialog({
								 
								 
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				'Create an account': function() {
					
					updateTips("All form fields are required.");
					var bValid = true;
					allFields.removeClass('ui-state-error');

					bValid = bValid && checkLength(name,"username",3,16);
					
					bValid = bValid && checkLength(password,"password",5,16);
					bValid = bValid && checkLength(email,"email",6,80);

					bValid = bValid && checkRegexp(name,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.");
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9");
					bValid = bValid && checkRegexp(email,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,"eg. contact@gmail.com");
 				if (bValid) {
						/*$('#users tbody').append('<tr>' +
							'<td>' + name.val() + '</td>' + 
							'<td>' + password.val() + '</td>' +
														'<td>' + email.val() + '</td>' + 
						'</tr>'); */
						//alert (name.val());
						
						
						var loadimg = "<img src='images/loading.gif' align='center'>";
						updateLoading(loadimg);
						$.post("ajaxfiles/userajax.php",{uname:name.val(),pword:password.val(),uemail:email.val(),chk_action:'create_user'},function(result) 
																			{

																			if(result == "exist-un")		
																				updateTips("Sorry, User name already exist. Please enter another name.");
																			else if(result == "exist-email")		
																				updateTips("Sorry, Email already exist. Please enter another email.");
																			else 
																				{
																				updateTips_sucess("<img src='images/loading.gif' align='center'> Congrats, Successfully created account.  Please wait while you are being redirected to account page.");
																				name.val("");password.val("");email.val("");
																					setTimeout(function(){
																					 window.location.href ='e-wedding.php';
																					}, 3000);
																				}
																				
																			/* else
																				updateTips("Sorry, Try again."); */
																			});


						//$(this).dialog('close');
					}
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				allFields.val('').removeClass('ui-state-error');
			}
		});
		
		
		
		$('#create-user')			
			.click(function() {
				$('#dialog-form').dialog('open');
				 tips = $(".validateTips");
				 tips
				.text("All form fields are required.")
				.addClass('ui-state-highlight');
				/*setTimeout(function() {
				tips.removeClass('ui-state-highlight', 1500);
			}, 500); */
			
			
			
			});

	});

var UpdateStatusLoop = 0;

var UpdateTestLoop = 0;





function SlideshowTestimonials() {

	UpdateTestLoopstr = UpdateTestLoop + '';

	$("#testimonial"+UpdateTestLoopstr).fadeOut("slow", function(){UpdateTestLoop = UpdateTestLoop + 1;

	UpdateTestLoopstr = UpdateTestLoop + '';

	$("#testimonial"+UpdateTestLoopstr).fadeIn("slow");});

	if (UpdateTestLoop==5) {UpdateTestLoop=0;}

}



testimonialstatus = setInterval(SlideshowTestimonials, 10000);  
 
});

function fbopen() {
    var url='https://www.facebook.com/invitindia';
    window.open(url, '_blank');
    window.focus();
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
				.text(t)
				.addClass('ui-state-highlight');			
		}
		function updateLoading(t) {
			tips
				.html(t);
			 
		}
		