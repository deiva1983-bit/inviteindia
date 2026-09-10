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
				
					<form class="business-supplier bns-form" method="post" action="business-supplier-add-prices.php?do=man">
					<input type="hidden" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval" />
					{if $tpl_page_access eq '1'}
					{if $tpl_business_category eq '1'}
						
						<div class="form-box" id="pricing_1">
							<h4 class="title">Pricing</h4>
							<p>Please indicate the starting price for your services.</p>
							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Vegetarian" name="price_veg_status" {if $price_veg_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="Vegetarian" >Vegetarian per plate:</label>
										</div>
									</div>
								</div>

								<div class="col-lg-5 col-md-5 col-sm-5">
									<div class="form-group">
										<label class="label-title">Price:</label>
										<input type="text" class="form-control" name="price_veg" value='{$price_veg_tpl}'>
									</div>
								</div>

								<!-- <div class="col-lg-5 col-md-5 col-sm-5">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control">
									</div>
								</div> -->
							</div>
					
							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="Non-Vegetarian"  name="price_non_veg_status" {if $price_non_veg_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="Non-Vegetarian">Non Vegetarian per plate:</label>
										</div>
									</div>
								</div>

								<div class="col-lg-5 col-md-5 col-sm-5">
									<div class="form-group">
										<label class="label-title">Price:</label>
										<input type="text" class="form-control" name="price_non_veg" value='{$price_non_veg_tpl}'>
									</div>
								</div>

								<!-- <div class="col-lg-5 col-md-5 col-sm-5">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control">
									</div>
								</div> -->
							</div>

							<div class="row">
								<div class="col-lg-2 col-md-2 col-sm-2">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="per-day" name="price_per_day_status" {if $price_per_day_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="per-day">Per day price:</label>
										</div>
									</div>
								</div>

								<div class="col-lg-5 col-md-5 col-sm-5">
									<div class="form-group">
										<label class="label-title">Price:</label>
										<input type="text" class="form-control" name="price_per_day" value='{$price_per_day_tpl}'>
									</div>
								</div>

								<!-- <div class="col-lg-5 col-md-5 col-sm-5">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control">
									</div>
								</div> -->
							</div>

						</div>
						
					{elseif $tpl_business_category eq '2'}
						
							<div class="form-box" id="pricing_2">
							<h4 class="title">Pricing</h4>
							<p>Please indicate the starting price for your services.</p>
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="candid_photography" name="price_candid_photography_status" {if $price_candid_photography_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="candid_photography">Candid Photography Per Day</label>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-5">
									<div class="form-group">
										<label class="label-title">Candid Photography per-day price:</label>
										<input type="text" class="form-control" name="price_candid_photography" value='{$price_candid_photography_tpl}' placeholder="Candid Photography Price Per Day">
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control" placeholder="Alcohol Policy">
									</div>
								</div> -->
							</div>

							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="cinematography" name="price_cinematography_status" {if $price_cinematography_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="cinematography">Cinematography Per Day</label>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Cinematography per-day price:</label>
										<input type="text" class="form-control" placeholder="Cinematography Price Per Day" name="price_cinematography" value='{$price_cinematography_tpl}'>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control" placeholder="Alcohol Policy">
									</div>
								</div> -->
							</div>

							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="studio_photography" name="price_studio_photography_status" {if $price_studio_photography_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="studio_photography">Studio Photography Per Day</label>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Studio photography per-day price:</label>
										<input type="text" class="form-control" placeholder="Studio Photography Per Day" name="price_studio_photography" value='{$price_studio_photography_tpl}'>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control" placeholder="Alcohol Policy">
									</div>
								</div> -->
							</div>
					
					
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="pre_wedding_shoot" name="price_pre_wedding_shoot_status" {if $price_pre_wedding_shoot_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="pre_wedding_shoot">Pre-Wedding Shoot Per Day</label>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Pre-Wedding shoot per-day price:</label>
										<input type="text" class="form-control" placeholder="Pre-Wedding Shoot Per Day Price" name="price_pre_wedding_shoot" value='{$price_pre_wedding_shoot_tpl}'>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control" placeholder="Alcohol Policy">
									</div>
								</div> -->
							</div>


							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="photo_package" name="price_photo_package_status" {if $price_photo_package_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="photo_package">Photo Package</label>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Photo package price:</label>
										<input type="text" class="form-control" placeholder="Photo Package" name="price_photo_package" value='{$price_photo_package_tpl}'>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control" placeholder="Alcohol Policy">
									</div>
								</div> -->
							</div>

							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="custom-control custom-checkbox checkbox-lg">
										<input type="checkbox" class="custom-control-input" id="video-package" name="price_video_package_status" {if $price_video_package_status_tpl eq '1'} checked {/if}>
										<label class="custom-control-label" for="video-package">Video Package</label>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Video package price:</label>
										<input type="text" class="form-control" placeholder="Video Package" name="price_video_package" value='{$price_video_package_tpl}'>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-3 col-sm-3">
									<div class="form-group">
										<label class="label-title">Ending price:</label>
										<input type="text" class="form-control" placeholder="Alcohol Policy">
									</div>
								</div> -->
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
