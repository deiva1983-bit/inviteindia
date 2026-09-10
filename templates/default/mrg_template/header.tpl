<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$pagetitle}</title>
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex">
<link href="images/favicon.png" rel="icon">
{include file="default/wedscriptsrcs.tpl"}
<link href="{$glb_img_urls}style.css" media="screen" rel="stylesheet"/>
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="{$glb_img_urls}style.ie7.css" />
<![endif]-->
</head>
<body {if $gmap_status_js eq '1'} onload="initialize()" {/if}>
    <div id="wrapper">
        <div id="banner">
            <div id="logo"><img  alt="" src="{$glb_img_urls}images/logo.png"/></div>
        </div>
<!-- content -->
        {if $glb_access_by_admin eq 1}<div class="admin_access" id="admin_alert_info">Hi Admin, You can access all your datas from visual view... Note: This alert only enable for admin only... Thanks.</div>{/if}
        <div id="content-bg"><div class="inner_copy"></div>
<!-- menu -->
            <div id="menu">
                <ul>
                    <li class="menu-btn"><a href="{$glb_page_url}" class="selected">{$glb_wed_card_title_home}</a></li>
                    <li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                    <li class="menu-btn"><a href="{$glb_page_url}?status=1" class="selected">{$glb_wed_card_title_events}</a></li>
                    <li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                    <li class="menu-btn"><a href="{$glb_page_url}?status=2" class="selected">{$glb_wed_card_title_guestbook}</a></li>
                    {if $glb_total_alb_records neq 0}
                    <li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                    <li class="menu-btn"><a href="{$glb_page_url}?status=3" class="selected">{$glb_wed_card_title_album}</a></li>
                    {/if}
                    <li class="divider"><img  alt="" src="{$glb_img_urls}images/menu-divider.png"/></li>
                    <li class="menu-btn"><a href="{$glb_page_url}?status=4" class="selected">{$glb_wed_card_title_loc}</a></li>
                </ul>
                <div style="clear:both"></div>
            </div>