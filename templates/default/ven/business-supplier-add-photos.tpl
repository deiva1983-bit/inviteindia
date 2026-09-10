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
				
					<form class="business-supplier bns-form" method="post" action="business-supplier-add-photos.php?do=man" enctype="multipart/form-data">
						
						<div class="form-box">
							<h4 class="title">Upload Your Photos*</h4>
							<p>To</p>
							
							<div id="queue"></div>
							<input id="file_upload" name="file_upload" type="file" multiple="true">
							<a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')">Upload Files</a>

						</div>
						<input type="text" name="sub_prod_hidd" id="sub_prod_hidd" value="addp" class="inputval" />
						<div class="p-b50 text-center"><input type="submit" value="Submit">
							<button type="submit" class="btn gradient blue btn-md" id="save_business">Save changes</button>
						</div>

					</form>
			</div>
		</div>
		<!-- Contact area END -->	  
    </div>
</div>
