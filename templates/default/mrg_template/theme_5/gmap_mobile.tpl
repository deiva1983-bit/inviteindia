<div class="extra pag_con col-md-12 bgnone" id="right-bottom">
	{if $tpl_location_title neq ''}<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_location_title}</span></h1>{else}&nbsp;{/if}
</div>
<div id="content" class="page_contents" style="margin-left: 0px; padding-top: 150px;">

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

<!-- / content -->
	</div>
	<div class="block">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
</body>
</html>  