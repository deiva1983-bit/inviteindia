&nbsp;<div id="content" class="index" data-pjax-container="" style="opacity: 1; display: block; width: 953px;">   
		<div id="wedding-party gmap" class="clearfix gmap" style="width: 953px; padding-left: 60px;">
		<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_location_title}</span></h1>
		<div class="group">
		<div class="people">
		<div><div style="height: 700px;">	 
		<table width='800px' height='500px;'>
		<tr style="vertical-align:top; height:5px;"><td width='500'>
			<div id="locationField"> 
			<input id="autocomplete" type="text" style="width: 480px; height: 20px;"/>
			</div>
		</td>
		<td></td>
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
				      <td colspan="2" style="text-align: center; padding-top: 5px;"><input type="button" value="Reset" onclick="reset()" class="fifthsubmit" /><input type="button" value="Get Directions!" onclick="calcRoute()" class="fifthsubmit" /></td>				      
				    </tr>
				  </table>
			</td>
			<td style="width: 530px; vertical-align: top;">
			<div id="directionsPanel" style="position:absolute; width:530px; height:130px; width:480px; overflow: auto"></div>
			</td></tr></table>
		</div>

		<div class="clearer"><span></span></div>

	</div></div>
	</div>
	</div><div id='center_footer' class='center_footer' style='height: 90px;'></div>
</div>
</div> 
<div class="footer">
	{include file="default/mrg_template/footer_links.tpl"}	&nbsp;
	</div>
 </body>
 </html> 