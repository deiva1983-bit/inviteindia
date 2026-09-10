{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script>
<script type="text/javascript" src="includes/scripts/userdefind/fetch_address.js"></script>
{/literal}
<!-- content -->
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
<style type="text/css">
{literal}
#ui-datepicker-div, .ui-datepicker{ font-size: 80%; }
{/literal}
</style>

<div class="contact" id="create-website" style="padding: 0px;">
	<div class="container">
	<h3 class="w3layouts_head">Reception Details</span></h3>
	<div class="col-md-12 text-center">
	<ul class="agileits_social_list">
		<li style="padding: 10px;"><a href="personal-details.php" class="{if $gnav_personal_class neq ''} {$gnav_personal_class} {else} active {/if}" id="wed_register"><span>Personal Information</span></a></li>
		<li style="padding: 10px;"><a href="general-information.php" class="{if $gnav_general_class neq ''} {$gnav_general_class} {else} in-active {/if}" id="wed_register">General Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=w" class="{if $gnav_ceremony_class neq ''} {$gnav_ceremony_class} {else} in-active {/if}" id="wed_register">Wedding Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=r" class="{if $gnav_reception_class neq ''} {$gnav_reception_class} {else} in-active {/if}" id="wed_register">Reception Information</a></li>
	</ul>
	</div>
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="event-details.php" enctype="multipart/form-data">
		<input type='hidden' name='lat_reception' id='lat_reception' value='{if $lat_recp neq ''} {$lat_recp} {/if}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{if $lng_recp neq ''} {$lng_recp} {/if}' />
		<input type="hidden" name="frm_req" id="frm_req" value="r" />
		<div class="contact-main w3agile bg-rep1" style="margin: 0px;">
			<div class="col-md-12 text-center bg-rep3">
				{if $show_err eq '1'}<div class="col-md-12 text-center" style="padding-top: 10px;"><div class="alert ui-state-error" role='alert'>{$error_message}</div></div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
			</div>
			<div class="col-md-7 contact-left">
			  <div class="contact-bottom">
			  		<div><p>
						<label class='lab_black_color' style="width:200px;">Reception title:<span class="required">*<span></label> 
						<input type="text" id="txt_rec_title" name="txt_rec_title" maxlength="30" autocomplete="off" value="{if $txt_recp_title neq ''} {$txt_recp_title} {else} Reception party {/if}"/> 
					</p></div>
					<div class="field"><span><em><font color="red">If you don't want a title, simply leave it blank.</font></em></span></div>
			  		
					<div><p>
						<label class='lab_black_color' style="width:200px;">Reception Date & Address:<span class="required">*<span></label> 
						<textarea style="height: 100px;" cols="65" id="txt_area_rec_location" name="txt_area_rec_location" rows="15">{$txt_area_rec_loc}</textarea>
					</p></div>
					<!--  <div class="field"><span style="cursor:pointer" id='show_rec_help' data-toggle="modal" data-target="#rec_help"><em><font color="red">Click here - Example</font></em></span></div>
					<div class="agileits_w3layouts_learn_more agileits_learn_more hvr-radial-out">
						<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
					</div> -->
					<div><p> &nbsp; </p></div>
					<div><p>
						<label class='lab_black_color' style="width:200px;">Postal code:<span class="required">*<span></label> 
						<input type="text" id="addr_postcode_reception" name="addr_postcode_reception" maxlength="30" autocomplete="off" value="{if $addr_postcode_recp neq ''} {$addr_postcode_recp} {/if}"/> 
					</p></div>
					<button class='button' id='updateMap_reception'>Map my postal code <span><i class="fa fa-map-marker" aria-hidden="true"></i></span></button>
			  </div>
			 </div>
			 <div class="col-md-5">
				<h3 class="sub_head">Reception location:</h3>
			 	<div id="map_reception" style="width: 300px; height: 300px;"></div>
				<div class="field"><input type="checkbox" name="map_rec_status" id="map_rec_status" value="1" checked> Yes, Display the map in the event page.</div>
			 </div>
		   <div class="clearfix"> </div>
		</div>
		<div class="col-md-12 text-left bg-rep3">
				<div class="field">
					<label><input type="radio" name="chk_reception_status" value="1" checked> Yes, I'd like to provide information about the wedding.</label><br>
					<label><input type="radio" name="chk_reception_status" value="0"> I don't want to include wedding details; I only need information about the reception.</label>
			<!--	<div class="field"><input type="checkbox" name="chk_reception_status" id="chk_reception_status" value="1" 
				checked>Yes, I want to add reception details.</div>  -->
		</div> </div>
                <div class="col-md-12 text-center bg-rep3">
			<button id="frm_reception_info" class="button">Submit (4 of 4)</button><span>&nbsp;<span><button  id="butt_clear_web_invit_step2" class="butt_clear_web_invit_step2 button" type="reset">Clear</button>
                </div>



		</form>

	</div>
</div>
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="rec_help" tabindex="-1" role="dialog" aria-labelledby="rec_help">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Reception Date & Address
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<!-- <img src="images/5.jpg" alt=" " class="img-responsive" /> -->
							<p>
								<font color="#990033" size="3" face="comic sans ms"><b>15th July, 2015 - 6.00 pm to 8.00 pm
								</b></font><font color="#990033"><br><br></font><font size="4"><b><font color="#990033">Hotel Shankshi</font><br><br>No. 1, GST Road,<br><br>St. Thomas Mount, <br><br>Chennai, <br><br>Tamil Nadu, <br><br>India</b></font>.<br><br><font size="4"><b>Near Chennai airport.</b></font>
							</p>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->