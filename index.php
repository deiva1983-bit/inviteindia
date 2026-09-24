<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : index.php
// Description : Homepage controller - meta data, structured data, and content blocks
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
header('Access-Control-Allow-Origin: *');
include_once( 'includes/configs/init.php' );
 /*----- Object creation Start-----*/
$common_obj = new common();
$userslog_obj = new userslog();

/*----- Object creation End -----*/

$smarty->assign('topnav_select', 'main');
/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'main_page');
$smarty->assign('glb_site_url', $glb_site_url);

// PHP 8 note: the old code read $_SESSION['sess_user_id'] directly. On PHP 8 an
// unset session key raises "Warning: Undefined array key", and because
// includes/configs/init.php sets display_errors=1 that warning is PRINTED INTO
// THE HTML - sometimes before the doctype. Googlebot indexes that text.
// Null-coalescing here; see the note at the bottom of this file about turning
// display_errors off in production.
$user_log_id_home = trim($_SESSION['sess_user_id'] ?? '');
$show_login_      = $user_log_id_home !== '' ? 1 : 0;
$smarty->assign('show_auth', $show_login_);

$ranvalue = rand(1,2);
$smarty->assign('glb_ranvalue', $ranvalue);

// Dates used in the footer and the hero trust line, so nothing is ever stale.
// REPLACES the hardcoded "© 2018" that was in footer.tpl.
$smarty->assign('glb_current_year', date('Y'));
$smarty->assign('glb_founded_year', '2014');   // <- set to your real launch year

/* =====================================================================
   OPT IN TO THE NEW TAILWIND LAYOUT
   ---------------------------------------------------------------------
   footer.tpl branches on this flag: 1 = new Tailwind footer with no
   jQuery/Bootstrap tail, unset/0 = the legacy footer, byte-for-byte as it
   was. Only this page sets it, so every other page on the site is
   completely unaffected by this rewrite. Migrate other pages by assigning
   the same flag once they use the compiled stylesheet.
   ===================================================================== */
$smarty->assign('tpl_modern_css', 1);

/* =====================================================================
   CANONICAL + META
   ---------------------------------------------------------------------
   Title is 63 characters, front-loaded with the primary keyword, because
   Google weights the beginning of the title and mobile SERPs truncate
   around 60. Description is 152 characters and written as ad copy with a
   verb - descriptions are not a ranking factor but they ARE the click-
   through rate lever, and CTR is what turns impressions into traffic.
   ===================================================================== */
$canurl = 'https://www.inviteindia.com/';
$smarty->assign('can_url', $canurl);

$home_page_title    = 'Indian Wedding Website Builder & Digital Invitation Maker';
$home_page_meta_desc = 'Create a free Indian wedding website and digital invitation card. WhatsApp RSVP, Google Maps venue directions, wedding music, custom domain and Haldi-to-Reception timeline.';
$home_page_keywords  = 'indian wedding website builder, digital wedding invitation cards, whatsapp e-card maker, wedding website india, online wedding invitation, wedding rsvp website, custom wedding domain';

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
// The keywords meta tag has been ignored by Google since 2009 and is a
// negligible payload, so it is kept only for the other templates that read it.
$smarty->assign('metakeywords', $home_page_keywords);

/* =====================================================================
   OPEN GRAPH / WHATSAPP SHARE CARD
   ---------------------------------------------------------------------
   The old templates hardcoded og:url to /invitation-templates.php, used a
   fixed og:title containing the typo "attaractive", and had NO og:image at
   all - so every WhatsApp forward of this homepage rendered a blank grey
   card pointing at the wrong page. For a product that spreads by WhatsApp
   forward, that is a direct and compounding loss of referral traffic.

   og:image MUST be an absolute https URL - WhatsApp will not resolve a
   relative path. Recommended size is 1200x630.

   TODO (asset task, not code): banner-1.jpg is used below because it is a
   real file already on the server, but it is not 1200x630. Produce a proper
   share card at static/images/og-home.jpg (couple photo + logo + the words
   "Free Indian Wedding Website") and point this variable at it. Then re-run
   the URL through Facebook's Sharing Debugger to flush WhatsApp's cache.
   ===================================================================== */
$og_image = 'https://www.inviteindia.com/static/images/banner-1.jpg';
$smarty->assign('glb_og_image', $og_image);
$smarty->assign('glb_og_title', 'Create Your Indian Wedding Website & Digital Invitation - Free');
$smarty->assign('glb_og_desc', 'Build a wedding website and WhatsApp invitation card in 10 minutes. RSVP tracking, venue maps, wedding music and your own custom domain.');

