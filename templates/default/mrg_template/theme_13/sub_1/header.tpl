<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>{$pagetitle}</title>
<meta name="robots" content="noindex">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta property="og:site_name" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
{include file="default/wedscriptsrcs.tpl"}
{include file="default/wedscriptadd_newtheme.tpl"}
<link href="{$glb_img_urls}style.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<link id="wsite-base-style" rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_1/css/sites.css">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_1/css/main_style.css" title="wsite-theme-css">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_1/css/css" title="wsite-theme-css">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_1/style.css" title="wsite-theme-css">
<link href="templates/css/jenna.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$glb_img_urls}sub_1/js/custom.js"></script>
<script type="text/javascript" src="{$glb_img_urls}sub_1/js/mobile.js"></script>
</head>
<body class="no-header-page  wsite-theme-light  wsite-page-index postload" {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div class="sticky-wrapper" style="height: 75px;">
                <div id="navigation" class="stuck">
                        <div id="nav">
                                <ul class="wsite-menu-default">
                                {if $glb_animate_cover eq '0'}
                                        <li {if $c_page_status eq ''} id="active" {/if} class="wsite-menu-item-wrap  wsite-nav-1" style="position: relative;"><a href="{$glb_page_url}"  class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_home}</a></li>
                                {else}
                                        <li class="wsite-menu-item-wrap  wsite-nav-1" style="position: relative;"><a href="{$glb_page_url}" class="wsite-menu-item" style="position: relative;">Cover Design</a></li>
                                        <li {if $c_page_status eq 'h'} id="active" {/if} class="wsite-menu-item-wrap  wsite-nav-1" style="position: relative;"><a href="{$glb_page_url}?status=h" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_home}</a></li>
                                {/if}
                                   <li {if $c_page_status eq '1'} id="active" {else} id="pg412467337577763891" {/if} class="wsite-menu-item-wrap  wsite-nav-2" style="position: relative;"><a href="{$glb_page_url}?status=1" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_events}</a></li>
                                   <li {if $c_page_status eq '2'} id="active" {else} id="pg645432854755138757" {/if} class="wsite-menu-item-wrap  wsite-nav-3" style="position: relative;"><a href="{$glb_page_url}?status=2" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_guestbook}</a></li>
                                        {if $glb_total_alb_records neq 0}
                                                <li {if $c_page_status eq '3'} id="active" {else} id="pg970737126564777802" {/if} class="wsite-menu-item-wrap  wsite-nav-4" style="position: relative;"><a href="{$glb_page_url}?status=3" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_album}</a></li>
                                        {/if}
                                        <li {if $c_page_status eq '4'} id="active" {else} id="pg578390878820802350" {/if} class="wsite-menu-item-wrap  wsite-nav-5" style="position: relative;"><a href="{$glb_page_url}?status=4" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_loc}</a></li>
                                </ul>
                        </div> <!-- Nav -->
                <div class="navmobile-wrapper">
                        <div id="navmobile" class="nav">
                                <div class="wsite-mobile-menu" style="display: block;">
                                        <div class="wsite-animation-wrap" style="position: relative;">
                                                <ul class="wsite-menu-default wsite-menu-slide" style="position: absolute; top: 0px; left: 0px; width: 100%;">
                                                {if $glb_animate_cover eq '0'}
                                        <li {if $c_page_status eq ''} id="active" {/if} class="wsite-menu-item-wrap  wsite-nav-1" style="position: relative;"><a href="{$glb_page_url}"  class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_home}</a></li>
                                {else}
                                        <li class="wsite-menu-item-wrap  wsite-nav-1" style="position: relative;"><a href="{$glb_page_url}" class="wsite-menu-item" style="position: relative;">Cover Design</a></li>
                                        <li {if $c_page_status eq 'h'} id="active" {/if} class="wsite-menu-item-wrap  wsite-nav-1" style="position: relative;"><a href="{$glb_page_url}?status=h" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_home}</a></li>
                                {/if}
                                   <li {if $c_page_status eq '1'} id="active" {else} id="pg412467337577763891" {/if} class="wsite-menu-item-wrap  wsite-nav-2" style="position: relative;"><a href="{$glb_page_url}?status=1" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_events}</a></li>
                                   <li {if $c_page_status eq '2'} id="active" {else} id="pg645432854755138757" {/if} class="wsite-menu-item-wrap  wsite-nav-3" style="position: relative;"><a href="{$glb_page_url}?status=2" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_guestbook}</a></li>
                                        {if $glb_total_alb_records neq 0}
                                                <li {if $c_page_status eq '3'} id="active" {else} id="pg970737126564777802" {/if} class="wsite-menu-item-wrap  wsite-nav-4" style="position: relative;"><a href="{$glb_page_url}?status=3" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_album}</a></li>
                                        {/if}
                                        <li {if $c_page_status eq '4'} id="active" {else} id="pg578390878820802350" {/if} class="wsite-menu-item-wrap  wsite-nav-5" style="position: relative;"><a href="{$glb_page_url}?status=4" class="wsite-menu-item" style="position: relative;">{$glb_wed_card_title_loc}</a></li>
                                                </ul>
                                        </div>
                                </div> <!-- wsite-mobile-menu -->
                        </div> <!-- navmobile -->
                </div> <!-- navmobile-wrapper -->
        </div> <!-- navigation -->
        </div> <!-- sticky-wrapper -->
        <div class="trigger-wrap">
                <label for="nav-trigger" class="nav-trigger hamburger">
                        <span class="open-btn">
                                <span class="mobile"></span>
                                <span class="mobile"></span>
                                <span class="mobile"></span>
                        </span>
                </label>
        </div>