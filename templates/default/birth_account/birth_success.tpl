 <!-- content --> 
</div></div>
{if $glb_err_msg eq '1'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$glb_txt_msg}</h3></div>{/if}
{if $blockpage eq '1'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$errors}</h3></div>{/if}
{if $alert_status eq '1'}<div style='text-align: center;' id='alert-text-succ'><h3 class='green_succ'>Your music has been successfully uploaded. Click Update Button to add your invitations.</h3></div>{/if}

<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
                            <table class="layout-grid" cellspacing="0" cellpadding="0">
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr>{$left_nav_for_wed}
                                        <td style='width: 75%;'>
                                            <div>
                                                <h3 style='padding: 0px;'>Invitation settings: <span>Wedding music</span></h3>			
                                                    <form name='wed_music' id='wed_music' method='post' action='wedding_music.php?wed_id={$user_wedid}&do=addmusic' enctype="multipart/form-data" onsubmit='return false;'>
                                                    <input type="hidden" value="{$glb_from_src}" id="wed_succ_con" name="wed_succ_con" />
                                                    <input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" />
                                                    <input type="hidden" name="theme_id" id="theme_id" value="{$user_wedid}" />
                                                    <input type="hidden" name="music_id" id="music_id" value="{$user_wedid}" />
                                        			<div id="links_green" class="validateTips" style='padding-bottom: 5px;'></div>

			                                        <div><h3>Select your music:</h3></div>
			                                        <div>{$glb_wed_musics}</div>
                                                    <div style='padding-top: 10px; padding-bottom: 10px;'>
                                                    <span style='{$glb_add_music_sts}' id='own_music_sec'>
                                                        <h3>Add your music:</h3>
                                                        <div class="field">
                                                        {$glb_wed_music_own} 
                                                        </div>
                                                        <div class="field">
                                                        <label style="width:200px;" class='lab_black_color'>Upload your music:</label> 
					                                    <input type="file" name="uploaded_music" id="uploaded_music" class="inputval"/>
					                                    </div>
                                                        <div class="field"><button id="butt_create_own_music" value='upmu' class="button1">Upload music</button>
                                                        </div>
                                                    </span></div>	
                                                    <div>
                                                        <button id="butt_play_music" class="button1">Play</button>
                                                        {if $blockpage neq '1'}<button id="butt_create_add_music" class="button1">Update</button>
                                                        <button id="butt_create_rem_music" class="button1">Delete</button>{/if} <button id="butt_add_own" class="button1">Add your own music</button>
                                                    </div><!-- End demo -->
                                                    </form>
                                                    </div>
		                                </td>
                                   </tr>
	                        </table>
                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
