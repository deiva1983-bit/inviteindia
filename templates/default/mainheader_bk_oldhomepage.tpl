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
<meta property="og:url" content="https://www.inviteindia.com/invitation-templates.php" />
<meta property="og:site_name" content="InviteIndia" />
<meta property="article:publisher" content="https://www.facebook.com/invitindia" />
<link href="{$static_domain_path_img}/site/favicon.png" rel="icon">
<link rel="alternate" href="https://www.inviteindia.com" hreflang="en-in" />
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
{include file="default/scriptsrcs-web.tpl"}
<!-- font-awesome-icons -->
<link href="{$static_domain_path_css}/base/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="{$static_domain_path_css}/userstyle.css" rel="stylesheet" type="text/css" media="screen" property="" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7441584415804192"
     crossorigin="anonymous"></script>
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
						<h1 class="home-head"><strong>Get Started on Your Own Wedding Website Today!</strong></h1>
						<p>Our step-by-step guide shows you how to create a stunning wedding website, from choosing a template to writing content. This will bring all your wedding details into one place and allow you to easily reach your guests. On the website, you can create unlimited photo albums, add your own background music, set up a wedding registry, schedule SMS reminders, maintain a guest book, design wedding covers, and much more.</p>
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
								<h4 class="sub_head_min"><a href='#' class='sub_head up-margin badge badge-primary' data-toggle="modal" data-target="#loginWindow" id="gnav_login">Login</a></h4>
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
								<h4 class="sub_head_min"><a href='invitation-templates.php' class='sub_head up-margin badge badge-primary'>Website themes</a></h4>
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