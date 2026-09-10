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
						
						<table border="0" width="900px">
						<tr><td style="width:650px;">
						
						<div id="wish-form">
						<label>{$tpl_signup_name} *</label>
						<input type="text" name="guest_name" id="guest_name" value="" style="width: 500px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_email} *</label>
						<input type="text" name="guest_email" id="guest_email" value="" style="width: 500px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_loc}</label>
						<input type="text" name="guest_loc" id="guest_loc" value="" style="width: 500px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_wish} *</label>
						<textarea name="guest_msg" id="guest_msg" style="width: 500px;" class="inputval"></textarea>
						</div>
						</td>
						<td style="width:50px;">&nbsp;</td>
						<td style="width:300px;">
								<div id="wish-form">
								<label style="width: 200px;">{$tpl_signup_samplewishes}</label>
								</div>
								<div class="numbers_box" style=" float: left;   height: 300px;   overflow: scroll;  width: 350px;">
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
						<tr><td colspan="3" align="left">
							<table>
							<tr><td style="width: 300px !important;">{$tpl_signup_gift}</td>
							<td style="width:10px;">&nbsp;</td>
							<td style="width:75%;"><div id="blessimg" style="float:left; margin:6px;"><img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div></td>
							</tr>
							<tr><td style="width: 300px !important; ">{$tpl_signup_giftitems}</td>
							<td style="width:10px;">&nbsp;</td>
							<td><div style="overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div></td>
							</tr>
							</table>
						</td></tr>
						</table>
					</div><div>
						<div id="wish-form">
						<input type="submit" id="msg_login" class="fifthsubmit" value="Post" />
						<input type="reset" id="butt_clear" class="fifthsubmit" value="Clear" />                               
						</div> 
					</div>
			</div>

		</div>
</div></div>
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links.tpl"}	&nbsp;
	</div>
 </body>
 </html>


 