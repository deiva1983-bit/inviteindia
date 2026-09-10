<div id="menu"><span id="headmsg">{if $tpl_bless_title neq ''} {$tpl_bless_title} {else}&nbsp;{/if}</span></div>
<div style="clear:both"></div>
	<h2 id="pageheddings" style="text-align: center;">{$tpl_location_title}</h2>
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
<div style="clear:both"></div>
<!-- footer -->
				<div id="footer">
					<div id="foot_heart">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
				</div>
			</div>
		</div>
	</body>
</html>