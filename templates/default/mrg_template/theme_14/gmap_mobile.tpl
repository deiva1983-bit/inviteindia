<!-- banner-bottom --></div>
<div class="bottom-header red_bg">
			<div class="lovestory_bottom_parallax lovestory_bottom_parallax_green">
				<div class="lovestory_bottom_bg" style="padding-top: 10px;">
					<h1 class="text-center animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$tpl_location_title}</h1>
					<div class="devider_main text-center"><img src="{$glb_img_urls}images/devider-gray.jpg" alt=""></div>
					<div id="contact-form" >
						<div class="col-md-12"><input id="autocomplete" type="text"/></div>
						<div class="col-md-12"><div id="map_canvas"></div></div><br /><br /><br /><br /><br /><br /><br /><br /><br />
						<div class="col-md-12" id="gmap_form_controls"><form name="controls"> 
						<input type="radio" name="type" value="establishment" onclick="search()" checked="checked" />&nbsp;All<br/> 
						<input type="radio" name="type" value="restaurant" onclick="search()" />&nbsp;Restaurants<br/> 
						<input type="radio" name="type" value="lodging" onclick="search()" />&nbsp;Lodging
						</form>
						</div>
						<div class="col-md-12" id="gmap_form_results"><div id="listing"><div id="results"></div></div></div>
					</div>
				</div>
			</div>
</div>



</div></div>
<!-- //banner-bottom -->
<!-- //banner-bottom -->
	<div id="footer" class="red_bg">
	<div id='center_footer' class='center_footer' style='height: 90px;'></div></div>
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

