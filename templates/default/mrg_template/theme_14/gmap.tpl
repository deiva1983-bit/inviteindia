<!-- banner-bottom --></div>
<div class="banner-bottom" id="gmap_sec">
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
					<div class="bottom-wrap" style="width: 165%;" >
						<div class="bottom-grids">
							<div class="bottom-left">
								<div class="bottom-header" style="padding: 40px;">
								<h1 class="animated fadeIn visible text-center" data-animation="fadeIn" data-animation-delay="100">Find Location</h1>	
								
								<table style="margin-left: 40px; width: 700px; height: 500px;">
								<tr style="vertical-align: top; height:15px;"><td width='500'>
									<div id="locationField"><input id="autocomplete" type="text" style="width: 480px;"/></div>
								</td><td>&nbsp;</td></tr>
							<tr style="vertical-align: top;">
							<td width='500px;'><div id="map_canvas"></div></td>
							<td>
							<form name="controls" > 
								<input type="radio" name="type" value="establishment" onclick="search()" checked="checked"/>All<br/> 
								<input type="radio" name="type" value="restaurant" onclick="search()" />Restaurants<br/> 
								<input type="radio" name="type" value="lodging" onclick="search()" />Lodging
							</form><br />
							<div id="listing"><div id="results"></div></div>
							</td></tr>
							</table><br />
						<h1 class="animated fadeIn visible text-center" data-animation="fadeIn" data-animation-delay="100">Find Directions</h1>
							<table style="margin-left: 40px; width: 700px;">
								<tr><td>
									<table style="width: 280px;" ><tr>
										<td style="width: 130px;"><input type="checkbox" id="optimize" checked /> Optimize</td>
										<td style="width: 130px;">
										<select id="mode">
										  <option value="bicycling">Bicycling</option>
										  <option value="driving">Driving</option>
										  <option value="walking">Walking</option>
										</select>
										</td> 
										</tr>
										<tr>
										<td><input type="checkbox" id="highways" checked /> Avoid highways</td>
										<td><input type="button" value="Reset" onclick="reset()" class="fifthsubmit"  style="color: red; font-weight: bold;"/></td>
										</tr>
										<tr>
										<td><input type="checkbox" id="tolls" checked /> Avoid tolls</td>
										<td><input type="button" value="Get Directions!" onclick="calcRoute()" class="fifthsubmit" style="color: red; font-weight: bold;"/></td>				      
										</tr>
									</table>
									</td>
									<td style="width: 530px; vertical-align: top;">
										<div id="directionsPanel" style="position:absolute; width:442px; height:130px; overflow: auto"></div>
									</td></tr></table>



								</div> 
								<div class="clearfix"></div>
					
					
					<!-- <div class="social-icons">
						<ul>
							<li>Created by inviteindia.com</li>
						</ul>
					</div> -->
				</div>				
			</div>
		</div>
</div></td>
			<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
			</table>
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
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

