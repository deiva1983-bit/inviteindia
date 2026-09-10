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
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}/majorcss.css' />
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
        <div class="wrapper">
        <div id="logo"><img alt="" src="{$glb_img_urls}images/logo.png"/></div><span><h1 id="headmsg"><br />{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''} {$glb_pageheading} {else}&nbsp;{/if}{else}&nbsp;{/if}</h1></span>
        <div style="clear:both"></div>
        </div>
<!-- menu -->
<div id="menu-background">
        <div id="menu-wrapper">
                <div id="menu">
                        <ul>
                                <li class="menu-btn"></li>
                                <li class="divider"><img alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                                <li class="menu-btn"><a href="{$glb_page_url}?status=h" class="selected">{$glb_wed_card_title_home}</a></li>
                                <li class="divider"><img alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                                <li class="menu-btn"><a href="{$glb_page_url}?status=1" class="selected">{$glb_wed_card_title_events}</a></li>
                                <li class="divider"><img alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                                <li class="menu-btn"><a href="{$glb_page_url}?status=2" class="selected">{$glb_wed_card_title_guestbook}</a></li>
                                <li class="divider"><img alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                                <li class="menu-btn"><a href="{$glb_page_url}?status=4" class="selected">{$glb_wed_card_title_loc}</a></li>
                                <li class="divider"><img alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                                <li class="menu-btn">{if $glb_total_alb_records neq 0}<a href="{$glb_page_url}?status=3" class="selected">{$glb_wed_card_title_album}</a>
                                {elseif $glb_animate_cover neq '0'}
                                <a href="{$glb_page_url}?status=c" title="">Cover Design</a>
                                {/if}
                                </li>
                                <li class="divider">
                                {if $glb_total_alb_records neq 0 || $glb_animate_cover neq '0'}<img alt="" src="{$glb_img_urls}images/menu-divider.png"/>{/if}</li>
                        </ul>
                        <div style="clear:both"></div>
                </div>
        </div>
</div>