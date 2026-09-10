$(document).ready(function(){
	$('#vsignup-win').hide();
	$('#vactivate-signin-label').hide();
	
	
	
	$("#activate-vendor-signup").click(function(){
	$('#vsignin-win').hide();
	$('#vfp-win').hide();
	$('#vsignup-win').show();
	$('#vactivate-signup-label').hide();
	$('#vactivate-signin-label').show();
	});

	$("#activate-vendor-signin").click(function(){
	$('#vsignin-win').show();
	$('#vfp-win').show();
	$('#vsignup-win').hide();
	$('#vactivate-signup-label').show();
	$('#vactivate-signin-label').hide();
	});
});