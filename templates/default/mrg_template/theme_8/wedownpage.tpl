&nbsp;<div id="content" class="index" data-pjax-container="" style="opacity: 1; display: block; width: 953px;">   
		<div id="wedding-party" class="clearfix" style="width: 850px  !important;">
		{if $glb_pagetitle neq ''}<h1  style="text-align: center;"><span id='pageheddings'>{$glb_pagetitle}</span></h1>{/if}
			<div class="group">
					<div class="people">
						{if $glb_findownpageCnt neq 0}
						<table>
							{foreach from=$glb_pgeinfos key=k item=v}
							<tr><td style='width: 100%;'>
							{if $v.parah_title_status eq 1}<h2><span id='eventsubhead'>{if $v.parah_title neq ''}{$v.parah_title}{else}&nbsp;{/if}</span></h2>{else}<h2 class="title" style='margin: 1px;'>&nbsp;</h2>{/if}
							<div>
							{if $v.parah_image_align neq 3} <span {if $v.parah_image_align eq 1} style="float:left;" {else if $v.parah_image_align eq 2} style="float:right;" {/if}>
										{if $v.parah_image_src neq ''}
										<img width="150px" height="100" border="0"  class="home_img" src='templates/default/mrg_template/ownpage_images/{$v.master_wed_id}/{$v.wed_ownpage_id}/{$v.parah_image_src}'>
										{else}
											{if $v.wed_parah_count_id eq 1}<img width="150px" height="100" border="0"  class="home_img" src='images/proposal_1.jpg'>
											{elseif $v.wed_parah_count_id eq 2}<img width="150px" height="100" border="0"  class="home_img" src='images/family_1.jpg'>
											{else}<img width="150px" height="100" border="0"  class="home_img" src='images/lovehim.jpg'>
											{/if}
										{/if}
									</span>
									{/if}
									<div style="font-size:12px; margin-top:2px;">{$v.parah_content}</div>
								</div>
							</td></tr>
							<tr><td>&nbsp;</td></tr>
							{/foreach}
						</table>
						{/if}
					</div>
			</div><div id='center_footer' class='center_footer' style='height: 90px;'></div>
		</div>
</div></div>
<div class="footer">	
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
 </body>
 </html>