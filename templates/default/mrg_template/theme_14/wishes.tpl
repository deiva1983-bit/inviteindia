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
									<div class="add_bless_msg"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div> 
										<div class="listwishes" id="listwishes">
											{$msgdetails_tpl}
										</div>
									<div class="add_bless_msg"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div> 
									<div style="clear:both"></div>

								</div> 
								<div class="clearfix"></div>
					
					
					<!-- <div class="social-icons">
						<ul>
							<li>Created by inviteindia.com</li>
						</ul>
					</div> -->
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

