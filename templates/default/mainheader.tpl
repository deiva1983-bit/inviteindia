{* ============================================================================
   HOMEPAGE HEAD + NAVIGATION                    templates/default/mainheader.tpl
   ----------------------------------------------------------------------------
   Rendered by index.php. Contains <head> and the site <header>/nav only.

   WHY THE HERO MOVED OUT OF THIS FILE:
   index.tpl composes the page as {$header}<main>{$content}</main>{$footer}.
   The old build put the <h1> in this file, which placed the page's single most
   important heading OUTSIDE <main>. The hero now lives in main.tpl so the <h1>
   sits inside <main> where Google expects the primary content to be.
   ========================================================================== *}
<!DOCTYPE html>
{* lang="en-IN" not "en": tells Google this targets Indian English, which
   matters for a business whose whole market is India. *}
<html lang="en-IN">
<head>
	{* charset must be in the first 1024 bytes, so it goes first. *}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

	{* ---- TITLE + DESCRIPTION -------------------------------------------------
	   Set from index.php. Front-loaded with the money keywords because Google
	   weights the start of the title, and mobile SERPs truncate near 60 chars. *}
	<title>{$pagetitle|default:'Indian Wedding Website Builder &amp; Digital Invitation Maker | InviteIndia'}</title>
	<meta name="description" content="{$metadesc|default:'Create a free Indian wedding website and matching digital invitation card. WhatsApp RSVP, Google Maps directions, wedding music, custom domain and multi-event timeline.'}">

	{* ---- CANONICAL + INDEXING ------------------------------------------------
	   REMOVED: <meta name="robots" content="NOODP">. NOODP told search engines
	   not to use DMOZ directory descriptions; DMOZ shut down in 2017 and the
	   directive has been ignored since. It was the ONLY robots directive on this
	   page, so the page had no preview instructions at all.
	   ADDED: max-image-preview:large, which is what makes Google show a large
	   thumbnail next to your result on mobile - a direct click-through win for a
	   visual product like wedding stationery. *}
	<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	{if $can_url neq ''}
	<link rel="canonical" href="{$can_url}">
	{/if}
	{* Self-referential hreflang with an x-default fallback. The old page declared
	   en-in with no x-default, which is an incomplete annotation set. *}
	<link rel="alternate" href="https://www.inviteindia.com/" hreflang="en-IN">
	<link rel="alternate" href="https://www.inviteindia.com/" hreflang="x-default">

	{* ---- OPEN GRAPH / WHATSAPP SHARING --------------------------------------
	   THIS WAS THE SINGLE WORST BUG ON THE PAGE. The old head hardcoded:
	     og:url         -> https://www.inviteindia.com/invitation-templates.php
	     og:title       -> "Free wedding websites with more attaractive features."
	     og:description -> a fixed string, ignoring $metadesc
	     og:image       -> absent entirely
	   So every WhatsApp / Facebook share of your homepage pointed at the wrong
	   page and rendered a blank grey card with a typo in the title. For a product
	   that spreads almost entirely by WhatsApp forward, a missing og:image is a
	   direct, compounding loss of referral traffic.
	   og:image must be an ABSOLUTE https URL - WhatsApp will not resolve a
	   relative path. Recommended asset size is 1200x630. *}
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="InviteIndia">
	<meta property="og:locale" content="en_IN">
	<meta property="og:url" content="{$can_url|default:'https://www.inviteindia.com/'}">
	<meta property="og:title" content="{$glb_og_title|default:$pagetitle}">
	<meta property="og:description" content="{$glb_og_desc|default:$metadesc}">
	<meta property="og:image" content="{$glb_og_image}">
	<meta property="og:image:secure_url" content="{$glb_og_image}">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:alt" content="InviteIndia wedding website and digital invitation card shown on a phone and laptop">
	<meta property="article:publisher" content="https://www.facebook.com/invitindia">

	{* Twitter/X card. summary_large_image gives the big visual card; the old
	   page had no Twitter tags at all, so X fell back to a bare text link. *}
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{$glb_og_title|default:$pagetitle}">
	<meta name="twitter:description" content="{$glb_og_desc|default:$metadesc}">
	<meta name="twitter:image" content="{$glb_og_image}">
	<meta name="twitter:image:alt" content="InviteIndia wedding website and digital invitation card preview">

	{* ---- ICONS + BROWSER CHROME -------------------------------------------- *}
	<link rel="icon" href="{$static_domain_path_img}/site/favicon.png" type="image/png">
	<meta name="theme-color" content="#b3123c">

	{* ---- FONTS ---------------------------------------------------------------
	   WAS: four separate Google Fonts requests (Great Vibes, Poiret One,
	   Montserrat, Open Sans) = 4 render-blocking round trips before first paint.
	   NOW: two families in one request + display=swap so text paints immediately
	   in a fallback font instead of staying invisible. Directly improves LCP and
	   removes the font-driven layout shift that hurt CLS. *}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

	{* ---- STYLES --------------------------------------------------------------
	   ONE pre-compiled stylesheet. Deliberately does NOT load bootstrap.css,
	   style.css, userstyle.css, flexslider.css or font-awesome.css the way the
	   old head did - that was ~300KB of CSS and a 70KB icon font to render one
	   page. All icons on this page are now inline SVG: no extra request, no
	   invisible-icon flash while the font loads.
	   Rebuild with:  cd build && npm run build *}
	<link rel="stylesheet" href="{$static_domain_path_css}/home-tailwind.css">

	{* ---- STRUCTURED DATA ----------------------------------------------------
	   Single @graph containing Organization + WebSite + SoftwareApplication +
	   Service + FAQPage, cross-linked by @id. Built in index.php.
	   One @graph rather than five separate <script> blocks so Google resolves
	   them as one connected entity set instead of five unrelated islands. *}
	{$glb_home_jsonld}

	{* AdSense is loaded for logged-out visitors only, and async so it never
	   blocks rendering. Note: ad density directly above the fold competes with
	   your own CTA - worth testing whether it earns more than it costs you. *}
	{if $smarty.session.sess_user_id eq ''}
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7441584415804192" crossorigin="anonymous"></script>
	{/if}
