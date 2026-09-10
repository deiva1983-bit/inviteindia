		function updateTips(t,tips) {
			tips
				.text(t)
				.addClass('ui-state-error');
			 
		}
		
			function updateTips_Success(t,tips) {
			tips
				.html(t)
				.removeClass('ui-state-error');
			tips
				.html(t)
				.addClass('ui-state-highlight');
			 
		}
		
		function updateLoading(t,tips) {
			tips
				.html(t);
			 
		}
		
		function updateLoading_Error(t,tips) {
			tips
				.html(t)
				.addClass('ui-state-error');
			 
		}
		
		
		function checkLengthminmax(o,n,min,max,tips) {

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
		function checkEmpty(o,txt,tips) {

			if ( jQuery.trim(o.val()).length == 0 ) {
				o.addClass('ui-state-error');
				updateTips("Please enter " + txt +".",tips);
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
		function checkLength(o,txt,tips,count) {
 			if (jQuery.trim(o.val()).length != count) {
				o.addClass('ui-state-error');
				updateTips(txt +".",tips);
				return false;
			} else {
				return true;
			}

		}
		// pdt_services,"Product Service",0,tips
		function checkDropDown(o,txt,cond,tips) {
 			if (o.val() == cond) {
				o.addClass('ui-state-error');
				updateTips(txt +".",tips);
				return false;
			} else {
				return true;
			}

		}
		function blink($target) {
		// Set the color the field should blink in

		var backgroundColor = 'yellow';
		var existingBgColor;
		
		// Load the current background color
		existingBgColor = $target.css('background-color');
		
		// Set the new background color
		$target.css('background-color', backgroundColor);
		
		$target.fadeIn(3000);
		$target.fadeOut(2000);		
		$target.fadeIn(1000); 

		// Set it back to old color after 500 ms
		setTimeout(function() { $target.css('background-color', existingBgColor); }, 1000);
  		}

		function updateStaticTips(tips, t) {
			tips
				.text(t)
				.addClass('ui-state-highlight');
		}
		
		function validweburl_old(o,txt,tips)
			{
			var val = /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(jQuery.trim(o.val()));
			if(!val)
			{
			o.addClass('ui-state-error');
				updateTips(txt +".",tips);
				return false;
			}
			else
			{
			return true;
			}
			}

	function validweburl(o,txt,tips)
			{
			var weburl = 'http://'+jQuery.trim(o.val());
			var val = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(weburl);
			if(!val)
			{
			o.addClass('ui-state-error');
				updateTips(txt +".",tips);
				return false;
			}
			else
			{
			return true;
			}
			}