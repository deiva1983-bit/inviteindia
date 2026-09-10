<div id="menu"><span id="headmsg">{if $tpl_event_title neq ''} {$tpl_event_title} {else}&nbsp;{/if}</span></div>
<div style="clear:both"></div>
<!-- <h2  style="text-align: center;"><span id='pageheddings'>{$tpl_event_title}</span></h2> -->
<div id="left-content">
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
</div>

<div style="clear:both"></div>
<!-- footer -->
	<div id="footer">	
	<div id="foot_heart">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
	</div>
</div>
</div>
</body>
</html>