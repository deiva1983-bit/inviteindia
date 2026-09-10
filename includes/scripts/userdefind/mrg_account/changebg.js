$(document).ready(function(){
	$("button, input:submit, a", ".demo").button();
	$("a", ".demo").click(function() { return false; });
	
	
	$('#select_pages_top').click(function() {
		var idval = $(this).attr('name');
		location.href='changebg.php?wed_id='+idval+'&do=chgbg&type=kav';
	});
	$('#select_pages_bott').click(function() {
		var idval = $(this).attr('name');
		location.href='changebg.php?wed_id='+idval+'&do=chgbg&type=kav';
	});
	
	$('#add_own_page').click(function() {
		var idval = $('#wed_id').val();
		document.getElementById("bgtheme").action = "newimage.php?wed_id="+idval;
		document.getElementById("bgtheme").submit();
	});
});