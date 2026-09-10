<div class="contact" id="login">
        <div class="container">
        {if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
                {if $show_login_panel eq 0}
                <div class="contact-main w3agile">
			<div class="sub_head_min text-right" id="activate-signup-label">Are you new user? <a id="activate-signup" class="set-cursor-pointer">Sign up!</a></div>
			<div class="sub_head_min text-right" id="activate-signin-label">Are you return user? <a id="activate-signin" class="set-cursor-pointer">Sign in!</a></div>
                        <div class="col-md-6 contact-left">
                                <div class="contact-bottom" id="signin-win">
                                <h3 class="sub_head">Sign in:</h3>
                                        <form id="signin_form" name="signin_form" class="signin_form" method="post" action="myprofile.php">
                                                <input type="hidden" name="do" value="loginchk" />
                                                <p id="validateTipsLogin"></p>
                                                <input type="text" name="txt_uname" id="txt_uname" value="" placeholder="User name" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
                                                <input type="password" name="txt_pword" id="txt_pword" value="" placeholder="Password" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
                                                <button id="butt_login" type="submit" class='button'>Login</button><span class="manage-space"></span><button type="reset" id="butt_reset" class='button'>Clear</button>
                                        </form>
                                </div>
                                 <div class="contact-bottom" id="fp-win">
                                                <p class="padding-top-adjust"><a id="forget_pass" class="set-cursor-pointer">Forget Username / Password</a></p>
                                                <div id="forget_pass_box" class="padding-top-adjust">
                                                        <p id="fp_sec_validate"></p>
                                                        <p><span class="hint">Please enter your email to get your password:</span></p>
                                                        <input type="text" name="txt_email_fp" id="txt_email_fp" value="" placeholder="Email" class="no-mar" autocomplete="off"/>
                                                        <button id="trigger_fp" class='button'>Submit</button>
                                                </div>
				</div>
                        </div>

                        <div class="col-md-6" id="signup-win">
				<div class="contact-bottom" id="">
					<h3 class="sub_head">New user registration:</h3>
					<form name='register_nw' id='register_nw' onSubmit='return false;' method='post'>
					<p class="validateTips_registar"></p>
					<input type="text" name="name" id="name" placeholder="Name" autocomplete="off"/>
					<input type="password" name="password" id="password" placeholder="Password" autocomplete="off"/>
					<input type="email" name="email" id="email" placeholder="Email" class="no-mar" autocomplete="off"/>
					<button class='button' id="butt_register">Register</button><span class="manage-space"></span><button id="butt_register_clear" type='reset' class='button'>Clear</button>
					</form>
				</div>
			</div>
			<div class="clearfix manage-space"></div>
			<div class="col-md-6">
			<p class="write_para no-margin"><i class="fa fa-check-square" aria-hidden="true"></i>The complete wedding planning platform.</p>
			<p class="write_para no-margin"><i class="fa fa-check-square" aria-hidden="true"></i>Wedding website with your own background image and own background music.</p>
			<p class="write_para no-margin"><i class="fa fa-check-square" aria-hidden="true"></i>Add your unlimited wedding album.</p>
			<p class="write_para no-margin"><i class="fa fa-check-square" aria-hidden="true"></i>Apply your dream wedding cover with colorful animation.</p>
			<p class="write_para no-margin"><i class="fa fa-check-square" aria-hidden="true"></i>Create a new page to describe your special moments (about us, love story, wedding hall parking instructions, etc.).</p>
			<p class="write_para no-margin"><i class="fa fa-check-square" aria-hidden="true"></i>Secure your website with a password.</p>
			</div>
			<div class="clearfix manage-space"></div>
		</div>
                {else}{/if}
        </div>
</div>