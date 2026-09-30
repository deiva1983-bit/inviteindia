<div class="contact" id="theme_selection">
	<div class="container">
		<h1 class="w3layouts_head">Free Wedding Invitation Templates with RSVP Management</h1>
		{if $errors != ''}<div class="alert validateTips ui-state-error" role="alert">{$errors}</div>{/if}

		<div class="contact-main w3agile">
			<div class="col-md-12 contact-left">
				<section class="invitation-features">
					<h2 class="section-heading" style="font-size: 22px; font-weight: 600; margin: 20px 0 15px 0; color: #333;">Why Choose InviteIndia's Wedding Invitation Templates?</h2>
					<ul>
						<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i><strong>Fully Responsive Design:</strong> We have curated an assortment of adaptable wedding invitation templates designed with an attractive format that effortlessly adapts to different screen sizes. This makes it an ideal choice for crafting a stunning website that exudes elegance not only on desktop monitors but also on tablets, smartphones, and beyond.</li>
						<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i><strong>Beautiful Theme Styles:</strong> Choose from a range of themes, including Beach weddings, Rustic aesthetics, Garden-inspired layouts, Vintage designs, Whimsical motifs, and Romantic styles. Customize further by adding your own background images and music to create a truly personalized experience.</li>
						<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i><strong>Built-in RSVP & Guest Management:</strong> Collect guest responses, manage attendance, and organize your wedding guest list directly from your invitation website.</li>
						<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i><strong>Custom Domain Support:</strong> Use your own domain name (e.g., yournames-wedding.com) to make your invitation personal and memorable.</li>
						<li class="write_para"><i class="fa fa-check-square" aria-hidden="true"></i><strong>Easy Sharing:</strong> Share your wedding invitation via WhatsApp, email, Facebook, or any social platform. Get a custom short link for easy sharing.</li>
					</ul>
				</section>
			</div>
		<div class="clearfix"></div>
		</div>




	<div class="portfolio agile-ser">
		{if $edit_theme_link neq ''}<div class="col-md-12 text-left">{$edit_theme_link}</div><div>&nbsp;</div>{/if}
		<div class="container" id="themes_with_onbg">
			<h2 class="w3layouts_header" style="font-size: 24px; margin: 30px 0 20px 0; text-align: center; color: #333;">Browse Our Wedding Invitation Template Collection</h2>

			<div class="templates-section">
				<h3 class="sub_head_max" style="font-size: 18px; margin: 25px 0 15px 0; color: #555;">Popular Wedding Invitation Designs</h3>
				<div id="class_images_without_bg">{$classic_commdetails}</div>
				<div><div class=clearfix></div></div>
			</div>

			<div class="templates-section">
				<h3 class="sub_head_max" style="font-size: 18px; margin: 25px 0 15px 0; color: #555;">Free Wedding Template Styles</h3>
				<div id="class_images_comm">{$commdetails}</div>
				<div><div class=clearfix></div></div>
			</div>

			{if $classic_commdetails_bg neq ''}
			<div class="templates-section">
				<h3 class="sub_head_max" style="font-size: 18px; margin: 25px 0 15px 0; color: #555;">Premium Templates with Background Support</h3>
				<div id="class_images_with_bg">{$classic_commdetails_bg}</div>
				<div><div class=clearfix></div></div>
			</div>
			{/if}
		</div>
	</div>

	</div>
</div>