<link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">		
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script> 		
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script>
<div id="center_content">	
    <div class="center_top_bg"></div>
	<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
	<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
	<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
<div class="center_bg">
<div class="title">{$tpl_album_title}</div>
<div><div  style="padding-left: 300px">{$pagenation}</div></div>
		<div class="home_left_content" id="album_con">
			<p>
			<div id="wish-form" align="center">
			<a class="vlightbox1" href="{$total_imgs}" title=""><img alt="" src="{$total_imgs}" max-width="300px" class="alb_img home_img"/></a> 
			</div>
			</p>
			<table border="0" align="center">
			<tr><td style="vertical-align:top;">
			<p>
			<div id="wish-form">
			<label class="small">{$tpl_album_names}</label>
			<input type="text" name="comm_name" id="comm_name" value="" class="large_input"  style="width: 250px;" />
			</div>
			</p>
			
			<p>
			<div id="wish-form">
			<label class="small">{$tpl_album_comm}</label>
			<textarea name="comm_msg" id="comm_msg" style="width: 250px;height: 50px;" class="large_input"></textarea>
			</div>
			</p>
			
			<br /><br /><br /><br />
			<p>
			<div style="float:center;" id="wish-form">
			<input type="submit" id="comments_save" class="fourthsubmit" value="Post" />
			<input type="reset" id="comments_clear" class="fourthsubmit" value="Clear" />
			</div> 
			</p>

			</td><td style="vertical-align:top;">
			<div class="listcomment" id="listcomment">
			{$glb_commdetails}
			</div>
			</td>
		</tr>
	</table>
		<div id="vlightbox1" style="display: none;">
			{if $glb_selectphoto_access neq 0}
				{foreach from=$glb_selectphoto_access key=k item=v}	
				{if $v.photo_auto_id neq $img_ids}
				<a class="vlightbox1" href="{$glb_site_url}templates/albums/{$glb_master_id}/{$v.photo_path}" title="{$v.photo_des}"><img src="#" alt="{$v.photo_des}"></a>
				{/if}
			{/foreach}
			{/if}
		</div>
	</div>
	<div class="clear"></div>
    </div>
    <div class="center_bottom_bg"></div>  
    </div>  
            
    <div id="footer" align="center" style="padding-top: 10px;">{include file="default/mrg_template/footer_links.tpl"}
    </div>



</div>
</body>
</html>