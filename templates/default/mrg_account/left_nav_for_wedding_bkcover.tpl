<td class="left-nav">
<dl class="demos-nav">				
<dt>Invitation Home</dt>
	<dd><a href="e-wedding.php" {if $do_val eq ''} class="selected" {/if}>My wedding cards</a></dd>
<dt>Invitation Settings</dt>
	{if $wed_acc_id neq ""}
	<dd><a href="{$page_url_status6}" target="_new">Edit Home page contents</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}>Edit personal details</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}>Edit Address & Events</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}>Add Landmark & Others</a></dd>
	<dd><a href="select_theme.php?wed_id={$wed_acc_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}>Change theme</a></dd>
	<dd><a href="wedsettings.php?wedid={$wed_acc_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}>Manage Wishes</a></dd>
	<dd><a href="wedsettings.php?wedid={$wed_acc_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}>Manage album photos</a></dd>
	<dd><a href="wedding_animate.php?wed_id={$wed_acc_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}>Wedding animations</a></dd>
	<dd><a href="gmap_search.php?wedid={$wed_acc_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}>Search Location Settings</a></dd>	
	<dt>Share Invitation</dt>
	<dd><a href="wed_share.php?wed_id={$wed_acc_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}>Send Email</a></dd>
	{else}
	<dd><a href="{$page_url_status6}"  target="_new">Edit Home page contents</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}>Edit personal details</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}>Edit Address & Events</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}>Add Landmark & Others</a></dd>
	<dd><a href="select_theme.php?wed_id={$smarty.session.lastupdate_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}>Change theme</a></dd>
	<dd><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}>Manage Wishes</a></dd>
	<dd><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}>Manage album photos</a></dd>
	<dd><a href="wedding_animate.php?wed_id={$smarty.session.lastupdate_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}>Wedding animations</a></dd>
	<dd><a href="gmap_search.php?wedid={$smarty.session.lastupdate_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}>Search Location Settings</a></dd>		
	<dt>Share Invitation</dt>
	<dd><a href="wed_share.php?wed_id={$smarty.session.lastupdate_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}>Send Email</a></dd>
	{/if}

</dl>
</td>