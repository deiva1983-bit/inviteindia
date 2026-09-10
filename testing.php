<?php
 $to = "deiva.ven@gmail.com, inviteindia.feedback@gmail.com";
 $subject = "Hi!";
 $body = "God Help me";
 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
 ?>