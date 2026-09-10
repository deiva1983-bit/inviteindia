{if $isMobile eq 1}
{literal}<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script> {/literal}
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a> </div>
{/if}
<!--<div id="footernav1" {if $isMobile eq 1} style='height: 0px;' {/if}>
    <div id="footernav_content1">
        <ul id="footernav-links1">
	{if $isMobile eq 1}
	{$ownpage_links}
	{else}
		<li>
		<iframe src="//www.facebook.com/plugins/like.php?href={$glb_fb_url}&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width: 82px;" allowTransparency="true"></iframe>			 
		</li>
		{if $glb_show_wed_remainder neq 1 } <li id="footernav-sitemap"><span style="padding-left: 10px;"><img src="images/IC110998.gif" /></span>&nbsp;<a id="call_remaninder" style="cursor: pointer; padding-left: 2px;"><b style="vertical-align: top;">Set Reminder</b></a></li>  {/if}
		<li id="footernav-sitemap">{if $glb_animate_cover neq 0 } <b style="vertical-align: top;">|</b> <span style="padding-left: 10px;"><img src="images/ul_goto_homepage.gif" /></span>&nbsp;<a id="call_remaninder" style="cursor: pointer; padding-left: 2px;" href="{$glb_page_url}?status=c" target="frame1"><b style="vertical-align: top;">Wedding Cover</b></a> {/if}</li>{$ownpage_links}
        </ul>
	<div id="copyright">Powered by <a href="http://www.inviteindia.com" target="_target"><b>inviteindia.com</b></a>.</div>
	<div id="copyright">/</div>
	<div id="copyright">Created by <b>{$glb_male_name} & {$glb_female_name}</b></div>
	{/if}
    </div>
</div>-->