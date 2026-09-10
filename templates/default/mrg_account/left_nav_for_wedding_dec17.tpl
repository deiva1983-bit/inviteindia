<td class="left-nav" style='width: 25%;'>
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>My invitation</span></a></li>
            <li {if $do_val eq ''} class="active" {/if}><a href='e-wedding.php'><span>Invitation(s)</span></a></li>
        </ul>
    </div>
</div>
{if $wed_acc_id neq ""}
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Invitation Settings</span></a></li>
            <li class='last'><a href='{$page_url_status6}' target="_new"><span>Home page contents</span></a></li>
            <li class='last'><a href="wedding-secure.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}><span>Personal details</span></a></li>
            {if $user_log_id ge '4405'}
            <li class='last'><a href="weddingsecure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            {else}
            <li class='last'><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            {/if}
            <!-- <li class='last'><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}><span>Add Landmark & Others</span></a></li> -->
            <li class='last'><a href="wedding-themes.php?wed_id={$wed_acc_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}><span>Theme customization</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$wed_acc_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}><span>Guestbook control panel</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$wed_acc_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}><span>Photo albums control panel</span></a></li>
            <li class='last'><a href="wedding_animate.php?wed_id={$wed_acc_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}><span>Animation settings</span></a></li>
            <li class='last'><a href="gmap_search.php?wedid={$wed_acc_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}><span>Search location settings</span></a></li>
            <li class='last'><a href="wed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}><span>Invitation cover</span></a></li>
            <li class='last'><a href="cwed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}><span>Invitation cover - Classic</span></a></li>
            <li class='last'><a href="managepage.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}><span>Create your own page!</span></a></li>
            <li class='last'><a href="wedding_music.php?wed_id={$wed_acc_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}><span>Background music control</span></a></li>
          
        </ul>
    </div>
</div>
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Share your invitations</span></a></li>
		<!-- <li class='last'><a href="wed_share_sms.php?wed_id={$wed_acc_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By SMS</span></a></li> -->
		<li class='last'><a href="wed_share.php?wed_id={$wed_acc_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By Email</span></a></li>
        </ul>
    </div>
</div>
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Classic theme features</span></a></li>
            <li {if $do_val eq ''} class="active" {/if}><a href="changebg.php?wed_id={$wed_acc_id}&do=chgbg&type=kav" {if $do_val eq 'chgbg'} class="selected" {/if}><span>Change background image</span></a></li>
        </ul>
    </div>
</div>

{else}
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Invitation Settings</span></a></li>
            <li class='last'><a href='{$page_url_status6}' target="_new"><span>Home page contents</span></a></li>
            <li class='last'><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}><span>Personal details</span></a></li>
            {if $user_log_id ge '4405'}
            <li class='last'><a href="weddingsecure.php?wed_id={$smarty.session.lastupdate_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            {else}
            <li class='last'><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            {/if}
            <!-- <li class='last'><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}><span>Add Landmark & Others</span></a></li> -->
            <li class='last'><a href="wedding-themes.php?wed_id={$smarty.session.lastupdate_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}><span>Theme customization</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}><span>Guestbook control panel</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}><span>Photo albums control panel</span></a></li>
            <li class='last'><a href="wedding_animate.php?wed_id={$smarty.session.lastupdate_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}><span>Animation settings</span></a></li>
            <li class='last'><a href="gmap_search.php?wedid={$smarty.session.lastupdate_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}><span>Search location settings</span></a></li>
            <li class='last'><a href="wed_cover.php?wed_id={$smarty.session.lastupdate_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}><span>Invitation cover</span></a></li>
            <li class='last'><a href="cwed_cover.php?wed_id={$smarty.session.lastupdate_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}><span>Invitation cover - Classic</span></a></li>
            <li class='last'><a href="managepage.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}><span>Create your own page!</span></a></li>
            <li class='last'><a href="wedding_music.php?wed_id={$smarty.session.lastupdate_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}><span>Background music control</span></a></li>
        </ul>
    </div>
</div>

<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
        <li class='last'><a><span>Share your invitations</span></a></li>
	<!-- <li class='last'><a href="wed_share_sms.php?wed_id={$smarty.session.lastupdate_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By SMS</span></a></li> -->
	<li class='last'><a href="wed_share.php?wed_id={$smarty.session.lastupdate_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By Email</span></a></li>
        </ul>
    </div>
