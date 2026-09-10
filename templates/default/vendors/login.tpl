<!-- contact -->
<div class="contact" id="vendors_home">
	<div class="container">
	{$tpl_err}
	<h3 class="w3layouts_head">Vendor<span> Management</span></h3>
			{if $glb_ismobile eq 2}<div>{$top_nav}</div>{/if}
			<div class="w3ls_banner_bottom_grids">
				<p class="write_para padd-top">We offer a wide range of services to help you register online wedding vendors. Register your business with our Wedding Vendor Directory and get more customers with your genuine service. <span class="sub_head">Get started today!</span></p>
				
				
				<div class="col-md-6 contact-left">
					<p class="write_para"><img src="../static/images/wedding-vendors.jpg" class="img-thumbnail" alt="wedding website registration"></p>
				</div>


				<div class="col-md-6">
				<div class="sub_head_min text-right" id="vactivate-signup-label">Are you new user? <a id="activate-vendor-signup" class="set-cursor-pointer">Sign up!</a></div>
				<div class="sub_head_min text-right" id="vactivate-signin-label">Are you return user? <a id="activate-vendor-signin" class="set-cursor-pointer">Sign in!</a></div>
					<div class="contact-bottom" id="vsignin-win">
					<h4 class="sub_head">Vendor Sign in:</h4>
					<form id="vendors_login" name="vendors_login" class="form_cls" method="post" onsubmit="return false;">
						<input type="hidden" name="ven_login_hidd" id="ven_login_hidd" value="logind"/>
						<div id="validateTipsVenLogin" class="validateTipsVenLogin"></div>
						<input type="text" name="ven_l_username" id="ven_l_username" value="" placeholder="User name" autocomplete="off" class="inputval" required/>
						<input type="password" name="ven_l_pword" id="ven_l_pword" value="" placeholder="Password" autocomplete="off" required/>
						<button id="ven_login" type="submit" class='button'>Login</button><span class='manage-space'></span><button  id="butt_clear_vendors" type="reset" class="button">Clear</button>
					</form>
					</div>
					
					<div class="contact-bottom" id="vsignup-win">
					<h4 class="sub_head">Vendor Registrations:</h4>
					<form id="vendors_create" name="vendors_create" class="form_cls" method="post" onsubmit="return false;">
						<input type="hidden" name="ven_register" id="ven_register" value="add" class="inputval"/>
						<div id="validateTipsVenSignup" class="validateTipsVenSignup"></div>
						<input type="text" name="ven_rusername" id="ven_rusername" value="" class="inputval" placeholder="User name" autocomplete="off" required=""/>
						<input type="email" name="ven_remail" id="ven_remail" value="" class="inputval" placeholder="Email" autocomplete="off" required=""/>
						<input type="password" name="ven_r_pword" id="ven_r_pword" value="" placeholder="Password" autocomplete="off" required=""/>
						<button id="butt_create_vendors" class="button">Register Now</button><span class='manage-space'></span><button  id="butt_clear_vendors" type="reset" class="button">Clear</button>
					</form>
					</div>

				</div>
				
				
				{if $glb_ismobile eq 2}
				<div class="col-md-6">
					<div class="agileits_services_grid">
						<img src="../images/localadd/vensup.jpg" class='ven-img-width' />
					</div>
				</div>
				<div class="col-md-6">
					<div class="agileits_services_grid">
						<img src="../images/localadd/vensup2.jpg" class='ven-img-width' />
					</div>
				</div>
				{/if}

				<div class="clearfix"> </div>
			</div>
		<div class='manage-space'></div>
	</div>
</div>