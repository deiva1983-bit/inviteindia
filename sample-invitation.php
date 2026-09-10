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
$smarty->assign('topnav_select', '');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$canurl = $ssl_path.'www.inviteindia.com/sample-invitation.php';
$smarty->assign('can_url', $canurl);
 	$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/samples.tpl';
//$smarty->assign('pagetitle', 'sample wedding websites at inviteindia.com');
$smarty->assign('pagetitle', 'The ultimate wedding website example - inviteindia.com');
$sample_page_title = "The ultimate wedding website example";
$home_page_meta_desc='Create your free online wedding invitation, Wedding websites with Indian theme designs. - inviteindia';
$sample_page_meta_desc='A wedding website is an essential tool for planning your big day. Check out these examples of beautiful websites to help you plan your perfect day.';
$home_page_meta_key='wedding website, wedding planning, free wedding websites, online wedding organiser, wedding offers, marriage website, wedding invitations, online marriage invitation, e-invitation';
$smarty->assign('pagetitle', $sample_page_title.$common_page_title_end);
$smarty->assign('metadesc', $sample_page_meta_desc);
$smarty->assign('metakeywords', $sample_page_keywords);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
