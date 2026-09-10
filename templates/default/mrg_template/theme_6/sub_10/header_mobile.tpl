<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$pagetitle}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs_mobile.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}../common_mobile.css" media="screen" rel="stylesheet"/>
<link rel="stylesheet" href="{$glb_img_urls}css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="{$glb_img_urls}css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="{$glb_img_urls}css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}sub_10/style.css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_10/mobile.css' />
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_10/majorcss.css' />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/source-sans-pro.css" media="screen" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>       
        <script type="text/javascript" src="{$glb_img_urls}js/html5.js"></script>
<![endif]-->
</head>
<body id="page1" {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div class="" id="left-bottom">
<div class="pag_con" id="right-bottom">
<!-- header  -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container1">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand">
                    <img src="{$glb_img_urls}/mob_head.png" alt="" style="height: 49px;">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{$glb_page_url}?status=h">{$glb_wed_card_title_home}</a>
                    </li>
                    <li>
                        <a href="{$glb_page_url}?status=1">{$glb_wed_card_title_events}</a>
                    </li>
                    <li>
                        <a href="{$glb_page_url}?status=2">{$glb_wed_card_title_guestbook}</a>
                    </li>
                    <li>
                        <a href="{$glb_page_url}?status=4">{$glb_wed_card_title_loc}</a>
                    </li>
                    {if $glb_total_alb_records neq 0}<li>
                        <a href="{$glb_page_url}?status=3">{$glb_wed_card_title_album}</a>
                    </li>{/if}
                    {if $glb_animate_cover neq '0'}
                     <li>
                        <a href="{$glb_page_url}?status=c">Wedding Cover</a>
                    </li>
                    {/if}
                    {$ownpage_linksmobile}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>