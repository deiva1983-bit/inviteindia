$(document).ready(function()
  {
		$("#head_prev").live("click", function(){
				 var headdiv = $(".thirukkural"); //alert (rem_mobno.val());
				 var headdiv_cntrl = $("#head_nav_cntrl"); //alert (rem_mobno.val());
				 var currheadid = $("#tmpl_kural_auto_id");
				 var theme_owner_id = $("#glb_theme_owner_id").val();				 
				 var loadimg = "<img src='images/loading.gif' align='center'> Please wait..";												
						headdiv.html(loadimg);
						$.post("ajaxfiles/setrem.php",{cheadid:currheadid.val(), theme_ownerid: theme_owner_id, chk_action:'prevhead'},function(result) 
							{	 
							 headdiv.html(result);
							}); 
						$.post("ajaxfiles/setrem.php",{cheadid:currheadid.val(), theme_ownerid: theme_owner_id, chk_action:'updatenav_prev'},function(res) 
							{	 
							 headdiv_cntrl.html(res);
							});				 
			});
			
			
			$("#head_next").live("click", function(){			
				 var headdiv = $(".thirukkural"); //alert (rem_mobno.val());
				 var headdiv_cntrl = $("#head_nav_cntrl"); //alert (rem_mobno.val());
				 var currheadid = $("#tmpl_kural_auto_id"); 
				 var theme_owner_id = $("#glb_theme_owner_id").val();
				 var loadimg = "<img src='images/loading.gif' align='center'> Please wait..";												
						headdiv.html(loadimg);
						$.post("ajaxfiles/setrem.php",{cheadid:currheadid.val(), theme_ownerid: theme_owner_id, chk_action:'nexthead'},function(result) 
							{	 
							 headdiv.html(result);
							}); 
						$.post("ajaxfiles/setrem.php",{cheadid:currheadid.val(), theme_ownerid: theme_owner_id, chk_action:'updatenav'},function(res) 
							{	 
							 headdiv_cntrl.html(res);
							});	
						
			});
			
			$("#desc_next").live("click", function(){
				var theme_id = $("#glb_theme_id").val(); 
				 var descdiv = $(".home_content"); //alert (rem_mobno.val());
				 var descdiv_cntrl = $("#desc_nav_cntrl"); //alert (rem_mobno.val());
				 var currdescid = $("#tmpl_desc_auto_id"); 
				 var theme_owner_id = $("#glb_theme_owner_id").val(); 
				 
				 var loadimg = "<img src='images/loading.gif' align='center'> Please wait..";												
						descdiv.html(loadimg);
						$.post("ajaxfiles/setrem.php",{cdescid:currdescid.val(), themeid:theme_id, theme_ownerid: theme_owner_id, chk_action:'nextdesc'},function(result) 
							{							
							 descdiv.html(result);
							}); 
						 $.post("ajaxfiles/setrem.php",{cdescid:currdescid.val(), theme_ownerid: theme_owner_id, chk_action:'updatedesc'},function(res) 
							{	 
							 descdiv_cntrl.html(res);
							}); 
						
			});
			
					$("#desc_prev").live("click", function(){
					var theme_id = $("#glb_theme_id").val(); 
				  var descdiv = $(".home_content"); //alert (rem_mobno.val());
				 var descdiv_cntrl = $("#desc_nav_cntrl"); //alert (rem_mobno.val());
				 var currdescid = $("#tmpl_desc_auto_id"); 
				var theme_owner_id = $("#glb_theme_owner_id").val();
				 var loadimg = "<img src='images/loading.gif' align='center'> Please wait..";												
						descdiv.html(loadimg);
						$.post("ajaxfiles/setrem.php",{cdescid:currdescid.val(), themeid:theme_id, theme_ownerid: theme_owner_id,chk_action:'prevdesc'},function(result) 
							{	 
							 descdiv.html(result);
							}); 
						$.post("ajaxfiles/setrem.php",{cdescid:currdescid.val(), theme_ownerid: theme_owner_id, chk_action:'updatedesc_prev'},function(res) 
							{	 
							 descdiv_cntrl.html(res);
							});			 
			});
			
			$("#head_save").live("click", function(){
			var theme_id = $("#glb_theme_id").val(); 
			var cheadid = $("#tmpl_kural_auto_id").val(); 
			$.post("ajaxfiles/setrem.php",{chead:cheadid, themeid:theme_id, chk_action:'headsave'},function(result) 
							{	 
							 alert ('Congrats, Your Title successfully updated.');
							}); 
			});
			
			$("#desc_save").live("click", function(){
			var theme_id = $("#glb_theme_id").val(); 
			var cdescid = $("#tmpl_desc_auto_id").val(); 
			$.post("ajaxfiles/setrem.php",{cdesc:cdescid, themeid:theme_id, chk_action:'descsave'},function(result) 
							{	 
							 alert ('Congrats, Your descriptions successfully updated.');
							}); 
			});
			
			
			
	});
 