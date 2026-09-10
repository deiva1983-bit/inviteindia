<?php

$mailto="deivainviteindia@gmail.com"; //Enter recipient email address here

$subject = "Test Email";

$from="deiva.ven@inviteindia.com"; //Your valid email address here

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <deiva.ven@inviteindia.com>' . "\r\n";

$message_body = "This is a test email from Webmaster.";

if( mail($mailto,$subject,$message_body,$headers))

{
echo "Your email has been sent successfully";
}else{

echo "Your email has been sent successfullysss";}



?>