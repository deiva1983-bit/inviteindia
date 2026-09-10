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
$smarty->assign('pagetitle', 'Invitation site');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);

$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/about_us.tpl';
$smarty->assign('pagetitle', 'Wedding website services - inviteindia.com');
$home_page_meta_desc='Create your free online wedding invitation, Wedding websites with Indian theme designs. - inviteindia';
$home_page_meta_desc='Our unique services for your wedding website, wedding website examples';

$home_page_meta_key='Free wedding website, Wedding websites, indian marriage websites, e-invitation, marriage invitation, Wedding Card, E-Wedding Card, Online Invitations, free wedding ecards';
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
$smarty->assign('maxcard_per_acc', $max_card_per_acc);
$smarty->assign('free_indays', $free_indays);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
