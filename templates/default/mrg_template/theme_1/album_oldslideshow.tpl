<link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script>
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script>
<div>
		<div class="content centr">
		<h1  style="text-align: center;"><span id='pageheddings'>{$tpl_album_title}</span></h1>
		<table border="0" align="center">
		<tr><td colspan="2" align="center"><div><p>{$pagenation}</p></div></td></tr>
		<tr> <td style="vertical-align:top;">
		 <div id="main-img"><a class="vlightbox1" href="{$total_imgs}" title=""><img alt="" src="{$total_imgs}" width="300px"  class="home_img" /></a></div>               
		</td><td>
			<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
			<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
			<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
			<div id="wish-form" style="overflow: visible;">
			<label style="width: 300px;">{$tpl_album_names}</label>
			<input type="text" name="comm_name" id="comm_name" value="" />
			</div>
			<div id="wish-form" style="overflow: visible;">
			<label style="width: 300px;">{$tpl_album_comm}</label>
			<textarea name="comm_msg" id="comm_msg" style="width: 196px;height: 50px;"></textarea>
			</div>
			<div id="wish-form" style="overflow: visible;">
			<input type="submit" id="comments_save" class="fifthsubmit" value="Post" />
			<input type="reset" id="comments_clear" class="fifthsubmit" value="Clear" />
			</div>

			<div class="listcomment" id="listcomment" style="width: 366px">
			{$glb_commdetails}
			</div>
		</td>
		</tr>
        </table>
		</div>

		<div class="clearer"><span></span></div>
	</div>
	<div id="vlightbox1" style="display: none;">
			{if $glb_selectphoto_access neq 0}
						{foreach from=$glb_selectphoto_access key=k item=v}	
						{if $v.photo_auto_id neq $img_ids}
							<a class="vlightbox1" href="{$glb_site_url}templates/albums/{$glb_master_id}/{$v.photo_path}" title="{$v.photo_des}"><img src="#" alt="{$v.photo_des}"></a>
						{/if}
			{/foreach}
			{/if}
			</div>
	<div class="footer">	
	{include file="default/mrg_template/footer_links.tpl"}	&nbsp;
	</div>
</div>
</body>
</html> 