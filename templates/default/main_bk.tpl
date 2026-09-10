 <!-- content -->
   <div id="content" >
      <div class="container" >
      <table class="layout-grid" cellspacing="0" cellpadding="0" >
      <tr> <td colspan="3" align="right">
      <div style="padding-top: 9px;">
		<span>  
			{if $show_auth eq 0}
			<a href="#" id="create-user" style="cursor:pointer;"><img src="homeimages/home_joinnow.JPG" style="height:98px;"></a>
			<a href="login.php" id="login-now" style="cursor:pointer;"><img src="homeimages/login_now.JPG" style="height:98px;"></a>
			{/if}
			<a href="e-wedding.php" id="create-wed" style="cursor:pointer;"><img src="images/wed_secure/wed_create.JPG" style="height:100px;"></a>
        </span>
	</div> 
	</td></tr><tr><td colspan="3">&nbsp;</td></tr>
	<tr> 
		<td colspan="3"> 
		<div id="slidorion" class="slidorion">
				<div class="slider">
					<div class="slide"><img src="homeimages/slides/{$glb_ranvalue}.jpg" alt="online wedding invitations" /></div>
					<div class="slide"><img src="homeimages/slides/cvr.jpg" alt="invitations templates" /></div>
					<div class="slide"><img src="homeimages/slides/gmap.jpg" alt="wedding location map" /></div>
				</div>

				<div class="accordion">
					<div class="header">Online wedding invitations</div>
					<div class="content">
						<p>A wedding is the ceremony in which two people are united in marriage. It’s very important and beautiful part in our life, which we want to share with our friends and neighbours.</p>
						<p>Looking for a wedding invitation that would match the beautiful occasion? Well, you are safe in our hands!</p>
						<p>InviteIndia.com lets you  create and customize your own online wedding invitations.</p>
					</div>
					<div class="header">My Invitation. Created by me, For me..</div>
					<div class="content">
						<p>We have modern and  tastefully designed  wedding templates and  a variety of banners, and designs.</p>
						<p>We also provide options to set your own background images for your wedding invitations.</p>
					</div>
					<div class="header">Wedding location map</div>
					<div class="content">
						<p>InviteIndia.com allows you to integrate your wedding location with the google map to help your guests identify lodging and restaurants at the nearest location.</p>
					</div>
				</div>
		</div>
	</td></tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	 <tr><td>
	  <!-- main-banner-small end -->
         <div class="section">
            <!-- box begin -->
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
                                          <h2>Create your wedding invitation here!</h2>
										<p><font style="font-size: 1.2em;">Well, people say “Marriage is a book of which the first chapter is written in poetry and the remaining chapters in prose.”</font></p>
										<p><font style="font-size: 1.2em;">But, we strongly disagree. We truly believe all that begins well ends well, and there is no better way to begin a marriage than by choosing a wedding invitation that is befitting of the occasion in which two beautiful hearts embark on a journey that is to be filled with love, bliss and happiness.</font></p>
										<p><font style="font-size: 1.2em;">So, choose to turn on the style and invite your guests to grace the beautiful occasion, request them to shower their blessings  and provide them a glimpse of what the future holds for ‘you’ as a family.</font></p>


										<p><font style="font-size: 1.2em;">For, every love story is beautiful and yours is our favorite. InviteIndia.com offers you to create colourful online wedding website and share it with your friends.</font></p>
										
                                          <p><font style="font-size: 1.2em;">To know more about Wedding invitations website features <a href="online-wedding-website-aboutus#fet">Click Here.</a></font></p>
					  <!-- <h2>Tamil wedding invitations!</h2>
					  <p><font style="font-size: 1.2em;">உங்கள் திருமண அழைப்பிதழ் தமிழிலும்...</font></p>
						-->				 <p>
                                             <a href="e-wedding.php" class="button3" style="width: 200px;"><em><b>Create Invitation !</b></em></a>
											 </p>
											<p class="aligncenter"><a href="select_theme.php?do=demOkavi" class="button1" style="width: 200px;"><em><b>Check Invitation Designs !</b></em></a></p>
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
            <!-- box end -->
         </div>
		 </td></tr>
</table>
      </div>
   </div> 
   
      <div id="dialog-form" title="Create new user">
	<p class="validateTips" style="font-size:70%; ">All form fields are required.</p>
	<form>
	<fieldset style="padding:10; border:0; margin-top:25px; ">
		<div> <p> <label for="name" style="font-size:70% ">User name:</label> 
		<input type="text" name="name" id="name" />  </p></div>
		<div> <p> <label for="password"  style="font-size:70% ">Password:</label>
		<input type="password" name="password" id="password" value="" /></p></div>
		<div> <p> <label for="email"  style="font-size:70% ">Email:</label>
		<input type="text" name="email" id="email" value=""  /> </p></div>
		<!-- <div> <p> <label for="email"  style="font-size:70% ">Date of Birth:</label>
		 <input type="text" id="datepicker" class="datepicker" readonly="true"> </p></div> -->
	</fieldset>	
	</form> 
	</div>