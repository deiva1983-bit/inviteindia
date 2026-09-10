<link rel="stylesheet" type="text/css" href="{$glb_site_url}includes/css/font-manager.css" />

{if $isMobile eq '1'}
<link rel="stylesheet" type="text/css" href="{$static_domain_path_css}/mobile-styles.css" />
{else}
<link rel="stylesheet" type="text/css" href="{$static_domain_path_css}/pc-styles.css" />
{/if}
<script src='../includes/scripts/js/userdefind/validat_all{$glb_minify_js}.js'></script>
{if $smarty.session.sess_user_id neq '' }
<link href="{$static_domain_path_css}/common-login.css" rel="stylesheet" type="text/css" />
{/if}

{if $currentpage_js eq 'vendors_pdts'}
	<link rel="stylesheet" href="{$glb_vendors_lib_path}/css/business.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="{$static_domain_path_css}/demo-themes.css" type="text/css" media="screen">
	<link rel="stylesheet" href="{$static_domain_path_css}/vendors.css" type="text/css" media="screen">
	<link rel="stylesheet" href="{$glb_vendors_lib_path}/plugins/drop/uploadifive.css">
	<script type='text/javascript' src='{$static_domain_path_js}/userdefind/ven_suppliers.js'></script>
	<script src="{$glb_vendors_lib_path}/plugins/drop/jquery.uploadifive.js"></script><!-- CONTACT JS  -->

        <script src='{$glb_vendors_lib_path}../includes/scripts/userdefind/cus-review1.js'></script>
	<script src="{$glb_vendors_lib_path}../includes/scripts/imagecrop/croppie.min___1.js"></script>
	<script src="{$glb_vendors_lib_path}../includes/scripts/imagecrop/vendor_reg___1.js"></script>
	<link rel="stylesheet" href="{$glb_vendors_lib_path}../includes/scripts/imagecrop/croppie___1.css" />
	<link rel="stylesheet" href="{$glb_vendors_lib_path}../includes/css/userdefind/cus_review.css" type="text/css" media="screen">

	<script>
				$(function() {
	    			$('#file_upload1').uploadifive({
				'auto'             : false,
				'checkScript'      : 'check-exists.php',
				'fileType'         : '.jpg,.jpeg,.gif,.png',
				'formData'         : {
				   'timestamp' : '{$tpl_timestamp}',
				   'token'     : '{$tpl_timestamp_md5}'
				                     },
				'queueID'          : 'queue',
				'uploadScript'     : 'uploadifive.php',
				'onUploadComplete' : function(file, data) { alert(data); }
				});
				});
	</script>
	<style type="text/css">
	body {
		font: 13px Arial, Helvetica, Sans-serif;
	}
	.uploadifive-button {
		float: left;
		margin-right: 10px;
	}
	#queue {
		border: 1px solid #E5E5E5;
		height: 177px;
		overflow: auto;
		margin-bottom: 10px;
		padding: 0 3px 3px;
		width: 300px;
	}
	</style>
{elseif $currentpage_js eq 'vendors_login'}
	<script type='text/javascript' src='{$static_domain_path_js}/userdefind/vendors_login.js'></script>
{elseif $currentpage_js eq 'vendors_admin'}
	
{/if}
<script type='text/javascript' src='{$static_domain_path_js}/userdefind/vendors_login.js'></script>