<div class="extra pag_con col-md-12 bgnone" id="right-bottom">
	{if $tpl_event_title neq ''}<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_event_title}</span></h1>{else}&nbsp;{/if}
</div>
<div id="content" class="page_contents" style="margin-left: 0px; padding-top: 150px;">


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
<!-- / content -->
	</div>
	<div class="block">{include file="default/mrg_template/footer_links_latest.tpl"}</div>
</body>
</html>  
 