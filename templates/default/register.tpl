 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
	 

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
		<td class="normal" height="420px;" width="500px;">

			<p class="validateTips" id="validateTips"></p>
	<form onSubmit="return false;">
	<input type="hidden" name="do" value="loginchk" />
	<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
	<fieldset style="padding:10; border:0; margin-top:25px; ">
		<div> <p> <label for="name" >User name:</label> 
		<input type="text" name="name" id="name" class="inputval">  </p></div>
		<div> <p> <label for="password" >Password:</label>
		<input type="password" name="password" id="password" value=""class="inputval" /></p></div>
		<div> <p> <label for="email" >Email:</label>
		<input type="text" name="email" id="email" value="" class="inputval"/> </p></div>
		 <div> <p> <label for="email"  >Date of Birth:</label>
		 <input type="text" id="datepicker" class="datepicker inputval" readonly="true"  /> </p></div>
		 <div class="demo">
		<button id="butt_register">Login</button>&nbsp;&nbsp;<button id="butt_register_clear">Cancel</button>
			 
	</fieldset>	
	</form> 

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

  
 
 
   
 

