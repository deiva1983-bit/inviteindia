 <!-- content -->
 	{literal}
				  <script>
						bkLib.onDomLoaded(function() {
						new nicEditor({maxHeight : 100}).panelInstance('txt_area_location_info');
						});
				</script>
				{/literal}
</div></div>
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
                                                <h3 style='padding: 0px;'>Invitation settings: <span>Add more details about your event locations (Travel details, any landmark etc ,.)</span></h3>
			
			<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="" enctype="multipart/form-data">
			<p><div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div></p>
		        <p>
				<div class='lab_black_color' style='padding: 10px;'>Information about your wedding locations:</div>
				<div><textarea id="txt_area_location_info" name="txt_area_location_info" rows="15" cols="60">{if  $page_status_events eq 'edit'} {$txt_area_wed_info} {else} {$selectwedres_access_3[0].address_details_landmark} {/if}</textarea></div>
				<div><span><em><font color="red">You can specify landmark, Bus/Train facilities etc ,.</font></em></span></div>
				</p>
	
			<p>
			<input id="butt_create_web_invit_step3" type="submit" name="butt_create_web_invit_step3" value="Submit" class="button1" />
			</p><!-- End demo -->
            </form>
			</div>
		</td>
		 
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
