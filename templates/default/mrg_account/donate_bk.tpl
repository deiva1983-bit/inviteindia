 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
		<tr> <td colspan="3" align="center"><h3 style="font-size:1.2em;"><font color="red"> 			 
	</font></h2></td></tr>

	<tr>
		 
		<td class="normal" style="border-left:1px solid #FFFFFF;" height="321px;">

			<div class="normal">

					<h3>Support Us: </h3>
 <form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank"> 
<!-- <form class="paypal" action="payments.php" method="post" id="paypal_form"> -->
  <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:945px;">
	<tr>
	<td align="left" colspan="2" style="padding-left: 20px;">
		<p>
				<div class="field">
				<label style="width:200px;">First name:</label> 
				<input type="text" id="first_name" name="first_name" class="inputval" value="{$fname_pay}" maxlength="30" autocomplete="off" />  
				</div>
				</p>
				
				<p>
				<div class="field">
				<label style="width:200px;">Last name:</label> 
				<input type="text" id="last_name" name="last_name" class="inputval" value="{$lname_pay}" maxlength="30" autocomplete="off" />  
				</div>
				</p>
				<p>
				<div class="field">
				<label style="width:200px;">Email:</label> 
				<input type="text" id="email" name="email" class="inputval" value="{$email_pay}" maxlength="30" autocomplete="off" />  
				</div>
				</p>
				 <input type="hidden" name="cmd" value="_xclick" /> 
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="US" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
				<p>
				<div class="field">
				<label style="width:200px;">Check your amount:</label> <input type='text' id='gp_amount' size='4' /> {$pay_fromCou} &nbsp;&nbsp; to &nbsp;&nbsp; {$pay_toCou}		<a id="convertit" style="cursor:pointer;">Convert it</a>		
				</div>
				</p>
				
				<p>
				<label style="width:200px;">&nbsp;</label>
				 <span><em><font color="red"><b>Check your amount*</b> is used only to check the currency value with various countries.</font></em></span>
				</p>
				
				<p>
				<label style="width:200px;">&nbsp;</label>
				 <div id="resultnode">			 
				 </div>
				</p>
	 
	</td>
	</tr>	
	</table>
	
	<input type="submit"  value="Submit Payment"/>
	<h3>Issues with payment: </h3>
				<p>			
				 <span><font color="red">Currently inviteinida.com support only PayPal. PayPal doesn't support Indian currencies. We are working Indian currency payment gateway integrations, if you have any issues with PayPal transactions please fill below form and submit, our support team will contact you immediately.</font></span>
				 
				 <div><span><font color="red">Thanks for your support.</font></span></div>
				 <div><span><font color="red">InviteIndia.com</font></span></div>
				</p>	

				<p>
				<div class="field">
				<label style="width:200px;">Name:</label> 
				<input type="text" id="cus_name" name="cus_name" class="inputval" value="" maxlength="30" autocomplete="off" />
				</div>
				</p>
				
				<p>
				<div class="field">
				<label style="width:200px;">Customer Email:</label> 
				<input type="text" id="cus_email" name="cus_email" class="inputval" value="" maxlength="30" autocomplete="off" />
				</div>
				</p>	

				<p>
				<div class="field">
				<label style="width:200px;">Your message:</label> 
				<textarea class="inputval" style="width: 250px;" id="your_msg" name="your_msg"></textarea>
				</div>
				</p>
				
				<p>
				<label style="width:200px;">&nbsp;</label>
				 <div id="resultnodemail">			 
				 </div>
				</p>
				
					<p>
				<label style="width:200px;">&nbsp;</label>
				 <div>	<a id="emailSubmitIt" style="cursor:pointer;">Submit it</a>		 
				 </div>
				</p>
				  
			
				
		</form>			
			</div>

		</td>
		
		 
		
	</tr>
</table>
      </div>
   </div>
   
   
   
  

