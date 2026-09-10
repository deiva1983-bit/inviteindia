<div class="contact" id="edit-pers-ownpage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Wedding cover configuration</span></h3>
	{if $glb_from_src eq '1'}<div style='padding: 10px;'><span style='float: left;'><a href="#" id="skip_later">Skip, May be Later</a></span> <span style='float: right;'><a href="#" id="add_add_gmap">Add address in Google MAP >> Next</a></span></div>{/if}
		<form id="wed_select_cover" name="wed_select_cover" class="form_cls" method="post" >
			<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
			<input type="hidden" value="{$wed_acc_id}" id="wed_accid" name="wed_accid" />

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own wedding cover</span></h2>
				<p><span><i class="glyphicon glyphicon-certificate" aria-hidden="true"></i></span></p>
				</div>
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert' id='alert-text-succ'>Congrats, You've successfully added a wedding cover.</div>{/if}
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert' id='alert-text-err'>{$errors}</div>{/if}
					<div class="contact-bottom">
                                                    <table><tr><td>
							    <div>
								
								<p>
								<div class="div2" style="background-color:white;padding:0px 0 0px 0px; margin-top: 15px;">
								<div class="floatLeft">
								    <div id="sliderFrame">
									<img src='images/wedding_cover/bg_{$do_imgid}.jpg'  style="max-width: 647px;" />
								    </div>
								</div>
								<div style="clear:both;"></div>  
								</div>
								</p>
							    </div>
							    </td></tr>
							    <tr><td>
							    <div style='padding: 10px;'> <!-- Cover config start -->
							    <h3 class="sub_head">Limitations for this wedding cover:</h3>
							    <div class="alert alert-info" role="alert">As per this wedding cover design, we have few limitations.<br /><br />Grooms's name length: <b>2 to {$mal_maxlength}.</b><br /><br />Bride's name length: <b>2 to {$femal_maxlength}.</b></div>
								<p>
								<div class="field">
								<label>Wedding cover Grooms's name:</label> 
								<input type="text" id="txt_wed_grooms_name" name="txt_wed_grooms_name" class="inputval {$mal_class}" maxlength="{$mal_maxlength}" value="{$mal_name}" required="" /><span><em><font color="red">You may set Grooms's pet name. Its displaying only  your wedding cover. Max Length: <b>{$mal_maxlength}</b></font></em></span></div>
								<div class="validateTips ui-state-error" id="validateTips_grooms_name" style="display: none;">Length of Grooms's name must be between 2 to {$mal_maxlength}.</div>
								</p>
								
								<p>
								<div class="field">
								<label>Wedding cover Bride's name:</label> 
								<input type="text" id="txt_wed_brides_name" name="txt_wed_brides_name" class="inputval {$femal_class}" maxlength="{$femal_maxlength}" value="{$femal_name}" required=""/>  
								<span><em><font color="red">You may set Bride's pet name. Its displaying only  your wedding cover.  Max Length: <b>{$femal_maxlength}</b></font></em></span></div>
								<div class="validateTips ui-state-error" id="validateTips_brides_name" style="display: none;">Length of Bride's name must be between 2 to {$femal_maxlength}.</div>
								<div style='text-align: center; padding: 10px;'>{if $blockpage neq '1'}<input id="update_wedding_cover" name="update_wedding_cover" type="submit" value="Add Cover" class='button1' / >{/if}</div>
								</p>
							    </div> <!-- Cover config end -->
							    </td></tr>
							    </table>

					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>