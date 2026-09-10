<!-- contact -->
<div class="contact" id="vendors_serv">
	<div class="container">
	{$tpl_err}
	<h3 class="w3layouts_head">Vendor Service<span> Management</span></h3>
			<div class="w3ls_banner_bottom_grids">
				{$top_nav}
				<div class="col-md-12 agileits_services_grid">
				<h3 class="sub_head">My products</h3>
				</div>
					{foreach from=$selectwed_count key=k item=v}
					<form id="vendors_login" name="vendors_login" class="form_cls" method="post" action="products_edit.php?id={$v.ser_auto_id}&do=edit" enctype="multipart/form-data">
					<div id="validateTipsVenLogin" class="validateTipsVenLogin"></div>
						<input type="hidden" name="tpl_city_id_hidd" id="tpl_city_id_hidd" value="{$tpl_city_id_hidd}" />
						<input type="hidden" name="tpl_area_id_hidd" id="tpl_area_id_hidd" value="{$tpl_area_id_hidd}" />
						<input type="hidden" name="sub_prod_sts" id="sub_prod_sts" value="editp" />
						<input type="hidden" name="sub_prod_id" id="sub_prod_id" value="{$v.ser_auto_id}" />
					<div>
					<div class="col-md-6 agileits_services_grid">
						<div>
						<label>Contact Name: <span class="required">*<span></label>
						<input type="text" name="ven_cont_name" id="ven_cont_name" value="{$v.ser_user_name}" autocomplete="off" tabindex="1"/>
						</div>

						<div>
						<label>Service Category: <span class="required">*<span></label>
						<select id='pdt_services_drop' name='pdt_services_drop' tabindex="3" >
						{$tpl_sele_pdt}
						</select>
						</div>

						<div>
						<label>Service Logo:</label>
						<input type="file" name="uploaded_service_logo" id="uploaded_service_logo" tabindex="5" />
						<div>
						<img src='../templates/default/mrg_template/vendors/{$user_log_id_vend}/{$v.ser_image}' style='max-width: 400px;'>
						</div>
						</div>
					</div>

				<div class="col-md-6">
						<div>
						<label>Service Name: <span class="required">*<span></label>
						<input type="text" name="ven_serv_name" id="ven_serv_name" value="{$v.ser_service_name}" autocomplete="off" tabindex="2"/>
						</div>

						<div>
						<label>Service Description: <span class="required">*<span></label>
						<textarea name="ven_serv_desc" id="ven_serv_desc" tabindex="4">{$v.ser_desc}</textarea>
						</div>
				</div>
				<div class="clearfix"> </div>
				</div>

				<div class="col-md-6 agileits_services_grid">
						<div class="manage-space">
						<label>Country: <span class="required">*<span></label>
						<input type="text" name="ven_contry_name" id="ven_contry_name" value="INDIA" class="inputval" readonly='readonly' />
						</div>

						<div>
						<label>City: <span class="required">*<span></label>
						<span id='citylists'>{$tpl_sele_city}</span>
						</div>


						<div>
						<label>Address - 2: <span class="required">*<span></label>
						<input type="text" name="ven_addr_2" id="ven_addr_2" value="{$v.ser_address_2}"  tabindex='9'/>
						</div>


						<div>
						<label>Landmark:</label>
						<input type="text" name="ven_landmark" id="ven_landmark" value="{$v.ser_landmark}" tabindex='11'/>
						</div>

						<div>
						<label>FAX:</label>
						<input type="text" name="ven_fax" id="ven_fax" value="{$v.ser_fax}" tabindex='13'/>
						</div>

						<div>
						<label>Phone Number:<span class="required">*<span></label>
						<input type="text" name="ven_pno" id="ven_pno" value="{$v.ser_phno}" tabindex='15'/>
						</div>


				</div>

				<div class="col-md-6 agileits_services_grid">
						<div>
						<label>State: <span class="required">*<span></label>
						<select id='states_drop' name='states_drop' tabindex="6">
						{$tpl_sele_status}
						</select>
						</div>

						<div class="hide-control" id='arealists'>
						<label>Area: </label>
						</div>

						<div>
						<label>Address - 1: <span class="required">*<span></label>
						<input type="text" name="ven_addr_1" id="ven_addr_1" value="{$v.ser_address_1}"  tabindex='8'/>
						</div>

						<div>
						<label>Pin Code: <span class="required">*<span></label>
						<input type="text" name="ven_pincode" id="ven_pincode" value="{$v.ser_pincode}" tabindex='10'/>
						</div>

						<div>
						<label>Website:</label>
						<input type="text" name="ven_website" id="ven_website" value="{$v.ser_website}" tabindex='12'/>
						</div>

						<div>
						<label>Mobile Number:</label>
						<input type="text" name="ven_mno" id="ven_mno" value="{$v.ser_mobno}" tabindex='14'/>
						</div>

						<div>
						<label>Email:</label>
						<input type="text" name="ven_email" id="ven_email" value="{$v.ser_email}" tabindex='16'/>
						</div>

				</div>
				<div class="col-md-12 agileits_services_grid">
				<button id="ven_edit" name="ven_edit" class="button">Submit</button>
				</div>

				<div class="clearfix"> </div>
					</form>
					{/foreach}
				</div>


				
			</div>
		<div class='manage-space'></div>
	</div>
</div>