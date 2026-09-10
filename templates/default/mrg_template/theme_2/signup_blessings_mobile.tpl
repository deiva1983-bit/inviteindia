<div class="wrapper" id="signup">
		<div id="content" style='width: 100%;'><h2 id="pageheddings" style="text-align: center;">{$tpl_guestbook_title}</h2>
				<div class="inner_copy"></div>
						<div id="validateBlessing" class="validateBlessing"></div>
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
						<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
						<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />

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
							<div class=	"col-md-12"><input type="submit" id="msg_login" class="input_button" value="Post" />
							<input type="submit" id="butt_clear" class="input_button" value="Clear" /></div>
						</div>





						<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
		</div>
 
            
		 
		 
<!-- footer -->
		<div id="footer">
			<div id="rings">{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;</div>
		</div>
	</body>
	</html>