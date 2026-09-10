$(document).ready(function(){
$("#butt_register").click(function(){
    var pcode = $("#passcode"),allFields = $([]).add(pcode),tips = $(".validateTips_pwd");
	tips.text("").removeClass('ui-state-error');
	if (!pcode.val().length){
	tips.text("Please enter your passcode.").addClass('ui-state-error');
	pcode.val("");
	}else{
				$.post("ajaxfiles/userajax.php",{passcode:pcode.val(),gid:$("#glb_id").val(),chk_action:'allowed'},function(result){
					if(result == 'not') {
					tips.text("Please enter valid passcode.").addClass('ui-state-error');
					pcode.val("");
					} else {
					location.reload();
					}
				});
	}
	});
});