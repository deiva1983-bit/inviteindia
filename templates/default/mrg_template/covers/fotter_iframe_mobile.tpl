<div id="footernav1">
    <div id="footernav_content1">
       <div style="text-align: center; padding-top: 5px;">
       {if $glb_total_alb_records eq 0}
	       <a href="{$glb_page_url}?status=h"><button class="button-home">{$glb_wed_card_title_home}</button></a>&nbsp;&nbsp;<a href="{$glb_page_url}?status=1"><button class="button-event">{$glb_wed_card_title_events}</button></a>&nbsp;&nbsp;<a href="{$glb_page_url}?status=2"><button class="button-guest">{$glb_wed_card_title_guestbook}</button></a>&nbsp;&nbsp;<a href="{$glb_page_url}?status=4"><button class="button-loc">{$glb_wed_card_title_loc}</button></a>
       {else}
       <a href="{$glb_page_url}?status=h"><button class="button-home">{$glb_wed_card_title_home}</button></a>&nbsp;<a href="{$glb_page_url}?status=1"><button class="button-event">{$glb_wed_card_title_events}</button></a>&nbsp;<a href="{$glb_page_url}?status=2"><button class="button-guest">{$glb_wed_card_title_guestbook}</button></a>&nbsp;<a href="{$glb_page_url}?status=4"><button class="button-loc">Location</button></a>&nbsp;<a href="{$glb_page_url}?status=3"><button class="button-album">Album</button></a>
	{/if}</div>
    </div>
</div>
<style type="text/css">
{literal}
#footernav1 {
font-size: 15px;
height: 40px;
}
{/literal}
</style>
</body>
</html>