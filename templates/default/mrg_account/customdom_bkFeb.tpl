 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
		<tr><td colspan="3" align="center">{if $glb_drow_down_show neq 1}<h3 style="font-size:1.2em; padding: 10px;">
		<font color="red">We don't have any invitations on your account. Please create your wedding website.</font></h2>{/if}</td></tr>
<tr>

<tr><td style='padding-top: 10px;'><h2>Create your own domain!</h2></td></tr>
			<tr><td style='padding-top: 5px;'><div id='validateTipsPay' class='validateTipsPay'></div></td></tr>
			<tr><td>
			<div class="normal">
			<form id='create_ownpage_title' name='' method='post' action=''>
			<p><b><p id="links_green" class="validateTips"></p></b>
				<fieldset style='border: 0px;'>
				<p>
				<div class="field">
				<label style="width:200px;">Wedding invitations:</label> 
				<select class="inputval" style="width:300px;" name='wedding_inv_lists' id='wedding_inv_lists'>{$glb_option_val}</select>
				</div>
				</p>

				<p>
				<div class="field">
				<label style="width:200px;">Your wedding website name:</label> 
				<input type='text' name='own_domain_name' id='own_domain_name' class="inputval"  style="width:300px;">
				<span><em><font color="red">Ex: www.akash_weds_nisash.com</font></em></span>
				</div>
				</p>
				
				<p>
				<div class="field">
				<label style="width:200px;">Contact name:</label> 
				<input type='text' name='own_contact_name' id='own_contact_name' class="inputval"  style="width:300px;">
				<span><em><font color="red"></font></em></span>
				</div>
				</p>

				<p>
				<div class="field">
				<label style="width:200px;">Contact number:</label> 
				<input type='text' name='own_contact_no' id='own_contact_no' class="inputval"  style="width:300px;">
				<span><em><font color="red">Once you're domain name is registered, We will give you confirmations.</font></em></span>
				</div>
				</p>

				</fieldset>
			</form>
			</div></td></tr>


 <tr>
<td class="normal" style="border-left:1px solid #FFFFFF;" height="221px;">
	<div class="normal">
	<form class="mystores" action="membership.php" method="post" id="mystores">

	<table align="left">
	<tr bgcolor="#f2f2f2">
	<td  class="normal" style="width:240px; " colspan="2" align="center"><b><font color="#0066cd" size="3em">Package</font></b></td>
	</tr>
	
		<tr bgcolor="#f2f2f2">
<td  class="normal" style="width:100px; "><b><font color="#ce0201" size="2em">

<input type="radio" name="myplan" value="1" checked="true">&nbsp;Own domain</font></b>
					</td>
					<td  class="normal" style="width:200px; text-align:center;">
						<table width='100%;'><tr><td style="padding: 10px;  text-align: center;"><b><font size="3em">One year Validity.</font></b></td></tr>
						<tr><td style="padding: 5px;  text-align: center;"><b><font size="3px"><img src='images/rupee-symbol.png' style='height: 14px;' />{$glb_domain_inr}</font></b></td></tr>
						<tr><td style="padding: 5px;  text-align: center;"><b><font size="3px">$ {$glb_domain_us}</font></td></tr>
						</table>
					</td>
					</tr>
	</table>
	</form>
	</div>
</td>
</tr>
<tr>
<td class="normal" style="border-left:1px solid #FFFFFF;" >
<h3>Payment method:</h3>
				<table align="left" style="padding-left: 20px; width: 400px;">
				<tr bgcolor="#f2f2f2">
					<td  class="normal" style="width:240px; colspan: 2; text-align: center; padding: 10px;"><b><font color="#0066cd" size="3em">Payment type</font></b></td>
				</tr>
						<tr bgcolor="#f2f2f2" style='display:none;'>
								<td  class="normal" style="width:100px; colspan: 2; padding: 10px;"><b><font color="#ce0201" size="2em"><input type="radio" name="paytype" value="pay" onclick='setShemp(false)'>&nbsp;Paypal</font></b>
								</td>
								 
						</tr> 
								<tr bgcolor="#f2f2f2">
								<td  class="normal" style="width:100px; padding-left: 10px;"><b><font color="#ce0201" size="2em"><input type="radio" name="paytype" value="ind" onclick='setShemp(true)'>&nbsp;Net Banking / Credit Card / Debit Card</font></b>
								</td>				
						</tr> 


						
				</table>
</td>
</tr>


