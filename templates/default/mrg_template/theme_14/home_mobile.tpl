<!-- banner-bottom --></div>
<div class="banner-bottom">
<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />

<div class="bottom-header red_bg">
							    <div class="lovestory_bottom_parallax lovestory_bottom_parallax_green" id="email">
								<div class="lovestory_bottom_bg" style="padding-top: 10px;">
								{if $glb_pageheading neq ''}
									<h1 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$glb_pageheading}</h1>
									<div class="devider_main text-center"><img src="{$glb_img_urls}images/devider-gray.jpg" alt=""></div>
								{/if}
								
								<div class="col-md-12 text-center ">
									<p class="big-text animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">
										{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} 
											<div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> 
										{/if}
										<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if}><div>{$glb_kural}</div></div>
									</p>
								 </div>
							
							
								{if $glb_home_img_status eq '1'}
								<div class="latest_sermons">
								    <div class="col-md-6 text-center groom">
									<div class="img"><img alt="" src="{$glb_homeimg}" width="300px" class="home_img" /></div>
								    </div>
								    <div class="col-md-6 text-center bride">
									{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
									<p>{$glb_des_brieff}</p>
								    </div>
								   </div>
								{else}
									<div class="latest_sermons">
									    <div class="col-md-6 text-center groom">
										<div class="img"><img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" /></div>		
									    </div>
									    <div class="col-md-6 text-center bride">
										<div class="img"><img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" /></div>
									    </div>
									</div>	
								
									<div class="col-md-12 text-center ">
										{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
										<p>{$glb_des_brieff}</p>
								       </div>
							       {/if}

								</div>
							    </div>
</div>


</div></div>
<!-- //banner-bottom -->
<!-- //banner-bottom -->
	<div id="footer" class="red_bg">
	
	<div id='center_footer' class='center_footer' style='height: 90px;'></div></div>
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

