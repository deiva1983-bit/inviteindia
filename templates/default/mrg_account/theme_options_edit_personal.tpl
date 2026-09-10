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
	<h3 class="w3layouts_head">Website settings:<span> Personal information</span></h3>
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{$txt_req_lat_ceremony}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{$txt_req_lng_ceremony}' />
		<input type='hidden' name='lat_reception' id='lat_reception' value='{$txt_req_lat_reception}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{$txt_req_lng_reception}' />
		<div class="contact-main w3agile ">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				{$left_nav_for_wed}
			</div>
			</div>
			{if $isMobile eq '1'}<div class="col-md-1">&nbsp;</div>
			<div class="col-md-8">{else}
			<div class="col-md-9">
			{/if}
			{if $err_status eq 'show'}<div class="alert ui-state-error" role='alert'>{$err_req_msg}</div>{/if}
			{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
			<div id="validateTips" class="alert validateTips" role='alert'></div>
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Groom's <span> information</span></h2>
					<p><span><i class="fa fa-male" aria-hidden="true"></i></span></p>
					</div>

					<p><div>
					<label>Grooms's name:</label> 
					<input type="text" id="txt_grooms_name" name="txt_grooms_name" class="inputval" value="{$selectwedres_access[0].male_name}" maxlength="30" />
					</div></p>

					<p><div>
					<label>Date of birth:</label> 
					<input type="text" id="groom_dob" name="groom_dob" class="tcal inputval" value="{$selectwedres_access[0].groom_dob}" maxlength="30" style=""/>
					</div></p>
				
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Bride's <span> information</span></h2>
					<p><span><i class="fa fa-female" aria-hidden="true"></i></span></p>
					</div>
					<p><div>
					<label style="width:200px;" class='lab_black_color'>Bride's name:</label> 
					<input type="text" id="txt_brides_name" name="txt_brides_name" class="inputval" value="{$selectwedres_access[0].female_name}" maxlength="30"/>
					</div></p>

					<p><div>
					<label style="width:200px;" class='lab_black_color'>Date of birth:</label> 
					<input type="text" id="bride_dob" name="bride_dob" class="tcal inputval" value="{$selectwedres_access[0].bride_dob}" maxlength="30"/>
					</div></p>
			<p>
			<input id="butt_create_web_invit_edit" type="submit" name="butt_create_web_invit_edit" value="Submit" class="button" />
			</p>
			 </div>
		<div class="clearfix"> </div>
		</div>
		</form>
	</div>
</div>