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

require_once("includes/functions/ajaxfileuploader.inc.php");

/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/
$smarty->assign('topnav_select', 'privacy_policy');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
$smarty->assign('pagetitle', 'Invitation site');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$canurl = $ssl_path.'www.inviteindia.com/privacy.php';
$smarty->assign('can_url', $canurl);
 	$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/privacy.tpl';
$smarty->assign('pagetitle', 'Privacy statement for your wedding website - inviteindia.com');
$home_page_meta_desc='InviteIndia have created this privacy statement to describe our commitment for your privacy. This page discloses about what type of information we are storing to create your wedding website.';
$home_page_meta_key='Free wedding website, Privacy & Policy for Wedding websites, TOS, Wedding website security';
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
