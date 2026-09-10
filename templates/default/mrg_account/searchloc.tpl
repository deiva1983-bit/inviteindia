<div class="contact" id="edit-pers-animation">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Wedding locations</span></h3>
		{if $glb_from_src eq '1'}<div style='padding: 10px;'><span style='float: left;'><a href="#" id="skip_later">Skip, May be Later</a></span> <span style='float: right;'><a href="#" id="add_add_animations">Add wedding animations >> Next</a></div>{/if}
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Wedding<span> animations</span></h2>
				<p><span><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></span></p>
				</div>

				<div class="alert green_succ" role='alert'>Update your wedding location with Google MAP. It may be useful for your friends to identity wedding locations.</div>
				<div class="alert validateTips" role='alert'>find the latitude and longitude of a point <strong>Click</strong> on the map, <strong>Drag</strong> the marker, or enter your address.</div>
				{if $lbl_show_notify eq '0'}<div class="alert validateTips" role='alert'>Please update your wedding location. It will be display your wedding invitations</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
				<div id="validateTips" class="alert validateTips" role='alert'></div>
					<div class="col-md-9 contact-left">
						<div class="contact-bottom">
							<div>
								<table align="center"  cellspacing="0" cellpadding="0" width="100%">
								<tr>
									<td class="align-text-top" style="vertical-align: top;">
									    <form id="gsearch" name="gsearch" class="form_cls" onsubmit="showAddress(this.address.value); return false;">	
									    <div class="demo">
									    <label>Address:</label><input type="text" name="address" id="address" style="width:300px; height: 28px;" class="inputval" value="Chennai, Tamilnadu, India.">
									    <button type="submit" value="Go" class='button'>Go</button>				
									    </div>
									    </form>
									</td>
									<td class="align-text-top" style="vertical-align: top;">
										<input type="hidden" value="{$glb_wed_id}" name="glb_wed_id" id="glb_wed_id" class="inputval">
									    <input type="hidden" value="{$glb_site_url}" name="glb_site_url" id="glb_site_url" class="inputval">
									    <div id="validateTipsGmap"> 
									    </div>
									    <div>
									    <label style="width:120px;">Latitude:</label> 
									    <input type="text" value="{$lbl_latitude}" name="lat" id="latbox" class="inputval">
									    </div>
									    <div>
									    <label style="width:120px;">Longitude:</label> 
									    <input type="text" value="{$lbl_longitude}" name="lon" id="lonbox" class="inputval" >
									    </div>
									    <div class="demo">
									    <button type="button" id="save_coordinates" class='button'>Save Location</button>
									    <button type="button" id="reset_marker" class='button'>Clear</button>
									    </div>
									</td>
								</tr> 
								</table>
							</div>
							<div>&nbsp;</div>
							<div id="map" style="height: 450px; padding: 10px;" ></div><div>&nbsp;</div>
						</div>

					</div>
		<div class="clearfix"> </div>
		</div>

	</div>
</div>