<?php
ob_start();
class mails {
function makeitfree_msgs()
    {
	global $email_rightside_panels;
    $wedd_vendors='<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thank you for registring with us.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your website: <b>%succwedurl%</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your wedding website trial version with only paid member features is going to expire by tomorrow(%exp_date%). In order to continue all features from inviteindia.com, you are requires to upgrade as a paid premium member.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Premium package will be starting from Just Rs. %min_price% onwards.</p>

				<p style="font-size: 0.85em; margin-bottom: 16px;">The following paid member features will be available only for the paid members and their invitees. The system will suspend the access to your account from %exp_date%</p>
								<p style="font-size: 0.85em; margin-bottom: 16px;"><ul style="font-size: 13px;"><li>Wedding animation</li><li>Wedding cover</li><li>Wedding registry</li><li>SMS reminder</li><li>Background music</li><li>Wedding envelope</li><li>Paid themes with own background image</li><li>Own pages and much more...</li></ul></p>
				 <p style="font-size: 0.85em; margin-bottom: 16px; text-align: center;"><a href="https://www.inviteindia.com/packages.php" class="button" target="_blank" style="font-size: 1em; color: #FFFFFF; padding: 0.8em 1em 0.8em 1em; border: none; margin: 1em auto 0em; outline: none; background: #97010A; text-transform: uppercase; letter-spacing: 1px; text-decoration: none; font-family: sans-serif;"><b>Package!</b></a></p><p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>';
 return $this->getHeader_tmpl().$wedd_vendors.$this->getFooter_tmpl();
    }
function makeitfree() {
	global $email_rightside_panels;
    $wedd_vendors='<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thank you for registring with us.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your website: <b>%succwedurl%</b></p>

				<p style="font-size: 0.85em; margin-bottom: 16px;">In continuation with our previous reminder, your wedding website trial version with only paid member features has expired. In order to continue all features from inviteindia.com, you are required to upgrade as a paid Premium Member.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">The following paid member features will be available only for the paid members and their invitees. Our system has suspended the access from your website.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;"><ul style="font-size: 13px;"><li>Wedding animation</li><li>Wedding cover</li><li>Wedding registry</li><li>SMS reminder</li><li>Background music</li><li>Wedding envelope</li><li>Paid themes with own background image</li><li>Own pages and much more...</li></ul></p>
				
				<p style="font-size: 0.85em; margin-bottom: 16px;">Premium themes will be replaced with default non-premium themes.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Please update your membership account to continue all the above value added premium services and restore your original selections where applicable.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Premium package will be starting from Just Rs. %min_price% onwards.</p>

				<p style="font-size: 0.85em; margin-bottom: 16px; text-align: center;"><a href="https://www.inviteindia.com/packages.php" class="button" target="_blank" style="font-size: 1em; color: #FFFFFF; padding: 0.8em 1em 0.8em 1em; border: none; margin: 1em auto 0em; outline: none; background: #97010A; text-transform: uppercase; letter-spacing: 1px; text-decoration: none; font-family: sans-serif;"><b>Package!</b></a></p><p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>';
	return $this->getHeader_tmpl().$wedd_vendors.$this->getFooter_tmpl();
    }
function getWedExpired_tmpl(){
	global $email_rightside_panels;
	$wedd_succ_wed='<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thank you for registring with us.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your website: <b>%succwedurl%</b></p>

				<p style="font-size: 0.85em; margin-bottom: 16px;">Our records indicate that your wedding website got expired by today. In order able to access your website, you are required to upgrade your account as a premium member.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.85em; margin-bottom: 16px; text-align: center;"><a href="https://www.inviteindia.com/packages.php" class="button" target="_blank" style="font-size: 1em; color: #FFFFFF; padding: 0.8em 1em 0.8em 1em; border: none; margin: 1em auto 0em; outline: none; background: #97010A; text-transform: uppercase; letter-spacing: 1px; text-decoration: none; font-family: sans-serif;"><b>Package!</b></a></p>';
	return $this->getHeader_tmpl().$wedd_succ_wed.$this->getFooter_tmpl();
    }
function actVendors()
    {   
	global $email_rightside_panels;
    $wedd_vendors='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" border="0" cellpadding="0" style="width:auto; margin:0; padding:0; background-color: #f2f2f2;">
	  <tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 400px;" colspan="2">
	   <div class="logo"><a href="http://www.inviteindia.com/index.php"><img src="http://www.inviteindia.com/images/inlogo.png" alt="InviteIndia" border="0"></a></div>       
		</td>
		</tr>
	  	<tr>
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 250px; vertical-align: top;">
			
				<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thank you for registering at InviteIndia Vendors sections. Your account is created and must be activated before you log in.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">To activate your account, Click the following link or Copy & paste it in your browser.</p>

				<p style="font-size: 0.85em; margin-bottom: 16px;">Your activation URL: <b>%actwedurl%</b></p>
				 
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions:: <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				 
				 
			</div>
		</td>
		</tr>
	 </table></div></body></html>';
	  return $wedd_vendors;
    }
 function deleteWed()
    {   
	global $email_rightside_panels;
    $wedd_succ_wed='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" border="0" cellpadding="0" style="width:auto; margin:0; padding:0; background-color: #f2f2f2;">
	  <tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 400px;" colspan="2">
	   <div class="logo"><a href="http://www.inviteindia.com/index.php"><img src="http://www.inviteindia.com/images/inlogo.png" alt="InviteIndia" border="0"></a></div>       
		</td>
		</tr>
	  	<tr>
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 250px; vertical-align: top;">
			
				<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your wedding website successfully created. Now you can share with your friends, neighbors.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your invitation URL: <b>%succwedurl%</b></p>
				 
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions:: <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				 
				 
			</div>
		</td>
		  '.$email_rightside_panels.'
		</tr>
	 </table></div></body></html>';
	  return $wedd_succ_wed;
    }

