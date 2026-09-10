$(document).ready(function()
{


$("#quickcont").click(function(){
var qc_name = jQuery.trim($('#qc_name').val());
var qc_email = jQuery.trim($('#qc_email').val());  
var qc_msg = jQuery.trim($('#qc_msg').val());
var ml_sub = jQuery.trim($('#mail_sub').val());

if(qc_name == "")
{
alert ("Please enter name.");
return false;
}
else if(qc_email == "")
{
alert ("Please enter email.");
return false;
}
else if(qc_msg == "")
{
alert ("Please enter your messages.");
return false;
}
var url="ajaxreq.php";
$.post(url,{ qcname:qc_name,qcemail:qc_email,qcmsg:qc_msg, sub:ml_sub, chk_action:'mailsend' } ,function(res)
        { 
		 	$('#qc_name').val('');
			$('#qc_email').val('');
			$('#qc_msg').val('');
        });
}); 
	 
});