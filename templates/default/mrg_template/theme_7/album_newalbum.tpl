<link rel="stylesheet" href="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script> 
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script>
<div class="content contentMid">
		<div class="contentMid1">
			<div class="contentMid2">

<div class="layout profileLayout">
	<div class="row row0 rowPath0 rowDepth0" id="row0">
		<div class="column column0 columnPath0_0 columnDepth1 firstColumn lastColumn" id="col0_0">
			<div class="columnEnd"></div>
		</div>
		<div class="rowEnd"></div>
	</div>
	<div class="row row1 rowPath1 rowDepth0" id="row1">
		 <div class="column column1 columnPath1_1 columnDepth1 lastColumn" id="col1_1">

 
 
<div class="module module5 columnModule2 odd blurbsModule" id="module10">
	<div class="moduleTop">
		<div>
			<div></div>
		</div>
	</div>
	<div class="moduleMid">
		<div class="moduleMid1">
			<div class="moduleMid2">
				<!-- <h3 class="moduleHead"><span>Blurbs</span></h3> -->
				<div class="moduleBody">
					<div class="autoResize blurbAboutMe">
					<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
				<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
				<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
					 
				
			<h3 class="moduleHead" style='text-align: center;'><span id='pageheddings' >{$tpl_album_title}</span></h3>
			<br />			
			<div style="margin-left: 20px;">	  
			<div><div style="padding-left: 300px">{$pagenation}</div></div>
			<br /><br />
			<table border="2" align="center" width="100%">
				<tr>
				<td style="vertical-align:top; width: 430px;">
					<table border="2" align="center" width="100%">
						<tr><td>
								<p>
								<div id="wish-form" align="center" >
								<a class="vlightbox1" href="{$total_imgs}" title=""><img alt="" src="{$total_imgs}" width="300px" class="alb_img"/></a>
								</div>
								</p> 
						</td></tr>
					</table>
				</td>
				<td style="vertical-align:top;">
						<table border="2" align="center" width="100%" >
						<tr><td>
						<label class="small">{$tpl_album_names}</label>
						</td><td>
						<input type="text" name="comm_name" id="comm_name" value="" class="large_input"  style="width: 250px;" />
						</td></tr>
						
						
						<tr><td>
						<label class="small">{$tpl_album_comm}</label>
						</td><td>
						<textarea name="comm_msg" id="comm_msg" style="width: 250px;height: 50px;" class="large_input"></textarea>
						</td></tr>
						
						<tr><td colspan="2">&nbsp;</td></tr>
						<tr><td colspan="2"> 
						<input type="submit" id="comments_save" class="fourthsubmit" value="Post" />
						<input type="reset" id="comments_clear" class="fourthsubmit" value="Clear" />
						</td></tr>
						
						
						<tr><td colspan="2">&nbsp;</td></tr>
						<tr><td colspan="2"> 
						  <div class="listcomment" id="listcomment">
							{$glb_commdetails}
							</div>
						</td></tr>
					</table>
				</td>
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
					 	 
				 
					
						 
	 </div>
					 
					<div class="moduleBodyEnd"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="moduleBottom">
		<div>
			<div></div>
		</div>
	</div>
</div>

 

<div class="columnEnd"></div></div><div class="column column2 columnPath1_2 columnDepth1" id="col1_2"><div class="columnEnd"></div></div><div class="column column3 columnPath1_3 columnDepth1" id="col1_3"><div class="columnEnd"></div></div><div class="rowEnd"></div></div><div class="row row2 rowPath2 rowDepth0" id="row2"><div class="column column0 columnPath2_0 columnDepth1 firstColumn lastColumn" id="col2_0"><div class="columnEnd"></div></div><div class="rowEnd"></div></div></div></div></div>

</div><div class="contentBottom"><div><div></div></div></div>

	<div id="footer">
		<br>
		{include file="default/mrg_template/footer_links.tpl"}
		 
	</div>
</div>
<br>
 
  

</body></html>