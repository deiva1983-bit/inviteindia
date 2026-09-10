<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
				    <div style="width: 100%; text-align: center;">
				    <h1 id='pageheddings'>{$tpl_event_title}</h1>
				    </div>

				    <div class="art-content-layout-row">
				    <div class="art-layout-cell layout-item-0" style="width: 100%" >
					<div style="padding:30px">
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
				    </div>
</div>

 
</div>
                    </div>
                </div>
            </div>
    </div>



<div id='center_footer' class='center_footer' style='height: 90px;'></div>
	<div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}
	</div>
</div>
</body></html>