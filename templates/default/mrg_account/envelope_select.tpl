<div class="contact" id="edit-pers-envelope">
	<div class="container">
	<h3 class="w3layouts_head">Website cover:<span> Envelope cover</span></h3>
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			<form id="wed_select_cover" name="wed_select_cover" class="form_cls" method="post" >
			<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
			<input type="hidden" id="txt_wed_grooms_len" name="txt_wed_grooms_len" value="{$mal_maxlength}"  />
			<input type="hidden" id="txt_wed_bride_len" name="txt_wed_bride_len" value="{$femal_maxlength}"  />
			<input type="hidden" id="glb_ctype_val" name="glb_ctype_val" value="{$glb_ctype}"  />
				<div class="col-md-9">
					<div class="w3layouts_header">
					<h2 class="sub_head_max">Design your<span> own envelope cover</span></h2>
					<p><span><i class="fa fa-comments" aria-hidden="true"></i></span></p>
					</div>
					{if $glb_err_msg ne ''}<div class="alert validateTips ui-state-error" role='alert'>{$glb_err_msg}</div>{/if}
					{if $glb_succ_msg neq ''}<div class="alert green_succ" role='alert' id='alert-text-succ'>{$glb_succ_msg}</div>{/if}
						<div class="contact-bottom" style="padding-top: 20px;">
							    <p>
								<div>
								<input type="radio" name="content_type" id="content_type" class="content_type" value="1" {if $glb_ctype eq '1'} checked="checked" {/if} > <label>I want to add my own contents.</label><br>
								<input type="radio" name="content_type" id="content_type" class="content_type" value="2" {if $glb_ctype eq '2'} checked="checked" {/if}> <label>I want to use default contents.</label><br>
								</div>
							    </p>

							<div class="system_text" id="system_text" style="{$glb_sys_cont}">
								    <table>
								    <tr><td>
								    <div style='padding: 10px;'> <!-- Cover config start -->
								    <h3 class="sub_head_min">Limitations for this wedding cover:</h3>
								    <div class="alert alert-info" role='alert'>As per the envelope design, we have few limitations.</div>
								    <div class="alert alert-info" role='alert'>Grooms's name length: <b>2 to {$mal_maxlength}.</b></div>
								    <div class="alert alert-info" role='alert'>Bride's name length: <b>2 to {$femal_maxlength}.</b></div>
									<p>
									<div class="field">
									<label>Envelope cover Grooms's name:</label>
									<input type="text" id="txt_wed_grooms_name" name="txt_wed_grooms_name" class="{$mal_class}" maxlength="{$mal_maxlength}" value="{$mal_name}" /><span><em><font color="red">You may set Grooms's pet name. It will be display your envelope cover only. Max Length: <b>{$mal_maxlength}</b></font></em></span></div>
									<div class="validateTips ui-state-error" id="validateTips_grooms_name" style="display: none;">Length of Grooms's name must be between 2 to {$mal_maxlength}.</div>
									</p>
									
									<p>
									<div class="field">
									<label>Wedding cover Bride's name:</label> 
									<input type="text" id="txt_wed_brides_name" name="txt_wed_brides_name" class="{$femal_class}" maxlength="{$femal_maxlength}" value="{$femal_name}" /><span><em><font color="red">You may set Bride's pet name. It will be display your envelope cover only. Max Length: <b>{$femal_maxlength}</b></font></em></span></div>
									<div class="validateTips ui-state-error" id="validateTips_brides_name" style="display: none;">Length of Bride's name must be between 2 to {$femal_maxlength}.</div>
									<div style='text-align: center; padding: 10px;'>{if $blockpage neq '1'}<input id="update_wedding_cover" name="update_wedding_cover" type="submit" value="Add Envelope Cover" class='button' style="width:50%; "/ >{/if}</div>
									</p>
								    </div> <!-- Cover config end -->
								    </td></tr>
								    </table>
							</div>
							<div class="own_text" id="own_text">
									<p>
									<div class="field">
									<label class="sub_head_min">Envelope contents:</label>
										<div><textarea style="height: 100px;" cols="65" id="envelope_msg" name="envelope_msg" rows="15">{$glb_own_msgs}</textarea></div>
										<div class="field"><span><em><font color="red">Provide your own messages to invite your guests!.</font></em></span></div>
									</div>
									</p>
									<p>{if $blockpage neq '1'}<input id="update_wedding_cover_own" name="update_wedding_cover_own" type="submit" value="Add Envelope Cover" class='button' / >{/if}
									</p>
							</div>

						<div>
					<div class="clearfix"></div>
				</div>
			</form>
		</div></div>
		
	</div>
</div>