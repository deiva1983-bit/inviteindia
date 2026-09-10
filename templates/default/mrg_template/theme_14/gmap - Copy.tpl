<!-- banner-bottom --></div>
<div class="banner-bottom" {if $isMobile eq 1} style="background:url({$glb_img_urls}images/red.png) repeat 0px 0px; padding: 20px; height: 100%;" {/if}>
{if $isMobile neq 1}
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
{/if}
					<div class="bottom-wrap" {if $isMobile neq 1} style="width: 165%;" {/if}>
						<div class="bottom-grids">
							<div class="bottom-left">
								<div style="padding: 40px;">
								 			
									{if $isMobile eq 1}
									<div class="col-md-12 text-center"><div id="map_canvas" style="width: 100%;"></div></div>
									{else}
									<div class="col-md-12 text-center">
										<div id="locationField"><input id="autocomplete" type="text"/></div>
									</div><br />
										
									<div class="col-md-6 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
										<div id="map_canvas"></div>
									</div>				
									
									<div class="col-md-6 text-left animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="100">
											<form name="controls" > 
											<input type="radio" name="type" value="establishment" onclick="search()" checked="checked"/>All<br/> 
											<input type="radio" name="type" value="restaurant" onclick="search()" />Restaurants<br/> 
											<input type="radio" name="type" value="lodging" onclick="search()" />Lodging
											</form>
											<div id="listing" style='left: 0px;'><div id="results"></div></div>
									</div>
									{/if}

								</div> 
					
					

							</div>
						</div>
					</div>
{if $isMobile neq 1}</div></td>
			<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
			</table>{/if}
</div>
<!-- //banner-bottom -->
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
<!-- //smooth scrolling -->
</body>
</html>

