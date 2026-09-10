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
				
					<form class="business-supplier bns-form" method="post" action="business-supplier-add-desc.php?do=man" enctype="multipart/form-data">
					<input type="hidden" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval" />
						<div class="form-box">
							<h4 class="title">Description</h4>
							<p>Please include a brief description of your business and wedding services which will appear at the top of your profile.</p>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<textarea class="form-control" placeholder="Short Description (max 200 characters)" rows="3" name="service_short_desc">{$tpl_info_short_desc}</textarea>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<p>Please provide a more detailed description of the products and services that you offer. Be sure to highlight the wonderful features that make your business unique!</p>
										<textarea class="form-control" placeholder="Description of Services (max 2000 characters)" rows="3" name="service_long_desc">{$tpl_info_long_desc}</textarea>
									</div>
								</div>
							</div>
						</div>

						

						



						
						<div class="p-b50 text-center">
							<button type="submit" class="btn gradient blue btn-md" id="save_business">Save changes</button>
						</div>
					</form>
			</div>
		</div>
		<!-- Contact area END -->	  
    </div>
</div>
