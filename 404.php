<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : serviceproc.php
// Description : file to handle index page informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
$userslog_obj = new userslog();
$common_obj = new common();
 /*----- Object creation Start-----*/
$smarty->assign('currentpage_js', 'home_page');
$home_page_title = "Indian wedding website";
$home_page_meta_desc = "Wedding website registration";
$login_page_title = 'Registration at Indian wedding website';
$smarty->assign('pagetitle', $home_page_title.$common_page_title_end);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $login_page_keywords);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];

$noneed_index = 1;
$smarty->assign('tpl_noneed_index', $noneed_index);
$user_log_id_home= trim($_SESSION['sess_user_id']);
$show_login_panel= trim($user_log_id_home) != "" ? 1 : 0;
$content_template = 'default/404.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
