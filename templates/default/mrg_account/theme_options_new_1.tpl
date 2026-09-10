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

<div class="contact" id="create-website">
	<div class="container">
	<h3 class="w3layouts_head">Create your<span> wedding invitation</span></h3>
	{if $err_status eq 'show'}<div class="alert ui-state-error" role='alert'>{$err_req_msg}</div>{/if}
	{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="wedaccountsuccess.php?page=3" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{$txt_req_lat_ceremony}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{$txt_req_lng_ceremony}' />
		<input type='hidden' name='lat_reception' id='lat_reception' value='{$txt_req_lat_reception}' />
		<input type='hidden' name='lng_reception' id='lng_reception' value='{$txt_req_lng_reception}' />
		<div class="col-md-12 contact-left">
		<div class="w3layouts_header">
		<h2 class="sub_head_max">Ceremony <span> informations</span></h2>
		<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></p>
		</div>
		<div id="validateTips" class="alert validateTips" role='alert'></div>
		</div>

		<div class="contact-main w3agile bg-rep1">
			<div class="col-md-7 contact-left">
			  <div class="contact-bottom">
			  		<div><p>
						<label class='lab_black_color' style="width:200px;">Ceremony title:<span class="required">*<span></label> 
						<input type="text" id="txt_wed_title" name="txt_wed_title" maxlength="30" autocomplete="off" value="Wedding party"/> 
					</p></div>
					<div class="field"><span><em><font color="red">Example - Wedding party</font></em></span></div>
					<div class="field"><span><em><font color="red">If you don't want title, Just make it as empty.</font></em></span></div>
			  		
					<div><p>
						<label class='lab_black_color' style="width:200px;">Ceremony Date & Address:<span class="required">*<span></label> 
						<textarea style="height: 100px;" cols="65" id="txt_area_wed_location" name="txt_area_wed_location" rows="15">{$txt_area_wed_loc}</textarea>
					</p></div>
					<div class="field"><span style="cursor:pointer" id='show_weddate_help' data-toggle="modal" data-target="#wedd_help"><em><font color="red">Click here - Example</font></em></span></div>

					<div><p>
						<label class='lab_black_color' style="width:200px;">Postalcode:<span class="required">*<span></label> 
						<input type="text" id="addr_postcode" name="addr_postcode" maxlength="30" autocomplete="off" value="{$txt_req_addr_postcode}"/> 
					</p></div>
					<button class='button' id='updateMap'>Map it!</button>

			  </div>
			 </div>
			 <div class="col-md-5">
				<h3 class="sub_head">Ceremony informations:</h3>
			 	<div id="map_ceremony" style="width: 300px; height: 300px;"></div>
				<div class="field"><input type="checkbox" name="map_wedding_status" id="map_wedding_status" value="1" checked>Yes, Display the map in event page.</div>
			 </div>
		   <div class="clearfix"> </div>
		</div>
		
		<div class="col-md-12 contact-left bg-rep3">
		<div class="w3layouts_header">
		<h2 class="sub_head_max">Reception<span> informations</span></h2>
		<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></p>
		</div>
		<div id="validateTips" class="validateTips" style='padding-bottom: 5px;'></div>
		</div>
		<div class="contact-main w3agile bg-rep1">
			<div class="col-md-7 contact-left">
			  <div class="contact-bottom">
			  		<div><p>
						<label class='lab_black_color' style="width:200px;">Reception title:<span class="required">*<span></label> 
						<input type="text" id="txt_rec_title" name="txt_rec_title" maxlength="30" autocomplete="off" value="Reception party"/> 
					</p></div>
					<div class="field"><span><em><font color="red">Example - Reception</font></em></span></div>
					<div class="field"><span><em><font color="red">If you don't want title, Just make it as empty.</font></em></span></div>
			  		
					<div><p>
						<label class='lab_black_color' style="width:200px;">Reception Date & Address:<span class="required">*<span></label> 
						<textarea style="height: 100px;" cols="65" id="txt_area_rec_location" name="txt_area_rec_location" rows="15">{$txt_area_rec_loc}</textarea>
					</p></div>
					<div class="field"><span style="cursor:pointer" id='show_rec_help' data-toggle="modal" data-target="#rec_help"><em><font color="red">Click here - Example</font></em></span></div>
					<!-- <div class="agileits_w3layouts_learn_more agileits_learn_more hvr-radial-out">
						<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
					</div> -->

					<div><p>
						<label class='lab_black_color' style="width:200px;">Postalcode:<span class="required">*<span></label> 
						<input type="text" id="addr_postcode_reception" name="addr_postcode_reception" maxlength="30" autocomplete="off" value="{$txt_req_addr_postcode_reception}"/> 
					</p></div>
					<button class='button' id='updateMap_reception'>Map it!</button>
			  </div>
			 </div>
			 <div class="col-md-5">
				<h3 class="sub_head">Reception location:</h3>
			 	<div id="map_reception" style="width: 300px; height: 300px;"></div>
				<div class="field"><input type="checkbox" name="map_rec_status" id="map_rec_status" value="1" checked>Yes, Display the map in event page.</div>
			 </div>
		   <div class="clearfix"> </div>
		</div>

		<div class="col-md-12 contact-left bg-rep3">
		<h3 class="sub_head">General informations:</h3>
		<div class="col-md-6">
			<div><p>
				<label class='lab_black_color' style="width:200px;">Wedding/Reception Date:<span class="required">*<span></label> 
				<input type="text" id="weddate" name="weddate" maxlength="30" autocomplete="off" value="{$txt_weddate}" class="tcal inputval"/> 
			</p>
			</div>
			<div class="field"><span><em><font color="red">For validating purpose, We need your exact  wedding/reception date.</font></em></span></div>

		</div>

		<div class="col-md-6">
				<div class="field">
				{$capchaImg}
				</div>
		</div>
		</div>
		<div class="col-md-12 contact-left bg-rep3">
		<button id="butt_create_web_invit_step2" class="button">Submit</button>&nbsp;&nbsp;<button  id="butt_clear_web_invit_step2" class="butt_clear_web_invit_step2 button" type="reset">Clear</button>
		</div>
		</form>

	</div>
</div>


<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="wedd_help" tabindex="-1" role="dialog" aria-labelledby="wedd_help">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Ceremony Date & Address
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<!-- <img src="images/5.jpg" alt=" " class="img-responsive" /> -->
							<p>
							<font color="#990033" size="3" face="comic sans ms"><b>10th July, 2015 - 6.00 am to 7.30 am
							</b></font><font color="#990033"><br><br></font><font size="4"><b><font color="#990033">Sri annai mahal</font><br><br>Medavakkam Main Road<br><br>Kovilambakkam, <br><br>Tamil Nadu, <br><br>India</b></font>.<br><br><font size="4"><b>Near Medavakkam police station.</b></font>
							</p>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->

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