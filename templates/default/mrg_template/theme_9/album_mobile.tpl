
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="img_id" id="img_id" value="{$img_ids}" />
<div id="main-wrap">
<h1 style="text-align: center;"><span id='pageheddings'>{$tpl_album_title}</span></h1>
<div class="devider_main text-center"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
	<div id="container" class="isotom_lant clearfix">
	
	<ul>
	   {$albuminfosnew}
	</ul>

			
	  </div><!-- end container -->
	</div><!-- end main-wrap -->
	</div><!-- end total wrapper -->
<!-- End Quantcast tag -->
<div id='center_footer' class='center_footer' style='height: 90px;'></div>
 <div class="footer">
	{include file="default/mrg_template/footer_links_latest.tpl"}	&nbsp;
	</div>
	<script type="text/javascript" src="templates/default/mrg_template/magic_popup/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="templates/default/mrg_template/magic_popup/system.js"></script>
    <link type="text/css" rel="stylesheet" href="templates/default/mrg_template/magic_popup/style.css">
    <link type="text/css" rel="stylesheet" href="templates/default/mrg_template/magic_popup/magnific-popup.css">
    
    

</body>
</html>