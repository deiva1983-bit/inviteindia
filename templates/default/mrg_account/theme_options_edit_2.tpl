 <!-- content -->
{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{/literal}
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
</div></div>
{if $err_status eq 'show'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$err_req_msg}</h3></div>{/if}
{if $alert_msg neq ''}<div style='text-align: center;' id='alert-text-succ'><h3 class='green_succ'>{$alert_msg}</h3></div>{/if}
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
                                                <h3 style='padding: 0px;'>Invitation settings: <span>Event Details</span></h3>
                                                    <form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="" enctype="multipart/form-data"><p><div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div></p>
                                                        <p>
                                                        <div class="field">
                                                        <label class='lab_black_color' style="width:250px;">Marriage Date / Time:</label><br /><br />
                                                            <div><textarea style="height: 100px;" cols="65" id="marriage_date" name="marriage_date" rows="15">{if $page_status_events eq 'edit'} {$txt_mrg_date} {else} {$selectwedres_access_2[0].marriage_date} {/if}</textarea></div>
                                                            <div class="field"><span><em><font color="red">Ex: March 10, 2014, Between 6.00 pm to 7.30 pm.</font></em></span></div>
                                                        </div>
                                                        </p>

                                                        <p>
                                                        <div class="field">
                                                        <label class='lab_black_color' style="width:250px;">Address:</label><br /><br />
                                                            <div><textarea style="height: 100px;" cols="65" id="txt_area_wed_location" name="txt_area_wed_location" rows="15">{if $page_status_events eq 'edit'} {$txt_area_wed_loc} {else} {$selectwedres_access_2[0].marriage_location} {/if}</textarea></div>
                                                            <div class="field"><span><em><font color="red">Give full address with Landmark*</font></em></span></div>
                                                        </div>
                                                        </p>

                                                         
                                                        {if $res_chk eq 1}
                                                        <input type="checkbox" id="reception_status" name="reception_status" value="1" checked="true" /> I want to add Reception Data/Time.
                                                        {else}
                                                        <input type="checkbox" id="reception_status" name="reception_status" value="1"  /> I want to add Reception Data/Time.
                                                        {/if}

                                                        <div id="reception_infos" >
                                                        <p>
                                                        <div class="field">
                                                        <label class='lab_black_color' style="width:250px;">Reception Date /Time: </label><br /><br />
                                                            <div class="example-container">
                                                            <textarea style="height: 100px;" cols="65" id="reception_date" name="reception_date" rows="15">{if $page_status_events eq 'edit'} {$txt_rec_date} {else} {$selectwedres_access_2[0].reception_date} {/if}</textarea>
                                                            </div>
                                                            <div class="field"><span><em><font color="red">Ex: March 10, 2014, Between 6.00 pm to 7.30 pm.</font></em></span></div>
                                                        </div>
                                                        </p>

                                                        <input type="checkbox" id="rec_wed_addr_same" name="rec_wed_addr_same" value="1" {$res_addr_same} />&nbsp; Reception address and Marriage address are same.
                                                        <p>
                                                            <div class="field"  id="rec_address_infos">
                                                            <label class='lab_black_color' style="width:250px;">Reception Location:</label><br /><br />
                                                                <div><textarea id="txt_area_rec_location" rows="15" style="height: 100px;" cols="65" name="txt_area_rec_location">{if  $page_status_events eq 'edit'} {$txt_area_rec_loc} {else} {$selectwedres_access_2[0].reception_location} {/if}</textarea></div>
                                                            </div>
                                                        </p>
                                                        </div>
                                                         
                                                        <p>
                                                        <div class="field">
                                                        <label class='lab_black_color' style="width:250px;">Wedding/Reception Date:</label>
                                                            <div><input type="text" name="weddate" id="weddate" class="tcal inputval" value="{if  $page_status_events eq 'edit'} {$weddate_only} {else} {$selectwedres_access_2[0].marriage_date_only} {/if}" style="width:165px;" autocomplete="off" /></div>
                                                            <div class="field"><span><em><font color="red">For validating purpose, We need your exact  wedding/reception date.</font></em></span></div>
                                                        </div>
                                                        </p>

                                                    <div>
                                                    <input id="butt_create_web_invit_step2" name="butt_create_web_invit_step2" value="Submit" type="submit" class="button1" />
                                                    </div><!-- End demo -->
                                                                </form>
			 
			</div>
		</td>
		 
		<!--  
		<td class="normal" style='width: 25%;'> 
	
		</td> -->
		 
 
		
	</tr>
	</table>

                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
