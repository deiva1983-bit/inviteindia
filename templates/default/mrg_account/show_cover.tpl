<div class="contact" id="edit-pers-wedding-cover">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Wedding cover</span></h3>
	 {if $succ_con eq '1'}<div style='padding: 10px;'><span style='float: left;'><a href="#" id="skip_later">Skip, May be Later</a></span> <span style='float: right; padding-right: 20px;'><a href="#" id="add_add_gmap">Add address in Google MAP >> Next</a></span></div>{/if}

		<form id='create_wedding-cover' name='' method='post' action='' onsubmit="return false;">
		<input type="hidden" id="wed_id" name="wed_id" class="inputval"  value="{$tmplwedid}" />
		<input type="hidden" id="hidd_sub_tit" name="hidd_sub_tit" class="inputval"  value="insert_tit" />

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own wedding cover</span></h2>
				<p><span><i class="glyphicon glyphicon-certificate" aria-hidden="true"></i></span></p>
				</div>
				<div id="succval_del" class="alert green_succ succval" role='alert' style="display:none;">Your Wedding cover successfully removed.</div>
				{if $blockpage eq '1'}<div>&nbsp;</div><div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
						<div class="contact-bottom">
				                       {if $succ_con eq '1'}
                                                        <div class="floatLeft1">
                                                        <div id="sliderFrame2">
                                                            <succ id="succval" class="succval"><img src="images/028.gif" style="width: 330px; height: 150px;"/></succ>
                                                            <div id="links_green" style="padding-top: 10px; font :2.1em Lucida Calligraphy,Arial,Verdana,sans-serif"><b>Your wedding invitation successfully created. </b></div>
                                                            <div id="links_green" style="padding-top: 10px; font :2.1em Lucida Calligraphy,Arial,Verdana,sans-serif"><b>Wedding URL: </b> <a style="padding-left: 30px;" target="_new" href="{$glb_site_url}{$glb_rewrite_url}"><b>{$glb_rewrite_url}</b></a></div>
                                                            <div id="links_green" style="padding-top: 10px; color: red;"><b>Your wedding invitations almost done, and here you can add wedding cover.</b></div>
                                                            </div>
                                                        </div>
                                                        {/if}

							
							 <div><!-- startttt -->
							    <input type="hidden" value="{$succ_con}" id="wed_succ_con" name="wed_succ_con" />
							    <input type="hidden" value="{$wed_acc_id}" id="wed_accid" name="wed_accid" />
							    <div class="div2" {if $succ_con eq '1'} style="background-color:white;padding:31px 0 50px 20px;" {else} style="background-color:white;padding:0px 0 50px 20px;" {/if}>
								<div class="floatLeft"><div id="mcts1">{$imgslide}</div></div>
								<div class="floatLeft"><div id="sliderFrame"><div id="slider">{$imgslide_banners}</div></div>
							    </div>
							    <div style="clear:both;"></div>  
							    <div style="display:none;"><div id="slideshow-1">
								<h3><!-- Red with Heart --> </h3>
								<!-- This demo shows how the jQuery slideshow (or Thumbnail Slider if using the pure JavaScript) can work together with the JavaScript Image Slider. -->
								</div>
							    <div id="slideshow-2"></div>
							    <div id="slideshow-3"></div>
							</div> 
						    </div>
						    </div> <!-- Enddddd -->

                                                {if $blockpage neq '1'}<div> <button id="select_cover_butt" name="select_cover_butt"  class='button'>Select Cover</button> {if $animate_cover neq '0'}<button id="remove_cover_butt" name="remove_cover_butt" class='button' >Remove Cover</button>{/if}</div>{/if}
						</form>
					</div>
				<div class="clearfix"> </div>
		</div>
		</form>

	</div>
</div>