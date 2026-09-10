<div id="center_content">	
    <div class="center_top_bg"></div>

<div class="center_bg">
		<div class="home_left_content">
		{if $glb_pagetitle neq ''}<h1  style="text-align: center;"><span id='pageheddings'>{$glb_pagetitle}</span></h1>{/if}
					{if $glb_findownpageCnt neq 0}
					<table>
						{foreach from=$glb_pgeinfos key=k item=v}
						<tr><td style='width: 100%;'>
						{if $v.parah_title_status eq 1}<h4 class="title" style='margin: 1px;'>{if $v.parah_title neq ''}{$v.parah_title}{else}&nbsp;{/if}</h4>{else}<h4 class="title" style='margin: 1px;'>&nbsp;</h4>{/if}
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
        <div class="clear"></div>
    </div>
    <div class="center_bottom_bg"></div>  
    </div>  
            
  <div id="footer" align="center" style="padding-top: 10px;">{include file="default/mrg_template/footer_links.tpl"}
    </div>



</div>
</body>
</html>