<?php
/**
 * Buy Domain Page - Refactored with Global Header
 *
 * File: buy-domain-refactored.php
 * Description: Example of refactored buy-domain page with global header integration
 *
 * This template can be applied to the actual buy-domain.php or serviceproc.php
 */

// Include config and init
include_once('includes/configs/init.php');

// ============================================================================
// Configuration
// ============================================================================

$use_new_header = true; // Enable new global header

// Get user ID (null-safe)
$user_log_id = trim($_SESSION['sess_user_id'] ?? '');
$show_auth = !empty($user_log_id) ? 1 : 0;

// Page meta/SEO
$page_title = 'Buy Custom Wedding Domain | InviteIndia';
$page_desc = 'Register a custom domain for your wedding website. Affordable domain registration starting at just ₹650 with hosting and 12 months support.';
$page_keywords = 'custom domain, wedding domain, domain registration, affordable wedding domain, personalized wedding website';
$can_url = 'https://www.inviteindia.com/buy-domain.php';

// ============================================================================
// Smarty Assignments
// ============================================================================

// Global header
$smarty->assign('use_new_header', $use_new_header);
$smarty->assign('show_auth', $show_auth);
$smarty->assign('topnav_select', 'owndomain'); // Active menu item

// Meta tags
$smarty->assign('pagetitle', $page_title);
$smarty->assign('metadesc', $page_desc);
$smarty->assign('metakeywords', $page_keywords);
$smarty->assign('can_url', $can_url);

// Global variables
$smarty->assign('glb_site_url', $glb_site_url);
$smarty->assign('glb_user_log_id', $user_log_id);
$smarty->assign('currentpage_js', 'owndomain');

// ============================================================================
// Content Rendering
// ============================================================================

// Use new global header
$smarty->assign('header', $smarty->fetch('default/header-global.tpl'));

// Fetch your existing domain template
$content_template = 'default/owndomain.tpl'; // Your existing template
$smarty->assign('content', $smarty->fetch($content_template));

// Fetch footer
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));

// Display page
$smarty->display('default/index.tpl');
?>
