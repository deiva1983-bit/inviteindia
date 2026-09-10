<div class="content contentMid">
		<div class="contentMid1">
			<div class="contentMid2">

<div class="layout profileLayout">
	<div class="row row0 rowPath0 rowDepth0" id="row0">
		<div class="column column0 columnPath0_0 columnDepth1 firstColumn lastColumn" id="col0_0">
		<div class="columnEnd"></div>
		</div>
		<div class="rowEnd"></div>
	</div>
	<div class="row row1 rowPath1 rowDepth0" id="row1">
	<div class="column column1 columnPath1_1 columnDepth1 lastColumn" id="col1_1">
	<div class="module module5 columnModule2 odd blurbsModule" id="module10">
	<div class="moduleTop">
	<div>
	<div></div>
	</div>
	</div>
	<div class="moduleMid">
		<div class="moduleMid1">
			<div class="moduleMid2">
				<!-- <h3 class="moduleHead"><span>Blurbs</span></h3> -->
				<div class="moduleBody">
					<div class="autoResize blurbAboutMe">
						<h3 class="moduleHead" style='text-align: center;'><span id='pageheddings' >{$tpl_guestbook_title}</span></h3>
						<div style="margin-left: 20px;">
						<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
						<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
						<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
						<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
						<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
						<table border="0" width="700px" style="">
						<tr><td colspan="2"><div id="validateBlessing" class="validateBlessing">&nbsp;</div></td></tr>
						<tr>
							<td>
							<table border="0">						
							<tr>
								<td style="width:120px; padding-top: 10px;">{$tpl_signup_name} * </td>
								<td><input type="text" class="input" name="guest_name" id="guest_name" style="width: 280px;"/></td></tr>
							<tr>
								<td style="width:50px; padding-top: 10px;">{$tpl_signup_email} * </td>
								<td style="padding-top: 10px;"><input type="text" class="input" name="guest_email" id="guest_email" style="width: 280px;"/></td></tr>
							<tr>
								<td style="width:50px; padding-top: 10px;">{$tpl_signup_loc}</td>
								<td style="padding-top: 10px;"><input type="text" class="input" name="guest_loc" id="guest_loc" style="width: 280px;"/></td></tr> 
							<tr>
								<td style="width:50px; padding-top: 10px;">{$tpl_signup_wish}</td>
								<td style="padding-top: 10px;"><textarea name="guest_msg" id="guest_msg" style="width: 280px; height: 150px;" class="inputval"></textarea></td></tr>
							</table>
							 </td>
						<td style="width:440px; vertical-align: top;">
						<div id="wish-form">
						<label style="width: 200px;"><b><h3>{$tpl_signup_samplewishes}</h3></b></label>
						</div>
						<div class="numbers_box" style=" float: left;   height: 221px;   overflow: scroll;  width: 350px;">
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
						<table border="1" width="700px;">
						<tr><td style="width: 20%;" valign="top">{$tpl_signup_gift}</td><td style="width: 80%;"><div id="blessimg" style="float:left; margin:6px;"><img width=100 height=100 border=0 src="{$glb_site_url}templates/default/mrg_template/wedgifts/gift1.gif" /></div></td></tr>
						</td></tr>
						<tr><td style="width: 120px;" valign="top">{$tpl_signup_giftitems}</td><td style="width: 90%;">
						<div style="width:90%; overflow:auto; height:150px; border:#CCCCCC solid 1px; padding-bottom:5px;"> {$album_giftdetails}</div>
						</td></tr>
						</table>
						<div id="wish-form">
							<input type="submit" id="msg_login" class="fourthsubmit" value="Post" />
							<input type="reset" id="butt_clear" class="fourthsubmit" value="Clear" />
						</div>
						</div>
	 </div>
	<div class="moduleBodyEnd"></div>
	</div>
	</div>
	</div>
	</div>
	<div class="moduleBottom">
		<div>
			<div></div>
		</div>
	</div>
</div>

 

<div class="columnEnd"></div></div><div class="column column2 columnPath1_2 columnDepth1" id="col1_2"><div class="columnEnd"></div></div><div class="column column3 columnPath1_3 columnDepth1" id="col1_3"><div class="columnEnd"></div></div><div class="rowEnd"></div></div><div class="row row2 rowPath2 rowDepth0" id="row2"><div class="column column0 columnPath2_0 columnDepth1 firstColumn lastColumn" id="col2_0"><div class="columnEnd"></div></div><div class="rowEnd"></div></div></div></div></div>

</div><div class="contentBottom"><div><div></div></div></div>

	<div id="footer">
		<br>
		{include file="default/mrg_template/footer_links.tpl"}
		 
	</div>
</div>
<br>
 
  

</body></html>