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

$canurl = 'https://www.inviteindia.com/sample-invitation.php';

$smarty->assign('can_url', $canurl);

 	$smarty->assign('currentpage_js', 'interviewhome');

$content_template = 'default/samples.tpl';

$sample_page_title = 'Wedding Website Samples & Invitation Examples | InviteIndia';
$sample_page_meta_desc = 'Explore wedding website samples and invitation examples to inspire your big day. See elegant layouts, RSVP flows, and digital invitation design ideas.';
$sample_page_keywords = 'wedding website samples, wedding invitation examples, wedding website ideas, Indian wedding invitation design, digital invitation example';

$smarty->assign('pagetitle', $sample_page_title);
$smarty->assign('metadesc', $sample_page_meta_desc);
$smarty->assign('metakeywords', $sample_page_keywords);

/*----- Include Files Details Start-----*/

$smarty->assign('header', $smarty->fetch('default/header.tpl') );

$smarty->assign('content', $smarty->fetch($content_template) );

$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );

/*----- Include Files Details End-----*/

$smarty->display('default/index.tpl');

?>

