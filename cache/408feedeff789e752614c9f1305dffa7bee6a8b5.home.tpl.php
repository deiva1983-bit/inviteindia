<?php
/* Smarty version 3.1.32, created on 2018-07-08 17:42:46
  from '/home/mrr88m9rhudj/public_html/inviteindia.com/templates/default/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b424d16e3b086_31464708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f6b86079eeb2448f845ff8a2e4df8ed11994b9d' => 
    array (
      0 => '/home/mrr88m9rhudj/public_html/inviteindia.com/templates/default/home.tpl',
      1 => 1515894708,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5b424d16e3b086_31464708 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contact" id="login">
        <div class="container">
        <h3 class="w3layouts_head">Account<span> Management</span></h3>
                                        <div class="contact-main w3agile">
                        <div class="col-md-6 contact-left">
                        <div class="contact-bottom">
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
                        <div class="col-md-6">
                                <div class="contact-bottom">
                                <h3 class="sub_head">Login your account:</h3>
                                        <form id="signin_form" name="signin_form" class="signin_form" method="post" action="myprofile.php">
                                                <input type="hidden" name="do" value="loginchk" />
                                                <p id="validateTipsLogin"></p>
                                                <input type="text" name="txt_uname" id="txt_uname" value="" placeholder="User name" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
                                                <input type="password" name="txt_pword" id="txt_pword" value="" placeholder="Password" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
                                                <button id="butt_login" type="submit" class='button'>Login</button><span class="manage-space"></span><button type="reset" id="butt_reset" class='button'>Clear</button>
                                        </form>
                                         </div>
                                         <div class="contact-bottom">
                                                <p class="padding-top-adjust"><a id="forget_pass" class="set-cursor-pointer">Forget Username / Password</a></p>
                                                <div id="forget_pass_box" class="padding-top-adjust">
                                                        <p id="fp_sec_validate"></p>
                                                        <p><span class="hint">Please enter your email to get your password:</span></p>
                                                        <input type="text" name="txt_email_fp" id="txt_email_fp" value="" placeholder="Email" class="no-mar" autocomplete="off"/>
                                                        <button id="trigger_fp" class='button'>Submit</button>
                                                </div>

                                </div>
                                </div>
                <div class="clearfix manage-space"></div>
                </div>
                        </div>
</div><?php }
}
