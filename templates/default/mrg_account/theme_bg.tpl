<div class="contact" id="edit-pers-ownimage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Add your own background images</span></h3>
		<form name='bgtheme' id='bgtheme' method='post' action='classic_theme.php?wed_id={$user_wedid}'>
		<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
		<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
		<input type="hidden" name="wed_id" id="wed_id" value="{$user_wedid}" />

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
					<h3 class="sub_head">Select your pages:</h3>
					<div class="contact-bottom">
                                                    <div>
                                                        <ul>
                                                            <li style='height: 50px;'  >
                                                                    <input type='radio' name='page_name' value='1' id='1' checked=checked>
                                                                    <label for='1' style='width: 234px;'  class='lab_black_color'>Complete invitations(All pages):</label> {if $gbp_classic_all_page neq '0'}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_all_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_all_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=all'> Remove image</a><span>{/if}</li>
                                                            <li>&nbsp;</li>
                                                         </ul>
                                                    </div>
					</div>
					<h3 class="sub_head">Selete separte pages:</h3>
					<div class="contact-bottom">
							<ul><li><input type='radio' name='page_name' value='2' id='2'><label for='2'>&nbsp;Wedding home page</label> {if $gbp_classic_home_page neq '0'}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_home_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_home_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=hp'> Remove image</a><span>{/if}</li>
								<li>&nbsp;</li>

                                                            <li style='height: 50px;'><input type='radio' name='page_name' value='3' id='3'><label for='3'>&nbsp;Event page</label>{if $gbp_classic_events_page neq '0' && $gbp_classic_events_page neq ''}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_events_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_events_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=ev'> Remove image</a><span>{/if}</li>

                                                            <li style='height: 50px;'><input type='radio' name='page_name' value='4' id='4'><label for='4'>&nbsp;Guestbook page</label>{if $gbp_classic_gbook_page neq '0' && $gbp_classic_gbook_page neq ''}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_gbook_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_gbook_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=gb'> Remove image</a><span>{/if}</li>

                                                            <li style='height: 50px;'><input type='radio' name='page_name' value='5' id='5'><label for='5'>&nbsp;Find Location page</label>{if $gbp_classic_findloc_page neq '0' && $gbp_classic_findloc_page neq ''}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_findloc_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_findloc_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=fl'> Remove image</a><span>{/if}</li>

                                                            <li style='height: 50px;'><input type='radio' name='page_name' value='6' id='6'><label for='6'>&nbsp;Wedding albums</label>{if $gbp_classic_alb_page neq '0' && $gbp_classic_alb_page neq ''}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_alb_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_alb_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=alb'> Remove image</a><span>{/if}</li>

                                                            <li style='height: 50px;'><input type='radio' name='page_name' value='7' id='7'><label for='7'>&nbsp;Wedding own pages</label>{if $gbp_classic_own_page neq '0' && $gbp_classic_own_page neq ''}&nbsp; <span><a href="images/classic_bg/{$gbp_classic_own_page}.jpg" class="preview" onclick='return false;'><img src="images/classic_bg/{$gbp_classic_own_page}.jpg" alt="gallery thumbnail" style='width: 50px;'/></a>&nbsp;&nbsp;&nbsp; <a href='changebg.php?wed_id={$user_wedid}&do=rembg&type=n&rid=own'> Remove image</a><span>{/if}</li>

                                                         </ul>

					<div>
					<button id="add_own_page" name="add_own_page" value="own_page" class="button" >Add your own image</button>
					<button id="upload_img" name="upload_img" value="old_page" class="button">Update image from InviteIndia.com</button>
					</div>
					</div>

		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>