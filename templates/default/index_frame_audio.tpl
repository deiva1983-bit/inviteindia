<html>
<head><title>{$pagetitle}</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/favicon.png" rel="icon"></head>
<!-- for-mobile-apps -->
{if $isMobile eq '1'}<frameset rows="93%,*" border="0" name="first" id="first">{else}
<frameset rows="97%,*" border="0" name="first" id="first">
{/if}
<frame src="{$glb_frame_url}?status={$glb_iframe_red}" frameborder="0" name="frame1">
<frame src="{$glb_frame_url}/../wedding_moments/footer.php?mid={$glb_master_id}" frameborder="0" name="frame2">
<frame frameborder="0" noresize>
</frameset>
</html>