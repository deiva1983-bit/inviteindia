<div style="clear:both"></div>
<div id="left-content">
	<p>
	<h2  style="text-align: center;"><span id='pageheddings'><font color="#682159">{$tpl_guestbook_title}</font></span></h2>
		<div id="validateBlessing" class="validateBlessing"></div>
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
                        <input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
                        <input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						
						<table border="0" width="100%">
						<tr><td style="width: 60%;">
						
						 <div id="wish-form">
						   <label class="label-names" style="width: 100px">{$tpl_signup_name} *</label>
						    <input type="text" name="guest_name" id="guest_name" value="" class="input_txt_box"  style="width: 350px;" />
						</div>
						<div id="wish-form">
						    <label style="width: 100px">{$tpl_signup_email} *</label>
						    <input type="text" name="guest_email" id="guest_email" value="" class="input_txt_box" style="width: 350px;"/>							
						</div>
						
						<div id="wish-form">
						<label style="width: 100px">{$tpl_signup_loc}</label>
						<input type="text" name="guest_loc" id="guest_loc" value="" class="input_txt_box" style="width: 350px;"/>
						</div>
						
						<div id="wish-form">
							<label style="width: 100px">{$tpl_signup_wish} *</label>
							<textarea name="guest_msg" id="guest_msg" style="width: 350px;" class="inputval"></textarea>
						</div>
						</td>
						<td style="width: 50%;">
						<div id="wish-form">
								<label style="width: 200px;">{$tpl_signup_samplewishes}</label>
								</div>
								<div class="numbers_box" style=" float: left;   height: 417px;   overflow: scroll;">
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
						<label style="width: 136px">{$tpl_signup_gift}</label>
						<div id="blessimg" style="float:left; margin:6px;"> <img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>											
						</div>						
							<div id="wish-form" style="width: 100%;">
						<label style="width: 20%">{$tpl_signup_giftitems}</label>				
							<div style="width: 90%; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div>
						</div>
						<div id="wish-form">
							<input type="submit" id="msg_login" class="fourthsubmit" value="Post" style="width: 20%;"/>
							<input type="reset" id="butt_clear" class="fourthsubmit" value="Clear" style="width: 20%;"/>
		                                </div>
						<div class="h-divider"></div>

					       
	</p>


	 
</div>

<div style="clear:both"></div>
<!-- footer -->
	<div id="footer">
	<div>{include file="default/mrg_template/footer_links_latest.tpl"}</div>
	</div>
</div>
</div>
</body>
</html>