<div id="footernav1" {if $isMobile eq 1} style='height: 44px;' {/if}>
    <div id="footernav_content1">
        <ul id="footernav-links1">
	{if $isMobile eq 1}
	<li>
		<audio controls autoplay>
		<source src="{$glb_site_url}/audios/{$glb_music_id}.ogg" type="audio/ogg">
		<source src="{$glb_site_url}/audios/{$glb_music_id}.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
		</audio>
	</li>
	{$ownpage_links}
	{else}
		<li>
		<iframe src="//www.facebook.com/plugins/like.php?href={$glb_fb_url}&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width: 82px;" allowTransparency="true"></iframe>			 
		</li>
		{if $glb_show_wed_remainder neq 1 } <li id="footernav-sitemap"><span style="padding-left: 10px;"><img src="images/IC110998.gif" /></span>&nbsp;<a id="call_remaninder" style="cursor: pointer; padding-left: 2px;"><b style="vertical-align: top;">Set Reminder</b></a></li>  {/if}
		<li id="footernav-sitemap">{if $glb_animate_cover neq 0 } <b style="vertical-align: top;">|</b> <span style="padding-left: 10px;"><img src="images/ul_goto_homepage.gif" /></span>&nbsp;<a id="call_remaninder" style="cursor: pointer; padding-left: 2px;" href="{$glb_page_url}"><b style="vertical-align: top;">Wedding Cover Designs</b></a> {/if}</li>{$ownpage_links}
        </ul>
	{if $glb_music_active eq 1 }
	 <div id="audiestyle" style="float: right;">	 
	  <ul id="player">
		<li><a  href="{$glb_site_url}/audios/{$glb_music_id}.mp3">cow</a></li>
	  </ul>
	</div>
	{/if}
	{if $glb_theme_owner_id eq '11036'}
	<div id="copyright">Created by <b>Sujith P Nair(CS IT).</b></div>
	{else}
	 <div id="copyright">Powered by <a href="http://www.inviteindia.com" target="_blank"><b>inviteindia.com</b></a>.</div>
	{/if}
	{/if}
    </div>
</div>