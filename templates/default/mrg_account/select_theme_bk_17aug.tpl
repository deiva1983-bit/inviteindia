<div class="contact" id="theme_selection">
	<div class="container"><h1 class="w3layouts_head">Create Stunning Online Wedding Invitations</h1>
	{if $errors != ''}<div class="alert validateTips ui-state-error" role="alert">{$errors}</div>{/if}

	<div class="contact-main w3agile">
		<div class="col-md-5 contact-left">
				<ul>	<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i> A responsive wedding website template has an attractive design that adapts to different screen sizes. It's perfect for creating a beautiful website that looks great on desktop computers, tablets, smartphones, and more.</li>
					<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i> Apply your own background images and attract your guests.</li>
					<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i> Offering animation, classic, colourful , elegant, modern, and romantic website templates.</li>
				</ul>
		</div>
		<div class="col-md-7 contact-left">
			<section class="slider bg_theme">
			<div class="flexslider">
				<ul class="slides">
					<li><img src="static/images/banner-1.jpg" class='img-thumbnail' alt="Wedding website with native background image" /></li>
					<li><img src="static/images/banner-2.jpg" class='img-thumbnail' alt="Mobile wedding website with native background image" /></li>
					<li><img src="static/images/banner-3.jpg" class='img-thumbnail' alt="Desktop wedding website" /></li>
					<li><img src="static/images/banner-4.jpg" class='img-thumbnail' alt="Mobile wedding website" /></li>
				</ul>
			</div>
			</section>
				<!-- flexSlider -->
					<script defer src="{$static_domain_path_js}/base/jquery.flexslider.js"></script>
					<script>
						$(window).load(function(){
						  $('.flexslider').flexslider({
							    animation: "slide",
							    controlsContainer: $(".custom-controls-container"),
							    customDirectionNav: $(".custom-navigation a")
						  });
						});
					</script>
				<!-- //flexSlider -->
		
		</div>
	<div class="clearfix"></div>
	</div>




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

	</div>
</div>