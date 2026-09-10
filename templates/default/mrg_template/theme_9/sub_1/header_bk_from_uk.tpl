<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>{$pagetitle}</title>
{include file="default/wedscriptsrcs.tpl"}
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}sub_1/style.css" media="screen" rel="stylesheet"/>
<link href="templates/css/jenna.css" media="screen" rel="stylesheet" type="text/css" />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='{$glb_img_urls}style.css' title='wsite-theme-css' />
{literal}
<style>
.wsite-background {background-repeat-x: repeat !important;background-repeat-y: no-repeat !important;background-position: 0 0 !important;background-size: auto !important;background-color: transparent !important;background: inherit; width: 100%; max-height: 450px; background-size: 100% !important;}

#about_bride_name, #about_groom_name, #about_names_link {font-family: monotype corsiva !important;}
// #pageheddings, #about_message{font-family: Edwardian Script !important;}
//#content h1, .container, #eventsubhead {


</style>{/literal}

{ if $glb_theme_owner_id eq '2948' }
{literal}
<style>
#pageheddings {
    color: #ffa500 !important;;
}
</style>{/literal}
{/if}
</head>
<body class='no-header-page  wsite-theme-light wsite-page-index' {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
<div id="total-wrapper">
	{if $classic_bg_image neq '0' && $classic_bg_image neq ''}
	<div class="top-background wsite-background wsite-custom-background" data-speed="4" data-type="background" style="background-image: url(&quot;images/classic_bg/{$classic_bg_image}.jpg&quot;); width: 100%; height: 450px; background-size: 100% !important;">
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
				<div class="header-align-mid about">
					<div class="header-align-inner">
						<div id="logo"  style="opacity: 1; display: block;">
						<span id="wsite-title">
						<br /><span id="about_bride_name">{$glb_male_name}</span>
						<span id="about_names_link">&amp;</span>
						<span id="about_groom_name">{$glb_female_name}</span>
						</span>
						<span><h3 id="about_date">{$glb_marriage_date_title}</span></h3>
						<span id="about_message"><p>Thank you for visiting our wedding website! We hope you find it helpful, <br />and we're excited to share this journey with you.</p></span>
						</div>
					</div><!-- end header align inner -->
				</div><!-- end header align mid --><br /><br /><br /><br /><br />
				<div class="nav-container">
					<ul class='wsite-menu-default'>
						<li {if $c_page_status eq 'h'}  id="active" {/if}><a href="{$glb_page_url}?status=h" class="selected about">{$glb_wed_card_title_home}</a></li>
						<li {if $c_page_status eq '1'}  id="active" {/if}><a href="{$glb_page_url}?status=1" class="selected about">{$glb_wed_card_title_events}</a></li>
						<li {if $c_page_status eq '2' || $c_page_status eq '5'}  id="active" {/if}><a href="{$glb_page_url}?status=2" class="selected about">{$glb_wed_card_title_guestbook}</a></li>
						<li {if $c_page_status eq '4'}  id="active" {/if}><a href="{$glb_page_url}?status=4" class="selected about">{$glb_wed_card_title_loc}</a></li>
						{if $glb_total_alb_records neq 0}<li {if $c_page_status eq '3'}  id="active" {/if}><a href="{$glb_page_url}?status=3" class="selected about">{$glb_wed_card_title_album}</a></li>
						{/if}
						{if $glb_animate_cover neq '0'}
						<li><a href="{$glb_page_url}" title="" class="about">Cover Design</a></li>
						{/if}
					</ul>
				</div>
			</div><!-- end container -->
		</div><!-- end nav wrap -->
	</div><!-- end top background -->