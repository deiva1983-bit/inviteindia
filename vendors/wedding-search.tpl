    <!-- Content -->
    <div class="page-content bg-white">
       <!-- contact area -->
        <div class="content-block">
			<!-- Search Filter -->
			<div class="search-filter wadding-vanues-filter">
				<div class="container">
					<form class="filter-form" action="wedding-venues-search.html">
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
							<div class="col-lg-2 col-md-2 col-sm-6 col-6 d-flex">
								<button class="btn btn-block gradient text-uppercase"> Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<input type="text" class="form-control" placeholder="We’re looking for" id="datetimepicker4">
			<!-- Search Filter END -->
			<div class="section-full bg-gray wadding-vanues-search">
				<div class="clearfix">
					<div class="row m-lr0 column-reverse-md">
						<div class="col-xl-12 col-lg-12 sidebar-list p-lr0">
							<div class="search-results-topbar">
								<div class="search-results">
									<h6 class="search-content"><span class="text-primary">36 of 559  </span>Wedding Venues in the United Kingdom</h6>
									<a href="planner-shortlist.html" class="btn-link">Your Sortlist <span class="text-primary">(02)</span></a>
									<select> 
										<option>Our Favourites</option>
										<option>Most Popular</option>
										<option>Recently Added</option> 
									</select>
									<a class="btn gray collapsed" role="button" data-toggle="collapse" href="#wadding-vanues-filter" aria-expanded="false" aria-controls="wadding-vanues-filter">Filter by</a>
								</div>
								<div class="filter-bx collapse fade" id="wadding-vanues-filter">
									<form>
										<div class="form-group">
											<label class="label-title">Seated Dining Capacity</label>
											<div class="range-sliderbx">
												<input id="ex14" type="text" data-slider-ticks="[0, 10, 20, 40]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$10", "$20", "$40"]' data-slider-ticks-positions="[0, 30, 70, 10]" />
											</div>
										</div>
										<div class="form-group">
											<label class="label-title">Your must-haves</label>
											<ul class="select-list clearfix list-inline">
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves1">
														<label class="custom-control-label" for="must-haves1">Exclusive Use</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves2">
														<label class="custom-control-label" for="must-haves2">Wedding Licence</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves3">
														<label class="custom-control-label" for="must-haves3">On-Site Accommodation</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves4">
														<label class="custom-control-label" for="must-haves4">Late Night Extension</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves5">
														<label class="custom-control-label" for="must-haves5">Alcohol Licence</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves6">
														<label class="custom-control-label" for="must-haves6">Late Night Extension</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves7">
														<label class="custom-control-label" for="must-haves7">Alcohol Licence</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves8">
														<label class="custom-control-label" for="must-haves8">Exclusive Use</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves9">
														<label class="custom-control-label" for="must-haves9">Wedding Licence</label>
													</div>
												</li>
												<li>
													<div class="custom-control custom-checkbox checkbox-lg">
														<input type="checkbox" class="custom-control-input" id="must-haves10">
														<label class="custom-control-label" for="must-haves10">On-Site Accommodation</label>
													</div>
												</li>
											</ul>
										</div>
										<div class="accordion form-accordion" id="accordionExample">
											<div class="card">
												<div class="card-header" id="headingOne">
													<a class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
														Venue Types
													</a>
												</div>
												<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
													<div class="card-body">
														<ul class="select-list clearfix list-inline">
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types1">
																	<label class="custom-control-label" for="venue-types1">Exclusive Use</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types2">
																	<label class="custom-control-label" for="venue-types2">Wedding Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types3">
																	<label class="custom-control-label" for="venue-types3">On-Site Accommodation</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types4">
																	<label class="custom-control-label" for="venue-types4">Late Night Extension</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types5">
																	<label class="custom-control-label" for="venue-types5">Alcohol Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types6">
																	<label class="custom-control-label" for="venue-types6">Late Night Extension</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types7">
																	<label class="custom-control-label" for="venue-types7">Alcohol Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types8">
																	<label class="custom-control-label" for="venue-types8">Exclusive Use</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types9">
																	<label class="custom-control-label" for="venue-types9">Wedding Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-types10">
																	<label class="custom-control-label" for="venue-types10">On-Site Accommodation</label>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingTwo">
													<a class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													 Venue Styles
													</a>
												</div>
												<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
													<div class="card-body">
														<ul class="select-list clearfix list-inline">
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles1">
																	<label class="custom-control-label" for="venue-styles1">Exclusive Use</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles2">
																	<label class="custom-control-label" for="venue-styles2">Wedding Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles3">
																	<label class="custom-control-label" for="venue-styles3">On-Site Accommodation</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles4">
																	<label class="custom-control-label" for="venue-styles4">Late Night Extension</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles5">
																	<label class="custom-control-label" for="venue-styles5">Alcohol Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles6">
																	<label class="custom-control-label" for="venue-styles6">Late Night Extension</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles7">
																	<label class="custom-control-label" for="venue-styles7">Alcohol Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles8">
																	<label class="custom-control-label" for="venue-styles8">Exclusive Use</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles9">
																	<label class="custom-control-label" for="venue-styles9">Wedding Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-styles10">
																	<label class="custom-control-label" for="venue-styles10">On-Site Accommodation</label>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingThree">
													<a class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
														Venue Features
													</a>
												</div>
												<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
													<div class="card-body">
														<ul class="select-list clearfix list-inline">
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features1">
																	<label class="custom-control-label" for="venue-features1">Exclusive Use</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features2">
																	<label class="custom-control-label" for="venue-features2">Wedding Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features3">
																	<label class="custom-control-label" for="venue-features3">On-Site Accommodation</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features4">
																	<label class="custom-control-label" for="venue-features4">Late Night Extension</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features5">
																	<label class="custom-control-label" for="venue-features5">Alcohol Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features6">
																	<label class="custom-control-label" for="venue-features6">Late Night Extension</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features7">
																	<label class="custom-control-label" for="venue-features7">Alcohol Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features8">
																	<label class="custom-control-label" for="venue-features8">Exclusive Use</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features9">
																	<label class="custom-control-label" for="venue-features9">Wedding Licence</label>
																</div>
															</li>
															<li>
																<div class="custom-control custom-checkbox checkbox-lg">
																	<input type="checkbox" class="custom-control-input" id="venue-features10">
																	<label class="custom-control-label" for="venue-features10">On-Site Accommodation</label>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center m-t10">
											<button class="btn gray">Apply filters (0)</button>
										</div>
									</form>
								</div>
							</div>
							

							<div class="bg-gray wadding-vanues-list">
								<div class="row sp20">
								{$pdt_contents_tmpl}
								</div>
							</div>

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
						<h2 class="modal-title text-center">Send a message to Maidens Barn</h2>
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
									<li><a class="collapsed btn-link" role="button" data-toggle="collapse" href="#edit" aria-expanded="false" aria-controls="edit">Edit <i class="fa fa-pencil"></i></a></li>
								</ul>
								<div class="filter-bx fade collapse gray-bx" id="edit" style="">
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
												<input id="example_1" class="form-control" type="text">	
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

        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
    <button class="scroltop fa fa-chevron-up" ></button>
</div>