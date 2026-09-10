<?php
$url= $_SERVER["REQUEST_URI"];

include_once( 'includes/configs/init.php' );
$smarty->assign('currentpage_js', 'mrg_account');
$smarty->assign('pagetitle', 'Create');
$content_template = 'default/mrg_account/home.tpl';	
$smarty->assign('topnav_select', 'wedd');
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
