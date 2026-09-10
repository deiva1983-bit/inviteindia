<!-- content --><h2 style="text-align: center;"><span id='pageheddings'>{$tpl_guestbook_title}</span></h2>
		<section id="content">
			<article class="col1">
			<form id="ContactForm" action="#" onsubmit='return false;'>			
			<div id="validateBlessing" class="validateBlessing"></div> <br />
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
                        <input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
                        <input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						
						<table border="0" width="700px">
						<tr><td style="width:450px;">					
						
						<div id="wish-form">
						<label>{$tpl_signup_name} *</label>
						<input type="text" class="inputval" name="guest_name" id="guest_name" style="width: 500px;"/>
						</div>

						<div id="wish-form">
						<label>{$tpl_signup_email} *</label>
						<input type="text" class="inputval" name="guest_email" id="guest_email" style="width: 500px;"/>
						</div>

						<div id="wish-form">
						<label>{$tpl_signup_loc}</label>
						<input type="text" class="inputval" name="guest_loc" id="guest_loc" style="width: 500px;"/>
						</div>
						
						<div id="wish-form">
						<label>{$tpl_signup_wish} *</label>
						<textarea name="guest_msg" id="guest_msg" style="width: 500px; height:150px;" class="inputval"></textarea>
						</div>

						</td>
						<td style="width:350px;">
						<div id="wish-form">
								<label style="width: 200px; padding: 10px;"><span id="pageheddings" style="font-size: 31px;">{$tpl_signup_samplewishes}</span></label>
								</div>
								<div class="numbers_box" style=" float: left;   height: 271px;   overflow: scroll;  width: 358px;">
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
						<table border="1" width="870px;">
						<tr><td style="width: 20%;" valign="top">{$tpl_signup_gift}</td><td style="width: 80%;"><div id="blessimg" style="float:left; margin:6px;"><img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" /></div></td></tr>						
						</td></tr>
						<tr><td style="width: 120px;" valign="top">{$tpl_signup_giftitems}</td><td style="width: 720px;">
						<div style="overflow:auto; height:150px; width: 100%;" class="inputval"> {$album_giftdetails}</div>
						</td></tr>						
						</table>						
						<div>														
							<a  style="cursor:pointer;" class="button" id="msg_login">Submit</a>
							<a  style="cursor:pointer;" class="button" id="butt_clear">Clear</a>
		                </div>
						<div class="h-divider"></div> 
					</form>
	   		</article>
			 
		</section>
<!-- / content -->
	</div>
	<div class="block">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
</div>  
</body>
</html>  
 