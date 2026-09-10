<div class="contact" id="manage-wishes">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Manage wedding wishes</span></h3>
	{if $alert_status eq '1'}<div class="alert green_succ" role='alert'>{$alert_msg}</div>{/if}

		<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="wedsettings.php?wedid={$glb_curr_wedid}&do=manwishes&type=frmg" enctype="multipart/form-data">
		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Guestbook<span> Management</span></h2>
				<p><span><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span></p>
				</div>
				<div id="validateTips" class="alert validateTips" role='alert'></div>
                                                        
                                                            {if $total_msg eq 0}
							    <div class="alert ui-state-error" role='alert'>We're sorry, at the moment we don't have any wedding wishes. </div>
                                                            {else}
                                                            <div class="listcomment" id="listcomment">
                                                            {$wishdetails}
                                                            </div>
                                                            {/if}
			 </div>	
		<div class="clearfix"> </div>
		</div>
		</form>
	</div>
</div>