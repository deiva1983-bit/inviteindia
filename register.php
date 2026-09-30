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
$userslog_obj = new userslog();
$common_obj = new common();
 /*----- Object creation Start-----*/


 
/*----- Object creation End -----*/


/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'home_page');

$register_page_title = 'Create InviteIndia Account - Free Wedding Website Builder';
$register_page_desc = 'Create a free InviteIndia account to build your custom Indian wedding website, design digital invitations, and manage guest RSVPs in minutes.';
$register_page_keywords = 'create InviteIndia account, wedding website registration, free account signup, digital invitation signup, wedding website account, create wedding account';

$smarty->assign('pagetitle', $register_page_title);
$smarty->assign('metadesc', $register_page_desc);
$smarty->assign('metakeywords', $register_page_keywords);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
//if($doit != "")
$requrl = $_COOKIE['last_req_url'];
setcookie("last_req_url", "", time()-3600);
$canurl = 'https://www.inviteindia.com/register.php';
$smarty->assign('can_url', $canurl);

// JSON-LD Schema Markup for Register Page
$schemaRegister = array(
	"@context" => "https://schema.org",
	"@type" => "BreadcrumbList",
	"itemListElement" => array(
		array(
			"@type" => "ListItem",
			"position" => 1,
			"name" => "Home",
			"item" => "https://www.inviteindia.com"
		),
		array(
			"@type" => "ListItem",
			"position" => 2,
			"name" => "Register",
			"item" => "https://www.inviteindia.com/register.php"
		)
	)
);

$smarty->assign('schema_register', json_encode($schemaRegister));
if($requrl != "")
	$smarty->assign('error_msg', "Please, login here..." );
 if($_SESSION['notvalid'] != "")
	{
	$smarty->assign('error_msg', "Your authentication fail, Please give correct information..." );
	unset($_SESSION['notvalid']);
	}
$user_log_id_home= trim($_SESSION['sess_user_id']);	
$show_login_panel= trim($user_log_id_home) != "" ? 1 : 0;

$smarty->assign('show_login_panel', $show_login_panel);
$smarty->assign('home_page_notes', $home_page_notes);
$smarty->assign('local_add', $local_add);
$content_template = 'default/home.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>





