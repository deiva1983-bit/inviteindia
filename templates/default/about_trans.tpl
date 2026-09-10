<!-- contact -->
<div class="contact" id="owndomain" style="text-align: left;">
	<div class="container">
	<h3 class="w3layouts_head">Payment <span>confirmation</span></h3>
	{if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
		<!-- <p class="w3_para">Login</p> -->
		<div class="contact-main w3agile">
			<form class="owndomain" action="mydomain.php" method="post" id="packgage">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">

				<h3 class="sub_head">Payment status:</h3>
				<input type="hidden" name="hid_smsopx" id="hid_smsopx" value="{$sms_status}" />
				<p class="write_para">{$trans_msgs}</p>



				<div class='col-xs-12 text-center manage-space'><a href="../wedding-website-settings" id="butt_reset" class="button">Invitations</a>
				</div>
				<div>&nbsp;</div>
			</div>
			</form>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>