<!-- contact -->
<div class="contact" id="vendors">
	<div class="container">
	{$tpl_err}
	<h3 class="w3layouts_head">Vendor<span> Management</span></h3>
			<div class="w3ls_banner_bottom_grids">
				{$top_nav}
				<div class="col-md-6 agileits_services_grid">
				<h3 class="sub_head">Vendor Signin:</h3>
					<form id="vendors_login" name="vendors_login" class="form_cls" method="post" action="login.php?do=1">
						<input type="hidden" name="ven_login_hidd" id="ven_login_hidd" value="logind"/>
						<div id="validateTipsVenLogin" class="validateTipsVenLogin"></div>
						<input type="text" name="ven_username" id="ven_username" value="" placeholder="User name" autocomplete="off" />
						<input type="password" name="ven_pword" id="ven_pword" value="" placeholder="Password" autocomplete="off"/>
						<button id="ven_login" type="submit" class='button'>Login</button><span class='manage-space'></span><button  id="butt_clear_vendors" type="reset" class="button">Clear</button>
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