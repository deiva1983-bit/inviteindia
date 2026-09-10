<div id="loading-area"></div>
<div class="page-wraper">
	<div class="bns-frame">
		<div class="bns-frame-side">
			<div class="bns-nav">
				<ul>
					<li><a target="bank" href="#">Preview your profile</a></li>
					<li><a href="business-supplier.php">Profile details</a></li>
					<li><a href="business-supplier-add-prices.php">Add price</a></li>
					<li><a href="business-supplier-add-desc.php">Add description</a></li>
					<li><a href="business-supplier-add-photos.php">Add photo's</a></li>
					<li><a href="business-supplier-add-gen-serv.php">Add general service</a></li>
					<li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li>
					<li>&nbsp;</li>
					<li>&nbsp;</li>
					<li><a href="vlogout.php" class="btn gradient blue btn-md">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="bg-gray">
            <div class="container-fluid">
				
					<form class="business-supplier bns-form" method="post" action="business-supplier-add-gen-serv.php?do=man">
					<input type="hidden" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval" />
						
					{if $tpl_page_access eq '1'}
					{if $tpl_business_category eq '1'}
						
						<div class="form-box" id="general_service_1">
							<h4 class="title">General Services</h4>
							<p>Please select the products and services that your business offers.</p>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Year business was established:</label>
												<input type="text" class="form-control" placeholder="Year established" name="ven_established_year" value='{$vtpl_established}'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Max. Head count:</label>
												<input type="text" class="form-control" placeholder="Max. Head count" name="ven_allowed_head" value='{$vtpl_head}'>
											</div>
										</div>		
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Space:{$vtpl_space}</label>
												<select class="form-control" name="ven_space_details">
													<option value="">Select a Space</option>
													<option value="1" {if $vtpl_space eq '1'} selected {/if}>Indoor</option>
													<option value="2" {if $vtpl_space eq '2'} selected {/if}>Outdoor</option>
													<option value="3" {if $vtpl_space eq '3'} selected {/if}>Poolside</option>
													<option value="4" {if $vtpl_space eq '4'} selected {/if}>Terrace</option>
												</select>
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Room count:</label>
												<input type="text" class="form-control" placeholder="Room count" name="ven_room_count" value='{$vtpl_room_count}'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Room starting price:</label>
												<input type="text" class="form-control" placeholder="Room starting price" name="ven_room_starting_price" value='{$vtpl_room_starting_price}'>
											</div>
										</div>		
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Catering policy:</label>
												<input type="text" class="form-control" placeholder="Catering policy" name="ven_catering_policy" value='{$vtpl_catering_policy}'>
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Decor Policy:</label>
												<input type="text" class="form-control" placeholder="Decor Policy" name="ven_decor_policy" value='{$vtpl_decor_policy}'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">DJ Policy:</label>
												<input type="text" class="form-control" placeholder="DJ Policy" name="ven_dj_policy" value='{$vtpl_dj_policy}'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Alcohol Policy:</label>
												<input type="text" class="form-control" placeholder="Alcohol Policy" name="ven_alcohol_policy" value='{$vtpl_alcohol_policy}'>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					{elseif $tpl_business_category eq '2'}
						<div class="form-box" id="general_service_2">
							<h4 class="title">General Services</h4>
							<p>Please select the products and services that your business offers.</p>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Year business was established:</label>
												<input type="text" class="form-control" placeholder="Year established" name="photo_established_year" value='{$tpl_established}'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Delivery Time:</label>
												<input type="text" class="form-control" placeholder="Delivery Time" name="photo_delivery_time" value='{$tpl_delivery_time}'>
											</div>
										</div>		
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Travel Cost:</label>
												<input type="text" class="form-control" placeholder="Travel Cost" name="photo_travel_cost" value='{$tpl_travel_cost}'>
											</div>
										</div>	
									</div>

									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<label class="label-title">Service offered:</label>
												<div class="custom-control custom-checkbox checkbox-lg">
													<input type="checkbox" class="custom-control-input" id="Photo" name="photo_status" {if $tpl_service_offer_photo eq '1'}checked {/if}>
													<label class="custom-control-label" for="Photo">Photo</label>
												</div>
												<div class="custom-control custom-checkbox checkbox-lg">
													<input type="checkbox" class="custom-control-input" id="Video" name="video_status" {if $tpl_service_offer_video eq '1'}checked {/if}>
													<label class="custom-control-label" for="Video">Video</label>
												</div>
												

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						{/if}


						
						<div class="p-b50 text-center">
							<button type="submit" class="btn gradient blue btn-md" id="save_business">Save changes</button>
						</div>

					{/if}
					</form>
			</div>
		</div>
		<!-- Contact area END -->	  
    </div>
</div>
