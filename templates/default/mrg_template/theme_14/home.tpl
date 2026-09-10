<!-- banner-bottom --></div>
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
<div class="banner-bottom">
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
					<div class="bottom-wrap"  style="width: 165%;" >
						<div class="bottom-grids">
							<div class="bottom-left">
								<div class="bottom-header">
								    <div class="col-md-12 text-center ">
									{if $glb_pageheading neq ''}
									<h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$glb_pageheading}</h2>
									{/if}
									<div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
									<p class="big-text animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">
										{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} 
											<div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> 
										{/if}
										<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if}><div>{$glb_kural}</div></div>
									</p>
								    </div>

								{if $glb_home_img_status eq '1'}
								<div class="row latest_sermons">
								    <div class="col-md-6 text-center groom">
									<div class="img"><img alt="" src="{$glb_homeimg}" width="300px" class="home_img" /></div>
								    </div>
								    <div class="col-md-6 text-center bride">
									{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
									<p>{$glb_des_brieff}</p>
								    </div>
								   </div>
								{else}
									<div class="row latest_sermons">
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
								<div class="clearfix"></div>
							</div>				
						</div>
					</div>
			</div></td>
<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
</table>
</div></div></div>
<!-- //banner-bottom -->
<!-- //banner-bottom -->
<!-- smooth scrolling -->
	{literal}<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script> {/literal}
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<div id="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

