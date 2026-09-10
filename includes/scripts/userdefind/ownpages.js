$(document).ready(function(){
	$("button, input:submit, input:reset, a", ".demo").button();
	//$( ".img_align" ).trigger( "click" );
	$('#right_img').hide();
	var img_align_val = $('input[name=img_align]:checked').val();
	if (img_align_val == 1) {
			$('#left_img').show('slow');
			$('#right_img').hide('slow');
			$('#no_img').hide('slow');
				
	}else if (img_align_val == 2) {
			$('#left_img').hide('slow');
			$('#right_img').show('slow');
			$('#no_img').hide('slow');
				
	}else if (img_align_val == 3) {
			$('#left_img').hide('slow');
			$('#right_img').hide('slow'); 
			$('#no_img').show('slow');
	}

	$(".img_align").click(function(){
	var paravalue = this.value;
	if (paravalue == 1) {
			$('#left_img').show('slow');
			$('#right_img').hide('slow');
			$('#no_img').hide('slow');
				
	}else if (paravalue == 2) {
			$('#left_img').hide('slow');
			$('#right_img').show('slow');
			$('#no_img').hide('slow');
				
	}else if (paravalue == 3) {
			$('#left_img').hide('slow');
			$('#right_img').hide('slow'); 
			$('#no_img').show('slow');
	}
	});

	//$('#add_desc_p1').hide();
	$('#add_desc_p2').hide();
	$('#add_desc_p3').hide();
	$('body').on('click', '#el_s_6853305', function(){ });
	$('body').on('click', '#add_preview_p1', function(){
		$('#add_desc_p1').show(); 
	});
	$('body').on('click', '#info_body_48436311', function(){
		$('#add_desc_p1').hide(); 
	});
	$('body').on('click', '#add_preview_p2', function(){
		$('#add_desc_p2').show(); 
	});
	$('body').on('click', '#add_preview_p3', function(){
		$('#add_desc_p3').show(); 
	});
	$('body').on('click', '#info_body_p2', function(){
		$('#add_desc_p2').hide(); 
	});
	$('body').on('click', '#info_body_p3', function(){
		$('#add_desc_p3').hide(); 
	});

	$('body').on('click', '#dele_p1', function(){ });
	$('body').on('click', '#add_desc_p1', function(){
		var parahval = 1, tips = $(".validateTips_p1");
		var wedidtpl = $('#wedid_tpl').val();
		var inviteid = $('#invite_id').val();
		var desc_p1 = $('#info_body_48436311_val').val();
		var maxparah = $('#max_parah').val();
		maxparah = ++maxparah; alert ('ddd');
		$.post("ajaxfiles/smsajax.php",{wedidtpl:wedidtpl, inviteid:inviteid, parahid:parahval, body_txt:desc_p1, chk_action: 'insert_desc'},function(res){
		tips.html('Your description updated successfully.');
		$('#max_parah').val(maxparah);
		});
	});
	
	$('body').on('click', '#add_desc_p2', function(){
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

	$('body').on('click', '#add_desc_p3', function(){
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

	$('body').on('click', '#add_title', function(){
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

	$('body').on('click', '#show_parah', function(){
		var maxparah = $('#max_parah').val();
		$('#parah'+maxparah+'_status').show('slow'); 
	});

});