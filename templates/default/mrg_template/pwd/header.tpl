<!DOCTYPE html>
<html lang="en">
<head>
<title>{$pagetitle}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{$metadesc}" />
<meta name="keywords" content="{$metakeywords}" />
<meta name="robots" content="NOODP">
<!-- //custom-theme -->
<link href="{$static_domain_path_css}/base/bootstrap{$glb_minify_css}.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="includes/scripts/js/base/jquery-2.1.4.min.js"></script>
<script src="includes/scripts/userdefind/secu.js?id=1"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="{$static_domain_path_css}/base/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->

<link href="//fonts.googleapis.com/css?family=Emilys+Candy" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Sunshiney" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">
<link href="{$static_domain_path_css}/secure.css?id=1" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- banner -->
<div class="banner banner-bg-3">
	<div class="banner-layer">
		<div class="container">
			<div class="w3ls_banner_info col-md-12">
				<div class="agileits_w3layouts_banner_info">
				<h4 class="home-head"><strong>{$glb_m_name} and {$glb_f_name}</strong> are </h4>
				<h1 class="tit">GETTING MARRIED</h1>
				<h2 class="sub-tit">---and you're invited!---</h2>
				</div>
				<div class="pass-box w3agile">
				<h3 class="sub_head_max">Well, You are if you've been sent a password</h3>
				<input type="hidden" name="glb_id" id="glb_id" value={$glb_id} />
				<input type="password" name="passcode" id="passcode" placeholder="Password" autocomplete="off"/>
				<button class='button' id="butt_register">Submit</button>
				</div>
				<div id="validateTips_pwd" class="validateTips_pwd"></div>
			</div>
		</div>
	</div>
</div>