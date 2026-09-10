{include file="default/mrg_template/wed_animations.tpl"}
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />


<section id="features" class="features homepage">
<div class="container home">
    <div class="row">
	<div class="col-lg-12 text-center">
	    <div class="section-heading">
		<h1 id='pageheddings'>{if $glb_pageheading neq ''}{$glb_pageheading}{else}&nbsp;{/if}</h1>
	    </div>
	</div>

	<div class="col-lg-12 text-center">
	    <div class="section-heading">
		{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
		<div class="admin_alert" id="admin_alert_info" style="display:none; cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
		<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if} >
			<div align="center" class="thirukkural">{$glb_kural}</div>
		</div>
		{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
		<div class="head_nav_cntrl" id="head_nav_cntrl"><span id="head_prev" style="display:{$glb_prevlink_style}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="head_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="head_next" style="display:{$glb_nextlink_style}; cursor: pointer;"><img src="images/next_button.gif" /></span>
		<input type="hidden" name="tmpl_kural_auto_id" id="tmpl_kural_auto_id" value="{$glb_tmpl_kural_auto_id}" /></div>
		{/if}
	    </div>
	</div>
    </div>

    
    {if $glb_home_img_status eq 2}
	<div class="row">
	<div class="col-lg-1 text-center">&nbsp;</div>
	<div class="col-lg-10 text-center"><span class="double{$glb_imagedata_double_1}"><img alt="" src="{$glb_maleimg}" class="home_img art-lightbox" style="{$two_images_max_height}" /></span><span class="double{$glb_imagedata_double_2}">
	<img alt="" src="{$glb_femaleimg}"  class="home_img art-lightbox" style="{$two_images_max_height}" /></span></div>
	<div class="col-lg-1 text-center">&nbsp;</div>
	</div>

	<div class="row">
	{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="display:none; cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}

	<div class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if} style="text-align: center;">
				<p>{$glb_des_brieff}</p>
	</div>
	{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )}
		<div class="desc_nav_cntrl" id="desc_nav_cntrl"><span id="desc_prev" style="display:{$glb_desclink_prevstyle}; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp; <span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span> &nbsp;<span id="desc_next" style="display:{$glb_desclink_nextstyle}; cursor: pointer;"><img src="images/next_button.gif" /></span>		
		<input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="{$glb_tmpl_desc_auto_id}" /></div>
	{/if}
	</div>
	
    {else}
	<div class="row">
	<div class="col-lg-{if $master_theme_id eq '32'}1{else}2{/if} text-center">&nbsp;</div>
	<div class="col-lg-{if $master_theme_id eq '32'}4{else}4{/if} text-center"><div class="single{$glb_istyle_sin}"><img alt="" src="{$glb_homeimg}" width="300px"  {if $isMobile eq 1} class="home_img" {else} class="img-responsive" {/if} /> </div></div>
	<div class="col-lg-{if $master_theme_id eq '32'}6{else}4{/if} text-center">
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
	<div class="col-lg-1 text-center">&nbsp;</div>
	</div>
    {/if}
    

  
</section>



<div>
<div class="art-sheet clearfix"></div></div>
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</div>
</body></html>