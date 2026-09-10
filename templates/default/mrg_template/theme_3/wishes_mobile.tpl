<div id="menu"><span id="headmsg">{if $tpl_bless_title neq ''} {$tpl_bless_title} {else}&nbsp;{/if}</span></div>
<div style="clear:both"></div>
<div class="add_bless_msg"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div> 
	<div class="listwishes" id="listwishes">
		{$msgdetails_tpl}
	</div>
<div class="add_bless_msg"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div> 
<div style="clear:both"></div>
<!-- footer -->
				<div id="footer">
					<div id="foot_heart">{include file="default/mrg_template/footer_links.tpl"}</div>
				</div>
			</div>
		</div>
	</body>
</html>