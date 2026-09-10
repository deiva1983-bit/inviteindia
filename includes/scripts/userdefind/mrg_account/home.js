$(document).ready(function(){
  
	 
	 $(function() {
		$("button, input:submit, a", ".demo").button();
		
		$("a", ".demo").click(function() { return false; });
	}); 

	 $("#createInvitation").click(function(){
							url="select_theme.php";	 
							window.location.href=url;
							});

	});

 



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
				.addClass('ui-state-highlight');
			/*setTimeout(function() {
				tips.removeClass('ui-state-highlight', 1500);
			}, 500); */
		}
		
		function updateLoading(t) {
			tips
				.html(t);
			 
		}
		