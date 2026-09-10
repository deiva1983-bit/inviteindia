<link rel="alternate" href="http://www.inviteindia.com" hreflang="en-in" />
<link rel="stylesheet" href="includes/lcss/reset{$glb_minify_css}.css" type="text/css" media="all">
<link rel="stylesheet" href="includes/lcss/layout{$glb_minify_css}.css" type="text/css" media="all">
<link rel="stylesheet" href="includes/lcss/style{$glb_minify_css}.css" type="text/css" media="all">
<link rel="stylesheet" href="includes/lcss/styles{$glb_minify_css}.css" type="text/css" media="all">
<script type="text/javascript" src="includes/scripts/ljs/jquery-1.6.js" ></script>
<script type="text/javascript" src="includes/scripts/ljs/cufon-yui.js"></script>
<script type="text/javascript" src="includes/scripts/ljs/cufon-replace.js"></script>  
<script type="text/javascript" src="includes/scripts/ljs/Forum_400.font.js"></script>
<script type="text/javascript" src="includes/scripts/ljs/quick{$glb_minify_js}.js"></script>

<!--
<link href="{$glb_site_url}includes/css/style.css" rel="stylesheet" type="text/css" />
<link href="{$glb_site_url}includes/css/demos.css" rel="stylesheet" type="text/css" />
<link href="{$glb_site_url}includes/css/layout.css" rel="stylesheet" type="text/css" /> -->

<script src="{$glb_site_url}includes/scripts/maxheight{$glb_minify_js}.js" type="text/javascript"></script>
<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui{$glb_minify_js}.js"></script>

<!-- <link href="{$glb_site_url}includes/css/jquery-ui.css" rel="stylesheet" type="text/css" /> -->
<!-- Start Local only  -->
<!-- <script src="{$glb_site_url}includes/scripts/jquery-1.10.2.js" type="text/javascript"></script>
<script src="{$glb_site_url}includes/scripts/jquery-ui.js" type="text/javascript"></script> -->
<!-- End Local only  -->
<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/validat_all{$glb_minify_js}.js'></script> 