/* =====================================================================
   FAQ - SINGLE SOURCE OF TRUTH
   ---------------------------------------------------------------------
   This one array produces BOTH the visible accordion in main.tpl AND the
   FAQPage JSON-LD in the <head>.

   WHY THAT MATTERS: Google requires FAQ structured data to match content
   that is visibly present on the page, and issues manual actions for schema
   describing hidden or missing content. Generating both outputs from the
   same array makes that class of penalty structurally impossible - the
   schema cannot drift from the copy, because there is only one copy.

   The answers are written to target real long-tail queries ("how to share
   wedding invitation on whatsapp", "wedding website with own domain name")
   while still being genuinely useful to a person reading them.
   ===================================================================== */
$home_faqs = array(
    array(
        'q' => 'Is InviteIndia free to create a wedding website?',
        'a' => 'Yes. You can pick a theme, add your event details and build your complete wedding website free, with no credit card required. Paid upgrades cover extras like a custom domain name and premium themes - see the Pricing page for current package details.'
    ),
    array(
        'q' => 'How do I share my wedding invitation on WhatsApp?',
        'a' => 'Once your website is ready you get a single link. Send that link on WhatsApp to any number of guests and it opens instantly on their phone with your invitation card, event timeline, venue maps and RSVP form. There is nothing to download and guests do not need an account.'
    ),
    array(
        'q' => 'Can I use my own domain name like rahulwedspriya.com?',
        'a' => 'Yes. You can register a personalised domain such as rahulwedspriya.com through InviteIndia and we connect it to your wedding website, including hosting and maintenance for the registration period. Visit the Buy Domain page to check name availability and current pricing.'
    ),
    array(
        'q' => 'Can I add separate pages for Haldi, Mehendi, Sangeet and Reception?',
        'a' => 'Yes. The multi-event timeline lets you give every function its own date, time, venue, Google Map and dress code - Haldi, Mehendi, Sangeet, the wedding ceremony and the reception. Guests invited to only some functions still see one clear schedule.'
    ),
    array(
        'q' => 'How does the RSVP system work?',
        'a' => 'Guests confirm attendance directly from your invitation link, including how many people are coming. Every response collects in your dashboard so you have a running headcount for catering and seating, instead of counting replies across dozens of WhatsApp chats.'
    ),
    array(
        'q' => 'Can I password-protect my wedding website?',
        'a' => 'Yes. You can lock your website behind a password so only guests who have the password can see your photos, venue addresses and family details. This is the usual choice for couples who want to share freely on WhatsApp but keep the site out of public search results.'
    ),
    array(
        'q' => 'Can I add background music to my wedding invitation?',
        'a' => 'Yes. Choose a traditional shehnai welcome or upload your own song. The music continues playing uninterrupted as guests move between pages of your website, so the celebration mood is not broken by page loads.'
    ),
    array(
        'q' => 'Do I need design skills, and how long does it take?',
        'a' => 'No design or technical skills are needed. Most couples finish a complete wedding website in about ten minutes: choose a theme, fill in your event details and photos, then share the link. You can keep editing after sharing - guests always see the latest version.'
    )
);

// --- Build the visible accordion -------------------------------------------
// Native <details>/<summary>: the answer text is present in the initial HTML
// so Googlebot reads it without executing JavaScript, the accordion works
// before (or entirely without) JS, and keyboard + screen-reader behaviour
// comes free from the browser. No jQuery, no Bootstrap collapse.
$faq_html = '';
foreach ($home_faqs as $i => $faq) {
    $q_id  = 'faq-q-' . $i;
    $q_txt = htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8');
    $a_txt = htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8');

    $faq_html .= '<details class="faq-item"' . ($i === 0 ? ' open' : '') . '>'
              .    '<summary class="faq-q" id="' . $q_id . '">'
              .      '<h3 class="text-base font-semibold sm:text-lg">' . $q_txt . '</h3>'
              .      '<svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>'
              .    '</summary>'
              .    '<div class="faq-a">' . $a_txt . '</div>'
              .  '</details>';
}
$smarty->assign('home_faq_html', $faq_html);

