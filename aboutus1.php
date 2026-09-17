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
$smarty->assign('topnav_select', 'aboutus');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);

$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/about_us.tpl';

$about_page_title = 'About InviteIndia | Wedding Website & Digital Invitation Platform';
$about_page_meta_desc = 'Learn about InviteIndia, a trusted platform for creating Indian wedding websites, digital invitations, guest management tools, and elegant wedding planning experiences.';
$about_page_keywords = 'about InviteIndia, wedding website platform, digital wedding invitations, Indian wedding website company, online wedding invitation creator';
$canurl = 'https://www.inviteindia.com/aboutus1.php';

$smarty->assign('can_url', $canurl);
$smarty->assign('pagetitle', $about_page_title);
$smarty->assign('metadesc', $about_page_meta_desc);
$smarty->assign('metakeywords', $about_page_keywords);
$smarty->assign('maxcard_per_acc', $max_card_per_acc);
$smarty->assign('free_indays', $free_indays);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
