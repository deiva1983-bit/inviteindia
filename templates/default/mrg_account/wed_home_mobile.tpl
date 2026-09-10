<!-- contact -->
<div class="contact" id="wed_home" style="padding: 1em 0;">
	<div class="container">
	<h3 class="w3layouts_head">Manage your<span> invitation</span></h3>
	{if $error_msg neq ''}<div class="text-center"><h4 class='red_err'>{$error_msg}</h4></div>{/if}
	{if $alert_status eq '1'}<div class="text-center"><h4 class='green_succ'>{$alert_msg}</h4></div>{/if}
	{if $tot_count neq 0}
		{if $tot_count gte $max_card_per_acc}
			<div class="text-center"><h4 class='red_err'>We regret to inform you that you have reached the limit for creating invitations. Each account is restricted to three invitations.</h4></div>
		{/if}
		{if $tot_count gte $max_card_per_acc}{else}
		<p style="text-align: right;"><a href="invitation-templates.php"><img src="images/wed_secure/wed_create.JPG" width="180px;" /></a></p>
		<div class='green_succ sub_head'>Each account is allowed a maximum of {$max_card_per_acc} invitations. You can still create up to {$avi_in} more invitations.</div>
		{/if}
		{if $tot_count_wed neq 0} <!-- Start Wedding -->
		<div class="contact-main">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">
					<table align="center">
						<tr class='td-head-format-texts'>
							<td class="td-format-texts" style="width:40%;"><span class='sub_head'>Invitation(s)</span></td>
							<td class="td-format-texts" style="width:40%;"><span class='sub_head'>Action</span></td>
						</tr>
						{foreach from=$selectwed_count key=k item=v}
						{if $k%2 eq 0}
						<tr class='skillbar' style="display: table-row;">
						{else}
						<tr class='table_bg'>
						{/if}
						<td  class="td-format-texts">
							<div style="word-wrap:break-word; margin: 0px;" class='sub_head'><a href="{$glb_site_url}{$v.mrg_page_url}" target="_new" style='color: black;'>{$v.mrg_page_url}</a></div>
							<span>Valid: {$v.mrg_site_start_date} to {$v.mrg_site_end_date}</span>
						</td>
						<td class="td-format-texts">
							{if $v.mrg_status eq 3}
								<span id=links_red>Expired</span> &nbsp; &nbsp;|<a href="packages.php" style='color: black;'><span id=links_green>Renew</span></a>
							{elseif $v.mrg_status eq 4}
								<span id=links_red>Deleted</span>
							{else}
								<a href="wedding-secure.php?wed_id={$v.mrg_url_sts_auto_id}&do=b12d" style='color: black;'>Edit</a> 
							{/if}
						</td>
						</tr>
						{/foreach}
					</table>
				</div>
			</div>
		</div>
		{/if} <!-- End Wedding -->

		{if $tot_count_birth neq 0} <!-- Start Birthday -->
		<div class="contact-main w3agile">
			<div class="col-md-12 contact-left">
				<div class="contact-bottom">
					<table align="center">
						<tr class='td-head-format-texts'>
							<td class="td-format-texts" style="width:40%;"><h3 class='sub_head'>Invitations</h3></td>
							<td class="td-format-texts" style="width:40%;"><h3 class='sub_head'>Actions</h3></td>
						</tr>
						{foreach from=$selectbirth_count key=k item=v}
							{if $k%2 eq 0}
								<tr class='skillbar' style="display: table-row;">
							{else}
								<tr class='table_bg'>
							{/if}
							<td  class="td-format-texts"><div style="width: 100px; word-wrap:break-word;"><a href="{$glb_site_url}{$v.birth_page_url}" target="_new" style='color: black;'>{$v.birth_page_url}</a></div><div>Valid: {$v.birth_site_start_date} to {$v.birth_site_end_date}</div></td>
							<td  class="td-format-texts">
							{if $v.mrg_status eq 3}<span id=links_red>Expired</span> &nbsp; &nbsp;|<a href="packages.php" style='color: black;'><span id=links_green>Renew</span></a> {elseif $v.mrg_status eq 4} <span id=links_red>Deleted</span>
								{else}<a href="birth-secure.php?b_id={$v.birth_url_sts_auto_id}&do=b12d" style='color: black;'>Edit</a>{/if}
							</td>
						</tr>
						{/foreach}
					</table>
				</div>
			</div>
		</div>
		{/if} <!-- End Birthday -->
	<div>&nbsp;</div>
	{else}
	<div class="welcome">
		<div class="container">
					<p><a href="select_theme.php?do=cre0myli" class="button"><b>Create Invitation !</b></a>&nbsp; <a href="select_theme.php?do=demOkavi" class="button"><b>Check Invitation Designs !</b></a></p>
				<!-- <p class="w3_para">Registration at InviteIndia.com is absolutely free for all users. Registered users can browse through the extensive catalog of free samples and create your own exclusive wedding invitation. Registered users can upgrade to a paid premium member at any given time.</p> -->
			<div class="w3ls_news_grids"> 
				<div class="col-md-12 w3_agile_about_grid_left">
					<p>InviteIndia.com warmly welcomes all users to register for free. Discover the extensive collection of free samples and design your own unique wedding website. Logged-in users can upgrade to Premium Membership at any time.</p>
					<h4 class="sub_head ping-color">One Account, Three Wedding Websites</h4>
					<p>Once you sign up as a free or premium member, you can create up to three distinct wedding websites within your account. Each of your wedding websites will share the same validity and features based on the chosen package.</p>
					<h4 class="sub_head ping-color">Freemium services:</h4>
					<p>Enjoy all the features on your website for up to 20 days. To continue using all features beyond the 20th day, you will need to upgrade to a premium membership.</p>
					<p><a href="packages.php"><span class="ping-color">Click here</span></a> to learn more about the benefits of Premium Membership.</p>
					<p><a href="select_theme.php?do=cre0myli" class="button"><b>Create Invitation !</b></a>&nbsp; <a href="select_theme.php?do=demOkavi" class="button"><b>Check Invitation Designs !</b></a></p>
				</div>
			</div>
		</div>
		<div>&nbsp;</div>
	{/if}	
	</div>
</div>