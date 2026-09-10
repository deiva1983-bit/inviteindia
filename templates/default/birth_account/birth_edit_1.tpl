 <!-- content --> 
</div></div>
{if $alert_status eq '1'}<div style='text-align: center;' id='alert-text-succ'><h3 class='green_succ'>{$alert_msg}</h3></div>{/if}
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
<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
                            <table class="layout-grid" cellspacing="0" cellpadding="0">
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr>{$left_nav_for_wed}
                                        <td style='width: 75%;'>
                                            <div>
                                                <h3 style='padding: 0px;'>Invitation settings: <span>Personal page</span></h3>
			
			<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="" enctype="multipart/form-data">
			<p><div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div></p>
			<div class='pannel' style='width: 100%;'>
			<h3><span>Birthday person details:</span></h3>
				<p><div>
				<label style="width:200px;" class='lab_black_color'>Name:</label> 
				<input type="text" id="txt_bperson_name" name="txt_bperson_name" class="inputval" value="{$selectbirth_access[0].person_name}" maxlength="30" />  
				</div></p>

				<p><div>
				<label style="width:200px;" class='lab_black_color'>Date of birth:</label> 
				<input type="text" id="bperson_dob" name="bperson_dob" class="tcal inputval"  value="{$selectbirth_access[0].person_dob}" maxlength="30" />  
				</div></p>

				<!-- <p><div>
				<label style="width:85px;" class='lab_black_color'>So it's you're </label> 
				<input type="text" id="txt_bperson_dob_count" name="txt_bperson_dob_count" class="inputval" value="{$selectbirth_access[0].txt_bperson_dob_count}" maxlength="2" style='width: 30px;' /><span style="width:85px;" class='lab_black_color'> birthday right? Please confirm.</span>
				</div></p> -->
			</div>
			<div>&nbsp;</div>			
			
			<div class='pannel' style='width: 100%;'>
			<h3><span>Organizer details:</span></h3>				
			
			<p><div>
			<label style="width:200px;" class='lab_black_color'>Name:</label> 
			<input type="text" id="txt_hoster_name" name="txt_hoster_name" class="inputval" value="{$selectbirth_access[0].hoster_name}" maxlength="30" />  
			</div></p>


			<p><div>
			<label style="width:200px;" class='lab_black_color'>Contact number:</label> 
			<input type="text" id="txt_hoster_num" name="txt_hoster_num" class="inputval" value="{$selectbirth_access[0].hoster_num}" maxlength="30" />  
			</div></p>
			</div>
			<div>&nbsp;</div>

			<div class='pannel' style='width: 100%;'>
			<h3><span>Invitation details:</span></h3>				
			<p style='padding-bottom: 2px;'><div>
			<label style="width:200px;" class='lab_black_color'>Invitation Title:</label> 
			<input type="text" id="txt_invite_title" name="txt_invite_title" class="inputval" value="{$selectbirth_access[0].invitation_title}" />
			<div><span><em>example: {$selectbirth_access[0].person_name} Invites U</em></span></div>
			<div><span><em><font color="red">If you don't want title, just leave it as a blank.</font></em></span></div>
			</div></p>				
				
			</div>
			<div>&nbsp;</div>
			<div class='pannel' style='width: 100%;'>
			<h3><span>Home page image:</span></h3>
			<div class="field">
			<label style="width:200px;" class='lab_black_color'>Home page image:</label> 
			<input type="file" name="uploaded_homeimage" id="uploaded_homeimage" />
			</div>
				
			{if $selectbirth_access[0].home_img neq ""}
			<div class="field">
			<img src="{$glb_site_url}/templates/default/birth_template/home_images/{$birth_acc_id}/{$selectbirth_access[0].home_img}" />
			</div>
			{/if}

			</div>
				
            
			<p>
			<input id="butt_edit_1" type="submit" name="butt_edit_1" value="Submit" class="button1" />
			</p><!-- End demo -->
            </form>
			</div>
		</td></tr>
	</table>

                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
