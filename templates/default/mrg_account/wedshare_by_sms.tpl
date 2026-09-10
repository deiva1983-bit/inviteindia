 <!-- content --> 
</div></div>
{if $glb_err_msg neq ''}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$glb_err_msg}</h3></div>{/if}
{if $alert_status eq '1'}<div style='text-align: center;' id='alert-text-succ'><h3 class='green_succ'>{$alert_msg}</h3></div>{/if}
{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
{/literal}
<!-- content -->
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />

<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
                            <table class="layout-grid" cellspacing="0" cellpadding="0">
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr>{$left_nav_for_wed}
                                        <td style='width: 75%;'>
                                            <div>
                                                <h3 style='padding: 0px;'>Invitation settings: <span>Share your invitations</span></h3>			
                                                        <form id="wedshare_by_sms" name="wedshare_by_sms" class="form_cls" method="post" action="">
							
							 <input type="hidden" name="glb_last_date" id="glb_last_date" value="{$glb_marriage_date_only}" class="inputval" />
                                                        <input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
                                                        <fieldset style="float:none;">

							<div class='pannel' style='width: 100%;'>
							<div id="validateTips_admin" class="validateTips_admin" style='padding-bottom: 5px;'></div> 
							<h3><span>Admin details:</span></h3>
							{if $glb_paid_user eq '0'}
							<h3 style='padding: 0px;' class='red_err'><span>Sorry, The SMS features available only for premium members.</span></h3><p>&nbsp;</p>
							{/if}
							{if $glb_show_complete_panel eq '0'}{else}
							<h3 style='padding: 0px;'>Your mobile number not yet verified. <span>Please activate now.</span></h3><p>&nbsp;</p>
							{/if} 

							{if $glb_show_complete_panel eq '0'}
							<div id='input_panel'><p>
								<label class='lab_black_color' style="width:200px;">You're mobile number:</label> 
								<h3 style='padding: 0px; padding-left: 100px;'>{$glb_mobile_no}</h3>
							</p></div>

							<div id='input_panel'><p>
								<label class='lab_black_color' style="width:400px;">You're total SMS as per your membership plan:</label> 
								<h3 style='padding: 0px; padding-left: 100px;'>{$glb_total_sms}</h3>
							</p></div>

							<div id='input_panel'><p>
								<label class='lab_black_color' style="width:400px;">You're avilable SMS count:</label> 
								<h3 style='padding: 0px; padding-left: 100px;'>{$glb_total_sms_avilable}</h3>
							</p></div>

							

							{else}
							<div id='input_panel' {if $glb_show_input_panel eq 0} style='display: none;' {/if}><p>
								<label class='lab_black_color' style="width:200px;">You're mobile number:<span class="required">*<span></label> 
								<input type="text" id="admin_mobile_num" name="admin_mobile_num" class="inputval" maxlength="30" autocomplete="off" value='' />  &nbsp;&nbsp;<input id="create_admin_acc" name="create_admin_acc" value="Save it" type="button" class='button1' />
							</p></div>
							
							
							
							<div id='activate_link' style='display: none;'>
								<img src='images/block.png'> Your number has been updated successfully, But it's not yet verified. Please verify your mobile number.
							</div>
							<div id='activate_panel'  {if $glb_show_activate_panel eq 1} style='display: inline;' {else} style='display: none;' {/if}>
								<div id='input_panel'><p>
								<label class='lab_black_color' style="width:200px;">You're mobile number:<span class="required">*<span></label> 
								<input type="text" id="admin_mobile_num_active_panel" name="admin_mobile_num_active_panel" class="inputval" maxlength="30" autocomplete="off" value='{$glb_mobile_no}' disabled/>  &nbsp;&nbsp;<input id="send_pin_now" name="send_pin_now" value="Send pin" type="button" class='button1'/>
								</p></div>
							
							<div id='activatepin_panel' {if $glb_show_activate_panel neq 1} style='display: none;' {/if}><p>
								<label class='lab_black_color' style="width:200px;">Enter your pin:<span class="required">*<span></label> 
								<input type="text" id="admin_mobile_pin_no" name="admin_mobile_pin_no" class="inputval" maxlength="4" autocomplete="off" value='' /> &nbsp;&nbsp;<input id="verify_mobile" name="verify_mobile" value="Verify" type="button" class='button1'/>
							</p></div>
							</div>
							{/if}

							</div><br />
							

							<div class='pannel' style='width: 100%;'>
							<h3><span>Guest's details:</span></h3>
							<input type='hidden' value='{$glb_total_sms_avilable}' id='sms_avilable' />
							{if $glb_paid_user eq '0'}
							<h3 style='padding: 0px;' class='red_err'><span>Sorry, The SMS features available only for premium members.</span></h3><p>&nbsp;</p>
							{elseif $glb_show_complete_panel eq '0'}
							<h3 style='padding: 0px;' class='green_succ'>Your mobile number has been successfully verified. <span>You can send SMS to your guests.</span></h3>
							{else}
							{if $glb_form_submit eq '1'}
							<h3 style='padding: 0px;'>Your mobile number not yet verified. <span>Please activate now.</span></h3>
							{/if}
							{/if}
							<div id="validateTips_input" class="validateTips_input" style='padding-bottom: 5px;'></div>
							<p><div>
								<label class='lab_black_color' style="width:200px;">Mobile number:<span class="required">*<span></label>
								 <textarea id="friends_mobile_no" name="friends_mobile_no" rows="5" cols="160" class="inputval" style='width:250px;'>{$glb_friends_mobile_no}</textarea>
							</div>
							<div><label class='lab_black_color' style="width:200px;">&nbsp;</label><span><em><font color="red">Add your mobile number with comma separated.</font></em></span></div>
							</p>

							
							<p><div>
								<label class='lab_black_color' style="width:200px;">Message:<span class="required">*<span></label>
								{if $glb_show_complete_panel eq '0'}
								<input type="text" readonly="true" id="domain_span" class="inputval" style="border-bottom: 0px; width: 250px; " value="{$glb_mobile_no} says -" onclick='invite_details.focus();'>  
								 <textarea id="invite_details" name="invite_details" rows="10" cols="160" class="inputval" style='width:250px; margin-left: 200px; border-top: 0px;' onkeyup='msgcount(this.value)' onkeydown='msgcount(this.value)'>{$glb_invite_details}</textarea>
								{else}								  
								 <textarea id="invite_details" name="invite_details" rows="10" cols="160" class="inputval" style='width:250px;' onkeyup='msgcount(this.value)' onkeydown='msgcount(this.value)'>{$glb_invite_details}</textarea>
								{/if}

							</div>
							<div><label class='lab_black_color' style="width:200px;">&nbsp;</label><span><em><font color="red">Avilable character count: &nbsp;</font></em></span><span><input type='text' id='total_char' class='inputval' style='width:50px;' /></div>
							</p>

							

							<p>
							<div><label class='lab_black_color' style="width:200px;">SMS Type:</label><span><input type="radio" name="sms_type" id="sms_type" value="1" onclick="setType(true)" {if $glb_in_sms_type eq '1'} checked {/if} >Send Now</span></div>
							<div><label class='lab_black_color' style="width:200px;">&nbsp;</label><span><input type="radio" name="sms_type" id="sms_type" value="2" onclick="setType(false)"  {if $glb_in_sms_type eq '2'} checked {/if} >Schedule SMS / Send Later</span></div>
							</p>
							
							<div id='schedule_sms' {if $glb_in_sms_type eq '2'} style='display: inline;' {else} style='display: none;' {/if}>
							<p>
							<label style="width:200px;" class='lab_black_color'>Schedule your sms on:</label> 
							<input type="text" id="sms_date" name="sms_date" class="tcal inputval"  value="{$glb_sms_date}" maxlength="30" autocomplete="off" />  
							</p></div>
							

							{$capchaImg}
							</div>
                                                        <div class="demo">
                                                        <input id="share_by_sms" name="share_by_sms" value="Send SMS" type="submit" class='button1' />
							<input id="clear_by_sms" name="clear_by_sms" value="Clear" type="reset" class='button1' />
                                                        </div><!-- End demo -->
                                                        </fieldset>
                                                        </form>
                                                    </div>
		                                </td>
                                   </tr>
	                        </table>
                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
