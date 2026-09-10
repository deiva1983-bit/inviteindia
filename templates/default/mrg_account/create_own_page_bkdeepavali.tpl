{literal}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
<script src='http://asset4.momentville.com/v63/javascripts/nicEdit_packaged.gz.js' type='text/javascript'></script>
<script src='http://asset3.momentville.com/v63/javascripts/website_organizer_packaged.gz.js' type='text/javascript'></script>
{/literal}
 <!-- content -->
 <link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
 <link rel="stylesheet" type="text/css" href="includes/css/imss.css" />
  <div id="content" >
      <div class="container" >
      <div id='site_wrapper'>
      <div class="demo"><div style='float: right; padding: 10px;'><span><a id='managepage' href='managepage.php?wed_id={$tmplwedid}&do=b12d'>Manage own pages!</a></span>&nbsp;&nbsp;<span><a id='show_parah' class='show_parah'>Add new parah!</a></span></div></div>
      <div class="normal">
			<h3>Create your Own page</h3>
			{if $tpl_show_sts eq '1'}<p><div id="links_green" align="center"><b>{$tpl_succ_msg}</b></div></p>{/if}
			<p><p id="validateTips" class="validateTips"></p>
			<fieldset style='border: 0px;'>
				<p>
				<ul>
				{$errors}
				</ul>
				</p>
				<p> 
				<div id='site_content'>
				<input type='hidden' name='invite_id' id='invite_id' value="{$listid_tpl}" />
				<input type='hidden' name='wedid_tpl' id='wedid_tpl' value="{$tmplwedid}" />
				<br />
				<p class="validateTips_p1" id="links_red" align="right">We allowed maximum 3 parah's per pages.</p>
