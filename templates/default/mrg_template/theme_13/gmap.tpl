<div id="wrapper">
		<div id="page-wrap">
			<div id="header" style='display: none;'> 
				<h1 style="text-align: center; padding-top: 30px;">
					<div><span id='homepageheddings'>{$glb_male_name}</span><span id='homepageheddings'>&nbsp;&amp;&nbsp;</span><span id='homepageheddings'>{$glb_female_name}</span></div>
					<div style='padding-top: 10px;'><span id='pageheddings'>{$glb_marriage_date_title}</span></div>
			</h1></div> <!-- header -->

			<div id="content-wrapper" style='padding-top: 20px;'>
				<div id="content">
					<div id="wsite-content" class="wsite-elements wsite-not-footer">
					<div>
					<p><h1 style="text-align: center;"><span id='pageheddings'>{$tpl_location_title}</span></h1></p>
					<div class="paragraph" style="text-align:left;">
						<table width='800px' height='500px;'>
						<tr style="vertical-align:top; height:5px;"><td width='500'>
							<div id="locationField"> 
							<input id="autocomplete" type="text" style="width: 480px; height: 20px;" class='inputval' />
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
								<table style="width: 100%;">
								    <tr>
								      <td style='width: 15%;'><input type="checkbox" id="optimize" checked /> Optimize</td>
								      <td style='width: 25%;'>
									<select id="mode">
									  <option value="bicycling">Bicycling</option>
									  <option value="driving">Driving</option>
									  <option value="walking">Walking</option>
									</select>
								      </td> 
								    
								      <td style='width: 30%;'><input type="checkbox" id="highways" checked /> Avoid highways</td>
								   
								      <td style='width: 30%;'><input type="checkbox" id="tolls" checked /> Avoid tolls</td>	      
								    </tr>
								     <tr>
								      <td colspan="4" style="text-align: center; padding-top: 5px;"><input type="button" value="Get Directions!" onclick="calcRoute()" class="inputval" />&nbsp;<input type="button" value="Reset" onclick="reset()" class='inputval' /></td>				      
								    </tr>
								  </table>
							</td></tr><tr>
							<td style="width: 100%; vertical-align: top;">
							<div id="directionsPanel" style="position:absolute; height:130px; width:700px; overflow: auto"></div>
							</td></tr></table>
					</div>
					</div>
					</div>
					
					

				</div>
		</div> <!-- content wrapper -->
	</div> <!-- Page wrap --><br />

			<div id="footer">
				<div id="footer-content">
					<script type="text/javascript">expandedFooterController.initialize();</script>
				<div>
			</div>
</div> <!-- wrapper -->
{include file="default/mrg_template/footer_links.tpl"}
</div> <!-- body-wrap --></body></html>