{include file="default/mrg_template/wed_animations.tpl"}
<div id="menu"><span id="headmsg">{if $c_page_status eq 'h' || $c_page_status eq ''}{if $glb_pageheading neq '' && $page_ownpage eq ''} {$glb_pageheading} {else}&nbsp;{/if}{else}&nbsp;{/if}</span></div>

<div id="center-content" style="padding-top: 0px;">
<div class="thirukkural" style="text-align: center;">{$glb_kural}</div>
</div>


{if $glb_home_img_status eq 1}
	<div class="latest_sermons">
	<div class="col-md-6 text-center groom">
	<div class="img"><img alt="" src="{$glb_homeimg}" width="300px" class="home_img" /></div>
	</div></div>
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

<!-- sara smith -->
	<div class="home_content">
		{$glb_des_brieff}
	</div>
	<div style="clear:both"></div>


<div id="left-content">
	<div id="footer">
	<div id="foot_heart">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
	</div>
</div>
</body>
</html>