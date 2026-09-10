<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$pagetitle}</title>
<meta name="robots" content="noindex">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
{include file="default/wedscriptsrcs.tpl"}
<link href="images/favicon.png" rel="icon">
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}css/global.css">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}css/basebundle.css">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}css/myspace2.css">
<!-- <link rel="stylesheet" type="text/css" href="{$glb_img_urls}css/theme-default.css">  -->
<link rel="alternate stylesheet" type="text/css" media="screen" title="white-theme" href="{$glb_img_urls}css/theme-white.css"> 
<link rel="alternate stylesheet" type="text/css" media="screen" title="white-theme" href="{$glb_img_urls}sub_1/style.css"> 
<script src="{$glb_img_urls}/styleswitch.js" type="text/javascript"></script>
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_1/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
</head>
 <body {if $gmap_status_js eq '1'} onload="initialize()" {/if} class=" layout_0_2_0 ie7"   id="theme7_body"> 
 

<div class="wrap">
	<div id="header" class="clearfix globalWidth">
		
		<div id="googlebar" class="clearfix">			 
			<div id="searchContainer_Header" class="global">
				
			</div>
		</div>
<!-- Head Banner -->
<div class="module module0 columnModule0 odd basicInfoModule" id="modulebasicInfo">
	<div class="moduleTop">
		<div>
			<div></div>
		</div>
	</div>
	<div class="moduleMid">
		<div class="moduleMid1">
		<!--<table border="1" align="center" width="100%">
			<tr><td><div align="left">
				<img src="{$glb_img_urls}sub_1/images/headleft.gif" alt="Lighting Fixtures" border="0" height="235px"></div></td>
			<td><div align="right">
				<img src="{$glb_img_urls}sub_1/images/banner.jpg" alt="Lighting Fixtures" border="0" height="235px"></div></td></tr>
		</table> -->
		
		<div align="right" id="banner" style="height: 193px;">
			<table border="1" align="center" width="100%">
			<tr style='float: right;'>
			<td width="100%" colspan="2">
				<div id="topnav" class="clearfix">
			<ul id="leftNav"> 
						{if $glb_animate_cover eq '0'}
						<li {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}" title="Home">{$glb_wed_card_title_home}</a></li>
						{else}
						<li {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}" title="Home">Cover Design</a></li>
						<li {if $c_page_status eq 'h'} id="menu_active" {/if}><a href="{$glb_page_url}?status=h" title="Home">{$glb_wed_card_title_home}</a></li>
						{/if}
						<li {if $c_page_status eq '1'} id="menu_active" {/if}><a href="{$glb_page_url}?status=1" title="Events">{$glb_wed_card_title_events}</a></li>
						<li {if $c_page_status eq '2'} id="menu_active" {/if}><a href="{$glb_page_url}?status=2" title="">{$glb_wed_card_title_guestbook}</a></li>
						{if $glb_total_alb_records neq 0}<li {if $c_page_status eq '3'} id="menu_active" {/if}><a href="{$glb_page_url}?status=3" title="">{$glb_wed_card_title_album}</a></li>{/if}
						<li {if $c_page_status eq '4'} id="menu_active" {/if}><a href="{$glb_page_url}?status=4" title="">{$glb_wed_card_title_loc}</a></li>
				</ul>
			</td></tr>
			
			
			
			
			
		</table>
		</div>
		<div class="profileLinksEnd"></div>
		<div class="moduleBodyEnd"></div>
			 
		</div>
	</div>
	<div class="moduleBottom">
		<div>
			<div></div>
		</div>
	</div>
</div>
<!-- Head Banner -->

<!-- Head links -->
	 
	</div>
	 <!-- Head links -->
	{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''} <h1 id="headmsg"> {$glb_pageheading} </h1> {/if}{/if}