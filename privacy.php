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
$smarty->assign('pagetitle', 'Privacy Policy | InviteIndia');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$canurl = 'https://www.inviteindia.com/privacy.php';
$smarty->assign('can_url', $canurl);
 	$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/privacy.tpl';
$home_page_meta_desc='Read the InviteIndia privacy policy to understand how your wedding website details, guest information, and digital invitation data are handled and protected.';
$home_page_meta_key='privacy policy, wedding website privacy, digital invitation security, InviteIndia privacy, guest data protection';
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
