<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article"><div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">

<div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%; text-align: center;">
    <h1 id='pageheddings'>{$tpl_guestbook_title}</h1>
    </div>
</div>

    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
	<div style="padding:30px">
		<div>
		<div id="validateBlessing" class="validateBlessing"></div>
			 <table border="0px;" width="100%">
						<tr><td style="width:50%;">
						
						<div id="wish-form">
						<label>{$tpl_signup_name} *</label>
						<input type="text" name="guest_name" id="guest_name" value="" style="width: 350px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_email} *</label>
						<input type="text" name="guest_email" id="guest_email" value="" style="width: 350px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_loc}</label>
						<input type="text" name="guest_loc" id="guest_loc" value="" style="width: 350px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_wish} *</label>
						<textarea name="guest_msg" id="guest_msg" style="width: 350px; height: 120px;" class="inputval"></textarea>
						</div>
						</td>
						<td style="width:50%;">
								<div id="wish-form">
								<label><h2 style='font-weight: bold;'>{$tpl_signup_samplewishes}</h2></label>
								</div>
								<div class="numbers_box" style=" float: left;   height: 360px;   overflow: scroll;">
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
						<tr><td colspan="3" align="left"><div id="wish-form">
							<table>
							<tr><td><label>{$tpl_signup_gift}</label></td>
							<td style="width:10px;">&nbsp;</td>
							<td style="width:75%;"><div id="blessimg" style="float:left; margin:6px;"><img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div></td>
							</tr>
							<tr><td><label>{$tpl_signup_giftitems}</label></td>
							<td style="width:10px;">&nbsp;</td>
							<td><div style="overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div></td>
							</tr>
							</table></div>
						</td></tr>
						</table>

						<div id="wish-form">
						<input type="submit" id="msg_login" class="art-button" value="Post" />
						<input type="reset" id="butt_clear" class="art-button" value="Clear" />                               
						</div> 
		</div>
	</div>
    </div>
    </div>
</div>

 
</div>
</article></div>
                    </div>
                </div>
            </div>
    </div>



<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</div>
</div>
</body></html>