<!-- contact -->
<div class="contact" id="product-lists">
	<div class="container">
	<h3 class="w3layouts_head">Product<span> Management</span></h3>
			<div class="w3ls_banner_bottom_grids">
				{$top_nav}
			<div class="clearfix"> </div>
			</div>
			<div class="w3ls_banner_bottom_grids">
				<div class="col-md-12 agileits_services_grid">
					<table class="table table-hover">
						<thead>
								<th>Service Details</th>
								<th>Actions</th>
						</thead>
					{foreach from=$selectwed_count key=k item=v}
						<tr>
							<td>{$v.ser_service_name}</td>
							<td><a href='view.php?pdtid={$v.ser_auto_id}&from=adm'>View</a> | <a href='products_edit.php?id={$v.ser_auto_id}&do=edit'>Edit</a> | Delete | Activate</td>
						</tr>
					{/foreach}
					</table>
				</div>
			<div class="clearfix"></div>
			</div>
	</div>
</div>