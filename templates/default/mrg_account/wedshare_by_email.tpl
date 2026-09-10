<div class="contact" id="edit-pers-wed-share">
	<div class="container">
	<h3 class="w3layouts_head">Website settings:<span> Share your website</span></h3>
	<form id="wedshare_by_mail" name="wedshare_by_mail" class="form_cls" method="post" action="">
	<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />

		<div class="contact-main w3agile">
			<div class="col-md-3 contact-left">
			<div class="contact-bottom">
				<div><p>{$left_nav_for_wed}</p></div>
			</div>
			</div>
			
			<div class="col-md-9">
				<div class="w3layouts_header">
				<h2 class="sub_head_max">Design your<span> own page</span></h2>
				<p><span><i class="fa fa-comments" aria-hidden="true"></i></span></p>
				</div>
				{if $err_sts eq '1'}<div style='text-align: center;' {if $err_class eq 'succ'} id='alert-text-succ' {else} id='alert-text-err'{/if} ><h3 class='{if $err_class eq 'succ'}green_succ{else}red_err{/if}'>{$err_msg}</h3></div>{/if}

					<div class="contact-bottom">
                                                            <div>
                                                            <label>Email(s):<span id="links_red">*</span></label>
                                                            <div class="example-container">
                                                            <textarea id="tags" name="friends_emails" rows="2" cols="160" style="height: 4em;">{$friendslist}</textarea>
                                                            </div>
                                                            </div>

                                                            <div>
                                                            <label>Subject:<span id="links_red">*</span></label>
                                                            <div class="example-container">
                                                            <textarea id="email_sub" name="email_sub" rows="1" cols="160" style="height: 4em;">{$emailsub}</textarea>
                                                            </div>
                                                            </div>

                                                            <div>
                                                            <label>Information about marriage:<span id="links_red">*</span></label>
                                                            <div><textarea id="txt_area_share_by_mail" name="txt_area_share_by_mail" rows="15" cols="60">{$emailshare}</textarea> 
                                                            {literal}
                                                              <script type="text/javascript">
                                                            //<![CDATA[

                                                                // Replace the <textarea id="editor"> with an CKEditor
                                                                // instance, using default configurations. [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
                                                                CKEDITOR.replace( 'txt_area_share_by_mail',
                                                                    {
                                                                        extraPlugins : 'uicolor',
                                                                        toolbar :
                                                                        [
                                                                            [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Font', 'FontSize' , 'TextColor'],
                                                                             
                                                                        ]
                                                                    });

                                                            //]]>
                                                            </script>
                                                            {/literal}
                                                            </div>
                                                            <div class="field"><span><em><font color="red"></font></em></span></div>
                                                            </div>

                                                        <div>
                                                        <input id="share_by_mail" name="share_by_mail" value="Submit" type="submit" class='button'></input>
                                                        </div>
						<div class="clearfix"> </div>
					</div></div>
		</form>

	</div>
</div>