 function getReg_tmpl(){
    global $email_rightside_panels;
    $wedd_succ_wed='<p>Dear <b>%usernm%</b>,</p>
					<p>We are thrilled to welcome you to InviteIndia.com!</p>
					<p>Planning a wedding is an exciting journey, and we are here to make it even more special by helping you create your very own wedding website. With our easy-to-use platform, you can share all the important details, photos, and updates with your loved ones in one beautiful place.</p>
					<p><b>Here\'s what you can do with your wedding website:</b></p>
					<p><ul>
						<li><b>Personalize:</b> Customize your website with beautiful themes and designs.</li>
						<li><b>Share:</b> Provide guests with all the essential information, from the venue to the schedule.</li>
						<li><b>RSVP:</b> Easily manage your guest list and receive RSVPs online.</li>
						<li><b>Gallery:</b> Showcase your love story with photos and videos.</li>
					</ul></p>
					<p><b>Getting started is simple:</b></p>
					<p>1. Visit InviteIndia.com.</p>
					<p>2. Sign up or log in to your account.</p>
					<p>3. Follow the easy steps to create and personalize your wedding website.</p>
					<p>If you have any questions or need assistance, our support team is here to help. Feel free to reach out to us at <a href="mailto:support@inviteindia.com">support@inviteindia.com</a></p>
					<p>We can\'t wait to see the beautiful website you\'ll create! </p>
					<p>Warm regards,</p>
					<p>The InviteIndia.com Team</p>';
    return $this->getHeader_tmpl().$wedd_succ_wed.$this->getFooter_tmpl();
    }
function getSuccWed_tmpl(){
    global $email_rightside_panels;
    $wedd_succ_wed='<p style="font-size: 1em; margin-bottom: 16px;">Congratulations <b>%usernm%</b>, </p>

				
				<p>You have successfully set up your wedding website.</p>
				<p>Website URL: <b>%succwedurl%</b></p>
				<p>&nbsp;</p>
				<hr />
				<p>&nbsp;</p>
				<p><b>What\'s next?</b> Explore the many features available for your website:</p>
					<p style="font-size: 0.85em; margin-bottom: 16px;">
						<ul>
							<li>Wedding animation</li>
							<li>Wedding cover</li>
							<li>Wedding registry</li>
							<li>Guest book management</li>
							<li>Background music</li>
							<li>Wedding album</li>
							<li>Wedding envelope</li>
							<li>Location map</li>
							<li>Custom pages</li>
							<li>And much more...</li>
						</ul>
					</p>
				';

	  return $this->getHeader_tmpl().$wedd_succ_wed.$this->getFooter_tmpl();
    }
 function getWedExp_tmpl(){
	 global $email_rightside_panels;
	$wedd_succ_wed='<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thank you for registring with us.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your website: <b>%succwedurl%</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">This is a reminder about your wedding website is going to expire on %expdate%. In order able to access your website, you are required to upgrade your account as a premium member.</p>';
	return $this->getHeader_tmpl().$wedd_succ_wed.$this->getFooter_tmpl();
    }
    function getHeader_tmpl() {
    return '<html><head></head> <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" border="0" cellpadding="0" style="width:auto; margin:0; padding:0; background-color: #f2f2f2;">
	  <tr style="background: url(https://www.inviteindia.com/assets/bg_top_img.jpg) top center no-repeat;">		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 650px;" colspan="2">
	   <div class="logo"><a href="https://www.inviteindia.com"><img src="https://www.inviteindia.com/images/inlogo.png" alt="InviteIndia" border="0"></a></div>
		</td>
		</tr>
	  	<tr>
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 400px;">
			<div class="normal" style="padding: 20px;">';
	}
	function getFooter_tmpl() {
		return '<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.85em; margin-bottom: 16px; text-align: center;"><font style="font-size: 0.8em;">Stay up to date with our latest news & features</font></p>
				<p style="font-size: 0.85em; margin-bottom: 16px; text-align: center;"><a href="https://www.facebook.com/invitindia" target="_blank" style="padding: 2px;"><img src="https://www.inviteindia.com/assets/icon1.gif" alt="Facebook" height="42" width="42"></a><!-- <a href="https://www.facebook.com/invitindia" target="_blank" style="padding: 2px;"><img src="https://www.inviteindia.com/assets/icon_6.jpg" alt="YouTube" height="42" width="42"></a> --></p>
				</div>
			</div>
		</td>
		</tr>
	 </table></div></body></html>';
	}