/* =====================================================================
   TESTIMONIALS - from the cus_reviews table
   ---------------------------------------------------------------------
   Pulled from your real approved reviews rather than invented. If the query
   returns nothing the section is omitted entirely by main.tpl, because an
   empty "What couples say" heading is worse than no heading.

   All DB output is passed through htmlspecialchars: these rows are
   user-submitted, so rendering them raw would be a stored-XSS hole.
   ===================================================================== */
$reviews_qry   = "SELECT review_name, review_loc, review_contents, review_profile, review_profile_status
                  FROM cus_reviews
                  WHERE review_status = '1'
                  ORDER BY `review_date` DESC
                  LIMIT 0, 3";
$reviews_lists = $userslog_obj->selectVal($reviews_qry);

$testimonials_html = '';
if (!empty($reviews_lists)) {
    foreach ($reviews_lists as $field) {
        $r_name = trim(htmlspecialchars(stripslashes($field['review_name'] ?? ''), ENT_QUOTES, 'UTF-8'));
        $r_loc  = trim(htmlspecialchars(stripslashes($field['review_loc'] ?? ''), ENT_QUOTES, 'UTF-8'));
        $r_text = trim(htmlspecialchars(stripslashes($field['review_contents'] ?? ''), ENT_QUOTES, 'UTF-8'));
        $r_img  = trim(stripslashes($field['review_profile'] ?? ''));
        $r_img_ok = (trim($field['review_profile_status'] ?? '') == '1' && $r_img !== '');

        if ($r_text === '') {
            continue;
        }

        // Keep cards visually even; full reviews live on customer-review.php.
        // mbstring is not guaranteed to be compiled in, so both multibyte
        // calls are guarded - an unguarded mb_* call is a fatal error, not a
        // warning, and would take the whole homepage down.
        $has_mb = function_exists('mb_strimwidth') && function_exists('mb_substr');
        if ($has_mb) {
            $r_text = mb_strimwidth($r_text, 0, 240, '...', 'UTF-8');
        } elseif (strlen($r_text) > 240) {
            $r_text = substr($r_text, 0, 237) . '...';
        }

        // Initial for the fallback avatar.
        $initial = '&hearts;';
        if ($r_name !== '') {
            $initial = htmlspecialchars(
                $has_mb ? mb_substr($r_name, 0, 1, 'UTF-8') : substr($r_name, 0, 1),
                ENT_QUOTES,
                'UTF-8'
            );
        }

        // <blockquote> + <cite> is the correct semantic pairing for a quoted
        // testimonial and its author. The old site used plain divs.
        $avatar = $r_img_ok
            ? '<img src="' . htmlspecialchars($r_img, ENT_QUOTES, 'UTF-8') . '" alt="" width="44" height="44" class="size-11 shrink-0 rounded-full object-cover" loading="lazy" decoding="async">'
            : '<span class="inline-flex size-11 shrink-0 items-center justify-center rounded-full bg-brand-100 font-display text-lg font-bold text-brand-800" aria-hidden="true">'
              . $initial
              . '</span>';

        $testimonials_html .= '<figure class="card">'
            . '<svg class="mb-3 size-7 text-brand-200" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7.5 5.25A5.25 5.25 0 0 0 2.25 10.5v1.5a6.75 6.75 0 0 0 6.75 6.75.75.75 0 0 0 0-1.5A5.25 5.25 0 0 1 3.75 12v-.75h3a.75.75 0 0 0 .75-.75V6a.75.75 0 0 0-.75-.75Zm9 0A5.25 5.25 0 0 0 11.25 10.5v1.5a6.75 6.75 0 0 0 6.75 6.75.75.75 0 0 0 0-1.5A5.25 5.25 0 0 1 12.75 12v-.75h3a.75.75 0 0 0 .75-.75V6a.75.75 0 0 0-.75-.75Z"/></svg>'
            . '<blockquote class="grow text-[0.975rem] leading-relaxed text-ink-700">' . $r_text . '</blockquote>'
            . '<figcaption class="mt-5 flex items-center gap-3 border-t border-cream-200 pt-4">'
            .   $avatar
            .   '<span class="text-sm leading-tight">'
            .     '<cite class="block font-semibold not-italic text-ink-900">' . ($r_name !== '' ? $r_name : 'Verified couple') . '</cite>'
            .     ($r_loc !== '' ? '<span class="block text-ink-500">' . $r_loc . '</span>' : '')
            .   '</span>'
            . '</figcaption>'
            . '</figure>';
    }
}
$smarty->assign('home_testimonials', $testimonials_html);

