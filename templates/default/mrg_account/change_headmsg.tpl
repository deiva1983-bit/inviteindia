 <!-- content --> 
</div></div>
{literal}
<script type="text/javascript" src="includes/scripts/ui/tcal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{/literal}
<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
{if $show_err eq 'yes'}<div style='text-align: center;' id='alert-text-err'><h3 class='red_err'>{$err_msg}</h3></div>{/if}
{if $show_succ eq 'yes'}<div style='text-align: center;' id='alert-text-succ'><h3 class='succ_err'>Your heading messages has been successfully updated.</h3></div>{/if}
	
	
<div class="body2">
    <div class="main">
        <article id="content2">
            <div class="wrapper">
                <section class="pad_left1">
                    <div class="wrapper ">
                        <div class="col1">

					<h2>Add your own heading text:</h2>
					<div class="container" style="width:auto;">
					      <table class="layout-grid" cellspacing="0" cellpadding="0" style="width:auto;">
						<tr>		 
							<td height="321px;" width="720px;">
								<div>
								<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" >
								<fieldset style="width: 650px;">
									<input type="hidden" name="glb_theme_id" id="glb_theme_id" value={$glb_theme_id} />
									<div id="create_own_head3">
										<p>
										<div class="field">
										<input type="text" id="txt_grooms_name" name="txt_grooms_name" class="inputval"  style="visibility: hidden;"/>
										<div><textarea id="txt_add_own_head_msg" name="txt_add_own_head_msg" rows="15" cols="100">{$txt_add_own_head_msg}</textarea>
										</div>
										<br />
											<div class="field"><span><em><font color="red">example: Venkateshwara Family Invites You..</font></em></span></div>
											
										</div>
										</p>

										<div class="field">
										<label style="width:150px;">&nbsp;</label>
											<div><input type="submit" name="add_own_head_msg" id="add_own_head_msg" value="Add My Own Text" class="button1" /> <button id="butt_close_head_msg" class="button1">Close</button></div>
										</div>
										</div>
								</fieldset>
								</form>
								</div>
							</td> 
							
						</tr>
						</table>
					      </div>


                      	
		</div>
                    </div>
                </section>
            </div>
        </article>
<!-- / content -->
    </div>
</div>
