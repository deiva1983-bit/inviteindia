$(document).ready(function(){
	$("button, input:submit, a", ".demo").button();
	
	$("#own_text").css("display", "none");
	

	$('body').on('click', '#content_type', function(){
	var v = $(this).val();
	if(v == 2){
		//$('#system_text').css("display", "block");
		$('#system_text').show('slow');
		$('#own_text').hide('slow');
		//$('#own_text').css("display", "none");
	} else {
		$('#system_text').hide('slow');
		//$('#system_text').css("display", "none");
		$('#own_text').show('slow');
		//$('#own_text').css("display", "block");
	}

	});

$("#remove_cover_butt").click(function(){
	var cov_id='';
	var wed_accid = $("#wed_accid").val();
	//alert ('ss'+wed_accid); return false;
	$.post("ajaxfiles/ajax_wish.php",{wed_accid:wed_accid,chk_action:'remkavimyli'},function(result){
			$(".succval").show("slow");
			$("#remove_cover_butt").hide("slow");
			return false;
		});
});

$(window).load(function () {
	var v = $("#glb_ctype_val").val();
	if(v == 2){
		$('#system_text').css("display", "block");
		$('#own_text').css("display", "none");
	} else {
		$('#system_text').css("display", "none");
		$('#own_text').css("display", "block");
	}
})
});

