<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$pagetitle}</title>
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link rel="stylesheet" href="{$glb_img_urls}css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="{$glb_img_urls}css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="{$glb_img_urls}css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_1/style.css" />
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_1/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{$glb_img_urls}js/html5.js"></script>
<![endif]-->
</head>
<body id="page1" {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div class="extra ">
        <div class="main center_footer">
<!-- header -->
                <header>
                        <nav>
                                <ul id="menu">
                                                {if $glb_animate_cover neq '0'}
                                                <li><a href="{$glb_page_url}?status=c" title="" class="about">Cover Design</a></li>
                                                {/if}
                                                <li {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}?status=h" title="Home" class="about">{$glb_wed_card_title_home}</a></li>
                                                <li {if $c_page_status eq '1'} id="menu_active" {/if}><a href="{$glb_page_url}?status=1" title="Events" class="about">{$glb_wed_card_title_events}</a></li>
                                                {if $glb_master_id neq '5633'}<li {if $c_page_status eq '2'} id="menu_active" {/if}><a href="{$glb_page_url}?status=2" title="" class="about">{$glb_wed_card_title_guestbook}</a></li>{/if}
                                                {if $glb_total_alb_records neq 0}<li {if $c_page_status eq '3'} id="menu_active" {/if}><a href="{$glb_page_url}?status=3" title="" class="about">{$glb_wed_card_title_album}</a></li>{/if}
                                                <li {if $c_page_status eq '4'} id="menu_active" {/if} style="background:none;"><a href="{$glb_page_url}?status=4" title="" class="about">{$glb_wed_card_title_loc}</a></li>
                                </ul>
                        </nav>
                        
                </header>
<!-- / header -->
<!-- content -->
                <div id="content" >