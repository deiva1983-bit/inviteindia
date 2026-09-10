<!-- banner-bottom --></div>
<div class="banner-bottom">
<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
{if $isMobile neq 1}
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
{/if}
					<div class="bottom-wrap"  style="width: 165%;" >
						<div class="bottom-grids">
							<div class="bottom-left">
								<div class="bottom-header contact-form" {if $isMobile eq 1} style="float: none;"{/if}>
									 	 <article class="lovestory_parallax" id="lovestory">
										    <div class="lovestory_bottom_parallax lovestory_bottom_parallax_green" id="email">
											<div class="lovestory_bottom_bg">
															<h1 class="text-center animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">Add my blessings</h1>
															
															<div id="contact-form" data-animation="fadeInUp" data-animation-delay="700">
																<div id="validateBlessing" class="validateBlessing" style="padding: 10px;"></div><div class="row" id="contact-loading">&nbsp;</div>
																<div class="col-md-6"><input class="input_text" type="text" name="guest_name" id="guest_name" value="" placeholder="{$tpl_signup_name} *"></div>
																<div class="col-md-6"><input class="input_text" type="text" name="guest_email" id="guest_email" value="" placeholder="{$tpl_signup_email} *"></div>
																<div class="col-md-6"><input class="input_text" type="text" name="guest_loc" id="guest_loc" value="" placeholder="{$tpl_signup_loc}"></div>
																<div class="col-md-12"><textarea rows="3" cols="5" name="guest_msg" id="guest_msg" placeholder="{$tpl_signup_wish} *" class="textarea_text"></textarea></div>
																{if $isMobile neq 1}<div class="col-md-1">{$tpl_signup_gift}:</div><div class="col-md-9" id="blessimg"><img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>							
																<div class="col-md-12"><div style="width:100%; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div></div>{/if}
																<div class="col-md-12"><input type="submit" id="msg_login" class="input_button" value="Post" />
																<input type="submit" id="butt_clear" class="input_button" value="Clear" /></div>
															</div>
											</div>
										    </div>
										</article>

								</div> 
								<div class="clearfix"></div>
					
					
					 <!--<div class="social-icons">
						<ul>
							<li>Created by inviteindia.com</li>
						</ul>
					</div> -->
				</div>				
			</div>
		</div>
{if $isMobile neq 1}</div></td>
			<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
			</table>{/if}
</div></div></div>
<!-- //banner-bottom -->
<!-- //banner-bottom -->
<!-- smooth scrolling -->
	{literal}<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script> {/literal}
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<div id="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

