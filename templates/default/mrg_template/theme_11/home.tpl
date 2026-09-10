{include file="default/mrg_template/wed_animations.tpl"}
<link rel="stylesheet" media="screen, print" href="{$glb_site_url}includes/scripts/userdefind/slideshow/homepageslides.css">
<script src="{$glb_site_url}includes/scripts/userdefind/slideshow/homepageslides.js" type="text/javascript"></script>

<!-- <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/minified/base64.js"></script> 
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script> -->
<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/mrg_account/map_events.js?{$url_events}'></script>
{if $isMobile eq 1}
<link rel="stylesheet" media="screen, print" href="{$glb_img_urls}/mobile_style.css">
{/if}

{literal}
<script>
$( document ).ready(function() {
$('.link').click(function(e){
   e.preventDefault();
   scrollToElement( $(this).attr('href'), 2000 );
});


var scrollToElement = function(el, ms){
    var speed = (ms) ? ms : 600;
    $('html,body').animate({
        scrollTop: $(el).offset().top
    }, speed);
}


var rec_status = $("#rec_status").val();
var wed_map_status = $("#wed_map_status").val();
var isMobile = $("#mobile_loaded").val();
if(isMobile != 1) {
 if (rec_status == 1 && paramresmapsts == 1) {
	var map = new google.maps.Map(document.getElementById('map_rec'), {
          zoom: 10,
          center: new google.maps.LatLng(paramlatrec,paramlngrec),
        });

        var contentString = '<div id="content_gmap"><img src="images/rec.png" alt="Wedding reception" style="width: 60px;" /></div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(paramlatrec,paramlngrec),
          map: map,
          title: 'Wedding reception'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
 }

if (wed_map_status == 1 && paramwedmapsts == 1) {
      var map_wedding = new google.maps.Map(document.getElementById('map_wed'), {
          zoom: 10,
          center: new google.maps.LatLng(paramlatwed,paramlngwed),
        });
        var contentString_wed = '<div id="content_gmap"><img src="images/wed-gmap.png" alt="Wedding ceremony" style="width: 60px;" /></div>';

        var infowindow_wed = new google.maps.InfoWindow({
          content: contentString_wed,
          maxWidth: 200
        });

        var marker_wed = new google.maps.Marker({
          position: new google.maps.LatLng(paramlatwed,paramlngwed),
          map: map_wedding,
          title: 'Wedding ceremony'
        });
        marker_wed.addListener('click', function() {
          infowindow_wed.open(map_wedding, marker_wed);
        });


      }
      }
      });
      </script>
{/literal}

