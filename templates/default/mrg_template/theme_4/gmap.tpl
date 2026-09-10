<div id="center_content" >	
    <div class="center_top_bg"></div>

<div class="center_bg" style="height: 800px;">
		
		<div class="home_left_content"><div class="title">Find Location</div>
					<table width='700px' height='500px;'>
					<tr style="vertical-align: top; height:15px;"><td width='500'>
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
		
		</table><br />
		<div class="title">Find Directions</div>
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
			<div id="directionsPanel" style="position:absolute; width:442px; height:130px; overflow: auto"></div>
			</td></tr></table>


			 
	          </div>            
        <div class="clear"></div>  
    </div>
    <div class="center_bottom_bg"></div>  
    </div>  
            
     <div id="footer" align="center" style="padding-top: 10px;">{include file="default/mrg_template/footer_links.tpl"}
    </div>



</div>
</body>
</html>