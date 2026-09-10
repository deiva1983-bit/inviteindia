<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$current_action= trim($_REQUEST['do']);
$smarty->assign('topnav_select', 'wedd1');
$content_template = 'default/surl.tpl';
$smarty->assign('currentpage_js', 'surl'); 
$alert_show=0;
$home_page_title = "shorten url for ipad devices: inviteindia";
$home_page_meta_desc = "Create shorten URL for IPAD Testing.";
$home_page_meta_key = "short url, shorten url, friendly url, small url";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
$smarty->assign('glb_site_url', $glb_site_url); 
$smarty->assign('alert_msg', $msg );
$smarty->assign('alert_status', $alert_show );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/subheader.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
