{* ============================================================================
   HOMEPAGE BODY                                      templates/default/main.tpl
   ----------------------------------------------------------------------------
   Rendered inside <main id="main-content"> by index.tpl.

   HEADING ARCHITECTURE (the old page violated this three ways):
     h1  x1   - "Create Your Indian Wedding Website & Digital Invitation..."
     h2  x6   - one per major section
     h3  xN   - one per card / step / FAQ question

   WAS BROKEN:
     - TWO <h1>s on the page: one in mainheader.tpl and a second here reading
       "Why Choose Us". Two h1s split the topical signal, and the second one
       spent your most valuable heading on a phrase nobody searches for.
     - The mobile template used <h3> for the same section, so the desktop and
       mobile pages had *different* heading structures. Google indexes
       mobile-first, so it was ranking the weaker of the two.
     - Section headings jumped h1 -> h3 with no h2, breaking the outline.
   ========================================================================== *}

{* ============================================================================
   1. HERO
   ----------------------------------------------------------------------------
   CRO decisions:
   - ONE clear primary action ("Create Your Wedding Website Free") plus one
     low-commitment alternative ("Explore Themes") for people not ready to sign
     up. The old hero offered Login / Sample / Themes as three equal-weight
     badges with no primary action at all - nothing told a visitor what to do.
   - The old hero opened with a 150-word paragraph about how "the wedding
     industry is expanding quickly". That is about your industry, not about the
     visitor's problem, and it pushed every button below the fold. Replaced
     with a benefit-first subheadline of ~35 words.
   - Risk reducers ("Free to start", "No credit card") sit directly under the
     CTA, which is where signup hesitation actually happens.
   ========================================================================== *}
