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
<script src="{$static_domain_path_js}/base/jquery.flexslider.js"></script>
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
</head>
<body>
<!-- banner -->
	<div class="banner">
	<div class="banner-layer">
		<div class="container">
			<!-- header -->
			<div class="w3_agile_menu">
				<div class="agileits_w3layouts_nav">
					<div id="toggle_m_nav">
						<div id="m_nav_menu" class="m_nav">
							<div class="m_nav_ham w3_agileits_ham" id="m_ham_1"></div>
							<div class="m_nav_ham" id="m_ham_2"></div>
							<div class="m_nav_ham" id="m_ham_3"></div>
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
					<div id="m_nav_container" class="m_nav wthree_bg">
						{include file="default/top_nav_mobile.tpl"}
					</div>
				</div>
			</div>
			<div class="header">
				<a href="/" title="Wedding website"><img src="{$static_domain_path_img}/inlogo.png" alt="Online wedding website"></a>
				<div class="clearfix"> </div>
			</div>
			<!-- //header -->
			<div class="w3ls_banner_info banner-bottom home hm-banner-bottom">
				<div class="agileits_w3layouts_banner_info">
					<h1>Create unforgettable digital wedding invites for your big day</h1>
					<p><b>The wedding industry</b> is expanding quickly, providing endless choices for couples planning their <b>big day</b>. We know how stressful wedding planning can feel, which is why our goal is to simplify the process and make it as smooth and stress-free as possible. Whether you're looking for a <b>custom wedding website</b> to display your photos and videos, share <b>save-the-date announcements</b> or a more advanced platform to handle guest lists, RSVPs, and event details, we offer personalized solutions tailored to your needs. Our <b>mobile-friendly, SEO-optimized websites</b> are crafted to match your unique style while ensuring easy navigation for you and your guests. With features like <b>personalized domains</b>, <b>social media integrations</b>, and <b>live-streaming options</b>, we're here to help you create a memorable and hassle-free wedding experience. Let us handle the digital details so you can focus on celebrating your special day!</p>
						<div class="w3ls_banner_bottom_grids">
						<div class="col-md-3 agileits_banner_bottom_grid_left">
							{if $smarty.session.sess_user_id neq '' }
							<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</div>
							<a href='wedding-website-settings' class='sub_head up-margin badge badge-primary'>Create website</a>
							{else}
							<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
								<i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>
							</div>
							<a href='#' class='sub_head up-margin badge badge-primary' data-toggle="modal" data-target="#loginWindow" id="gnav_login">Login</a>
							{/if}
						
							<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
								<i class="fa fa-print" aria-hidden="true"></i>
							</div>
							<a href='sample-invitation.php' class='sub_head up-margin badge badge-primary'>Sample</a>
						
							<div class="agileinfo_banner_bottom_grid_l_grid home-quick-links">
								<i class="fa fa-wpforms" aria-hidden="true"></i>
							</div>
							<a href='invitation-templates.php' class='sub_head up-margin badge badge-primary'>Themes</a>
						</div>
						<div class="col-md-6 agileits_banner_bottom_grid_left">
							<section class="slider bg_theme">
							<div class="flexslider">
								<ul class="slides">
									<li><img src="static/images/banner-1.jpg" class='img-thumbnail' alt="Wedding website with native background image" /></li>
									<li><img src="static/images/banner-2.jpg" class='img-thumbnail' alt="Mobile wedding website with native background image" /></li>
									<li><img src="static/images/banner-3.jpg" class='img-thumbnail' alt="Desktop wedding website" /></li>
									<li><img src="static/images/banner-4.jpg" class='img-thumbnail' alt="Mobile wedding website" /></li>
								</ul>
							</div>
							</section>
						</div>

						<div class="clearfix"> </div>
						</div>
				</div>
			</div>
		</div>
	</div>
	</div>
<!-- //banner -->