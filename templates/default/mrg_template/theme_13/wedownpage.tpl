<div id="wrapper">
		<div id="page-wrap">
			<div id="header" style='display: none;'> 
				<h1 style="text-align: center; padding-top: 30px;">
					<div><span id='homepageheddings'>{$glb_male_name}</span><span id='homepageheddings'>&nbsp;&amp;&nbsp;</span><span id='homepageheddings'>{$glb_female_name}</span></div>
					<div style='padding-top: 10px;'><span id='pageheddings'>{$glb_marriage_date_title}</span></div>
			</h1></div> <!-- header -->

			<div id="content-wrapper" style='padding-top: 20px;'>
				<div id="content">
					<div id="wsite-content" class="wsite-elements wsite-not-footer">
					<div>
					<p><h1 style="text-align: center;"><span id='pageheddings'>{$glb_pagetitle}</span></h1></p>
					<div class="paragraph" style="text-align:left;">
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
					</div>
					</div>
					
					

				</div>
		</div> <!-- content wrapper -->
	</div> <!-- Page wrap --><br />

			<div id="footer">
				<div id="footer-content">
					<script type="text/javascript">expandedFooterController.initialize();</script>
				<div>
			</div>
</div> <!-- wrapper -->
{include file="default/mrg_template/footer_links.tpl"}
</div> <!-- body-wrap --></body></html>