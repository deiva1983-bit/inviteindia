<div class="contact" id="edit-pers-animation">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Animations</span></h3>
		{if $glb_from_src eq '1'}<div style='padding: 10px;'><span><a href="#" id="skip_later">Skip, May be Later</a></span> <span style='float: right;'><a href="#" id="add_add_albums">Add albums >> Next</a></span></div>{/if}

		<form id="wed_animations" name="wed_animations" class="form_cls" method="post" action="" onSubmit="return false;">
		<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
		<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
		<input type="hidden" name="theme_id" id="theme_id" value="{$user_wedid}" class="inputval"/>
		<input type="hidden" name="img_id" id="img_id" value="{$user_imgid}" class="inputval"/>

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
				<div id="validateTips" class="alert validateTips green_succ" role='alert' style="display: none;"></div>
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Wedding<span> animations</span></h2>
				<p><span><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></span></p>
				</div>
					<div class="col-md-9 contact-left">
					<div class="contact-bottom">
							<div><p>
								<span class='sub_head'>Select your favourite animation:</span> 
								<div class="field">{$glb_wed_animations}</div> 
							</p></div>

							<p>
							<div class="img_preview" id="img_preview">
									<img src="{$glb_site_url}images/{$user_imgid}.jpg">
							</div>
							</p>

							{if $blockpage neq '1'}
							<div class="contact-bottom">
			  				<div><p>
							<button id="butt_create_add_ani" class='button'>Add animation</button>&nbsp;
							<button id="butt_create_rem_ani" class='button'>Remove animation</button>
							</p></div></div>{/if}

					</div>
					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>