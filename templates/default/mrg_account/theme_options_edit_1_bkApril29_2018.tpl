{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
{/literal}
 <!-- content -->
 <link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>
<div class="contact" id="edit-pers-details">
	<div class="container ">
	<h3 class="w3layouts_head">Website settings:<span> Personal informations</span></h3>
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{$txt_req_lat_ceremony}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{$txt_req_lng_ceremony}' />
		<input type='hidden' name='lat_reception' id='lat_reception' value='{$txt_req_lat_reception}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{$txt_req_lng_reception}' />
		<div class="contact-main w3agile ">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9 ">
			{if $err_status eq 'show'}<div class="alert ui-state-error" role='alert'>{$err_req_msg}</div>{/if}
			{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
			<div id="validateTips" class="alert validateTips" role='alert'></div>
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Groom's <span> informations</span></h2>
					<p><span><i class="fa fa-male" aria-hidden="true"></i></span></p>
					</div>

					<p><div>
					<label>Grooms's name:</label> 
					<input type="text" id="txt_grooms_name" name="txt_grooms_name" class="inputval" value="{$selectwedres_access[0].male_name}" maxlength="30" />  
					</div></p>

					<p><div>
					<label>Grooms's DOB:</label> 
					<input type="text" id="groom_dob" name="groom_dob" class="tcal inputval"  value="" maxlength="30" />  
					</div></p>
				
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Bride's <span> informations</span></h2>
					<p><span><i class="fa fa-female" aria-hidden="true"></i></span></p>
					</div>
					<p><div>
					<label style="width:200px;" class='lab_black_color'>Bride's name:</label> 
					<input type="text" id="txt_brides_name" name="txt_brides_name" class="inputval" value="{$selectwedres_access[0].female_name}" maxlength="30"/>  
					</div></p>

					<p><div>
					<label style="width:200px;" class='lab_black_color'>Bride's DOB:</label> 
					<input type="text" id="bride_dob" name="bride_dob" class="tcal inputval"  value="" maxlength="30"/>  
					</div></p>
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Website <span> details</span></h2>
					<p><span><i class="glyphicon glyphicon-registration-mark" aria-hidden="true"></i></span></p>
					</div>
					<p><div>
					<label style="width:200px;" class='lab_black_color'>Domain name:</label>
					<input type="text" name="wed_url" id="wed_url" value="{$selectwedres_access[0].mrg_page_url}" class="inputval" readonly="true"/>
					<input type="hidden" name="theme_id" id="theme_id" value="1" class="inputval"/>  				
					</div></p>

					<p style='padding-bottom: 2px;'><div>
					<label style="width:200px;" class='lab_black_color'>Website Title:</label> 
					<input type="text" id="txt_invite_title" name="txt_invite_title" class="inputval" value="{$selectwedres_access[0].top_heading}" />
					<div><span><em>example: {$selectwedres_access[0].male_name} Invites U</em></span></div>
					<div><span><em><font color="red">If you don't want title, just leave it as a blank.</font></em></span></div>
					</div></p>

					<p><div>
					<label style="width:200px;" class='lab_black_color'>Website language:</label> 
					 <select class="select_option" id="txt_invite_lang" name="txt_invite_lang">
					  <option value="1" {if $wed_lang_id eq '1'} selected {/if}>English</option>
					  <option value="2" {if $wed_lang_id eq '2'} selected {/if}>தமிழ்  Tamil</option>				
					</select><input type="hidden" id="txt_lang_old" name="txt_lang_old" class="inputval" value="{$wed_lang_id}" />
					</div></p>
				
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Home page <span> image</span></h2>
				<p><span><i class="glyphicon glyphicon-picture" aria-hidden="true"></i></span></p>
				</div>
				<div>
				<ul><li style="margin:0;padding:2px 10px 15px;line-height:17px;"><input type='radio' name='home_images_sts' id="home_images_sts" value='2' id='2' class='home_image_2' {if $img_status eq 2} checked=checked {/if}> <label for='2' style="width:200px;" class='lab_black_color'>Double images</label></li>
				<li style="margin:0;padding:2px 10px 15px;line-height:17px;"><input type='radio' name='home_images_sts' id="home_images_sts" value='1' id='1' class='home_image_1' {if $img_status eq 1} checked=checked {/if}> <label for='1' style="width:200px;" class='lab_black_color'>Single Images</label></li>
				</div>

				<p>
				<div id="home_single_img" {if $img_status eq 2} style="display: none" {/if}>
				<div class="field">
				<label style="width:200px;" class='lab_black_color'>Couple's image:</label> 
				<input type="file" name="uploaded_homeimage" />
				</div>
				<div style='display: none;'><span><em><font color="red">This image will be display in your wedding invitation's.</font></em></span></div>
				
				<div>
				{if $selectwedres_access[0].home_img neq ""}
				<img src="{$glb_site_url}/templates/default/mrg_template/home_images/{$wed_acc_id}/{$selectwedres_access[0].home_img}" />
				{else}
				
				{/if}
				</div>
				</div>
				 
				<div id="home_double_img" {if $img_status eq 1} style="display: none" {/if}>
				<div class="field" style='padding-bottom: 5px;'>
				<label style="width:200px;" class='lab_black_color'>Grooms's Image:</label> 
				<input type="file" name="uploaded_homeimage_male" id="uploaded_homeimage_male" />
				</div>
				
				<div class="field">
				<label style="width:200px;" class='lab_black_color'>Bride's image:</label> 
				<input type="file" name="uploaded_homeimage_fmale" id="uploaded_homeimage_fmale" />
				</div>
				{if $selectwedres_access[0].home_male_img neq ""}
				<div class="field">
				<img src="{$glb_site_url}/templates/default/mrg_template/home_images/{$wed_acc_id}/{$selectwedres_access[0].home_male_img}" />
				<input type="hidden" name="imag_status_double" id="imag_status_double" class="imag_status_double" value="yes" />
				</div>
				{else}
				<input type="hidden" name="imag_status_double" id="imag_status_double" class="imag_status_double" value="no" />
				{/if}
				{if $selectwedres_access[0].home_female_img neq ""}
				<div class="field">
				<img src="{$glb_site_url}/templates/default/mrg_template/home_images/{$wed_acc_id}/{$selectwedres_access[0].home_female_img}" />
				</div>
				{/if}
				<div style='display: none;'><span><em><font color="red">This image will be display in your wedding invitation's.</font></em></span></div>
				</div>
				</p>

			<p>
			<input id="butt_create_web_invit_edit" type="submit" name="butt_create_web_invit_edit" value="Submit" class="button" />
			</p>
			 </div>
		<div class="clearfix"> </div>
		</div>
		</form>
	</div>
</div>