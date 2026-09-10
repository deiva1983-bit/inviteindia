<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$pagetitle}</title>
<link href="{$glb_img_urls}../common.css" media="screen" rel="stylesheet"/>
<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery-1.4.2.js'></script>
<meta name="description" content="{$metadesc}">
<meta name="keywords" content="{$metakeywords}">

<link href="{$glb_site_url}templates/default/mrg_template/covers/covercom.css" media="screen" rel="stylesheet"/>
{if $wedcover_adjust eq '1'}
	<style type="text/css">
		{literal} 
		#coverbg { position: fixed; top: 0; left: 0; }
		.bgwidth { width: 100%; }
		.bgheight { height: 100%; } 
	{/literal}
	</style>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/cover_bg.js'></script>
{/if}
	</head>
<body>

