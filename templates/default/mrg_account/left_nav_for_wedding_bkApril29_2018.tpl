<div class="categories">
	<ul>
	<h3>My Website(s)</h3>
		<li {if $do_val eq ''} class="categories-active" {/if}><a href='e-wedding.php'>Invitation(s)</a></li>
	{if $wed_acc_id neq ""}
	<h3>Website Settings</h3>
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
            
            <li class='last'><a href="managepage.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}><span>Create your own page!</span></a></li>
            <li class='last'><a href="wedding_music.php?wed_id={$wed_acc_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}><span>Background music control</span></a></li>
	<h3>Wedding cover</h3>
		<li class='last'><a href="envelope.php?wed_id={$wed_acc_id}" {if $do_val eq 'sharem'} class="selected" {/if}><span>Envelope design</span></a></li>
		<li class='last'><a href="wed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}><span>Invitation cover</span></a></li>
		<li class='last'><a href="cwed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}><span>Invitation cover - Classic</span></a></li>
	<h3>Classic theme features</h3>
		<li {if $do_val eq ''} class="active" {/if}><a href="changebg.php?wed_id={$wed_acc_id}&do=chgbg&type=kav" {if $do_val eq 'chgbg'} class="selected" {/if}><span>Change background image</span></a></li>
	<h3>Share your invitations</h3>
		<li class='last'><a href="wed_share.php?wed_id={$wed_acc_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By Email</span></a></li>
	{else}
	
	<h3>Website Settings</h3>
            <li class='last'><a href='{$page_url_status6}' target="_new"><span>Home page contents</span></a></li>
            <li class='last'><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}><span>Personal details</span></a></li>
            {if $user_log_id ge '4405'}
            <li class='last'><a href="weddingsecure.php?wed_id={$smarty.session.lastupdate_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            {else}
            <li class='last'><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            {/if}
            <!-- <li class='last'><a href="wedding-secure.php?wed_id={$smarty.session.lastupdate_id}&page=3&do=b12land" {if $do_val eq 'b12land'} class="selected" {/if}><span>Add Landmark & Others</span></a></li> -->
            <li class='last'><a href="wedding-themes.php?wed_id={$smarty.session.lastupdate_id}&do=sel0myli" {if $do_val eq 'sel0myli'} class="selected" {/if}><span>Theme customization</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manwish&type=frmg" {if $do_val eq 'manwish'} class="selected" {/if}><span>Guestbook control panel</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$smarty.session.lastupdate_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}><span>Photo albums control panel</span></a></li>
            <li class='last'><a href="wedding_animate.php?wed_id={$smarty.session.lastupdate_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}><span>Animation settings</span></a></li>
            <li class='last'><a href="gmap_search.php?wedid={$smarty.session.lastupdate_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}><span>Search location settings</span></a></li>
            
            <li class='last'><a href="managepage.php?wed_id={$smarty.session.lastupdate_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}><span>Create your own page!</span></a></li>
            <li class='last'><a href="wedding_music.php?wed_id={$smarty.session.lastupdate_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}><span>Background music control</span></a></li>
	<h3>Wedding cover</h3>
		<li class='last'><a href="envelope.php?wed_id={$smarty.session.lastupdate_id}" {if $do_val eq 'sharem'} class="selected" {/if}><span>Envelope design</span></a></li>
		<li class='last'><a href="wed_cover.php?wed_id={$smarty.session.lastupdate_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}><span>Invitation cover</span></a></li>
		<li class='last'><a href="cwed_cover.php?wed_id={$smarty.session.lastupdate_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}><span>Invitation cover - Classic</span></a></li>
	<h3>Classic theme features</h3>
		<li {if $do_val eq ''} class="active" {/if}><a href="changebg.php?wed_id={$smarty.session.lastupdate_id}&do=chgbg&type=kav" {if $do_val eq 'chgbg'} class="selected" {/if}><span>Change background image</span></a></li>
	<h3>Share your invitations</h3>
		<li class='last'><a href="wed_share.php?wed_id={$smarty.session.lastupdate_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By Email</span></a></li>
	{/if}
	</ul>
</div>