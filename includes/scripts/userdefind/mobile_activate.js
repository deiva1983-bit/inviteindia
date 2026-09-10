$(document).ready(function()
  {
 
 	
		$("button, input:submit, a", ".demo").button();
		
		//$("a", ".demo").click(function() { return false; });
	 



$("#mobile_activate").live('click',function(){
 					var mob_num = $("#mobile_num"),	
					allFields = $([]).add(mob_num),		 
					tips = $(".validateTips");
					updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter Valid Mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Mobile must 10 digits",tips,10);		 
					if (bValid) {	
									var form_name = $("form")[0].name;  
									  $("form")[0].submit();		 
						 
							 
									/* var form_name = $("form")[0].name;  
									alert(form_name); return false;
									$(form_name).attr("action","index.php");
									$("#actions").val("ivs_authfail"); */
									
								 

						}
					else
						{
						return false;
						}
});

  

$("#friends_clr").live('click',function(){
		 $("#txt_frd_mob_no").val("");
		 $("#txt_frd_name").val("");	
		return false;
		});


$("#mobile_pin_activate").live('click',function(){
  					var mob_num = $("#mobilepin_num"),
					allFields = $([]).add(mob_num),
					tips = $(".validateTips_pin");
					updateTips("All form fields are requireds.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile pin",tips);
					if (bValid) {	
									var form_name = $("form")[0].name;  
									  $("form")[0].submit();		 
							}
					else
						{
						return false;
						}

			});



$("#mobile_change").live('click',function(){
  			//$("#mobile_num").attr('readonly','false');
			 $('#mobile_num').removeAttr("readonly");
			$('#mobile_num').select(); 	 return false;
			});



$("#friends_add").live('click',function(){
  					var mob_num = $("#txt_frd_mob_no"),	
					allFields = $([]).add(mob_num),		 
					tips = $(".validateTips");
					updateTips("All form fields are required.",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter Valid Mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Mobile must 10 digits",tips,2);		 
					if (bValid) {
						  return true;
						}
					else
						{
						return false;
						}
			});


		/* $('#edit-user').live
			.button()
			.click(function() {
				$('#dialog-form').dialog('open');
				 tips = $(".validateTips");
				 tips
				.text("All form fields are required.")
				.addClass('ui-state-highlight');
				 //alert(1);
			
			});*/
  		$("#edit-user").live('click',function()
				{ 
				    var edit_id = $(this).attr("name").substring(4); 
				  var mname,mnum;
				 
				$.post("message_ajax.php",{edit_id:edit_id,action:'select_frd'},function(result) {		 		 
				var split_string = String(result).split("|"); 
				 mname=split_string[0];  mnum=split_string[1];
  
				$("#itm_id").val(edit_id);
				$("#mob_name").val(mnum);
				$("#mob_number").val(mname);

			     }); 


                          	  $('#dialog-form').dialog('open');
				 tips = $(".validateTips_frin");
				 tips
				.text("");
				//.addClass('ui-state-highlight');  
				

                         });
	 // show delete confirmation
	 $(".del_friend_list").live('click',function(){
                         var del_id = $(this).attr("name").substring(4); 
                         $("#mov_del"+del_id).hide();
                         $("#del_mov_confirm"+del_id).fadeIn(); 
                     });
	   $(".del_mov_no").live('click',function(){
                             var msg_id = $(this).attr("id").substring(10);
                             $("#del_mov_confirm"+msg_id).hide();
                             $("#mov_del"+msg_id).fadeIn();
				
				/*  $.blockUI({ css: { 
					border: 'none', 
					padding: '15px', 
					backgroundColor: '#000', 
					'-webkit-border-radius': '10px', 
					'-moz-border-radius': '10px', 
					opacity: .5, 
					color: '#fff' 
        			} }); 
 
       				 setTimeout($.unblockUI, 2000); */

                         });
	$(".del_mov_yes_mains").live('click',function(){			 
                      var del_id = $(this).attr("id").substring(16); // this is to take id
		
			var user_log=$("#user_log").val();
			$.post("message_ajax.php",{delid:del_id,usr_id:user_log,action:'delete_frd'},function(result) {		 		 
				 if(result==1)
					{
					$("#del_hide_"+del_id).hide();
					//$(".succval").show();
					$(".succval").html("Successfully deleted");
					 
					}
				/*$("#itemtemperror").hide();
				$("#itemaddedTemp").show();
				var errorval = 'Item has been successfully removed.';
				$("#itemaddedTemp").html(errorval);
				$("#itemValss").html(result); */ 	
			     }); 
			});


 
});

	 
$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$("#d+0ialog").dialog("destroy");
		
	 	
		$("#dialog-form").dialog({
								 
								 
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				'Create an account': function() {

					var mob_num = $("#mob_number"),	
					allFields = $([]).add(mob_num),		 
					tips = $(".validateTips_frin");
					updateTips("",tips);	
					var bValid = true;
					allFields.removeClass('ui-state-error');
					bValid = bValid && checkEmpty(mob_num,"Mobile number",tips);
					bValid = bValid && checkNumberOnly(mob_num,"Enter Valid Mobile number",tips);	
					bValid = bValid && checkLength(mob_num,"Mobile must 10 digits",tips,10);		if (bValid) {				 
						 
							$.post("message_ajax.php",{mobnum:mob_num.val(),edit_id: $("#itm_id").val(),mob_name:$("#mob_name").val(),action:'mobile_update'},function(result) 
																							{  
								if(result)
									{  
									updateTips("Updated successfully..",tips);
									}
									
																							});

							}
						 	 
					 
 				 
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				//allFields.val('').removeClass('ui-state-error');
				$(this).dialog('close');
			}
		});	
 });
	 
		

 
		