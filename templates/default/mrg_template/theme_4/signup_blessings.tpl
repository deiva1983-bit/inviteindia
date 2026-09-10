<div id="center_content">	
    <div class="center_top_bg"></div>

<div class="center_bg">
		<div class="home_left_content" id="signup">
			<p>
			<h1  style="text-align: center;"><span id='pageheddings'>{$tpl_guestbook_title}</span></h1>
			{$smt_reception_date} <br />
			{$smt_reception_location}
			</p>


			<div id="validateBlessing" class="validateBlessing"></div>
			<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
			<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
			<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
			<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
			<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
			<table border="0" width="703px">
			<tr><td style="width:490px;">
				<p>
				<div id="wish-form">
				<label class="small">{$tpl_signup_name} *</label>
				<input type="text" name="guest_name" id="guest_name" value="" class="large_input"  style="width: 250px;"/>
				</div>
				</p>

				<p>
				<div id="wish-form">
				<label class="small">{$tpl_signup_email} *</label>
				<input type="text" name="guest_email" id="guest_email" value="" class="large_input" style="width: 250px;"/>
				</div>
				</p>
				<p>
				<div id="wish-form">
				<label class="small">{$tpl_signup_loc}</label>
				<input type="text" name="guest_loc" id="guest_loc" value="" class="large_input" style="width: 250px;"/>
				</div>
				</p>
				
				<p>
				<div id="wish-form">
				<label class="small">{$tpl_signup_wish} *</label>
				<textarea name="guest_msg" id="guest_msg" style="width: 250px; height: 169px;" class="large_input"></textarea>
				</div>
				</p>
				</td>
				
				<td style="width:300px;">
						<div id="wish-form">
						<label style="width: 200px;" class="small">{$tpl_signup_samplewishes}</label>
						</div>
						<div class="numbers_box" style=" float: left;   height: 266px;   overflow: scroll;  width: 331px;">
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
						<table border="0" width="100%">
						<tr><td>
						<p>
						<div id="wish-form">
						<label style="width: 200px;" class="small">{$tpl_signup_gift}</label>
						<div id="blessimg" style="float:left; margin:6px;"> <img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>
						</div>
						</p>
						</td></tr>
						
						<tr><td>
						<p>
						<div id="wish-form">
						<label style="width: 180px;" class="small">{$tpl_signup_giftitems}</label>
						<div style="width:500px; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div>
						</div>
						</p>
						</td></tr>
						</table>
						
						
						<p>
						 
						<div id="wish-form">
							<input type="submit" id="msg_login" class="fourthsubmit" value="Post" />
							<input type="reset" id="butt_clear" class="fourthsubmit" value="Clear" />
						</div>
						</p>
	          </div>            
        <div class="clear"></div>  
    </div>
    <div class="center_bottom_bg"></div>  
    </div>  
            
  <div id="footer" align="center" style="padding-top: 10px;">{include file="default/mrg_template/footer_links.tpl"}
    </div>



</div>
</body>
</html>