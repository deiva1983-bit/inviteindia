 <!-- content --> 
</div></div>

<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper">
                        <div class="col1">
                            <h2>Membership <span></span></h2>
                            <p>InviteIndia.com offers FREE Registration to all. You can create your wedding invitation with all features; it's completely free for {$glb_free_indays} days. You can upgrade as a paid Premium Member (Platinum or Gold  or Silver) any time.  <!-- Once you upgrade your wedding invitations getting more validity. --></p>
                            <h3>{$maxcard_per_acc} invitations but<span> single </span>account</h3>
                            <p>Once you created your account (free account or membership account), you can create up to <font color="red">{$maxcard_per_acc}</font> invitations using your account. All invitations from your account will get expired based on your membership.,</p>
                            <p><a href="{$glb_site_url}online-wedding-website-aboutus#fet" target="_new">Click Here</a> to check more details about wedding website features.</p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="wrap">
                <section class="cols">
                    <div class="box"><div>
                        <form class="mystores" action="membership.php" method="post" id="mystores">
                            <table align="left">
                                <tr><td  class="normal" style="width:240px; " colspan="2" align="center"><h3 style='padding-top: 2px; color: #fff;'>Packages</h3></td></tr>
                                <tr><td  class="normal" style="width:100px; "><b class='lab_color'><input type="radio" name="myplan" value="1" {if $glb_mplan eq 1} checked="true" {/if}>&nbsp;Platinum</b></td>
                                <td  class="normal" style="width:200px; text-align:center;">
                                    <table width='100%;'>
                                        <tr><td style="text-align: center;"><b>{$glb_valid_1} months validity.</b></td></tr>
                                        <tr><td style="padding: 5px;  text-align: center;"><b><img src='images/rupee-symbol.png' style='height: 14px;' />{$glb_price_1}</b></td></tr>
                                        <tr><td style="padding: 5px;  text-align: center;"><b>$ {$glb_price_usd_1}</td></tr>
                                    </table>
                                </td></tr>
                                <tr><td  class="normal" style="width:100px; "><b class='lab_color'><input type="radio" name="myplan" value="2"  {if $glb_mplan eq 2} checked="true" {/if}>&nbsp;Gold</b></td>
                                <td  class="normal" style="width:200px; text-align:center;">
                                    <table width='100%;'>
                                        <tr><td style="text-align: center;"><b>{$glb_valid_2} months validity.</b></td></tr>
                                        <tr><td style="padding: 5px;  text-align: center;"><b><img src='images/rupee-symbol.png' style='height: 14px;' /> {$glb_price_2}</b></td></tr>
                                        <tr><td style="padding: 5px;  text-align: center;"><b>$ {$glb_price_usd_2}</td></tr>
                                    </table>
                                </td></tr>
                            <tr><td  class="normal" style="width:100px; "><b class='lab_color'><input type="radio" name="myplan" value="3"  {if $glb_mplan eq 3} checked="true" {/if}>&nbsp;Silver</font></b></td>
                            <td  class="normal" style="width:200px; text-align:center;">
                                <table width='100%;'>
                                    <tr><td text-align: center;"><b>{$glb_valid_3} month validity.</b></td></tr>
                                    <tr><td style="padding: 5px;  text-align: center;"><b><img src='images/rupee-symbol.png' style='height: 14px;' /> {$glb_price_3}</b></td></tr>
                                    <tr><td style="padding: 5px;  text-align: center;"><b>$ {$glb_price_usd_3}</b></td></tr>
                                </table>
                            </td></tr> 
                        </table>
                    </form>
                    <!-- mystores form close -->
                    </div></div>
                    <p style='text-align:center; padding: 10px;'><input type="submit"  value="Pay Now!" name="submitpay" id="submitpay" class='button1' /></p>
                </section>
                <section class="cols pad_left1">
                    <div class="box">
                        <div>
                            <h3 style='color: #fff;'>Payment method</h3>
                                <table align="left" style="padding-left: 20px; width: 400px;">
                                    <tr><td  class="normal" style="width:100px; colspan: 2; padding: 10px;"><b class='lab_color'><input type="radio" name="paytype" value="pay" onclick='setShemp(false)'>&nbsp;Paypal</b></td></tr>
                                    <tr><td  class="normal" style="width:100px; padding-left: 10px;"><b class='lab_color'><input type="radio" name="paytype" value="ind" onclick='setShemp(true)'>&nbsp;Net Banking / Credit Card / Debit Card</b></td></tr>
                                </table>
                         </div>
                    </div>
                </section>
                
                <section class="cols pad_left1">
                    <div class="box">
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
                            <div style='padding-left: 20px;'>
                                <p><h3 style='color: #fff;'>Billing information: </h3></p>
                                <p><span><em><font color="yellow">Please provide following informations for placing your order's.</font></em></span></p>
                                
                                <p><label style='color: white; width: 150px'>Billing Name:</label><input type="text" name="billing_name" id="billing_name" value="{$usrpro_fname}" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px;'>Billing Address:</label><input type="text" name="billing_address" id="billing_address" value="2B" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px'>Billing City:</label><input type="text" name="billing_city" id="billing_city" value="Chennai" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px'>Billing State:</label><input type="text" name="billing_state" id="billing_state" value="TN" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px'>Billing Zip:</label><input type="text" name="billing_zip" id="billing_zip" value="631501" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px'>Billing Country:</label><input type="text" name="billing_country" id="billing_country" value="India" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px'>Billing Tel:</label><input type="text" name="billing_tel" id="billing_tel" value="1234567890" class="inputval" style='background: white  !important;' /></p>
                                <p><label class='label_text_white' style='width: 150px'>Billing Email:</label><input type="text" name="billing_email" id="billing_email" value="{$usrpro_email}" class="inputval" style='background: white  !important;' /></p>
                                <input type="hidden" name="delivery_name" id='delivery_name' value=""/>
                                <input type="hidden" name="delivery_address" id="delivery_address" value=""/>
                                <input type="hidden" name="delivery_city" id="delivery_city" value=""/>
                                <input type="hidden" name="delivery_state" id="delivery_state" value=""/>
                                <input type="hidden" name="delivery_zip" id="delivery_zip" value=""/>
                                <input type="hidden" name="delivery_country" id="delivery_country" value=""/>
                                <input type="hidden" name="delivery_tel" id="delivery_tel" value=""/>
                            </div>
                    </div>
                </form>
            </div>
        </section>
</div>
</article>
<!-- / content -->
    </div>
</div>