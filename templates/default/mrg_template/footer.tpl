<div id="dialog-form" title="Set Reminder">
	<form>
	<fieldset style="padding:10; border:0; margin-top:25px; ">
	<div id="validateTipsRem" class="validateTipsRem"></div>
	<table>
	<input type="hidden" name="wed_auto_id" id="wed_auto_id" value="{$mrg_wed_auto_id}" />
	<input type="hidden" name="wed_validation_date" id="wed_validation_date" value="{$glb_rem_validation_date}" />
	<input type="hidden" name="wed_curr_date" id="wed_curr_date" value="{$glb_rem_current_date}" />
	
	<tr><td style="width: 120px; padding-top:10px;">Name:</td>
		<td style="padding-top:15px;"><input type="text" name="rem_name" id="rem_name" /></td></tr>
		<tr><td style="width: 120px; padding-top:10px;">Reminder Date:</td>
		<td style="padding-top:15px;"> 
		<input type="text" name="marriage_date" id="marriage_date" class="datepicker inputval">
		</td></tr>
		{if $glb_usrlog neq 0}
		<input type="hidden" class="valid1" id="valid1" value='Please enter your email address or mobile number.' />
		<input type="hidden" class="overlay_height" id="overlay_height" value='520' />
		<tr><td style="width: 120px; padding-top:10px;">Mobile no:</td>
		<td style="padding-top:15px;"><input type="text" name="rem_mobno" id="rem_mobno" /></td></tr>
		<tr><td colspan="2" align="center" style="padding-top:10px;">Or</td></tr>
		{else}<input type="hidden" class="valid1" id="valid1" value='Please enter your email address.' /><input type="hidden" class="overlay_height" id="overlay_height" value='300' />{/if}

		<tr><td style="width: 120px; padding-top:10px;">Email Address:</td>
		<td style="padding-top:15px;"><input type="text" name="rem_email" id="rem_email" /></td></tr>
		{if $glb_usrlog neq 0}
		<tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
		<tr style='display: none;'><td colspan="2">Note: We dont share your mobile number & email address. Its just used for sent reminder about this invitations.</td></tr>
		{/if}
		</table>
		<div  style="display: none;" id="activation_codes">
		<table>	
		<tr><td style="width: 120px; padding-top:10px;">Activation code:</td>
		<td style="padding-top:15px;">  <div class="demo"><input type="text" name="rem_activate_code" id="rem_activate_code" style="width: 45px;"/>&nbsp;<a style="cursor:pointer;" id="activate_now">Activate now!</a></div></td></tr>
		
		<tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
		<tr><td colspan="2">Please enter your activation code.</td></tr>
		</table>
		</div>
	</fieldset>
	</form> 
	</div>