$(document).ready(function()
{

$("button, input:submit, a", ".demo").button();
 
 $('#butt_create_url').click(function() {
	 var short_url = $("#txt_short_url"),	 
			allFields = $([]).add(short_url),
			tips = $(".validateTips");
			var bValid = true;
			$(".validateTips").val("");
			$(".validateTips").show("slow");
			$("#succ_msg").hide("slow");
			allFields.removeClass('ui-state-error');
			bValid = bValid && checkEmpty(short_url,"URL",tips);
			bValid = bValid && validweburl(short_url,"Please enter valid URL. Ex: http://www.google.com",tips);
			if (bValid) {
									var glb_url = $('#glb_site_url').val();
									url=glb_url+"ajaxfiles/userajax.php";
									$.post(url,{shorturl:short_url.val(),chk_action:'shorturl_add'},function(res) 
																			{

																			if(res != "")
																				{
																				$(".validateTips").hide("slow");
																				$("#succ_msg").show("slow");
																				short_url.val("");
																				
																				$("#url_notify").html(res);
																				} 
																				return false;
																				 
																			});
									
									
						 
						 
											}
					else
						{
							return false;
						} 
 });
	 
});
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
debug: true,
success: "valid"
});
$( "#frm_shorturl" ).validate({
rules: {
field: {
required: true,
url: true
}
}
});