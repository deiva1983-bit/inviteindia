 <!-- content -->
</div></div>
{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{/literal}
 <!-- content -->
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>
{if $sms_in_type eq 3}Please login... <a href="index.php?do=login" id="mobilelogin_activate" class="mobilelogin_activate">click me</a>{/if}
{if $sms_send_status eq 'ok'}<succ id="succval" class="succval">Message send successfully to <b>{$sms_send_mob}</b></succ>
	{if $sms_send_exist eq '0'}<a href="#" id="addit_myadd" name="add_1234" class="addit_myadd">Click here</a> to add address book{/if}
{/if}
{if $blockpage eq '1'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$errors}</h3></div>{/if}
{if $alert_status eq '1'}<div style='text-align: center;' id='alert-text-succ'><h3 class='green_succ'>{$alert_msg}</h3></div>{/if}
<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
                            <h3>Create your <span>birthday invitation:</span></h3>
                                <div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div><p>&nbsp;</p> 
				      <form id="birth_account_create" name="birth_account_create" class="form_cls" method="post" action="{$glb_formaction}" enctype="multipart/form-data">       
				      
				      <div class='pannel'>
					<h3><span>Birthday person details:</span></h3>						
						<div><p>
						<label class='lab_black_color' style="width:200px;">Name:<span class="required">*<span></label> 
						<input type="text" id="txt_bperson_name" name="txt_bperson_name" class="inputval" maxlength="30" autocomplete="off" /> 
						</p></div>

						<div><p>
						<label class='lab_black_color' style="width:200px;">Date of birth:<span class="required">*<span></label> 
						<input type="text" id="bperson_dob" name="bperson_dob" class="tcal inputval" maxlength="30" autocomplete="off" />
						</p></div>
					</div>
					<div>&nbsp;</div>				
					
					
					<div class='pannel'>
					<h3><span>Invitation details:</span></h3> 
					<div><p>
						<label class='lab_black_color' style="width:200px;">Domain name:<span class="required">*<span></label> 
						<input type='text' readonly="true" id='domain_span' class="inputval" style="border-right: 0px; width: 163px; " value="http://www.inviteindia.com/" onclick='birth_url.focus();'><input type="text" name="birth_url" id="birth_url" value="" autocomplete="off" class="inputval" style='border-left: 0px; box-sizing:border-box;'/>
						<input type="hidden" name="theme_id" id="theme_id" value="1" class="inputval"/>
						<a href="" id="check_avilable" class="button1">Check avilablity</a>&nbsp;&nbsp;<div id="wed_url_status"></div>
						<div class="field"><span><em>example: http://www.inviteindia.com/<font color="red">kavi_first_birthday</font></em></span></div>
					</p></div>
					<div><p>
						<label class='lab_black_color' style="width:200px;">Invitation title:</label> 
						<input type="text" id="txt_invite_title" name="txt_invite_title" class="inputval" value="Welcome" />
						<div class="field"><span><em>Example: We cordially invite's you</em></span></div>
						<div class="field"><span><em><font color="red">If you don't want title, just leave it as a  blank.</font></em></span></div>				
					</p></div>
					

					<div style='display: none;'><p>		
                                        <label class='lab_black_color' style="width:200px;">Invitation language:</label> 
                                         <select class="inputval" id="txt_invite_lang" name="txt_invite_lang">
                                          <option value="1">English</option>
                                          <option value="2">தமிழ     Tamil</option>                                        
                                        </select>				
					</p></div>

					<div>
					<h3><span>Home page image:</span></h3>
                                        <div class="field" style="display: none;">
                                        <ul><li style="margin:0;padding:2px 10px 15px;line-height:17px;">
						<input type='radio' name='home_images_sts' id="home_images_sts" value='2' id='2' class='home_image_2' checked=checked> <label for='2' class='lab_black_color' style="width:200px;">Double images</label></li>
						<li style="margin:0;padding:2px 10px 15px;line-height:17px;"><input type='radio' name='home_images_sts' id="home_images_sts" value='1' id='1' class='home_image_1' checked=checked> <label for='1' class='lab_black_color' style="width:200px;">Single image</label></li>
						</ul>
                                        </div>
                                        <p>
                                        <div id="home_single_img">
                                        <div class="field">
                                        <label class='lab_black_color' style="width:200px;">Home page image:</label> 
                                        <input type="file" name="uploaded_homeimage" class="inputval"/> 
                                        </div>

					<div><p>
						<label class='lab_black_color' style="width:200px;">&nbsp;</label>
						<div class="field"><span><em><font color="red">If you do not have a photo to upload right now, that's ok!. A default photo will be used, and you can upload your personalized photo at any time.</font></em></span></div>				
					</p></div>

                                        
                                        <div class="field" style='display: none;'><span><em>This image is displayed in your home page.</em></span></div>
                                        <div><label style="width:120px;">Example:</label></div>
                                        <div><span><image src="images/both.jpg" style="width: 200px; border: 5px double #F5C847;"/></span></div>
                                        </div>
                                         
                                        <div id="home_double_img" style="display: none;">
                                        <div class="field">
                                        <label class='lab_black_color' style="width:200px;">Grooms's Image:</label> 
                                        <input type="file" name="uploaded_homeimage_male" id="uploaded_homeimage_male" class="inputval" />
                                        </div>
                                        
                                        <div class="field">
                                        <label class='lab_black_color' style="width:200px;">Bride's image:</label> 
                                        <input type="file" name="uploaded_homeimage_fmale" id="uploaded_homeimage_fmale" class="inputval" />
                                        </div>
                                        
                                        <div class="field" style='display: none;'><span><em>This images are displayed in your home page.</em></span></div>
                                        <label style="width:120px;">Example:</label> 
                                        <div class="field">
                                        <span><image src="images/male.jpg" style="width: 200px; border: 5px double #F5C847;"/></span>
                                        <span style="padding-left: 10px;"><image src="images/female.jpg" style="width: 200px; border: 5px double #F5C847;"/></span>
                                        </div>
                                        </div>
                                        </p>
					</div>
					<div>&nbsp;</div>



			<div>
			<button id="butt_create_web_invit" class="button1">Submit (1 of 2)</button>&nbsp;&nbsp;<button  id="butt_clear_web_invit" class="butt_clear_web_invit button1" type="reset">Clear</button>
			<dd>&nbsp;</dd> 
			</div><!-- End demo -->
                        </fieldset>
                        </form>
			

                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