<section class="relative overflow-hidden border-b border-cream-200 bg-gradient-to-b from-brand-50 via-cream-50 to-cream-50">
	{* Decorative only, so aria-hidden - it must never be announced or indexed. *}
	<div class="pointer-events-none absolute -right-24 -top-24 size-72 rounded-full bg-gold-300/25 blur-3xl" aria-hidden="true"></div>
	<div class="pointer-events-none absolute -bottom-32 -left-24 size-72 rounded-full bg-brand-200/30 blur-3xl" aria-hidden="true"></div>

	<div class="section relative grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
		<div>
			<p class="inline-flex items-center gap-2 rounded-full border border-gold-300 bg-white/70 px-4 py-1.5 text-xs font-bold tracking-[0.14em] text-brand-800 uppercase">
				<span class="size-1.5 rounded-full bg-gold-500" aria-hidden="true"></span>
				Trusted by Indian couples since {$glb_founded_year|default:'2014'}
			</p>

			{* THE single h1. Leads with "Indian Wedding Website" (primary keyword)
			   and includes "Digital Invitation Card" (secondary) while still
			   reading like a sentence a human wrote. text-balance keeps the line
			   breaks even at every viewport width. *}
			<h1 class="mt-5 font-display text-4xl leading-[1.1] font-bold text-ink-900 text-balance sm:text-5xl lg:text-[3.4rem]">
				Create Your Indian Wedding Website &amp; Digital Invitation Card &mdash; Free
			</h1>

			<p class="mt-5 max-w-xl text-lg leading-relaxed text-ink-500 text-pretty">
				Design a beautiful wedding website and a matching WhatsApp e-card in under
				10 minutes. Collect RSVPs automatically, give guests Google Maps directions,
				add shehnai or your favourite song, and lay out every event from Haldi to
				Reception. No design skills needed.
			</p>

			{* Primary CTA first in the DOM = first in tab order and first for
			   screen readers, matching its visual priority. *}
			<div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
				{if $smarty.session.sess_user_id eq ''}
				<a href="signup.php" class="btn-primary">
					Create Your Wedding Website Free
					<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
				</a>
				{else}
				<a href="wedding-website-settings" class="btn-primary">
					Continue Building Your Website
					<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
				</a>
				{/if}
				<a href="invitation-templates.php" class="btn-secondary">Explore Themes</a>
			</div>

			{* Objection handling, immediately below the button. *}
			<ul class="mt-7 flex flex-wrap gap-x-6 gap-y-2 text-sm font-medium text-ink-500">
				<li class="inline-flex items-center gap-1.5">
					<svg class="size-4 text-brand-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12 2.25a9.75 9.75 0 1 0 0 19.5 9.75 9.75 0 0 0 0-19.5Zm4.28 7.28a.75.75 0 1 0-1.06-1.06l-4.47 4.47-1.97-1.97a.75.75 0 1 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.06 0l5-5Z" clip-rule="evenodd"/></svg>
					Free to start
				</li>
				<li class="inline-flex items-center gap-1.5">
					<svg class="size-4 text-brand-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12 2.25a9.75 9.75 0 1 0 0 19.5 9.75 9.75 0 0 0 0-19.5Zm4.28 7.28a.75.75 0 1 0-1.06-1.06l-4.47 4.47-1.97-1.97a.75.75 0 1 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.06 0l5-5Z" clip-rule="evenodd"/></svg>
					No credit card needed
				</li>
				<li class="inline-flex items-center gap-1.5">
					<svg class="size-4 text-brand-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12 2.25a9.75 9.75 0 1 0 0 19.5 9.75 9.75 0 0 0 0-19.5Zm4.28 7.28a.75.75 0 1 0-1.06-1.06l-4.47 4.47-1.97-1.97a.75.75 0 1 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.06 0l5-5Z" clip-rule="evenodd"/></svg>
					Works on every phone
				</li>
			</ul>
		</div>

		{* HERO IMAGE = the Largest Contentful Paint element on this page.
		   - fetchpriority="high" tells the browser to download it before other
		     images and before non-critical CSS/JS. This is one of the strongest
		     single levers available on LCP, which is a ranking signal.
		   - loading="eager" + decoding="async": never lazy-load your LCP image.
		     (The old page put a jQuery FlexSlider here, so the hero visual could
		     not paint until jQuery AND flexslider.js had downloaded, parsed and
		     run - and its init was bound to $(window).load, which waits for
		     EVERY image on the page. That is about the worst possible LCP setup.)
		   - The aspect-[4/3] wrapper reserves the exact layout box before the
		     image arrives, so nothing shifts (CLS = 0).
		   - Descriptive alt text: real alt copy, carrying keywords honestly. *}
		<div class="relative">
			<div class="overflow-hidden rounded-3xl border border-cream-200 bg-white shadow-card-hover">
				<img
					src="static/images/banner-1.jpg"
					alt="Indian wedding website and digital invitation card built with InviteIndia, shown on a mobile phone"
					class="aspect-[4/3] w-full object-cover"
					fetchpriority="high"
					loading="eager"
					decoding="async">
			</div>
			{* Small floating proof card - concrete feature callout at the point of
			   highest visual attention. *}
			<div class="absolute -bottom-5 left-4 flex items-center gap-3 rounded-2xl border border-cream-200 bg-white px-4 py-3 shadow-card sm:left-8">
				<span class="inline-flex size-9 items-center justify-center rounded-xl bg-brand-50 text-brand-700" aria-hidden="true">
					<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.48 4.48 0 0 1-.923 1.785A5.97 5.97 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"/></svg>
				</span>
				<span class="text-sm leading-tight font-semibold text-ink-900">Share on WhatsApp<br><span class="font-medium text-ink-500">in a single tap</span></span>
			</div>
		</div>
	</div>
</section>

{* ============================================================================
   2. CORE VALUE PROPOSITION GRID
   ----------------------------------------------------------------------------
   SEO: the h2 carries "Wedding Website Builder" and each card h3 is itself a
   long-tail phrase Indian couples actually search ("WhatsApp RSVP",
   "wedding website custom domain", "wedding website password protect"). Real
   headings on real features is how you rank for long-tail without keyword
   stuffing the body copy.
   CRO: every card names a guest-facing outcome, not an internal feature label.
   The old grid used vague titles like "Easy to Customize" and "Elegant
   Designs", which describe nothing a couple is actively looking for.
   ========================================================================== *}
