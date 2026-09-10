<!DOCTYPE html>
<html lang="en">
<head>
<title>{$pagetitle}</title>
{if $glb_meta_search_hide eq '1'}
<meta name="robots" content="noindex">
{else}
<meta name="robots" content="NOODP">
{/if}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{$metadesc}" />
<meta name="keywords" content="{$metakeywords}" />

<link href="{$static_domain_path_img}/site/favicon.png" rel="icon">
{if $can_url neq ''}
<link rel="canonical" href="{$can_url}" />
{/if}
<!-- //custom-theme -->
<link href="{$static_domain_path_css}/base/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$static_domain_path_css}/base/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{$static_domain_path_js}/base/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="{$static_domain_path_css}/base/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="{$static_domain_path_css}/userstyle.css" rel="stylesheet" type="text/css" media="screen" property="" />
<link href="{$static_domain_path_css}/vendors.css" rel="stylesheet" type="text/css" media="screen" property="" />
{include file="../../default/scriptsrcs-vendors.tpl"}
<script type='text/javascript' src='{$static_domain_path_js}/userdefind/ven_suppliers.js'></script>
</head>

<body>
<!-- banner -->
	<div class="banner1">
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
							{if $user_log_id_vend eq '0'}
							<li><a href="{$glb_site_url}vendors/login.php" class="w3_agile_facebook" id="gnav_login" title="Login">Vendors login</a></li>
							{/if}
						</ul>
					</div>

					{if $isMobile eq 1}
					<div id="m_nav_container" class="m_nav wthree_bg">
						{include file="../../default/vendors/top_nav_mobile.tpl"}
					</div>
					{else}
					<div id="m_nav_container" class="m_nav wthree_bg container_open bar_open">
						{include file="../../default/vendors/top_nav_pc.tpl"}
					</div>
					{/if}

				</div>
			</div>
			<div class="header">
				<a href="https://www.inviteindia.com" title="Wedding website"><img src="{$static_domain_path_img}/inlogo.png" alt="Online wedding website"></a>
				<div class="clearfix"> </div>
			</div>	
			<!-- //header -->
		</div>
	</div>
<!-- //banner -->