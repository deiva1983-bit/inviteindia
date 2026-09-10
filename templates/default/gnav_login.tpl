<div class="contact" id="login">
        <div class="container">
                {if $show_login_panel eq 0}
                <div class="contact-main">
                        <div class="col-md-6">
                        <div class="sub_head_min text-right" id="activate-signup-label">Don't have an account? <a id="activate-signup" class="set-cursor-pointer">Register!</a></div>
                        <div class="sub_head_min text-right" id="activate-signin-label">Are you return user? <a id="activate-signin" class="set-cursor-pointer">Sign in!</a></div>
                        <div id="validateTipsLogin" class="style: none;"></div>
                                <div class="contact-bottom" id="signin-win">
                                <form name='login_nw' id='login_nw' onSubmit='return false;' method='post'>
                                <h3 class="sub_head">Sign in:</h3>
                                                <input type="hidden" name="do" id="do" value="loginchk" />
                                                <input type="text" name="txt_uname" id="txt_uname" value="" placeholder="Email or User name" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
                                                <input type="password" name="txt_pword" id="txt_pword" value="" placeholder="Password" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
                                                <button id="butt_login" type="submit" class='button'>Login</button><span class="manage-space"></span><button type="reset" id="butt_reset" class='button'>Clear</button>
                                                <div class="sub_head_min text-right"><a id="forget_pass" class="set-cursor-pointer">Forget password</a></div>
                                </div>
                                </form>
                                <div id="forget_pass_box">Please enter email to get your password:
                                        <input type="text" name="txt_email_fp" id="txt_email_fp" value="" placeholder="Email" class="no-mar" autocomplete="off"/>
                                        <button id="trigger_fp" class='button'>Submit</button>
                                </div>
                                <div class="contact-bottom" id="signup-win">
                                <h3 class="sub_head">New user registration:</h3>
                                <form name='register_nw' id='register_nw' onSubmit='return false;' method='post'>
                                <input type="text" name="name" id="name" placeholder="User name" autocomplete="off"/>
                                <input type="email" name="email" id="email" placeholder="Email" class="no-mar" autocomplete="off"/>
                                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"/>
                                <button class='button' id="butt_register">Register</button><span class="manage-space"></span><button id="butt_register_clear" type='reset' class='button'>Clear</button>
                                </form>
                                </div>
                        </div>
                <div class="clearfix manage-space"></div>
                </div>
                {else}{/if}
        </div>
</div>