</head>
<body class="bg-cream-50 text-ink-900 antialiased">

{* Skip link: first focusable element, visible only on keyboard focus.
   Accessibility requirement and a Lighthouse audit item. *}
<a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-brand-700 focus:px-4 focus:py-2 focus:text-white focus:shadow-card">Skip to main content</a>

{* ============================================================================
   NAVIGATION
   ----------------------------------------------------------------------------
   CRO: every nav item is now a real crawlable <a href> to a real page, and the
   primary CTA is always visible - on mobile too.

   WHAT CHANGED AND WHY IT MATTERS:
   - The old nav gave logged-out visitors  <a href="#" data-toggle="modal">
     for "Invitations". That is the entry point to your actual product, and it
     was (a) invisible to Googlebot, which cannot open a modal, so no PageRank
     ever flowed to the product, and (b) a login wall shown to people who do not
     yet have an account - asking for a password before showing any value.
   - signup.php already exists with its own optimised title and description but
     NOTHING on the homepage linked to it. It is now the primary CTA.
   - Nav is <nav> inside <header role="banner"> with an aria-current marker, so
     assistive tech and crawlers can both read the site structure.
   ========================================================================== *}
<header class="sticky top-0 z-50 border-b border-cream-200 bg-cream-50/95 backdrop-blur supports-[backdrop-filter]:bg-cream-50/80" role="banner">
	<div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between gap-4 px-5 sm:px-6">

		{* Logo. width/height are set explicitly to reserve layout space before
		   the image loads, which prevents the header from jumping - a CLS fix. *}
		<a href="{$glb_site_url|default:'/'}" class="flex shrink-0 items-center" aria-label="InviteIndia home">
			<img src="{$static_domain_path_img}/inlogo.png" alt="InviteIndia - Indian wedding website builder" width="150" height="34" class="h-8 w-auto">
		</a>

		{* ---- Desktop nav ---- *}
		<nav class="hidden items-center gap-1 lg:flex" aria-label="Main navigation">
			<a href="invitation-templates.php" class="btn-ghost {if $topnav_select eq 'themes'}text-brand-800 bg-cream-100{/if}"{if $topnav_select eq 'themes'} aria-current="page"{/if}>Themes</a>
			<a href="sample-invitation.php" class="btn-ghost">Samples</a>
			<a href="buy-domain.php" class="btn-ghost {if $topnav_select eq 'owndomain'}text-brand-800 bg-cream-100{/if}"{if $topnav_select eq 'owndomain'} aria-current="page"{/if}>Custom Domain</a>
			<a href="packages.php" class="btn-ghost {if $topnav_select eq 'pack'}text-brand-800 bg-cream-100{/if}"{if $topnav_select eq 'pack'} aria-current="page"{/if}>Pricing</a>
			<a href="blogs.php" class="btn-ghost">Blog</a>
		</nav>

		{* ---- Desktop actions ---- *}
		<div class="hidden shrink-0 items-center gap-2 lg:flex">
			{if $smarty.session.sess_user_id eq ''}
			{* Real links, not modals. Login is secondary and visually quiet;
			   signup is the loud one, because new visitors outnumber returning
			   account holders on a homepage by a wide margin. *}
			<a href="signin.php" class="btn-ghost">Log in</a>
			<a href="signup.php" class="btn-primary !px-5 !py-2.5 !text-sm">Create Free Website</a>
			{else}
			<a href="wedding-website-settings" class="btn-primary !px-5 !py-2.5 !text-sm">My Wedding Website</a>
			<a href="myprofile.php?do=mprofile" class="btn-ghost" title="My profile" aria-label="My profile">
				<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0"/></svg>
			</a>
			<a href="logout.php" class="btn-ghost" title="Log out" aria-label="Log out">
				<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M18.75 15 21.75 12m0 0-3-3m3 3H9"/></svg>
			</a>
			{/if}
		</div>

		{* ---- Mobile: CTA stays visible next to the menu button ----
		   CRO: the old mobile header had only a hamburger and a "Login" link, so
		   the main action was hidden behind a tap. Keeping a compact CTA in the
		   bar means the primary action is reachable at every scroll position. *}
		<div class="flex shrink-0 items-center gap-2 lg:hidden">
			{if $smarty.session.sess_user_id eq ''}
			<a href="signup.php" class="btn-primary !px-4 !py-2 !text-sm">Create Free</a>
			{else}
			<a href="wedding-website-settings" class="btn-primary !px-4 !py-2 !text-sm">My Website</a>
			{/if}
			<button type="button" id="navToggle" class="inline-flex size-10 items-center justify-center rounded-lg border border-cream-200 bg-white text-ink-700 transition hover:bg-cream-100" aria-expanded="false" aria-controls="mobileNav" aria-label="Open navigation menu">
				<svg id="navIconOpen" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
				<svg id="navIconClose" class="hidden size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
			</button>
		</div>
	</div>

	{* ---- Mobile panel ----
	   Rendered in the HTML and hidden with a class, NOT injected by JavaScript.
	   Googlebot indexes these links either way, and there is no flash of
	   unstyled menu on slow connections. *}
	<nav id="mobileNav" class="hidden border-t border-cream-200 bg-cream-50 lg:hidden" aria-label="Mobile navigation">
		<div class="mx-auto max-w-6xl space-y-1 px-5 py-4 sm:px-6">
			<a href="invitation-templates.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100 hover:text-brand-800">Themes</a>
			<a href="sample-invitation.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100 hover:text-brand-800">Sample Wedding Websites</a>
			<a href="buy-domain.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100 hover:text-brand-800">Custom Domain</a>
			<a href="packages.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100 hover:text-brand-800">Pricing</a>
			<a href="blogs.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100 hover:text-brand-800">Blog</a>
			<a href="wedding-gift-for-couples" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100 hover:text-brand-800">Wedding Gifts</a>
			<div class="mt-3 border-t border-cream-200 pt-3">
				{if $smarty.session.sess_user_id eq ''}
				<a href="signin.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100">Log in</a>
				{else}
				<a href="myprofile.php?do=mprofile" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100">My Profile</a>
				<a href="logout.php" class="block rounded-lg px-3 py-2.5 font-semibold text-ink-700 hover:bg-cream-100">Log out</a>
				{/if}
			</div>
		</div>
	</nav>
</header>

{* Mobile nav toggle: ~20 lines of vanilla JS, inline and placed immediately
   after the markup it controls, so it needs no jQuery and no load event.
   REPLACES: jQuery 2.1.4 + main.js + bootstrap.js, which the old header pulled
   in synchronously just to open a menu. The literal block below stops Smarty
   parsing the JavaScript braces as template tags. *}
{literal}
<script>
(function () {
	var btn = document.getElementById('navToggle');
	var panel = document.getElementById('mobileNav');
	var iconOpen = document.getElementById('navIconOpen');
	var iconClose = document.getElementById('navIconClose');
	if (!btn || !panel) return;

	btn.addEventListener('click', function () {
		var isOpen = panel.classList.toggle('hidden') === false;
		// aria-expanded must track real state for screen readers.
		btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		btn.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
		iconOpen.classList.toggle('hidden', isOpen);
		iconClose.classList.toggle('hidden', !isOpen);
	});

	// Close on Escape - standard expected behaviour for a disclosure menu.
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && !panel.classList.contains('hidden')) btn.click();
	});
})();
</script>
{/literal}
