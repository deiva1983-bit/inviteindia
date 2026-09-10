<div class="contact" id="edit-music">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Secure website</span></h3>
		<form name='wed_music' id='wed_music' method='post' action='set-pwd.php?wed_id={$user_wedid}&do=setpwd' enctype="multipart/form-data">
			<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
			<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
			<input type="hidden" name="action" id="action" value="setp" />
		<div class="contact-main w3agile">
				<div class="col-md-3 contact-left">
				<div class="contact-bottom">
					<div><p>{$left_nav_for_wed}</p></div>
				</div>
				</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Secure your<span> website</span></h2>
				<p><span><i class="fa fa-lock" aria-hidden="true"></i></span></p>
				</div>
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $glb_err_msg eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$glb_txt_msg}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>Your passcode has been successfully added to your wedding website. Please share your wedding URL and passcode with your invitees, otherwise, they will not be able to access your wedding website.</div>{/if}
				
				{if $rem_status eq '1'}<div class="alert green_succ" role='alert'>Your passcode has been removed from your website.</div>{/if}

				<div class="validateTips alert green_succ" role='alert' style="display: none;"></div>
				{if $glb_show_pannel eq '1'}
				<div class="contact-bottom">
					<div><p>
						<label class='lab_black_color'>Set password for your wedding website:</label> 
						<input type="text" id="pwd_set" name="pwd_set" class="tcal" maxlength="30" autocomplete="off" />
					</p></div>
				</div>

				<div>
				<button id="butt_create_web_invit" class="button">Set passcode</button>&nbsp;&nbsp;<button  id="butt_clear_web_invit" class="butt_clear_web_invit button" type="reset">Clear</button>
				</div>
				{else}
				<div class="contact-bottom">
					<div><p>
						<label class='lab_black_color'>Your passode: &nbsp;</label><label>{$c_pwd}&nbsp;&nbsp;</label><label><a href="set-pwd.php?wed_id={$user_wedid}&do=rp" style="cursor: pointer;" onClick="if(confirm('Are you sure you want to delete.?') == true) return true; else return false;">Remove passcode</a></label>
					</p></div>
				</div>
				{/if}

			</div></div>
		</form>

	</div>
</div>