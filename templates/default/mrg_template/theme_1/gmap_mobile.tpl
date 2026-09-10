<div><div class="content centr">	 
		<h1 id='pageheddings'>{$tpl_location_title}</h1>
			<div id="contact-form" >
			<div class="col-md-12"><input id="autocomplete" type="text"/></div>
			<div class="col-md-12"><div id="map_canvas"></div></div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			<div class="col-md-12" id="gmap_form_controls"><form name="controls"> 
			<input type="radio" name="type" value="establishment" onclick="search()" checked="checked" />&nbsp;All<br/> 
			<input type="radio" name="type" value="restaurant" onclick="search()" />&nbsp;Restaurants<br/> 
			<input type="radio" name="type" value="lodging" onclick="search()" />&nbsp;Lodging
			</form>
			</div>
			<div class="col-md-12" id="gmap_form_results"><div id="listing"><div id="results"></div></div></div>
			</div>

</div>

<div class="clearer"><span>&nbsp;<br /><br /><br /><br /><br /></span></div>

</div>

<div class="footer">	
{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
</div>

</div>

</body>

</html> 