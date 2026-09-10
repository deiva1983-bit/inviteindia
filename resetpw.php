<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : serviceproc.php
// Description : file to handle index page informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
// http://localhost:8080/inviteweb1/new96/inviteindia/resetpw.php?secode=NDkzM1M0MTkzOQ==
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
$userslog_obj = new userslog();
$common_obj = new common();
 /*----- Object creation Start-----*/
 
/*----- Object creation End -----*/

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
$login_page_title = "Reset your password - quickly and securely.";
$home_page_meta_desc = "Create your wedding website and share with your friends";
$home_page_meta_key = "Register wedding website, create online wedding website, share wedding website";
$login_page_desc = 'Reset your password. quickly and securely. Follow the simple steps to regain access to your account';
$smarty->assign('pagetitle', $login_page_title);
$smarty->assign('metadesc', $login_page_desc);
$smarty->assign('metakeywords', $login_page_keywords);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$secode=$_REQUEST['secode'];
$clean_code = base64_decode ($secode);
$uid = explode("S",$clean_code); 
$uid = $uid[0];
$chkqry = "SELECT * FROM tbl_user_login WHERE usrlog_id = $uid and usrlog_password_code = '$clean_code' ";
$select_city= $userslog_obj->selectVal($chkqry); 
$pageallow = count($select_city) ? 1 : 2;
$smarty->assign('tpl_pageallow', $pageallow);
$smarty->assign('tpl_secode', $secode);
$smarty->assign('tpl_uid', $uid);
$content_template = 'default/resetpwd.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
