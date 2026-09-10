<!-- contact -->
<div class="contact" id="owndomain">
	<div class="container">
	<h1 class="w3layouts_head">Domain Registration for Wedding</h1>
	{if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
		<!-- <p class="w3_para">Login</p> -->
		<div class="w3agile">
			<form class="owndomain" {if $glb_user_log_id neq ''} action="mydomain.php" method="post" {else} action="#" onSubmit="return false;" {/if} id="packgage">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">
				<p class="write_para">Registering a domain for your wedding is a fantastic idea if you want to create a personalized website or online platform to share information, updates, photos, and other details with your guests. It will reflect your personality and style, making it easy for your guests to remember and type in.</p>
				<p class="write_para"><img src='{$static_domain_path_img}/site/owndom.jpg' class="img-thumbnail" alt="Personal Domain registration" /></p>
				<h2 class="sub_head">Here's how you can go about registering a domain for your wedding:</h2>
				<h4 class="sub_head">Choose a domain name:</h4>
				<p>Start by selecting a domain name that reflects your personalities, the theme of your wedding, or your name along with your fiance's name. Keep it simple, memorable, and easy to spell. So it will help your guest remember easily.</p>
				<h4 class="sub_head">Check Availability:</h4>
				<p>Use a domain registration service (such as GoDaddy, Namecheap, Bluehost, etc.) to check if your desired domain name is available. If it's already taken, you might need to come up with variations or consider using different domain extensions (.com,.net,.wedding, etc.).</p>
				<h4 class="sub_head">Choose a Domain Extension:</h4>
				<p>There are various domain extensions available beyond the traditional .com, such as .wedding, .love, .events, and more. Choose the one that best suits the purpose of your website.</p>
				<h4 class="sub_head">Create Your Website:</h4>
				<p>You can create an account at inviteindia.com, select any of the wedding invitation templates, and include information about the wedding date, venue, RSVP details, accommodation options, love story, and any other content you'd like to share with your guests.</p>
				<h4 class="sub_head">Customise and Share:</h4>
				<p>Personalise your website with images, colours, and content that reflect your wedding theme and style. Share the link with your guests through invitations, save-the-dates, and social media platforms.</p>
				<h4 class="sub_head">Keep It Updated:</h4>
				<p>Continuously update your website with new information, photos, and any changes related to the wedding. This will help keep your guests informed and engaged.</p>

				

				<h2 class="sub_head">Personal Domain registration - FAQs</h2>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				{$faq_det}
				</div>
				<div class='col-xs-12 text-center manage-space'><input type="submit" id="butt_reset" value='Register my domain' class="button" {if $glb_user_log_id eq ''} data-toggle="modal" data-target="#loginWindow" id="gnav_login" {/if} /></div>
				</div>
			</div>
			</form>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>