<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>{$pagetitle}</title>
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
<link href="{$glb_img_urls}style.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
	<div id="wrapper">
<!-- banner -->
		<div id="banner">
			<div id="logo"><img  alt="" src="{$glb_img_urls}images/logo.png"/><span style="width: 800px">
			<span id="headmsg">{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''} {$glb_pageheading} {else}&nbsp;{/if}{else}&nbsp;{/if}</span></span></div>
		</div>
<!-- content -->
		<div id="content-bg"><div class="inner_copy"></div>
<!-- menu -->
			<div id="menu">
				<ul>
					<li class="menu-btn"><a href="{$glb_page_url}?status=h" class="selected">{$glb_wed_card_title_home}</a></li>
					<li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
					<li class="menu-btn"><a href="{$glb_page_url}?status=1" class="selected">{$glb_wed_card_title_events}</a></li>
					<li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
					<li class="menu-btn"><a href="{$glb_page_url}?status=2" class="selected">{$glb_wed_card_title_guestbook}</a></li>
					{if $glb_total_alb_records neq 0}
					<li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
					<li class="menu-btn"><a href="{$glb_page_url}?status=3" class="selected">{$glb_wed_card_title_album}</a></li>
					{elseif $glb_animate_cover neq '0'}
					<li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
					<li class="menu-btn"><a href="{$glb_page_url}?status=c" class="selected">Cover Design</a></li>
					{/if}
					<li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
					<li class="menu-btn"><a href="{$glb_page_url}?status=4" class="selected">{$glb_wed_card_title_loc}</a></li>
				</ul>
				<div style="clear:both"></div>
			</div>
			