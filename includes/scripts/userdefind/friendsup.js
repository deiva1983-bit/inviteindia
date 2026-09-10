$(document).ready(function(){
 	
	$('#addit_myadd').click(function() {
				$('#dialog-form').dialog('open');
				 tips = $(".validateTips");
				 tips
				.text("All form fields are required.")
				.addClass('ui-state-highlight');			
				var mob_id = $(this).attr("name").substring(4); 
				$("#hid_phno").val(mob_id);
			});

$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$("#d+0ialog").dialog("destroy");
		 
		
		var name = $("#frname"), mnum = $("#hid_phno"),
			allFields = $([]).add(name),
			 
			tips = $("#validateTips");
	 
		$("#dialog-form").dialog({
								 
								 
			autoOpen: false,
			height: 200,
			width: 350,
			modal: true,
			buttons: {
				'Update': function() {
					
					 
					var bValid = true;
					allFields.removeClass('ui-state-error');

					//bValid = bValid && checkLength(name,"username",2,16); 
					bValid = bValid && checkEmpty(name,"Friend name",tips);
 				if (bValid) {
						 
						
						
						 
						$.post("message_ajax.php",{fname:name.val(),fnum:mnum.val(),action:'insert_friend'},function(result) 
																			{				 
				//$(this).dialog('close');
				$("#dialog-form").dialog('close');
				});  


						
					}
					else
					{
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
		/*$('#create-user')
			.button()
			.click(function() {
				$('#dialog-form').dialog('open');
				 tips = $(".validateTips");
				 tips
				.text("All form fields are required.")
				.addClass('ui-state-highlight');
			 
			
			});*/
});
});