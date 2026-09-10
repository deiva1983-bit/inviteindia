{include file="default/mrg_template/wed_animations.tpl"}
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">

<div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%; text-align: center;">
    <h1 id='pageheddings'>{if $glb_pageheading neq ''}{$glb_pageheading}{else}&nbsp;{/if}</h1>
    </div>
</div>

    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
	{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
	<div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
	<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if} >
		<div align="center" class="thirukkural">{$glb_kural}</div>
	</div>
    </div>
    </div>
</div>

{if $glb_home_img_status eq 2}
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style='text-align: center;'>
	<img alt="" src="{$glb_maleimg}" class="home_img art-lightbox" style="{$two_images_max_height}" />
	<img alt="" src="{$glb_femaleimg}"  class="home_img art-lightbox" style="{$two_images_max_height}" /><br>
	</p>
    </div>
    </div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
		{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}

		<div class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if} style="text-align: center;">
					<p>{$glb_des_brieff}</p>
		</div>
		{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
					<div class="desc_nav_cntrl" id="desc_nav_cntrl"><span id="desc_prev" style="display:{$glb_desclink_prevstyle}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="desc_next" style="display:{$glb_desclink_nextstyle}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
					<input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="{$glb_tmpl_desc_auto_id}" /></div>
				{/if}

    </div>
    </div>
</div>

{else}
	 <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <span style="padding-top:10px; width: 350px;" class="col2_2"> <p><img alt="" src="{$glb_homeimg}" width="300px" class="home_img"/></p> </span>
	<span style="padding-top:10px; width: 450px;" class="col2_2">
	<div class = "home_content"> <p>{$glb_des_brieff}</p> </div></span>
    </div>
    </div>
</div>
</div>
{/if}
</div>
</article></div>
                    </div>
                </div>
            </div>
    </div>



<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links.tpl"}	&nbsp;
	</div>
</div>
</body></html>