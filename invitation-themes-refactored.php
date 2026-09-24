<?php
/**
 * Invitation Themes Page - Refactored with Global Header
 *
 * File: invitation-themes-refactored.php
 * Description: Example of how to integrate the new global header
 *              into existing Smarty-based pages
 *
 * This is an example/reference. Copy the pattern to your existing pages.
 */

// Include config and init
include_once('includes/configs/init.php');

// ============================================================================
// NEW: Set up global header configuration
// ============================================================================
$use_new_header = true; // Enable new global header

// Page meta tags
$page_title = 'Wedding Invitation Themes & Templates | InviteIndia';
$page_desc = 'Browse beautiful wedding invitation templates and themes. Customize colors, fonts, and designs for your perfect wedding card.';
$page_keywords = 'wedding invitation themes, invitation templates, wedding card designs, digital invitation templates';
$can_url = 'https://www.inviteindia.com/invitation-themes.php';

// Get user ID from session (null-safe)
$user_log_id = trim($_SESSION['sess_user_id'] ?? '');
$show_auth = !empty($user_log_id) ? 1 : 0;

// ============================================================================
// Smarty Assignments
// ============================================================================

// Global header config
$smarty->assign('use_new_header', $use_new_header);
$smarty->assign('show_auth', $show_auth);
$smarty->assign('topnav_select', 'themes'); // Active menu item

// Page meta/SEO
$smarty->assign('pagetitle', $page_title);
$smarty->assign('metadesc', $page_desc);
$smarty->assign('metakeywords', $page_keywords);
$smarty->assign('can_url', $can_url);

// Global variables
$smarty->assign('glb_site_url', $glb_site_url);
$smarty->assign('currentpage_js', 'themes');

// ============================================================================
// Content Rendering
// ============================================================================

// Use header wrapper which chooses between old and new header
if ($use_new_header) {
    $smarty->assign('header', $smarty->fetch('default/header-global.tpl'));
} else {
    $smarty->assign('header', $smarty->fetch('default/header.tpl'));
}

// Fetch content template
$content_template = 'default/invitations-themes.tpl'; // Your existing themes template
$smarty->assign('content', $smarty->fetch($content_template));

// Fetch footer
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));

// Display the final page using your layout template
$smarty->display('default/index.tpl');
?>
