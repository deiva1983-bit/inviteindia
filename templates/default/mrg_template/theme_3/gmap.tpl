			<div  style="height: 100%;">
				 <div id="center-content" style="text-align: left;">
					<h2 style="text-align: left;" id='pageheddings'>Find location</h2>
					 <table width='700px' height='500px;'>
					<tr style="vertical-align: top; height:22px;"><td width='500'>
					<div id="locationField"> 
					<input id="autocomplete" type="text" style="width: 480px;"/>
					</div>
					
		</td><td>&nbsp;</td></tr>
		<tr style="vertical-align: top;"><td width='500'>
		<p><div id="map_canvas"></div></p>
		</td>
		<td>
						<form name="controls" > 
					    <input type="radio" name="type" value="establishment" onclick="search()" checked="checked"/>All<br/> 
						<input type="radio" name="type" value="restaurant" onclick="search()" />Restaurants<br/> 
						<input type="radio" name="type" value="lodging" onclick="search()" />Lodging
					    </form> 						
						<div id="listing" style="width: 177px; height: 361px;"><div id="results"></div></div>
		</td></tr>
		
		</table>
		<h2 style="text-align: left;" id='pageheddings'>Find Directions</h2>
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
				      <td><input type="button" value="Reset" onclick="reset()" class="fifthsubmit" /></td>
				    </tr>
				    <tr>
				      <td><input type="checkbox" id="tolls" checked /> Avoid tolls</td>
				      <td><input type="button" value="Get Directions!" onclick="calcRoute()" class="fifthsubmit" /></td>				      
				    </tr>
				  </table>
			</td>
			<td style="width: 530px; vertical-align: top;">
			<div id="directionsPanel" style="position:absolute; width:530px; height:130px; width:480px; overflow: auto"></div>
			</td></tr></table>	
			
		


				</div>

				
				<div style="clear:both"></div>

				</div>

				<div id="footer">					
					<div id="foot_heart">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
				</div>
			</div>
		</div>
	</body>
</html>
 