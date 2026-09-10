 <!-- content -->
</div></div>
{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script>
<script type="text/javascript" src="includes/scripts/userdefind/fetch_addr_birth.js"></script>
{/literal}
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>


{if $err_status eq 'show'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$err_req_msg}</h3></div>{/if}
{if $alert_status eq '1'}<div style='text-align: center;' id='alert-text-succ'><h3 class='green_succ'>{$alert_msg}</h3></div>{/if}
<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
				<table class="layout-grid" cellspacing="0" cellpadding="0">
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr>{$left_nav_for_wed}
                                        <td style='width: 75%;'>
					<div>
                            <h3>Create your <span>birthday invitation:</span></h3>
				<table class="layout-grid" cellspacing="0" cellpadding="0"> 
				<tr>
				<td class="normal" height="321px;" width="720px;">

				<div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div> 				    
				<form id="birth_account_create" name="birth_account_create" class="form_cls" method="post" action="">
				<p>
				<div class="field">
				<label class='lab_black_color' style="width:200px;">Event title:</label>
				<div><input type="text" id="txt_birth_title" name="txt_birth_title" class="inputval" maxlength="30" value="{$birthaccess_access_2[0].event_title}" autocomplete="off" />
				</div>
				<div class="field"><span><em><font color="red">Example - Birthday party</font></em></span></div>
				<div class="field"><span><em><font color="red">If you dont want title, Just make it as empty.</font></em></span></div>
				</div>
				</p>

				<p>
				<div class="field">
				<label class='lab_black_color' style="width:300px;">Date, Address and Landmark etc,.:</label><br />
				<div><textarea style="height: 100px;" cols="65" id="txt_area_birth_location" name="txt_area_birth_location" rows="15">{$birthaccess_access_2[0].person_event_addr}</textarea>
				</div>
				<div class="field"><span style="cursor:pointer" id='show_weddate_help'><em><font color="red">Click here - Example</font></em></span></div>
				<!-- <div class="field"><span><em><font color="red">Please add landmark if any, it will help your friends/neighbours.</font></em></span></div> -->
				</div>
				</p> 
				
				<input type='hidden' name='lat_birth' id='lat_birth' value='{$birthaccess_access_2[0].gmap_lat}' />
				<input type='hidden' name='lng_birth' id='lng_birth' value='{$birthaccess_access_2[0].gmap_long}' />
				<div><p>
				<label class='lab_black_color' style="width:200px;">Postalcode:</label> 
				<input type="text" id="addr_postcode" name="addr_postcode" class="inputval" value='{$birthaccess_access_2[0].event_postalcode}' autocomplete="off" /> <button class='button1' id='updateMap'>Map it!</button>   
				</p></div>

				<div><p><table><tr><td>
				<label class='lab_black_color' style="width:200px;">Event location:</label></td>
				<td><div id="map_birth" style="width: 300px; height: 300px;"></div></td></tr>
				<tr><td></td><td><input type="checkbox" name="map_birth_status" id="map_birth_status" value="1" {if $birthaccess_access_2[0].event_gmap_status eq '1' } checked {/if}>Yes, Display the map in event page.</td></tr></table>
				</p></div>

				
				<div><p>
				<label class='lab_black_color' style="width:200px;">Event Date:<span class="required">*<span></label> 
				<input type="text" id="bperson_event_date" name="bperson_event_date" class="tcal inputval" maxlength="30" autocomplete="off" value='{$birthaccess_access_2[0].person_event_date}'/>
				<div class="field"><span><em><font color="red">For validating purpose, we need your exact event date.</font></em></span></div>
				</p></div>			 
			
				<div class="demo">
				<input id="butt_invit_step2" type="submit" name="butt_invit_step2" value="Submit" class="button1" />&nbsp;&nbsp;<button  id="butt_clear_web_invit_step2" class="butt_clear_web_invit_step2 button1" type="reset">Clear</button>
				<dd>&nbsp;</dd> 
				</div><!-- End demo -->
				</fieldset>
				</form>

				<div>
                                       </td></tr></table>

                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
