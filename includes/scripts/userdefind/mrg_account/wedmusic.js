$(document).ready(function(){
	$("button, input:submit, a", ".demo").button();		
	$("a", ".demo").click(function() { return false; });
	//$("#music_id").val(1);
	$('#butt_create_add_music').click(function() {
			var glb_site_url = $("#glb_site_url").val();
			var music_id = $("#music_id").val();
			var theme_id = $("#theme_id").val();
			var headdiv =$(".validateTips");
			$.post("ajaxfiles/ajax_wish.php",{musicid:music_id, themeid: theme_id, chk_action:'update_music'},function(result) 
			{
			headdiv.show("fast");
			 headdiv.html(result);
			});
	});
	$('#butt_create_rem_music').click(function() {
			var glb_site_url = $("#glb_site_url").val();
			var theme_id = $("#theme_id").val();
			var headdiv =$(".validateTips");
			$.post("ajaxfiles/ajax_wish.php",{themeid: theme_id, chk_action:'rem_music'},function(result) 
			{
			headdiv.show("fast");
			 headdiv.html(result);
			});
	});

$('.music_lists').click(function() {
	var wed_accid = $(this).attr("id");
	$("#music_id").val(wed_accid);
});
$('#butt_play_music').click(function() {
	var glb_url = $('#glb_site_url').val();
	var music_id = $("#music_id").val();
	var suburl	= glb_url+'videoplay.php?do=play&audio_id='+music_id;
	window.open(suburl,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=350,height=100,screenX=150,screenY=150,top=100,left=150');
});
$('#butt_add_own').click(function() {
	$('#own_music_sec').show('slow')
});

$('#butt_create_own_music').click(function() {
document.forms[0].submit();
});

});