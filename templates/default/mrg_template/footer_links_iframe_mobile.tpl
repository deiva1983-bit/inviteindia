{literal}
<style>
a:link, a:visited {
    color: #1b75bb;
    text-decoration: none;
}
#footernav1 {font-family: "Source Sans Pro";}
#footernav1 {bottom: 0 !important; left: 0 !important; position: fixed !important; top: auto !important;z-index: 9999;}
#footernav1{background: none repeat scroll 0 0 #FFFFFF; bottom: 0; color: #ACACAC; left: 0; padding: 0; position: fixed; width: 100%; z-index: 200000;}
#footernav1 ul#footernav-links1 {margin: 0px 16px 0 15px; padding: 0;}
ul, li {list-style: none outside none;}
#footernav1 ul#footernav-links1 li {float: left; height: 13px;    margin-right: 10px;}
#footernav1 #copyright {    float: left;    margin-top: 0px;	color: #1B75BB;}
#call_remaninder {    padding-left: 10px;}
.jmp3_container .jmp3_infos{display: none;}
</style>
{/literal}

<div id="footernav1" style='height: 50px;' >
    <div id="footernav_content1">
        <ul id="footernav-links1" style="text-align: center;">
		{if $glb_music_active eq 1 }
		<li style="float: right;">
		<audio controls autoplay>
		<source src="{$glb_site_url}/audios/{$glb_music_id}.ogg" type="audio/ogg">
		<source src="{$glb_site_url}/audios/{$glb_music_id}.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
		</audio>
		</li>
		{else}
		<li id="copyright" style="padding: 18px; float: none;">Created by <b>{$glb_male_name} </b> & <b>{$glb_female_name}</b></li>
		{/if}
		<!-- {$ownpage_links} -->
    </div>
</div>