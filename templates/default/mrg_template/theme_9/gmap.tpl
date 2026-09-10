<div id="main-wrap">
	<div class="container">
<!-- content -->
			<div id="content" style="width: 100%;">
				<div class="inner_copy"></div>
				 <h1 style="text-align: center;"><span id='pageheddings'>{$tpl_location_title}</span></h1>
				 <div style="height: 700px;">	 
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
		 <table style="width: 800px;">
				<tr>
				      <td style="width: 25%;"><ul><li><input type="checkbox" id="optimize" checked /> Optimize</li>
				      <li><input type="checkbox" id="highways" checked /> Avoid highways</li>
				      <li><input type="checkbox" id="tolls" checked /> Avoid tolls</li></ul>
				      </td>
				      <td style="width: 25%;">
						<div class="select_join" style="margin-left:15px">
							<select id="mode">
								<option value="bicycling">Bicycling</option>
								<option value="driving">Driving</option>
								<option value="walking">Walking</option>
							</select>
						</div>
				      </td>
				      <td style="width: 50%; text-align: center;"><input type="button" value="Get Directions!" onclick="calcRoute()" class="classic_button" style="padding: 15px;" />&nbsp;<input type="button" value="Reset" onclick="reset()" class="classic_button" style="padding: 15px;"/>
				      </td> 
				    </tr>
				<tr>
					<td style="vertical-align: top;" colspan="3">
						<div id="directionsPanel" style="position:absolute; width:54%; height:130px; overflow: auto"></div>
					</td>
				</tr>
		</table>
		</div>
				<div style="clear:both"></div>
			
		</div>

<div style="clear:both"></div>
		</div>
	  </div><!-- end container -->
	</div><!-- end main-wrap -->
	</div><!-- end total wrapper -->
<!-- End Quantcast tag -->
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
 <div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</body>
</html>