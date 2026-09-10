<div id="main-wrap">
	<div class="container">
<!-- content -->
			<div id="contact-form" >
				<div class="inner_copy"></div>
				<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_location_title}</span></h1>
				<div class="devider_main text-center"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
				<div class="col-md-12"><input id="autocomplete" type="text"/></div>
				<div class="col-md-12"><div id="map_canvas"></div></div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				<div class="col-md-12"><form name="controls"> 
				<input type="radio" name="type" value="establishment" onclick="search()" checked="checked" />&nbsp;All<br/> 
				<input type="radio" name="type" value="restaurant" onclick="search()" />&nbsp;Restaurants<br/> 
				<input type="radio" name="type" value="lodging" onclick="search()" />&nbsp;Lodging
				</form>
				</div>
				<div class="col-md-12" id="gmap_form_results"><div id="listing"><div id="results"></div></div></div>
			</div>
			<div style="clear:both"></div>
			
	</div>
</div><!-- end main-wrap -->
</div><!-- end total wrapper -->
<!-- End Quantcast tag -->
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
 <div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</body>
</html>