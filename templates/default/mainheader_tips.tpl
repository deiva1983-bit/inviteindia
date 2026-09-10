<!DOCTYPE html>
<html lang="en">
<head>
<title>{$pagetitle}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{$metadesc}" />
<meta name="keywords" content="{$metakeywords}" />
<meta name="robots" content="NOODP">
<link href="{$static_domain_path_img}/site/favicon.png" rel="icon">
{if $can_url neq ''}
<link rel="canonical" href="{$can_url}" />
{/if}
<!-- //custom-theme -->
<link href="{$static_domain_path_css}/base/bootstrap{$glb_minify_css}.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$static_domain_path_css}/base/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$static_domain_path_css}/base/flexslider.css" rel="stylesheet" type="text/css" media="screen" property="" />
<!-- js -->
<script src="includes/scripts/js/base/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="{$static_domain_path_css}/base/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
{include file="default/scriptsrcs-web.tpl"}
<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="{$static_domain_path_css}/userstyle.css" rel="stylesheet" type="text/css" media="screen" property="" />
<script data-ad-client="ca-pub-7441584415804192" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
<!-- banner -->
	<div class="sub_pages">
	<div class="banner-bg-{$current_page}">
		<div class="container banner-layer">
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
						<li><a href="login.php" class="w3_agile_facebook" id="gnav_login" title="Login">Login</a></li>						
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
			<div class="header">
					<a href="https://www.inviteindia.com" title="Wedding website"><img src="{$static_domain_path_img}/inlogo.png" alt="Online wedding website"></a>
				<div class="clearfix"> </div>
			</div>	
			<!-- //header -->
			<div class="w3ls_banner_info">
					<div class="agileits_w3layouts_banner_info">
						<h1 class="home-head"><strong>Wedding tips and ideas</strong></h1>
						<h1 class="sub-head">For your Special Day!</h1>
						<h2>Wedding tips for couples, Indian wedding planning tips, Wedding planning tips on a budget.</h2>
							
					</div>
			</div>
		</div>
	</div>
	</div>
<!-- //banner -->