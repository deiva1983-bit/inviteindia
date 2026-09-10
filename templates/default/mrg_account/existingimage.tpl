<div class="contact" id="edit-pers-ownimage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Add your own background images</span></h3>
		<form name='bgtheme' method='post' action='classic_theme.php?wed_id={$user_wedid}'>
		<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Add your<span> own background image</span></h2>
				<p><span><i class="fa fa-picture-o" aria-hidden="true"></i></span></p>
				</div>
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
				<div id="links_green" class="validateTips" style='padding-bottom: 5px;'></div>
					<div class="contact-bottom">
					<h3 class="sub_head">{if $page_name eq 1}All wedding pages {elseif $page_name eq 2}Wedding home page{elseif $page_name eq 3}Wedding event page{elseif $page_name eq 4}Guestbook page{elseif $page_name eq 5}Find location page{/if} - Select background images</h3>

						<div class="demo" style='text-align: right;'>
						<a href='' id="select_pages_top" name="{$user_wedid}" value="selectpages" class="button">Select another pages</a>
						<div>&nbsp;</div>
						</div>
						{if $selectimage_count neq 0}
							{foreach from=$glb_image_deails key=k item=v}
								<p style='padding-top: 10px;'>
								<div><img src='images/classic_bg/{$v.image_path}.jpg' style='width: 700px;' /></div>
								<div style='text-align: center; padding-top: 15px; padding-right: 20px;'><a href='classic_theme.php?wed_id={$user_wedid}&upload_img=old_page&page_name={$page_name}&img_id={$v.image_id}&do=imgup'>Select Me! &nbsp;&nbsp;</a></div>
								</p>
							{/foreach}
						{/if}
						
						<div class="demo" style='text-align: right;'>
						<a href='' id="select_pages_bott" name="{$user_wedid}" value="selectpages" class="button">Select another pages</a>
						</div>
						<div>&nbsp;</div>


					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>