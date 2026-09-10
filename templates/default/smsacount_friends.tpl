 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
	<!-- <tr><td colspan="3" align="center" > <err></err> </td></tr>
	<tr><td colspan="3" align="center" ><succ></succ> </td></tr> -->
	<tr><td colspan="3" align="center" ><succ id="succval" class="succval"></succ></td></tr> 
	<tr>
		<td class="left-nav">
			<dl class="demos-nav">
				<dt>Send SMS</dt>
					<dd><a href="smscorner.php">Send SMS</a></dd>
					<dd><a href="#">Group SMS</a></dd>
					 
					 
				<dt>Account Settings</dt>
					<dd><a href="smsaccount.php?do=actmgt&type=frmg"  class="selected">Manage my friends</a></dd>
					<dd><a href="#">Manage my groups</a></dd>

			</dl>
		</td>
		<td class="normal" style="width: 450px;" >

			<div class="normal">
				
					<h3>Your Friends...</h3>
					 <ul>

					


					  <div id="signin_form">
						 <input type="hidden" class="user_log" id="user_log" value="{$user_log_id}" />

                                            	<fieldset>
						<span class="field"><label style="width: 150px;">Mobile number</label>
						</span>
						<span class="field"><label style="width: 175px;">Name</label>
						</span>
						<span class="field"><label style="width: 125px;">Action</label>
						</span>
						

						{foreach from=$sms_friends key=k item=v}
						<div id="del_hide_{$v.smsfrd_id}"><span class="field" ><label_inner style="width: 150px;">{if $v.smsfrd_mobile_num eq ""}-{else}{$v.smsfrd_mobile_num}{/if}</label_inner>
						</span>
						<span class="field"><label_inner style="width: 175px;">{if $v.smsfrd_name eq ""}-{else}{$v.smsfrd_name}{/if}</label_inner>
						</span>
						<div class="demo"><a href="#" name="del_{$v.smsfrd_id}"  id="edit-user">E</a>-
						<a href="#" class="del_friend_list" name="del_{$v.smsfrd_id}"  id="mov_del{$v.smsfrd_id}">D</a>				


					
					<span style='display:none' class="del_mov_confirm" id="del_mov_confirm{$v.smsfrd_id}" >
                			<a id="del_mov_yes_main{$v.smsfrd_id}" class="del_mov_yes_mains" style="cursor:pointer;" ><strong>Y </strong></a> / <a id="del_mov_no{$v.smsfrd_id}" class="del_mov_no" style="cursor:pointer;" ><strong> N</strong></a>
              				</span>  

		 
						</div>
						</span>	</div>
						{/foreach}
						<!-- <div class="demo">
						<button id="friends_add">Add</button>&nbsp;&nbsp;<button>Cancel</button> 
						</div> --> <div class="demo" style="padding-top:15px;
text-align:right;">{$pagenation}</div>
                                                </fieldset>
                                        	 </div>
				
			</div>

		</td>
		
		<td class="normal">

			<div class="normal">
				<h3>Add My Friends...</h3>
					
					<p>
					<p class="validateTips" ></p>
						 <form id="signin_form" name="frm_friends_add" class="frm_friends_add" method="post" action="smsaccount.php">
						 <input type="hidden" name="action" value="add_my_friends" />
						 <input type="hidden" name="do" value="actmgt" />
						 <input type="hidden" name="type" value="frmg" />
                                            	 <fieldset>
						<div class="field"><label style="width: 100px;">Mobile number:</label> 
						<input type="text" name="txt_frd_mob_no" id="txt_frd_mob_no" class="inputval" />   
						</div>
						<div class="field"><label style="width: 100px;">Name:</label> 
						<input type="text" name="txt_frd_name" id="txt_frd_name" class="inputval" />   
						</div>
						 <div class="demo">
						<button id="friends_add" value="friends_add" name="friends_add">Add my friend</button>&nbsp;&nbsp;<button id="friends_clr">Clear</button> 
						</div> 
                                                </fieldset>
                                        	 </form>
										  
					</p>
				
			</div>

		</td>
		
	</tr>
</table>
      </div>
   </div>
   
      <div id="dialog-form" title="Edit my friends">
	<p class="validateTips_frin" style="font-size:70%;" id="validateTips_frin"></p>
	<form>
	<fieldset style="padding:10; border:0; margin-top:25px; ">
<input type="hidden" name="itm_id" id="itm_id" />
		<div> <p> <label for="name" style="font-size:70% ">Friend's name:</label> 
		<input type="text" name="mob_name" id="mob_name" />  </p></div>
		<div> <p> <label for="mob_number"  style="font-size:70% ">Mobile number:</label>
		<input type="text" name="mob_number" id="mob_number" value=""  /></p></div>
		
		
		<!-- <div> <p> <label for="email"  style="font-size:70% ">Date of Birth:</label>
		 <input type="text" id="datepicker" class="datepicker" readonly="true"> </p></div> -->
	</fieldset>	
	</form> 
	</div>
   
 

