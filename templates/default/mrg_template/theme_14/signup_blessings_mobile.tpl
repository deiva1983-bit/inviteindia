<!-- banner-bottom --></div>
<div class="banner-bottom">
<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />


<!-- banner-bottom --></div>
<div class="banner-bottom">
<div class="bottom-header red_bg">
			<div class="lovestory_bottom_parallax lovestory_bottom_parallax_green">
				<div class="lovestory_bottom_bg" style="padding-top: 10px;">
					<h1 class="text-center animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$tpl_guestbook_title}</h1>
					<div class="devider_main text-center"><img src="{$glb_img_urls}images/devider-gray.jpg" alt=""></div>

					<div id="contact-form" data-animation="fadeInUp" data-animation-delay="700">
						<div id="validateBlessing" class="validateBlessing col-md-12"></div><br />
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
						<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
						<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						<div class="col-md-6"><input class="input_text" type="text" name="guest_name" id="guest_name" value="" placeholder="{$tpl_signup_name} *"></div>
						<div class="col-md-6"><input class="input_text" type="text" name="guest_email" id="guest_email" value="" placeholder="{$tpl_signup_email} *"></div>
						<div class="col-md-6"><input class="input_text" type="text" name="guest_loc" id="guest_loc" value="" placeholder="{$tpl_signup_loc}"></div>
						<div class="col-md-12"><textarea rows="3" cols="5" name="guest_msg" id="guest_msg" placeholder="{$tpl_signup_wish} *" class="textarea_text"></textarea></div>
						<div class="col-md-12"><input type="submit" id="msg_login" class="input_button" value="Post" />
						<input type="submit" id="butt_clear" class="input_button" value="Clear" /></div>
					</div>

				</div>
			</div>
</div>
</div></div>
<!-- //banner-bottom -->
	<div id="footer" class="red_bg">
	<div id='center_footer' class='center_footer' style='height: 90px;'></div></div>
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>