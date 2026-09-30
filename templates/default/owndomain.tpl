<!-- contact -->
<div class="contact" id="owndomain">
	<div class="container">
	<h1 class="w3layouts_head">Get Your Personal Wedding Domain - Just ₹650</h1>
	{if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
		<!-- <p class="w3_para">Login</p> -->
		<div class="w3agile">
			<form class="owndomain" {if $glb_user_log_id neq ''} action="mydomain.php" method="post" {else} action="#" onSubmit="return false;" {/if} id="packgage">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">
				<section class="domain-intro">
					<p class="write_para"><strong>Make your wedding website unforgettable with a personal domain.</strong> Registering a domain for your wedding is a fantastic idea if you want to create a personalized website or online platform to share information, updates, photos, and other details with your guests. It will reflect your personality and style, making it easy for your guests to remember and type in.</p>
					<p class="write_para"><img src='{$static_domain_path_img}/site/owndom.jpg' class="img-thumbnail" alt="Personal Domain registration for weddings" /></p>
				</section>

				<section class="domain-benefits">
					<h2 class="sub_head" style="margin-top: 25px; font-size: 20px;">Why Buy a Personal Wedding Domain?</h2>
					<ul style="margin: 15px 0 25px 0; padding-left: 0;">
						<li class="write_para"><strong>✓ Memorable & Professional:</strong> yournames-wedding.com looks far more professional than a generic link</li>
						<li class="write_para"><strong>✓ Affordable:</strong> Domain registration with hosting costs just ₹650 for a full year</li>
						<li class="write_para"><strong>✓ Easy to Share:</strong> Send a simple, elegant link via WhatsApp, email, or social media</li>
						<li class="write_para"><strong>✓ Completely Customizable:</strong> Full control over design, colors, and wedding content</li>
						<li class="write_para"><strong>✓ Built-in RSVP:</strong> Collect guest responses and manage attendance directly</li>
					</ul>
				</section>

				<section class="domain-steps">
					<h2 class="sub_head" style="margin-top: 30px; font-size: 20px;">How to Register Your Wedding Domain - 5 Easy Steps:</h2>
				<h3 class="sub_head" style="font-size: 16px; margin: 20px 0 10px 0;">Step 1: Choose a Domain Name</h3>
				<p>Start by selecting a domain name that reflects your personalities, the theme of your wedding, or your name along with your fiance's name. Keep it simple, memorable, and easy to spell. So it will help your guest remember easily.</p>
				<h3 class="sub_head" style="font-size: 16px; margin: 20px 0 10px 0;">Step 2: Check Availability</h3>
				<p>Use a domain registration service (such as GoDaddy, Namecheap, Bluehost, etc.) to check if your desired domain name is available. If it's already taken, you might need to come up with variations or consider using different domain extensions (.com,.net,.wedding, etc.).</p>
				<h3 class="sub_head" style="font-size: 16px; margin: 20px 0 10px 0;">Step 3: Choose a Domain Extension</h3>
				<p>There are various domain extensions available beyond the traditional .com, such as .wedding, .love, .events, and more. Choose the one that best suits the purpose of your website.</p>
				<h3 class="sub_head" style="font-size: 16px; margin: 20px 0 10px 0;">Step 4: Create Your Wedding Website</h3>
				<p>You can create an account at inviteindia.com, select any of the wedding invitation templates, and include information about the wedding date, venue, RSVP details, accommodation options, love story, and any other content you'd like to share with your guests.</p>
				<h3 class="sub_head" style="font-size: 16px; margin: 20px 0 10px 0;">Step 5: Customize and Share</h3>
				<p>Personalise your website with images, colours, and content that reflect your wedding theme and style. Share the link with your guests through invitations, save-the-dates, and social media platforms.</p>
				</section>


				<section class="domain-faq">
					<h2 class="sub_head" style="margin-top: 30px; font-size: 20px;">Frequently Asked Questions About Wedding Domain Registration</h2>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					{$faq_det}
					</div>
				</section>

				<div class='col-xs-12 text-center manage-space' style="margin-top: 30px;"><input type="submit" id="butt_reset" value='Register my Domain Now - ₹650' class="button" style="font-size: 16px; padding: 12px 30px;" {if $glb_user_log_id eq ''} data-toggle="modal" data-target="#loginWindow" id="gnav_login" {/if} /></div>
				</div>
			</div>
			</form>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>