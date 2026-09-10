<div class="contact" id="edit-pers-details">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Personal informations</span></h3>
		{if $error_msg neq ''}<div class="alert validateTips" role='alert'>{$error_msg}</div>{/if}
		{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="wedaccountsuccess.php?page=3" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{$txt_req_lat_ceremony}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{$txt_req_lng_ceremony}' />
		<input type='hidden' name='lat_reception' id='lat_reception' value='{$txt_req_lat_reception}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{$txt_req_lng_reception}' />
		<div class="contact-main w3agile bg-rep1">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Premium<span> themes</span></h2>
				<p><span><i class="fa fa-inr" aria-hidden="true"></i></span></p>
				</div>
				<div id="validateTips" class="alert validateTips" role='alert'></div>
					<div><p>
					<label class='lab_black_color' style="width:200px;">Postalcode:<span class="required">*<span></label> 
					<input type="text" id="addr_postcode" name="addr_postcode" maxlength="30" autocomplete="off" value="{$txt_req_addr_postcode}"/> 
					</p></div>
			 </div>	
		<div class="clearfix"> </div>
		</div>
		</form>
	</div>
</div>