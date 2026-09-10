<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>{$pagetitle}</title>
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_site_url}/templates/default/mrg_template/theme_1/style.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<!-- Main -->
<div id="main" class="box">
        <div class="top">
                <div class="header">
                <div class="heading">{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''} {$glb_pageheading} {else}&nbsp; {/if}{else}&nbsp;{/if}</div>
        </div>
</div>

<div class="container">
        <div class="navigation">
                {if $glb_animate_cover neq '0'}
                <a href="{$glb_page_url}?status=c" title="">Wedding cover</a>
                {/if}
                <a href="{$glb_page_url}?status=h">{$glb_wed_card_title_home}</a>
                <a href="{$glb_page_url}?status=1">{$glb_wed_card_title_events}</a>             
                <a href="{$glb_page_url}?status=2">{$glb_wed_card_title_guestbook}</a>
                {if $glb_total_alb_records neq 0}<a href="{$glb_page_url}?status=3">{$glb_wed_card_title_album}</a>{/if}
                <a href="{$glb_page_url}?status=4">{$glb_wed_card_title_loc}</a>
                <div class="clearer"><span></span></div>
          </div>