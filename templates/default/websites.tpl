<!-- contact -->
<div class="sub_master">
	<div class="container">
	<!-- <div class="sub_head_links">
		<i class="glyphicon glyphicon-log-in sub_links" aria-hidden="true"></i>
		<i class="glyphicon glyphicon-log-in sub_links" aria-hidden="true"></i>
		<i class="glyphicon glyphicon-log-in sub_links" aria-hidden="true"></i>
	</div> -->
	<h1 class="w3layouts_head">DIY Wedding Website</h1>
	<h4 class="w3layouts_head">A wedding website will support your own background photos</h4>
	<!-- Place somewhere in the <body> of your page -->

	<div class="contact-main w3agile">
	<div class="col-md-5 contact-left">
			<ul>	<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i>Creating a wedding website is very easy on InviteIndia.com. You can share your wedding details in one place and easily reach your guests.</li>
				<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i>A responsive wedding website for all your mobile devices.</li>
				<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i>Use your own background images for your wedding website.</li>
				<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i>Animated wedding website templates.</li>
				<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i>Advertising-free wedding website even for free subscribers.</li>
			</ul>
	</div>
	<div class="col-md-7 contact-left">
		<section class="slider bg_theme">
		<h2 class="w3layouts_head font-clr-dark-blue">Personalized wedding themes</h2>
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

<div class="contact-main w3agile">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">
					<p class="write_para"></p>
				</div>
			</div>
</div>

	<h3 class="w3layouts_head font-clr-dark-blue">Frequently Asked Questions</h3>
	<h4 class="w3layouts_head">Frequently asked questions or concerns about the wedding website</h4>
	<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
		<div class="container">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				{$faq_det}
			</div>
		</div>
	</section>
	<div class="contact-main w3agile" >
		<div class="col-md-12 text-right">
			<div class="contact-bottom"><a href="faq.php" class="button">Faq >></a></div>
		</div>
	</div>
	<h3 class="w3layouts_head font-clr-dark-blue">Customer speaks</h3>
	<section class="slider cus_rev">
		<div class="flexslider">
			<ul class="slides">
				{$tpl_cus_reviews}
			</ul>
		</div>
	</section>
	<div class="clearfix"> </div>
	<!-- flexSlider -->
	<div class="contact-main w3agile" >
		<div class="col-md-12 text-right">
			<div class="contact-bottom">
				<p class="write_para"><a href="customer-review.php" class="button">More review >></a></p>
				<p class="write_para"></p>
			</div>
		</div>
	</div>

	</div>
</div>