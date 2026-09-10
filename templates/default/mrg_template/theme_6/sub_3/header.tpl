<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$pagetitle}</title>
{include file="default/wedscriptsrcs.tpl"}
<meta name="robots" content="noindex">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<link href="images/favicon.png" rel="icon">
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link rel="stylesheet" href="{$glb_img_urls}css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="{$glb_img_urls}css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="{$glb_img_urls}css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_3/style.css" />
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_3/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="tex

<!--[if lt IE 9]>	
	<script type="text/javascript" src="{$glb_img_urls}js/html5.js"></script>
<![endif]-->
</head>

<body id="page1" {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div  id="left-top">
<div class="extra  pag_con" id="right-top">
<div class="" id="left-bottom">
<div class="extra rbottom" id="right-bottom">
	<div class="main">
<!-- header -->
		<header>
			<nav>
				<ul id="menu">
						{if $glb_animate_cover eq '0'}
						<div {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}" title="Home">{$glb_wed_card_title_home}</a></div>
						{else}
						<div {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}?status=c" title="Home">{$glb_wed_card_cover}</a></div>
						<div {if $c_page_status eq 'h'} id="menu_active" {/if}><a href="{$glb_page_url}?status=h" title="Home">{$glb_wed_card_title_home}</a></div>
						{/if}
						<div {if $c_page_status eq '1'} id="menu_active" {/if}><a href="{$glb_page_url}?status=1" title="Events">{$glb_wed_card_title_events}</a></div>
						<div {if $c_page_status eq '2'} id="menu_active" {/if}><a href="{$glb_page_url}?status=2" title="">{$glb_wed_card_title_guestbook}</a></div>
						{if $glb_total_alb_records neq 0}<div {if $c_page_status eq '3'} id="menu_active" {/if}><a href="{$glb_page_url}?status=3" title="">{$glb_wed_card_title_album}</a></div>{/if}
						<div {if $c_page_status eq '4'} id="menu_active" {/if} style="background:none;"><a href="{$glb_page_url}?status=4" title="">{$glb_wed_card_title_loc}</a></div>
				</ul>
			</nav>			
		</header>
<!-- / header -->
<div id="content" class="pag_lcon" {if $glb_home_img_status eq 2} style="margin-left: 0px;" {/if}>
{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq ''  && $page_ownpage eq ''} <h1 id="pageheddings" style='text-align: center;'>{$glb_pageheading}</h1>{/if}{/if}