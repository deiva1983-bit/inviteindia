<div id="menu"><span id="headmsg">{if $glb_pagetitle neq ''} {$glb_pagetitle} {else}&nbsp;{/if}</span></div>
<div style="clear:both"></div>
	{if $glb_findownpageCnt neq 0}
	<div class="col-md-12">
		{foreach from=$glb_pgeinfos key=k item=v}
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
			<div style="margin-top:2px;">{$v.parah_content}</div>
			</div>
		{/foreach}
	</div>
	{/if}
<div style="clear:both"></div>
<!-- footer -->
				<div id="footer">
					<div id="foot_heart">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
				</div>
			</div>
		</div>
	</body>
</html>