{if $currentpage_js eq 'registration'}
<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
<script type='text/javascript' src='includes/scripts/userdefind/registration.js'></script>
{elseif $currentpage_js eq 'main_page'}
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui{$glb_minify_css}.css">
	<link type="text/css" href="includes/css/slidorion{$glb_minify_css}.css" rel="stylesheet" />
	<script type="text/javascript" src="includes/scripts/home/jquery.slidorion.min.js"></script>
	<script type='text/javascript' src='includes/scripts/userdefind/hmain{$glb_minify_js}.js'></script>
{elseif $currentpage_js eq 'home_page'}
	<script type='text/javascript' src='includes/scripts/userdefind/registration.js'></script> 
	<script type='text/javascript' src='includes/scripts/userdefind/forget_pass.js'></script>
{elseif $currentpage_js eq 'myprofile_profile_control'}
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.tabs.js"></script>
	<script type='text/javascript' src='includes/scripts/userdefind/myprofile_profile_control.js'></script> 
	<script type='text/javascript' src='includes/scripts/userdefind/uploader.js'></script>
{elseif $currentpage_js eq 'my_sms'}  
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script> 	 
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.tabs.js"></script> 
	<script type="text/javascript" src="includes/scripts/ui/jquery.effects.core.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.autocomplete.js"></script>
	<script type='text/javascript' src='includes/scripts/userdefind/sms_plain_control.js'></script> 
{elseif $currentpage_js eq 'mobileactivate_page'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script> 	 
	<!-- <script type='text/javascript' src='includes/scripts/userdefind/jquery.blockUI.js'></script> -->
	<script type='text/javascript' src='includes/scripts/userdefind/mobile_activate.js'></script>	 
{elseif $currentpage_js eq 'interviewhome'} 
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/interviewhome.js'></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/login.js"></script>
{elseif $currentpage_js eq 'viewanswer'}
	<script type="text/javascript" src="{$glb_site_url}editor/ckeditor.js"></script>
	<script type="text/javascript" src="{$glb_site_url}editor/edt/sample.js"></script>
	<link rel="stylesheet" href="{$glb_site_url}editor/edt/sample.css" type="text/css" media="screen" /> 
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script> 
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/interviewhome.js'></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/login.js"></script>
{elseif $currentpage_js eq 'signup'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script> 	
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.datepicker.js"></script> 
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/signup.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/login.js"></script>
{elseif $currentpage_js eq 'theme_select'}
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>	 
	<link href="includes/css/userdefind/wedding.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="includes/scripts/ui/jquery.effects.datetime.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery-ui-sliderAccess.js"></script>
	<!--
	<script type="text/javascript" src="includes/scripts/dt/jquery-1.7.2.min.js"></script>
	<script type='text/javascript' src='includes/scripts/dt/jquery-ui.min.js'></script>
	<script type="text/javascript" src="editor/ckeditor.js"></script>
	<script type="text/javascript" src="editor/edt/sample.js"></script>
	<link rel="stylesheet" href="editor/edt/sample.css" type="text/css" media="screen" /> -->
	<script src="includes/scripts/ui/nicEdit.js" type="text/javascript"></script>
	<script type='text/javascript' src='includes/scripts/userdefind/mrg_account/theme_options.js'></script>
	<link rel="stylesheet" media="all" type="text/css" href="includes/css/jquery-ui-timepicker-addon.css" />
{elseif $currentpage_js eq 'birth_create'}
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	<script type='text/javascript' src='includes/scripts/userdefind/mrg_account/theme_options_birth.js'></script>
{elseif $currentpage_js eq 'theme_add_cover'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script> 
	<link href="includes/css/generic.css" rel="stylesheet" type="text/css" />
	<link href="includes/css/js-image-slider.css" rel="stylesheet" type="text/css" />
	<link href="includes/css/slider.css" rel="stylesheet" type="text/css" /> 
	<script type='text/javascript' src='includes/scripts/ui/js-image-slider.js'></script>
	<script type='text/javascript' src='includes/scripts/ui/jquery-slider.js'></script>
	<script type='text/javascript' src='includes/scripts/userdefind/mrg_account/add_cover.js'></script>
{elseif $currentpage_js eq 'ctheme_add_cover'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	<script type='text/javascript' src='includes/scripts/userdefind/mrg_account/add_cover.js'></script>
{elseif $currentpage_js eq 'theme_select_edit'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<link href="includes/css/userdefind/wedding.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="includes/scripts/ui/jquery.effects.datetime.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery-ui-sliderAccess.js"></script>
	<!-- <script type="text/javascript" src="editor/ckeditor.js"></script>
	<script type="text/javascript" src="editor/edt/sample.js"></script>
	<link rel="stylesheet" href="editor/edt/sample.css" type="text/css" media="screen" /> -->
	<script src="includes/scripts/ui/nicEdit.js" type="text/javascript"></script>
	<script type='text/javascript' src='includes/scripts/userdefind/mrg_account/theme_options_edit.js'></script>
	<link rel="stylesheet" media="all" type="text/css" href="includes/css/jquery-ui-timepicker-addon.css" />
{elseif $currentpage_js eq 'own_page'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='includes/scripts/userdefind/ownpages.js'></script>
	<script type="text/javascript" src="editor/ckeditor.js"></script>
	<script type="text/javascript" src="editor/edt/sample.js"></script>
	<link rel="stylesheet" href="editor/edt/sample.css" type="text/css" media="screen" />
{elseif $currentpage_js eq 'payment'}
	<script type='text/javascript' src='includes/scripts/userdefind/payment.js'></script>
{elseif $currentpage_js eq 'wedd_ani'}
	<script type='text/javascript' src='includes/scripts/userdefind/mrg_account/add_cover.js'></script>
{elseif $currentpage_js eq 'wedhome'}
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/jquery.validate.js'></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/external/jquery.bgiframe-2.1.1.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.dialog.js"></script>
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/wedding.js"></script>
	<script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/interviewhome.js'></script>
	<link href="{$glb_site_url}includes/css/wedding.css" rel="stylesheet" type="text/css" />
{elseif $currentpage_js eq 'searchloc_gmap'}
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<SCRIPT type="text/javascript" src="includes/scripts/userdefind/gmapcntrl.js"></SCRIPT> 
	<script type='text/javascript' src='includes/scripts/userdefind/gmap-search.js'></script>
{elseif $currentpage_js eq 'contactus'}
	<script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>	 	 
	<script type='text/javascript' src='includes/scripts/userdefind/contactus.js'></script>
{elseif $currentpage_js eq 'wed_share'}
	   <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	 <script type="text/javascript" src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	 <script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	 <script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	 <link href="includes/css/userdefind/wedding.css" rel="stylesheet" type="text/css" />
	 <script type="text/javascript" src="editor/ckeditor.js"></script>
	 <script type="text/javascript" src="editor/edt/sample.js"></script>
	 <link rel="stylesheet" href="editor/edt/sample.css" type="text/css" media="screen" /> 
	 <script type='text/javascript' src='includes/scripts/userdefind/mailshare.js'></script>
{elseif $currentpage_js eq 'wed_share_sms'}
	 <script type='text/javascript' src='includes/scripts/jquery.validate.js'></script>
	 <script type='text/javascript' src='includes/scripts/userdefind/mrg_account/smsshare.js'></script>
	 {elseif $currentpage_js eq 'chgbg'}
	 <script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	 <script type='text/javascript' src='includes/scripts/ui/imagepreview.js'></script>
	 <script type='text/javascript' src='includes/scripts/userdefind/mrg_account/changebg.js'></script>
	 {elseif $currentpage_js eq 'theme_select_music'}
	 <script type="text/javascript" src="includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="includes/scripts/ui/jquery.ui.button.js"></script>
	 <script type="text/javascript" src="includes/scripts/userdefind/mrg_account/jquery.iwish.js"></script>
	 <script type='text/javascript' src='includes/scripts/userdefind/mrg_account/wedmusic.js'></script>
	 {elseif $currentpage_js eq 'pack'}
	 <script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/pack.js'></script>
	 {elseif $currentpage_js eq 'vendors_home'}
	 <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script>
	 <script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/vendors.js'></script> 
	 {elseif $currentpage_js eq 'vendors_login'}
	  <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script>
	 <script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/vendors/login.js'></script>
	 {elseif $currentpage_js eq 'vendors_pdts'}
	  <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script>
	 <script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/validat_all{$glb_minify_js}.js'></script> 
	 <script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/vendors/ven_suppliers.js'></script>
	 {elseif $currentpage_js eq 'surl'}
	  <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.widget.js"></script>
	 <script type="text/javascript" src="{$glb_site_url}includes/scripts/ui/jquery.ui.button.js"></script> 	
	 <script type="text/javascript" src="{$glb_site_url}includes/scripts/userdefind/surl.js"></script>
	  {elseif $currentpage_js eq 'owndomain'}
	  <script type='text/javascript' src='includes/scripts/userdefind/validat_all{$glb_minify_js}.js'></script> 
	 <script type='text/javascript' src='{$glb_site_url}includes/scripts/userdefind/owndom.js'></script>
	{elseif $currentpage_js eq 'flipkart'}
	<link href="includes/css/userdefind/giftkart.css" rel="stylesheet" type="text/css" />
	<link href="templates/default/mrg_template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- <script type="text/javascript" src="http://www.inviteindia.com/templates/default/mrg_template/theme_11/js_plugin/bootstrap.js"></script> -->
	{/if}