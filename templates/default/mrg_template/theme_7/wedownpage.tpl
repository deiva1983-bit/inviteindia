<div class="content contentMid" >
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
		<div class="moduleMid1"  style="min-height: 350px;">
			<div class="moduleMid2">
				{if $glb_pagetitle neq ''}<h3 class="moduleHead" style='text-align: center;'><span id='pageheddings' >{$glb_pagetitle}</span></h3>{/if}
				<div class="moduleBody">
					<div class="autoResize blurbAboutMe" style="padding: 1px;">
					
					<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
					<input type="hidden" name="glb_theme_id" id="glb_theme_id" value="{$glb_master_id}" />
						{if $glb_findownpageCnt neq 0}
						<table>
							{foreach from=$glb_pgeinfos key=k item=v}
							<tr><td style='width: 100%;'>
							{if $v.parah_title_status eq 1}<h2 style='margin: 1px;'>{if $v.parah_title neq ''}{$v.parah_title}{else}&nbsp;{/if}</h2>{else}<h2 class="title" style='margin: 1px;'>&nbsp;</h2>{/if}
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