<div class="span-19 last" id="content">
    <h3>{$tdetails[0].p1te_name|capitalize}</h3>
     <a href='index.php?page=templates'>Back to List of UI Templates</a>&nbsp;<input type="submit" value="Edit Template" class="push-1" style="padding:6px 6px;">
       
	<div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
		<div class="span-19 last">
          <p>Template Name: <strong>{$tdetails[0].p1te_name|capitalize}</strong></p>
        </div>
    </div> 
    <div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
		<div class="span-19 last">
          <p>Created By: <strong>{if $tdetails[0].p1ad_id == '1'}PaymentOne{elseif $tdetails[0].p1me_id == '1'}Merchant{/if}</strong></p>
        </div>
    </div> 
    <div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
		<div class="span-19 last">
          <p>Created On: <strong>{$tdetails[0].p1te_added|date_format:"%e %b, %Y"}</strong></p>
        </div>
    </div> 
    <div id="tabs-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
		<div class="span-19 last">
          <p>Selected Services: 
				{if $smarty.request.edit eq 'yes'}<br/>
					<b><input type="checkbox" name="team" value="other">&nbsp;All Categories</b><br/>
					{foreach from=$category_services key=catid item=tmp}
						{if $catid == 0}<b>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="team" value="other">&nbsp;{$tmp.p1ca_name}</b><br/>{/if}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="team" value="other">&nbsp;{$tmp.p1ms_name}<br/>
					{/foreach}		
				{else}
					<SELECT NAME=sections MULTIPLE>								
						{foreach from=$category_services key=catid item=tmp}
							<optgroup label="{$tmp.p1ca_name}">
							<option value="{$tmp.catId}">{$tmp.p1ms_name}</option>
						{/foreach}														
					</SELECT>
				<a href="template.php?tid={$tdetails[0].p1te_id}&edit=yes">Edit List of Selected Services</a>{/if}
		 </p>
        </div>
    </div>        
</div>
