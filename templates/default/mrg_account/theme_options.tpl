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
<!-- contact -->
<div class="contact" id="create-website">
	<div class="container">
	<h3 class="w3layouts_head">Create your<span> wedding invitation</span></h3>
	{if $blockpage eq '1'}<div class="text-center"><h4 class='red_err'>{$errors}</h4></div>{/if}
	{if $alert_status eq '1'}<div class="text-center"><h4 class='green_succ'>{$alert_msg}</h4></div>{/if}
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="{$glb_formaction}" enctype="multipart/form-data">
		<input type="hidden" name="theme_id" id="theme_id" value="1"/>
		<div class="contact-main w3agile">
		<div id="validateTips" class="alert validateTips" role='alert'></div>
		<div class="col-md-12 contact-left bg-rep1">
			<div class="col-md-6 contact-left">
				<div class="contact-bottom">
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Groom's <span> informations</span></h2>
					<p><span><i class="fa fa-male" aria-hidden="true"></i></span></p>
					</div>
					<div><p>
						<label class='lab_black_color' style="width:200px;">Grooms's name:<span class="required">*<span></label> 
						<input type="text" id="txt_grooms_name" name="txt_grooms_name" maxlength="30" autocomplete="off" /> 
					</p></div>

					<div><p>
						<label class='lab_black_color' style="width:200px;">Date of birth:</label> 
						<input type="text" id="grooms_dob" name="grooms_dob" class="tcal" maxlength="30" autocomplete="off" />
					</p></div>
				</div>
			</div>
			<div class="col-md-6 contact-left">
				<div class="contact-bottom">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Bride's <span> informations</span></h2>
				<p><span><i class="fa fa-female" aria-hidden="true"></i></span></p>
				</div>
					<div><p>
						<label class='lab_black_color' style="width:200px;">Bride's name:<span class="required">*<span></label> 
						<input type="text" id="txt_brides_name" name="txt_brides_name" maxlength="30" autocomplete="off" /> 
						</p>
					</div>
					<div><p>
						<label class='lab_black_color' style="width:200px;">Date of birth:</label> 
						<input type="text" id="bride_dob" name="bride_dob" class="tcal" maxlength="30" autocomplete="off" />
					</p></div>
				</div>
			</div>
		</div>
			<div class="col-md-12 contact-left bg-rep2">
				<div class="contact-bottom">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Website <span> details</span></h2>
				<p><span><i class="glyphicon glyphicon-registration-mark" aria-hidden="true"></i></span></p>
				</div>
				<div><p>
						<label class='lab_black_color' style="width:200px;">Domain name:<span class="required">*<span></label> 
				</p></div>
					<div><p>
						<input type='text' readonly="true" id='domain_span' class='dom-static-text' value="http://www.inviteindia.com/" onclick='wed_url.focus();'><input type="text" name="wed_url" id="wed_url" value="" autocomplete="off" class='dom-dynamic-text' />
						</p>
					</div>
						<div class="field"><span><em>example: http://www.inviteindia.com/<font color="red">rakesh_weds_nisha</font></em></span></div>
				</div>
			</div>
			<div class="col-md-12 contact-left bg-rep2" style="padding-top: 20px; padding-bottom: 40px;">
				<div class="col-md-6 contact-left" style="padding: 0px;">
					<div class="contact-bottom">
					<div><p><a href="" id="check_avilable" class="button">Check avilablity</a></p></div>
					</div>
				</div>
				<div class="col-md-6 contact-left">
					<div class="contact-bottom">
						<div><p><div id="wed_url_status"></div></p></div>
					</div>
				</div>
			</div>
			<div class="col-md-12 contact-left bg-rep2">
			<div class="col-md-6 contact-left">
				<div class="contact-bottom">
					<div><p>
						<label class='lab_black_color' style="width:200px;">Website title:</label> 
						<input type="text" id="txt_invite_title" name="txt_invite_title" autocomplete="off" value="Welcome" />
						<div class="field"><span><em>Example: We cordially invite you</em></span></div>
						<div class="field"><span><em><font color="red">If you don't want title, just leave it as a  blank.</font></em></span></div>
					</p></div>
				</div>
			</div>
			<div class="col-md-6 contact-left">
				<div class="contact-bottom">
					<div><p>
						<label class='lab_black_color' style="width:200px;">Website language:</label> 
						<select id="txt_invite_lang" name="txt_invite_lang" class="select_option">
							<option value="1">English</option>
							<option value="2">தமிழ     Tamil</option> 
						</select>
					</p></div>
				</div>
			</div>
			</div>

			<div class="col-md-12 contact-left bg-rep3">
				<div class="contact-bottom">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Wedding website home page<span> image</span></h2>
				<p><span><i class="glyphicon glyphicon-picture" aria-hidden="true"></i></span></p>
				</div>
					<div>
					<ul><li style="margin:0; padding:2px 10px 15px; line-height:17px;">
						<input type='radio' name='home_images_sts' id="home_images_sts" value='2' id='2' class='home_image_2' checked=checked>&nbsp;<label for='2' class='lab_black_color' style="width:200px;">Double images</label></li>
						<li style="margin:0; padding:2px 10px 15px; line-height:17px;"><input type='radio' name='home_images_sts' id="home_images_sts" value='1' id='1' class='home_image_1' checked=checked>&nbsp;<label for='1' class='lab_black_color' style="width:200px;">Single image</label></li>
					</ul>
					</div>

                                        <div id="home_single_img">
											<div class="field">
												<h3 class="sub_head_min">Couple's image:</h3>
												<input type="file" name="uploaded_homeimage" />
											</div>
											<div>Example:</div>
												<div><span><image src="images/both.jpg" style="width: 200px; border: 5px double #F5C847;"/></span></div>
                                        </div>
                                         
                                        <div id="home_double_img" style="display: none;">
											<div class="field">
												<label class='sub_head_min'>Grooms's Image:</label> 
												<input type="file" name="uploaded_homeimage_male" id="uploaded_homeimage_male" class="inputval" />
											</div>
											<div class="field">
												<label class='sub_head_min'>Bride's image:</label> 
												<input type="file" name="uploaded_homeimage_fmale" id="uploaded_homeimage_fmale" class="inputval" />
											</div>
                                        <!--<label style="width:120px;">Example:</label> 
                                        <div class="field">
                                        <span><image src="images/male.jpg" style="width: 200px; border: 5px double #F5C847;"/></span>
                                        <span style="padding-left: 10px;"><image src="images/female.jpg" style="width: 200px; border: 5px double #F5C847;"/></span>
                                        </div> -->
                                        </div>

				<div>
				<button id="butt_create_web_invit" class="button">Submit (1 of 2)</button>&nbsp;&nbsp;<button  id="butt_clear_web_invit" class="butt_clear_web_invit button" type="reset">Clear</button>
				</div><div>&nbsp;</div>
				</div>
			</div>
					
		</div> 
		</form>
	</div><div>&nbsp;</div>
</div>