<input type="hidden" name="glb_counter_date" id="glb_counter_date" value="{$glb_counter_date}" class="inputval" />
<input type="hidden" name="glb_page_url" id="glb_page_url" value="{$glb_page_url}" class="inputval" />
<input type="hidden" name="glb_site_url" id="glb_site_url" value="{$glb_site_url}" class="inputval" />
<input type="hidden" name="uid" id="uid" value="{$glb_master_id}" class="inputval" />
<input type="hidden" name="theme_owner_id" id="theme_owner_id" value="{$glb_theme_owner_id}" class="inputval" />
<input type="hidden" name="theme_gift_id" id="theme_gift_id" value="1" class="inputval" />
    <section>
        <article class="about_us" id="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center ">
			{if $glb_pageheading neq ''}
                        <h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$glb_pageheading}</h2>
			{/if}
                        <div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
                        <p class="big-text animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">
				{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} 
					<div class="admin_alert" id="admin_alert_info" style="cursor: pointer;">Do you want create your own heading? <span id="change_head_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> 
				{/if}
				<div style="margin-top:15px" {if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} id = "change_bg_color_on_mouse" {/if}><div>{$glb_kural}</div></div>
			</p>
                    </div>
		{if $glb_home_img_status eq '1'}
                <div class="row latest_sermons">
                    <div class="col-md-6 text-center groom">
                        <div class="img"><img alt="" src="{$glb_homeimg}" width="300px" class="home_img" /></div>
		    </div>
                    <div class="col-md-6 text-center bride">
			{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
                        <p>{$glb_des_brieff}</p>
		    </div>
		   </div>
		{else}
			<div class="row latest_sermons">
			    <div class="col-md-6 text-center groom">
				<div class="img"><img alt="" src="{$glb_maleimg}" class="home_img" style="{$two_images_max_height}" /></div>		
			    </div>
			    <div class="col-md-6 text-center bride">
				<div class="img"><img alt="" src="{$glb_femaleimg}"  class="home_img" style="{$two_images_max_height}" /></div>
			    </div>
			</div>	
		
			<div class="col-md-12 text-center ">
				{if ($glb_access_by_admin eq 1 && $c_page_status eq '6' )} <div class="admin_alert_des" id="admin_alert_info" style="cursor: pointer;"> Do you want to create your own descriptions? <span id="change_head_des_yes" style="cursor: pointer;"><b>Yes</b></span><span id="change_head_no" style="cursor: pointer; display: none;"><b>No</b></span> </div> {/if}
				<p>{$glb_des_brieff}</p>
		       </div>
	       {/if}
	      </div>
        </article>


        <article class="wedding_invitation" id="wedding_invitation">
            <div class="wedding_invitation_parallax">
                <div class="about_bottom_bg">
                    <div class="container text-center">
			<h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$tpl_event_title}</h2>
			<div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
				{if $smt_reception_status neq 0 }
				<div class="row">
						<input type='hidden' id='rec_status' value='1' />
						{if $smt_rec_title neq ''}<h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">{$smt_rec_title}</h3>
						{else}<h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">Reception</h3>
						{/if}
				
						{if $smt_map_rec_status neq 1}
							<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
								{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
								{$smt_reception_location}
							</div>
						{else}
							{if $isMobile eq 1} 
								<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
								{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
								{$smt_reception_location}
								</div>
							{else}
							<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
								{if $smt_reception_date neq ''} {$smt_reception_date} <br /> {/if}
								{$smt_reception_location}
							</div>				
							<div class="col-md-4 text-left animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="100">
								<div id="map_rec" style="width: 300px; height: 300px;"></div>
							</div>
							{/if}
						{/if}
				</div>
				{else}
					<input type='hidden' id='rec_status' value='0' />
				{/if}
				


				{if $smt_marriage_status neq 0 }
				<div class="row">
						<input type='hidden' id='wed_map_status' value='1' />
						{if $smt_wed_title neq ''}<h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">{$smt_wed_title}</h3>
						{else}<h3 class="animated fadeIn visible text-left" data-animation="fadeIn" data-animation-delay="100">Marriage</h3>
						{/if}
				
						{if $smt_map_wedd_status neq 1}
							<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
								{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
								{$smt_marriage_location}
							</div>
						{else}
							{if $isMobile eq 1}
								<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
								{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
								{$smt_marriage_location}
								</div>
							{else}
							<div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
								{if $smt_marriage_date neq ''} {$smt_marriage_date} <br /> {/if}
								{$smt_marriage_location}
							</div>				
							<div class="col-md-4 text-left animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="100">
								<div id="map_wed" style="width: 300px; height: 300px;"></div>
							</div>
							{/if}
						{/if}
				</div>
				{else}
					<input type='hidden' id='wed_map_status' value='0' />
				{/if}



                    </div>
                </div>
            </div>
        </article>


	<article class="gallery_outer" id="photo_gallery" style="height: 870px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$tpl_location_title}</h2>
                        <div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
                    </div>
                </div> <!-- end row -->
		{if $isMobile eq 1}
			<div id="contact-form" >
				<div class="col-md-12"><input id="autocomplete" type="text"/></div>
				<div class="col-md-12"><div id="map_canvas"></div></div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				<div class="col-md-12"><form name="controls"> 
				<input type="radio" name="type" value="establishment" onclick="search()" checked="checked" />&nbsp;All<br/> 
				<input type="radio" name="type" value="restaurant" onclick="search()" />&nbsp;Restaurants<br/> 
				<input type="radio" name="type" value="lodging" onclick="search()" />&nbsp;Lodging
				</form>
				</div>
				<div><div id="listing"><div id="results"></div></div></div><br />
			</div>
		{else}
		<div class="row">
                    <p><div class="col-md-8 text-center">
			<div id="locationField" style="width: 99%;"> 
			<input id="autocomplete" type="text" style="width: 100%;"/>
			</div>
                    </div></p><br />
			
		    <div class="col-md-8 text-left animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="100">
		    <div id="map_canvas" style="width: 99%; height: 500px;"></div>
		    </div>				
			<div class="col-md-4 text-left animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="100">
				<form name="controls" > 
				<input type="radio" name="type" value="establishment" onclick="search()" checked="checked"/>All<br/> 
				<input type="radio" name="type" value="restaurant" onclick="search()" />Restaurants<br/> 
				<input type="radio" name="type" value="lodging" onclick="search()" />Lodging
				</form><br />
				<div id="listing" style='left: 0px; padding-left: 14px; height: 409px;'><div id="results"></div></div>
			</div>

                </div><!-- end row -->
		{/if}

            </div> <!-- end container -->
        </article> <!-- end gallery_outer -->
{if $glb_master_id ne '8284'}
	 <article class="lovestory_parallax" id="lovestory">
            <div class="lovestory_bottom_parallax lovestory_bottom_parallax_green" id="email">
                <div class="lovestory_bottom_bg">
                    <div class="container">
			<div id="blessing_tables" {if !$tpl_default_signup} style='display: none;' {/if} >
			<h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{$tpl_bless_title}</h2>
			<div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
				<div class="row"> <!-- start row -->
				<div class="col-md-12 animated fadeIn visible" data-animation="fadeIn" data-animation-delay="200">
				    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">					    
					    {$msgtmp_carousel}
					</ol>
					<div class="carousel-inner">					   
					    {$msgtmp_newformat_tpl}
					</div>
				    </div>
				</div>
			    </div> <!-- end row -->
			   </div>
					<h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">Add my blessings</h2>
					<div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
					<div id="validateBlessing" class="validateBlessing"></div>
					<div class="row animated fadeInUp visible" id="contact-form" data-animation="fadeInUp" data-animation-delay="700">
					    <div class="col-md-6"><input class="input_text" type="text" name="guest_name" id="guest_name" value="" placeholder="{$tpl_signup_name} *"></div>
					    <div class="col-md-6"><input class="input_text" type="text" name="guest_email" id="guest_email" value="" placeholder="{$tpl_signup_email} *"></div>
					    <div class="col-md-6"><input class="input_text" type="text" name="guest_loc" id="guest_loc" value="" placeholder="{$tpl_signup_loc}"></div>
					    <div class="col-md-12"><textarea rows="3" cols="5" name="guest_msg" id="guest_msg" placeholder="{$tpl_signup_wish} *" class="textarea_text"></textarea></div>
					    <div class="col-md-12" id="contact-error" style="display: none;"></div>
					    <div class="col-md-12"><button class="input_button"  id="msg_logins">Send a message</button></div>
					</div>
					<div class="row" id="contact-loading" style="display: none;"> loading... </div>
					<div class="row" id="contact-success" style="display: none;"> Your message sent sucessfully to our team and they will be in touch with you asap. </div>
					<div class="row" id="contact-failed" style="display: none;"> Error, message sending faild , try after sometime. </div>
					




                    </div>
                </div>
            </div>
        </article>
{/if}
	{if $glb_total_alb_records neq 0}
	<article class="rsvp_main" id="rsvp">
            <div class="rsvp_main_parallax">
                <div class="rsvp_bottom_bg">
                    <div class="container">
			<div class="row">
			    <div class="col-md-12 text-center">
				<h2 class="animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">Our Gallery</h2>
				<div class="devider_main"><img src="{$glb_img_urls}img/devider-gray.jpg" alt=""></div>
			    </div>
			</div> <!-- row -->
		    </div>

		    <div id="container" class="isotom_lant clearfix">
			<ul>
			   {$albuminfosnew}
			</ul>
		    </div> <!-- isotom_lant -->


                </div>
            </div>
        </article>
	{/if}
	{if $glb_ownpageinfos neq ''}
	  <article class="about_us" id="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
			{$glb_ownpageinfos}
		</div></div>
	</div></article>
	{/if}
    </section>
     <!--<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <ul class="list-inline footer_icons">
                        <li><a href="http://www.lanternthemes.com/themes/wedding/html/light.html?ref=designerslib#"><i class="fa fa-skype fa-3x"></i></a></li>
                        <li><a href="http://www.lanternthemes.com/themes/wedding/html/light.html?ref=designerslib#"><i class="fa fa-facebook fa-3x"></i></a></li>
                        <li><a href="http://www.lanternthemes.com/themes/wedding/html/light.html?ref=designerslib#"><i class="fa fa-twitter fa-3x"></i></a></li>
                        <li><a href="http://www.lanternthemes.com/themes/wedding/html/light.html?ref=designerslib#"><i class="fa fa-youtube fa-3x"></i></a></li>
                        <li><a href="http://www.lanternthemes.com/themes/wedding/html/light.html?ref=designerslib#"><i class="fa fa-google-plus fa-3x"></i></a></li>
                        <li><a href="http://www.lanternthemes.com/themes/wedding/html/light.html?ref=designerslib#"><i class="fa fa-dropbox fa-3x"></i></a></li>
                    </ul>
                    <p>Copyright ©2014. All rights reserved</p>
                </div>
            </div>
        </div> 
        <div class="top-scroll"><a href="#top" class="link"><i class="fa fa-chevron-up"></i></a></div>
    </footer> -->
    <div class="top-scroll"><a href="#top" class="link"><i class="fa fa-chevron-up"></i></a></div>
    <div id="footernav1" {if $isMobile eq 1} style='height: 44px;' {/if}>
    <div id="footernav_content1">
		<ul id="footernav-links1">
		{if $isMobile eq 1}
		<li>
			<audio controls autoplay>
			<source src="{$glb_site_url}/audios/{$glb_music_id}.ogg" type="audio/ogg">
			<source src="{$glb_site_url}/audios/{$glb_music_id}.mp3" type="audio/mpeg">
			Your browser does not support the audio element.
			</audio>
		</li>
		{else}
			<li>
			<iframe src="//www.facebook.com/plugins/like.php?href={$glb_fb_url}&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width: 82px;" allowTransparency="true"></iframe>			 
			</li>	
			
		</ul>
		{if $glb_music_active eq 1 }
		 <div id="audiestyle" style="float: right;">	 
		  <ul id="player">
			<li><a  href="{$glb_site_url}/audios/{$glb_music_id}.mp3">cow</a></li>
		  </ul>
		</div>
		{/if}
		 <div id="copyright">Powered by <a href="{$glb_ssl_path}www.inviteindia.com" target="_blank"><b>inviteindia.com</b></a>.</div>
		 <div id="copyright">Created by <b>{$glb_male_name} & {$glb_female_name} &nbsp;&nbsp;|</b></div>
		{/if}
	    </div>
	</div>

	{literal}
	<script type="text/javascript">
	       $('#player').julienMP3Player({
		      soundManagerSwfURL: './swf/',
		      soundManagerFlashLoadTimeout: 4000,
		      soundManagerDebug: false,
		      autoplay: true
		    });
	</script>
	{/literal}
    <!-- <script type="text/javascript" src="{$glb_img_urls}js_plugin/jquery-1.10.2.js"></script> -->
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/jquery.vegas.js"></script>
    {if $glb_master_id eq '7878'}
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/vegas_user.js"></script>
    {elseif $glb_master_id eq '8179'}
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/vegas_user_8179.js"></script>
    {else}
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/vegas.js"></script>
    {/if}
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/forms.js"></script>
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/bootstrap.js"></script>
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/countdown.js"></script>
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/jquery.appear.js"></script>
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/jquery.easytabs.js"></script>
    <script type="text/javascript" src="{$glb_img_urls}js_plugin/system.js"></script>
  
</body>

</html>