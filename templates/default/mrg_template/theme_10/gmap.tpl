<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article"><div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">

<div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%; text-align: center;">
    <h1 id='pageheddings'>{$tpl_location_title}</h1>
    </div>
</div>

    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
	<div style="padding:30px">
		<div>
			 <div style="height: 700px;">	 
		<table width='800px' height='500px;'>
		<tr style="vertical-align:top; height:40px;"><td width='500'>
			<div id="locationField"> 
			<input id="autocomplete" type="text" style="width: 480px; height: 20px;"/>
			</div>
		</td>
		<td>&nbsp;</td>
		</tr>
		<tr style="vertical-align: top;"><td width='500px;'>
		<p><div id="map_canvas"></div></p>
		</td>
		<td>
		<form name="controls"> 
		<input type="radio" name="type" value="establishment" onclick="search()" checked="checked" />&nbsp;All<br/> 
		<input type="radio" name="type" value="restaurant" onclick="search()" />&nbsp;Restaurants<br/> 
		<input type="radio" name="type" value="lodging" onclick="search()" />&nbsp;Lodging
		</form><br />
		<div id="listing"><div id="results"></div></div>
		</td></tr>  
		</table>	
		 <table style="width: 700px">
		 <tr><td>
				<table style="width: 280px;" >
				    <tr>
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
				      <td>&nbsp;</td>
				    </tr>
				    <tr>
				      <td><input type="checkbox" id="tolls" checked /> Avoid tolls</td>
				      <td>&nbsp;</td>				      
				    </tr>
				     <tr>
				      <td colspan="2" style="text-align: center; padding-top: 5px;"><input type="button" value="Reset" onclick="reset()" class="art-button"/><input type="button" value="Get Directions!" onclick="calcRoute()" class="art-button" /></td>				      
				    </tr>
				  </table>
			</td>
			<td style="width: 530px; vertical-align: top;">
			<div id="directionsPanel" style="position:absolute; width:530px; height:130px; width:480px; overflow: auto"></div>
			</td></tr></table>
		</div>
		</div>
	</div>
    </div>
    </div>
</div>

 
</div>
</article></div>
                    </div>
                </div>
            </div>
    </div>



<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</div>
</body></html>