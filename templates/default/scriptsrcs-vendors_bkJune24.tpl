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
	<link rel="stylesheet" href="{$static_domain_path_css}/demo-themes.css" type="text/css" media="screen">
	<link rel="stylesheet" href="{$static_domain_path_css}/vendors.css" type="text/css" media="screen">
{elseif $currentpage_js eq 'vendors_login'}
	<script type='text/javascript' src='{$static_domain_path_js}/userdefind/vendors_login.js'></script>
{/if}