<!-- contact -->
<div class="contact" id="vendors">
	<div class="container">
	<h3 class="w3layouts_head">Wedding vendors<span></span></h3>
			<div>{$top_nav}</div>
			<div class="w3ls_banner_bottom_grids">
				<p class="write_para">Are you getting married? Are you worried about your makeup, dress selections, wedding catering services, budget limits, timings, and so on? Do not worry, you can easily arrange your wedding with reliable wedding vendors and suppliers.</p>
				<p class="write_para">We have compiled an extensive list of wedding vendors from around the world. Find the best wedding vendors near you! You can check reviews, prices, and easily compare them with other sellers.</p>
				<h3 class="sub_head">Quick Search:</h3>
				<form id="vendors_home" name="vendors_home" class="form_cls" method="post" action="search.php">
				<div class="col-md-3 agileits_services_grid">
					<div class="sub_head_min up-margin">State:</div>
					<div>
						<select id='states_drop' name='state_id' class="inputval" >{$tpl_sele_status}</select> 
					</div>
				</div>
				<div class="col-md-4 agileits_services_grid">
					<div class="sub_head_min up-margin">City:</div>
					<div>
					<span id='citylists'><select id='city_drop' name='city_id' class="inputval" ><option value="0">Select City</option></select></span>
					</div>
					<div style='display: none;' id='arealists'>
						<td>Area:</td>
					</div>
				</div>
				<div class="col-md-4 agileits_services_grid">
					<div class="sub_head_min up-margin">Services / Products:</div>
					<div>
						<span id='arealists'><select id='cat_id' name='cat_id' class="inputval" >
							{$tpl_sele_pdt}
						</select></span> 
					</div>
				</div>
				<div class="col-md-1 text-right">
				<div class="sub_head_min up-margin">&nbsp;</div>
					<div><button id="ven_edit" name="ven_edit"  class="button">Search</button></div>
				</div>
				</form>
				<div class="clearfix"> </div>
			</div>
			
			<div class="w3ls_banner_bottom_grids"><h3 class="w3layouts_head">What We <span>Offer</span></h3></div>
			{$tpl_indextmpl}

	</div>
</div>