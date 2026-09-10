<td class="left-nav" style='width: 25%;'>
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>My invitation</span></a></li>
            <li {if $do_val eq ''} class="active" {/if}><a href='e-wedding.php'><span>Invitation(s)</span></a></li>
        </ul>
    </div>
</div>
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Invitation Settings</span></a></li>
            <li class='last'><a href='{$page_url_status6}' target="_new"><span>Home page contents</span></a></li>
            <li class='last'><a href="birth-secure.php?b_id={$birth_acc_id}&do=b12d" {if $do_val eq 'b12d'} class="selected" {/if}><span>Personal details</span></a></li>
            <li class='last'><a href="birth-secure.php?b_id={$birth_acc_id}&page=2&do=b12dsan" {if $do_val eq 'b12dsan'} class="selected" {/if}><span>Event details</span></a></li>
            <li class='last'><a href="select_theme.php?b_id={$birth_acc_id}&do=sel0myli&type=2" {if $do_val eq 'sel0myli'} class="selected" {/if}><span>Theme customization</span></a></li>
            <!--<li class='last'><a href="birth-secure.php?b_id={$birth_acc_id}&do=ani" {if $do_val eq 'wedd_ani'} class="selected" {/if}><span>Animation settings</span></a></li>
             <li class='last'><a href="birth-secure.php?b_id={$birth_acc_id}&do=b12lasm" {if $do_val eq 'b12lasm'} class="selected" {/if}><span>Guestbook settings</span></a></li>
            <li class='last'><a href="wedsettings.php?wedid={$wed_acc_id}&do=manph&type=frmg" {if $do_val eq 'manph'} class="selected" {/if}><span>Photo albums control panel</span></a></li>
            <li class='last'><a href="wedding_animate.php?wed_id={$wed_acc_id}&do=kavi" {if $do_val eq 'wedd_ani'} class="selected" {/if}><span>Animation settings</span></a></li>
            <li class='last'><a href="gmap_search.php?wedid={$wed_acc_id}&do=searchloc" {if $do_val eq 'searchloc'} class="selected" {/if}><span>Search location settings</span></a></li>
            <li class='last'><a href="wed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'addcover'} class="selected" {/if}><span>Invitation cover</span></a></li>
            <li class='last'><a href="cwed_cover.php?wed_id={$wed_acc_id}&do=addcover" {if $do_val eq 'caddc'} class="selected" {/if}><span>Invitation cover - Classic</span></a></li>
            <li class='last'><a href="managepage.php?wed_id={$wed_acc_id}&do=b12d" {if $do_val eq 'ownpage'} class="selected" {/if}><span>Create your own page!</span></a></li> 
            <li class='last'><a href="wedding_music.php?wed_id={$wed_acc_id}&do=music" {if $do_val eq 'music'} class="selected" {/if}><span>Background music control</span></a></li> -->
          
        </ul>
    </div>
</div>
<div class="wrapper pad_bot1">
    <div id='cssmenu'>
        <ul>
            <li class='last'><a><span>Share your invitations</span></a></li>
		<li class='last'><a href="wed_share_sms.php?wed_id={$wed_acc_id}&do=sharem&type=dom" {if $do_val eq 'sharem'} class="selected" {/if}><span>By SMS</span></a></li>
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

<div class="normal" >
    <img src="images/localadd/{$local_add}.jpg" style='width: 247px;' />
</div>

