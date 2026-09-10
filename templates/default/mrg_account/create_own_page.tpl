<div class="contact" id="edit-pers-ownpage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Own page</span></h3>
		<input type='hidden' name='invite_id' id='invite_id' value="{$listid_tpl}" />
		<input type='hidden' name='wedid_tpl' id='wedid_tpl' value="{$tmplwedid}" />
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own page</span></h2>
				<p><span><i class="fa fa-comments" aria-hidden="true"></i></span></p>
				</div>
				<div id="validateTips" class="alert validateTips" role='alert'></div>
				<!-- <div class="validateTips_p1 red_err" align="right">We allowed maximum 3 parah's per pages.</div> -->
				<div class="demo"><div style='float: right; padding: 10px;'><span><a id='managepage' href='managepage.php?wed_id={$tmplwedid}&do=b12d'>Manage own pages!</a></span></div></div>

					<div class="contact-bottom">
                                                    <p>
                                                    <div class="field">
								<table style='width: 100%;'> 
								    {foreach from=$glb_pgeinfos key=k item=v}
								    <tr><td style='width: 100%;'>
								    {if $v.parah_title neq ''}<h3 class="title" style='margin: 1px;'>{$v.parah_title}{else}&nbsp;{/if}</h3>
									<div>
									    {if $v.parah_image_align neq 3} <span {if $v.parah_image_align eq 1} style="float:left; padding: 10px;" {else if $v.parah_image_align eq 2} style="float:right; padding: 10px;" {/if}>
									    {if $v.parah_image_src neq ''}
									    <img class="ownpage_img" src='templates/default/mrg_template/ownpage_images/{$v.master_wed_id}/{$v.wed_ownpage_id}/{$v.parah_image_src}'>
									    {else}
										{if $v.wed_parah_count_id eq 1}<img class="ownpage_img" src='images/proposal_1.jpg'>
										{elseif $v.wed_parah_count_id eq 2}<img class="ownpage_img" src='images/family_1.jpg'>
										{else}<img class="ownpage_img" src='images/lovehim.jpg'>
										{/if}
									    {/if}
									    </span>
									    {/if}
									    <div><span>{$v.parah_content}</span></div>
									</div>
								    </td></tr>
								    <tr><td style='text-align: right;'>
									<a id='dele_p1' href='ownpage.php?wed_id={$v.master_wed_id}&do=kavied&list_id={$v.wed_ownpage_id}&p1=d&parah_id={$v.wed_parah_count_id}' title='Delete This' onClick="return confirm('Are you sure you want to delete this parah?')"><img alt="Delete This" height="20" src="images/delete_20.png" width="20" /></a>
								    </td></tr>
								    <tr><td style='padding-bottom: 10px;'>&nbsp;</td></tr>
								    {/foreach}
								    </table>
                                                    </div>
                                                    </p>
				</div>
			</div>
			<div class="col-md-9">
					<div class="contact-bottom">
				{if $errors neq ''}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $tpl_show_sts eq '1'}<div class="alert green_succ" role='alert'>{$tpl_succ_msg}</div>{/if}
                                                    <p>
                                                    <div class="field">
							{if $glb_rowcount neq 4}
								<form method='post' enctype="multipart/form-data" id="create_own_page{$glb_rowcount}" name="create_own_page{$glb_rowcount}">
								    <p>
									<div class="field">
									<h4>Have the photo appear to the:</h4><br >
									    <ul>
										<li><input id="1" name="img_align"  class='img_align' type="radio" value="1" checked="checked" /> Left of the text -  <span><font color="red">Example</font></span></li>
										<li><input id="2" name="img_align"  class='img_align' type="radio" value="2" {if $glb_radio_highlight eq 2 } checked="checked" {/if} /> Right of the text -  <span><font color="red">Example</font></span></li>
										<li><input id="3" name="img_align" class='img_align' type="radio" value="3" {if $glb_radio_highlight eq 3 } checked="checked" {/if} /> No photos -  <span><font color="red">Example</font></span></li>
									    </ul>
									</div>
								    </p>

								    <div id='left_img' style="padding-top: 30px;"><!-- Left Image start 1 -->
									<p><div class="field">
									    <label>Parah title:</label>
									    <input type="text" name="title_p{$glb_rowcount}" id="title_p{$glb_rowcount}" value="{$glb_title_highlight_p1}"/>
									 </div></p>
									<div class="field">
									    <table style='width: 100%;'>
										<input type='hidden' name='invite_id' id='invite_id' value="{$listid_tpl}" />
										<input type='hidden' name='wed_id' id='wed_id' value="{$tmplwedid}" />
										    <tr><td style='width: 20%;  vertical-align: top;'><img src="images/proposal_1.jpg" class="ownpage_img" />
											<input id="uploaded_image_{$glb_rowcount}" name="uploaded_image_{$glb_rowcount}" size="30" type="file" />
										    </td><td style='width: 80%;'><textarea style="height: 100px;" id="txt_area_left_infos_{$glb_rowcount}" name="txt_area_left_infos_{$glb_rowcount}" rows="15" cols="120" >{$glb_highlight_txtarea_1}</textarea></td></tr>
										    
										    <tr><td style='width: 100%; text-align: center;' colspan='2' >
											<div style='padding: 10px;'>
											<input  name="save_parah_first" id='save_parah_first' class='button1' type="submit" value="Save">
											<input  name="cancel_p" id='cancel_p' class='button' type="reset" value="Cancel">
											</div>
										    </td></tr>
									    </table>
									</div>
									</div><!-- Left Image end 1 -->
								
									<div id='right_img' style='display: none; padding-top: 30px;'><!-- Right image start 1 -->
									    <p>
										<div class="field">
										<label>Parah title:</label>
										<input type="text" name="title_right_p{$glb_rowcount}" id="title_right_p{$glb_rowcount}" value="{$glb_title_highlight_p2}"/>
										</div>
									    </p>
									    <div class="field">
										<table style='width: 100%;'>
										    <tr><td style='width: 80%;'><textarea style="width: 100%; height: 100px;" id="txt_area_right_infos_{$glb_rowcount}" name="txt_area_right_infos_{$glb_rowcount}" >{$glb_highlight_txtarea_2}</textarea></td>
										    <td style='width: 20%;  vertical-align: top;'><img src="images/lovehim.jpg" class="ownpage_img"/>
										    <input id="uploaded_rightimage_{$glb_rowcount}" name="uploaded_rightimage_{$glb_rowcount}" size="30" type="file" />
										    </td></tr>
										    <tr><td style='width: 100%; text-align: center;' colspan='2' >
											<div style='padding: 10px;'><input  class='button' name="save_right" id='save_right' type="submit" value="Save">
											<input  name="cancel_right" class='button' id='cancel_right' type="reset" value="Cancel"></div>
										    </td></tr>
										</table>
									    </div>
									</div><!-- Right image end 1 -->

									<div id='no_img' style='display: none; padding-top: 30px;'> <!-- Span - No image start -->
									    <p>
									    <div class="field">
									    <label>Parah title:</label>
									    <input type="text" name="title_no_img_p{$glb_rowcount}" id="title_no_img_p{$glb_rowcount}" value="{$glb_title_highlight_p3}" />
									    </div>
									    </p>
								
									    <div class="field">
										<table style='width: 100%;'>
										    <tr><td style='width: 100%;' colspan='2'><textarea style="height: 100px; width: 100%;" id="txt_area_noimg_infos_{$glb_rowcount}" name="txt_area_noimg_infos_{$glb_rowcount}" rows="15" cols="120">{$glb_highlight_txtarea_3}</textarea></td></tr>
										    <tr><td style='width: 100%; text-align: center;' colspan='2' >
											<div style='padding: 10px;'><input  name="save_no_img" class='button' id='save_no_img' type="submit" value="Save">
											<input  name="cancel_no_img_p{$glb_rowcount}" class='button' id='cancel_no_img_p{$glb_rowcount}' type="reset" value="Cancel"></div>
										    </td></tr>
										</table>
									    </div>
								    </div><!-- Span - No image END -->
								</form>
							{else}
								    <div class="alert validateTips ui-state-error" role='alert'>We are allowed to add 3 paragraphs per page. You've already reached maximum paragraph count.</div>
							{/if}
                                                    </div>
                                                    </p>
							<input type='hidden' name='max_parah' id='max_parah' value='{$tpl_parahcnt}' >
							    <div class="demo">
								<div style='float: right; padding: 10px;'>
								    <span><a id='managepage' href='managepage.php?wed_id={$tmplwedid}&do=b12d'>Manage own pages!</a></span>
								    <span style='display: none;'><a id='show_parah' class='show_parah'>Add new parah!</a></span>
								</div>
							    </div>
					</div>
		<div class="clearfix"> </div>
		</div>

	</div>
</div>