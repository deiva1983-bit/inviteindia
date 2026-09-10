<link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script>
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script>
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
<div id="main-wrap">
	<div class="container">
		<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_album_title}<span></h1>
		<div>{$pagenation}</div>
			<div>
				<table border="0" align="center">
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td style="vertical-align: top;">
						<div id="main-img" class="people alb_img"><a class="vlightbox1" href="{$total_imgs}" title=""><img alt="" src="{$total_imgs}" max-width="400px" /></a></div>
						</td>
					<td>
					
					<table>
					<tr><td>{$tpl_album_names}</td>
					<td><input type="text" name="comm_name" id="comm_name" value="" style="width: 220px;"/></td>
					</tr>

					<tr><td>{$tpl_album_comm}</td>
					<td><textarea name="comm_msg" id="comm_msg" style="width: 220px;height: 50px;"></textarea></td>
					</tr>
					
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr><td colspan="2">
					<input type="submit" id="comments_save" class="fifthsubmit" value="Post" />
					<input type="reset" id="comments_clear" class="fifthsubmit" value="Clear" />
					</td></tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr><td colspan="2">
					<div class="listcomment" id="listcomment" style="width: 466px">
					{$glb_commdetails}
					</div>
					</td></tr>
					</table>
					</td></tr>
					</table>
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
	  </div><!-- end container -->
	</div><!-- end main-wrap -->
	</div><!-- end total wrapper -->
<!-- End Quantcast tag -->
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
 <div class="footer">
	{include file="default/mrg_template/footer_links.tpl"}	&nbsp;
	</div>
</body>
</html>