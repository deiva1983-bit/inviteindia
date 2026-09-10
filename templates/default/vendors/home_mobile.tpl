<!-- contact -->
<div class="contact" id="vendors_home">
	<div class="container">
	<h3 class="w3layouts_head">Wedding vendors<span></span></h3>
			<div class="col-md-12 text-right">
			{if $user_log_id_vend neq '0'}
			<span class="manage-space"><a href='{$glb_path_dir}products.php?do=add' class='button'>Add new products</a><a href='{$glb_path_dir}products.php' class='button'>My Products</a></span><span class="manage-space"><a href='{$glb_path_dir}login.php?do=out' class='button'>Vendors Signout</a></p>
			{else}
			<p><span class="manage-space"><a href='{$glb_path_dir}login.php' class='button'>Vendor Signin/Signup</a></span></p>
			{/if}
			</div>


			<div class="w3ls_banner_bottom_grids">
				<p class="write_para">Are you getting married? Are you worried about your makeup, dress selections, wedding catering services, budget limits, timings, and so on? Do not worry, you can easily arrange your wedding with reliable wedding vendors and suppliers.</p>
				<p class="write_para">We have compiled an extensive list of wedding vendors from around the world. Find the best wedding vendors near you! You can check reviews, prices, and easily compare them with other sellers.</p>
				<h3 class="sub_head">Quick Search:</h3>
				<form id="vendors_home" name="vendors_home" class="form_cls" method="post" action="{$glb_path_dir}search.php">
					<div class="col-md-12">
						<div class="sub_head_min up-margin">State:</div>
						<div><select id='states_drop' name='state_id' class="inputval" >{$tpl_sele_status}</select></div>
					</div>
					<div class="col-md-12">
						<div class="sub_head_min up-margin">City:</div>
						<div><span id='citylists'><select id='city_drop' name='city_id' class="inputval" ><option value="0">Select City</option></select></span></div>
						<div style='display: none;' id='arealists'>
							<td>Area:</td>
						</div>
					</div>
					<div class="col-md-12">
						<div class="sub_head_min up-margin">Services / Products:</div>
						<div><span id='arealists'><select id='cat_id' name='cat_id' class="inputval" >{$tpl_sele_pdt}</select></span></div>
					</div>
					<div class="col-md-12 text-right">
					<button id="ven_edit" name="ven_edit"  class="button">Search</button>
					</div>
				</form>
				<div class="clearfix"> </div>
			</div>
			
			<div class="w3ls_banner_bottom_grids"><h3 class="w3layouts_head">What We <span>Offer</span></h3></div>
			{$tpl_indextmpl}

	</div>
</div>