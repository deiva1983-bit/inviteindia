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
$smarty->assign('pagetitle', 'Invitation site');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$smarty->assign('glb_site_url', $glb_site_url);
$canurl = $ssl_path.'www.inviteindia.com/online-wedding-website-contactus';
$smarty->assign('can_url', $canurl);
$content_template = 'default/contact_us.tpl';
$smarty->assign('pagetitle', 'unlimited support for wedding website creation - contact us any time.');
$home_page_meta_desc='Inviteindia is always ready to help our customers for creating wedding websites. You can reach us via email, WhatsApp or Phone.';
$home_page_meta_key='Wedding website, Contact us, Tips for wedding website';
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
