<div class="contact" id="edit-pers-ownimage">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Add your own background images</span></h3>
		<form name='ownimage' id='ownimage' method='post' action='newimage.php?wed_id={$user_wedid}' enctype="multipart/form-data">
		<input type='hidden' name='page_name' id='page_name' value='{$page_name}'>

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Add your<span> own background image</span></h2>
				<p><span><i class="fa fa-picture-o" aria-hidden="true"></i></span></p>
				</div>
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
					<div class="contact-bottom">
						<div>
						<h3 class="sub_head">{if $page_name eq 1}All wedding pages {elseif $page_name eq 2}Wedding home page{elseif $page_name eq 3}Wedding event page{elseif $page_name eq 4}Guestbook page{elseif $page_name eq 5}Find location page{/if} - Select background images</h3>
						</div>

						<div style='text-align: right;'>
						<a href='' id="select_pages_top" name="{$user_wedid}" value="selectpages">Select another pages</a>
						</div>

						<div>
							<label>Upload your image:</label> 
							<input type="file" name="uploaded_bg_img" id="uploaded_bg_img"/>
						</div>
						
						<div>
						<input type='submit' name='addownimage' id='addownimage' value='Upload image'  class='button'>
						</div>

						<div class="demo">&nbsp;</div><div class="demo">&nbsp;</div>
						
						<div class="demo" style='text-align: right;'>
						<a href='' id="select_pages_bott" name="{$user_wedid}" value="selectpages">Select another pages</a>
						</div>
					</div>
		<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>