<p class="validateTips_p1" id="links_red" align="center"></p>
{if $parah_1 eq '1'}
	<div id='sortable_elements'>
		<div class='element' id='element_6853305'>
			<div class='element_buttons' id='el_btns_6853305'>
				<a class='toggle' data-id='el_s_6853305' title='Edit Element Settings'><img alt="Settings" height="20" src="images/settings_20.png" width="20" /></a>
				<a id='dele_p1' href='ownpage.php?wed_id={$tmplwedid}&do=kavied&list_id={$listid_tpl}&p1=d' data-id='element_6853305'  title='Delete This' onClick="return confirm('Are you absolutely sure you want to delete this parah?')"><img alt="Delete This" height="20" src="images/delete_20.png" width="20" /></a>
			</div>
			{if $tpl_parahtitle_status_p1 eq  1}<div class='element_header'>
				<h2>{$tpl_parahtitle_p1}</h2>
			</div>{/if}
			<div class='element_settings' id='el_s_6853305' style='display:none;'>
				<form method="post" name="settings_6853305">
					<div class='element_settings_inner'>
						<p>
						<a class='toggle' data-id='el_s_6853305' href='#'>Hide Settings</a>
						</p>
						
						<p>
						<label for="element_show_title">Show Title?</label>
						<input  id="element_show_title" class='show_title_p1' name='show_title_p1' type="checkbox" {if $tpl_parahtitle_status_p1 eq  1} checked="checked" {/if} />
						</p>
				
						<p>
						<label for="element_name">Title</label>
						<input id="title_p1" name="title_p1" size="30" type="text" value="{$tpl_parahtitle_p1}" />
						</p>

						<hr />
						Have the photo appear to the:
						<p>
						<label></label>
						<input id="float_left" name="img_align_p1"  type="radio" value="1" {if $tpl_image_align_p1 eq '1'} checked="checked" {/if}/>
						Left of the text
						
						<br />
						<label></label>
						<input id="float_right" name="img_align_p1"  type="radio" value="2" {if $tpl_image_align_p1 eq '2'} checked="checked" {/if}/>
						Right of the text
						
						<br />
						<label></label>
						<input id="no_img" name="img_align_p1" type="radio" value="3" {if $tpl_image_align_p1 eq '3'} checked="checked" {/if}/>
						No photos
						</p>
						
						<input type="hidden" name="hidd_setting_p1" value="sett_6853305">
						<p>
						<div class="demo"><input class="btn" id="btn_sett_p1" name="btn_sett_p1" type="submit" value="Update" /></div>
						</p>
						
					</div>
				</form>
			</div>
			
			<div class='element_body' id='element_body_6853305'>
				<div class='photo_and_text_body'>
					<div {if $tpl_image_align_p1 eq '1'} class='photo_float_left' {else if $tpl_image_align_p1 eq '2'} class='photo_float_right' {/if}  id='photo_float_1967685'>
						<div class='photo_wrapper'>
							{if $tpl_image_status_p1 eq 1}
							<div class='photo' id='p_body_img_1967685'>
								{if $tpl_image_src_p1_absolute neq ''}<img src="{$tpl_image_src_p1}" style='width: 150px;' />{else}<img src="images/proposal_1.jpg" style='width: 150px;' />{/if}
							</div>
							{/if}
							<div class='org_add_link'><a href="#" class="toggle" data-id="add_area_6853305">Update Photo</a></div>
							<div class='add_area' id='add_area_6853305' style='display: none;'>
								<form action="" enctype="multipart/form-data" method="post" name="add_photos_6853305">
									<input id="uploaded_image_6853305" name="uploaded_image_6853305" size="30" type="file" />
									<input type="hidden" name="hidd_photo_p1" value="ph_id_6853305">
									<input class="btn" name="add_image_6853305" id="add_image_6853305" type="submit" value="Upload" />
								</form>
							</div>
						</div>
						
						<div class='text_wrapper' {if $tpl_image_align_p1 eq '1'} style='margin-left: 210px' {else if $tpl_image_align_p1 eq '2'} style='margin-right: 210px' {/if}>
							<div class='in_place_rte'>
								<form action="" method="post" name="add_desc_p1">
									{if $tpl_parah_content neq ''}
										<div class="in_place_rte_text" id="info_body_48436311" name="desc_p1" title="Click to Edit">{$tpl_parah_content}</div>
										<input id="info_body_48436311_val" name="desc_p1" value="{$tpl_parah_content}" type="hidden" />
									{else}
										<div class='in_place_rte_text' id='info_body_48436311' name='desc_p1' title='Click to Edit'>Please enter your own texts.</div>
										<input id="info_body_48436311_val" name='desc_p1' type="hidden" value='Please enter your own texts.' />
									{/if}
									<div class='hidden_until_edit' style='display:none'>
										<p>
										<input type="hidden" name="hidd_desc_p1" value="desc_6853305">
										<div class="demo"><input class="save btn" name="add_preview_p1" id='add_preview_p1' type="submit" value="Preview" />
										<input class="cancel btn" name="commit" type="submit" value="Cancel" /></div>
										</p>
									</div>
									<div class="demo"><a name="add_desc_p1" id='add_desc_p1'>Save</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
		</div>
	</div>
{else}
	<div id='sortable_elements'>
		<div class='element' id='element_6853305'>
			<div class='element_buttons' id='el_btns_6853305'>
				<a class='toggle' data-id='el_s_6853305' title='Edit Element Settings'><img alt="Settings" height="20" src="images/settings_20.png" width="20" /></a>
			</div>
			<div class='element_header'>
				<h2>The Proposal</h2>
			</div>
			<div class='element_settings' id='el_s_6853305' style='display:none;'>
				<form method="post" name="settings_6853305">
					<div class='element_settings_inner'>
						<p>
						<a class='toggle' data-id='el_s_6853305' href='#'>Hide Settings</a>
						</p>
							
						<p>
						<label for="element_show_title">Show Title?</label>
						<input checked="checked" id="element_show_title" class='show_title_p1' name='show_title_p1' type="checkbox" />
						</p>

						<p>
						<label for="element_name">Title</label>
						<input id="title_p1" name="title_p1" size="30" type="text" value="The Proposal" />
						</p>

						<hr />
						Have the photo appear to the:
						<p>
						<label></label>
						<input id="float_left" name="img_align_p1"  type="radio" value="1" checked="checked"/>
						Left of the text

						<br />
						<label></label>
						<input id="float_right" name="img_align_p1"  type="radio" value="2" />
						Right of the text
						
						<br />
						<label></label>
						<input id="no_img" name="img_align_p1" type="radio" value="3" />
						No photos
						</p>
						
						<input type="hidden" name="hidd_setting_p1" value="sett_6853305">
						<p>
						<div class="demo"><input class="btn" id="btn_sett_p1"name="btn_sett_p1" type="submit" value="Update" /></div>
						</p>
						
					</div>
				</form>
			</div>
			
			<div class='element_body' id='element_body_6853305'>
				<div class='photo_and_text_body'>
					<div class='photo_float_left' id='photo_float_1967685'>
						<div class='photo_wrapper'>
							<div class='photo' id='p_body_img_1967685'>
								<img src="images/proposal_1.jpg" style='width: 150px;' />
							</div>
							<div class='org_add_link'><a href="#" class="toggle" data-id="add_area_6853305">Update Photo</a></div>
							<div class='add_area' id='add_area_6853305' style='display: none;'>
								<form action="" enctype="multipart/form-data" method="post" name="add_photos_6853305">
									<input id="uploaded_image_6853305" name="uploaded_image_6853305" size="30" type="file" />
									<input type="hidden" name="hidd_photo_p1" value="ph_id_6853305">
									<input class="btn" name="add_image_6853305" id="add_image_6853305" type="submit" value="Upload" />
								</form>
							</div>
						</div>
						
						<div class='text_wrapper' style='margin-left: 210px'>
							<div class='in_place_rte'>
								<form action="" method="post" name="add_desc_p1">
									<div class="in_place_rte_text" id="info_body_48436311" name="desc_p1" title="Click to Edit"><p><br />Click here to share your proposal story. You might want to add another text element so that both the bride and groom can give their own version of the event!. <br> You can add your own images for this sections. </p>&nbsp;
									</div>
									<input id="info_body_48436311_val" name="desc_p1" type="hidden" value="Click here to share your proposal story. You might want to add another text element so that both the bride and groom can give their own version of the event!. You can add your own images for this sections." />
									<div class='hidden_until_edit' style='display:none'>
										<p>
										<input type="hidden" name="hidd_desc_p1" value="desc_6853305">
										<div class="demo"><input class="save btn" name="add_preview_p1" id='add_preview_p1' type="submit" value="Preview" />
										<input class="cancel btn" name="commit" type="submit" value="Cancel" /></div>
										</p>
									</div>
									<!-- <input name="add_desc_p1" id='add_desc_p1' type="button" value="Save" /> -->
									<div class="demo"><a name="add_desc_p1" id='add_desc_p1'>Save</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
		</div>
	</div>
{/if}
<p>&nbsp;</p>
<p class="validateTips_p2" id="links_red" align="center"></p>
<div id='parah2_status' {if $parah_2 eq '0'} style='display: none;' {/if}>
<hr />
{if $parah_2 eq '1'}
	<div id='sortable_elements'>
		<div class='element' id='element_6853306'>
			<div class='element_buttons' id='el_btns_6853306'>
				<a class='toggle' data-id='el_s_6853306' title='Edit Element Settings'><img alt="Settings" height="20" src="images/settings_20.png" width="20" /></a>
				<a id='dele_p2' href='ownpage.php?wed_id={$tmplwedid}&do=kavied&list_id={$listid_tpl}&p2=d' data-id='element_6853306'  title='Delete This' onClick="return confirm('Are you absolutely sure you want to delete this parah?')"><img alt="Delete This" height="20" src="images/delete_20.png" width="20" /></a>

			</div>
			{if $tpl_parahtitle_status_p2 eq  1}<div class='element_header'>
				<h2>{$tpl_parahtitle_p2}</h2>
			</div>{/if}
			<div class='element_settings' id='el_s_6853306' style='display:none;'>
				<form method="post" name="settings_6853306">
					<div class='element_settings_inner'>
						<p>
						<a class='toggle' data-id='el_s_6853306' href='#'>Hide Settings</a>
						</p>
						
						<p>
						<label for="element_show_title">Show Title?</label>
						<input  id="element_show_title" class='show_title_p2' name='show_title_p2' type="checkbox" {if $tpl_parahtitle_status_p2 eq  1} checked="checked" {/if} />
						</p>
				
						<p>
						<label for="element_name">Title</label>
						<input id="title_p2" name="title_p2" size="30" type="text" value="{$tpl_parahtitle_p2}" />
						</p>

						<hr />
						Have the photo appear to the:
						<p>
						<label></label>
						<input id="float_left" name="img_align_p2"  type="radio" value="1" {if $tpl_image_align_p2 eq '1'} checked="checked" {/if}/>
						Left of the text
						
						<br />
						<label></label>
						<input id="float_right" name="img_align_p2"  type="radio" value="2" {if $tpl_image_align_p2 eq '2'} checked="checked" {/if}/>
						Right of the text
						
						<br />
						<label></label>
						<input id="no_img" name="img_align_p2" type="radio" value="3" {if $tpl_image_align_p2 eq '3'} checked="checked" {/if}/>
						No photos
						</p>
						
						<input type="hidden" name="hidd_setting_p2" value="sett_6853306">
						<p>
						<div class="demo"><input class="btn" id="btn_sett_p2" name="btn_sett_p2" type="submit" value="Update" /></div>
						</p>
						
					</div>
				</form>
			</div>
			
			<div class='element_body' id='element_body_6853306'>
				<div class='photo_and_text_body'>
					<div {if $tpl_image_align_p2 eq '1'} class='photo_float_left' {else if $tpl_image_align_p2 eq '2'} class='photo_float_right' {/if}  id='photo_float_1967685'>
						<div class='photo_wrapper'>
							{if $tpl_image_status_p2 eq 1}
							<div class='photo' id='p_body_img_1967685'>
								{if $tpl_image_src_p2_absolute neq ''}<img src="{$tpl_image_src_p2}" style='width: 150px;' />{else}<img src="images/family_1.jpg" style='width: 150px;' />{/if}
							</div>
							{/if}
							<div class='org_add_link'><a href="#" class="toggle" data-id="add_area_6853306">Update Photo</a></div>
							<div class='add_area' id='add_area_6853306' style='display: none;'>
								<form action="" enctype="multipart/form-data" method="post" name="add_photos_6853306">
									<input id="uploaded_image_6853306" name="uploaded_image_6853306" size="30" type="file" />
									<input type="hidden" name="hidd_photo_p2" value="ph_id_6853306">
									<input class="btn" name="add_image_6853306" id="add_image_6853306" type="submit" value="Upload" />
								</form>
							</div>
						</div>
						
						<div class='text_wrapper' {if $tpl_image_align_p2 eq '1'} style='margin-left: 210px' {else if $tpl_image_align_p2 eq '2'} style='margin-right: 210px' {/if}>
							<div class='in_place_rte'>
								<form action="" method="post" name="add_desc_p2">
									{if $tpl_parah_content_p2 neq ''}
										<div class="in_place_rte_text" id="info_body_p2" name="desc_p2"  title="Click to Edit">{$tpl_parah_content_p2}</div>
										<input id="info_body_p2_val" name="desc_p2"  value="{$tpl_parah_content_p2}" type="hidden">
									{else}
										<div class='in_place_rte_text' id='info_body_p2' name='desc_p2' title='Click to Edit'>Please enter your own texts.</div>
										<input id="info_body_p2_val" name='desc_p2' type="hidden" value='Please enter your own texts.' />
									{/if}
									<div class='hidden_until_edit' style='display:none'>
										<p>
										<input type="hidden" name="hidd_desc_p2" value="desc_6853306">
										<div class="demo"><input class="save btn" name="add_preview_p2" id='add_preview_p2' type="submit" value="Preview" />
										<input class="cancel btn" name="commit" type="submit" value="Cancel" /></div>
										</p>
									</div>
									<!-- <input name="add_desc_p2" id='add_desc_p2' type="button" value="Save" /> -->
									<div class="demo"><a name="add_desc_p2" id='add_desc_p2'>Save</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
		</div>
	</div>
{else}
	<div id='sortable_elements'>
		<div class='element' id='element_6853306'>
			<div class='element_buttons' id='el_btns_6853306'>
				<a class='toggle' data-id='el_s_6853306' title='Edit Element Settings'><img alt="Settings" height="20" src="images/settings_20.png" width="20" /></a>
			</div>
			<div class='element_header'>
				<h2>My Family</h2>
			</div>
			<div class='element_settings' id='el_s_6853306' style='display:none;'>
				<form method="post" name="settings_6853306">
					<div class='element_settings_inner'>
						<p>
						<a class='toggle' data-id='el_s_6853306' href='#'>Hide Settings</a>
						</p>
							
						<p>
						<label for="element_show_title">Show Title?</label>
						<input checked="checked" id="element_show_title" class='show_title_p2' name='show_title_p2' type="checkbox" />
						</p>

						<p>
						<label for="element_name">Title</label>
						<input id="title_p2" name="title_p2" size="30" type="text" value="My Family" />
						</p>

						<hr />
						Have the photo appear to the:
						<p>
						<label></label>
						<input id="float_left" name="img_align_p2"  type="radio" value="1" checked="checked"/>
						Left of the text

						<br />
						<label></label>
						<input id="float_right" name="img_align_p2"  type="radio" value="2" />
						Right of the text
						
						<br />
						<label></label>
						<input id="no_img" name="img_align_p2" type="radio" value="3" />
						No photos
						</p>
						
						<input type="hidden" name="hidd_setting_p2" value="sett_6853306">
						<p>
						<div class="demo"><input class="btn" id="btn_sett_p2" name="btn_sett_p2" type="submit" value="Update" /></div>
						</p>
						
					</div>
				</form>
			</div>
			
			<div class='element_body' id='element_body_6853306'>
				<div class='photo_and_text_body'>
					<div class='photo_float_left' id='photo_float_1967685'>
						<div class='photo_wrapper'>
							<div class='photo' id='p_body_img_1967685'>
								<img src="images/family_1.jpg" style='width: 150px;' />
							</div>
							<div class='org_add_link'><a href="#" class="toggle" data-id="add_area_6853306">Update Photo</a></div>
							<div class='add_area' id='add_area_6853306' style='display: none;'>
								<form action="" enctype="multipart/form-data" method="post" name="add_photos_6853306">
									<input id="uploaded_image_6853306" name="uploaded_image_6853306" size="30" type="file" />
									<input type="hidden" name="hidd_photo_p2" value="ph_id_6853306">
									<input class="btn" name="add_image_6853306" id="add_image_6853306" type="submit" value="Upload" />
								</form>
							</div>
						</div>
						
						<div class='text_wrapper' style='margin-left: 210px'>
							<div class='in_place_rte'>
								<form action="" method="post" name="add_desc_p2">
									<div class='in_place_rte_text' id='info_body_p2' name='desc_p2' title='Click to Edit'><p>Click here to add info about your family! You can add more elements if you'd rather a separate element for each family member.</p>&nbsp;
									</div>
									<input id="info_body_p2_val" name='desc_p2' type="hidden" value="Click here to add info about your family! You can add more elements if you'd rather a separate element for each family member." />
									<div class='hidden_until_edit' style='display:none'>
										<p>
										<input type="hidden" name="hidd_desc_p2" value="desc_6853306">
										<div class="demo"><input class="save btn" name="add_preview_p2" id='add_preview_p2' type="submit" value="Preview" />
										<input class="cancel btn" name="commit" type="submit" value="Cancel" />
										</div></p>
									</div>
									<!-- <input name="add_desc_p2" id='add_desc_p2' type="button" value="Save" /> -->
									<div class="demo"><a name="add_desc_p2" id='add_desc_p2'>Save</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
		</div>
	</div>
{/if}
<hr />
</div>
<p>&nbsp;</p>
<p class="validateTips_p3" id="links_red" align="center"></p>
<div id='parah3_status' {if $parah_3 eq '0'} style='display: none;' {/if}>
{if $parah_3 eq '1'}
	<div id='sortable_elements'>
		<div class='element' id='element_6853307'>
			<div class='element_buttons' id='el_btns_6853307'>
				<a class='toggle' data-id='el_s_6853307' title='Edit Element Settings'><img alt="Settings" height="20" src="images/settings_20.png" width="20" /></a>
				<a id='dele_p3' href='ownpage.php?wed_id={$tmplwedid}&do=kavied&list_id={$listid_tpl}&p3=d' data-id='element_6853307'  title='Delete This' onClick="return confirm('Are you absolutely sure you want to delete this parah?')"><img alt="Delete This" height="20" src="images/delete_20.png" width="20" /></a>

			</div>
			{if $tpl_parahtitle_status_p3 eq  1}<div class='element_header'>
				<h2>{$tpl_parahtitle_p3}</h2>
			</div>{/if}
			<div class='element_settings' id='el_s_6853307' style='display:none;'>
				<form method="post" name="settings_6853307">
					<div class='element_settings_inner'>
						<p>
						<a class='toggle' data-id='el_s_6853307' href='#'>Hide Settings</a>
						</p>
						
						<p>
						<label for="element_show_title">Show Title?</label>
						<input  id="element_show_title" class='show_title_p3' name='show_title_p3' type="checkbox" {if $tpl_parahtitle_status_p3 eq  1} checked="checked" {/if} />
						</p>
				
						<p>
						<label for="element_name">Title</label>
						<input id="title_p3" name="title_p3" size="30" type="text" value="{$tpl_parahtitle_p3}" />
						</p>

						<hr />
						Have the photo appear to the:
						<p>
						<label></label>
						<input id="float_left" name="img_align_p3"  type="radio" value="1" {if $tpl_image_align_p3 eq '1'} checked="checked" {/if}/>
						Left of the text
						
						<br />
						<label></label>
						<input id="float_right" name="img_align_p3"  type="radio" value="2" {if $tpl_image_align_p3 eq '2'} checked="checked" {/if}/>
						Right of the text
						
						<br />
						<label></label>
						<input id="no_img" name="img_align_p3" type="radio" value="3" {if $tpl_image_align_p3 eq '3'} checked="checked" {/if}/>
						No photos
						</p>
						
						<input type="hidden" name="hidd_setting_p3" value="sett_6853307">
						<p>
						<div class="demo"><input class="btn" id="btn_sett_p3" name="btn_sett_p3" type="submit" value="Update" /></div>
						</p>
						
					</div>
				</form>
			</div>
			
			<div class='element_body' id='element_body_6853307'>
				<div class='photo_and_text_body'>
					<div {if $tpl_image_align_p3 eq '1'} class='photo_float_left' {else if $tpl_image_align_p3 eq '2'} class='photo_float_right' {/if}  id='photo_float_1967685'>
						<div class='photo_wrapper'>
							{if $tpl_image_status_p3 eq 1}
							<div class='photo' id='p_body_img_1967685'>
							{if $tpl_image_src_p3_absolute neq ''}<img src="{$tpl_image_src_p3}" style='width: 150px;' />{else}<img src="images/lovehim.jpg" style='width: 150px;' />{/if}
							</div>
							{/if}
							<div class='org_add_link'><a href="#" class="toggle" data-id="add_area_6853307">Update Photo</a></div>
							<div class='add_area' id='add_area_6853307' style='display: none;'>
								<form action="" enctype="multipart/form-data" method="post" name="add_photos_6853307">
									<input id="uploaded_image_6853307" name="uploaded_image_6853307" size="30" type="file" />
									<input type="hidden" name="hidd_photo_p3" value="ph_id_6853307">
									<input class="btn" name="add_image_6853307" id="add_image_6853307" type="submit" value="Upload" />
								</form>
							</div>
						</div>
						
						<div class='text_wrapper' {if $tpl_image_align_p3 eq '1'} style='margin-left: 210px' {else if $tpl_image_align_p3 eq '2'} style='margin-right: 210px' {/if}>
							<div class='in_place_rte'>
								<form action="" method="post" name="add_desc_p3">
									{if $tpl_parah_content_p3 neq ''}
										<div class="in_place_rte_text" id="info_body_p3" name="desc_p3"  title="Click to Edit">{$tpl_parah_content_p3}</div>
										<input id="info_body_p3_val" name="desc_p3"  value="{$tpl_parah_content_p3}" type="hidden">
									{else}
										<div class='in_place_rte_text' id='info_body_p3' name='desc_p3' title='Click to Edit'>Please enter your own texts.</div>
										<input id="info_body_p3_val" name='desc_p3' type="hidden" value='Please enter your own texts.' />
									{/if}
									<div class='hidden_until_edit' style='display:none'>
										<p>
										<input type="hidden" name="hidd_desc_p3" value="desc_6853307">
										<div class="demo"><input class="save btn" name="add_preview_p3" id='add_preview_p3' type="submit" value="Preview" />
										<input class="cancel btn" name="commit" type="submit" value="Cancel" /></div>
										</p>
									</div>
									<!-- <input name="add_desc_p3" id='add_desc_p3' type="button" value="Save" /> -->
									<div class="demo"><a name="add_desc_p3" id='add_desc_p3'>Save</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
		</div>
	</div>
{else}
	<div id='sortable_elements'>
		<div class='element' id='element_6853307'>
			<div class='element_buttons' id='el_btns_6853307'>
				<a class='toggle' data-id='el_s_6853307' title='Edit Element Settings'><img alt="Settings" height="20" src="images/settings_20.png" width="20" /></a>
			</div>
			<div class='element_header'>
				<h2>Love story</h2>
			</div>
			<div class='element_settings' id='el_s_6853307' style='display:none;'>
				<form method="post" name="settings_6853307">
					<div class='element_settings_inner'>
						<p>
						<a class='toggle' data-id='el_s_6853307' href='#'>Hide Settings</a>
						</p>
							
						<p>
						<label for="element_show_title">Show Title?</label>
						<input checked="checked" id="element_show_title" class='show_title_p3' name='show_title_p3' type="checkbox" />
						</p>

						<p>
						<label for="element_name">Title</label>
						<input id="title_p3" name="title_p3" size="30" type="text" value="Love story" />
						</p>

						<hr />
						Have the photo appear to the:
						<p>
						<label></label>
						<input id="float_left" name="img_align_p3"  type="radio" value="1" checked="checked"/>
						Left of the text

						<br />
						<label></label>
						<input id="float_right" name="img_align_p3"  type="radio" value="2" />
						Right of the text
						
						<br />
						<label></label>
						<input id="no_img" name="img_align_p3" type="radio" value="3" />
						No photos
						</p>
						
						<input type="hidden" name="hidd_setting_p3" value="sett_6853307">
						<p>
						<div class="demo"><input class="btn" id="btn_sett_p3" name="btn_sett_p3" type="submit" value="Update" /></div>
						</p>
						
					</div>
				</form>
			</div>
			
			<div class='element_body' id='element_body_6853307'>
				<div class='photo_and_text_body'>
					<div class='photo_float_left' id='photo_float_1967685'>
						<div class='photo_wrapper'>
							<div class='photo' id='p_body_img_1967685'>
								<img src="images/lovehim.jpg" style='width: 150px;' />
							</div>
							<div class='org_add_link'><a href="#" class="toggle" data-id="add_area_6853307">Update Photo</a></div>
							<div class='add_area' id='add_area_6853307' style='display: none;'>
								<form action="" enctype="multipart/form-data" method="post" name="add_photos_6853307">
									<input id="uploaded_image_6853307" name="uploaded_image_6853307" size="30" type="file" />
									<input type="hidden" name="hidd_photo_p3" value="ph_id_6853307">
									<input class="btn" name="add_image_6853307" id="add_image_6853307" type="submit" value="Upload" />
								</form>
							</div>
						</div>
						
						<div class='text_wrapper' style='margin-left: 210px'>
							<div class='in_place_rte'>
								<form action="" method="post" name="add_desc_p3">
									<div class='in_place_rte_text' id='info_body_p3' name='desc_p3' title='Click to Edit'><p><br />Click here to tell your guests about the Maid Of Honor. You can upload your own photo of her by clicking 'Update Photo' below the photo on the left <br /> &nbsp; <br /><strong>Have additional members in your wedding party? Add some 'Photo &amp; Text' elements to the page. If there are already too many elements, just delete the ones you don't want. <br /></strong></p>&nbsp;
									</div>
									<input id="info_body_p3_val" name='desc_p3' type="hidden" value="&lt;p&gt;&lt;br /&gt;Click here to tell your guests about the Maid Of Honor. You can upload your own photo of her by clicking 'Update Photo' below the photo on the left &lt;br /&gt; &nbsp; &lt;br /&gt;&lt;strong&gt;Have additional members in your wedding party? Add some 'Photo &amp; Text' elements to the page. If there are already too many elements, just delete the ones you don't want. &lt;br /&gt;&lt;/strong&gt;&lt;/p&gt;&nbsp;" />
									<div class='hidden_until_edit' style='display:none'>
										<p>
										<input type="hidden" name="hidd_desc_p3" value="desc_6853307">
										<div class="demo"><input class="save btn" name="add_preview_p3" id='add_preview_p3' type="submit" value="Preview" />
										<input class="cancel btn" name="commit" type="submit" value="Cancel" /></div>
										</p>
									</div>
									<!-- <input name="add_desc_p3" id='add_desc_p3' type="button" value="Save" /> -->
									<div class="demo"><a name="add_desc_p3" id='add_desc_p3'>Save</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
		</div>
	</div>
{/if}
<hr />
</div>

<input type='hidden' name='max_parah' id='max_parah' value='{$tpl_parahcnt}' >
<div class="demo"><div style='float: right; padding: 10px;'><span><a id='managepage' href='managepage.php?wed_id={$tmplwedid}&do=b12d'>Manage own pages!</a></span>&nbsp;&nbsp;<span><a id='show_parah' class='show_parah'>Add new parah!</a></span></div></div>

</div>
</div> 
</div>
</div> </fieldset></div>
</div>
      </div></div> 