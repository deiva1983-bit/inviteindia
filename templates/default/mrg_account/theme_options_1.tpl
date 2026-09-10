 <!-- content -->
</div></div>
{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{/literal}
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>
{if $err_status eq 'show'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$err_req_msg}</h3></div>{/if}

<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
                            <h3>Create your <span>wedding invitation:</span></h3>
                                <div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div>
				
				<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="wed_account_success.php?page=3" enctype="multipart/form-data">

				<p>
				<div class="field">
				<label class='lab_black_color' style="width:200px;">Wedding Date / Time:</label><br />
				<div>
				<textarea style="height: 100px;" cols="65" id="marriage_date" name="marriage_date" rows="15">{$txt_mrg_date}</textarea>
				</div>
				<div class="field"><span><em><font color="red">Ex: March 10, 2014, Between 6.00 pm to 7.30 pm.</font></em></span></div>
				</div>
				</p>

				<p>
				<div class="field">
				<label class='lab_black_color' style="width:200px;">Address:</label><br />
				<div><textarea style="height: 100px;" cols="65" id="txt_area_wed_location" name="txt_area_wed_location" rows="15">{$txt_area_wed_loc}</textarea>
				</div>
				<div class="field"><span><em><font color="red">Give full address with Landmark*</font></em></span></div>
				</div>
				</p>

 


				<input type="checkbox" id="reception_status" name="reception_status" value="1" {$res_chk} /> I want to add Reception Data/Time.

				<div id="reception_infos">
				<p>
				<div class="field">
				<label class='lab_black_color' style="width:200px;">Reception Date /Time:</label> <br />			
				
				<div>
				<textarea style="height: 100px;" cols="65" id="reception_date" name="reception_date" rows="15">{$txt_rec_date}</textarea>
				</div>
				<div class="field"><span><em><font color="red">Ex: March 10, 2014, Between 6.00 pm to 7.30 pm.</font></em></span></div>
				</div>
				</p>
				<input type="checkbox" id="rec_wed_addr_same" name="rec_wed_addr_same" value="1" {$res_addr_same} />Reception address and Marriage address are same.
				<p>
				<div class="field"  id="rec_address_infos">
				<label class='lab_black_color' style="width:200px;">Reception Location:</label><br />
				<div><textarea id="txt_area_rec_location" rows="15" cols="60" name="txt_area_rec_location">{$txt_area_rec_loc}</textarea> 
				</div>
				</div>
				</p>
				</div>					 
				
				<p>
				<div class="field">
				<label class='lab_black_color' style="width:200px;">Wedding/Reception Date:</label>
				<div><input type="text" name="weddate" id="weddate" class="tcal inputval" value="{$txt_weddate}" style="width:165px;"/>
				</div>
				<div class="field"><span><em><font color="red">For validating purpose, We need your exact  wedding/reception date.</font></em></span></div>
				</div>
				</p>
				
				<p>
				<div class="field">
				{$capchaImg}
				</div>
				</p>

				 
			
				<div>
				<button id="butt_create_web_invit_step2" class="button1">Submit (1 of 2)</button>&nbsp;&nbsp;<button  id="butt_clear_web_invit_step2" class="butt_clear_web_invit_step2 button1" type="reset">Clear</button>
				<dd>&nbsp;</dd> 
				</div><!-- End demo -->

				</form>
				
				   
			

                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
