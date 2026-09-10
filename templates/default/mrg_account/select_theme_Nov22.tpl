	<div class="portfolio" id="theme_selection">
		<div class="container">
		<h1 class="w3layouts_head">Wedding Website Templates</h1>
		<p class="w3_para">We have responsive wedding website templates and a variety of banners. You can start by choosing the look for your website and easily switch wedding themes at any time.</p>
		</div>
	</div>{if $errors != ''}<div class="alert validateTips ui-state-error" role="alert">{$errors}</div>{/if}
		<div class="portfolio agile-ser">
			{if $edit_theme_link neq ''}<div class="col-md-12 text-left">{$edit_theme_link}</div><div>&nbsp;</div>{/if}
			<div class="container" id="themes_with_onbg">
				<!-- <div class="w3layouts_header">
				<h2 class="sub_head_max">Premium<span> themes</span></h2>
				<p><span><i class="fa fa-inr" aria-hidden="true"></i></span></p>
				</div>
				<div id="class_images_with_bg">{$classic_commdetails_bg}</div>
				<div><div class=clearfix>&nbsp;</div></div> -->
				
				<div id="class_images_without_bg">{$classic_commdetails}</div>
				<div><div class=clearfix></div></div>

				<!-- <div class="w3layouts_header">
				<h2 class="sub_head_max">Free<span> themes</span></h2>
				<p><span><i class="fa fa-th" aria-hidden="true"></i></span></p>
				</div> -->

				<div id="class_images_comm">{$commdetails}</div>
				<div><div class=clearfix></div></div>
			</div>
		</div>
