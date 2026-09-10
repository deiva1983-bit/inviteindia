<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
<title>{$pagetitle}</title>
<meta charset="utf-8">
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link rel="stylesheet" href="{$glb_img_urls}sub_2/style.css" media="screen">
<!--[if lte IE 7]><link rel="stylesheet" href="{$glb_img_urls}sub_2/style.ie7.css" media="screen" /><![endif]-->
<link rel="stylesheet" href="{$glb_img_urls}sub_2/style.responsive.css" media="all">
<script src="{$glb_img_urls}sub_2/script.js"></script>
<script src="{$glb_img_urls}sub_2/script.responsive.js"></script>
<link rel="stylesheet" href="{$glb_img_urls}theme10.css" media="all">
<script src="templates/default/mrg_template/bootstrap/js/bootstrap.min.js"></script>
<link href="templates/default/mrg_template/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="templates/css/jenna.css" media="screen" rel="stylesheet" type="text/css" />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_2/majorcss.css' />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
{literal}<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
</style> {/literal}
</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div id="art-main">
<header class="art-header">
    <div class="art-shapes">
        <div class="art-object56127928"></div>

            </div>
<h1 class="art-headline"   style='padding-top:400px; text-align: center;'>
    <!--  {if $glb_pageheading neq ''}<span id='pageheddings'>{$glb_pageheading}</span>{else}&nbsp;{/if} -->
</h1>
<nav class="art-nav">
    <div class="art-nav-inner">
    <ul class="art-hmenu">
    {if $glb_animate_cover eq '0'}<li><a href="{$glb_page_url}" {if $c_page_status eq ''} class="active" {/if}>{$glb_wed_card_title_home}</a></li>{else}
    <li><a href="{$glb_page_url}?status=c">Cover Design</a></li>
    <li><a href="{$glb_page_url}?status=h" {if $c_page_status eq 'h'} class="active" {/if}>{$glb_wed_card_title_home}</a></li>
    {/if}
    <li><a href="{$glb_page_url}?status=1" {if $c_page_status eq '1'} class="active" {/if}>{$glb_wed_card_title_events}</a></li>
    <li><a href="{$glb_page_url}?status=2" {if $c_page_status eq '2'} class="active" {/if}>{$glb_wed_card_title_guestbook}</a></li>
    {if $glb_total_alb_records neq 0}<li><a href="{$glb_page_url}?status=3" {if $c_page_status eq '3'} class="active" {/if}>{$glb_wed_card_title_album}</a></li> {/if}
    <li><a href="{$glb_page_url}?status=4" {if $c_page_status eq '4'} class="active" {/if}>{$glb_wed_card_title_loc}</a></li></ul>
        </div>
    </nav>
</header>