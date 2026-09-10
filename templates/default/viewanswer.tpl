 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
  
	{if $sess_ans_add_status eq '1'}
		<tr><td colspan="3" align="center" ><succ id="succval" class="succval">Thanks, Your answer will be approved with in 24 hour's.</succ></td></tr>		  
	{elseif $sess_ans_add_status eq '2'}
	 <tr> <td colspan="3" align="center"><h3 style="font-size:1.2em;"><font color="red">Please add your answers.</font></h2></td></tr>
	{/if} 
	 

	<tr>
		<td class="left-nav">
			<dl class="demos-nav">
				<dt>Subjects</dt>
					 {$left_nav}
					 
					 
				<!-- <dt>Account Settings</dt>
					<dd><a href="smsaccount.php?do=actmgt&type=frmg">Manage my friends</a></dd>
					<dd><a href="#">Manage my groups</a></dd>

			</dl> -->
		</td>
		<td style="width:540px; ">
			
		<div class="box">
            <div class="border-top">
               <div class="border-right">
                  <div class="border-bot">
                     <div class="border-left">
                        <div class="left-top-corner">
                           <div class="right-top-corner">
                              <div class="right-bot-corner">
                                 <div class="left-bot-corner">
                                    <div class="inner" style="padding: 27px 35px 6px 34px;">
                                       <h2>{$ques_name}</h2> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 
		  <!-- box end --><br />
		 <div class="box">
            <div class="border-top">
               <div class="border-right">
                  <div class="border-bot">
                     <div class="border-left">
                        <div class="left-top-corner">
                           <div class="right-top-corner">
                              <div class="right-bot-corner">
                                 <div class="left-bot-corner">
                                    <div class="inner">
                                     
                                    
									    
										   {foreach from=$topics_ans key=catid item=tmp}<p>   <ul class="list2">
										     <li>
 										   	{if $tmp.pimg eq ''}
                                             						<img alt="" src="{$glb_site_url}images/image_87x87.gif" width="70px" />
											{else}
											 <img alt="" src="{$glb_site_url}data/images/profile/thumb/{$tmp.pimg}" width="70px"  />
											{/if}
					                                             <h4><strong>{$tmp.uname}</strong>
					                                            {$tmp.datecreated}</h4></li></ul></p>
			                                {$tmp.answer}{/foreach}		

                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 
         <!-- box end --><br />
		  
      <div id='orange-color'>Add my answer:</div>
	 						
			<form name="addQues" id="addQues" class="addQues" method="post" onSubmit="return true;" action="{$glb_site_url}answer-add/">
			 <input type="hidden" id="hdn_user_id" value="{$user_log_id}">		 
			  <input type='hidden' name='hdn_ques_id' id='hdn_ques_id' value="{$quesid}"    />
			  <input type='hidden' name='hdn_glb_url' id='hdn_glb_url' value="{$glb_site_url}"   />
							  
			 <textarea id="txt_my_ans" class="txt_my_ans" name="txt_my_ans" rows="10" cols="50"></textarea> 
			{literal}
			  <script type="text/javascript">
				//<![CDATA[

					// Replace the <textarea id="editor"> with an CKEditor
					// instance, using default configurations. [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
					CKEDITOR.replace( 'txt_my_ans',
						{
							extraPlugins : 'uicolor',
							toolbar :
							[
								[ 'Bold', 'Italic', '-', 'Link', 'Unlink' ],
								 
							]
						});

				//]]>
				</script>
		{/literal}
			 
			<div class="demo">	<button id="addques" class="addques">Add my answer</button> </div>
			
			</form>
		</td>
		 
		 
		<td class="normal" style="border-left: 0px;">
		 
			 {if $user_log_id eq ''} 
			 <div id="signin_form">
				<div id='orange-color'>Login</div> 			 
				<p>						
					<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
				 	 <fieldset>
                                        <div class="field"><label style="width: 65px;">Username:</label><input type="text" name="txt_usr_name" id="txt_usr_name" value="" class="inputval" style="width: 100px;" />
					<span class="hint" id="event_title_hint" ></span></div>
  					    <div class="field"><label style="width: 65px;">Password:</label><input type="password" name="txt_pass_word" id="txt_pass_word" value="" class="inputval" style="width: 100px;" />
					<span class="hint" id="event_title_hint" ></span></div>
							<div class="demo">
							<button id="butt_login" class="butt_login">Login</button>&nbsp;<!--<button  id="butt_log_clear" class="butt_log_clear">Clear</button>&nbsp;--><a href="#" id="create-user">Signup</a> 
							 <dd>&nbsp;</dd> 
							</div><!-- End demo -->
                                     </fieldset>
				</p>
				 </div>
				<div id="border_line"   ></div>  
			{/if}
			
		 	{if $related_topic neq ''} 
			<br />
			<div class="normal">
			<div id='orange-color'>Related topic</div> 
				<dl class="demos-nav" style="width:150px; ">
				
			{$related_topic}				 
			</dl>	
				</div>
			{/if}
		</td>
		 
 
		
	</tr>
	</table>
      </div></div>

  
 
 
 
 
   
 

