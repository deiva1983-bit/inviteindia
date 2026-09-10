<div class="wrapper" id="signup">
		<div id="content" style='width: 100%;'><h2 id="pageheddings" style="text-align: center;">{$tpl_guestbook_title}</h2>
				<div class="inner_copy"></div>
						<div id="validateBlessing" class="validateBlessing"></div>
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
                        <input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
                        <input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						
						<table border="0" width="100%">
						<tr>
						<td style="width:50%;">
							<div id="wish-form">
							    <label>{$tpl_signup_name} *</label>
							    <input type="text" name="guest_name" id="guest_name" value="" class="input_txt_box" />
							</div>
							<div id="wish-form">
							    <label>{$tpl_signup_email} *</label>
							    <input type="text" name="guest_email" id="guest_email" value="" class="input_txt_box" />							
							</div>
							
							<div id="wish-form">
							<label>{$tpl_signup_loc}</label>
							<input type="text" name="guest_loc" id="guest_loc" value="" class="input_txt_box" />
							</div>
							
							<div id="wish-form">
								<label>{$tpl_signup_wish} *</label>
								<textarea name="guest_msg" id="guest_msg" class="inputval"></textarea>
							</div>
						</td>
						<td style="width:50%; vertical-align: top;">
						<div id="wish-form">
								<h1 style="color: #A9A9A9;">{$tpl_signup_samplewishes}</h1>
								</div>
								<div class="numbers_box" style="float: left; height: 307px; overflow: scroll;">
									<div class="sms_tab_text">
										<ul>     
										<div style="display:inline" id="onelinersId">
											{$album_msgtmplates} 		
                                                 
											</div>		           
										</ul>
									</div>
								</div>
						</td>
						</tr>
						</table>
						<div id="wish-form">
						<label>{$tpl_signup_gift}</label>
						<div id="blessimg" style="float:left; margin:6px;"> <img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>											
						</div>
							<div id="wish-form">
						<label style="width: 100px;">{$tpl_signup_giftitems}</label>
							<div style="width:100%; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div>
						</div>
						<div>
							<input type="submit" id="msg_login" class="fourthsubmit" value="Post" />
							<input type="reset" id="butt_clear" class="fourthsubmit" value="Clear" />
		                                </div>
						<div class="h-divider"></div>

					       <div class="listwishes" id="listwishes">
						 {$msgdetails_tpl}
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