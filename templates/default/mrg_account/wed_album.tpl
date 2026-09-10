<div class="contact" id="edit-pers-details">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Album</span></h3>

		{if $alert_status eq '1'}<div class="alert validateTips" role='alert'>{$alert_msg}</div>{/if}
		{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="wedsettings.php?wedid={$glb_curr_wedid}&do=manph&type=frmg" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{$txt_req_lat_ceremony}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{$txt_req_lng_ceremony}' />
		<input type='hidden' name='lat_reception' id='lat_reception' value='{$txt_req_lat_reception}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{$txt_req_lng_reception}' />
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Wedding<span> album</span></h2>
				<p><span><i class="fa fa-upload" aria-hidden="true"></i></span></p>
				</div>
				<div id="validateTips" class="alert validateTips" role='alert'></div>
				<div>{$glb_total_pagination}</div>
					{if $glb_total_records eq 0}
						<div class="alert ui-state-error" role='alert'>You don't have album image, Please upload your memoriable images.</div>
					{else}
						<div id="main-img"><img alt="" src="{$total_imgs}" style='width: 400px;' /></div>
						<div id="main-img">{$action_url}</div>
					{/if}
						    {if $glb_total_records neq 0 && $glb_comm_added_status neq 0}
							<div class="listcomment" id="listcomment">
							    {$glb_commdetails}
							</div>
						    {/if}

						<div>
						<p><h3 class='sub_head'>Add your wedding album:</h3></p>
						<table cellspacing="5px" cellpadding="5px">
						    <tr><td>
							<p>
							<div>
							<label style="width:200px;">Album images:</label> 
							<input type="file" name="uploaded_albumimage" required=""/>
							</div>
							</p>
							<p>
							<div>&nbsp;
							</div>
							</p>
							<p>
							<div>
							<label style="width:200px;">Image Descriptions:</label> 
							<input type="text" id="txt_img_des" name="txt_img_des" class="inputval" />  
							</div>
							</p>

							<div>
							<input id="save_image" name="save_image" type="submit" value="Save Image" class='button' />
							</div>
						</td></tr>
					    </table>
					</div>
			 </div>	
		<div class="clearfix"> </div>
		</div>
		</form>
	</div>
</div>