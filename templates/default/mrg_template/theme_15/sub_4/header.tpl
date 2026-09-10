<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>{$pagetitle}</title>
<meta charset="utf-8">
<meta name="robots" content="noindex">
<meta name="viewport" content="width=720">
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
{include file="default/wedscriptadd_newtheme.tpl"}
<link href="{$glb_img_urls}style.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}sub_4/style.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}style_{$glb_lang_id}.css" media="screen" rel="stylesheet"/>
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link href="templates/css/blackjack_head.css" media="screen" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}sub_4/majorcss.css' title='wsite-theme-css' />
<link href="fontcss/england-hand-db.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/district-light.css" media="screen" rel="stylesheet" type="text/css" />
<link href="fontcss/bonvenocf.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="templates/default/mrg_template/mobilemenu/css/default.css" />
<link rel="stylesheet" type="text/css" href="templates/default/mrg_template/mobilemenu/css/component.css" />
<script src="templates/default/mrg_template/mobilemenu/js/modernizr.custom.js"></script>
<script src="templates/default/mrg_template/mobilemenu/js/jquery.dlmenu.js"></script>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
</head>
 <body data-sticky-links="false" {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
  <div id="container">
  {if $isMobile eq 1}
  <div class="mobilecolumn demo-2 mobilemenus">
        <div id="dl-menu" class="dl-menuwrapper">
                <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                                <li><a href="{$glb_page_url}?status=h">{$glb_wed_card_title_home}</a></li>
                                <li><a href="{$glb_page_url}?status=1">{$glb_wed_card_title_events}</a></li>
                                <li><a href="{$glb_page_url}?status=2">{$glb_wed_card_title_guestbook}</a></li>
                                <li><a href="{$glb_page_url}?status=4">{$glb_wed_card_title_loc}</a></li>
                                <li>{if $glb_total_alb_records neq 0}<a href="{$glb_page_url}?status=3" >{$glb_wed_card_title_album}</a>{elseif $glb_animate_cover neq '0'}<a href="{$glb_page_url}">Cover Design</a>{/if}</li>
                                <!-- <li><a href="#">Furniture</a>
                                        <ul class="dl-submenu">
                                                <li><a href="{$glb_page_url}?status=h">Living Room</a></li>
                                                <li><a href="#">Patio</a></li>



                                        </ul>
                                </li> -->
                        </ul>
        </div><!-- /dl-menuwrapper -->
</div>
<div class='mobilemenus' id="about" style='text-align: center;'>
        <div >
        <h1 id="about_name"><span id="about_bride_name">{$glb_male_name}</span> <span id="about_names_link">&amp;</span> <span id="about_groom_name">{$glb_female_name}</span></h1>
        <h2 id="about_date">{$glb_marriage_date_title}</h2>
        <div id="about_message" style="display:block"><p>{$tpl_home_heading}</p></div>
        </div>
  </div>
  {else}
  <table border='3' class='pcmenus'><tr><td id="about">
      <div id="choice-1" class="clearfix index"  style="width: 460px;">
                <div id="left-side" style="opacity: 1; display: block;">
                        <div >
                                <h1 id="about_name"><span id="about_bride_name">{$glb_male_name}</span> <span id="about_names_link">&amp;</span> <span id="about_groom_name">{$glb_female_name}</span></h1>
                                <h2 id="about_date">{$glb_marriage_date_title}</h2>
                                <div id="about_message" style="display:block"><p>{$tpl_home_heading}</p>
                        </div>
                </div>

  </div>
</td><td>&nbsp;</td><td  id="about">
  <div id="content" class="index " data-pjax-container="" style="opacity: 1; display: block; padding: 15px; background: none; width: 460px;" >
                <div id="wedding-party" class="clearfix ">
                        <div class="people" style='padding: 1px;'>
                                <ul id="navigation_links">
                                <li><a href="{$glb_page_url}?status=h" class="selected">{$glb_wed_card_title_home}</a></li>
                                <li><a href="{$glb_page_url}?status=1" class="selected">{$glb_wed_card_title_events}</a></li>
                                <li><a href="{$glb_page_url}?status=2" class="selected">{$glb_wed_card_title_guestbook}</a></li>
                                <li><a href="{$glb_page_url}?status=4" class="selected">{$glb_wed_card_title_loc}</a></li>
                                <li>{if $glb_total_alb_records neq 0}<a href="{$glb_page_url}?status=3" class="selected">{$glb_wed_card_title_album}</a>
                                {elseif $glb_animate_cover neq '0'}
                                <a href="{$glb_page_url}" title="">Cover Design</a>
                                {/if}</li>
                                </ul>

                        </div>
                </div>
</div>
</td></tr></table>
{/if}
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
{literal}
<script>
        $(function() {
                $( '#dl-menu' ).dlmenu();
        });
</script>
{/literal}
<!--
{literal}
<script>
    new BackgroundImage("{$glb_img_urls}sub_4/IMG_64472.jpg", "{$glb_img_urls}sub_4/IMG_64472.jpg", {horizontal: "center", vertical: "center"}).loadBackground();
  </script>
  {/literal} -->
  {if $classic_bg_image neq '0' && $classic_bg_image neq ''}
<div id="backdrop"><div style="opacity: 1; background-image: url(&quot;images/classic_bg/{$classic_bg_image}.jpg&quot;); background-position: center center;" class="background backdrop-thumbnail"></div><div style="background-position: center center; opacity: 1; background-image: url(&quot;images/classic_bg/{$classic_bg_image}.jpg&quot;);" class="background backdrop-full"></div></div>
{else}
  <div id="backdrop"><div style="opacity: 1; background-image: url(&quot;{$glb_img_urls}sub_4/IMG_64472.jpg&quot;); background-position: center center;" class="background backdrop-thumbnail"></div><div style="background-position: center center; opacity: 1; background-image: url(&quot;{$glb_img_urls}sub_4/IMG_64472.jpg&quot;);" class="background backdrop-full"></div></div>
  {/if}

