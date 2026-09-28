<?php
$url= $_SERVER["REQUEST_URI"];

include_once( 'includes/configs/init.php' );
$smarty->assign('currentpage_js', 'mrg_account');
$smarty->assign('pagetitle', 'Create');
$content_template = 'default/mrg_account/home.tpl';	
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('tpl_modern_css', 1);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/mainheader.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>





