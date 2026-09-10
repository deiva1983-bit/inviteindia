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

<div id="wrapper">
		<div id="page-wrap">
			<div id="header" style='display: none;'> 
				<h1 style="text-align: center; padding-top: 30px;">
					<div><span id='homepageheddings'>{$glb_male_name}</span><span id='homepageheddings'>&nbsp;&amp;&nbsp;</span><span id='homepageheddings'>{$glb_female_name}</span></div>
					<div style='padding-top: 10px;'><span id='pageheddings'>{$glb_marriage_date_title}</span></div>
			</h1></div> <!-- header -->

			<div id="content-wrapper" style='padding-top: 20px;'>
				<div id="content">
					<div id="wsite-content" class="wsite-elements wsite-not-footer">
					<div>
					<p><h1 style="text-align: center;"><span id='pageheddings'>{$tpl_event_title}</span></h1></p>
					<div class="paragraph" style="text-align:left;">
						{if $smt_reception_status neq 0 }
						<input type='hidden' id='rec_status' value='1' />
						<div class="group" id="reception">
						{if $smt_rec_title neq ''}
							<h2 style='font-size: 1.3em;'><span id='eventsubhead'>{$smt_rec_title}</span></h2>
						{else}
							<h2 style='font-size: 1.3em;'><span id='eventsubhead'>Reception</span></h2>
						{/if}
						<table style='width: 100%;'><tr><td {if $smt_map_rec_status neq 1} style='width: 100%; {else} style='width: 70%; {/if} vertical-align: top;'>
						<div class="people about_my_reception" style='padding: 2px;'>
							 {if $smt_reception_date neq ''}<span id='rec_date'>Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id='rec_date'>{$smt_reception_date} {$glb_r_final_time}</span><br />{/if}
							 {$smt_reception_location}
						</div>
						{if $smt_rec_additional_info neq ''} <br />
						<div class="people" style='padding: 2px;'>
							{$smt_rec_additional_info}
						</div>
						{/if}
						</td>
						{if $smt_map_rec_status eq 1} <td style='width: 30%; vertical-align: top;'>
							<div id="map_rec" style="width: 300px; height: 300px;"></div>
						</td>{/if}
						</tr></table>
						</div>
						{else}
						<input type='hidden' id='rec_status' value='0' />
						{/if}

						{if $smt_marriage_status neq 0 }
						<input type='hidden' id='wed_map_status' value='1' />
						<div class="group" id="wedding">
								{if $smt_wed_title neq ''}
									<h2 style='font-size: 1.3em;'><span id='eventsubhead'>{$smt_wed_title}</span></h2>
								{else}
									<h2 style='font-size: 1.3em;'><span id='eventsubhead'>Ceremony party</span></h2>
								{/if}
							<table style='width: 100%;'><tr><td {if $smt_map_wedd_status neq 1} style='width: 100%; {else} style='width: 70%; {/if} vertical-align: top;'>
							<div class="people about_my_wedding" style='padding: 2px;'>
								 {if $smt_marriage_date neq ''}<span id='wedd_date'>Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id='wedd_date'>{$smt_marriage_date} {$glb_m_final_time}</span><br />{/if}
								 {$smt_marriage_location}
							</div>
							{if $smt_wed_additional_info neq ''} <br />
							<div class="people" style='padding: 2px;'>
								{$smt_wed_additional_info}
							</div>
							{/if}
							</td>
							{if $smt_map_wedd_status eq 1}<td style='width: 30%; vertical-align: top;'>
								<div id="map_wed" style="width: 300px; height: 300px;"></div>
							</td>{/if}</tr></table>
							
						</div>
						{else}
						<input type='hidden' id='wed_map_status' value='0' />
						{/if}
					</div>
					</div>
					</div>
					
					

				</div>
		</div> <!-- content wrapper -->
	</div> <!-- Page wrap -->

			<div id="footer">
				<div id="footer-content">
					<script type="text/javascript">expandedFooterController.initialize();</script>
				<div>
			</div>
</div> <!-- wrapper -->
{include file="default/mrg_template/footer_links.tpl"}
</div> <!-- body-wrap --></body></html>
