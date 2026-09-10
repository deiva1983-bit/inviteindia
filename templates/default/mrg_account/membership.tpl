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
			<input type="hidden" name="redirect_url" value="https://www.inviteindia.com/pay/ccavResponseHandler.php"/>
			<input type="hidden" name="cancel_url" value="https://www.inviteindia.com/pay/ccavResponseHandlerCancel.php"/>
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
							<label>Billing Name: <span class="required">*</span></label>
							<input type="text" name="billing_name" id="billing_name" value="{$usrpro_fname}" autocomplete="off" required="" />
					</div>
					<div class="col-md-6">
							<label>Billing Email: <span class="required">*</span></label>
							<input type="text" name="billing_email" id="billing_email" value="{$usrpro_email}" autocomplete="off" required="" />
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing Address: <span class="required">*</span></label>
							<input type="text" name="billing_address" id="billing_address" autocomplete="off" required="" />
					</div>
					<div class="col-md-6">
							<label>Billing City: <span class="required">*</span></label>
							<input type="text" name="billing_city" id="billing_city" autocomplete="off" required=""/>
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing State: <span class="required">*</span></label>
							<input type="text" name="billing_state" id="billing_state" autocomplete="off" required="" />
					</div>

					<div class="col-md-6">
							<label>Billing Zip: <span class="required">*</span></label>
							<input type="text" name="billing_zip" id="billing_zip" autocomplete="off" required="" />
					</div>
					<div class="col-md-6 contact-left">
							<label>Billing Country: <span class="required">*</span></label>
							 <select name="billing_country" id="billing_country" ><option value="">Select Country</option><option value="Afghanistan">Afghanistan</option><option value="Aland Islands">Aland Islands</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire">Bonaire</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote dIvoire">Cote dIvoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curacao">Curacao</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea Bissau">Guinea Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Vatican City">Vatican City</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India" selected="selected">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="South Korea">South Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Republic of Macedonia">Republic of Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Federated States of Micronesia">Federated States of Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Barthelemy">Saint Barthelemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten Dutch part">Sint Maarten Dutch part</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="East Timor">East Timor</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="VietNam">VietNam</option><option value="British Virgin Islands">British Virgin Islands</option><option value="United States Virgin Islands">United States Virgin Islands</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
					</div>
					<div class="col-md-6">
							<label>Mobile Number: <span class="required">*</span></label>
							<input type="text" name="billing_tel" id="billing_tel" autocomplete="off" required="" />
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