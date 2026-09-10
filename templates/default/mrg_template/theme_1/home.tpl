{include file="default/mrg_template/wed_animations.tpl"}
<div>
			<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
			<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
			<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
			
		<div class="content">

		{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
					<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' ) } id = "change_bg_color_on_mouse" {/if} >
                        <div class="thirukkural"><p>{$glb_kural}</p></div>
					</div>
		 {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
		<div class="head_nav_cntrl" id="head_nav_cntrl"><span id="head_prev" style="display:{$glb_prevlink_style}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="head_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="head_next" style="display:{$glb_nextlink_style}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
		<input type="hidden" name="tmpl_kural_auto_id" id="tmpl_kural_auto_id" value="{$glb_tmpl_kural_auto_id}" /></div>
			{/if}

<br /> <br />
                <div style="text-align: center;">
                     
					 {if $glb_home_img_status eq 1}
					<img alt="" src="{$glb_homeimg}" width="300px" class="home_img" />
					
					{elseif $glb_home_img_status eq 2}
					<img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" />
					<img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" />
					{/if}
                </div>
                <br /> <br />
            {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}<div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
            <div  class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if}>

               {$glb_des_brieff}
            </div>
             {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}              
		     <div class="desc_nav_cntrl" id="desc_nav_cntrl"><span id="desc_prev" style="display:{$glb_desclink_prevstyle}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="desc_next" style="display:{$glb_desclink_nextstyle}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
			 <input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="{$glb_tmpl_desc_auto_id}" /></div>
			 {/if}
		
		</div>

		<div class="clearer"><span></span></div>

	</div>
	<div class="footer">	
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>

</div>

   
	
</body>

</html>