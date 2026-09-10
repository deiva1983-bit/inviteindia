<div class="contact" id="edit-music">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Wedding music</span></h3>
		<form name='wed_music' id='wed_music' method='post' action='wedding_music.php?wed_id={$user_wedid}&do=addmusic' enctype="multipart/form-data" onsubmit='return false;'>
			<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
			<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
			<input type="hidden" name="theme_id" id="theme_id" value="{$user_wedid}" />
			<input type="hidden" name="music_id" id="music_id" value="{$user_wedid}" />
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own page</span></h2>
				<p><span><i class="fa fa-music" aria-hidden="true"></i></span></p>
				</div>
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $glb_err_msg eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$glb_txt_msg}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>Your own music has successfully uploaded. Please click "Add Music" Button to add your invitations.</div>{/if}
				<div class="validateTips alert green_succ" role='alert' style="display: none;"></div>
				<div class="contact-bottom">
				<div><h3 class="sub_head">Select your music:</h3></div>
				<div>{$glb_wed_musics}</div>

				<div style='padding-top: 10px; padding-bottom: 10px;'>
                                                    <span style='{$glb_add_music_sts}' id='own_music_sec'>
                                                        <h3  class="sub_head">Add your music:</h3>
                                                        <div class="field">
                                                        {$glb_wed_music_own} 
                                                        </div>
                                                        <div class="field">
                                                        <label style="width:200px;" class='lab_black_color'>Upload your music:</label> 
					                                    <input type="file" name="uploaded_music" id="uploaded_music" class="inputval"/>
					                                    </div>
                                                        <div class="field"><button id="butt_create_own_music" value='upmu' class="button">Upload music</button>
                                                        </div>
                                                    </span></div>
                                                    <div>
                                                        <button id="butt_play_music" class="button">Play</button>
                                                        {if $blockpage neq '1'}<button id="butt_create_add_music" class="button">Add music</button>
                                                        <button id="butt_create_rem_music" class="button">Remove</button>{/if} <button id="butt_add_own" class="button">Apply your own music</button>
                                                    </div><div>&nbsp;</div>
						    <div class="alert alert-info" role='alert'>The background music will play automatically on PC/Desktop systems.<br /><br /> But you have click play button manually on mobile versions (IPAD, IOS, and Android). </div>
					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>