	function getSuccBirth_tmpl()
    {
	global $email_rightside_panels;
    $wedd_succ_wed='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" border="0" cellpadding="0" style="width:auto; margin:0; padding:0; background-color: #f2f2f2;">
	  <tr style="background: url(http://www.inviteindia.com/assets/bg_top_img.jpg) top center no-repeat;">		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 650px;" colspan="2">
	   <div class="logo"><a href="http://www.inviteindia.com/index.php"><img src="http://www.inviteindia.com/images/inlogo.png" alt="InviteIndia" border="0"></a></div>       
		</td>
		</tr>
	  	<tr>
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 400px; vertical-align: top;">
			<div class="normal">
				<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%usernm%</b>, </p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Welcome to inviteindia.com. We hope you\'re love to create your perfect birthday website and that this will form the center of communications with your guests. </p>

				<p style="font-size: 0.85em; margin-bottom: 16px;">Your personalized website URL is: <b>%succwedurl%</b></p>	
				 
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">If you have any queries at all about creating your site, please feel free to email us at inviteindia.feedback@gmail.com and we\'ll be happy to help.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Best wishes,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">InviteIndia.com</p>
				</div>				 
			</div>
		</td>
		</tr>
	 </table></div></body></html>';
	  return $wedd_succ_wed;
    }
 function getSuccWed_tmpl1()
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
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions:: <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
	  return $wedd_succ_wed;
    }

