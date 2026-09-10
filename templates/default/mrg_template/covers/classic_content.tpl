<!DOCTYPE html>
<link href="templates/css/jenna.css" media="screen" rel="stylesheet" type="text/css" />
<link href="templates/css/josefin_head.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script>
<div id="left-top" class="">
<div id="right-top">
<div class="" id="left-bottom">
<div class="extra pag_con" id="right-bottom">
	<div  style="vertical-align:middle; text-align:center;"> 
	<table border='0' style='width:100%; height: 100%; '>
	<tr><td colspan='3'>
	&nbsp;
	</td></tr>
	<tr><td style='width:2%;'></td>
	<td style='width:96%; background-color: #ADD9E6;'>
		<table style='width: 100%;'>
		<input type='hidden' value='Wedding' id='sample'>
		<tr><td colspan='2'>&nbsp;</td></tr>
		<tr><td colspan='2'><img src='images/blinkimgs/star.gif'><span style='font-family: "Algerian" !important; font-size: 25px;'><b>{$glb_cover_heading}</b></span><img src='images/blinkimgs/star.gif'></td></tr>
		<tr><td colspan='2'>
		<img src='{$glb_site_url}templates/covers/{$mrg_wed_auto_id}/mycover.jpg'  border="0" id="coverbg" />
		</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
		<tr><td colspan='2' style='text-align: left;  padding-left: 140px; padding-right: 130px; font-family: Algerian; !important; font-size: 20px;'>{$glb_cover_content}</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
		<tr><td style='width: 60%; padding-left: 150px; text-align: left; vertical-align: top;'>
			<table style='font-family: Josefin Sans; !important; font-size: 20px;'>
				<!-- <tr><td colspan='2'><span style='font-family: Algerian; !important; font-size: 20px;'>{$glb_cover_content}</span></td></tr> -->
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td style='vertical-align: top; width: 150px;'><img src='images/blinkimgs/home.png' style='width: 20px; padding-top: 20px;'><b>Address:</b></td>
				<td>{$glb_wed_loc}</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				{if $glb_cover_mobile neq ''}
				<tr><td style='vertical-align: top; width: 150px;'><img src='images/blinkimgs/mobile_phone.png' style='width: 20px;'><b>Host phone:</b></td>
				<td>{$glb_cover_mobile}</td></tr>
				{/if}
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				
			</table>
		</td>
		<td style='width: 40%; vertical-align: top; '>
		<table style='font-family: Josefin Sans; !important; font-size: 20px;'>
				<tr><td style='float: left;'><span style='font-family: "Algerian" !important; font-size: 15px;'>&nbsp;</span></td></tr>
				<tr><td style='margin: 10px;border: 5px double #FEFFFF;'><div style="overflow:hidden;height:300px;width:350px;"><div id="gmap_canvas" style="height:300px;width:350px;"></div>{literal}<style>#gmap_canvas img{max-width:none!important;background:none!important}</style><script type="text/javascript"> function init_map(){var info =document.getElementById("sample").value = '{/literal}{$glb_wed_loc1ss}{literal}'; var myOptions = {zoom:14,center:new google.maps.LatLng({/literal}{$glb_lat}{literal},{/literal}{$glb_long}{literal}),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng({/literal}{$glb_lat}{literal},{/literal}{$glb_long}{literal})});infowindow = new google.maps.InfoWindow({content:info });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>{/literal}</div></td></tr>
				<tr><td>&nbsp;</td></tr>
				
			</table>

		
		</td>
		</tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
		</table>
	</td>
	<td style='width:2%;'></td>
	</tr>
	<tr><td colspan='3'>&nbsp;</td></tr>
	<tr><td colspan='3'>&nbsp;</td></tr>
	</table>