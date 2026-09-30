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

$signin_page_title = 'Sign In to InviteIndia - Create Your Wedding Website';
$signin_page_desc = 'Log in to your InviteIndia account to create a wedding website, share digital invitations, manage RSVPs, and coordinate your big day with family and friends.';
$signin_page_keywords = 'sign in InviteIndia, wedding website login, InviteIndia account login, digital invitation account, wedding website sign in, create wedding website';

$smarty->assign('pagetitle', $signin_page_title);
$smarty->assign('metadesc', $signin_page_desc);
$smarty->assign('metakeywords', $signin_page_keywords);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
//if($doit != "")
$requrl = $_COOKIE['last_req_url'];
setcookie("last_req_url", "", time()-3600);
$canurl = 'https://www.inviteindia.com/signin.php';
$smarty->assign('can_url', $canurl);

// JSON-LD Schema Markup for Sign In Page
$schemaSignIn = array(
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
			"name" => "Sign In",
			"item" => "https://www.inviteindia.com/signin.php"
		)
	)
);

$smarty->assign('schema_signin', json_encode($schemaSignIn));
if($requrl != "")
	$smarty->assign('error_msg', "Please, login here..." );
 if($_SESSION['notvalid'] != "")
	{
	$smarty->assign('error_msg', "Authentication failed. Please check your username/password." );
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