function getSuccWedFeatures_tmpl()
    {     
	global $email_rightside_panels;
    $wedd_succ_wed='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi <b>%usernm%</b>, </p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your invitation URL: <b>%succwedurl%</b></p>
				<p style="font-size: 1.0em;"><b>More features: </b></p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can add wedding album and share with your friends.</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can map your exact marriage location using google map.</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can share with your friends from inviteindia.com.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions:: <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
	  return $wedd_succ_wed;
    }
 function forgetpwd_tmpl() {
	$wedd_reset_temp='<p>Dear <b>%usernm%</b>,</p>
	<p>We received a request to reset your password for your account. If you did not make this request, please ignore this email.</p>
	<p>To reset your password, please click the link below:</p>
	<p><a href="%resetlink%">Reset Password</a></p>
	<p>&nbsp;</p>
	<p>This link will expire in 24 hours for security reasons. If you need further assistance, please contact our support team at <a href="mailto:support@inviteindia.com">support@inviteindia.com.</a></p>
	<p>Warm regards,</p>
	<p>The InviteIndia.com Team</p>';
	return $this->getHeader_tmpl().$wedd_reset_temp.$this->getFooter_tmpl();
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

function getDonateMail()
{
$wedd_rem_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi %username%, </p>
				<p style="font-size: 1em; margin-bottom: 16px;">This is from InviteIndia.com... </p>
				
				<p style="font-size: 1em; margin-bottom: 16px;">Thank you for choosing inviteindia.com to create your wedding invitations.</p>
				
				<p style="font-size: 1em; margin-bottom: 16px;">As you know Invite India offered all featured are completely free, and we don\'t have any expired date for your wedding invitations.</p>
				
				<p style="font-size: 1em; margin-bottom: 16px;"><b>About your wedding invitations: </b> %wedurls% </p>
				<p style="font-size: 1em; margin-bottom: 16px;">Total Guest Messages: &nbsp; <b>%tot_guest_msg%</b></p>
				<p style="font-size: 1em; margin-bottom: 16px;">Total user\'s viewed: &nbsp;<b>%tot_guest_view%</b></p>
				
				<p style="font-size: 1em; margin-bottom: 16px;"><b>Our Features:</b></p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Unlimited Photo albums,</p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Powerful feature with Google Map,</p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Wedding animations,</p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Wedding Themes,</p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Guest Book - wishes,</p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Face book share and more.,</p>
				<p style="font-size: 1em; margin-bottom: 16px;">And we provided wedding invitations without any <b>advertisement</b>, So we hope you don’t get any hesitating to share your wedding Invitations. That’s our Aim.</p>
				<p style="font-size: 1em; margin-bottom: 16px;"> - Face book share and more.,</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Thank you for choosing inviteindia.com to create your wedding invitations.</p>
				
				<p style="font-size: 1em; margin-bottom: 16px;"><b>Support US:</b></p>
				<p style="font-size: 1em; margin-bottom: 16px;">Can you please support us to improve more, Can you please donate at least Rs. 50/-. This will help us more. Am hoping you will donate us at least Rs. 50/. Because InviteIndia.com helps you to share a wonderful moments from your life.</p>
				
				<p style="font-size: 1em; margin-bottom: 16px;"><b>Donation URL:</b> <a href="http://www.inviteindia.com/donate.php" target="new">http://www.inviteindia.com/donate.php </a></p>
				 
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions: <b>inviteindia.feedback@gmail.com</b></p>
				
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">inviteindia.com</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
		return $wedd_rem_email;
}

function getpaymail()
    {   
	 global $email_rightside_panels;
    $wedd_succ_wed='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" border="0" cellpadding="0" style="width:auto; margin:0; padding:0; background-color: #f2f2f2;">
	  <tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 650px;" colspan="2">
	   <div class="logo"><a href="http://www.inviteindia.com/index.php"><img src="http://www.inviteindia.com/images/inlogo.png" alt="InviteIndia" border="0"></a></div>       
		</td>
		</tr>
	  	<tr>
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; width: 400px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Dear <b>%username%</b>, </p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">We are from inviteindia.com. Thank you for choosing inviteindia.com to create your wedding invitations.</p>

				<p style="font-size: 0.85em; margin-bottom: 16px;">Your wedding URL: %wedurls%</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">We are glad to inform that our system will move next level featurs, we introduced payment integrations for invitations.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Since your already created account before payment integrations, So we automatically updated for your account with Silver membership.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">To know more about Membership package features <a href="http://www.inviteindia.com/packages.php">Click Here.</a></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us any feedback or suggestions:: <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				</div>
				 
			</div>
		</td>
		 '.$email_rightside_panels.'
		</tr>
	 </table></div></body></html>';
	  return $wedd_succ_wed;
    }

function getOwnDomain()
{
$wedd_rem_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi, </p>
				
				<p style="font-size: 1em; margin-bottom: 16px;">You\'re initated request for create an own website. We are processing your request.</p>
				<p style="font-size: 1em; margin-bottom: 16px;">You\'re request will be solved with in 48 hours.</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Your invitation url: %inv_url%</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Your new website url: %own_web%</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Call us if you have any doubts: <b>(+91) 95 66 77 59 77</b> or <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">inviteindia.com</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
		return $wedd_rem_email;
}

function getOwnDomain_admin()
{
$wedd_rem_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi, </p>
				
				<p style="font-size: 1em; margin-bottom: 16px;">You\'re initated request for create an own website. We are processing your request.</p>
				<p style="font-size: 1em; margin-bottom: 16px;">You\'re request will be solved with in 48 hours.</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Your invitation url: %inv_url%</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Your new website url: %own_web%</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Contact no: %cont_no%</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Contact name: %cont_name%</p>
				<p style="font-size: 1em; margin-bottom: 16px;">Billing email: %billing_email%</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Call us if you have any doubts: <b>(+91) 95 66 77 59 77</b> or <b>inviteindia.feedback@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks,</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">inviteindia.com</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
		return $wedd_rem_email;
}


}
?>
