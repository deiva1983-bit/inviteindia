 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
	  
	<tr> <td colspan="3" align="center"><h3 style="font-size:1.2em;"><font color="red">
	{if $sms_in_type eq 3}
	Please login... <a href="register.php?do=login" id="mobilelogin_activate" class="mobilelogin_activate">click me</a>
	{elseif $sms_in_type eq 2}
	Please activate your SMS Account... <a href="mobileactivate.php?actc={$sms_en}" id="mobileactivate_activate" class="mobileactivate_activate">click me</a>
	{/if}	 
	</font></h2></td></tr>
	{if $sms_send_status eq 'ok'}
		<tr><td colspan="3" align="center" ><succ id="succval" class="succval">Message send successfully to <b>{$sms_send_mob}</b></succ></td></tr>
		
			{if $sms_send_exist eq '0'}
			<tr><td colspan="3" align="center" ><a href="#" id="addit_myadd" name="add_1234" class="addit_myadd">Click here</a> to add address book</td></tr>
			{/if} 
	{/if} 
	
	
	<tr> <td colspan="3" align="center"><h3 style="font-size:1.7em;"><font color="red">
	Sorry, SMS features is inprogress. Please try again.
	</font></h2></td></tr>
	<tr>
		<td class="left-nav">
			<dl class="demos-nav">
				<dt>Send SMS</dt>
					<dd><a href="smscorner.php" class="selected">Send SMS</a></dd>
					<dd><a href="#">Group SMS</a></dd>
					 
					 
				<dt>Account Settings</dt>
					<dd><a href="smsaccount.php?do=actmgt&type=frmg">Manage my friends</a></dd>
					<dd><a href="#">Manage my groups</a></dd>

			</dl>
		</td>
		<td class="normal" height="321px;" width="500px;">

			<div class="normal">
			<input type="hidden" name="hid_smsopx" id="hid_smsopx" value="{$sms_status}" />
			<h3>Send Free SMS Now</h3>
			<p><p id="sms_plain_tips" >Login...</p>
			<form id="signin_form" name="signin_form" class="signin_form" method="post" action="smssuccess.php">
			<input type="hidden" name="sms_chk" value="sendsms" />
			<input type="hidden" name="current_status" value="loginchk" />
            <fieldset>
                                        <div class="field"><label>Mobile No:</label><input type="text" name="txt_mob_no" id="txt_mob_no" value="" class="inputval"/>
					<span class="hint" id="event_title_hint" ></span></div>
  					    <div class="field"><label>Message:</label><textarea name="msgText" id="msgText" rows="8" style="width:200px;" tabindex="9" class="inputval"></textarea>  
							<span class="hint" id="event_title_hint" ></span></div>
							    <div class="demo">
							<button id="butt_send_sms_plain" class="butt_send_sms_plain">Send SMS</button>&nbsp;&nbsp;<button  id="butt_send_sms_clear" class="butt_send_sms_clear">Clear</button>  
							 <dd>&nbsp;</dd> 
							</div><!-- End demo -->
                                     </fieldset>
                       </form>
			</p>
			</div>

		</td>
		 
		 
		<td class="normal" > 
			{if $user_log_id eq ''} 
			 <div id="signin_form">
				<div id='orange-color'>Login</div> 			 
				<p>						
					<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
				 	 <fieldset>
                                        <div class="field"><label style="width: 65px;">Username:</label><input type="text" name="txt_usr_name" id="txt_usr_name" value="" class="inputval" style="width: 100px;" />
					<span class="hint" id="event_title_hint" ></span></div>
  					    <div class="field"><label style="width: 65px;">Password:</label><input type="password" name="txt_pass_word" id="txt_pass_word" value="" class="inputval" style="width: 100px;" />
					<span class="hint" id="event_title_hint" ></span></div>
							<div class="demo">
							<button id="butt_login" class="butt_login">Login</button>&nbsp;&nbsp;<button  id="butt_log_clear" class="butt_log_clear">Clear</button>  
							 <dd>&nbsp;</dd> 
							</div><!-- End demo -->
                                     </fieldset>
				</p>
				 </div>
				<div id="border_line"   ></div>  
			{/if}
		</td>
		 
 
		
	</tr>
	</table>
      </div></div>

  
 
 {include file='default/friendsup.tpl'}
 
 
   
 

