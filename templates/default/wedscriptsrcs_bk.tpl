<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery-1.4.2.js'></script>
<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.core.js"></script>
 

 
        {if $currentpage_js eq 'wedhome'}
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery.validate.js'></script>
        <script type="text/javascript" src="{$glb_site_url}includes/scripts/external/jquery.bgiframe-2.1.1.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/allwedding.js"></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/interviewhome.js'></script>
	<link href="{$glb_site_url}includes/css/wedding.css" rel="stylesheet" type="text/css" />
	{/if}
	
	{if $album_status_js eq '1'}	
	<!-- Demo stuff -->
	<link rel="stylesheet" href="{$glb_site_url}includes/css/galary/page.css" media="screen"> 
	<!-- AnythingSlider -->
	<link rel="stylesheet" href="{$glb_site_url}includes/css/galary/anythingslider.css">	
	<script type='text/javascript' src="{$glb_site_url}includes/scripts/ui/jquery.anythingslider.min.js"></script>	
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/album.js'></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/wed_album.js'></script>
	{/if}

        {if $gmap_status_js eq '1'}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script> 
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map.js?latt={$js_map_lat}&lng={$js_map_lon}'></script>
	{if $glb_browser_name eq 'IE'}
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map-ie.js'></script>
	{else}
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map-nonie.js'></script>
	{/if}
	<link rel="stylesheet" href="{$glb_site_url}includes/css/gmap/map.css" media="screen">

	{/if}
        