<div class="contact" id="edit-pers-classic-wed-cover">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Classic wedding cover</span></h3>
		<form name="classiccover" method="post" action="">
			<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
			<input type="hidden" value="{$wed_acc_id}" id="wed_accid" name="wed_accid" />
			<input type="hidden" value="saveit" id="save_classic" name="save_classic" />
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
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $err_status eq '0'}<div class="alert validateTips ui-state-error" role='alert'>{$err_test}</div>
				{elseif $showerr_gmap eq '1'}
				<div class="alert ui-state-error" role='alert'>We must required Google Map details to create classic wedding cover. <a href='gmap_search.php?wedid={$wed_acc_id}&do=searchloc' class='lab_color'>Click here</a> to map your address details.</div>
				{/if}
				<p><div id="validateTips" class="alert validateTips ui-state-error" role='alert' style="display: none;"></div></p>
				<div class="contact-bottom">
					<p style='display: none;'>
						<div class="field" style='display: none;'>
							<div><font id="links_red" style="font: 1.4em Comic Sans MS; color: #f32e10 ">As per the cover design we have few limitations.</font></div>
							<div><font id="links_red" style="font: 1.4em Comic Sans MS; color: #f32e10 ">Grooms's name length: </font><span id="links_green"><b>2 to {$mal_maxlength}.</b></span><font id="links_red" style="font: 1.4em Comic Sans MS; color: #f32e10 ">Bride's name length: </font><span id="links_green"><b>2 to {$femal_maxlength}.</b></span>
							</div>
						</div>
					</p>

					<p><div>
					<label>Wedding cover Grooms's name:</label> 
						<input type="text" id="txt_wed_grooms_name" name="txt_wed_grooms_name" class="{$mal_class}" maxlength="{$mal_maxlength}" value="{$mal_name}"/>
					</div>
					<div><span><em><font color="red">You may set Grooms's pet name. Its displaying only  your wedding cover. Max Length: <b>{$mal_maxlength}</b></font></em></span></div>
					<div class="validateTips ui-state-error" id="validateTips_grooms_name" style="display: none;">Length of Grooms's name must be between 2 to {$mal_maxlength}.</div>
					</p>
				
					<p><div>
					<label>Wedding cover Bride's name:</label> 
					<input type="text" id="txt_wed_brides_name" name="txt_wed_brides_name" class="{$femal_class}" maxlength="{$femal_maxlength}" value="{$femal_name}"/>
					</div>
					<div><span><em><font color="red">You may set Bride's pet name. Its displaying only  your wedding cover.  Max Length: <b>{$femal_maxlength}</b></font></em></span></div>
					<div class="validateTips ui-state-error" id="validateTips_brides_name" style="display: none;">Length of Bride's name must be between 2 to {$femal_maxlength}.</div>
					</p>
				</div>
				</div>
				<div class="col-md-9">
					<div class="contact-bottom">
						<div class="col-md-6">
							<div>
							<label>Cover title:</label> 
							<textarea name="cover_title" id="cover_title">{if $covertit_glb neq ''}{$covertit_glb}{elseif $tpl_cover_heading neq ''} {$tpl_cover_heading} {else} Join us for the celebrations!{/if}</textarea>
							</div>
						</div>
						<div class="col-md-5">
						    <div>
						    <label>Sample Cover Titles:</label>
							<div class="head_msgtmplates" style="overflow: scroll; height: 233px;"><ul>{$head_msgtmplates}</ul></div>
						    </div>
						</div>
					</div>
				<div class="clearfix"></div>
				</div>

				<div class="col-md-9">
					<div class="contact-bottom">
						<div class="col-md-6">
						    <div>
						    <label>Cover Contents:</label> 
							<textarea name="cover_con" id="cover_con">{if $covercon_glb neq ''}{$covercon_glb}{elseif $tpl_cover_content neq ''} {$tpl_cover_content} {else} How beautiful is the day that is touched by love. We request the honor of your presence at our marriage.{/if}</textarea>
						    </div>
						</div>
						<div class="col-md-5">
							<div>
							<label>Sample Cover Contents:</label> 
							<div class="desc_msgtmplates" style="float: left; overflow: scroll; width: 350px; height: 233px;"><ul>{$desc_msgtmplates}</ul></div>
							</div>
						</div>
					</div>
				</div>

		<div class="col-md-9">
		<div class="contact-bottom">
                    <div>
                    <label>Contact mobile number:</label> 
                    <input type="text" id="txt_wed_mobile" name="txt_wed_mobile" value="{if $mob_num neq ''} {$mob_num} {elseif $tpl_cover_mobile neq ''} {$tpl_cover_mobile} {/if}"/>
                    </div>
		    
		    <div>{if $blockpage neq '1'}<button id="add_classic" name="add_classic" type="submit" class="button">Update</button>{/if}</div>
		<div>&nbsp;</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>