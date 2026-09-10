<?php
$to = "invitewed@gmail.com";
$subject = "My subject";
$txt = "Hello world!sDDDD";
$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
$headers .= 'From: <customerservice@inviteindia.com>' . "\r\n";
if(mail($to,$subject,$txt,$headers)){
	echo "Mail Sents";
}else{
	echo "***ERROR***";
}
?>