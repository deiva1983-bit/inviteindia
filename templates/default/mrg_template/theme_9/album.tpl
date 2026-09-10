<link rel="stylesheet" media="screen, print" href="{$glb_site_url}includes/scripts/userdefind/slideshow/homepageslides.css">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/homepageslides.js" type="text/javascript"></script>
<!-- <link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script>
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script> -->
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
<div id="main-wrap">
	<div class="container">
	<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_album_title}</span></h1>
	<div id="content" class="index alb_slideshow" data-pjax-container="" style="display: block;">
			<div id="photos" style="opacity: 1;  background: rgba(54,50,54,0.8); padding: 12px; width: 544px;">
				<h1 style='display: none;'>Photos</h1>    
				  <div class="page-description" style='display: none;'>
					<p>Photo Credit: Sparkle Photography (www.sparklephoto.com)</p>
				  </div>
					<div id="galleria" class="">
						<div class="galleria-container notouch" style="width: 520px; height: 560px;">
							<div class="galleria-stage">
								<div class="galleria-info">
									<div class="galleria-info-text">
										<div class="galleria-info-title" style="display: inline;"></div>
										<div class="galleria-info-description" style="display: inline;"></div>
									</div>
								</div>
				
								<div class="galleria-loader" style="display: none;"><canvas></canvas></div>
								<div class="galleria-counter" style="opacity: 0; top: -20px; transition: none;"><span class="galleria-current">17</span> / <span class="galleria-total">20</span></div>						
								<div class="galleria-image-nav">
									<div class="galleria-image-nav-right" style="opacity: 0; right: 0px; transition: none;"></div>
									<div class="galleria-image-nav-left" style="opacity: 0; left: 0px; transition: none;"></div>
								</div>						
								<div class="galleria-progress"></div>
							</div> <!-- galleria-stage end -->
						
						<div class="galleria-bar">
							<div class="galleria-fullscreen"></div><div class="galleria-play pause"></div>
							<div class="galleria-thumbnails-container galleria-carousel">
								<div class="galleria-thumb-nav-left"></div>
								<div class="galleria-thumbnails-list" style="overflow: hidden; position: relative;">						
								<div class="galleria-thumbnails" style="overflow: hidden; position: relative; width: 632px; height: 33px; left: -172px; transition: none;">{$glb_albums}</div>
							</div>
						<div class="galleria-thumb-nav-right"></div></div></div><div class="galleria-tooltip" style="opacity: 0; visibility: visible; display: none; left: 32.5px; top: 214px;">Previous&nbsp;image</div><canvas width="24" height="24" style="z-index: 10000; position: absolute; right: 10px; top: 10px;"></canvas></div></div>
			</div></div></div></div>

			
	  </div><!-- end container -->
	</div><!-- end main-wrap -->
	</div><!-- end total wrapper -->
<!-- End Quantcast tag -->
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
 <div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</body>
</html>