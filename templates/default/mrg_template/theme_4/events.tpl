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

<div id="center_content">	
    <div class="center_top_bg"></div>

<div class="center_bg">
		<div class="home_left_content">
		<h1  style="text-align: center;"><span id='pageheddings'>{$tpl_event_title}</span></h1>
			<p>{if $smt_reception_status neq 0}
			<input type='hidden' id='rec_status' value='1' />
			{if $smt_rec_title neq ''}<div class="title" style="padding: 5px 0;">{$smt_rec_title}</div>
			{else}<div class="title" style="padding: 5px 0;">Reception</div>
			{/if}			
			
			{if $smt_map_rec_status neq 1}
			{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
			{$smt_reception_location}
			{else}
			<table style='width: 100%;'><tr><td style='width: 70%; vertical-align: top;'>
			{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
			{$smt_reception_location}
			</td><td style='width: 30%; vertical-align: top;'>
			<div id="map_rec" style="width: 300px; height: 300px;"></div>
			</td></tr></table>
			{/if}

			{else}
			<input type='hidden' id='rec_status' value='0' />
			{/if}</p>


			<p>{if $smt_marriage_status neq 0}
			<input type='hidden' id='wed_map_status' value='1' />
			{if $smt_wed_title neq ''}<div class="title" style="padding: 5px 0;">{$smt_wed_title}</div>
			{else}<div class="title" style="padding: 5px 0;">Marriage</div>
			{/if}
			
			{if $smt_map_wedd_status neq 1}
			{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
			{$smt_marriage_location}
			{else}
			<table style='width: 100%;'><tr><td style='width: 70%; vertical-align: top;'>
			{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
			{$smt_marriage_location}
			</td><td style='width: 30%; vertical-align: top;'>
				<div id="map_wed" style="width: 300px; height: 300px;"></div>
			</td></tr></table>
			{/if}

			{else}
			<input type='hidden' id='wed_map_status' value='0' />
			{/if}
			</p>
	          </div>            
        <div class="clear"></div>  
    </div>
    <div class="center_bottom_bg"></div>  
    </div>  
            
  <div id="footer" align="center" style="padding-top: 10px;">{include file="default/mrg_template/footer_links.tpl"}
    </div>



</div>
</body>
</html>