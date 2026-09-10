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
	<h3 class="w3layouts_head">Wedding ceremony details</h3>
	<div class="col-md-12 text-center">
	<ul class="agileits_social_list">
		<li style="padding: 10px;"><a href="personal-details.php" class="{if $gnav_personal_class neq ''} {$gnav_personal_class} {else} active {/if}" id="wed_register"><span>Personal Information</span></a></li>
		<li style="padding: 10px;"><a href="general-information.php" class="{if $gnav_general_class neq ''} {$gnav_general_class} {else} in-active {/if}" id="wed_register">General Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=w" class="{if $gnav_ceremony_class neq ''} {$gnav_ceremony_class} {else} in-active {/if}" id="wed_register">Wedding Information</a></li>
		<li style="padding: 10px;"><a href="event-details.php?gnav_req=r" class="{if $gnav_reception_class neq ''} {$gnav_reception_class} {else} in-active {/if}" id="wed_register">Reception Information</a></li>
	</ul>
	</div>

		<form id="form_wed_details" name="form_wed_details" class="form_cls" method="post" action="event-details.php" enctype="multipart/form-data">
		<input type='hidden' name='lat_ceremony' id='lat_ceremony' value='{if $smarty.session.ceremony_lat neq ''}{$smarty.session.ceremony_lat}{elseif $lat_ceremony neq ''}{$lat_ceremony}{/if}' />
		<input type='hidden' name='lng_ceremony' id='lng_ceremony' value='{if $smarty.session.ceremony_lng neq ''}{$smarty.session.ceremony_lng}{elseif $lng_ceremony neq ''}{$lng_ceremony}{/if}' />
		<input type="hidden" name="frm_req" id="frm_req" value="c" />
		<div class="contact-main w3agile bg-rep1" style="margin: 0px;">
			{if $show_err eq '1'}<div class="col-md-12 text-center" style="padding-top: 10px;"><div class="alert ui-state-error" role='alert'>{$error_message}</div></div>{/if}
			{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
		<div class="col-md-12 text-center">&nbsp;</div>
			<div class="col-md-7 contact-left">
			  <div class="contact-bottom">
			  		<div><p>
						<label class='lab_black_color' style="width:200px;">Ceremony title: </label> 
						<input type="text" id="txt_wed_title" name="txt_wed_title" maxlength="30" autocomplete="off" value="{if $smarty.session.ceremony_title neq ''}{$smarty.session.ceremony_title}{elseif $txt_wed_title neq ''}{$txt_wed_title}{else} Wedding party{/if}"/> 
					</p></div>
					<!-- <div class="field"><span><em><font color="red">Example - Wedding party</font></em></span></div> -->
					<div class="field"><span><em><font color="red">If you don't want a title, simply leave it blank.</font></em></span></div>
			  		
					<div><p>
						<label class='lab_black_color' style="width:200px;">Ceremony Date & Address:<span class="required">*<span></label> 
						<textarea style="height: 100px;" cols="65" id="txt_area_wed_location" name="txt_area_wed_location" rows="25">{if $smarty.session.ceremony_mrg_location neq ''}{$smarty.session.ceremony_mrg_location}{/if}</textarea>
					</p></div>
					<!-- <div class="field"><span style="cursor:pointer" id='show_weddate_help' data-toggle="modal" data-target="#wedd_help"><em><font color="red">Click here - Example</font></em></span></div> -->
					<div><p> &nbsp; </p></div>
					<div><p>
						<label class='lab_black_color' style="width:200px;">Postalcode:<span class="required">*<span></label> 
						<input type="text" id="addr_postcode" name="addr_postcode" maxlength="30" autocomplete="off" value="{if $smarty.session.ceremony_postcode neq ''}{$smarty.session.ceremony_postcode}{elseif $addr_postcode neq ''}{$addr_postcode}{/if}"/>
					</p></div>
					<button class='button' id='updateMap'>Map my postal code <span><i class="fa fa-map-marker" aria-hidden="true"></i></span></button>

			  </div>
			 </div>
			 <div class="col-md-5">
				<h3 class="sub_head">Ceremony informations:</h3>
			 	<div id="map_ceremony" style="width: 300px; height: 300px;"></div>
				<div class="field"><input type="checkbox" name="map_wedding_status" id="map_wedding_status" {if $smarty.session.ceremony_map_sts eq ''} value="0" {elseif $smarty.session.ceremony_map_sts eq '0'} value="1" checked {else} value="1" checked {/if}> Yes, Display the map on the event page.</div>
			 </div>
		   <div class="clearfix"> </div>
		</div>
		<div class="col-md-12 text-left bg-rep3">
				<div class="field">
					<label><input type="radio" name="chk_wedding_status" value="1" {if $smarty.session.marriage_status eq ''} checked {elseif $smarty.session.marriage_status eq '1'} checked {/if}> Yes, I'd like to provide information about the wedding.</label><br>
					<label><input type="radio" name="chk_wedding_status" value="0" {if $smarty.session.marriage_status eq '0'} checked {/if}> I don't want to include wedding details; I only need information about the reception.</label>
			<!--	<input type="checkbox" name="chk_wedding_status" id="chk_wedding_status" {if $smarty.session.marriage_status eq ''} value="0" {elseif $smarty.session.marriage_status eq '0'} value="1" checked {else} value="1" checked {/if}>Yes, I want to add wedding details.</div> -->
		</div> </div>
		

                <div class="col-md-12 text-center bg-rep3" style="position: sticky; position: -webkit-sticky;">
			<button id="frm_wedding_info" name="frm_wedding_info" class="button">Submit (3 of 4)</button><span>&nbsp;<span><button  id="butt_clear_web_invit_step2" class="butt_clear_web_invit_step2 button" type="reset">Clear</button>
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
