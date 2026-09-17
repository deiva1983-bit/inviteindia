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
$smarty->assign('topnav_select', 'termsofser');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
$smarty->assign('pagetitle', 'Terms of Service | InviteIndia');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$canurl = 'https://www.inviteindia.com/terms.php';
$smarty->assign('can_url', $canurl);
 	$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/terms.tpl';
$home_page_meta_desc='Review the Terms of Service for InviteIndia wedding websites and digital invitations, including payment, content, and platform usage policies.';
$home_page_meta_key='Terms of service, wedding website terms, digital invitation policies, InviteIndia policies, wedding website security';
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
