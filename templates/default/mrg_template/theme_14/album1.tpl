<link rel="stylesheet" media="screen, print" href="{$glb_site_url}templates/default/mrg_template/bootstrap/css/classic_album.css">
<link rel="stylesheet" media="screen, print" href="{$glb_site_url}includes/scripts/userdefind/slideshow/homepageslides.css">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/homepageslides.js" type="text/javascript"></script>
<!-- <link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">






<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script> -->

    <link href="http://localhost:8081/public_html_stage//templates/default/mrg_template/theme_11/css_plugin/bootstrap.css" rel="stylesheet">
    <link href="http://localhost:8081/public_html_stage//templates/default/mrg_template/theme_11/css_plugin/font-awesome.min.css" rel="stylesheet">
    <link href="http://localhost:8081/public_html_stage//templates/default/mrg_template/theme_11/css_plugin/jquery.vegas.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="http://localhost:8081/public_html_stage//templates/default/mrg_template/theme_11/css_plugin/magnific-popup.css">


<script type="text/javascript" src="{$glb_site_url}templates/default/mrg_template/theme_11/js_plugin/bootstrap.js"></script>
<script src="{$glb_site_url}templates/default/mrg_template/theme_11/js_plugin/jquery.magnific-popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="{$glb_site_url}templates/default/mrg_template/theme_11/js_plugin/system.js"></script>



<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
<!-- //banner -->
<!-- banner-bottom --></div>
<div class="banner-bottom">
{if $isMobile neq 1}
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
{/if}
		<div class="bottom-wrap" {if $glb_is_mobile neq 1} style="width: 165%;" {/if}>
			<div class="bottom-grids">
				<div class="bottom-left">
					<div class="bottom-header" {if $isMobile eq 1} style="background:url({$glb_img_urls}images/red.png) repeat 0px 0px; padding: 20px;" {/if}>
					<h1 class="animated fadeIn visible text-center" data-animation="fadeIn" data-animation-delay="100">{$tpl_album_title}</h1><div> &nbsp; </div>

<article class="rsvp_main" id="rsvp">
					            <div class="rsvp_main_parallax">
                <div class="rsvp_bottom_bg">
                    <div class="container">
			<div class="row">
			    <div class="col-md-12 text-center">
				<h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">Our Gallery</h2>
			    </div>
			</div> <!-- row -->
		    </div>

		    <div id="container" class="isotom_lant clearfix">
			<ul>
			   {$albuminfosnew}
			</ul>
		    </div> <!-- isotom_lant -->


                </div>
            </div>
</article>


						 <div class="col-md-2">&nbsp;</div>
						 <div class="col-md-8">
							<div id="content" class="index alb_slideshow" data-pjax-container="" style="display: block; padding-left: 60px;">
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
							</div></div>
							</div>
							<div class="col-md-2">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>
{if $isMobile neq 1}</div></td>
			<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
			</table>{/if}
</div></div></div>
<!-- //banner-bottom -->
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
	{include file="default/mrg_template/footer_links.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>