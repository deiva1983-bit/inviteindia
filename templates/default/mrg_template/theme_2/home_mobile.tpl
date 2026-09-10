<div class="wrapper">
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
<input type="hidden" name="glb_theme_owner_id" id="glb_theme_owner_id" value="{$glb_theme_owner_id}" />
<div id="content" style="width: 100%;">
<div class="inner_copy"></div>
<div><img alt="" src="{$glb_img_urls}images/welcome-title.png"/></div>
					<div style="margin-top:15px">
					<div align="center" class="thirukkural">{$glb_kural}</div>
					</div>
				{if $glb_home_img_status eq 1}
					<div class="latest_sermons">
						<div class="col-md-6 text-center groom">
							<div class="img"><img alt="" src="{$glb_homeimg}" width="300px" class="home_img" /></div>
						</div>
					</div>
				{elseif $glb_home_img_status eq 2}
					<div class="row latest_sermons">
						<div class="col-md-6 text-center groom">
							<div class="img"><img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" /></div>
						</div>
						<div class="col-md-6 text-center bride">
							<div class="img"><img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" /></div>
						</div>
					</div>
				{/if}

				{if $glb_home_img_status eq 1}
				<span style="padding-top:20px;">
				{/if}
				<div class="home_content" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse_for_desc" {/if}>
					<p>{$glb_des_brieff}</p>
				</div>
				{if $glb_home_img_status eq 1}
				</span>
				{/if}
</div>
<div style="clear:both"></div>
</div>
<div style="clear:both"></div>
</div>
<!-- footer -->
<div id="footer">
<div id="rings">{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;</div>
</div>
</body>
</html>