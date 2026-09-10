<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$pagetitle}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.css" media="screen" />
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}iecss.css" />
<![endif]-->
</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div id="main_container">
        <div id="header">
                <div id="menu">
                        <ul>
                                {if $glb_animate_cover neq '0'}
                                <li><a href="{$glb_page_url}" title="Home">Cover Design</a></li>
                                {/if}
                                <li><a href="{$glb_page_url}?status=h" title="Home">{$glb_wed_card_title_home}</a></li>
                                <li><a href="{$glb_page_url}?status=1" title="Events">{$glb_wed_card_title_events}</a></li>
                                <li><a href="{$glb_page_url}?status=2" title="">{$glb_wed_card_title_guestbook}</a></li>
                                {if $glb_total_alb_records neq 0}<li><a href="{$glb_page_url}?status=3" title="">{$glb_wed_card_title_album}</a></li>{/if}
                                <li><a href="{$glb_page_url}?status=4" title="">{$glb_wed_card_title_loc}</a></li>
                        </ul>
                </div>
                <span style="padding-top: 400px;"><h1 id="headmsg">{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''} {$glb_pageheading} {/if}{/if}</h1></span></div> 