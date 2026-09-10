<!DOCTYPE html>
<html lang="en">
<head>
<title>{$pagetitle}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{$metadesc}" />
<meta name="keywords" content="{$metakeywords}" />
<meta name="robots" content="NOODP">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Free wedding websites with more attaractive features." />
<meta property="og:description" content="Create your wedding website within few clicks. You can add wedding story, album, background music, guest book, RSVP, animations, etc." />
<meta property="og:url" content="https://www.inviteindia.com/invitation-themes.php" />
<meta property="og:site_name" content="InviteIndia" />
<meta property="article:publisher" content="https://www.facebook.com/invitindia" />
<link href="{$static_domain_path_img}/site/favicon.png" rel="icon">
<link rel="alternate" href="https://www.inviteindia.com" hreflang="en-in" />
{if $can_url neq ''}
<link rel="canonical" href="{$can_url}" />
{/if}
{include file="default/scriptsrcs-web.tpl"}
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
<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="{$static_domain_path_css}/userstyle.css" rel="stylesheet" type="text/css" media="screen" property="" />
</head>
<body>
<!-- banner -->
	<div class="banner banner-bg-{$glb_ranvalue}">
	<div class="banner-layer">
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
						<li><a href="register.php" class="w3_agile_facebook" id="gnav_login" title="Login">Login</a></li>						
						{else}
						<li><a href="myprofile.php?do=mprofile" class="w3_agile_facebook" title="My profile"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a></li>
						<li><a href="logout.php" class="w3_agile_facebook" title="Logout"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
						{/if}
					</ul>
				</div>
					{if $isMobile eq 1}
					<div id="m_nav_container" class="m_nav wthree_bg">
						<nav class="menu menu--sebastian">
							<ul id="m_nav_list" class="m_nav menu__list">
								<li class="m_nav_item" id="m_nav_item_1"> <a href="https://www.inviteindia.com" class="link link--kumya"><i class="fa fa-home" aria-hidden="true"></i><span data-letters="Home">Home</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'main_sub'}active{/if}" id="m_nav_item_2"> <a href="wedding-website.php" class="link link--kumya"><i class="fa fa-wpforms" aria-hidden="true"></i><span data-letters="Wedding website">Wedding website</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'themes'}active{/if}" id="m_nav_item_3"> <a href="invitation-themes.php" class="link link--kumya"><i class="fa fa-braille" aria-hidden="true"></i><span data-letters="Themes">Themes</span></a></li>
								{if $smarty.session.sess_user_id neq '' }
								<li class="m_nav_item {if $topnav_select eq 'wedd'}active{/if}" id="moble_nav_item_4"> <a href="wedding-website-settings" class="link link--kumya"><i class="fa fa-cog" aria-hidden="true"></i><span data-letters="Invitations">Invitations</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_5"> <a href="custom-domain.php" class="link link--kumya"><i class="fa fa-id-badge" aria-hidden="true"></i><span data-letters="My domain">My domain</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_6"> <a href="packages.php" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i><span data-letters="Package">Package</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_7"> <a href="wedding-tips" class="link link--kumya"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><span data-letters="Wedding tips">Wedding tips</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'wgift'}active{/if}" id="moble_nav_item_8"> <a href="wedding-gift-for-couples" class="link link--kumya"><i class="fa fa-gift" aria-hidden="true"></i><span data-letters="Gift">Gift</span></a></li>
								{else}
								<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_4"> <a href="custom-domain.php" class="link link--kumya"><i class="fa fa-id-badge" aria-hidden="true"></i><span data-letters="My domain">My domain</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_5"> <a href="packages.php" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i><span data-letters="Package">Package</span></a></li>
								<li class="m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_6"> <a href="wedding-tips" class="link link--kumya"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><span data-letters="Wedding tips">Wedding tips</span></a></li>
								{/if}
							</ul>
						</nav>
					</div>
					{else}
					<div id="m_nav_container" class="m_nav wthree_bg container_open bar_open">
						<nav class="menu menu--sebastian">
							<ul id="m_nav_list" class="m_nav menu__list">
								<li class="m_nav_item" id="m_nav_item_1"> <a href="https://www.inviteindia.com" class="link link--kumya"><i class="fa fa-home{if $smarty.session.sess_user_id neq '' } hide-home{/if}" aria-hidden="true"></i>{if $smarty.session.sess_user_id eq '' }<span data-letters="Home">Home</span>{/if}</a></li>

								<li class="m_nav_item {if $topnav_select eq 'main_sub'}active{/if}" id="m_nav_item_2"> <a href="wedding-website.php" class="link link--kumya"><i class="fa fa-wpforms" aria-hidden="true"></i><span data-letters="Wedding website">Wedding website</span></a></li>

								<li class="m_nav_item {if $topnav_select eq 'themes'}active{/if}" id="m_nav_item_3"> <a href="invitation-themes.php" class="link link--kumya"><i class="fa fa-braille" aria-hidden="true"></i><span data-letters="Themes">Themes</span></a></li>

								{if $smarty.session.sess_user_id neq '' }
								<li class="m_nav_item {if $topnav_select eq 'wedd'}active{/if}" id="moble_nav_item_4"> <a href="wedding-website-settings" class="link link--kumya"><i class="fa fa-cog" aria-hidden="true"></i><span data-letters="Invitations">Invitations</span></a></li>
								
								<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_5"> <a href="custom-domain.php" class="link link--kumya"><i class="fa fa-id-badge" aria-hidden="true"></i><span data-letters="My domain">My domain</span></a></li>

								<li class="dropdown m_nav_item" id="moble_nav_item_6">
									<a href="#" class="dropdown-toggle link link--kumya" data-toggle="dropdown"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i><span data-letters="More">More</span></a>
									<ul class="dropdown-menu agile_short_dropdown">
								
									<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_7"> <a href="packages.php" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i><span data-letters="Package">Package</span></a></li>

									<li class="m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_8"> <a href="wedding-tips" class="link link--kumya"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><span data-letters="Wedding tips">Wedding tips</span></a></li>

									<li class="m_nav_item {if $topnav_select eq 'wgift'}active{/if}" id="moble_nav_item_9"> <a href="wedding-gift-for-couples" class="link link--kumya"><i class="fa fa-gift" aria-hidden="true"></i><span data-letters="Gift">Gift</span></a></li>

									
									<!-- <li class="m_nav_item {if $topnav_select eq 'vendors'}active{/if}" id="moble_nav_item_10"> <a href="vendors/index.php" class="link link--kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="Vendors">Vendors</span></a></li> -->
									</ul>
								</li>
								{else}
								<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_4"> <a href="custom-domain.php" class="link link--kumya"><i class="fa fa-id-badge" aria-hidden="true"></i><span data-letters="My domain">My domain</span></a></li>

								<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_5"> <a href="packages.php" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i><span data-letters="Package">Package</span></a></li>

								<li class="m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_6"> <a href="wedding-tips" class="link link--kumya"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><span data-letters="Wedding tips">Wedding tips</span></a></li>
								{/if}
							</ul>
						</nav>
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
				<section class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<div class="agileits_w3layouts_banner_info">
						<h4 class="home-head"><strong>Welcome to inviteindia.com!</strong></h4>
						<h1 class="sub-head">Online wedding invitation</h1>
						<h2>InviteIndia.com offers a complete wedding website for your wedding, You can manage all your wedding details in one place. Unlimited photo albums, Background music, Wedding registry, SMS reminder, Guest book management, Wedding covers, Own pages, and much more. </h2>
							<div class="w3ls_banner_bottom_grids">
							<div class="col-md-4 agileits_banner_bottom_grid_left">
								{if $smarty.session.sess_user_id neq '' }
								<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</div>
								<h4 class="sub_head_min"><a href='wedding-website-settings' class='sub_head up-margin badge badge-primary'>Create website</a></h4>
								{else}
								<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
									<i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>
								</div>
								<h4 class="sub_head_min"><a href='register.php' class='sub_head up-margin badge badge-primary'>Login</a></h4>
								{/if}
							</div>

							<div class="col-md-4 agileits_banner_bottom_grid_left">
								<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
									<i class="fa fa-print" aria-hidden="true"></i>
								</div>
								<h4 class="sub_head_min"><a href='sample-invitation.php' class='sub_head up-margin badge badge-primary'>Sample websites</a></h4>
							</div>
							<div class="col-md-4 agileits_banner_bottom_grid_left">
								<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
									<i class="fa fa-wpforms" aria-hidden="true"></i>
								</div>
								<h4 class="sub_head_min"><a href='invitation-themes.php' class='sub_head up-margin badge badge-primary'>Website themes</a></h4>
							</div>
							<div class="clearfix"> </div>
							</div>

					</div>
				</li>
			</ul>
		</div>
	</section>
			<!-- flexSlider -->
				<script src="{$static_domain_path_js}/base/jquery.flexslider.js"></script>
				{literal}
				<script>
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				</script>
				{/literal}
			<!-- //flexSlider -->
			</div>
		</div>
	</div>
	</div>
<!-- //banner -->