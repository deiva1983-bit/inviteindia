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
					<p><h1 style="text-align: center;"><span id='pageheddings'>{$tpl_bless_title}</span></h1></p>
					<div class="paragraph" style="text-align:left;">
						<div style="text-align: right;"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div>
						<div class="listwishes" id="listwishes">
							{$msgdetails_tpl}
						</div>
						<div style="text-align: right;"><a href="{$glb_page_url}?status=5"><b>{$tpl_bless_addmy}</b></a></div> 
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