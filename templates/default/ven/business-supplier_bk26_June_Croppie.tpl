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
				
					<form class="business-supplier bns-form" method="post" action="business-supplier.php?do=man" enctype="multipart/form-data">
						<div class="form-box">
						<input type="hidden" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval"/>
							<h4 class="title">Business Details*</h4>
							{foreach from=$select_general_services key=k item=v}
							
							<input type="hidden" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval" value="{$v.tbl_vendor_service_id}"/>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<label class="label-title">Business name</label>
										<input type="text" class="form-control" placeholder="Business Name" name="txt_business_name" value="{$v.business_name}">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 d-lg-block d-md-none d-sm-none col-sm-6">
								<div class="form-group">
										<label class="label-title">Business category</label>
										<select class="form-control" id="tbl_cat_select" name="tbl_cat_select">
										{$tpl_sele_cat}
										</select>
								</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<label class="label-title">Website URL</label>
										<input type="text" class="form-control" placeholder="Website" name="txt_website" value="{$v.business_website_url}">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<label class="label-title">Business Email address</label>
										<input type="text" class="form-control" placeholder="Email address" name="txt_email_addr" value="{$v.business_email_address}">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="label-title">Business phone number <span>(the best number for enquiries)</span></label>
										<input type="text" class="form-control" placeholder="Phone number" name="txt_ph_no" value="{$v.business_phone_number}">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="label-title">Alternate phone number</label>
										<input type="text" class="form-control" placeholder="Phone number" name="txt_alt_ph_no" value="{$v.business_phone_alternate_number}">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<label class="label-title">Address 1:</label>
										<input type="text" class="form-control" placeholder="Address 1" name="txt_addr_1" value="{$v.business_address1}">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="label-title">Address 2:</label>
										<input type="text" class="form-control" placeholder="Address 2" name="txt_addr_2" value="{$v.business_address2}">
									</div>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12">
									<label class="label-title">Address:</label>
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
											    <select id='states_drop' name='states_drop' tabindex="11">
											    {$tpl_sele_status}
											    </select>
											</div>	
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<div class="form-group">
												<span id='citylists'>{$tpl_sele_city}</span>
												</div>
												<div class="hide-control" id='arealists'>
												</div>
											</div>	
										</div>		
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Postcode" name="txt_postal_code" value="{$v.business_postal}">
											</div>	
										</div>	
									</div>	
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<label class="label-title">Cover Photo:</label>
										<input type="file" name="upload_image" id="upload_image" accept="image/*" />
										<input type="hidden" name="uploaded_image" id="uploaded_image" value="" />
									</div>
								</div>


							</div>
							{/foreach}
						</div>
						
						

						
						<div class="p-b50 text-center"><input type="submit" value="Submit"></div>
					</form>
			</div>
		</div>
		<!-- Contact area END -->	  
    </div>
</div>


<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  <button class="btn btn-success crop_image">Crop & Upload Image</button>
        </div>
     </div>
    </div>
</div>
