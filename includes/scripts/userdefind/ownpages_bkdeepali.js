$(document).ready(function(){
	$("button, input:submit, a", ".demo").button();
	$('#add_desc_p1').hide();
	$('#add_desc_p2').hide();
	$('#add_desc_p3').hide();
	$( "#add_preview_p1" ).live( "click", function() {
		$('#add_desc_p1').show(); 
	});
	
	$( "#info_body_48436311" ).live( "click", function() {
		$('#add_desc_p1').hide(); 
	});
	
	$( "#add_preview_p2" ).live( "click", function() {
		$('#add_desc_p2').show(); 
	});

	$( "#add_preview_p3" ).live( "click", function() {
		$('#add_desc_p3').show(); 
	});

	$( "#info_body_p2" ).live( "click", function() {
		$('#add_desc_p2').hide(); 
	});

	$( "#info_body_p3" ).live( "click", function() {
		$('#add_desc_p3').hide(); 
	});
	$( "#dele_p1" ).live( "click", function() {
		
	});
	
	$( "#add_desc_p1" ).live( "click", function() {
		var parahval = 1, tips = $(".validateTips_p1");
		var wedidtpl = $('#wedid_tpl').val();
		var inviteid = $('#invite_id').val();
		var desc_p1 = $('#info_body_48436311_val').val();
		var maxparah = $('#max_parah').val();
		maxparah = ++maxparah;
		$.post("ajaxfiles/smsajax.php",{wedidtpl:wedidtpl, inviteid:inviteid, parahid:parahval, body_txt:desc_p1, chk_action: 'insert_desc'},function(res){
		tips.html('Your description updated successfully.');
		$('#max_parah').val(maxparah);
		});
	});
	
	$( "#add_desc_p2" ).live( "click", function() {
		var parahval = 2, tips = $(".validateTips_p2");
		var wedidtpl = $('#wedid_tpl').val();
		var inviteid = $('#invite_id').val();
		var desc_p2 = $('#info_body_p2_val').val();
		var maxparah = $('#max_parah').val();
		maxparah = ++maxparah;
		$.post("ajaxfiles/smsajax.php",{wedidtpl:wedidtpl, inviteid:inviteid, parahid:parahval, body_txt:desc_p2, chk_action: 'insert_desc'},function(res){
		tips.html('Your description updated successfully.');
		$('#max_parah').val(maxparah);
		});
	});

	$( "#add_desc_p3" ).live( "click", function() {
		var parahval = 3, tips = $(".validateTips_p3");
		var wedidtpl = $('#wedid_tpl').val();
		var inviteid = $('#invite_id').val();
		var desc_p3 = $('#info_body_p3_val').val();
		var maxparah = $('#max_parah').val();
		maxparah = ++maxparah;
		$.post("ajaxfiles/smsajax.php",{wedidtpl:wedidtpl, inviteid:inviteid, parahid:parahval, body_txt:desc_p3, chk_action: 'insert_desc'},function(res){
		tips.html('Your description updated successfully.');
		$('#max_parah').val(maxparah);
		});
	});

	$( "#add_title" ).live( "click", function() {
		var linkname = $("#link_name"),allFields_L = $([]).add(linkname),tips = $("#validateTips");
		var bValid = true;
		allFields_L.removeClass('ui-state-error');
		bValid = bValid && checkLengthminmax(linkname,"link name",3,16,tips);
		if (bValid) {
				return true;
			} else {
			return false;
			}
	});

	$( "#show_parah" ).live( "click", function() {
		var maxparah = $('#max_parah').val();
		$('#parah'+maxparah+'_status').show('slow'); 
	});

});