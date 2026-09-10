<?php
ob_start();
class mails {  
 function getSuccWed_tmpl()
    {     
    $wedd_succ_wed='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi <b>%usernm%</b>, </p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your invitation has been created successfully</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your invitation URL: <b>%succwedurl%</b></p>
				<p style="font-size: 1.0em;"><b>More features: </b></p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can add wedding album and share with your friends.</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can map your exact marriage location using google map.</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can share with your friends from inviteindia.com.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions:: <b>inviteindia.feedbock@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
	  return $wedd_succ_wed;
    }

 function forgetpwd_tmpl()
    {     
    $fp_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi, </p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your username: <b>%usernm%</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your password: <b>%userpwd%</b></p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions: <b>inviteindia.feedbock@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
	  return $fp_email;
    }

function getShareEmailTemplate()
	{
	 $wedd_share_email='<html><head></head><body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;"><tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi friends, </p>
				<p style="font-size: 1em; margin-bottom: 16px;">This is <b>%uname%</b>, </p>				
				<p style="font-size: 1em; margin-bottom: 16px;">We <b>%wednames%</b> Invite you to join us</p>
				<p style="font-size: 1em; margin-bottom: 16px;">In celebrating of our wedding party on: %datetime% at %eventaddress%.</p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Your Presence is our honor.</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Please check more information: <b>%wedsurl%</b>.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">%uname%.</p>
				</div>				 
			</div>
		</td></tr></table></div></body></html>';	
	return $wedd_share_email;
	}

function getRemainderEmailWithWedDate()
{
$wedd_rem_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi %enduname%, </p>
				<p style="font-size: 1em; margin-bottom: 16px;">Remainder from inviteindia.com </p>
				
				<p style="font-size: 1em; margin-bottom: 16px;"><b>%wednames%</b>  Going to get marriage on %datetime% at %eventaddress_mar%. </p>				
				
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Please check more information: <b>%wedsurl%</b>.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">inviteindia.com</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
		return $wedd_rem_email;
}

function getRemainderEmailWithRecDateOnly()
{
$wedd_rem_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi %enduname%, </p>
				<p style="font-size: 1em; margin-bottom: 16px;">Remainder from inviteindia.com </p>
				
				<p style="font-size: 1em; margin-bottom: 16px;"><b>%wednames%</b>  Going to get reception on %datetime% at %eventaddress_rec%. </p>				
				
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Please check more information: <b>%wedsurl%</b>.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">inviteindia.com</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
		return $wedd_rem_email;
}

}
?>
