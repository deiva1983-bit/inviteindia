<div class="contact" id="edit-pers-envelope">
	<div class="container">
	<h3 class="w3layouts_head">Website cover:<span> Envelope cover</span></h3>
		<form id='create_ownpage_title' name='' method='post' action='ownpage_details.php?wed_id={$tmplwedid}'>
		<input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
		<input type="hidden" value="{$wed_acc_id}" id="wed_accid" name="wed_accid" />

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own envelope cover</span></h2>
				<p><span><i class="fa fa-comments" aria-hidden="true"></i></span></p>
				</div>
				{if $blockpage eq '1'}<div class="alert validateTips ui-state-error" role='alert'>{$errors}</div>{/if}
				{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}
					<div class="contact-bottom" style="padding-top: 20px;">
                                                    <p>
							<table style='width: 650px;'>
							{foreach from=$select_cover key=k item=v}
								{if $k%2 eq 0}
								<tr bgcolor="#f2f2f2">
								{else}
								<tr bgcolor="#f2f2f2">
								{/if}
								<td>
								<div style='width: 100px;'>
								<img src='images/wedding_cover/bg_{$v.wed_cover_demo}.jpg' style='width: 650px;'>
								</div>
								</td></tr>
								<tr><td style='text-align: right; padding-top: 15px;'>{if $blockpage neq '1'}<a href='envelope.php?id={$v.wed_cover_autoid}&wed_id={$wed_acc_id}&do=createit' class="button">Select Cover</a>
								{/if} {if $animate_cover neq '0'}<a href="#" id='remove_cover_butt' name='remove_cover_butt' class='button' >Remove Cover</a>{/if}
								
								<!-- &nbsp;&nbsp;|&nbsp;&nbsp;<a href='www'><b>Demo Cover</b></a>--></td></tr>
							{/foreach}
							</table>
                                                    </p>
					<div>
				<div class="clearfix"></div>
			</div>
		</div></div>
		</form>
	</div>
</div>