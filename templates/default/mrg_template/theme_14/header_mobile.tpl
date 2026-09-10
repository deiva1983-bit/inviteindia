<!DOCTYPE html>
<html>
<head>
<title>{$pagetitle}</title>
{include file="default/wedscriptsrcs.tpl"}
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="noindex">
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$glb_img_urls}../common_mobile.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}css/mobile_style.css" media="screen" rel="stylesheet"/>
        <!--fonts-->
                <link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
        <!--//fonts-->
                <link href="{$glb_img_urls}css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- for-mobile-apps -->
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                {literal}
                <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> {/literal}
        <!-- //for-mobile-apps -->
        <!-- js -->
                <!-- <script type="text/javascript" src="{$glb_img_urls}js/jquery.min.js"></script> -->
        <!-- js -->
        <!-- start-smoth-scrolling -->
                <script type="text/javascript" src="{$glb_img_urls}js/move-top.js"></script>
                <script type="text/javascript" src="{$glb_img_urls}js/easing.js"></script>
                {literal}
                <script type="text/javascript">
                        jQuery(document).ready(function($) {
                                $(".scroll").click(function(event){
                                        event.preventDefault();
                                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                                });
                        });
                </script>
                {/literal}
        <!-- start-smoth-scrolling -->

</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<!-- banner -->
<div class="banner">
        <div class="container">
                <div class="article">
                        <div class="article-center">
                                <div class="logo-wrap">
                                        <div class="logo">
                                                <div class="logo-img"><img src="{$glb_img_urls}images/logo.png" alt="" />
                                                </div>
                                                <div class="logo-img1">
                                                        <h1>{$glb_male_name}</h1>
                                                        <h1>&</h1>
                                                        <h1>{$glb_female_name}</h1>
                                                </div>
                                        </div>
                                </div>
                                <div class="navigation">
                                        <span class="menu">MENU</span>
                                                        <ul class="nav1">
                                                                <li><a {if $c_page_status eq 'h' || $c_page_status eq ''} class="activate" {/if} href="{$glb_page_url}?status=h">{$glb_wed_card_title_home}</a></li>

                                                                <li><a {if $c_page_status eq '1'} class="activate" {/if} href="{$glb_page_url}?status=1">{$glb_wed_card_title_events}</a></li>


                                                                <li><a {if $c_page_status eq '2' || $c_page_status eq '5'} class="activate" {/if} href="{$glb_page_url}?status=2">{$glb_wed_card_title_guestbook}</a></li>

                                                                <li><a {if $c_page_status eq '4'} class="activate" {/if} href="{$glb_page_url}?status=4">{$glb_wed_card_title_loc}</a></li>

                                                                {if $glb_total_alb_records neq 0}<li><a {if $c_page_status eq '3'} class="activate" {/if} href="{$glb_page_url}?status=3">{$glb_wed_card_title_album}</a></li>
                                                                {/if}

                                                                {if $glb_animate_cover neq '0'}<li><a {if $c_page_status eq '4'} class="activate" {/if} href="{$glb_page_url}?status=c">Wedding cover</a></li>
                                                                {/if}
                                                        </ul>
                                                <!-- script for menu -->
                                                {literal}<script>
                                                        $( "span.menu" ).click(function() {
                                                        $( "ul.nav1" ).slideToggle( 300, function() {
                                                         // Animation complete.
                                                        });
                                                        });
                                                </script>{/literal}
                                                <!-- //script for menu -->
                                </div>
                                <div class="logo-wrap">
                                        <div class="slider">
                                                <!-- responsiveslides -->
                                                        <script src="{$glb_img_urls}js/responsiveslides.min.js"></script>
                                                                {literal}<script>
                                                                        // You can also use "$(window).load(function() {"
                                                                        $(function () {
                                                                         // Slideshow 4
                                                                        $("#slider3").responsiveSlides({
                                                                                auto: true,
                                                                                pager: true,
                                                                                nav: false,
                                                                                speed: 500,
                                                                                namespace: "callbacks",
                                                                                before: function () {
                                                                        $('.events').append("<li>before event fired.</li>");
                                                                        },
                                                                        after: function () {
                                                                                $('.events').append("<li>after event fired.</li>");
                                                                                }
                                                                                });
                                                                                });
                                                        </script>{/literal}
                                                <!-- responsiveslides -->
                                                <div  id="top" class="callbacks_container">
                                                        <ul class="rslides" id="slider3">
                                                                <li>
                                                                        <div class="slider-image"  >
                                                                                <img src="{$glb_img_urls}images/9.jpg" {if $isMobile neq 1} style="width:850px; height: 415px;" {else} style="height: 165px;" {/if} />
                                                                        </div>
                                                                </li>
                                                                <li>
                                                                        <div class="slider-image">
                                                                                <img src="{$glb_img_urls}images/10.jpg" alt=" " {if $isMobile neq 1} style="width:850px; height: 415px;" {else} style="height: 165px;"  {/if} />
                                                                        </div>
                                                                </li>
                                                                <li>
                                                                        <div class="slider-image">
                                                                                <img src="{$glb_img_urls}images/11.jpg" alt=" " {if $isMobile neq 1} style="width:850px; height: 415px;" {else} style="height: 165px;" {/if} />
                                                                        </div>
                                                                </li>
                                                        </ul>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                </div>