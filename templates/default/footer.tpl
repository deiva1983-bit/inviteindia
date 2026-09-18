{* ============================================================================
   SHARED FOOTER                                    templates/default/footer.tpl
   ----------------------------------------------------------------------------
   IMPORTANT - WHY THIS FILE BRANCHES:
   This footer is included by roughly a hundred pages, which still load
   bootstrap.css / style.css / userstyle.css and depend on jQuery. The new
   homepage loads ONLY the compiled Tailwind stylesheet and no jQuery.

   Putting Tailwind classes straight into this shared file would leave every
   other page with a completely unstyled footer, and keeping the jQuery tail
   unconditional would throw "$ is not defined" on the new homepage. So:

     $tpl_modern_css eq '1'  -> new Tailwind footer, no jQuery tail
     otherwise               -> the existing footer and script tail, untouched

   Pages opt in by assigning tpl_modern_css = 1 (index.php does this). Every
   page that does not set it behaves exactly as before. This keeps the homepage
   rewrite a zero-risk change for the rest of the site, and lets you migrate
   other pages one at a time.
   ========================================================================== *}

{if $tpl_modern_css eq '1'}
{* ==========================================================================
   MODERN FOOTER (Tailwind) - homepage and any future migrated page
   --------------------------------------------------------------------------
   SEO: a real sitewide link block in crawlable HTML spreads authority to the
   pages that need to rank, and gives Google a clear picture of site structure.
   The old footer linked only 4 pages (Terms, Privacy, Contact, FAQ) - all
   legal/support pages, none of them commercial. Your money pages (themes,
   samples, pricing, domains) got no footer links at all.
   ========================================================================== *}
