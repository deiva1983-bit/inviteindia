<!-- contact -->
<div class="contact" id="vendors">
	<div class="container">
	{$tpl_err}
	<h3 class="w3layouts_head">Vendor<span> Management</span></h3>
			<div class="w3ls_banner_bottom_grids">
				{$top_nav}
				<div class="col-md-6 agileits_services_grid">
				<h3 class="sub_head">Vendor Registrations:</h3>
					<form id="vendors_create" name="vendors_create" class="form_cls" method="post" action="reg.php?do=1">
						<input type="hidden" name="ven_register" id="ven_register" value="add" class="inputval"/>
						<div id="validateTipsVenLogin" class="validateTipsVenLogin"></div>
						<input type="text" name="ven_username" id="ven_username" value="" class="inputval" placeholder="User name" autocomplete="off" required=""/>
						<input type="email" name="ven_email" id="ven_email" value="" class="inputval" placeholder="Email" autocomplete="off" required=""/>
						<input type="password" name="ven_pword" id="ven_pword" value="" placeholder="Password" autocomplete="off" required=""/>
						<button id="butt_create_vendors" class="button">Register Now</button><span class='manage-space'></span><button  id="butt_clear_vendors" type="reset" class="button">Clear</button>
					</form>
				</div>
				<div class="col-md-6">
				<div class="even-div agileits_services_grid">
				<img src="../images/localadd/vensup.jpg" class='ven-img-width' />
				</div>
				<div class="even-div agileits_services_grid">
				<img src="../images/localadd/vensup2.jpg" class='ven-img-width' />
				</div>
				</div>

				<div class="clearfix"> </div>
			</div>
		<div class='manage-space'></div>
	</div>
</div>