</div>

<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Classic theme features</span></a></li>
            <li {if $do_val eq ''} class="active" {/if}><a href="changebg.php?wed_id={$smarty.session.lastupdate_id}&do=chgbg&type=kav" {if $do_val eq 'chgbg'} class="selected" {/if}><span>Change background image</span></a></li>
        </ul>
    </div>
</div>
{/if}
<div class="normal" >
    <img src="images/localadd/{$local_add}.jpg" style='width: 247px;' />
</div>

<!--
<dl class="demos-nav">
<dt>Invitation Home</dt>
	<dd><a href="e-wedding.php" {if $do_val eq ''} class="selected" {/if}>My wedding cards</a></dd>
<dt>Invitation Settings</dt>
	{if $wed_acc_id neq ""}
	<dd><a href="{$page_url_status6}" target="_new">Edit Home page contents</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}>Edit personal details</a></dd>
	{if $user_log_id ge '4405'}
	<dd><a href="weddingsecure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}>Edit Address & Events</a></dd>
	{else}
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}>Edit Address & Events</a></dd>
	{/if}
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}>Add Landmark & Others</a></dd>
	<dd><a href="select_theme.php?wed_id={$wed_acc_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}>Change theme</a></dd>
	<dd><a href="wedsettings.php?wedid={$wed_acc_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}>Manage Wishes</a></dd>
	<dd><a href="wedsettings.php?wedid={$wed_acc_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}>Manage album photos</a></dd>
	<dd><a href="wedding_animate.php?wed_id={$wed_acc_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}>Wedding animations</a></dd>
	<dd><a href="gmap_search.php?wedid={$wed_acc_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}>Search Location Settings</a></dd>
	<dd><a href="wed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}>Wedding cover</a></dd>
	<dd><a href="cwed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}>Classic wedding cover</a></dd>
	<dd><a href="managepage.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}>Manage your own page</a></dd>
	<dd><a href="wedding_music.php?wed_id={$wed_acc_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}>Wedding music</a></dd>
	<dt>Classic theme features</dt>
	<dd><a href="changebg.php?wed_id={$wed_acc_id}&do=chgbg&type=kav" {if $do_val eq 'chgbg'} class="selected" {/if}>Change Background image</a></dd>
	<dt>Share Invitation</dt>
	<dd><a href="wed_share.php?wed_id={$wed_acc_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}>Send Email</a></dd>
	{else}
	<dd><a href="{$page_url_status6}"  target="_new">Edit Home page contents</a></dd>
	<dd><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}>Edit personal details</a></dd>
	{if $user_log_id ge '4405'}
	<dd><a href="weddingsecure.php?wed_id={$smarty.session.lastupdate_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}>Edit Address & Events</a></dd>
	{else}
	<dd><a href="wedding-secure.php?wed_id={$wed_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}>Edit Address & Events</a></dd>
	{/if}
	<dd><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}>Add Landmark & Others</a></dd>
	<dd><a href="select_theme.php?wed_id={$smarty.session.lastupdate_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}>Change theme</a></dd>
	<dd><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}>Manage Wishes</a></dd>
	<dd><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}>Manage album photos</a></dd>
	<dd><a href="wedding_animate.php?wed_id={$smarty.session.lastupdate_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}>Wedding animations</a></dd>
	<dd><a href="gmap_search.php?wedid={$smarty.session.lastupdate_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}>Search Location Settings</a></dd>	
	<dd><a href="wed_cover.php?wed_id={$smarty.session.lastupdate_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}>Wedding cover</a></dd>
	<dd><a href="cwed_cover.php?wed_id={$smarty.session.lastupdate_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}>Classic wedding cover</a></dd>
	<dd><a href="managepage.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}>Manage your own page</a></dd>
	<dd><a href="wedding_music.php?wed_id={$smarty.session.lastupdate_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}>Wedding music</a></dd>
	<dt>Classic theme features</dt>
	<dd><a href="changebg.php?wed_id={$smarty.session.lastupdate_id}&do=chgbg&type=kav" {if $do_val eq 'chgbg'} class="selected" {/if}>Change Background image</a></dd>
	<dt>Share Invitation</dt>
	<dd><a href="wed_share.php?wed_id={$smarty.session.lastupdate_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}>Send Email</a></dd>
	{/if}

</dl>
</td>
-->