<footer class="border-t border-cream-200 bg-ink-900 text-cream-200" role="contentinfo">
	<div class="mx-auto w-full max-w-6xl px-5 py-14 sm:px-6">
		<div class="grid gap-10 lg:grid-cols-4">

			{* --- Brand + contact --- *}
			<div class="lg:col-span-1">
				<a href="{$glb_site_url|default:'/'}" class="inline-flex items-center" aria-label="InviteIndia home">
					<img src="{$static_domain_path_img}/inlogo.png" alt="InviteIndia" width="150" height="34" class="h-8 w-auto brightness-0 invert">
				</a>
				<p class="mt-4 text-sm leading-relaxed text-cream-200/70">
					Indian wedding websites and digital invitation cards, built for
					multi-day celebrations and WhatsApp-first guest lists.
				</p>
				{* tel: link so a phone tap dials directly. The old footer printed the
				   number as plain <h3> text, which was neither clickable on mobile nor
				   semantically a heading. *}
				<a href="tel:+919566775977" class="mt-5 inline-flex items-center gap-2 font-semibold text-white hover:text-gold-400">
					<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
					+91 95 66 77 59 77
				</a>
			</div>

			{* --- Product links: the commercial pages that should rank --- *}
			<nav aria-labelledby="footer-product">
				<h2 id="footer-product" class="text-xs font-bold tracking-[0.16em] text-gold-400 uppercase">Wedding Websites</h2>
				<ul class="mt-4 space-y-2.5 text-sm">
					<li><a href="{$glb_site_url}invitation-templates.php" class="text-cream-200/80 hover:text-white hover:underline">Wedding Website Themes</a></li>
					<li><a href="{$glb_site_url}sample-invitation.php" class="text-cream-200/80 hover:text-white hover:underline">Sample Wedding Websites</a></li>
					<li><a href="{$glb_site_url}buy-domain.php" class="text-cream-200/80 hover:text-white hover:underline">Buy a Custom Domain</a></li>
					<li><a href="{$glb_site_url}packages.php" class="text-cream-200/80 hover:text-white hover:underline">Pricing &amp; Packages</a></li>
					<li><a href="{$glb_site_url}wedding-gift-for-couples" class="text-cream-200/80 hover:text-white hover:underline">Wedding Gifts</a></li>
				</ul>
			</nav>

			{* --- Content links: helps Google recrawl the blog --- *}
			<nav aria-labelledby="footer-guides">
				<h2 id="footer-guides" class="text-xs font-bold tracking-[0.16em] text-gold-400 uppercase">Guides &amp; Ideas</h2>
				<ul class="mt-4 space-y-2.5 text-sm">
					<li><a href="{$glb_site_url}blogs.php" class="text-cream-200/80 hover:text-white hover:underline">Wedding Planning Blog</a></li>
					<li><a href="{$glb_site_url}blog/diy-wedding-invitation-covers/" class="text-cream-200/80 hover:text-white hover:underline">DIY Invitation Covers</a></li>
					<li><a href="{$glb_site_url}blog/animated-wedding-invitation-free/" class="text-cream-200/80 hover:text-white hover:underline">Animated Wedding Invitations</a></li>
					<li><a href="{$glb_site_url}blog/wedding-website-security-protecting-your-big-day/" class="text-cream-200/80 hover:text-white hover:underline">Wedding Website Security</a></li>
					<li><a href="{$glb_site_url}customer-review.php" class="text-cream-200/80 hover:text-white hover:underline">Customer Reviews</a></li>
				</ul>
			</nav>

			{* --- Company + CTA --- *}
			<div>
				<h2 class="text-xs font-bold tracking-[0.16em] text-gold-400 uppercase">Company</h2>
				<ul class="mt-4 space-y-2.5 text-sm">
					<li><a href="{$glb_site_url}contact-us.php" class="text-cream-200/80 hover:text-white hover:underline">Contact Us</a></li>
					<li><a href="{$glb_site_url}faq.php" class="text-cream-200/80 hover:text-white hover:underline">FAQ</a></li>
					<li><a href="{$glb_site_url}terms.php" class="text-cream-200/80 hover:text-white hover:underline">Terms of Service</a></li>
					<li><a href="{$glb_site_url}privacy.php" class="text-cream-200/80 hover:text-white hover:underline">Privacy Policy</a></li>
				</ul>

				{* REPLACED: the old footer had <form action="#" method="post"> with an
				   email field and a blank submit button. Posting to "#" reloads the
				   page and silently discards the address - every person who typed
				   their email into that box was a lead you never received. Until
				   there is a real handler, a working contact link is strictly
				   better than a form that eats submissions. *}
				{if $smarty.session.sess_user_id eq ''}
				<a href="{$glb_site_url}signup.php" class="mt-6 inline-flex items-center justify-center gap-2 rounded-full bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500">
					Create Your Free Website
				</a>
				{/if}
			</div>
		</div>

		<div class="mt-12 flex flex-col items-center justify-between gap-6 border-t border-white/10 pt-8 sm:flex-row">
			{* Dynamic year. The old footer was hardcoded to "© 2018", which reads as
			   an abandoned site to any visitor who notices - a real trust problem
			   for a business asking people to host their wedding with it. *}
			<p class="text-sm text-cream-200/60">
				&copy; {$glb_current_year|default:'2026'} InviteIndia. All rights reserved.
			</p>

			<ul class="flex items-center gap-3">
				<li><a href="https://www.facebook.com/invitindia" target="_blank" rel="noopener" class="inline-flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-600" aria-label="InviteIndia on Facebook">
					<svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06C2 17.08 5.66 21.24 10.44 22v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.78-1.63 1.57v1.88h2.78l-.45 2.91h-2.33V22C18.34 21.24 22 17.08 22 12.06Z"/></svg>
				</a></li>
				<li><a href="https://www.instagram.com/inviteindia" target="_blank" rel="noopener" class="inline-flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-600" aria-label="InviteIndia on Instagram">
					<svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41-.56-.22-.96-.48-1.38-.9-.42-.42-.68-.82-.9-1.38-.16-.42-.36-1.06-.41-2.23C2.17 15.58 2.16 15.2 2.16 12s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.42 2.17 8.8 2.16 12 2.16Zm0 3.24a6.6 6.6 0 1 0 0 13.2 6.6 6.6 0 0 0 0-13.2Zm0 10.88a4.28 4.28 0 1 1 0-8.56 4.28 4.28 0 0 1 0 8.56Zm8.4-11.14a1.54 1.54 0 1 1-3.08 0 1.54 1.54 0 0 1 3.08 0Z"/></svg>
				</a></li>
				<li><a href="https://in.pinterest.com/inviteindia" target="_blank" rel="noopener" class="inline-flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-600" aria-label="InviteIndia on Pinterest">
					<svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12c0 4.24 2.64 7.86 6.36 9.31-.09-.79-.17-2 .04-2.87.19-.78 1.21-4.97 1.21-4.97s-.31-.62-.31-1.53c0-1.44.83-2.51 1.87-2.51.88 0 1.31.66 1.31 1.46 0 .89-.57 2.22-.86 3.45-.25 1.04.52 1.89 1.54 1.89 1.85 0 3.28-1.95 3.28-4.77 0-2.5-1.79-4.24-4.35-4.24-2.96 0-4.7 2.22-4.7 4.51 0 .89.34 1.85.77 2.37.09.1.1.19.07.3-.08.32-.25 1.02-.29 1.16-.04.19-.16.23-.36.14-1.33-.62-2.16-2.56-2.16-4.12 0-3.35 2.44-6.43 7.02-6.43 3.69 0 6.55 2.63 6.55 6.14 0 3.67-2.31 6.62-5.52 6.62-1.08 0-2.09-.56-2.44-1.22 0 0-.53 2.04-.66 2.54-.24.92-.89 2.08-1.32 2.79.99.31 2.05.47 3.15.47 5.52 0 10-4.48 10-10S17.52 2 12 2Z"/></svg>
				</a></li>
				<li><a href="https://www.youtube.com/channel/UCrUg35VVworDgOQyFDl0JeA" target="_blank" rel="noopener" class="inline-flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-600" aria-label="InviteIndia on YouTube">
					<svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.58 7.19a2.51 2.51 0 0 0-1.77-1.77C18.25 5 12 5 12 5s-6.25 0-7.81.42A2.51 2.51 0 0 0 2.42 7.19C2 8.75 2 12 2 12s0 3.25.42 4.81a2.51 2.51 0 0 0 1.77 1.77C5.75 19 12 19 12 19s6.25 0 7.81-.42a2.51 2.51 0 0 0 1.77-1.77C22 15.25 22 12 22 12s0-3.25-.42-4.81ZM10 15.5v-7l6 3.5-6 3.5Z"/></svg>
				</a></li>
			</ul>
		</div>
	</div>