<tr><td>

 <form name="paypal_form" action="paypal_pay_own_domain.php" method="post" id="paypal_form">
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
    <input type="hidden" name="inv_id" id ="inv_id" value="" />
    <input type="hidden" name="own_domain_names" class ="own_domain_names" id='own_domain_names' value="" />
  <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<!--  <input type="submit"  value="Submit Payment" /> -->
</form>
<form method="post" name="indian_form" action="pay/ccavRequestHandler_OwnDomain.php">
<input type="hidden" name="currency" value="INR"/>
<input type="hidden" name="order_id" value="{$user_log_id}" />
<input type="hidden" name="redirect_url" value="http://www.inviteindia.com/pay/ccavResponseHandler_OwnDomain.php"/>
<input type="hidden" name="cancel_url" value="http://www.inviteindia.com/pay/ccavResponseHandlerCancel.php"/>
<input type="hidden" name="language" value="EN"/> 
<input type="hidden" name="merchant_id" value="52161"/>
<input type="hidden" name="merchant_param2" id="merchant_param2" value="own"  />
<input type="hidden" name="merchant_param3" value="{$user_log_id}" />
<input type="hidden" name="merchant_param4" id ="merchant_param4" value="" />
<input type="hidden" name="merchant_param5" id ="merchant_param5" value="" />
<div id='india_payment' class = 'india_payment' style='display: none;'>
				<table width="40%" height="100" border='0' align="center">
				<tr>
		     		<td colspan="2"><h3>Billing information: </h3></td>
		     	</tr>
				<tr>
					<td colspan="2">
					<div class="field"><span><em><font color="red">Please enter below details, Its required from payment gateway.
					</font></em></span></div></td>
		     	</tr>
				<tr>
					<td colspan="2">
					<div class="field">&nbsp;</td>
		     	</tr>
		        <tr>
		        	<td>Billing Name	:</td><td><input type="text" name="billing_name" id="billing_name" value="{$usrpro_fname}" class="inputval" /></td>
		        </tr>
		       <tr>
		        	<td>Billing Address	:</td><td><input type="text" name="billing_address" id="billing_address" value="2B" class="inputval" /></td>
		        </tr>
		       <tr>
		        	<td>Billing City	:</td><td><input type="text" name="billing_city" id="billing_city" value="Chennai" class="inputval" /></td>
		        </tr>
		          <tr>
		        	<td>Billing State	:</td><td><input type="text" name="billing_state" id="billing_state" value="TN" class="inputval" /></td>
		        </tr>
		       <tr>
		        	<td>Billing Zip	:</td><td><input type="text" name="billing_zip" id="billing_zip" value="631501" class="inputval" /></td>
		        </tr>
		         <tr>
		        	<td>Billing Country	:</td><td><input type="text" name="billing_country" id="billing_country" value="India" class="inputval" /></td>
		        </tr>
		        <tr>
		        	<td>Billing Tel	:</td><td><input type="text" name="billing_tel" id="billing_tel" value="1234567890" class="inputval" /></td>
		        </tr>
		        <tr>
		        	<td>Billing Email	:</td><td><input type="text" name="billing_email" value="{$usrpro_email}" class="inputval" /></td>
		        </tr>

				<input type="hidden" name="delivery_name" id='delivery_name' value=""/>
				<input type="hidden" name="delivery_address" id="delivery_address" value=""/>
				<input type="hidden" name="delivery_city" id="delivery_city" value=""/>
				<input type="hidden" name="delivery_state" id="delivery_state" value=""/>
				<input type="hidden" name="delivery_zip" id="delivery_zip" value=""/>
				<input type="hidden" name="delivery_country" id="delivery_country" value=""/>
				<input type="hidden" name="delivery_tel" id="delivery_tel" value=""/>
				<input type="hidden" name="contact_name_cc" id="contact_name_cc" value="" />
				<input type="hidden" name="contact_no_cc" id="contact_no_cc" value="" />
				

				</table>

</div>

</form>
</td></tr>


<tr><td>
<div class="demo">
<input type="submit"  value="Pay Now!" name="submitpay" id="submitpay" />
</div>
</td></tr>
<tr><td>
<p style='padding-top: 10px; display: none;'>
				 <span><font color="red">Currently inviteinida.com support only PayPal. We are working indian payment solutions. if you have any issues with PayPal transactions please <a href='online-wedding-website-contactus' target="_new">Click here</a> to fill the form, our support team will contact you immediately.</font></span>
				 </p>
</td></tr></td>
 </table>
</div>