 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0" style="height:450px; ">

	 
		<!-- <tr><td></td><td>top</td><td></td></tr> -->
		
			 
	 
	

	<tr>
		<td class="left-nav">
			<dl class="demos-nav">
				<dt>Subjects</dt>
					 {$left_nav}
					 
					  

			</dl>
		</td>
		<td class="normal" style="width:500px; ">
			<div class="normal">
			<input type="hidden" name="hid_smsopx" id="hid_smsopx" value="{$sms_status}" />
			<h3>Interview Questions & Answers</h3>
			<p><dl class="demos-nav" style="width:400px; ">
			{$topicurl}			
			{$quesurl}	
				 
			</dl>			 
			</p>
			</div>

		</td>
		 
		 
		<td class="normal">
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
							<button id="butt_login" class="butt_login">Login</button>&nbsp;<button  id="butt_log_clear" class="butt_log_clear" style="display: none;">Clear</button>&nbsp;<a href="#" id="create-user">Signup</a>  
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
				
				{foreach from=$related_topic_list key=catid item=tmp}

<dd style="width:185px;"><a href="{$glb_site_url}interview-questions/{$tmp.top_url}/{$questopid}">{$tmp.top_topicname}</a></dd>

				{/foreach}

				
			{$related_topic}				 
			</dl>	
				</div>
			{/if}
		</td>
		 
 
		
	</tr>
	</table>
      </div></div>

  
 
 
 
 
   
 