<section class="section" id="features" aria-labelledby="features-heading">
	<p class="section-eyebrow">Everything included</p>
	<h2 id="features-heading" class="section-title">Everything an Indian wedding website builder should do</h2>
	<p class="section-lede">
		Built specifically for Indian weddings &mdash; multi-day events, large guest lists,
		and families who live on WhatsApp.
	</p>

	<div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

		{* --- Required feature 1: WhatsApp RSVP + Guestbook --- *}
		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.48 4.48 0 0 1-.923 1.785A5.97 5.97 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"/></svg>
			</span>
			<h3 class="card-title">WhatsApp RSVP &amp; Guestbook Manager</h3>
			<p class="card-text">
				Guests confirm attendance straight from the invitation link and leave
				blessings in your guestbook. You see every response in one dashboard &mdash;
				no more chasing a hundred chats to finalise the headcount.
			</p>
		</article>

		{* --- Required feature 2: Google Maps directions --- *}
		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
			</span>
			<h3 class="card-title">Google Maps Venue Directions</h3>
			<p class="card-text">
				Embed an interactive map for every venue. Out-of-town guests tap once and
				Google Maps navigates them door to door &mdash; plus nearby hotels and
				parking notes on the same page.
			</p>
		</article>

		{* --- Required feature 3: Background music --- *}
		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 9.75v6.75a2.25 2.25 0 1 1-2.25-2.25H9Zm0 0V5.25l10.5-2.25v11.25m0 0a2.25 2.25 0 1 1-2.25-2.25h2.25Z"/></svg>
			</span>
			<h3 class="card-title">Shehnai &amp; Romantic Wedding Music</h3>
			<p class="card-text">
				Set a traditional shehnai welcome or your own song as the background score.
				Music plays uninterrupted as guests move between pages, so the celebration
				mood never breaks.
			</p>
		</article>

		{* --- Required feature 4: Custom domain + password protection --- *}
		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
			</span>
			<h3 class="card-title">Custom Domain &amp; Password Protection</h3>
			<p class="card-text">
				Claim your own name &mdash; <span class="font-semibold text-brand-800">rahulwedspriya.com</span>
				&mdash; instead of a generic link. Lock the site with a password so only
				invited guests can view your photos and event details.
			</p>
			<a href="buy-domain.php" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-700 hover:text-brand-900 hover:underline">
				See domain pricing
				<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
			</a>
		</article>

		{* --- Required feature 5: Multi-event timeline --- *}
		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
			</span>
			<h3 class="card-title">Multi-Event Wedding Timeline</h3>
			<p class="card-text">
				Give Haldi, Mehendi, Sangeet, the Wedding and the Reception each their own
				date, time, venue and dress code &mdash; so guests always know exactly where
				to be and what to wear.
			</p>
		</article>

		{* --- Existing platform features, kept because they are real --- *}
		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M18 12h.008v.008H18V12Zm2.25 6.75H3.75A2.25 2.25 0 0 1 1.5 16.5V7.5a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 7.5v9a2.25 2.25 0 0 1-2.25 2.25Z"/></svg>
			</span>
			<h3 class="card-title">Unlimited Photo Albums</h3>
			<p class="card-text">
				Share pre-wedding shoots, engagement photos and post-wedding galleries in
				unlimited albums &mdash; the page family abroad will actually revisit.
			</p>
		</article>

		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h17.25a1.125 1.125 0 0 0 1.125-1.125v-1.5A1.125 1.125 0 0 0 20.625 7.5H3.375A1.125 1.125 0 0 0 2.25 8.625v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
			</span>
			<h3 class="card-title">Wedding Gift Registry</h3>
			<p class="card-text">
				Point guests towards gifts you genuinely want, so nobody has to guess and
				nothing arrives in duplicate.
			</p>
		</article>

		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
			</span>
			<h3 class="card-title">Animated Envelope Covers</h3>
			<p class="card-text">
				Open with an envelope animation, floating diyas or a floral frame &mdash; the
				first three seconds that decide whether a guest scrolls on.
			</p>
		</article>

		<article class="card">
			<span class="card-icon" aria-hidden="true">
				<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5A3.375 3.375 0 0 0 10.125 2.25H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
			</span>
			<h3 class="card-title">Dedicated Wedding Info Pages</h3>
			<p class="card-text">
				Add "Our Story", hotel recommendations, travel help and parking notes on
				their own pages &mdash; and stop answering the same question forty times.
			</p>
		</article>
	</div>
</section>

