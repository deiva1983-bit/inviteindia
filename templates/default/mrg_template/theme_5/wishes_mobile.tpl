<div class="extra pag_con col-md-12 bgnone" id="right-bottom">
	{if $tpl_bless_title neq ''}<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_bless_title}</span></h1>{else}&nbsp;{/if}
</div>
<div id="content" class="page_contents" style="margin-left: 0px; padding-top: 150px;">
	<div class="col-md-12">
		<div style="text-align: right;"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div>
			<div class="listwishes" id="listwishes">
			{$msgdetails_tpl}
			</div>
		<div style="text-align: right;"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div>
	</div>
<!-- / content -->
	</div>
	<div class="block">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
</body>
</html>  