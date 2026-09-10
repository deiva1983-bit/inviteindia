<div id="loading-area"></div>
<div class="page-wraper">
	<!-- Modal -->
	<div class="modal fade my-account-bx" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="modal-dialog" role="document">
			<div class="modal-content  business-form">
				<form onsubmit="return false;">
					<h3 class="bns-title">Log in to Wedding Manager Business</h3>
					<div id="validateTipsVenLogin" class="validateTipsVenLogin"></div>
					<input type="hidden" name="ven_login_hidd" id="ven_login_hidd" value="logind"/>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="ven_l_username" id="ven_l_username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="ven_l_pword" id="ven_l_pword">
						<div class="reset-password">
							<a class="btn-link collapsed" data-toggle="collapse" href="#reset-password" role="button" aria-expanded="false" aria-controls="reset-password">Reset password?</a>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn blue btn-block gradient" id="ven_login">Login</button>
					</div>
					<div class="sign-text">
						<span class="">Don't have a Wedding Manager account? <a href="#">Sign up</a></span>
					</div>
				</form>
			</div>
			<div class="modal-content collapse reset-password  business-form" id="reset-password">
				<form>
					<h3 class="bns-title">Password reset</h3>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Enter email address">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block blue gradient">Send reset link</button>
					</div>
					<div class="sign-text">
						<span class=""><a data-toggle="collapse" href="#reset-password" role="button" aria-expanded="false" aria-controls="reset-password">Back</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal End -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Section Banner -->
		<div class="dlab-bnr-inr text-center bus-banner overlay-black-dark ov-blue" id="app-banner" style="background-image:url(images/main-slider/slide2.jpg); background-size: cover;">
            <div class="container">
               <div class="row">
				   <div class="col-lg-7 col-md-12 align-self-center">
						<div class="bus-bnr-title text-left">
							<h2 class="title">Wedding Manager Business</h2>	
							<p>Promote your business and book more couples for free using the India's largest wedding manager platform</p>							
						</div>
				   </div>
				   <div class="col-lg-5 col-md-12">
						<div class="tab-content nav">
							<form id="vendors_create" name="vendors_create" class="form_cls business-form" method="post" onsubmit="return false;">
								<h3 class="bns-title">Join Wedding Manager to get your business listed or to claim your listing for FREE!</h3>
								<div class="bns-register">
								<input type="hidden" name="ven_register" id="ven_register" value="add" class="inputval"/>
									<div class="bns-inner">
									<div id="validateTipsVenSignup" class="validateTipsVenSignup"></div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="User Name" name="ven_rusername" id="ven_rusername" autocomplete="off">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email address" name="ven_remail" id="ven_remail" autocomplete="off">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password" name="ven_r_pword" id="ven_r_pword" autocomplete="off">
										</div>
										<div class="form-group">
											<select class="form-control" id="tbl_cat_select" name="tbl_cat_select">{$tpl_sele_cat}</select>
										</div>
										
										
										<div class="form-group">
											<a class="btn blue gradient" data-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="proceed1" id="butt_create_vendors">Register</a>
										</div>
									</div>
									<div class="sign-text">Already a registered supplier? <a href="javascript:;" data-toggle="modal" data-target="#login">Log in</a></div>
								</div>
							</form>

						</div>
				   </div>
			   </div>
            </div>
        </div>

		
		<!-- Venue Search End -->
		<!-- Insightful Inspiration -->
		<div class="section-full bg-gray content-inner" style="background-image: url(images/background/bg3.jpg); background-size: cover; background-position: right bottom;">
			<div class="container">
				<div class="section-head text-center">
					<h2 class="box-title text-italic">Create a free account in under 10 minutes</h2>
					<P>Your Wedding Manager profile is the best way for couples around the world to discover everything your wedding business has to offer. Rank higher on searches by adding:</P>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<ul class="serlist">
							<li><strong><i class="la la-photo"></i> <span>Unlimited photos</span></strong></li>
							<li><strong><i class="la la-star"></i> <span>Supplier recommendations</span></strong></li>
							<li><strong><i class="la la-phone-square"></i> <span>Direct Contact Details</span></strong></li>
							<li><strong><i class="la la-youtube-play"></i> <span>Unlimited videos</span></strong></li>
							<li><strong><i class="la la-check-square"></i> <span>Description of services</span></strong></li>
							<li><strong><i class="la la-cart-plus"></i> <span>Selection of products</span></strong></li>
							<li><strong><i class="la la-heart"></i> <span>Links to Social Media</span></strong></li>
							<li><strong><i class="la la-trophy"></i> <span>Industry awards and features</span></strong></li>
							<li><strong><i class="fa fa-usd"></i> <span>Pricing Information</span></strong></li>
							<li><strong><i class="la la-comments-o"></i> <span>Client reviews & testimonials</span></strong></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

    </div>