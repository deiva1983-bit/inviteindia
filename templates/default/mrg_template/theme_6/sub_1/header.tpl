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
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_1/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
        <script type="text/javascript" src="{$glb_img_urls}js/html5.js"></script>
<![endif]-->
</head>
<body id="page1" {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div id="left-top">
<div id="right-top">
<div class="pag_lcon" id="left-bottom">
<div class="extra pag_con" id="right-bottom">
<div class="main center_footer">
<!-- header -->
        <header>
                <nav>
                        <ul id="menu">
                                        {if $glb_animate_cover eq '0'}
                                        <li {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}?status=h" title="Home" class="about">{$glb_wed_card_title_home}</a></li>
                                        {else}
                                        <li {if $c_page_status eq ''} id="menu_active" {/if}><a href="{$glb_page_url}" title="Home" class="about">{$glb_wed_card_cover}</a></li>
                                        <li {if $c_page_status eq 'h'} id="menu_active" {/if}><a href="{$glb_page_url}?status=h" title="Home" class="about">{$glb_wed_card_title_home}</a></li>
                                        {/if}
                                        
                                        
                                        <li {if $c_page_status eq '1'} id="menu_active" {/if}><a href="{$glb_page_url}?status=1" title="Events" class="about">{$glb_wed_card_title_events}</a></li>
                                        <li {if $c_page_status eq '2'} id="menu_active" {/if}><a href="{$glb_page_url}?status=2" title="" class="about">{$glb_wed_card_title_guestbook}</a></li>
                                        {if $glb_total_alb_records neq 0}<li {if $c_page_status eq '3'} id="menu_active" {/if}><a href="{$glb_page_url}?status=3" title="" class="about">{$glb_wed_card_title_album}</a></li>{/if}
                                        <li {if $c_page_status eq '4'} id="menu_active" {/if} style="background:none;"><a href="{$glb_page_url}?status=4" title="" class="about">{$glb_wed_card_title_loc}</a></li>
                        </ul>
                </nav>                          
        </header>
<!-- / header -->
<div id="content" class="" {if $glb_home_img_status eq 2} style="margin-left: 0px;" {/if}>
{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''}<h1 id='pageheddings' style='text-align: center;'> {$glb_pageheading} </h1>{/if}{/if}