<!DOCTYPE html>
<html lang="en" class="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{$pagetitle}</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
{include file="default/wedscriptsrcs_opt.tpl"}
<!--[if lt IE 9]><script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="shortcut icon" href="{$glb_img_urls}img/favicon.ico">
<link href="{$glb_img_urls}css_plugin/bootstrap.css" rel="stylesheet">
<link href="{$glb_img_urls}css_plugin/font-awesome.min.css" rel="stylesheet">
<link href="{$glb_img_urls}css_plugin/jquery.vegas.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{$glb_img_urls}css_plugin/magnific-popup.css">
<link href="{$glb_img_urls}css_plugin/style.css" rel="stylesheet">
<link href="{$glb_img_urls}css_plugin/animate.min.css" rel="stylesheet">
<link href="{$glb_img_urls}css_plugin/light.css" rel="stylesheet">
<link href="{$glb_img_urls}css_plugin/css" rel="stylesheet" type="text/css">
<link href="{$glb_img_urls}css_plugin/css(1)" rel="stylesheet" type="text/css">
<link href="{$glb_img_urls}css_plugin/css(2)" rel="stylesheet" type="text/css">
<link href="{$glb_img_urls}sub_1/style.css" media="screen" rel="stylesheet"/>
</head>
<body class="" onload="initialize()">
        {if $glb_master_id eq '7878'}
        <img class="vegas-background" src="{$glb_img_urls}/img/bg/user/bg1.jpg" style="position: fixed; left: 0px; top: -80.5333px; width: 1366px; height: 774.067px; bottom: auto; right: auto;">
        {elseif $glb_master_id eq '8179'}
        <img class="vegas-background" src="{$glb_img_urls}/img/bg/user/1.jpg" style="position: fixed; left: 0px; top: -80.5333px; width: 1366px; height: 774.067px; bottom: auto; right: auto;">
        {else}
        <img class="vegas-background" src="{$glb_img_urls}/img/bg/bg1.jpg" style="position: fixed; left: 0px; top: -80.5333px; width: 1366px; height: 774.067px; bottom: auto; right: auto;">
        {/if}
        <!-- <img class="vegas-background" src="/bg/bg2.jpg" style="position: fixed; left: 0px; top: -80.5333px; opacity: 0.871923; width: 1366px; height: 774.067px; bottom: auto; right: auto;">-->
    <div id="mask" style="display: none;">
        <div id="loader" style="display: none;"></div>
    </div><a id="menu-toggle" href="designerslib#" class="link"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper" class="">
        <ul class="sidebar-nav">
            <li class="sidebar-brand text-center"><a href="designerslib#" id="menu-close"><i class="fa fa-times"></i></a></li>
            <li><a href="#about_us" class="link">Home</a></li>
            <li><a href="#wedding_invitation" class="link">Events</a></li>
            {if $glb_total_alb_records neq 0}<li><a href="#rsvp" class="link">Photo Gallery</a></li>{/if}
            {if $links_classic neq ''}{$links_classic}{/if}
            {if $glb_master_id ne '8284'}<li><a href="#lovestory" class="link">Guest book</a></li>{/if}
            <li><a href="#photo_gallery" class="link">Find location</a></li>
        </ul>
    </nav>
    <header id="top" class="header clearfix">
        {if $glb_master_id neq '8042'}
        {include file="default/head_designs/design2.tpl"}
        {/if}

        <div class="marriage_banner">

        <h1 class="logo_top">
                <div><span id='homepageheddings'>{if $glb_master_id eq '7878'}&nbsp;{else}{$glb_male_name}{/if}</span><span id='homepageheddings'>{if $glb_master_id eq '7878'}&nbsp;{else}&nbsp;&amp;&nbsp;{/if}</span><span id='homepageheddings'>{if $glb_master_id eq '7878'}&nbsp;{else}{$glb_female_name}{/if}</span></div>
                <div style='padding-top: 10px;'><span style='font-family: Algerian; font-size: 18px;' id='homepageheddings'>{if $glb_master_id eq '7878'}&nbsp;{else}{$glb_marriage_date_title}{/if}</span></div>
        </h1><br>
        <div class="banner_timer">
                <ul>
                    <li><span id="days">00</span>Days</li>
                    <li><span id="hours">00</span>Hours</li>
                    <li><span id="minutes">00</span>Minutes</li>
                    <li><span id="seconds">00</span>Seconds</li>
                </ul>
            </div>
        <div class="top_arrow"><a href="#about_us" class="link"><i class="fa fa-chevron-down"></i></a></div>
        </div>

        <!-- <div class="marriage_banner">
            <h1 class="logo_top" style='padding-top: 0px;'>Johns <span>weds</span> Shereena</h1><br>
            <div class="banner_timer">
                <ul>
                    <li><span id="days">-725</span>Days</li>
                    <li><span id="hours">00</span>Hours</li>
                    <li><span id="minutes">00</span>Minutes</li>
                    <li><span id="seconds">00</span>Seconds</li>
                </ul>
            </div>
            <div class="banner-line">
                <h2><span>We inviting you</span> and your family on <span>20 December 2014</span></h2><br></div>
            <div class="top_arrow"><a href="#about_us"><i class="fa fa-chevron-down"></i></a></div>
        </div>
        -->
    </header>
    <input type="hidden" name="mobile_loaded" id="mobile_loaded" value="{$isMobile}" class="inputval" />