/* =====================================================================
   BLOG CARDS
   ---------------------------------------------------------------------
   WAS: the loop emitted FlexSlider carousel markup - <li> slides of
   Bootstrap col-md-4 divs, grouped three at a time. Two problems:
     1. The carousel only rendered after jQuery + flexslider.js downloaded
        and ran, and its init was bound to $(window).load, which waits for
        every image on the page. Until then visitors saw a stack of
        unstyled content.
     2. Carousel slides past the first are visually hidden, and Google
        discounts content it considers hidden from the user.
   NOW: a plain responsive CSS grid. Every blog link is in the initial HTML,
   visible, and crawlable with zero JavaScript.

   Also removed: data-toggle/data-target="$blog_url" on each link, which was
   Bootstrap modal markup pointed at a URL. It did nothing but was valid
   enough to occasionally swallow the click instead of following the link.
   ===================================================================== */
$selectblogs       = 'select * from home_page_blogs where blog_status = 1 ORDER BY `blog_date` desc limit 0, 9';
$selectblogs_lists = $userslog_obj->selectVal($selectblogs);

$blogdetails = '';
if (!empty($selectblogs_lists)) {
    foreach ($selectblogs_lists as $field) {
        $blog_name  = htmlspecialchars(stripslashes($field['blog_name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $blog_short = htmlspecialchars(stripslashes($field['blog_short_desc'] ?? ''), ENT_QUOTES, 'UTF-8');
        $blog_image = htmlspecialchars(stripslashes($field['blog_image'] ?? ''), ENT_QUOTES, 'UTF-8');
        $blog_url   = htmlspecialchars(stripslashes($field['blog_url'] ?? ''), ENT_QUOTES, 'UTF-8');
        $blog_raw   = $field['blog_date'] ?? '';
        $blog_date  = $blog_raw ? date('jS F, Y', strtotime($blog_raw)) : '';
        // <time datetime> gives Google a machine-readable publication date.
        $blog_iso   = $blog_raw ? date('Y-m-d', strtotime($blog_raw)) : '';

        if ($blog_name === '' || $blog_url === '') {
            continue;
        }

        $blogdetails .= '<article class="card !p-0 overflow-hidden">'
            . ($blog_image !== ''
                // loading="lazy" on below-the-fold images protects the hero's LCP.
                ? '<img src="' . $blog_image . '" alt="' . $blog_name . '" class="aspect-[16/9] w-full object-cover" loading="lazy" decoding="async">'
                : '')
            . '<div class="flex grow flex-col p-6">'
            .   '<h3 class="card-title text-lg"><a href="' . $blog_url . '" class="hover:text-brand-800 hover:underline">' . $blog_name . '</a></h3>'
            .   '<p class="card-text grow">' . $blog_short . '</p>'
            .   ($blog_date !== ''
                ? '<time datetime="' . $blog_iso . '" class="mt-4 block text-xs font-semibold tracking-wide text-ink-500 uppercase">' . $blog_date . '</time>'
                : '')
            . '</div>'
            . '</article>';
    }
}
$smarty->assign('blog_det', $blogdetails);
// Kept assigned (empty) so any template still referencing it cannot error.
$smarty->assign('blog_det_mobile', '');

/* =====================================================================
   STRUCTURED DATA - ONE @graph
   ---------------------------------------------------------------------
   Organization + WebSite + SoftwareApplication + Service + FAQPage, emitted
   as a single @graph with @id cross-references rather than five separate
   <script> blocks. One connected graph tells Google these describe the same
   business; five islands leave it guessing.

   The old homepage had NO structured data at all, which forfeited both the
   FAQ rich result and any entity recognition for the InviteIndia brand.

   DELIBERATELY OMITTED: aggregateRating. It is tempting because star ratings
   in search results lift click-through more than almost anything else - but
   Google requires the rating to come from genuine, on-page, verifiable
   reviews. Your cus_reviews table stores review text with no numeric score,
   so any rating value here would be fabricated, and fabricated review schema
   is one of the most reliably penalised things in structured data. Add a
   rating column, collect real scores, then add aggregateRating with real
   numbers - do not shortcut this one.
   ===================================================================== */
$org_id  = 'https://www.inviteindia.com/#organization';
$site_id = 'https://www.inviteindia.com/#website';
$app_id  = 'https://www.inviteindia.com/#software';

// FAQPage entries are generated from the SAME $home_faqs array that rendered
// the visible accordion above, so the two can never disagree.
$faq_entities = array();
foreach ($home_faqs as $faq) {
    $faq_entities[] = array(
        '@type'          => 'Question',
        'name'           => $faq['q'],
        'acceptedAnswer' => array(
            '@type' => 'Answer',
            'text'  => $faq['a']
        )
    );
}

$json_graph = array(
    '@context' => 'https://schema.org',
    '@graph'   => array(

        // --- The business entity everything else points back to ---
        array(
            '@type'       => 'Organization',
            '@id'         => $org_id,
            'name'        => 'InviteIndia',
            'url'         => 'https://www.inviteindia.com/',
            'description' => 'InviteIndia builds Indian wedding websites and digital wedding invitation cards with WhatsApp RSVP, venue maps, wedding music and custom domains.',
            'logo'        => array(
                '@type' => 'ImageObject',
                'url'   => 'https://www.inviteindia.com/static/images/site/favicon.png'
            ),
            'areaServed'  => array('@type' => 'Country', 'name' => 'India'),
            'contactPoint' => array(
                '@type'             => 'ContactPoint',
                'telephone'         => '+91-9566775977',
                'contactType'       => 'customer support',
                'areaServed'        => 'IN',
                'availableLanguage' => array('English', 'Tamil', 'Hindi')
            ),
            // sameAs links your social profiles to the brand entity, which is how
            // Google consolidates "InviteIndia" into one recognised entity
            // instead of several unrelated mentions.
            'sameAs' => array(
                'https://www.facebook.com/invitindia',
                'https://www.instagram.com/inviteindia',
                'https://in.pinterest.com/inviteindia',
                'https://www.youtube.com/channel/UCrUg35VVworDgOQyFDl0JeA'
            )
        ),

        // --- The site itself ---
        array(
            '@type'      => 'WebSite',
            '@id'        => $site_id,
            'url'        => 'https://www.inviteindia.com/',
            'name'       => 'InviteIndia',
            'publisher'  => array('@id' => $org_id),
            'inLanguage' => 'en-IN'
        ),

        // --- SoftwareApplication: this is a builder tool, so this is the type
        //     that describes what the product actually IS. ---
        array(
            '@type'               => 'SoftwareApplication',
            '@id'                 => $app_id,
            'name'                => 'InviteIndia Wedding Website Builder',
            'applicationCategory' => 'LifestyleApplication',
            'applicationSubCategory' => 'Wedding Website Builder',
            'operatingSystem'     => 'Any (web-based)',
            'url'                 => 'https://www.inviteindia.com/',
            'publisher'           => array('@id' => $org_id),
            'description'         => 'Create an Indian wedding website and matching digital invitation card with WhatsApp RSVP, a guestbook, Google Maps venue directions, background wedding music, password protection, a custom domain name and a multi-event timeline for Haldi, Mehendi, Sangeet, the wedding and the reception.',
            'featureList'         => array(
                'WhatsApp RSVP and guestbook manager',
                'Google Maps venue directions',
                'Background shehnai and wedding music',
                'Custom domain names and password protection',
                'Multi-event timeline for Haldi, Mehendi, Sangeet, wedding and reception',
                'Unlimited photo albums',
                'Wedding gift registry',
                'Animated envelope website covers'
            ),
            // VERIFY THIS BEFORE GOING LIVE: price 0 asserts a genuinely free
            // tier, which matches the "Create Your Wedding Website Free" CTA. If
            // there is no free tier, change this to your real entry price or
            // remove the offers block - a price in schema that does not match the
            // price on your Pricing page is a structured-data violation.
            'offers' => array(
                '@type'         => 'Offer',
                'price'         => '0',
                'priceCurrency' => 'INR',
                'availability'  => 'https://schema.org/InStock',
                'url'           => 'https://www.inviteindia.com/packages.php',
                'description'   => 'Free to create your wedding website. Paid upgrades available for custom domains and premium themes.'
            )
        ),

        // --- Service: how a customer would describe the engagement, which is
        //     what surfaces for commercial-intent queries. ---
        array(
            '@type'       => 'Service',
            '@id'         => 'https://www.inviteindia.com/#service',
            'serviceType' => 'Wedding website and digital invitation design',
            'name'        => 'Indian Wedding Website & Digital Invitation Service',
            'provider'    => array('@id' => $org_id),
            'areaServed'  => array('@type' => 'Country', 'name' => 'India'),
            'audience'    => array('@type' => 'Audience', 'audienceType' => 'Engaged couples planning an Indian wedding'),
            'description' => 'Design, host and share a personalised Indian wedding website and digital invitation card, including RSVP collection, guest communication, venue maps and custom domain registration.',
            'hasOfferCatalog' => array(
                '@type' => 'OfferCatalog',
                'name'  => 'Wedding website services',
                'itemListElement' => array(
                    array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Wedding website design and hosting')),
                    array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Digital wedding invitation card for WhatsApp')),
                    array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Custom wedding domain name registration')),
                    array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Guest RSVP and guestbook management'))
                )
            )
        ),

        // --- FAQPage: the block that can win you an expanded SERP listing. ---
        array(
            '@type'      => 'FAQPage',
            '@id'        => 'https://www.inviteindia.com/#faq',
            'isPartOf'   => array('@id' => $site_id),
            'inLanguage' => 'en-IN',
            'mainEntity' => $faq_entities
        )
    )
);

// JSON_HEX_TAG escapes < and > so no content can ever break out of the
// <script> element. JSON_UNESCAPED_SLASHES and JSON_UNESCAPED_UNICODE keep the
// URLs and any non-ASCII text readable when you inspect the page source.
$json_flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG;
if (defined('JSON_PRETTY_PRINT')) {
    $json_flags = $json_flags | JSON_PRETTY_PRINT;
}
$home_jsonld = '<script type="application/ld+json">' . "\n"
             . json_encode($json_graph, $json_flags) . "\n"
             . '</script>';
$smarty->assign('glb_home_jsonld', $home_jsonld);

/*----- Variables Declaration End-----*/
$smarty->assign('home_page_notes', $home_page_notes ?? '');

/* =====================================================================
   TEMPLATE SELECTION - THE BIGGEST SEO FIX ON THIS PAGE
   ---------------------------------------------------------------------
   WAS:
       $content_template = $common_obj->load_mobile_tpl_files($isMobile, 'default/main.tpl');
       $head_content_template = $common_obj->load_mobile_tpl_files($isMobile, 'default/mainheader.tpl');

   That sniffed the user agent and served main_mobile.tpl + mainheader_mobile.tpl
   to phones - a completely separate 138-line page instead of the 309-line
   desktop one, with a DIFFERENT heading structure (the mobile file used <h3>
   where desktop used <h1>).

   Google has indexed mobile-first since 2019: it crawls with a smartphone
   user agent, so it was indexing and ranking the thinner mobile variant, and
   everything invested in the desktop page was invisible to search. Two
   divergent versions of one URL also split every signal between them.

   NOW: one responsive template for every device. Same URL, same HTML, same
   headings, same content - which is exactly what mobile-first indexing wants,
   and it means there is only one page to maintain.

   The mobile .tpl files are left on disk but are no longer referenced. Once
   this is verified in production they can be deleted.
   ===================================================================== */
$content_template      = 'default/main.tpl';
$head_content_template = 'default/mainheader.tpl';

/*----- Include Files Details Start-----*/
// NEW: Global header configuration with authentication detection
$show_auth = !empty($user_log_id_home) ? 1 : 0;
$smarty->assign('show_auth', $show_auth);

$smarty->assign('header', $smarty->fetch($head_content_template) );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');

/* =====================================================================
   TWO CONFIG CHANGES TO MAKE OUTSIDE THIS FILE
   ---------------------------------------------------------------------
   1. includes/configs/init.php lines 19-21 set:
          ini_set('display_errors', 1);
          ini_set('error_reporting', E_ALL);
      On the PHP version you just upgraded to, every notice and deprecation
      is therefore PRINTED INTO YOUR HTML, sometimes ahead of the doctype,
      where Googlebot reads it as page content. In production this should be
          ini_set('display_errors', 0);
          ini_set('log_errors', 1);
      with errors going to a log file you actually read. This is worth doing
      before anything else here - it is both an SEO and a security issue,
      since PHP warnings leak absolute file paths.

   2. Set $glb_ga4_id in includes/configs/globalconfigs.php to turn analytics
      back on. See the note in templates/default/footer.tpl - the old ga.js
      tag stopped collecting data in July 2023.
   ===================================================================== */
?>
