<!-- banner-bottom --></div>
<div class="banner-bottom">
<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />

<div class="bottom-header red_bg">
			   <div class="lovestory_bottom_parallax lovestory_bottom_parallax_green">
				<div class="lovestory_bottom_bg" style="padding-top: 10px;">
				<h1 class="text-center animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$tpl_event_title}</h1>
				<div class="devider_main text-center"><img src="{$glb_img_urls}images/devider-gray.jpg" alt=""></div>
				{if $smt_reception_status neq 0 }
					<div style="padding: 10px;"> 
					<input type='hidden' id='rec_status' value='1' />
					{if $smt_rec_title neq ''}<h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">{$smt_rec_title}</h3>
					{else}<div class="col-md-1">&nbsp;</div><h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">Reception</h3>
					{/if}
						<div class="col-md-12 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
						{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
						{$smt_reception_location}
						</div>
					
					</div>
				{else}
					<input type='hidden' id='rec_status' value='0' />
				{/if}
				

				{if $smt_marriage_status neq 0 }
					<div style="padding: 10px;"> 
					<input type='hidden' id='wed_map_status' value='1' />
					{if $smt_wed_title neq ''}<h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">{$smt_wed_title}</h3>
					{else}<div class="col-md-1">&nbsp;</div><h3 class="animated fadeIn visible text-center" data-animation="fadeIn" data-animation-delay="100">Marriage</h3>
					{/if}
					<div class="col-md-12 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
					{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
					{$smt_marriage_location}
					</div>
					
					</div>
				{else}
					<input type='hidden' id='wed_map_status' value='0' />
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

