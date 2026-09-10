<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/minified/base64.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script>
<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map_events.js?{$url_events}'></script>
{literal}
<script>
$( document ).ready(function() {
var rec_status = $("#rec_status").val();
var wed_map_status = $("#wed_map_status").val();

 if (rec_status == 1 && paramresmapsts == 1) {  
	var map = new google.maps.Map(document.getElementById('map_rec'), {
          zoom: 10,
          center: new google.maps.LatLng(paramlatrec,paramlngrec),
        });

        var contentString = '<div id="content_gmap"><img src="images/rec.png" alt="Wedding reception" style="width: 60px;" /></div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(paramlatrec,paramlngrec),
          map: map,
          title: 'Wedding reception'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
 }

if (wed_map_status == 1 && paramwedmapsts == 1) {
      var map_wedding = new google.maps.Map(document.getElementById('map_wed'), {
          zoom: 10,
          center: new google.maps.LatLng(paramlatwed,paramlngwed),
        });
        var contentString_wed = '<div id="content_gmap"><img src="images/wed-gmap.png" alt="Wedding ceremony" style="width: 60px;" /></div>';

        var infowindow_wed = new google.maps.InfoWindow({
          content: contentString_wed,
          maxWidth: 200
        });

        var marker_wed = new google.maps.Marker({
          position: new google.maps.LatLng(paramlatwed,paramlngwed),
          map: map_wedding,
          title: 'Wedding ceremony'
        });
        marker_wed.addListener('click', function() {
          infowindow_wed.open(map_wedding, marker_wed);
        });


      }
      });
      </script>
{/literal}
<div class="content contentMid" >
	<div class="contentMid1">
		<div class="contentMid2">
			<div class="layout profileLayout">
				<div class="row row0 rowPath0 rowDepth0" id="row0">
				<div class="column column0 columnPath0_0 columnDepth1 firstColumn lastColumn" id="col0_0">
				<div class="columnEnd"></div>
				</div>
				<div class="rowEnd"></div>
			</div>
		<div class="row row1 rowPath1 rowDepth0" id="row1">
		<div class="column column1 columnPath1_1 columnDepth1 lastColumn" id="col1_1">
		<div class="module module5 columnModule2 odd blurbsModule" id="module10">
		<div class="moduleTop">
		<div>
		<div></div>
		</div>
	</div>
	<div class="moduleMid">
		<div class="moduleMid1"  style="min-height: 350px;">
			<div class="moduleMid2">
				<!-- <h3 class="moduleHead"><span>Blurbs</span></h3> -->
				<div class="moduleBody">
				<div class="autoResize blurbAboutMe">
				<h3 class="moduleHead" style='text-align: center;'><span id='pageheddings' >{$tpl_event_title}</span></h3>
				<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
				<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
				{if $smt_reception_status neq 0}
				<input type='hidden' id='rec_status' value='1' />
					{if $smt_rec_title neq ''}<h2 style='padding: 20px;'><span id='subhead'>{$smt_rec_title}</span></h2>
					{else}<h2 style='padding: 20px;'><span id='subhead'>Reception</span></h2>
					{/if}
					{if $smt_map_rec_status neq 1}
					<div style="margin-left: 20px;">
					{if $smt_reception_date neq ''}<p>{$smt_reception_date}</p> {/if}
					{$smt_reception_location}
					</div>
					{else}
					<table style='width: 100%;'><tr><td style='width: 70%; vertical-align: top;'>
					<div style="margin-left: 20px;">
					{if $smt_reception_date neq ''}<p>{$smt_reception_date}</p> {/if}
					{$smt_reception_location}
					</div>
					</td><td style='width: 30%; vertical-align: top;'>
						<div id="map_rec" style="width: 300px; height: 300px;"></div>
					</td></tr></table>
					{/if}
				{else}
				<input type='hidden' id='rec_status' value='0' />
				{/if}
			<br /><br />
			{if $smt_marriage_status neq 0}
			<input type='hidden' id='wed_map_status' value='1' />
			{if $smt_wed_title neq ''}<h2 style='padding: 20px;'><span id='subhead'>{$smt_wed_title}</span></h2>
			{else}
			<h2 style='padding: 20px;'><span id='subhead'>Marriage</span></h2>
			{/if}
			{if $smt_map_wedd_status neq 1}
			<div style="margin-left: 20px;">
			{if $smt_marriage_date neq ''} <p>{$smt_marriage_date}</p> {/if}
			{$smt_marriage_location}
			</div>
			{else}
			<table style='width: 100%;'><tr><td style='width: 70%; vertical-align: top;'>
			<div style="margin-left: 20px;">
			{if $smt_marriage_date neq ''} <p>{$smt_marriage_date}</p> {/if}
			{$smt_marriage_location}
			</div>
			</td><td style='width: 30%; vertical-align: top;'>
				<div id="map_wed" style="width: 300px; height: 300px;"></div>
			</td></tr></table>
			{/if}
			{else}
				<input type='hidden' id='wed_map_status' value='0' />
			{/if}
		</div>
		<div class="moduleBodyEnd"></div>
		</div>
		</div>
		</div>
	</div>
	<div class="moduleBottom">
		<div><div></div></div>
	</div>
</div>

 

<div class="columnEnd"></div></div><div class="column column2 columnPath1_2 columnDepth1" id="col1_2"><div class="columnEnd"></div></div><div class="column column3 columnPath1_3 columnDepth1" id="col1_3"><div class="columnEnd"></div></div><div class="rowEnd"></div></div><div class="row row2 rowPath2 rowDepth0" id="row2"><div class="column column0 columnPath2_0 columnDepth1 firstColumn lastColumn" id="col2_0"><div class="columnEnd"></div></div><div class="rowEnd"></div></div></div></div></div>

</div><div class="contentBottom"><div><div></div></div></div>
	<div id="footer">
		<br>
		{include file="default/mrg_template/footer_links.tpl"}
		 
	</div>
</div>
<br></body></html>