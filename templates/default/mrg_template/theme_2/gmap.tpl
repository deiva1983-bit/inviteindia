<div class="wrapper" style="height: 1050px;">
<div id="content" style='width: 100%;'>
	<div class="inner_copy"></div>
	<h2 id="pageheddings" style="text-align: center;">{$tpl_location_title}</h2>
	
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
					    </form><br /> 						
						<div id="listing"><div id="results"></div></div>
		</td></tr>
		
		</table>
		<h2 id="pageheddings" style="text-align: center;">Find Directions</h2>
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

			



                        <div style="clear:both"></div>
						
			</div>			
			<div style="clear:both"></div>
		</div>
 
            
		 
		 
<!-- footer -->
		<div id="footer">
			<div id="rings">{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;</div>		
		</div>
	</body>
	</html>