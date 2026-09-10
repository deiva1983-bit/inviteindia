<?php
include_once( 'includes/configs/init.php' );
	 $mail_obj = new mails();
// echo $mail_obj->deleteWed();
 $txt = $mail_obj->getSuccWedFeatures_tmpl();
 print $txt; exit;
$to = "deivainviteindia@gmail.com";
$subject = "My subject";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <deiva.ven@inviteindia.com>' . "\r\n";
mail($to,$subject,$txt,$headers);

 
 ?>