{* ============================================================================
   3. HOW IT WORKS - 3 STEPS
   ----------------------------------------------------------------------------
   CRO: the goal is to make the effort feel small before asking for a signup.
   Each step is numbered, named as an action, and carries a time estimate,
   because "how long will this take me" is the real unspoken objection.
   SEO: an <ol> is genuine semantic markup for a sequence, and it backs the
   HowTo-style content Google likes to surface. The old version used three
   floated divs with h3s and no ordering semantics at all.
   ========================================================================== *}
<section class="border-y border-cream-200 bg-white" id="how-it-works" aria-labelledby="how-heading">
	<div class="section">
		<p class="section-eyebrow">Three steps, about ten minutes</p>
		<h2 id="how-heading" class="section-title">How to make your wedding invitation online</h2>
		<p class="section-lede">
			No designer, no developer, no software to install. If you can use WhatsApp,
			you can build this.
		</p>

		<ol class="mt-12 grid gap-6 lg:grid-cols-3" role="list">
			<li class="relative rounded-2xl border border-cream-200 bg-cream-50 p-7">
				<span class="font-display text-5xl leading-none font-bold text-brand-200" aria-hidden="true">1</span>
				<h3 class="mt-3 font-display text-xl font-bold text-ink-900">Pick a Theme</h3>
				<p class="card-text">
					Browse traditional South Indian, Punjabi, Marwari and modern minimal
					designs. Preview any theme on a phone before you commit.
				</p>
				<a href="invitation-templates.php" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-700 hover:underline">
					Browse all themes
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
				</a>
			</li>

			<li class="relative rounded-2xl border border-cream-200 bg-cream-50 p-7">
				<span class="font-display text-5xl leading-none font-bold text-brand-200" aria-hidden="true">2</span>
				<h3 class="mt-3 font-display text-xl font-bold text-ink-900">Personalize Event Details</h3>
				<p class="card-text">
					Add your names and photos, then fill in each event &mdash; Haldi, Mehendi,
					Sangeet, Wedding, Reception &mdash; with venue maps and your background
					music.
				</p>
			</li>

			<li class="relative rounded-2xl border border-cream-200 bg-cream-50 p-7">
				<span class="font-display text-5xl leading-none font-bold text-brand-200" aria-hidden="true">3</span>
				<h3 class="mt-3 font-display text-xl font-bold text-ink-900">Share via WhatsApp</h3>
				<p class="card-text">
					Send one link to every guest. RSVPs and guestbook messages start
					arriving in your dashboard immediately &mdash; no printing, no courier,
					no waiting.
				</p>
			</li>
		</ol>

		<div class="mt-10">
			{if $smarty.session.sess_user_id eq ''}
			<a href="signup.php" class="btn-primary">Start Step 1 &mdash; It's Free</a>
			{else}
			<a href="wedding-website-settings" class="btn-primary">Go to My Wedding Website</a>
			{/if}
		</div>
	</div>
</section>

{* ============================================================================
   4. THEMES SHOWCASE
   ----------------------------------------------------------------------------
   SEO: internal links from the homepage to your theme pages pass authority to
   the templates that should be ranking for "wedding invitation templates".
   Every image has real descriptive alt text and loading="lazy" (these are
   below the fold, so lazy-loading them protects the LCP of the hero image).
   ========================================================================== *}
