{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
{/literal}
 <!-- content -->
 <link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>
<!-- contact -->

<div class="contact" id="create-website" style="padding: 0px;">
    <div class="container">
        <h3 class="w3layouts_head">Personal Informations</h3>
	<div class="col-md-12 text-center">
	<ul class="agileits_social_list">
		<li style="padding: 10px;"><a href="personal-details.php" class="{if $gnav_personal_class neq ''} {$gnav_personal_class} {else} active {/if}" id="wed_register"><span>Personal Information</span></a></li>
		<li style="padding: 10px;"><a href="general-information.php" class="{if $gnav_general_class neq ''} {$gnav_general_class} {else} in-active {/if}" id="wed_register">General Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=w" class="{if $gnav_ceremony_class neq ''} {$gnav_ceremony_class} {else} in-active {/if}" id="wed_register">Wedding Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=r" class="{if $gnav_reception_class neq ''} {$gnav_reception_class} {else} in-active {/if}" id="wed_register">Reception Information</a></li>
	</ul>
	</div>
        <!-- Commmon Errors - Start -->
        {if $show_err eq '1'}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
        {if $show_succ eq '1'}<div class="text-center"><h4 class='green_succ'>{$succ_msg}</h4></div>{/if}
        <!-- Commmon Errors - End -->
        <form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="general-information.php">
        <input type="hidden" name="theme_id" id="theme_id" value="1"/>
	<input type="hidden" name="page_error_status" id="" value="{$show_err}"/>
	<input type="hidden" name="frm_req" id="frm_req" value="p" />
            <div class="contact-main w3agile" style="margin: 0px;">
			
		<div class="col-md-12 text-center" style="display:none;" id="validateTips_div"><div id="validateTips" class="alert validateTips" role='alert' style="margin-top: 10px;"></div></div>
		
                <div class="col-md-12 contact-left bg-rep1">
                    <div class="col-md-6 contact-left">
                        <div class="contact-bottom">
                            <div class="w3layouts_header">
                                <h2 class="sub_head_max">Groom's <span> information</span></h2>
                                <p><span><i class="fa fa-male" aria-hidden="true"></i></span></p>
                            </div>
                            <div><p>
                                <label class='lab_black_color' style="width:200px;">Groom's name:<span class="required">*<span></label> 
                                <input type="text" id="txt_grooms_name" name="txt_grooms_name" maxlength="30" autocomplete="off" value="{if $smarty.session.grooms_name neq ''} {$smarty.session.grooms_name} {/if}" />
                            </p></div>
                            <div><p>
                                <label class='lab_black_color' style="width:200px;">Date of birth:</label> 
                                <input type="text" id="grooms_dob" name="grooms_dob" class="tcal" maxlength="30" autocomplete="off"  value="{if $smarty.session.grooms_dob neq ''} {$smarty.session.grooms_dob} {/if}" />
                            </p></div>
                        </div>
                    </div>
                    <div class="col-md-6 contact-left">
                        <div class="contact-bottom">
                            <div class="w3layouts_header">
                                <h2 class="sub_head_max">Bride's <span> information</span></h2>
                                <p><span><i class="fa fa-female" aria-hidden="true"></i></span></p>
                            </div>
                            <div><p>
                                <label class='lab_black_color' style="width:200px;">Bride's name:<span class="required">*<span></label> 
                                <input type="text" id="txt_brides_name" name="txt_brides_name" maxlength="30" autocomplete="off" value="{if $smarty.session.brides_name neq ''} {$smarty.session.brides_name} {/if}"/> 
                            </p></div>
                            <div><p>
                                <label class='lab_black_color' style="width:200px;">Date of birth:</label> 
                                <input type="text" id="bride_dob" name="bride_dob" class="tcal" maxlength="30" autocomplete="off" value="{if $smarty.session.brides_dob neq ''} {$smarty.session.brides_dob} {/if}"/>
                            </p></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 text-center bg-rep3">
                        <button id="butt_create_web_invit" class="button">Submit (1 of 4)</button><span>&nbsp;<span><button  id="butt_clear_web_invit" class="butt_clear_web_invit button" type="reset">Clear</button>
                </div>
            </div>
                    
        </div> 
        </form>
    </div><div>&nbsp;</div>
</div>