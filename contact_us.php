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
$smarty->assign('topnav_select', 'contact');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'contactus');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$smarty->assign('glb_site_url', $glb_site_url);
$canurl = 'https://www.inviteindia.com/contact-us.php';
$smarty->assign('can_url', $canurl);
$content_template = 'default/contact_us.tpl';

$contact_page_title = 'Contact InviteIndia | Wedding Website Support';
$contact_page_meta_desc = 'Need help with your wedding website or invitation? Contact InviteIndia for custom wedding invitation support, website guidance, and expert assistance for your big day.';
$contact_page_keywords = 'contact wedding website support, inviteindia support, wedding website help, digital invitation support, Indian wedding website assistance';

$smarty->assign('pagetitle', $contact_page_title);
$smarty->assign('metadesc', $contact_page_meta_desc);
$smarty->assign('metakeywords', $contact_page_keywords);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
