{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script>
<script type="text/javascript" src="includes/scripts/userdefind/fetch_address.js"></script>
{/literal}
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>
<div class="contact" id="edit-pers-details">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Events update</span></h3>
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{if $page_status_events eq 'edit'} {$txt_req_lat_ceremony} {else} {$selectwedres_access_2[0].gmap_latitude} {/if}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{if $page_status_events eq 'edit'} {$txt_req_lng_ceremony} {else} {$selectwedres_access_2[0].gmap_longitude} {/if}' />
		<input type='hidden' name='lat_reception' id='lat_reception' value='{if  $page_status_events eq 'edit'} {$txt_req_lat_reception} {else} {$selectwedres_access_2[0].gmap_lat_reception} {/if}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{if  $page_status_events eq 'edit'} {$txt_req_lng_reception} {else} {$selectwedres_access_2[0].gmap_lng_reception} {/if}' />
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				{if $err_status eq 'show'}<div class="alert ui-state-error" role='alert'>{$err_req_msg}</div>{/if}
				{if $alert_msg neq ''}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
					<div id="validateTips" class="alert validateTips" role='alert'></div>
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Ceremony <span> informations</span></h2>
					<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></p>
					</div>
					<div><p>
					<label class='lab_black_color' style="width:200px;">Ceremony title:</label> 
					<input type="text" id="txt_wed_title" name="txt_wed_title" maxlength="30" autocomplete="off" value="{if $page_status_events eq 'edit'} {$txt_wed_title} {else} {$selectwedres_add_info[0].event_wed_title} {/if}" /> 
					</p></div>
					<div class="field"><span><em><font color="red">Example - Wedding party</font></em></span></div>
					<div class="field"><span><em><font color="red">If you dont want title, Just make it empty.</font></em></span></div>

					<div><p>
					<label class='lab_black_color' style="width:200px;">Ceremony Date & Address:</label> 
					<div><textarea style="height: 100px;" cols="65" id="txt_area_wed_location" name="txt_area_wed_location" rows="15">{if $page_status_events eq 'edit'} {$txt_area_wed_loc} {else} {$selectwedres_access_2[0].marriage_location} {/if}</textarea></div>
					</p></div>
					<div class="field"><span style="cursor:pointer" id='show_weddate_help'><em><font color="red">Click here - Example</font></em></span></div>
					<div class="field"><span><em><font color="red">Complete address details, Landmark, Nearest restaurants, Travel facilities etc,.</font></em></span></div>

					<div><p>
					<label class='lab_black_color' style="width:200px;">Postcode:</label> 
					<input type="text" id="addr_postcode" name="addr_postcode" class="inputval" value='{if $page_status_events eq 'edit'} {$txt_req_addr_postcode} {else} {$selectwedres_access_2[0].wedding_postalcode} {/if}'/> <button class='button' id='updateMap'>Map it!</button>   
					</p></div>

					<div><p><table><tr><td>
					<label class='lab_black_color' style="width:200px;">Ceremony location:</label></td>
					<td><div id="map_ceremony" style="width: 300px; height: 300px;"></div></td></tr>
					<tr><td></td><td><input type="checkbox" name="map_wedding_status" id="map_wedding_status" value="1" {if $page_status_events eq 'edit'} {if $txt_req_map_wedding_status eq '1'} checked {/if} {else} {if $selectwedres_access_2[0].wedding_map_on_event_page eq '1'} checked {/if} {/if}>Yes, Display the map in event page.</td></tr></table>
					</p></div>

					<div class="w3layouts_header">
					<h2 class="sub_head_max">Reception<span> informations</span></h2>
					<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></p>
					</div>
					<p>
					<div class="field">
					<label style="width:220px;" class='lab_black_color'>Reception title:</label>
					<div><input type="text" id="txt_rec_title" name="txt_rec_title" maxlength="30" autocomplete="off" value="{if $page_status_events eq 'edit'} {$txt_rec_title} {else} {$selectwedres_add_info[0].event_rec_title} {/if}" />
					</div>
					<div class="field"><span><em><font color="red">Example - Reception</font></em></span></div>
					<div class="field"><span><em><font color="red">If you dont want title, Just make it empty.</font></em></span></div>
					</div>
					</p>

					<p>
					<div class="field"  id="rec_address_infos">
					<label style="width:220px;" class='lab_black_color'>Reception Date & Address:</label>
					<div><textarea id="txt_area_rec_location" rows="15" style="height: 100px;" cols="65" name="txt_area_rec_location">{if  $page_status_events eq 'edit'} {$txt_area_rec_loc} {else} {$selectwedres_access_2[0].reception_location} {/if}</textarea>
					</div>
					<div class="field"><span style="cursor:pointer" id='show_rec_help'><em><font color="red">Click here - Example</font></em></span></div>
					<div class="field"><span><em><font color="red">Complete address details, Landmark, Nearest restaurants, Travel facilities etc,.</font></em></span></div>
					</p>

					<p>
					<div class="field">
					<label style="width:220px;" class='lab_black_color'>Postcode:</label>
						<div><input type="text" id="addr_postcode_reception" name="addr_postcode_reception" maxlength="30" autocomplete="off" value='{if  $page_status_events eq 'edit'} {$txt_req_addr_postcode_reception} {else} {$selectwedres_access_2[0].reception_postalcode} {/if}' /><button class='button' id='updateMap_reception'>Map it!</button></div>
					</div>
					</p>

					<div><p><table><tr><td>
					<label class='lab_black_color' style="width:200px;">Reception location:</label></td>
					<td><div id="map_reception" style="width: 300px; height: 300px;"></div></td></tr>
					<tr><td></td><td><input type="checkbox" name="map_rec_status" id="map_rec_status" value="1" {if $page_status_events eq 'edit'} {if $txt_req_map_rec_status eq '1'} checked {/if} {else} {if $selectwedres_access_2[0].reception_map_on_event_page eq '1'} checked {/if} {/if} >Yes, Display the map in event page.</td></tr></table>
					</p></div>

					<p>
					<div class="field">
					<label style="width:220px;" class='lab_black_color'>Wedding/Reception Date:</label>
						<div><input type="text" id="weddate" name="weddate" class="tcal" maxlength="30" autocomplete="off" value="{if  $page_status_events eq 'edit'} {$weddate_only} {else} {$selectwedres_access_2[0].marriage_date_only} {/if}" /></div>
					</div>
					<div class="field"><span><em><font color="red">For validating purpose, We need your exact  wedding/reception date.</font></em></span></div>
					</p>

					<p>
							<div class="demo">
							<input id="butt_create_web_invit_step2" name="butt_create_web_invit_step2" value="Submit" type="submit" class="button"/>
							<dd>&nbsp;</dd> 
							</div>
							</p>
			 </div>	
		<div class="clearfix"> </div>
		</div>
		</form>
	</div>
</div>