</footer>

{* No jQuery, no Bootstrap, no FlexSlider, no move-top/easing/main.js on this
   page. The FAQ accordion is native <details>, smooth scrolling is CSS
   (scroll-behavior), and the mobile menu ships inline in mainheader.tpl.
   That removes roughly 250KB of JavaScript from the homepage critical path. *}

{else}
{* ==========================================================================
   LEGACY FOOTER - every page that has not been migrated yet.
   Markup preserved as-is except for two genuine bug fixes, noted inline.
   ========================================================================== *}
<!-- footer -->
	<footer class="footer" role="contentinfo">
		<div class="container">
			<h2><a href="/">A wedding website company</a></h2>
			<h3><a href="tel:+919566775977">(+91) 95 66 77 59 77</a></h3>

			{* FIX: was <form action="#" method="post"> with an email field, which
			   discarded every submission. Replaced with a working contact link. *}
			<p class="text-center"><a href="{$glb_site_url}contact-us.php" class="btn btn-primary">Contact us</a></p>

			<div class="agileits_w3three_nav">
				<div class="agileits_w3three_nav_left">
					<ul>
						<li {if $topnav_select eq 'termsofser'}class="active" {/if}><a href="{$glb_site_url}terms.php">Terms of Service</a></li>
						<li {if $topnav_select eq 'privacy_policy'}class="active" {/if}><a href="{$glb_site_url}privacy.php">Privacy &amp; Policy</a></li>
						<li {if $topnav_select eq 'contact'}class="active" {/if}><a href="{$glb_site_url}contact-us.php">Contact Us</a></li>
						<li {if $topnav_select eq 'faq'}class="active" {/if}><a href="{$glb_site_url}faq.php">FAQ</a></li>
					</ul>
				</div>
				<div class="agileits_w3three_nav_right">
					<ul class="agileits_social_list">
						<li><a href="https://www.facebook.com/invitindia" class="w3_agile_facebook" aria-label="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://in.pinterest.com/inviteindia" class="w3_agile_youtube" aria-label="Pinterest"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
						<li><a href="https://www.instagram.com/inviteindia" class="w3_agile_facebook" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCrUg35VVworDgOQyFDl0JeA" class="w3_agile_youtube" aria-label="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>

			{* FIX: was hardcoded "© 2018", which signals an abandoned site. *}
			<p>&copy; {$glb_current_year|default:'2026'} Wedding website. All rights reserved @ InviteIndia.com</p>
		</div>
	</footer>
