<!-- contact PERSONALISED WEDDING WEBSITE  -->
<div class="contact" id="packgage">
	<div class="container">
	<h1 class="w3layouts_head">Packages and features</h1>
	{if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
		<div class="w3agile">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">
					<p class="write_para">All users at InviteIndia.com are welcome to register for free. You can browse a comprehensive list of free samples and create your own exclusive wedding website. Logged-in users can upgrade to Premium Membership at any time.</p>
					
					<h3 class="sub_head">One account, three wedding websites:</h3>
					<p class="write_para">After signing up as a free or premium member, you can create three different wedding websites in your account. Depending on the package you choose, all of your wedding websites will have the same validity and features.</p>
					<h3 class="sub_head">Free service:</h3>
					<p class="write_para">You can use all of the features on your website for up to 20 days. You must sign up as a premium member in order to retain all of the features from the 21st day.</p>

				<form class="packgage" {if $glb_user_log_id neq ''} action="membership.php" method="post" {else} action="#" onSubmit="return false;" {/if}>
					<div class='row odd-div'>
						<div class='col-xs-4'><h3 class="sub_head">Features</h3></div>
						<div class='col-xs-2'><h3 class="sub_head">Platinum</h3></div>
						<div class='col-xs-2'><h3 class="sub_head">Gold</h3></div>
						<div class='col-xs-2'><h3 class="sub_head">Silver</h3></div>
						<div class='col-xs-2'><h3 class="sub_head">Free</h3></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Price</label></div>
						<div class='col-xs-2'><label class='label-p'><i class="fa fa-inr" aria-hidden="true"><b>{$glb_price_1}</b></i><span class="manage-space">|</span><i class="fa fa-usd" aria-hidden="true"><b>{$glb_price_usd_1}</b></i></label></div>
						<div class='col-xs-2'><label class='label-p'><i class="fa fa-inr" aria-hidden="true"><b>{$glb_price_2}</b></i><span class="manage-space">|</span><i class="fa fa-usd" aria-hidden="true"><b>{$glb_price_usd_2}</b></i></label></div>
						<div class='col-xs-2'><label class="ping-color"><i class="fa fa-inr" aria-hidden="true"><b>{$glb_price_3}</b></i><span class="manage-space">|</span><i class="fa fa-usd" aria-hidden="true"><b>{$glb_price_usd_3}</b></i></label></div>
						<div class='col-xs-2'><label class='label-p'>NA</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Website validity</label></div>
						<div class='col-xs-2'><label>{$glb_valid_1} Months</label></div>
						<div class='col-xs-2'><label>{$glb_valid_2} Months</label></div>
						<div class='col-xs-2'><label>{$glb_valid_3} Months</label></div>
						<div class='col-xs-2'><label>{$glb_free_indays} days</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Home page</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Wedding events</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Guest book</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Wedding albums</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Location map</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Wedding animations</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Supports all themes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>Few themes</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Social network links</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Wedding cover design</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Password protection</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Create your own page</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Background music</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Advertisements</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Email reminder</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Envelope design</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label>Yes</label></div>
						<div class='col-xs-2'><label class='label-p'>No</label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-4'><label>Website validity</label></div>
						<div class='col-xs-2'><label>{$glb_valid_1} Months</label></div>
						<div class='col-xs-2'><label>{$glb_valid_2} Months</label></div>
						<div class='col-xs-2'><label>{$glb_valid_3} Months</label></div>
						<div class='col-xs-2'><label>{$glb_free_indays} days</label></div>
					</div>
					<div class='row even-div'>
						<div class='col-xs-4'><label>Select your plan</label></div>
						<div class='col-xs-2'><input type="radio" name="mplan" value="1"><label class='label-p manage-space'>Platinum</label></div>
						<div class='col-xs-2'><input type="radio" name="mplan" value="2"><label class='label-p manage-space'>Gold</label></div>
						<div class='col-xs-2'><input type="radio" name="mplan" value="3" checked><label class='label-p manage-space'>Silver</label></div>
						<div class='col-xs-2'><label class='manage-space'></label></div>
					</div>
					<div class='row odd-div'>
						<div class='col-xs-12 text-center'><input type="submit" id="butt_reset" value='Submit' class="button" {if $glb_user_log_id eq ''} data-toggle="modal" data-target="#loginWindow" id="gnav_login" {/if}/></div>
					</div>
					<div class='clearfix'></div>



			  	</form>
			  </div>
			</div>
		<div class="clearfix"> </div>
		</div>
	</div>
</div>