<div class="extra pag_con col-md-12 bgnone" id="right-bottom">
	{if $tpl_album_title neq ''}<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_album_title}</span></h1>{else}&nbsp;{/if}
</div>
<div id="content" class="page_contents" style="margin-left: 0px; padding-top: 150px;">
	<div class="col-md-12">
		<div id="container" class="isotom_lant clearfix">
			<ul>
			{$albuminfosnew}
			</ul>
		</div>
	</div>
</div>
<div class=" center_footer"></div>
<script type="text/javascript" src="templates/default/mrg_template/magic_popup/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="templates/default/mrg_template/magic_popup/system.js"></script>
<link type="text/css" rel="stylesheet" href="templates/default/mrg_template/magic_popup/style.css">
<link type="text/css" rel="stylesheet" href="templates/default/mrg_template/magic_popup/magnific-popup.css">
<div class="block">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
</body>
</html>  