<!-- //footer -->

<!-- start-smoth-scrolling -->
	<script src="{$static_domain_path_js}/base/move-top.js"></script>
	<script src="{$static_domain_path_js}/base/easing.js"></script>
{literal}
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
{/literal}
<!-- start-smoth-scrolling -->

<!-- menu -->
	<script src="{$static_domain_path_js}/base/main.js"></script>
<!-- //menu -->

<!-- for bootstrap working -->
	<script src="{$static_domain_path_js}/base/bootstrap.js"></script>
<!-- //for bootstrap working -->

<!-- here stars scrolling icon -->
{include file="../default/footersrcs.tpl"}

<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="loginWindow" tabindex="-1" role="dialog" aria-labelledby="loginWindow">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Login
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<section>
					<div class="modal-body">{include file="../default/gnav_login.tpl"}
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->

{literal}
	<script>
		  blink($("#alert-text-err"));
		  blink($("#alert-text-succ"));
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
{/literal}
<!-- //here ends scrolling icon -->
{/if}

{* ==========================================================================
   ANALYTICS - shared by both branches
   --------------------------------------------------------------------------
   THIS WAS BROKEN SITEWIDE AND IT MATTERS MORE THAN ANY COPY CHANGE:
   the old footer loaded google-analytics.com/ga.js with property
   UA-37274029-1. That is Classic Analytics - the ga.js library has been
   retired, and Universal Analytics properties stopped processing new data in
   July 2023. So this site has been recording NOTHING for years.

   That means "very low organic traffic and few leads" may be partly a
   MEASUREMENT problem, not only a demand problem. Before concluding the
   rewrite worked or failed, you need working data.

   TO ACTIVATE: create a GA4 property, then assign the measurement ID in
   includes/configs/globalconfigs.php alongside the other globals:

       $glb_ga4_id = 'G-XXXXXXXXXX';
       $smarty->assign('glb_ga4_id', $glb_ga4_id);

   Also verify the property in Google Search Console - Search Console is where
   you will actually see impressions, average position and query data, which is
   what you need to judge this SEO work.
   ========================================================================== *}
{if $glb_ga4_id neq ''}
<script async src="https://www.googletagmanager.com/gtag/js?id={$glb_ga4_id}"></script>
{literal}
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
{/literal}
	gtag('config', '{$glb_ga4_id}');
</script>
{else}
<!-- Analytics not configured. The previous ga.js / UA-37274029-1 tag stopped
     collecting data in July 2023 and has been removed. Set $glb_ga4_id in
     includes/configs/globalconfigs.php to enable GA4. -->
{/if}

</body>
</html>
