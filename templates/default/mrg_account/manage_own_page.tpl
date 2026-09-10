<div class="contact" id="edit-pers-ownpage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Own page</span></h3>
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
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own page</span></h2>
				<p><span><i class="fa fa-comments" aria-hidden="true"></i></span></p>
				</div>
				{if $blockpage eq '1'}<div class="alert validateTips" role='alert'>{$errors}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
				<div id="validateTips" class="alert validateTips" role='alert'></div>
					
					<p><div class="text-right"><em style="font-size: 12px;"><font color="red">You can create maximum 3 own pages.</font></em></div></p>
					<div class="contact-bottom">
							
								{if $ownpagestatus eq 0}
									<div class="alert validateTips ui-state-error" role='alert'>
										You're not yet created any pages for this invitation, you can create page with your own content/stories (Love stories, Wedding events, Family member details etc.)

									</div>
								    {else}
									<p>
									    <div class="field">
									    <h3>Select your page:</h3>
									    </div>
									</p>
								    
									<p>
									    <div class="field">
										{$wed_pages} 
									    </div>
									</p>
								    {/if}

									{if $ownpagestatus lt $ownpage_per_invitations}
									<div class="padding-top-adjust text-right">&nbsp;</div>
									<div class="padding-top-adjust text-right"><a href='ownpage_details.php?wed_id={$wed_acc_id}' class='button'>Create your page!</a></div>
									{/if}
							</p></div>

							
							

					
					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>