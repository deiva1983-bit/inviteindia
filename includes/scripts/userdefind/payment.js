$(document).ready(function()
{

$("#convertit").click(function(){
var gp_amount=$("#gp_amount").val();
var from_Currency=$("#from_Currency").val();
var to_Currency=$("#to_Currency").val();

var res=$("#resultnode");
var loadimg = "<img src='images/loading.gif' align='center'>";
res.html(loadimg);
$.post("ajaxfiles/pay_ajax.php",{amt:gp_amount,fc:from_Currency,tc:to_Currency,chk_action:'con_amt'},function(result) {	
res.html(result);
});

});

$("#emailSubmitIt").click(function(){
var cus_email=$("#cus_email").val();
var your_msg=$("#your_msg").val();
var cus_name=$("#cus_name").val();
var res=$("#resultnodemail");
$.post("ajaxfiles/pay_ajax.php",{cusemail:cus_email,yourmsg:your_msg,cusname:cus_name,chk_action:'send_mail'},function(result) {	
res.html('Thanks, Our Support team will contact you.');
})

});


		
	}); 