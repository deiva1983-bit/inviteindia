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
$content_template = 'default/contact_us.tpl';

$contact_page_title = 'Contact InviteIndia - 24/7 Wedding Website Support';
$contact_page_desc = 'Get in touch with InviteIndia support team. We offer 24/7 assistance for wedding website creation, digital invitations, and guest management via email, WhatsApp, or phone.';
$contact_page_keywords = 'contact InviteIndia, wedding website support, wedding invitation help, customer support, InviteIndia helpline, wedding website customer service';

$smarty->assign('pagetitle', $contact_page_title);
$smarty->assign('metadesc', $contact_page_desc);
$smarty->assign('metakeywords', $contact_page_keywords);
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);

$canurl = 'https://www.inviteindia.com/contact-us.php';
$smarty->assign('can_url', $canurl);

// JSON-LD Schema Markup for Contact Page
$schemaContact = array(
	"@context" => "https://schema.org",
	"@type" => "ContactPage",
	"name" => "InviteIndia Contact Support",
	"description" => "Contact InviteIndia support team for wedding website help",
	"url" => "https://www.inviteindia.com/contact-us.php",
	"organizationContact" => array(
		"@type" => "Organization",
		"name" => "InviteIndia",
		"url" => "https://www.inviteindia.com",
		"contactPoint" => array(
			"@type" => "ContactPoint",
			"contactType" => "Customer Support",
			"availability" => "http://schema.org/24/7",
			"areaServed" => "IN",
			"email" => "support@inviteindia.com"
		)
	)
);

$schemaBreadcrumbContact = array(
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
			"name" => "Contact Us",
			"item" => "https://www.inviteindia.com/contact-us.php"
		)
	)
);

$smarty->assign('schema_contact', json_encode($schemaContact));
$smarty->assign('schema_contact_breadcrumb', json_encode($schemaBreadcrumbContact));

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>







