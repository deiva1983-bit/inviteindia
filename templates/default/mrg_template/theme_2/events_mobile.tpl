<div class="wrapper">
	<div id="content" style='width: 100%;'><h2 id="pageheddings" style="text-align: center;">{$tpl_event_title}</h2>
	<div class="inner_copy"></div>
		<!-- welcome -->
				{if $smt_reception_status neq 0 }
				<div class="col-md-12">
						{if $smt_rec_title neq ''}<h2><span id='subhead'>{$smt_rec_title}</span></h2>
						{else}<h2><span id='subhead'>Reception</span></h2>
						{/if}
						<div class="people" style='padding: 2px;'>
							 {if $smt_reception_date neq ''}<p>{$smt_reception_date}</p>{/if}
							 {$smt_reception_location}
						</div>
				</div>
				{/if}
				{if $smt_marriage_status neq 0 }
				<div class="col-md-12">
						{if $smt_wed_title neq ''}<h2><span id='subhead'>{$smt_wed_title}</span></h2>
						{else}
						<h2><span id='subhead'>Marriage</span></h2>
						{/if}
						<div class="people" style='padding: 2px;'>
						{if $smt_marriage_date neq ''}<p>{$smt_marriage_date}</p>{/if}
						{$smt_marriage_location}
						</div>
				</div>
				{/if}

	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	</div>

	<!-- footer -->
	<div id="footer">
	<div id="rings">{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;</div>
	</div>
</body>
</html>