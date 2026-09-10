<link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script> 
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script>
<!-- content --><h2 style="text-align: center;"><span id='pageheddings'>{$tpl_album_title}</span></h2>
		<section id="content">
			<article class="col1">
		
			 <table border="0" align="center">
		<tr><td colspan="3" align="center"><div><p>{$pagenation}</p></div></td></tr>
		<tr> <td style="vertical-align:top;">
		 <div>
		 <a class="vlightbox1" href="{$total_imgs}" title=""><img alt="" src="{$total_imgs}" width="300px" class="alb_img"/></a></div>
		</td><td>&nbsp;</td><td padding-left: "3px;">
			<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
			<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
			<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
			<div id="wish-form" style="overflow: visible;">
					<form id="ContactForm" action="#" onsubmit='return false;'><div>
						<div  class="wrapper"><input type="text" class="input" name="comm_name" id="comm_name" style="width:350px;" />{$tpl_album_names}</div>
						<div  class="wrapper"><textarea name="comm_msg" id="comm_msg" cols="1" rows="1" style="width:350px;" ></textarea>{$tpl_album_comm}</div>
						<!-- <input type="submit" class="button" style = "float: right;margin-left: 5px;margin-right: 5px;padding: 0 22px; height:30px;" id="msg_login" class="button" value="Post" /> -->						
						<a  style="cursor:pointer;margin-right:5px;margin-left:5px;float:right;padding:0 22px;" class="button" id="comments_clear">Clear</a>
						<a  style="cursor:pointer;margin-right:5px;margin-left:5px;float:right;padding:0 22px;" class="button" id="comments_save">Submit</a>
					</div></form>
					
			</div> <br />
			<div class="listcomment" id="listcomment" style="width: 484px">
			{$glb_commdetails}
			</div>
		</td>
		</tr>
        </table>
			 
	   		</article>
			 
		</section>	<div id="vlightbox1" style="display: none;">
			{if $glb_selectphoto_access neq 0}
						{foreach from=$glb_selectphoto_access key=k item=v}	
						{if $v.photo_auto_id neq $img_ids}
							<a class="vlightbox1" href="{$glb_site_url}templates/albums/{$glb_master_id}/{$v.photo_path}" title="{$v.photo_des}"><img src="#" alt="{$v.photo_des}"></a>
						{/if}
			{/foreach}
			{/if}
		</div>
<!-- / content -->
	</div>
	<div class="block">{include file="default/mrg_template/footer_links.tpl"}</div>
</div> </div></div> </div>  
</body>
</html>  