<!-- content -->
		<section id="content">
			<article class="col1">
		 <h2><span id='pageheddings'>Location Search</span></h2>
			  <table width='700px' height='500px;'>
		<tr style="vertical-align:top; height:5px;"><td width='500'>
			<div id="locationField"> 
			<input id="autocomplete" type="text" style="width: 480px; border:2px solid #d9d9d9;background:#fefeff;"/>
			</div>
		</td>
		<td></td>
		</tr>		
		<tr style="vertical-align: top;"><td width='500'>
		<p><div id="map_canvas"></div></p>
		</td>
		<td>
						<form name="controls" > 
					    <input type="radio" name="type" value="establishment" onclick="search()" checked="checked" />&nbsp;All<br/> 
						<input type="radio" name="type" value="restaurant" onclick="search()" />&nbsp;Restaurants<br/> 
						<input type="radio" name="type" value="lodging" onclick="search()" />&nbsp;Lodging
					    </form><br /> 						
						<div id="listing"><div id="results"></div></div>
		</td></tr>  
		</table>
<h2><span id='pageheddings'>Find Directions</span></h2>		
		 <table style="width: 700px;">
		 <tr><td>
				<table style="width: 300px;" >
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
				      <td><input type="button" value="Reset" onclick="reset()" class="button"  /></td>
				    </tr>
				    <tr>
				      <td><input type="checkbox" id="tolls" checked /> Avoid tolls</td>
				      <td><input type="button" value="Get Directions!" onclick="calcRoute()" class="button"  /></td>				      
				    </tr>
				  </table>
			</td>
			<td style="width: 530px; vertical-align: top;">
			<div id="directionsPanel" style="position:absolute; width:530px; height:130px; width:480px; overflow: auto"></div></td></tr></table> <br /><br />
			 <p></p>
	   		</article>
			 
		</section>
<!-- / content -->
	</div>
	<div class="block">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
</div> </div> </div> </div>
</body>
</html>  