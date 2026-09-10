<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
 /*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('glb_site_url', $glb_site_url);				
$user_log_id= trim($_SESSION['sess_user_id']);
$qry_req=trim($_REQUEST['do']);

if($qry_req == 'play'){
$audio_id=trim($_REQUEST['audio_id']);
$content_template="default/mrg_account/playvideo.tpl";

$smarty->assign('currentpage_js', 'theme_select_music');
$smarty->assign('glb_theme_id', $qry_theme_id);
$smarty->assign('header', $smarty->fetch('default/header4popup.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
//$smarty->assign('footer', $smarty->fetch(''));
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
}
?>