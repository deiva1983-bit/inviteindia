{include file="default/mrg_template/wed_animations.tpl"}
	<div id="wrapper">
		<div id="page-wrap">
			<div id="header">
{include file="default/head_designs/design2.tpl"}


<h1 style="text-align: center; padding-top: 223px;">
	<div><span id='homepageheddings'>{$glb_male_name}</span><span id='homepageheddings'>&nbsp;&amp;&nbsp;</span><span id='homepageheddings'>{$glb_female_name}</span></div>
	<div style='padding-top: 10px;'><span id='pageheddings'>{$glb_marriage_date_title}</span></div>
</h1>

				<!-- <div id="sitename"><span class="wsite-logo"><a href="{$glb_img_urls}"><img src="{$glb_img_urls}sub_1/6013020.png"></a></span>
				</div>-->
			</div> <!-- header -->

			<div id="content-wrapper" style='padding-top: 70px;'>
				<div id="content">
					<div id="wsite-content" class="wsite-elements wsite-not-footer">
						<div>				
							{if $glb_home_img_status eq 1} <div class="wsite-image wsite-image-border-none " style="padding-top:10px;padding-bottom:10px;margin-left:0;margin-right:0;text-align:center"> {else} <div style="text-align: center;" > {/if}
							{if $glb_home_img_status eq 1}
							<img alt="" src="{$glb_homeimg}" width="300px" class="home_img" />
							
							{elseif $glb_home_img_status eq 2}
							<img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" />
							<img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" />
							{/if}
							{if $glb_home_img_status eq 1} </div> {else} </div> {/if}
							{if $glb_home_img_status eq 2} <div class="h-divider"></div> {/if}			
							<div style="display:block;font-size:90%"></div>
						</div>
					</div>
					
					

				</div>
		</div> <!-- content wrapper -->
	</div> <!-- Page wrap -->

			<div id="footer">
				<div id="footer-content">
					<script type="text/javascript">expandedFooterController.initialize();</script>
				<div>
			</div>
</div> <!-- wrapper -->
{include file="default/mrg_template/footer_links.tpl"}
</div> <!-- body-wrap --></body></html>