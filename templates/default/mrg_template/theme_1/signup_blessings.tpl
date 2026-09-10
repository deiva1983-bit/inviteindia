<div>			
		<div class="content centr">
			<h1  style="text-align: center;"><span id='pageheddings'>{$tpl_guestbook_title}</span></h1>
						<div id="validateBlessing" class="validateBlessing"></div>
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
                        <input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
                        <input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						
						<table border="0" width="650px">
						<tr><td style="width:400px;">
						
						<div id="wish-form">
						<label style="width: 300px;">{$tpl_signup_name} *</label>
						<input type="text" name="guest_name" id="guest_name" value="" style="width: 290px;"/>
						</div>
						
						<div id="wish-form">
						<label style="width: 300px;">{$tpl_signup_email} *</label>
						<input type="text" name="guest_email" id="guest_email" value="" style="width: 290px;"/>
						</div>
						
						<div id="wish-form">
						<label style="width: 300px;">{$tpl_signup_loc}</label>
						<input type="text" name="guest_loc" id="guest_loc" value="" style="width: 290px;"/>
						</div>
						
						<div id="wish-form">
						<label style="width: 300px;">{$tpl_signup_wish} *</label>
						<textarea name="guest_msg" id="guest_msg" style="width: 290px;" class="inputval"></textarea>
						</div>
						</td>
						<td style="width:300px; vertical-align: top;">
								<div id="wish-form">
								<label style="width: 220px;"><h1>{$tpl_signup_samplewishes}</h1></label>
								</div>
								<div class="numbers_box" style=" float: left;   height: 324px;   overflow: scroll;  width: 320px;">
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
						<label style="width: 300px;">{$tpl_signup_gift}</label>
						<div id="blessimg" style="float:left; margin:6px;"> <img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>											
						</div>						
							<div id="wish-form">
						<label style="width: 150px;">{$tpl_signup_giftitems}</label>				
							<div style="width:70%; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div>
						</div>
						
						<div id="wish-form1">
						<input type="submit" id="msg_login" class="fifthsubmit" value="Post" />
						<input type="reset" id="butt_clear" class="fifthsubmit" value="Clear" />                               
						</div> 
						
                </div>

		<div class="clearer"><span></span></div>

	</div>

	<div class="footer">
            {include file="default/mrg_template/footer_links_latest.tpl"}<br />
	</div>

</div>

</body>

</html>