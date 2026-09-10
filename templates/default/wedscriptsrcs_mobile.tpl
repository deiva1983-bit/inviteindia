<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery-1.4.2.js'></script>
<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.core.js"></script>
<link type="text/css" href="{$glb_site_url}includes/css/themes/base/jquery-ui-1.8.21.custom.css" rel="stylesheet" /> 
	<link type="text/css" rel="stylesheet" href="templates/default/mrg_template/bootstrap/css/bootstrap.min.css">
	<script src="includes/scripts/mobile/jquery.js"></script>
	<script src="templates/default/mrg_template/bootstrap/js/bootstrap.min.js"></script>
	<script src="includes/scripts/mobile/allmobile.js"></script>
        {if $currentpage_js eq 'wedhome'}
	<link href="//fonts.googleapis.com/css?family=Emilys+Candy" rel="stylesheet">
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/dt/jquery-1.7.2.min.js"></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/dt/jquery-ui.min.js'></script>	 
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.effects.datetime.js"></script> 
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery.validate.js'></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/validat_all.js'></script>
	<link href="{$glb_site_url}includes/css/wedding.css" rel="stylesheet" type="text/css" />
	{else if $currentpage_js eq 'birthhome'}
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/dt/jquery-1.7.2.min.js"></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/dt/jquery-ui.min.js'></script>	 
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.effects.datetime.js"></script> 
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery.validate.js'></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/validat_all.js'></script>	
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/allbirthday.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/mrg_account/rem.js"></script>	
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/interviewhome.js'></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/wed_home_js.js'></script>
	<link href="{$glb_site_url}includes/css/wedding.css" rel="stylesheet" type="text/css" />
	{/if}
	{if $album_status_js eq '1'}	
	<!-- Demo stuff -->
	<link rel="stylesheet" href="{$glb_site_url}includes/css/galary/page.css" media="screen"> 
	<!-- AnythingSlider 
	<link rel="stylesheet" href="{$glb_site_url}includes/css/galary/anythingslider.css">	
	<script type='text/javascript' src="{$glb_site_url}includes/scripts/ui/jquery.anythingslider.min.js"></script>	
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/album.js'></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/wed_album.js'></script> -->
	{/if}
	{if $gmap_status_js eq '1'}
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false&libraries=places"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/minified/base64.js"></script> 
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map.js?{$url_tmp}'></script>
	{if $glb_browser_name eq 'IE'}
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map-ie.js'></script>
	{else}
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map-nonie.js'></script>
	{/if}
	<link rel="stylesheet" href="{$glb_site_url}includes/css/gmap/map.css" media="screen">

	{/if}
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="templates/default/mrg_template/move-top.js"></script>
	<script type="text/javascript" src="templates/default/mrg_template/easing.js"></script>
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