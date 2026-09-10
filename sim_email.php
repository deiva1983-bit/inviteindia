 <!-- content -->
 <?php
 $do = $_REQUEST['act'];
 if($do == "fp")
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
	  echo $fp_email;
 }
 else if($do=='succwed')
 {
 $wedd_succ_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
		<td style="border-left: 1px solid #EEEEEE;font-family: Trebuchet MS;padding: 20px 24px; height: 321px; width: 720px;">
			<div class="normal">				
				<p style="font-size: 1em; margin-bottom: 16px;">Hi <b>%usernm%</b>, </p>				
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your successfully created e-wedding card.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Your invitation URL: <b>%succwedurl%</b></p>
				<p style="font-size: 1.0em;"><b>More features: </b></p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can add wedding album and share with your friends.</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can map your exact marriage location using google map.</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">You can share with your friends from inviteindia.com.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">&nbsp;</p>
				<p style="font-size: 0.75em; margin-bottom: 16px;">Please share with us and feedback: <b>inviteindia.feedbock@gmail.com</b></p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Thanks for your support.</p>
				<p style="font-size: 0.85em; margin-bottom: 16px;">Supporting Team, Inviteindia.com.</p>
				</div>
				 
			</div>
		</td></tr></table></div></body></html>';
	  echo $wedd_succ_email;
	  }
	   else if($do=='sharemail')
 {
 $wedd_succ_email='<html><head></head>
 <body><div id="content"><div class="container" style="width:auto; margin: 0 auto;">
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto; margin:0; padding:0;">
	<tr>		 
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
	  echo $wedd_succ_email;
	  }

	  
	  
	  ?>