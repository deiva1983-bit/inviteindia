<!-- banner-bottom --></div>
<div class="banner-bottom">
{if $isMobile neq 1}
<table border="0" align="center" width="100%">
			<tr><td width="10%"><div class="article-left">&nbsp;</div></td>
			<td width="80%"><div class="article-center">
{/if}
					<div class="bottom-wrap" style="width: 165%;" >
						<div class="bottom-grids">
							<div class="bottom-left" {if $isMobile eq 1} style="background:url({$glb_img_urls}images/red.png) repeat 0px 0px; padding: 20px; height: 100%;" {/if}>
								<div class="bottom-header" style="padding: 40px;">
									
								{if $glb_pagetitle neq ''}<h2  style="text-align: center;" class="title">{$glb_pagetitle}</h2>{/if}
								{if $glb_findownpageCnt neq 0}
								<table>
									{foreach from=$glb_pgeinfos key=k item=v}
									<tr><td style='width: 100%;'>
									{if $v.parah_title_status eq 1}<h4 class="title" style='margin: 1px;'>{if $v.parah_title neq ''}{$v.parah_title}{else}&nbsp;{/if}</h4>{else}<h4 class="title" style='margin: 1px;'>&nbsp;</h4>{/if}
									<div>
									{if $v.parah_image_align neq 3} <span {if $v.parah_image_align eq 1} style="float:left;" {else if $v.parah_image_align eq 2} style="float:right;" {/if}>
												{if $v.parah_image_src neq ''}
												<img width="150px" height="100" border="0" style="margin:1px 10px 10px; border:5px double #cc3281;" src='templates/default/mrg_template/ownpage_images/{$v.master_wed_id}/{$v.wed_ownpage_id}/{$v.parah_image_src}'>
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
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
{if $isMobile neq 1}</div></td>
			<td width="10%"><div class="article-right"><!-- <img src="{$glb_img_urls}images/lady.png" alt=" " />--></div></td></tr>
			</table>{/if}
</div></div></div>
<!-- //banner-bottom -->
<!-- //banner-bottom -->
<!-- smooth scrolling -->
	{literal}<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script> {/literal}
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<div id="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
<!-- //smooth scrolling -->
</body>
</html>

