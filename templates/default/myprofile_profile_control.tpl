<div class="contact" id="login">
        <div class="container">
        <h3 class="w3layouts_head">Profile<span> Control</span></h3>
        {if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
	                <div class="contact-main w3agile">
                        <div class="col-md-12 contact-left">
				<div id="exTab3" class="container">	
					<ul  class="nav nav-pills nav-tabs nav-justified indigo" role="tablist">
						<li class="active"><a  href="#1b" data-toggle="tab"><i class="fa fa-eye-slash"></i> Password settings</a></a></li>
						<li><a href="#2b" data-toggle="tab"><i class="fa fa-cogs"></i> Payment settings</a></li>
					</ul>

					<div class="tab-content clearfix">
						<div class="tab-pane active" id="1b">
						<p class="validateTips_registar" id="validateTips_registar"></p>
						<input type="hidden" name="uemail" id="uemail" readonly="true" value="{$email}" />.
						<input type="hidden" name="ulogid" id="ulogid" readonly="true" value="{$u_log_id}" />
						
							<p>
								<label class="profile_label" style="width: 30%;">User name*:</label>
								<input type="text" name="uname" id="uname" placeholder="User name:" autocomplete="off" readonly="true" value="{$username}" style="width: 50%;" />
							</p>

							<p>
								<label class="profile_label" style="width: 30%;">Current Password*:</label>
								<input type="password" name="cpassword" id="cpassword" value="" autocomplete="off"  style="width: 50%;" />
							</p>
		
							<p>
								<label class="profile_label" style="width: 30%;">New Password*:</label>
								<input type="password" name="npassword" id="npassword" value="" style="width:50%;" autocomplete="off" />
							</p>
		 
							<button id="butt_login_account" class='button'>Update</button>&nbsp;&nbsp;<button id="butt_clear_account" class='button'>Cancel</button>
						</div>
						<div class="tab-pane" id="2b">
							<div>&nbsp;</div>
          						<p><label class="profile_label">Member ship details:</label> {$glb_plan_details}</p>
							<p><label class="profile_label">Inviation validity:</label> {$glb_plan_exp}</p>
							<div>&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
			</div>

        </div><div>&nbsp;</div>
</div>