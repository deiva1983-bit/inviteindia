 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" align="center" >
	<succ id="succval" class="succval">Congrats, Your wedding invitation created successfully... :)</succ>
	</td></tr>	

	

	<tr>
		<td class="left-nav">
			<dl class="demos-nav">
					<dd><a href="smscorner.php" class="selected">Change theme</a></dd>
					<dd><a href="#">Group SMS</a></dd>
				<dt>Account Settings</dt>
					<dd><a href="smsaccount.php?do=actmgt&type=frmg">Manage my friends</a></dd>
					<dd><a href="#">Manage my groups</a></dd>

			</dl>
		</td>
		<td class="normal" height="321px;" width="720px;">
			<div class="normal">
			<h3 style="display:none;">Create your wedding invitation</h3>
			
			<form id="wed_account_create" name="wed_account_create" class="form_cls" method="post" action="wed_account_success.php?page=2" enctype="multipart/form-data">
			<p><p id="validateTips" class="validateTips"></p>
		        <fieldset>
				
				<p>
				<div class="field">
				<label style="width:120px;">Domain name:</label>
				<input type="text" name="wed_url" id="wed_url" value="" class="inputval"/>
				<input type="hidden" name="theme_id" id="theme_id" value="1" class="inputval"/>
				<a href="" id="check_avilable">Check Avilablity</a>&nbsp;&nbsp;<span id="wed_url_status"></span>
  				<div class="field"><span><em>example: http://www.inviteindia.com/<font color="red">rakesh_weds_nisha.html</font></em></span></div>
				</div>
				</p>

				<p>
				<div class="field">
				<label style="width:120px;">Grooms's name:</label> 
				<input type="text" id="txt_grooms_name" name="txt_grooms_name" class="inputval" />  
				</div>
				</p>

				<p>
				<div class="field">
				<label style="width:120px;">Bride's name:</label> 
				<input type="text" id="txt_brides_name" name="txt_brides_name" class="inputval" />  
				</div>
				</p>

				<p>
				<div class="field">
				<label style="width:120px;">Home page image:</label> 
				<input type="file" name="uploaded_homeimage" class="inputval"/>				
				</div>
				<div class="field"><span><em>This image is displayed in your home page.</em></span></div>
				</p>

			
			

			<div class="demo">
			<button id="butt_create_web_invit">Submit (1 of 2)</button>&nbsp;&nbsp;<button  id="butt_clear_web_invit" class="butt_clear_web_invit">Clear</button>
			<dd>&nbsp;</dd> 
			</div><!-- End demo -->
                        </fieldset>
                        </form>
			</p>
			</div>
		</td>
		 
		 
		<td class="normal" > 			 
		</td>
		 
 
		
	</tr>
	</table>
      </div></div>