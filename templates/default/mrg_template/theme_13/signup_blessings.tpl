<div id="wrapper">
		<div id="page-wrap">
			<div id="header" style='display: none;'> 
				<h1 style="text-align: center; padding-top: 30px;">
					<div><span id='homepageheddings'>{$glb_male_name}</span><span id='homepageheddings'>&nbsp;&amp;&nbsp;</span><span id='homepageheddings'>{$glb_female_name}</span></div>
					<div style='padding-top: 10px;'><span id='pageheddings'>{$glb_marriage_date_title}</span></div>
			</h1></div> <!-- header -->

			<div id="content-wrapper" style='padding-top: 20px;'>
				<div id="content">
					<div id="wsite-content" class="wsite-elements wsite-not-footer">
					<div>
					<p><h1 style="text-align: center;"><span id='pageheddings'>{$tpl_guestbook_title}</span></h1></p>
					<div class="paragraph" style="text-align:left;">
						<div id="validateBlessing" class="validateBlessing"></div>
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
						<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
						<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						
						<table border="0" width="700px">
						<tr><td style="width:450px;">
						
						<div id="wish-form">
						<label>{$tpl_signup_name} *</label>
						<input type="text" name="guest_name" id="guest_name" value="" style="width: 300px;" class='inputval'/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_email} *</label>
						<input type="text" name="guest_email" id="guest_email" value="" style="width: 300px;" class='inputval'/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_loc}</label>
						<input type="text" name="guest_loc" id="guest_loc" value="" style="width: 300px;" class='inputval'/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_wish} *</label>
						<textarea name="guest_msg" id="guest_msg" style="width: 300px; height: 85px;" class="inputval"></textarea>
						</div>
						</td>
						<td style="width:50px;">&nbsp;</td>
						<td style="width:300px;">
								<div id="wish-form">
								<label style="width: 200px;">{$tpl_signup_samplewishes}</label>
								</div>
								<div class="numbers_box" style=" float: left;   height: 300px;   overflow: scroll;  width: 350px;" >
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
						<label style='display: none;'>{$tpl_signup_gift}</label>
						<div id="blessimg" style="float:left; margin:6px;"> <img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" ></div>
						</div>
						<div id="wish-form">
						<label style='display: none;'>{$tpl_signup_giftitems}</label></div><div id="wish-form">
							<div style="width:100%; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}
							</div>
						</div>
						
						<div id="wish-form">
						<input type="submit" id="msg_login" class="inputval" value="Post" />
						<input type="reset" id="butt_clear" class="inputval" value="Clear" />                               
						</div>
					</div>
					</div>
					</div>
					
					

				</div>
		</div> <!-- content wrapper -->
	</div> <!-- Page wrap --><br />

			<div id="footer">
				<div id="footer-content">
					<script type="text/javascript">expandedFooterController.initialize();</script>
				<div>
			</div>
</div> <!-- wrapper -->
{include file="default/mrg_template/footer_links.tpl"}
</div> <!-- body-wrap --></body></html>
