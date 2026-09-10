<div class="contact" id="edit-pers-ownpage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Own page</span></h3>
		<form id='create_ownpage_title' name='' method='post' action='ownpage_details.php?wed_id={$tmplwedid}'>
		<input type="hidden" id="wed_id" name="wed_id" class="inputval"  value="{$tmplwedid}" />
		<input type="hidden" id="hidd_sub_tit" name="hidd_sub_tit" class="inputval"  value="insert_tit" />

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
				{if $errors neq ''}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
					<div class="contact-bottom">
                                                    <p>
                                                    <div class="field">
                                                    <label style="width:120px;" class='lab_black_color'>Page Title:</label> 
                                                    <input type="text" id="page_title" name="page_title" class="inputval"  value="{$pagetitle_tmp}" />  
                                                    </div>
                                                    </p>

                                                    <p>
                                                    <div class="field">
                                                    <label style="width:120px;" class='lab_black_color'>Link name: *</label> 
                                                    <input type="text" id="link_name" name="link_name" class="inputval" maxlength="20" value="{$linkname_tmp}" required=""/> 
                                                    <div><span><em><font color="red">Max Length: 20 character - Example: About us, Love story, Wedding programs, etc., </font></em></span></div>
                                                    </div>
                                                    </p>
						
						<div>
                                                    <button id="add_title" name="add_title" value="insertnow" class="add_title button" >Submit -> Add page contents.</button>&nbsp;&nbsp;<button id="clear_title" type="reset" class="button">Clear</button>
                                                    </div>
					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>