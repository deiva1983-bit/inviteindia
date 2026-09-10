<!-- content -->
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

&nbsp;<div id="content" class="index" data-pjax-container="" style="opacity: 1; display: block; width: 953px;">   
		<div id="wedding-party" class="clearfix" style="width: 850px !important;">
		<h1  style="text-align: center;"><span id='pageheddings'>{$tpl_event_title}</span></h1>
			{if $smt_reception_status neq 0 }
			<input type='hidden' id='rec_status' value='1' />
			<div class="group">
					{if $smt_rec_title neq ''}<h2><span id='subhead'>{$smt_rec_title}</span></h2>
					{else}<h2><span id='subhead'>Reception</span></h2>
					{/if}
					{if $smt_map_rec_status neq 1}
					<div class="people" style='padding: 2px;'>
						 {if $smt_reception_date neq ''}<p>{$smt_reception_date}</p>{/if}
						 {$smt_reception_location}
					</div>
					{else}
					<table style='width: 100%;'><tr><td style='width: 70%; vertical-align: top;'>
					<div class="people" style='padding: 2px;'>
						 {if $smt_reception_date neq ''}<p>{$smt_reception_date}</p>{/if}
						 {$smt_reception_location}
					</div>
					</td><td style='width: 30%; vertical-align: top;'>
						<div id="map_rec" style="width: 300px; height: 300px;"></div>
					</td></tr></table>
					{/if}
			</div>
			<br />
			{else}
				<input type='hidden' id='rec_status' value='0' />				
			{/if}

			{if $smt_marriage_status neq 0 }
			<input type='hidden' id='wed_map_status' value='1' />
			<div class="group">
				{if $smt_wed_title neq ''}
					<h2><span id='subhead'>{$smt_wed_title}</span></h2>
				{else}
					<h2><span id='subhead'>Marriage</span></h2>
				{/if}

				<div class="people" style='padding: 2px;'>
				{if $smt_map_wedd_status neq 1}					
					{if $smt_marriage_date neq ''}<p>{$smt_marriage_date}</p>{/if}
					{$smt_marriage_location}					
				{else}
					<table style='width: 100%;'><tr><td style='width: 70%; vertical-align: top;'>
					<div class="people" style='padding: 2px;'>
						 {if $smt_marriage_date neq ''}<p>{$smt_marriage_date}</p>{/if}
						 {$smt_marriage_location}
					</div>
					</td><td style='width: 30%; vertical-align: top;'>
						<div id="map_wed" style="width: 300px; height: 300px;"></div>
					</td></tr></table>
				{/if}
				</div>
			</div>
			{else}
				<input type='hidden' id='wed_map_status' value='0' />
			{/if}
			
			<div id='center_footer' class='center_footer' style='height: 90px;'></div>
		</div>
</div></div>
<div class="footer">	
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
 </body>
 </html>