<section class="section" id="themes" aria-labelledby="themes-heading">
	<div class="flex flex-wrap items-end justify-between gap-6">
		<div>
			<p class="section-eyebrow">Wedding website templates</p>
			<h2 id="themes-heading" class="section-title">Digital wedding invitation card designs</h2>
			<p class="section-lede">
				Every theme is mobile-first, loads fast on Indian mobile data, and can be
				recoloured to match your wedding palette.
			</p>
		</div>
		<a href="invitation-templates.php" class="btn-secondary shrink-0">View All Themes</a>
	</div>

	<div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
		<a href="invitation-templates.php" class="card !p-0 overflow-hidden">
			<img src="static/images/banner-1.jpg" alt="Traditional Indian wedding website theme with floral border design" class="aspect-[3/4] w-full object-cover" loading="lazy" decoding="async">
			<span class="p-5">
				<span class="block font-display text-lg font-bold text-ink-900">Traditional Floral</span>
				<span class="mt-1 block text-sm text-ink-500">Classic motifs, gold accents</span>
			</span>
		</a>
		<a href="invitation-templates.php" class="card !p-0 overflow-hidden">
			<img src="static/images/banner-2.jpg" alt="Mobile wedding invitation card theme for Indian weddings" class="aspect-[3/4] w-full object-cover" loading="lazy" decoding="async">
			<span class="p-5">
				<span class="block font-display text-lg font-bold text-ink-900">Modern Minimal</span>
				<span class="mt-1 block text-sm text-ink-500">Clean type, plenty of space</span>
			</span>
		</a>
		<a href="invitation-templates.php" class="card !p-0 overflow-hidden">
			<img src="static/images/banner-3.jpg" alt="Desktop view of an Indian wedding website with photo gallery" class="aspect-[3/4] w-full object-cover" loading="lazy" decoding="async">
			<span class="p-5">
				<span class="block font-display text-lg font-bold text-ink-900">Photo Story</span>
				<span class="mt-1 block text-sm text-ink-500">Built around your photos</span>
			</span>
		</a>
		<a href="invitation-templates.php" class="card !p-0 overflow-hidden">
			<img src="static/images/banner-4.jpg" alt="Animated envelope wedding e-card theme for WhatsApp sharing" class="aspect-[3/4] w-full object-cover" loading="lazy" decoding="async">
			<span class="p-5">
				<span class="block font-display text-lg font-bold text-ink-900">Animated Envelope</span>
				<span class="mt-1 block text-sm text-ink-500">Opens like a real invite</span>
			</span>
		</a>
	</div>
</section>

{* ============================================================================
   5. SOCIAL PROOF - LIVE SAMPLES + TESTIMONIALS
   ----------------------------------------------------------------------------
   CRO: "show me a real one" is the strongest objection on a builder product,
   and the old homepage answered it with a single small "Sample" badge. Live,
   clickable examples let a visitor verify the product before signing up.
   SEO: the sample links are real indexable URLs, and the testimonials come
   from your cus_reviews table (rendered by index.php) rather than being
   invented - see the note in index.php about why no aggregateRating is emitted.
   ========================================================================== *}
<section class="border-y border-cream-200 bg-gradient-to-b from-white to-cream-100" id="samples" aria-labelledby="samples-heading">
	<div class="section">
		<p class="section-eyebrow">See it for real</p>
		<h2 id="samples-heading" class="section-title">Live sample wedding websites</h2>
		<p class="section-lede">
			These are real InviteIndia websites. Open one on your phone &mdash; exactly
			what your guests will see when you send the link.
		</p>

		<div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
			{* target="_blank" keeps your homepage open while the visitor explores a
			   sample. rel="noopener" is a security requirement with _blank. *}
			<a href="https://www.inviteindia.com/raja-weds-rani-sample?status=h" target="_blank" rel="noopener" class="card">
				<span class="card-icon" aria-hidden="true">
					<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/></svg>
				</span>
				<h3 class="card-title">Raja weds Rani</h3>
				<p class="card-text">A traditional multi-event website with venue maps, guestbook and background music.</p>
				<span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-700">Open live sample
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
				</span>
			</a>

			<a href="https://www.inviteindia.com/raja-weds-rani-sample2?status=h" target="_blank" rel="noopener" class="card">
				<span class="card-icon" aria-hidden="true">
					<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/></svg>
				</span>
				<h3 class="card-title">Raja weds Rani &mdash; Modern</h3>
				<p class="card-text">The same wedding in a contemporary theme, showing how far a theme change goes.</p>
				<span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-700">Open live sample
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
				</span>
			</a>

			<a href="sample-invitation.php" class="card border-brand-200 bg-brand-50">
				<span class="card-icon bg-white" aria-hidden="true">
					<svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
				</span>
				<h3 class="card-title">Browse every sample</h3>
				<p class="card-text">See the full gallery of sample wedding websites and invitation card examples.</p>
				<span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-brand-700">View all samples
					<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
				</span>
			</a>
		</div>

		{* Testimonials from the cus_reviews table. Renders nothing at all if the
		   query returns no approved rows - an empty "What couples say" heading
		   with no content underneath is worse than omitting the section. *}
		{if $home_testimonials neq ''}
		<div class="mt-16">
			<h3 class="font-display text-2xl font-bold text-ink-900">What couples say about InviteIndia</h3>
			<div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
				{$home_testimonials}
			</div>
			<a href="customer-review.php" class="mt-8 inline-flex items-center gap-1 font-semibold text-brand-700 hover:underline">
				Read all customer reviews
				<svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
			</a>
		</div>
		{/if}
	</div>
