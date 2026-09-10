<!-- contact -->
<div class="contact" id="vendors">
	<div class="container">
			<div class="w3ls_banner_bottom_grids">
				{if $user_log_id_vend neq '0'}
				<p>
				<span class="manage-space"><a href='products.php?do=add' class='button'>Add new products</a></span>
				<span class="manage-space"><a href='products.php' class='button'>My Products</a></span>
				<span class="manage-space"><a href='login.php?do=out' class='button'>Vendors Signout</a></span>
				</p>
				{/if}
				{$tot_breadcramps}
			<div class="clearfix"> </div>
			</div>

			{if $tot_rec_found eq 1}
			<div class="w3ls_banner_bottom_grids">
				{if $back_uri neq ''}
					<div class="col-md-12 text-right">
						<a href={$back_uri} class='button'><b>Back</b></a>
					</div>
				{/if}
				{foreach from=$searchrecs key=k item=v}
				<div class="col-md-1 agileits_services_grid"></div>
				<div class="col-md-11 agileits_services_grid">
					<h3 class="w3layouts_head"><span>{$v.ser_service_name}</span></h3>
					<div class="text-right"><label>Contact:</label>{if $v.ser_mobno neq ''} {$v.ser_mobno}/ {/if} {$v.ser_phno}</div>
					<div><label>Name:</label><span class="sub_head_min manage-space">{$v.ser_user_name}</span></div>
					<div><label>Descriptions:</label><span class="sub_head_min manage-space">{$v.ser_desc}</span></div>
					<div><label>Address:</label></div>
					<p class="write_para">{$v.ser_address_1}</p>
					{if $v.ser_address_2 neq ''}<div><span class="sub_head_min manage-space">{$v.ser_address_2}</span></div>{/if}
					{if $v.ser_landmark neq ''}<div><span class="sub_head_min manage-space">{$v.ser_landmark}</span></div>{/if}
					{if $v.ser_pincode neq ''}<div><span class="sub_head_min manage-space">{$v.ser_pincode}</span></div>{/if}
					{if $tmpl_addrss_add neq ''}<div><span class="sub_head_min manage-space">{$tmpl_addrss_add}</span></div>{/if}
					<div class="manage-space">&nbsp;</div><div class="manage-space"></div>{if $v.ser_image neq ''}<div><span class="manage-space"><img src='../../templates/default/mrg_template/vendors/{$v.ser_user_id}/{$v.ser_image}' style='max-width: 400px;' ></span></div>{/if}
					<div class="manage-space">&nbsp;</div>

				</div>				
				{/foreach}
				{if $back_uri neq ''}
					<div class="col-md-12 text-right">
					<a href={$back_uri} class='button'><b>Back</b></a>
					</div>
				{/if}
				<div class="manage-space">&nbsp;</div>
			{/if}

	</div>
</div>