<div id="main-wrap">
	<div class="container">
		<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_guestbook_title}</span></h1>
			<div> 
					<div> 
						<div id="validateBlessing" class="validateBlessing"></div>
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
						<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
						<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						
						<div class="bottom-header contact-form" {if $isMobile eq 1} style="float: none;"{/if}>
								 <article class="lovestory_parallax" id="lovestory">
								    <div class="lovestory_bottom_parallax lovestory_bottom_parallax_green" id="email">
									<div class="lovestory_bottom_bg">
										<div id="contact-form" data-animation="fadeInUp" data-animation-delay="700">
											<div id="validateBlessing" class="validateBlessing" style="padding: 10px;"></div><div class="row" id="contact-loading">&nbsp;</div>
											<div class="col-md-6"><input class="cl_input_text" type="text" name="guest_name" id="guest_name" value="" placeholder="{$tpl_signup_name} *"></div>
											<div class="col-md-6"><input class="input_text" type="text" name="guest_email" id="guest_email" value="" placeholder="{$tpl_signup_email} *"></div>
											<div class="col-md-6"><input class="input_text" type="text" name="guest_loc" id="guest_loc" value="" placeholder="{$tpl_signup_loc}"></div>
											<div class="col-md-12" style="padding-right: 6px;"><textarea rows="3" cols="5" name="guest_msg" id="guest_msg" placeholder="{$tpl_signup_wish} *" class="textarea_text"></textarea></div>
											{if $isMobile neq 1}<div class="col-md-1">{$tpl_signup_gift}:</div><div class="col-md-9" id="blessimg"><img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>							
											<div class="col-md-12"><div style="width:99%; overflow:auto; height:150px; border:#626262 solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div></div>{/if}
											<div class="col-md-12" style="padding: 10px; text-align: center;"><input type="submit" id="msg_login" class="classic_button" value="Post" />
											<input type="submit" id="butt_clear" class="classic_button" value="Clear" /></div>
										</div>
									</div>
								    </div>
								</article>
						</div>
					</div><div>
					</div>
			</div>

		</div>
</div></div>
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
 </body>
 </html>


 