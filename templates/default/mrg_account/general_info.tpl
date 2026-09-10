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

<div class="contact" id="create-website" style="padding: 0px;">
    <div class="container">
        <h3 class="w3layouts_head">General<span> Information</span></h3>
	<div class="col-md-12 text-center">
	<ul class="agileits_social_list">
		<li style="padding: 10px;"><a href="personal-details.php" class="{if $gnav_personal_class neq ''} {$gnav_personal_class} {else} active {/if}" id="wed_register"><span>Personal Information</span></a></li>
		<li style="padding: 10px;"><a href="general-information.php" class="{if $gnav_general_class neq ''} {$gnav_general_class} {else} in-active {/if}" id="wed_register">General Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=w" class="{if $gnav_ceremony_class neq ''} {$gnav_ceremony_class} {else} in-active {/if}" id="wed_register">Wedding Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=r" class="{if $gnav_reception_class neq ''} {$gnav_reception_class} {else} in-active {/if}" id="wed_register">Reception Information</a></li>
	</ul>
	</div>

        <!-- Commmon Errors - Start -->
        {if $show_err eq '1'}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
        {if $show_succ eq '1'}<div class="text-center"><h4 class='green_succ'>{$succ_msg}</h4></div>{/if}
        <!-- Commmon Errors - End -->
        
        <form id="wed_account_create_general" name="wed_account_create_general" class="form_cls" method="post" action="event-details.php" enctype="multipart/form-data">
	<input type="hidden" name="page_error_status" id="" value="{$show_err}"/>
	<input type="hidden" name="frm_req" id="frm_req" value="g" />
	<input type="hidden" name="txt_invite_lang" id="txt_invite_lang" value="1" />
            <div class="contact-main w3agile">
		<div class="col-md-12 text-center" style="display:none;" id="validateTips">
			<div id="validateTips" class="alert validateTips" role='alert' style="margin-top: 10px;"></div>
		</div>

		<div class="col-md-1 contact-left bg-rep2">
			<label class='lab_black_color' style="width:200px;">Website URL:<span class="required">*<span></label>
		</div>
		<div class="col-md-7 contact-left bg-rep2">
			<input type='text' readonly="true" id='domain_span' class='dom-static-text' value="http://www.inviteindia.com/" onclick='wed_url.focus();'><input type="text" name="wed_url" id="wed_url" autocomplete="off" class='dom-dynamic-text' value="{if $smarty.session.wed_url_engine neq ''}{$smarty.session.wed_url_engine}{/if}"/>
		</div>
		<div class="col-md-3 contact-left bg-rep2">
			<p><input type="button" id="check_avilable" class="button" value="Confirm availability"></button></p>
		</div>
		<div class="col-md-6 contact-left bg-rep2">
			<div class="contact-bottom">
				{if $isMobile eq 1} 
				<div class="field">Example: <br />www.inviteindia.com /<font color="red">{$example_url}</font></div>
				{else}
				<div class="field">Example: www.inviteindia.com/<font color="red">{$example_url}</font></div>
				{/if}
			</div>
		</div>
		<div class="col-md-6 contact-left">
			<div class="contact-bottom">
				<div><p><div id="wed_url_status"></div></p></div>
			</div>
		</div>
		
		<div class="col-md-12 contact-left bg-rep2">
		<div class="col-md-6 contact-left">
			<div class="contact-bottom">
				<div><p>
					<label class='lab_black_color' style="width:200px;">Website title:</label> 
					<input type="text" id="txt_invite_title" name="txt_invite_title" autocomplete="off" value="{if $smarty.session.wed_invite_title neq ''} {$smarty.session.wed_invite_title} {else} Welcome {/if}" />
					<div class="field"><span><em><font color="red">Example: You Are Warmly Invited!!!</font></em></span></div>
				</p></div>
			</div>
		</div>
		<div class="col-md-6 contact-left">
			<div class="contact-bottom">
				<div><p>
					<label class='lab_black_color' style="width:200px;">Wedding/Reception Date:</label>
					<input type="text" name="weddate" id="weddate" class="tcal inputval" value="{if $smarty.session.wed_gen_weddate neq ''}{$smarty.session.wed_gen_weddate}{/if}" autocomplete="off"/>
				<div class="field"><span><em><font color="red">For verification purposes, we require your exact wedding/reception date. This date will be displayed on your website title.</font></em></span></div>
				</p></div>
			</div>
		</div>
		</div>

			<div class="col-md-12 contact-left bg-rep3">
				<div class="contact-bottom">
				<div class="w3layouts_header">
				<h2 class="sub_head_max text-left">Couple picture's:</h2>
				</div>	
					<div>
					<ul><li style="margin:0; padding:2px 10px 15px; line-height:17px;">
						<input type='radio' name='home_images_sts' id="home_images_sts" value='2' id='2' class='home_image_2' checked=checked>&nbsp;<label for='2' class='lab_black_color' style="width:200px;">Couple's individual image:</label></li>
						<li style="margin:0; padding:2px 10px 15px; line-height:17px;"><input type='radio' name='home_images_sts' id="home_images_sts" value='1' id='1' class='home_image_1' checked=checked>&nbsp;<label for='1' class='lab_black_color' style="width:200px;">Single Image</label></li>
					</ul>
					</div>

                                        <div id="home_single_img">
						<div class="field">
							<h3 class="sub_head_min">Couple's picture:</h3>
							<input type="file" name="uploaded_homeimage" />
						</div>
											<div>Example:</div>
												<div><span><image src="images/both.jpg" style="width: 200px; border: 5px double #F5C847;"/></span></div>
                                        </div>
                                         
                                        <div id="home_double_img" style="display: none;">
											<div class="field">
												<label class='sub_head_min'>Groom's picture:</label> 
												<input type="file" name="uploaded_homeimage_male" id="uploaded_homeimage_male" class="inputval" />
											</div>
											<div class="field">
												<label class='sub_head_min'>Bride's picture:</label> 
												<input type="file" name="uploaded_homeimage_fmale" id="uploaded_homeimage_fmale" class="inputval" />
											</div>
                                        <!--<label style="width:120px;">Example:</label> 
                                        <div class="field">
                                        <span><image src="images/male.jpg" style="width: 200px; border: 5px double #F5C847;"/></span>
                                        <span style="padding-left: 10px;"><image src="images/female.jpg" style="width: 200px; border: 5px double #F5C847;"/></span>
                                        </div> -->
                                        </div>

			</div>



                
                <div class="col-md-12 text-center bg-rep3">
			<button id="butt_general_info" name="butt_general_info" class="button">Submit (2 of 4)</button><span>&nbsp;<span><button  id="butt_clear_web_invit" class="butt_clear_web_invit button" type="reset">Clear</button>
                </div>
            </div>
                    
        </div> 
        </form>
    </div><div>&nbsp;</div>
</div>