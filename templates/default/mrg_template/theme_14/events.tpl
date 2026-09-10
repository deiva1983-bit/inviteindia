<!-- <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/minified/base64.js"></script> 
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script> -->
<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map_events.js?{$url_events}'></script>
{literal}
<script>
$( document ).ready(function() {
$('.link').click(function(e){
   e.preventDefault();
   scrollToElement( $(this).attr('href'), 2000 );
});


var scrollToElement = function(el, ms){
    var speed = (ms) ? ms : 600;
    $('html,body').animate({
        scrollTop: $(el).offset().top
    }, speed);
}


var rec_status = $("#rec_status").val();
var wed_map_status = $("#wed_map_status").val();
var isMobile = $("#mobile_loaded").val();
if(isMobile != 1) {
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
      }
      });
      </script>
{/literal}
<input type="hidden" name="glb_counter_date" id="glb_counter_date" value="{$glb_counter_date}" class="inputval" />
<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
<!-- //banner -->
<!-- banner-bottom --></div>
<div class="banner-bottom">
<div class="banner-bottom" {if $isMobile eq 1} style="background:url({$glb_img_urls}images/red.png) repeat 0px 0px; padding: 20px; height: 100%; min-height: 1000px;" {/if} >
{if $isMobile neq 1}
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
{/if}
					<div class="bottom-wrap" {if $isMobile neq 1} style="width: 165%;" {/if}>
						<div class="bottom-grids">
							<div class="bottom-left" {if $isMobile eq 1} style="width: 100%;" {/if}>
								<div class="bottom-header">
									<h1 class="animated fadeIn visible text-center" data-animation="fadeIn" data-animation-delay="100">{$tpl_event_title}</h1>
									{if $smt_reception_status neq 0 }
									<div class="row"> <p>
											<input type='hidden' id='rec_status' value='1' />
											{if $smt_rec_title neq ''}<div class="col-md-1">&nbsp;</div><h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">{$smt_rec_title}</h3>
											{else}<div class="col-md-1">&nbsp;</div><h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">Reception</h3>
											{/if}
									
											{if $smt_map_rec_status neq 1}
												<div class="col-md-1">&nbsp;</div>
												<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
													{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
													{$smt_reception_location}
												</div>
											{else}
												{if $isMobile eq 1} 
													<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
													{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
													{$smt_reception_location}
													</div>
												{else}
												<div class="col-md-1">&nbsp;</div>
												<div class="col-md-7 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
													{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
													{$smt_reception_location}
												</div>				
												<div class="col-md-4 text-left animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="100">
													<div id="map_rec" style="width: 300px; height: 300px;"></div>
												</div>
												{/if}
											{/if} </p>
									</div>
									{else}
										<input type='hidden' id='rec_status' value='0' />
									{/if}


									{if $smt_marriage_status neq 0 }
									<div class="row"> <p>
											<input type='hidden' id='wed_map_status' value='1' />
											{if $smt_wed_title neq ''}<div class="col-md-1">&nbsp;</div><h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">{$smt_wed_title}</h3>
											{else}<div class="col-md-1">&nbsp;</div><h3 class="animated fadeIn visible text-center" data-animation="fadeIn" data-animation-delay="100">Marriage</h3>
											{/if}
									
											{if $smt_map_wedd_status neq 1}
												<div class="col-md-1">&nbsp;</div>
												<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
													{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
													{$smt_marriage_location}
												</div>
											{else}
												{if $isMobile eq 1}
													<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
													{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
													{$smt_marriage_location}
													</div>
												{else}
												<div class="col-md-1">&nbsp;</div>
												<div class="col-md-7 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
													{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
													{$smt_marriage_location}
												</div>				
												<div class="col-md-4 text-left animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="100">
													<div id="map_wed" style="width: 300px; height: 300px;"></div>
												</div>
												{/if}
											{/if} </p>
									</div>
									{else}
										<input type='hidden' id='wed_map_status' value='0' />
									{/if}

								</div> 
								<div class="clearfix"></div>
				</div>
			</div>
		</div>
{if $isMobile neq 1}</div></td>
			<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
			</table>{/if}
</div></div>
<!-- smooth scrolling -->
	{literal}<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script> {/literal}
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<div id="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

