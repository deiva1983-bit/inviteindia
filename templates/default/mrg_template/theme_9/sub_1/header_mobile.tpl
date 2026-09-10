<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>{$pagetitle}</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs_mobile.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="templates/css/jenna.css" media="screen" rel="stylesheet" type="text/css" />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}style.css' title='wsite-theme-css' />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}majorcss.css' title='wsite-theme-css' />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/district-light.css" media="screen" rel="stylesheet" type="text/css" />
{literal}
<style>
.wsite-background {background-repeat: repeat !important;background-position: 0 0 !important;background-size: auto !important;background-color: transparent !important;background: inherit;}
#about_bride_name, #about_groom_name, #about_names_link {font-family: monotype corsiva !important;}
// #pageheddings, #about_message{font-family: Edwardian Script !important;}
//#content h1, .container, #eventsubhead {
</style>{/literal}
</head>
<!-- <body class='no-header-page  wsite-theme-light wsite-page-index' {if $gmap_status_js eq '1'} onload="initialize()" {/if}> -->
<body class='no-header-page  wsite-theme-light wsite-page-index' {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand">
                    <img src="{$glb_img_urls}../common_mobile/mob_head_album.png" alt="" style="height: 45px;">
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
        <div id="total-wrapper">
        {if $classic_bg_image neq '0' && $classic_bg_image neq ''}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;images/classic_bg/{$classic_bg_image}.jpg&quot;);">
        {else}
        {if $c_page_status eq 1}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;{$glb_img_urls}../screen_images/image4.jpg&quot;);">
        {elseif $c_page_status eq 2}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;{$glb_img_urls}../screen_images/image1.jpg&quot;);">
        {elseif $c_page_status eq 4}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;{$glb_img_urls}../screen_images/image7.jpg&quot;);">
        {elseif $c_page_status eq 5}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;{$glb_img_urls}../screen_images/image3.jpg&quot;);">
        {elseif $c_page_status eq 3}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;{$glb_img_urls}../screen_images/image8.jpg&quot;);">
        {else}
        <div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;{$glb_img_urls}../screen_images/image6.jpg&quot;);">
        {/if}
        {/if}


                <div id="nav-wrap">
                        <div class="container header-align-outer">
                                <div class="header-align-mid-mob about">
                                        <div class="header-align-inner">
                                                <div id="logo"  style="opacity: 1; display: block; padding-top: 22px;">
                                                <span id="wsite-title">
                                                <br /><span id="about_bride_name">{$glb_male_name}</span>
                                                <span id="about_names_link">&amp;</span>
                                                <span id="about_groom_name">{$glb_female_name}</span>
                                                </span>
                                                <span><h3 id="about_date">{$glb_marriage_date_title}</span></h3>
                                                <!--<span id="about_message"><p>Thank you for visiting our wedding website! We hope you find it helpful, <br />and we're excited to share this journey with you.</p></span>-->
                                                </div>
                                        </div><!-- end header align inner -->
                                </div><!-- end header align mid --><br /><br /><br /><br /><br />

                        </div><!-- end container -->
                </div><!-- end nav wrap -->
        </div><!-- end top background -->
            <!-- jQuery -->
        <link href="{$glb_img_urls}sub_1/style.css" media="screen" rel="stylesheet"/>
        <link href="{$glb_img_urls}sub_1/mobile_style.css" media="screen" rel="stylesheet"/>
    <!-- Bootstrap Core JavaScript -->
