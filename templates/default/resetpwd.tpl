<div class="contact" id="login">
        <div class="container">
        {if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
                {if $show_login_panel eq 0}
                <div class="contact-main w3agile">
                        <div class="col-md-6 contact-left">
                        <p class="write_para"><img src="static/images/wedding-registration.jpg" class="img-thumbnail" alt="wedding website registration"></p>
                        </div>
                        <div class="col-md-6">
                                <div class="contact-bottom" id="signin-win">
                                <h3 class="sub_head">Reset your password:</h3>
					{if $tpl_pageallow eq 1}
                                        <form id="form_reset_pwd" name="form_reset_pwd" class="form_reset_pwd" method="post">
                                                <input type="hidden" name="do" value="resetpw" />
						<input type="hidden" name="secode" value="{$tpl_secode}" />
						<input type="hidden" name="tpuid" id = "tpuid" value="{$tpl_uid}" />
                                                <p name="validateTips_resetpwd" id="validateTips_resetpwd"></p> 
                                                <input type="password" name="txt_new_pword" id="txt_new_pword" value="" placeholder="New Password:" autocomplete="off"/>
                                                <input type="password" name="txt_new_pword_again" id="txt_new_pword_again" value="" placeholder="Password again:" autocomplete="off"/>
                                                <button id="butt_reset_pwd" class='button' type="submit">Reset password</button><span class="manage-space"></span><button type="reset" id="butt_reset" class='button'>Clear</button>
					</form>
					{else if $tpl_pageallow eq 2}
						
					{else}
						
					{/if}
                                </div>
			</div>
                <div class="clearfix manage-space"></div>
                </div>
                {else}{/if}
        </div>
</div>