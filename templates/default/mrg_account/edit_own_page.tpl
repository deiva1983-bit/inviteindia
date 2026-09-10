<div class="contact" id="edit-pers-ownpage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Own page</span></h3>
		<form id='create_ownpage_title' name='' method='post' action=''>

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
				{if $succ neq ''}<div class="alert green_succ" role='alert'>{$succ}</div>{/if}
					<div class="contact-bottom">
						<p>
						<div class="field">
						<label style="width:120px;">Page Title:</label> 
						<input type="text" id="page_title" name="page_title" class="inputval"  value="{$own_pagetitle}" />  
						</div>
						</p>
						<p>
						<div class="field">
						<label style="width:120px;">Link name: *</label> 
						<input type="text" id="link_name" name="link_name" maxlength="20" value="{$own_pagelink}" required="" />
						</div>
						<div><span><em><font color="red">Example: About us, Love story, Wedding programs, etc., </font></em></span></div>
						</p>
						
						<div><button id="butt_edit_ownpage" name="butt_edit_ownpage" value="upnow" class="add_title button" >Submit</button>&nbsp;<button id="clear_title" type="reset" class="button">Clear</button></div>
					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>