<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>{$pagetitle}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs_mobile.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}../common_mobile.css" media="screen" rel="stylesheet"/>
<link href="{$glb_site_url}/templates/default/mrg_template/theme_1/style.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}/majorcss.css' />
<link href="{$glb_img_urls}mobile.css" media="screen" rel="stylesheet"/>
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
                        <div id="menu-wrapper">
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
                        </div>