<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('do_val', 'chgbg');
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Wedding invitations - Wedding background music - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Add background music for your wedding invitation and share with your friends - inviteindia";
$home_page_meta_key = "wedding animations, wedding ecards, wedding animations, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$wedid= trim($_REQUEST['wed_id']);
$smarty->assign('currentpage_js', 'chgbg');
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
$classic_all_page = 0; $classic_home_page = 0;
$alert_msg=''; $alert_status=0;
if($page_allowed) {
	$ctype= trim($_REQUEST['type']);
	// Delete Current BG Images - Start
	
	$crid= trim($_REQUEST['rid']);
	if ($current_action == 'rembg' && $ctype == 'n' && $crid != '') {
	if($crid == 'fl') {
	$pageqry = "classic_findloc_page = 0";
	}elseif($crid == 'all') {
	$pageqry = "classic_all_page = 0";
	}elseif($crid == 'hp') {
	$pageqry = "classic_home_page = 0";
	}elseif($crid == 'ev') {
	$pageqry = "classic_events_page = 0";
	}elseif($crid == 'gb') {
	$pageqry = "classic_gbook_page = 0";
	}elseif($crid == 'alb') {
	$pageqry = "classic_album_page = 0";
	}elseif($crid == 'own') {
	$pageqry = "classic_own_page = 0";
	}
	$alert_msg = 'Your Background image has been removed.';
	$alert_status=1;
	$upqry = "UPDATE `mrg_classic_tpl` SET $pageqry WHERE classic_wedid='".$wedid."' and classic_status ='1' "; 
	$order_list_id = $userslog_obj->updateVal($upqry);
	}
	// Delete Current BG Images - End
	
    $chkqry= "SELECT * FROM mrg_classic_tpl WHERE classic_wedid = $wedid";
            $selectbg_access= $userslog_obj->selectVal($chkqry);
            if (count($selectbg_access)){
            $classic_all_page = trim($selectbg_access[0]['classic_all_page']);
			$classic_home_page = trim($selectbg_access[0]['classic_home_page']);
			$classic_events_page = trim($selectbg_access[0]['classic_events_page']);
			$classic_gbook_page = trim($selectbg_access[0]['classic_gbook_page']);
			$classic_findloc_page = trim($selectbg_access[0]['classic_findloc_page']);
			$classic_own_page = trim($selectbg_access[0]['classic_own_page']);
			$classic_alb_page = trim($selectbg_access[0]['classic_album_page']);
			}
    $content_template = 'default/mrg_account/theme_bg.tpl';
}
else
{
echo "Sorry, You cant access this page.";
}
$smarty->assign('alert_msg', $alert_msg);
$smarty->assign('alert_status', $alert_status);
$smarty->assign('gbp_classic_all_page', $classic_all_page);
$smarty->assign('gbp_classic_home_page', $classic_home_page);
$smarty->assign('gbp_classic_events_page', $classic_events_page);
$smarty->assign('gbp_classic_gbook_page', $classic_gbook_page);
$smarty->assign('gbp_classic_findloc_page', $classic_findloc_page);
$smarty->assign('gbp_classic_own_page', $classic_own_page);
$smarty->assign('gbp_classic_alb_page', $classic_alb_page);

$smarty->assign('do_val', $current_action);
$smarty->assign('glb_from_src', $from_src); 

$smarty->assign('user_wedid', $wedid );
$smarty->assign('wed_acc_id', $wedid );
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
