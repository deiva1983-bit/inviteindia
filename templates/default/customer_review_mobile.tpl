<div class="contact" id="login">
        <div class="container">
	 <h3 class="w3layouts_head">Customer <span>Reviews</span></h3>
        {if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
                <div class="contact-main w3agile">
                        <div class="col-md-7 contact-left">
				<div class="flexslider1">
					<ul class="slides">
						{$tpl_cus_reviews}
					</ul>
				</div>

				<div class="w3l_services_footer_top_right">
					{$tpl_cs_reviews_mob}
				</div><div class="text-center">{$pagenation}</div>
                        </div>
                        <div class="col-md-5">
                                <div class="contact-bottom">
                                <h3 class="sub_head">Add your review:</h3>
				<p class="write_para">Please provide us with your feedback or concerns about the services and please let us know if any modules need to be upgraded.</p>
                                        <form id="review" name="signin_form" class="signin_form" method="post" action="customer-review.php">
                                                
						<input type="hidden" name="do" value="reviewadd" />
                                                <p id="validateCR" class="validateCR"></p>
						<label>Name: <span class="required">*</span></label>
                                                <input type="text" name="cus_name" id="cus_name" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
						<label>Location:</label>
                                                <input type="text" name="cus_location" id="cus_location" autocomplete="off"/><span class="hint" id="event_title_hint" ></span>
						<label>Profile picture:</label>
						<input type="file" name="upload_image" id="upload_image" accept="image/*" />
						<input type="hidden" name="uploaded_image" id="uploaded_image" value="" autocomplete="off"/>
						<label>Review: <span class="required">*</span></label>
                                                <textarea id="cus_review" name="cus_review" rows="4" cols="50"></textarea>
						{$capchaImg}
                                                <button id="butt_review" type="submit" class='button'>Submit</button><span class="manage-space"></span><button type="reset" id="butt_reset" class='button'>Clear</button>
                                        </form>
                                </div>
                         </div>
                <div class="clearfix manage-space"></div>
                </div>
        </div>
</div>

<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4 text-center">
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>