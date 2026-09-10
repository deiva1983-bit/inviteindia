<script type="text/javascript" src="{$glb_site_url}includes/scripts/dt/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery-ui-1.8.11.custom.min.js"></script>
{literal}
<style>
a:link, a:visited {
    color: #1b75bb;
    text-decoration: none;
}
#footernav1 {font-family: "Source Sans Pro";}
#footernav1 {bottom: 0 !important; left: 0 !important; position: fixed !important; top: auto !important;z-index: 9999;}
#footernav1{background: none repeat scroll 0 0 #FFFFFF; bottom: 0; color: #ACACAC; font-size: 11px;  left: 0; padding: 0; position: fixed; width: 100%; z-index: 200000;}
#footernav1 ul#footernav-links1 { float: left; margin: 0px 16px 0 15px; padding: 0;}
ul, li {list-style: none outside none;}
#footernav1 ul#footernav-links1 li {float: left;    height: 13px;    margin-right: 10px; margin-top: 2px;}
#footernav1 #copyright {    float: right;    margin-top: 0px;	color: #1B75BB;}
#call_remaninder {    padding-left: 10px;}
</style>

<script type="text/javascript">
  var x = document.getElementById("myAudio").autoplay;
  document.getElementById("demo").innerHTML = x;
</script>


{/literal}

<div id="footernav1">
    <div id="footernav_content1">
        <ul id="footernav-links1">
		<li>
		<iframe src="//www.facebook.com/plugins/like.php?href={$glb_fb_url}&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width: 82px;" allowTransparency="true"></iframe>			 
		</li>		
		<li id="footernav-sitemap">{if $glb_animate_cover neq 0 } <b style="vertical-align: top;">|</b> <span style="padding-left: 10px;">&nbsp;<a id="call_remaninder" style="cursor: pointer; padding-left: 2px;" href="{$glb_page_url}?status=c" target="frame1"><b style="vertical-align: top;">Wedding Cover</b></a> {/if}</li>{$ownpage_links}
        </ul>
	<div id="copyright"><span>Created by <b>{$glb_male_name} & {$glb_female_name}</b></span>&nbsp;|&nbsp;<span>Powered by <a href="http://www.inviteindia.com" target="_blank"><b>inviteindia.com</b></a>.</span>&nbsp;
	{if $glb_music_active eq 1 }
	<div id="audiestyle" style="float: right;">	 
	  <ul>
	  <audio id="myAudio" controls autoplay><source src="{$glb_site_url}/audios/{$glb_music_id}.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio>
	  </ul>

		


	</div>{/if}
	</div>
    </div>
</div>


			
