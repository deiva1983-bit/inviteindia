{include file="default/mrg_template/wed_animations.tpl"}
<div class="content contentMid">
		<div class="contentMid1">
			<div class="contentMid2">

<div class="layout profileLayout">
	<div class="row row0 rowPath0 rowDepth0" id="row0">
		<div class="column column0 columnPath0_0 columnDepth1 firstColumn lastColumn" id="col0_0">
			<div class="columnEnd"></div>
		</div>
		<div class="rowEnd"></div>
	</div>
	<div class="row row1 rowPath1 rowDepth0" id="row1">
		 <div class="column column1 columnPath1_1 columnDepth1 lastColumn" id="col1_1">

 
 
<div class="module module5 columnModule2 odd blurbsModule" id="module10">
	<div class="moduleTop">
		<div>
			<div></div>
		</div>
	</div>
	<div class="moduleMid">
		<div class="moduleMid1">
			<div class="moduleMid2">
				<!-- <h3 class="moduleHead"><span>Blurbs</span></h3> -->
				<div class="moduleBody">
					<div class="autoResize blurbAboutMe">
					<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
					<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
					<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
					{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
							<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if} >
							<div align="center" class="thirukkural">{$glb_kural}</div>
							</div>
					{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
					<div class="head_nav_cntrl" id="head_nav_cntrl"><span id="head_prev" style="display:{$glb_prevlink_style}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="head_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="head_next" style="display:{$glb_nextlink_style}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
					<input type="hidden" name="tmpl_kural_auto_id" id="tmpl_kural_auto_id" value="{$glb_tmpl_kural_auto_id}" /></div>
					{/if}		 
					
				  </div>
					 
					<div class="moduleBodyEnd"></div>
				</div>
					
					<div class="moduleBody">
					<div class="autoResize blurbAboutMe">
					{if $glb_home_img_status eq 1}
					<article class="col2_2" style="padding-top:20px; width: 350px;">
					{/if}
					<div class="home_mem_img">
					{if $glb_home_img_status eq 1}
					<img alt="" src="{$glb_homeimg}" width="300px" class="home_img" />
					
					{elseif $glb_home_img_status eq 2}
					<img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" />
					<img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" />
					{/if}
					</div>
					
					{if $glb_home_img_status eq 1}
					</article>
					<article class="col2_2" style="width: 500px; padding-top:20px;">
					{/if}
					 {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if} 
				 <div class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if}>
					<p>{$glb_des_brieff}</p>
				</div>
				
				{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}              
		     <div class="desc_nav_cntrl" id="desc_nav_cntrl"><span id="desc_prev" style="display:{$glb_desclink_prevstyle}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="desc_next" style="display:{$glb_desclink_nextstyle}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
			 <input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="{$glb_tmpl_desc_auto_id}" /></div>
			 {/if}
			{if $glb_home_img_status eq 1}
					</article>
					 
					{/if}		
						 
	 </div>
					 
					<div class="moduleBodyEnd"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="moduleBottom">
		<div>
			<div></div>
		</div>
	</div>
</div>

 

<div class="columnEnd"></div></div><div class="column column2 columnPath1_2 columnDepth1" id="col1_2"><div class="columnEnd"></div></div><div class="column column3 columnPath1_3 columnDepth1" id="col1_3"><div class="columnEnd"></div></div><div class="rowEnd"></div></div><div class="row row2 rowPath2 rowDepth0" id="row2"><div class="column column0 columnPath2_0 columnDepth1 firstColumn lastColumn" id="col2_0"><div class="columnEnd"></div></div><div class="rowEnd"></div></div></div></div></div>

</div><div class="contentBottom"><div><div></div></div></div>

	<div id="footer">
		<br>
		{include file="default/mrg_template/footer_links.tpl"}
		 
	</div>
</div>
<br>
 
  

</body></html>