</section>

{* ============================================================================
   6. FAQ ACCORDION
   ----------------------------------------------------------------------------
   Built from ONE PHP array in index.php that produces BOTH this visible
   accordion and the FAQPage JSON-LD. That is deliberate: Google requires FAQ
   structured data to match content visible on the page, and will issue a manual
   action for schema describing hidden or absent content. Sharing one source
   makes drift structurally impossible.

   Uses native <details>/<summary>, so:
     - the answers are in the initial HTML and fully crawlable
     - the accordion works with JavaScript disabled or still loading
     - keyboard and screen-reader behaviour is handled by the browser
   The old site had no FAQ on the homepage at all, which forfeited the rich
   result entirely.
   ========================================================================== *}
<section class="section" id="faq" aria-labelledby="faq-heading">
	<p class="section-eyebrow">Questions couples ask</p>
	<h2 id="faq-heading" class="section-title">Wedding website &amp; digital invitation FAQs</h2>

	<div class="mt-10 max-w-3xl rounded-2xl border border-cream-200 bg-white px-6 shadow-card sm:px-8">
		{$home_faq_html}
	</div>
</section>

{* ============================================================================
   7. CLOSING CTA
   ----------------------------------------------------------------------------
   CRO: a visitor who has read this far is your warmest traffic, and the old
   page ended on a blog carousel - no ask at all. Repeating the primary action
   at the natural end of the page captures the people who needed the full story
   before deciding.
   ========================================================================== *}
<section class="bg-brand-800" aria-labelledby="cta-heading">
	<div class="section text-center">
		<h2 id="cta-heading" class="font-display text-3xl leading-tight font-bold text-white text-balance sm:text-4xl">
			Your wedding website can be ready tonight
		</h2>
		<p class="mx-auto mt-4 max-w-xl text-lg leading-relaxed text-brand-100 text-pretty">
			Pick a theme, add your events, and send one WhatsApp link to everyone.
			Free to start &mdash; no credit card, no design skills.
		</p>
		<div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
			{if $smarty.session.sess_user_id eq ''}
			<a href="signup.php" class="btn-primary !bg-white !text-brand-800 hover:!bg-cream-100">
				Create Your Wedding Website Free
				<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
			</a>
			{else}
			<a href="wedding-website-settings" class="btn-primary !bg-white !text-brand-800 hover:!bg-cream-100">Go to My Wedding Website</a>
			{/if}
			<a href="packages.php" class="btn-secondary !border-white/40 !bg-transparent !text-white hover:!bg-white/10">See Pricing</a>
		</div>
	</div>
</section>

{* ============================================================================
   8. WEDDING TIPS / BLOG
   ----------------------------------------------------------------------------
   SEO: kept because homepage links to fresh blog content help Google discover
   and recrawl it. Moved to LAST on the page - it used to occupy prime
   mid-page real estate where conversion content belongs, and it was rendered
   by a jQuery FlexSlider carousel that hid most of the links from crawlers
   until JavaScript ran. Now a plain responsive grid: every link in the HTML.
   NOTE: index.php now emits $blog_det as semantic cards rather than
   carousel <li> slides.
   ========================================================================== *}
{if $blog_det neq ''}
<section class="border-t border-cream-200 bg-cream-100" id="wedding-tips" aria-labelledby="tips-heading">
	<div class="section">
		<p class="section-eyebrow">From the blog</p>
		<h2 id="tips-heading" class="section-title">Indian wedding planning tips</h2>
		<p class="section-lede">Practical guides for the bride, the groom and the parents of the couple.</p>

		<div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
			{$blog_det}
		</div>

		<a href="blogs.php" class="btn-secondary mt-10">Read All Wedding Tips</a>
	</div>
</section>
{/if}
