<!DOCTYPE html>
<html lang="en">
<head>
<title>{$pagetitle|default:'Wedding website templates | InviteIndia'}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{$metadesc|default:'Create beautiful wedding websites and e-invites online with InviteIndia.'}" />
<meta name="keywords" content="{$metakeywords|default:'wedding website, wedding invitation, online wedding card, Indian wedding website'}" />
<meta property="og:title" content="{$pagetitle|default:'Wedding website templates | InviteIndia'}" />
<meta property="og:description" content="{$metadesc|default:'Create beautiful wedding websites and e-invites online with InviteIndia.'}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{$can_url|default:$glb_site_url}" />
<meta property="og:site_name" content="InviteIndia" />
<meta property="og:locale" content="en_IN" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{$pagetitle|default:'Wedding website templates | InviteIndia'}" />
<meta name="twitter:description" content="{$metadesc|default:'Create beautiful wedding websites and e-invites online with InviteIndia.'}" />
{if $meta_application_name ne ''}
<meta name="application-name" content="{$meta_application_name}" />
{/if}
{if $tpl_noneed_index eq '1'}
<meta name="robots" content="noindex, nofollow">
{else}
<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
{/if}
<link href="{$static_domain_path_img}/site/favicon.png" rel="icon">
{if $can_url neq ''}
<link rel="canonical" href="{$can_url}" />
{elseif $glb_site_url neq ''}
<link rel="canonical" href="{$glb_site_url}" />
{/if}
<!-- //custom-theme -->
<link href="{$static_domain_path_css}/base/bootstrap{$glb_minify_css}.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$static_domain_path_css}/base/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="includes/scripts/js/base/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="{$static_domain_path_css}/base/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="{$static_domain_path_css}/userstyle.css" rel="stylesheet" type="text/css" media="screen" property="" />
{include file="default/scriptsrcs-web.tpl"}
{if $glb_mainEntity neq ''}
{$glb_mainEntity}
{else}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "name": "InviteIndia",
      "url": "https://www.inviteindia.com/",
      "logo": "https://www.inviteindia.com/site/favicon.png",
      "description": "Create beautiful wedding websites and digital invitations for Indian weddings."
    },
    {
      "@type": "WebSite",
      "name": "InviteIndia",
      "url": "https://www.inviteindia.com/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.inviteindia.com/?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
  ]
}
</script>
{/if}
{if $smarty.session.sess_user_id eq '' }
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7441584415804192"
     crossorigin="anonymous"></script>
</head>
{/if}
<body {if $currentpage_js eq 'searchloc_gmap'} onload="xz()" onunload="GUnload()" {/if}>
<!-- banner -->
	<div {if $isMobile eq 1} class="banner1" {/if}>
		<div class="container">
			<!-- header -->
			<div class="w3_agile_menu">
				<div class="agileits_w3layouts_nav">
					<div id="toggle_m_nav">
						<div id="m_nav_menu" class="m_nav">
							{if $isMobile eq 1}
							<div class="m_nav_ham w3_agileits_ham" id="m_ham_1"></div>
							<div class="m_nav_ham" id="m_ham_2"></div>
							<div class="m_nav_ham" id="m_ham_3"></div>
							{else}
							<div class="m_nav_ham w3_agileits_ham button_open m_nav_ham_1_open" id="m_ham_1"></div>
							<div class="m_nav_ham button_open m_nav_ham_2_open" id="m_ham_2"></div>
							<div class="m_nav_ham button_open m_nav_ham_3_open" id="m_ham_3"></div>
							{/if}
						</div>
					</div>
					<div class="agileinfo_social_icons " id="quick_links_menu">
						<ul class="agileits_social_list">
							{if $smarty.session.sess_user_id eq '' }
							<li><a href="#" class="w3_agile_facebook" id="gnav_login" data-toggle="modal" data-target="#loginWindow">Login</a></li>
							{else}
							<li><a href="myprofile.php?do=mprofile" class="w3_agile_facebook" title="My profile"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a></li>
							<li><a href="logout.php" class="w3_agile_facebook" title="Logout"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
							{/if}
						</ul>
					</div>
					{if $isMobile eq 1}
					<div id="m_nav_container" class="m_nav wthree_bg">
						{include file="default/top_nav_mobile.tpl"}
					</div>
					{else}
					<div id="m_nav_container" class="m_nav wthree_bg container_open bar_open">
						{include file="default/top_nav_pc.tpl"}
					</div>
					{/if}
				</div>
			</div>
			{if $isMobile eq 1}
			<div class="header">
				<a href="/" title="Wedding website"><img src="{$static_domain_path_img}/inlogo.png" alt="Online wedding website"></a>
				<div class="clearfix"> </div>
			</div>
			<div class="sub-banner-bottom-mob"></div>
			{else}
			<div class="sub-banner-bottom"></div>
			{/if}
			<!-- //header -->
		</div>
	</div>
<!-- //banner -->