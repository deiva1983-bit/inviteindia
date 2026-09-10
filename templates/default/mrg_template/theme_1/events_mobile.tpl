<!-- content -->
<div>
	<div class="content centr">
	<h1  style="text-align: center;"><span id='pageheddings'>{$tpl_event_title}</span></h1>

					<div style="padding:10px">
						<div>
							<div class="group">
								{if $smt_wed_title neq ''}<h2><span id='subhead'>{$smt_wed_title}</span></h2>
								{else}
								<h2><span id='subhead'>Marriage</span></h2>
								{/if}
								<div class="people" style='padding: 2px;'>
									 {if $smt_marriage_date neq ''}<p>{$smt_marriage_date}</p>{/if}
									 {$smt_marriage_location}
								</div>
							
							</div>

							<div class="group">
							{if $smt_rec_title neq ''}<h2><span id='subhead'>{$smt_rec_title}</span></h2>
							{else}<h2><span id='subhead'>Reception</span></h2>
							{/if}
							<div class="people" style='padding: 2px;'>
									 {if $smt_reception_date neq ''}<p>{$smt_reception_date}</p>{/if}
									 {$smt_reception_location}
							</div>			

						</div>
					</div>


	
	</div>
	<div class="clearer"><span></span></div>
	</div>
	
	<div class="footer">	
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
</div>
</body>
</html>