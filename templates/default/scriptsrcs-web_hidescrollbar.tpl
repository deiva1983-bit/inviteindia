<link rel="stylesheet" type="text/css" href="{$glb_site_url}includes/css/font-manager.css" />
{if $isMobile eq '1'}
<link rel="stylesheet" type="text/css" href="{$static_domain_path_css}/mobile-styles.css" />
{/if}
{literal}
<script> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
{/literal}
<script src='includes/scripts/js/userdefind/validat_all{$glb_minify_js}.js'></script>
{if $smarty.session.sess_user_id neq '' }
<link href="{$static_domain_path_css}/common-login.css" rel="stylesheet" type="text/css" />
{/if}
{if $currentpage_js eq 'home_page'}
	<script src='includes/scripts/js/userdefind/registration{$glb_minify_js}.js'></script> 
	<script src='includes/scripts/js/userdefind/forget_pass.js'></script>
{elseif $currentpage_js eq 'cus_review'}
        <script src='includes/scripts/userdefind/cus-review.js'></script>
	<script src="includes/scripts/imagecrop/croppie.min.js"></script>
	<script src="includes/scripts/imagecrop/cus_review_upload.js"></script>
	<link rel="stylesheet" href="includes/scripts/imagecrop/croppie.css" />
	<link rel="stylesheet" href="includes/css/userdefind/cus_review.css" type="text/css" media="screen">
{elseif $currentpage_js eq 'theme_select1'}
	<link rel="stylesheet" href="{$static_domain_path_css}/base/chocolat.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="{$static_domain_path_css}/userstyle-theme-selection.css" type="text/css" media="screen" charset="utf-8">
	<script src='{$static_domain_path_js}/base/jquery.chocolat.js'></script>
	{literal}
	<script>
	$(function() {
	$('.view-seventh a').Chocolat();
	});
	</script>
	{/literal}
{elseif $currentpage_js eq 'theme_select'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="{$static_domain_path_css}/base/chocolat.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="{$static_domain_path_css}/userstyle-theme-selection.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="{$static_domain_path_js}/userdefind/slideshow/visuallightbox.css" type="text/css" media="screen">
	<script src="{$static_domain_path_js}/userdefind/slideshow/visuallightbox.js" type="text/javascript"></script>
	<script src="{$static_domain_path_js}/userdefind/slideshow/vlbdata1.js" type="text/javascript"></script>
	
	
	<link rel="stylesheet" href="{$static_domain_path_css}/fasthover.css" type="text/css" media="screen">
	<link rel="stylesheet" href="{$static_domain_path_css}/demo-themes.css" type="text/css" media="screen">
{elseif $currentpage_js eq 'web_create_latest'}
	<!-- <script src='includes/scripts/jquery.validate.js'></script> -->
	<script src="includes/scripts/ui/nicEdit.js"></script>
	<script src='includes/scripts/userdefind/mrg_account/theme_options_latest.js'></script>
	<link rel="stylesheet" href="{$static_domain_path_css}/website-create.css" type="text/css" media="screen" charset="utf-8">
{elseif $currentpage_js eq 'main_page_web'}
	<link rel="stylesheet" href="{$static_domain_path_css}/home_sub.css" type="text/css" media="screen">

{elseif $currentpage_js eq 'web_create'}
	<!-- <script src='includes/scripts/jquery.validate.js'></script> -->
	<script src="includes/scripts/ui/nicEdit.js"></script>
	<script src='includes/scripts/userdefind/mrg_account/theme_options.js'></script>
	<link rel="stylesheet" href="{$static_domain_path_css}/website-create.css" type="text/css" media="screen" charset="utf-8">
{elseif $currentpage_js eq 'theme_select_edit'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src="includes/scripts/ui/nicEdit.js"></script>
	<script src='includes/scripts/userdefind/mrg_account/theme_options_edit.js'></script>
{elseif $currentpage_js eq 'searchloc_gmap'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src="includes/scripts/ui/jquery.ui.widget.js"></script>
	<script src="includes/scripts/ui/jquery.ui.button.js"></script>
	<script src='includes/scripts/jquery.validate.js'></script>
	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyANV2FWiDbUZ_FaUDxsiS-1J631bCy45fM&sensor=false"></script>
	<script src="includes/scripts/userdefind/gmapcntrl.js"></SCRIPT> 
	<script src='includes/scripts/userdefind/gmap-search.js'></script>
{elseif $currentpage_js eq 'own_page'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src='includes/scripts/userdefind/ownpages.js'></script>
	<script src="includes/scripts/ui/tcal.js"></script>
	<script src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<link rel="stylesheet" type="text/css" href="includes/css/tcal.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/imss.css" />
{elseif $currentpage_js eq 'theme_select_music'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src="includes/scripts/userdefind/mrg_account/jquery.iwish.js"></script>
	<script src='includes/scripts/userdefind/mrg_account/wedmusic.js'></script>
{elseif $currentpage_js eq 'ctheme_add_envelop'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src="includes/scripts/ui/tcal.js"></script>
	<script src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script src='includes/scripts/userdefind/mrg_account/add_envelop.js'></script>
{elseif $currentpage_js eq 'theme_add_cover'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<link href="includes/css/generic.css" rel="stylesheet" type="text/css" />
	<link href="includes/css/js-image-slider.css" rel="stylesheet" type="text/css" />
	<link href="includes/css/slider.css" rel="stylesheet" type="text/css" /> 
	<script src='includes/scripts/ui/js-image-slider.js'></script>
	<script src='includes/scripts/ui/jquery-slider.js'></script>
	<script src='includes/scripts/userdefind/mrg_account/add_cover.js'></script>
{elseif $currentpage_js eq 'ctheme_add_cover'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src='includes/scripts/userdefind/mrg_account/add_cover.js'></script>
{elseif $currentpage_js eq 'chgbg'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src='includes/scripts/ui/imagepreview.js'></script>
	<script src='includes/scripts/userdefind/mrg_account/changebg.js'></script>
{elseif $currentpage_js eq 'wed_share'}
	<link rel="stylesheet" href="{$static_domain_path_css}/leftmenu.css" type="text/css" media="screen" charset="utf-8">
	<script src="//code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="//code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<script src='includes/scripts/jquery.validate.js'></script>
	<link href="includes/css/userdefind/wedding.css" rel="stylesheet" type="text/css" />
	<script src="editor/ckeditor.js"></script>
	<script src="editor/edt/sample.js"></script>
	<link rel="stylesheet" href="editor/edt/sample.css" type="text/css" media="screen" /> 
	<script src='includes/scripts/userdefind/mailshare.js'></script>
{elseif $currentpage_js eq 'pack'}
<link href="{$static_domain_path_css}/packages.css" rel="stylesheet" type="text/css" />
<script src='{$static_domain_path_js}/userdefind/pack.js'></script>
{elseif $currentpage_js eq 'owndomain'}
	<link href="{$static_domain_path_css}/mydomain.css" rel="stylesheet" type="text/css" />
	<script src='{$static_domain_path_js}/userdefind/owndom.js'></script>
{elseif $currentpage_js eq 'my_page'}
	<script src='includes/scripts/userdefind/profile.js'></script>
{elseif $currentpage_js eq 'contactus'}
	<script src='includes/scripts/userdefind/contactus.js'></script>
{/if}