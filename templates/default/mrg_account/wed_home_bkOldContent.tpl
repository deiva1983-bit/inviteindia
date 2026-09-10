 <!-- content --> 
</div></div>
{if $error_msg neq ''}<div style='text-align: center;'><h3 class='red_err'>{$error_msg}</h3></div>{/if}
{if $alert_status eq '1'}<div style='text-align: center;'><h3 class='green_succ'>{$alert_msg}</h3></div>{/if}

<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">
                            <h3>Manage your <span>invitation</span></h3>
                            {if $selectwed_count neq 0}
                                {if $tot_count gte $max_card_per_acc}
                                    <p><h3 class='red_err'>Sorry, We allowed maximum {$max_card_per_acc} invitations per account. Your already created maximum invitations.</h3></p>
                                {/if}
                                {if $tot_count gte $max_card_per_acc}&nbsp;{else}
                                <p style="text-align: right;"><a href="select_theme.php?do=cre0myli"><img src="images/wed_secure/wed_create.JPG" width="180px;" /></a></p>
                                 <p><h3 class='green_succ'>We allowed maximum {$max_card_per_acc} invitations per account. Still you can create up to {$avi_in} invitations.</h3></p>
                                {/if}
                        <table align="center" style='width: 928px;'>
                        <tr class='box'>
                        <td class="normal" style="width:30%;"><h3 class='lab_color'>Invitations</h3></td>
                        <td class="normal" style="width:50%;"><h3 class='lab_color'>Actions</h3></td>
                        <td class="normal" style="width:10%;"><h3 class='lab_color'>Start date</h3></td>
                        <td class="normal" style="width:10%;"><h3 class='lab_color'>End date</h3></td>
                        </tr>
                        {foreach from=$selectwed_count key=k item=v}
                        {if $k%2 eq 0}
                            <tr class='table_bg'>
                        {else}
                            <tr class='table_bg'>
                        {/if}
                               <td  class="normal" style="width:30%; "><a href="{$glb_site_url}{$v.mrg_page_url}" target="_new" style='color: black;'>{$v.mrg_page_url}</a></td>

                               <td  class="normal" style="width:50%;">
                                {if $v.mrg_status eq 3}
                                <span id=links_red>Expired</span> &nbsp; &nbsp;|<a href="packages.php" style='color: black;'><span id=links_green>Renew</span></a>
                                {elseif $v.mrg_status eq 4}
                                <span id=links_red>Deleted</span>
                                {else}
                               <a href="wedding-secure.php?wed_id={$v.mrg_url_sts_auto_id}&do=b12d" style='color: black;'>Edit Wedding</a> | 
                               {if $v.mrg_status eq 1}
                                    <a href="wedsettings.php?wedid={$v.mrg_url_sts_auto_id}&do=chgsts&type=2" style='color: black;'><span id=links_red>Inactive</span></a>
                                {elseif $v.mrg_status eq 2}
                                    <a href="wedsettings.php?wedid={$v.mrg_url_sts_auto_id}&do=chgsts&type=1" style='color: black;'><span id=links_green>Active</span></a> 
                                {else}
                                <span id=links_red>Expired</span>
                                {/if}
                               &nbsp;&nbsp;| <a href="wed_share.php?wed_id={$v.mrg_url_sts_auto_id}&do=sharem&type=dom" style='color: black;'>Share it by email</a>
                               {/if}
                               </td>
                                <td  class="normal" style="width:10%;">{$v.mrg_site_start_date}</td>
                                <td  class="normal" style="width:10%;">{$v.mrg_site_end_date}</td>
                               </tr>
                        {/foreach}
                        {else}
                        <table align="center" style='width: 928px;'>
                        <tr><td style="align: center; display: none;">
                                    <img src='images/welcome_wed.jpg' alt="welcome to wedding website">
                        </td></tr>

                        <tr><td style='padding-top: 10px;'>
                        <span style='font-size: 15px;'>Inviteindia lets you create your own online wedding invitation and share with your friends. This service can be availed free of cost for the first 20 days.</span>
                        
                        <span style='font-size: 15px;'>Upgrade to premium membership (silver, gold, and platinum) and choose from a variety of designs while enjoying a much longer validity.</span>
                        
                        </td></tr>
                        <!-- <tr><td style='padding-top: 5px;'>
                        <span style='font-size: 15px;'>You can upgrade as a paid Premium Member (Platinum or Gold  or Silver) any time.  Once you upgrade your wedding invitations getting more validity.</span>
                        </td></tr> -->

                        <tr><td style='padding-top: 5px;'>&nbsp;</td></tr>
                        
                        <tr><td style='padding-top: 5px;'><h3><font color="red">{$maxcard_per_acc} invitations, But one account</font></h3></td></tr>
                        <tr><td style='padding-top: 5px;'>
                        <span style='font-size: 15px;'>
                        Once you created your account (free account or membership account), you can create up to {$maxcard_per_acc} invitations using your account. All invitations from your account will get expired based on your membership.,</span>
                        </td></tr>
                        <tr><td style='padding-top: 5px;'>&nbsp;</td></tr>

                        <tr><td style='padding-top: 5px;'>
                            <span style='font-size: 15px;'>To know more about Premium Membership features <a href="packages.php" target="_new">Click Here.</a></span>
                        </td></tr>
                         

                        <tr><td  style='padding-top: 25px;'>
                        <p   style='text-align: center;'><a href="select_theme.php?do=cre0myli" class="button1" style="width: 300px;" ><b>Create Invitation !</b></a>&nbsp; <a href="select_theme.php?do=demOkavi" class="button1" style="width: 300px;"><b>Check Invitation Designs !</b></a></p>
                        </td></tr>


                        {/if}
                        </table>

                        </div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
