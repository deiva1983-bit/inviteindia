    <!-- Content -->
    <div class="page-content bg-white">
       <!-- contact area -->
        <div class="content-block">
			<!-- Search Filter -->
			<div class="search-filter wadding-vanues-filter">
				<div class="container">
					<form class="filter-form" action="wedding-venues-search.html">
						<div class="row"><div class="text-right col-lg-12 col-lg-12 col-sm-6 col-6"><span class="wthree_head1">Are you a new vendor? <a href="index-business.php" class='wthree_head1 gradient'> Register/login here</a></span></div></div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-6">
								<select id='states_drop' name='state_id' class="inputval" >{$tpl_sele_status}</select>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<div>
								<span id='citylists'><select id='city_drop' name='city_id' class="inputval" >
								{$tpl_sele_city}</select></span>
								</div>
								<div style='display: none;' id='arealists'>
								<td>Area:</td>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<select id='cat_id' name='cat_id' class="inputval" >
									{$tpl_sele_pdt}
								</select>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-6 col-6 d-flex glb-sear">
								<button class="btn btn-block gradient text-uppercase btn-color"> Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<!-- Section Banner END -->
        <!-- contact area -->
	{foreach from=$pdt_contents_tmpl key=k item=v}
        <div class="section-full content-inner wedding-venues-details bg-gray">
            <div class="container">
				<div class="row ">
					<!-- Left part start -->
                    <div class="col-xl-8 col-lg-7 col-md-12 p-b30">
						<div class="details-media-bx">
							<div class="featured-info">
								<h4 class="title">{$v.business_name}</h4>
								<p class="address"><i class="fa fa-map-marker m-r5 text-primary"></i>{$combine_addr}</p>
								<ul class="featured-star">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
							<div class="featured-lists">
								<ul class="navbar">
									<li><a href="#" class="scroll nav-link"><i class="la la-money"></i> for Venue Hire</a></li>
									{if $tpl_head_count neq ''}<li><a href="#" class="scroll nav-link"><i class="la la-users"></i>{$tpl_head_count}</a></li>{/if}
									{if $tpl_room_count neq ''}<li><a href="#" class="scroll nav-link"><i class="la la-bed"></i>{$tpl_room_count}</a></li>{/if}
									{if $tpl_established neq ''}<li><a href="#" class="scroll nav-link"><i class="la la-diamond"></i>{$tpl_established}</a></li>{/if}
									<li><a href="#" class="scroll nav-link"><i class="la la-pencil"></i>Wedding Licence</a></li>
								</ul>
							</div>
							<div class="featured-media">
								<div class="featured-gallery">
									<img src="{$business_profile_pic}" alt="">
									<button class="lightGalleryButton"><i class="fa fa-picture-o"></i> View Photos (12)</button>
								</div>
							</div>
						</div>
						<a href="javascript:;" data-toggle="modal" data-target="#exampleModal2" class="btn btn-block gradient green m-b30">Request a quote</a>
						<h5 class="text-quote">{$short_desc}</h5>
						
						{if $tbl_show_price_panel eq '1'}
						<!-- Pricing & Costs -->
						<h5 class="details-title" id="price">Pricing & Costs</h5>
						<div class="pricing-costs-box">
							{if $tpl_price_per_day_status eq '1'}
							<h5 class="title">Price per day</h5>
							<h2 class="price">{$tpl_price_per_day}</h2>
							{/if}
							<div class="row sp20">
							{if $tpl_price_veg_status eq '1'}
								<div class="col-md-6 m-b20">
									<div class="pricost-box">
										<h5 class="pricost-title"><i class="la la-institution"></i>Vegetarian <span>(per plate)</span></h5>
										<div class="card-bx red bordered">
											<div class="inner">
												<ul class="deal-list">
													<li>
														<span>Prices Start At</span>
														<strong>{$tpl_price_veg}</strong>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							{/if}
							{if $tpl_price_non_veg_status eq '1'}
								<div class="col-md-6 m-b20">
									<div class="pricost-box">
										<h5 class="pricost-title"><i class="la la-institution"></i>Non Vegetarian<span>(per plate)</span></h5>
										<div class="card-bx green bordered">
											<div class="inner">
												<ul class="deal-list">
													<li>
														<span>Prices Start At</span>
														<strong>{$tpl_price_non_veg}</strong>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							{/if}
							</div>
						</div>
						<!-- Pricing & Costs End -->
						{/if}
						
						
						
						
						<!-- Pricing & Costs End -->
						<h5 class="details-title">Products and Services</h5>
						<div class="location-details">
							<div class="row">
								{if $tpl_catering_policy neq ''}
								<div class="col-lg-6 m-b20">
									<h5 class="title">Catering policy:</h5>
									<p>{$tpl_catering_policy}</p>
								</div>
								{/if}
								{if $tpl_decor_policy neq ''}
								<div class="col-lg-6 m-b20">
									<h5 class="title">Decor policy:</h5>
									<p>{$tpl_decor_policy}</p>
								</div>
								{/if}
								{if $tpl_dj_policy neq ''}
								<div class="col-lg-6 m-b20">
									<h5 class="title">DJ policy:</h5>
									<p>{$tpl_dj_policy}</p>
								</div>
								{/if}
								{if $tpl_alcohol_policy neq ''}
								<div class="col-lg-6 m-b20">
									<h5 class="title">Alcohol policy:</h5>
									<p>{$tpl_alcohol_policy}</p>
								</div>
								{/if}
							</div>
						</div>


						<!-- Details -->
						<!-- Full Description -->
						<h5 class="details-title">Full Description</h5>
						<div class="description-box">
							{$long_desc}
						</div>
						<!-- Full Description End -->
						
						<!-- Reviews -->						
						<!-- Reviews End -->

						<!-- Location -->
						<h5 class="details-title" data-toggle="collapse" data-target="#map" aria-expanded="false" aria-controls="map">Location & Contact Details</h5>
						<div class="collapse" id="map">
						  <div class="card card-body m-b30">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.3825624477!2d75.65046970649679!3d26.88544791796718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C+Rajasthan!5e0!3m2!1sen!2sin!4v1500819483219" class="align-self-stretch " style="border:0; width:100%; min-height:350px;" allowfullscreen=""></iframe>
						  </div>
						</div>
						<div class="location-details">
							<ul class="info-bx">
								<li><a href="https://{$tpl_business_website_url}" target="_blank"><i class="la la-laptop"></i>Website</a></li>
								<!-- <li><a href=""><i class="la la-envelope"></i>Email</a></li>
								<li><a href=""><i class="la la-phone"></i>01787374544</a></li> -->
							</ul>
						</div>
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <aside class="side-bar listing-side-bar">
                            <div class="venues-sidebar-info">
								<div class="title-head"><h5 class="title">Send a message to {$tpl_business_name}.</h5></div>
								<small class="small-bx">We will pass your details to the supplier so they can get back to you with a proposal.</small>
								<ul class="vender-profile-list">
									<li><input type="text" class="form-control" placeholder="Enter your email address"></li>
									<li><input type="text" class="form-control" placeholder="Enter your phone number"></li>
									<li><input type="text" class="form-control" placeholder="What's your name?"></li>
									<li><input type="date" class="form-control"></li>
									<li><textarea class="form-control">Hi,
											We're interested in your services! Please could you share your availability around our date, plus any additional information?
											Thank you!
										</textarea>
									</li>
									<li><a href="#" class="btn btn-block gradient green">Request brochure</a></li>
								</ul>
							</div>
                        </aside>
						<aside class="side-bar listing-side-bar sticky-top">
                           	<ul class="vender-details-form">
								<li class="btn-group-toggle" data-toggle="buttons">
									<label class="btn booked-btn">
										<i class="icon1 fa fa-thumbs-up"></i>
										<i class="icon2 fa fa-thumbs-o-up"></i>
										<input type="checkbox" name="options" id="option1" checked=""> 
										<span class="show1">Mark as booked</span>
										<span class="show2">Booked</span>
									</label>
								</li>
								<li class="btn-group-toggle" data-toggle="buttons">
									<label class="btn shortlist-btn">
										<i class="icon1 fa fa-heart"></i>
										<i class="icon2 fa fa-heart-o"></i>
										<input type="checkbox" name="options" id="option2">
										<span class="show1">Shortlisted</span>
										<span class="show2">Add to shortlist</span>
									</label>
								</li>
								<li>
									<a href="javascript:;" data-toggle="modal" data-target="#writeReviews" class="btn reviews-btn">
										<i class="fa fa-star-o"></i>
										<span>Write a Reviews</span>
									</a>
								</li>
							</ul>
                        </aside>
                    </div>
                    <!-- Side bar END -->
				</div>
            </div>
        </div>
	{/foreach}
		<!-- contact area END -->
		<!-- contact area end -->
		<div class="modal fade deal-modal" id="deal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header justify-content-center">
						<a href="#" class="btn red btn-sm radius-xl">Wedding Manager Deal</a>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="deal-inner">
							<h5 class="title">Weekend March 2020 Offer</h5>
							<span class="price">Save £800</span>
							<p>This special offer for weekends in March 2020 includes: catering for 60 day guests/catering for a total of 100 guests in the evening; videographer; DJ Friday: £6,355 Saturday: £6,855 Sunday: £5,855</p>
							<span class="date">Offer expires: 31/03/2020</span>
						</div>
					</div>
					<div class="modal-footer justify-content-center">
						<button type="button" class="btn">Redeem offer</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade add-guest planner-modal-bx" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<h2 class="modal-title text-center">Send a message to {$tpl_business_name}.</h2>
					<form>
						<div class="form-group text-center">
							<small class="small-bx">We will pass your details to the supplier so they can get back to you with a proposal.</small>
						</div>
						<div>
							<div style="">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Email address</label>
											<input type="text" class="form-control" placeholder="Add an email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Phone number</label>
											<input type="text" class="form-control" placeholder="Add a phone number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Your name</label>
											<input type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Ideal date</label>
											<input type="date" class="form-control">
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="form-group gray-bx">
							<label class="label-title">Your must-haves</label>
							<ul class="select-list clearfix list-inline list-3">
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="more-info">
										<label class="custom-control-label" for="more-info">More info</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Brochure">
										<label class="custom-control-label" for="Brochure">Brochure</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Pricing-details">
										<label class="custom-control-label" for="Pricing-details">Pricing details</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Alternative-dates">
										<label class="custom-control-label" for="Alternative-dates">Alternative-dates</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Availability">
										<label class="custom-control-label" for="Availability">Availability</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Quote">
										<label class="custom-control-label" for="Quote">Quote</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Showround-date">
										<label class="custom-control-label" for="Showround-date">Showround date</label>
									</div>
								</li>
								<li>
									<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Other">
										<label class="custom-control-label" for="Other">Other</label>
									</div>
								</li>
							</ul>
						</div>
						<div class="form-group gray-bx">
							<div class="text-center">
								<a class="collapsed black btn-link" role="button" data-toggle="collapse" href="#maidens-barn" aria-expanded="false" aria-controls="maidens-barn"><i class="fa fa-plus-circle"></i> Add a custom message</a>
							</div>
							<div class="filter-bx fade collapse" id="maidens-barn" style="">
								<div class="row">
									<div class="col-md-12">
										<div class="m-t30">
											<label class="label-title">Edit your message below</label>
											<textarea class="form-control" placeholder="Add an email"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center m-t30">
								<button class="btn green gradient">Request brochure</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal End -->
		<!-- Modal -->
		<div class="modal fade add-guest write-reviews planner-modal-bx" id="writeReviews" tabindex="-1" role="dialog" aria-labelledby="writeReviews" aria-hidden="true">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<h2 class="modal-title text-center">Submit a review for Chanon deValois Photography</h2>
					<form>
						<div class="gray-bx">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="label-title">Rate your experience*</label>	
										<div class="comment-form-rating">
											<label class="pull-left m-r20">Your Rating</label>
											<div id="review_form_wrapper">
												<div id="review_form">
													<div id="respond" class="comment-respond">
														<div class="rating-widget">
															<!-- Rating Stars Box -->
															<div class="rating-stars">
																<ul id="stars">
																	<li class="star" title="Poor" data-value="1">
																		<i class='fa fa-star fa-fw'></i>
																	</li>
																	<li class="star" title="Fair" data-value="2">
																		<i class="fa fa-star fa-fw"></i>
																	</li>
																	<li class="star" title="Good" data-value="3">
																		<i class="fa fa-star fa-fw"></i>
																	</li>
																	<li class="star" title="Excellent" data-value="4">
																		<i class="fa fa-star fa-fw"></i>
																	</li>
																	<li class="star" title="WOW!!!" data-value="5">
																		<i class="fa fa-star fa-fw"></i>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="label-title">Title*</label>	
										<input type="text" class="form-control" placeholder="Simply the best wedding of my life">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="label-title">Message*</label>	
										<textarea class="form-control" placeholder="Don't be shy, get personal and share the juicy details!"></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="label-title">Add a photo<span>Optional</span></label>	
										<input type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="">
									</div>
								</div>
							</div>
						</div>
						<div class="white-bx p-tb30">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="label-title">By*</label>	
										<div class="select-input">
											<div class="select-group">
												<select>
													<option>A happy couple</option>
													<option>A couple's parents</option>
													<option>Happy guests</option>
													<option>Suppliers</option>
													<option>Other</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="label-title">Wedding date*</label>	
										<input type="date" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="label-title">Your name*</label>	
										<input type="text" class="form-control" placeholder="Romeo & Juliet">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="label-title">Email* <span>(We won't show it on your review)</span></label>	
										<input type="text" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="recaptcha">
											<div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
											<input class="form-control d-none" style="display:none;" data-recaptcha="true" required="" data-error="Please complete the Captcha">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<p class="text-reviews">All reviews submitted will be verified and posted within 24 hours. By submitting this review you are verifying that it is an honest and accurate review. Wedding Manager reserves the right to request evidence of any feedback provided.</p>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<button class="btn green gradient">Add a review</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal End -->
		<!-- Modal -->
		<div class="modal fade add-guest planner-modal-bx" id="contactSupplier" tabindex="-1" role="dialog" aria-labelledby="contactSupplier" aria-hidden="true">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<h2 class="modal-title text-center">Send a message to Chanon deValois Photography</h2>
					<form>
						<div class="form-group text-center">
							<small class="small-bx">We will pass your details to the supplier so they can get back to you with a proposal.</small>
						</div>
						<div>
							<ul class="popup-profile-info">
								<li><strong>Email:</strong><span>kkgaur9736@gmail.com</span></li>
								<li><strong>Names:</strong><span>kk gaur & kk kuldeep</span></li>
								<li><strong>Phone:</strong><span>[recommended]</span></li>
								<li><strong>Ideal date:</strong><span>20th Feb 2020</span></li>
								<li><strong>Estimated guests:</strong><span>[missing]</span></li>
								<li><a class="collapsed btn-link" role="button" data-toggle="collapse" href="#profile-edit" aria-expanded="false" aria-controls="profile-edit">Edit <i class="fa fa-pencil"></i></a></li>
							</ul>
							<div class="filter-bx fade collapse gray-bx" id="profile-edit">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Email address</label>
											<input type="text" class="form-control" placeholder="Add an email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Phone number</label>
											<input type="text" class="form-control" placeholder="Add a phone number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Your name</label>
											<input type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Your partner's name</label>
											<input type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Estimated guests</label>
											<input type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="label-title">Ideal date</label>
											<input type="date" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group gray-bx">
							<div class="text-center">
								<a class="collapsed black btn-link" role="button" data-toggle="collapse" href="#contactSupplierEdit" aria-expanded="false" aria-controls="contactSupplierEdit"><i class="fa fa-plus-circle"></i> Add a custom message</a>
							</div>
							<div class="filter-bx fade collapse" id="contactSupplierEdit" style="">
								<div class="row">
									<div class="col-md-12">
										<div class="m-t30">
											<label class="label-title">Edit your message below</label>
											<textarea class="form-control" placeholder="Add an email"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center m-t30">
								<button class="btn green gradient">Request brochure</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal End -->
		<!-- Modal -->
		<div class="modal fade add-guest planner-modal-bx" id="edit-details" tabindex="-1" role="dialog" aria-labelledby="edit-details" aria-hidden="true">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<h2 class="modal-title text-center">Edit your details</h2>
					<form>
						<div class="form-group text-center">
							<small class="small-bx">We will pass your details to the supplier so they can get back to you with a proposal.</small>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Email*</label>	
									<input type="text" class="form-control" placeholder="Enter your email address">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Phone*</label>	
									<input type="text" class="form-control" placeholder="Enter your phone number">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Your name*</label>	
									<input type="text" class="form-control" placeholder="What's your name?">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Your partner's name*</label>	
									<input type="text" class="form-control" placeholder="Who are you marrying?">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Estimated guests*</label>	
									<input type="text" class="form-control" placeholder="How many guests?">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Ideal date*</label>	
									<input type="date" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="label-title">Location*</label>	
									<input type="text" class="form-control" placeholder="Chelmsford, UK">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center m-t30">
								<button class="btn green gradient">Save information</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal End -->
    </div>
    <!-- Content END-->
    <button class="scroltop fa fa-chevron-up"></button>
</div>