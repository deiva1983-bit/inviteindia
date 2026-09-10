$(document).ready(function(){	
/*	 $(window).bind('load', function()
    {
		$('#mcts1').find('.navPause').trigger('click');
    });
 */
 	$("#demo_cover_butt").click(function(){		 
		 var cov_id='';
		 cov_id = $('.navBulletsWrapper').find('.active').attr("rel");
		 $('#mcts1').find('.navPause').trigger('click');
		 
return false		 
	});
 		$("#select_cover_butt").click(function(){		 
		var cov_id='';
		cov_id = $('.navBulletsWrapper').find('.active').attr("rel");	
		var cov_from = $("#wed_succ_con").val();
		
		var wed_accid = $("#wed_accid").val(); 
		var urli = "wed_cover.php?wed_id="+wed_accid+"&do=coversett&from="+cov_from+"&pagedo=sdkavimyli-"+cov_id;
		window.location.href =urli;
		
		 
	});	
	
	$("#skip_later").click(function(){ 		 		
		var urli = "/e-wedding.php";
		window.location.href =urli;
	});
	
	 	$("#add_add_gmap").click(function(){		 
		var cov_id='';		
		var cov_from = $("#wed_succ_con").val();		
		var wed_accid = $("#wed_accid").val(); 		
		var urlis = "gmap_search.php?wedid="+wed_accid+"&do=searchloc&from="+cov_from;
		window.location.href =urlis;
		
		 
	});	
	
	$("#remove_cover_butt").click(function(){		 
		var cov_id='';		
		var wed_accid = $("#wed_accid").val(); 		
						$.post("ajaxfiles/ajax_wish.php",{wed_accid:wed_accid,chk_action:'remkavimyli'},function(result) 
							{
							 	
								$(".succval").show("slow");
								$("#remove_cover_butt").hide("slow");
										
								//updateTips("Please enter valid activation code. We sent code your mobile number.",tips1);								 
								return false;
								 
							
							});		
		
		 
	});
	$('body').on('click', '#tmpl_title', function(){
		var tval = $(this).text();
		$("#cover_title").val(tval);
	});

	$('body').on('click', '#tmpl_desc', function(){
		var tval = $(this).text();
		$("#cover_con").val(tval);
	});
	
	$('body').on('click', '#add_classic', function(){
		var grooms_name = $("#txt_wed_grooms_name"), brides_name = $("#txt_wed_brides_name"), cover_title = $("#cover_title"),cover_con = $("#cover_con"),
			allFields = $([]).add(grooms_name).add(brides_name).add(cover_title).add(cover_con),
			tips = $("#validateTips");
			var bValid = true;
			allFields.removeClass('ui-state-error');
			bValid = bValid && checkEmpty(grooms_name,"Grooms's name",tips);
			bValid = bValid && checkEmpty(brides_name,"Bride's name",tips);
			bValid = bValid && checkEmpty(cover_title,"Cover title",tips);
			bValid = bValid && checkEmpty(cover_con,"Cover contents",tips);
			if (bValid) {
				return true;
			} else {
				tips.show("fast");
				return false;
			}
	});
	
		$('body').on('click', '#ball_wedding_cover', function(){
			 var wed_accid = $("#wed_accid"), cover_id = $("#cover_id"), grooms_name = $("#txt_wed_grooms_name"), brides_name = $("#txt_wed_brides_name"),
            allFields = $([]).add(wed_accid).add(grooms_name).add(brides_name), tips = $("#alert-text-succ-msg");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            bValid = bValid && checkLengthminmax(grooms_name,"groom's name",3,7,tips);
            bValid = bValid && checkLengthminmax(brides_name,"bride's name",3,7,tips);
                if (bValid) {
							$.post("ajaxfiles/ajax_wish.php",{mname:grooms_name.val(),fname:brides_name.val(),cid:cover_id.val(),wed_accid:wed_accid.val(),chk_action:'add_ballon'},function(result){
								if(result == '1'){
											tips.show("fast");
								}
							});
					}
			return false;
		});


	});

		 

 

				
	 $(function() {
		
		$("button, input:submit, a", ".demo").button();		
		$("a", ".demo").click(function() { return false; });
	 
	 });

	 

 