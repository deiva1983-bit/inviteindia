<!-- contact -->
<div class="contact" id="login">
	<div class="container">
	<h3 class="w3layouts_head">Membership<span></span></h3>
	{if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
		<!-- <p class="w3_para">Login</p> -->

		<form class="mystores" action="membership.php" method="post" id="mystores">
			<div class="contact-main w3agile">
					<div class="col-md-6 contact-left">
						<div class="contact-bottom">
							<h3 class="sub_head">Packages:</h3>
								<table class="table table-bordered table-hover" style="width: 95%;">
											<tr>
												<td style="width:50%; ">
													<input type="radio" name="myplan" value="1" {if $glb_mplan eq 1} checked="true" {/if}><span class="sub_head manage-space">Platinum</span></td>
													<td style="width:50%; text-align:center;">
														<div class="up-margin sub_head">{$glb_valid_1} months validity</div>
														<div class="up-margin sub_head"><i class="fa fa-inr" aria-hidden="true"><b>{$glb_price_1}</b></i></div>
														<div class="up-margin sub_head"><i class="fa fa-usd" aria-hidden="true"><b>{$glb_price_usd_1}</b></i></div>
													</td>
											</tr>
											<tr><td>
												<input type="radio" name="myplan" value="2"  {if $glb_mplan eq 2} checked="true" {/if}><span class="sub_head manage-space">Gold</span></td>
												<td style="text-align:center;">
													<div class="up-margin sub_head">{$glb_valid_2} months validity</div>
													<div class="up-margin sub_head"><i class="fa fa-inr" aria-hidden="true"><b>{$glb_price_2}</b></i></div>
													<div class="up-margin sub_head"><i class="fa fa-usd" aria-hidden="true"><b>{$glb_price_usd_2}</b></i></div>
												</td>
											</tr>
											<tr><td><input type="radio" name="myplan" value="3"  {if $glb_mplan eq 3} checked="true" {/if}><span class="sub_head manage-space">Silver</span></td>
											<td style="text-align:center;">
													<div class="up-margin sub_head">{$glb_valid_3} months validity</div>
													<div class="up-margin sub_head"><i class="fa fa-inr" aria-hidden="true"><b>{$glb_price_3}</b></i></div>
													<div class="up-margin sub_head"><i class="fa fa-usd" aria-hidden="true"><b>{$glb_price_usd_3}</b></i></div>
											</td>
											</tr>
								</table>
						</div>
					</div>
				<div class="col-md-6">
			 	<div class="contact-bottom">
				  <h3 class="sub_head">Payment method:</h3>
                                <table align="left" class="table table-bordered table-hover">
                                    <tr><td><input type="radio" name="paytype" value="pay" onclick='setShemp(false)'><span class="sub_head manage-space">Paypal</span></td></tr>
                                    <tr><td><input type="radio" name="paytype" value="ind" onclick='setShemp(true)'><span class="sub_head manage-space">Net Banking / Credit Card / Debit Card</span></td></tr>
                                </table>

					 </div>
				  </div>
				</div>
				<div class="clearfix"> </div>
			</div><!-- contact-main w3agile End -->
		</form>


		<form name="paypal_form" action="paypal_pay.php" method="post" id="paypal_form">
				<input type="hidden" name="cmd" value="_xclick" />
				<input type="hidden" name="userlog_id" value="{$user_log_id}" /> 	
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="lc" value="US" />
				<input type="hidden" name="currency_code" value="USD" />
				<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
				<input type="hidden" name="first_name" value="{$usrpro_fname}"  />
				<input type="hidden" name="last_name" value="{$usrpro_lname}"  />
				<input type="hidden" name="payer_email" value="{$usrpro_email}"  />
				<input type="hidden" name="pay_plan" id="pay_plan" value=""  />
				<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
				<!--  <input type="submit"  value="Submit Payment" /> -->
		</form>

		<form method="post" name="indian_form" action="pay/ccavRequestHandler.php">
			<!-- <input type="hidden" name="userlog_id" value="{$user_log_id}" /> -->
			<input type="hidden" name="order_id" value="{$user_log_id}" />
			<input type="hidden" name="merchant_param1" id="merchant_param1" value=""  /> <!-- Pay_plan_id-->
			<input type="hidden" name="currency" value="INR"/>
			<input type="hidden" name="redirect_url" value="http://www.inviteindia.com/pay/ccavResponseHandler.php"/>
			<input type="hidden" name="cancel_url" value="http://www.inviteindia.com/pay/ccavResponseHandlerCancel.php"/>
			<input type="hidden" name="language" value="EN"/> 
			<input type="hidden" name="merchant_id" value="52161"/>
			<div id='india_payment' class = 'india_payment' style='display: none;'>
				<div class="contact-main w3agile">
					<div class="col-md-12">
					<h3 class="sub_head">Billing information's:</h3>
					</div>
					<div class="col-md-12">
					<span class="sub_head_min">Please provide following informations for placing your order's.</span>
					<p class="validateTips" id="validateTips">&nbsp;</p>
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing Name:</label>
							<input type="text" name="billing_name" id="billing_name" value="{$usrpro_fname}" autocomplete="off" required="" />
					</div>
					<div class="col-md-6">
							<label>Billing Email:</label>
							<input type="text" name="billing_email" id="billing_email" value="{$usrpro_email}" autocomplete="off" required="" />
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing Address:</label>
							<input type="text" name="billing_address" id="billing_address" autocomplete="off" required="" />
					</div>
					<div class="col-md-6">
							<label>Billing City:</label>
							<input type="text" name="billing_city" id="billing_city" autocomplete="off" required=""/>
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing State:</label>
							<input type="text" name="billing_state" id="billing_state" autocomplete="off" required="" />
					</div>

					<div class="col-md-6">
							<label>Billing Zip:</label>
							<input type="text" name="billing_zip" id="billing_zip" autocomplete="off" required="" />
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing Country:</label>
							<input type="text" name="billing_country" id="billing_country" autocomplete="off" required="" />
					</div>
					<input type="hidden" name="delivery_name" id='delivery_name' value=""/>
					<input type="hidden" name="delivery_address" id="delivery_address" value=""/>
					<input type="hidden" name="delivery_city" id="delivery_city" value=""/>
					<input type="hidden" name="delivery_state" id="delivery_state" value=""/>
					<input type="hidden" name="delivery_zip" id="delivery_zip" value=""/>
					<input type="hidden" name="delivery_country" id="delivery_country" value=""/>
					<input type="hidden" name="delivery_tel" id="delivery_tel" value=""/>
				</div>
				<div class="clearfix"> </div>
			</div>
		</form>

		<div class="col-md-12">
			<div class="contact-bottom text-center">
			<input type="submit"  value="Pay Now!" name="submitpay" id="submitpay" class='button' />
			</div>
			<div class="manage-space"></div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>