<div id="footernav1">
    <div id="footernav_content1">
       <div style="text-align: center; padding-top: 5px;"><a href="{$glb_page_url}?status=h"><b>{$glb_wed_card_title_home}</b></a>&nbsp;|&nbsp;<a href="{$glb_page_url}?status=1"><b>{$glb_wed_card_title_events}</b></a>&nbsp;|&nbsp;<a href="{$glb_page_url}?status=2"><b>{$glb_wed_card_title_guestbook}</b></a>&nbsp;|&nbsp;<a href="{$glb_page_url}?status=4"><b>{$glb_wed_card_title_loc}</b></a>
	   {if $glb_total_alb_records neq 0}
		&nbsp;|&nbsp;<a href="{$glb_page_url}?status=3"><b>{$glb_wed_card_title_album}</b></a>
	   {/if}</div>
    </div>
</div>
<style type="text/css">
{literal}
#footernav1 {
font-size: 15px;
height: 25px;
}
{/literal}
</style>
</body>
</html>