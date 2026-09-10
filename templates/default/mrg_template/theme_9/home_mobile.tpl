{include file="default/mrg_template/wed_animations.tpl"}
<div id="main-wrap">
	<div class="container">
		<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
			<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
			<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
<!-- content -->
			<div id="content" style="width: 100%;">
				<div class="inner_copy"></div>
				<!-- welcome -->
				        <article class="about_us" id="about_us">
            <div class="container">
				<div class="row">
					<div class="col-md-12 text-center ">
					{if $glb_pageheading neq ''}<h1 style="text-align: center;"><span id='pageheddings'>{$glb_pageheading}</span></h1>{else}&nbsp;{/if}
					<div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
					
				<p class="big-text animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">
					{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
					<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if} >
					<div align="center" class="thirukkural">{$glb_kural}</div>					
					</div>
				</p>
					

				{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
				<div class="head_nav_cntrl" id="head_nav_cntrl"><span id="head_prev" style="display:{$glb_prevlink_style}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="head_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="head_next" style="display:{$glb_nextlink_style}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
				<input type="hidden" name="tmpl_kural_auto_id" id="tmpl_kural_auto_id" value="{$glb_tmpl_kural_auto_id}" /></div>
				{/if}
					</div>
				</div>

				<div class="h-divider"></div>
				
				{if $glb_home_img_status eq '1'}
				<div class="row latest_sermons">
				    <div class="col-md-6 text-center groom">
					<div class="img"><img alt="" src="{$glb_homeimg}" width="300px" class="home_img" /></div>
				    </div>
				    <div class="col-md-6 text-center bride">
					{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
					<div class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if}>
					<p>{$glb_des_brieff}</p>
					</div>
				    </div>
				   </div>
				{else}
					<div class="row latest_sermons">
					    <div class="col-md-6 text-right groom">
						<div class="img"><img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" /></div>		
					    </div>
					    <div class="col-md-6 text-left bride">
						<div class="img"><img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" /></div>
					    </div>
					</div>	
				
					<div class="col-md-12 text-center ">
						{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
						<div class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if}>
						<p>{$glb_des_brieff}</p>
						</div>
				       </div>
			       {/if}
			       {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}              
					<div class="desc_nav_cntrl" id="desc_nav_cntrl"><span id="desc_prev" style="display:{$glb_desclink_prevstyle}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="desc_next" style="display:{$glb_desclink_nextstyle}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
					<input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="{$glb_tmpl_desc_auto_id}" /></div>
				{/if}


			
				
				</div>
				<div style="clear:both"></div>
			
		</div>

<div style="clear:both"></div>
		</div>
	  </div><!-- end container -->
	</div><!-- end main-wrap -->
	</div><!-- end total wrapper -->
<!-- End Quantcast tag -->
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
 <div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</body>
</html>