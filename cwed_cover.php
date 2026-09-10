<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url); 
$home_page_title = "Create Online wedding invitation | Adding wedding cover | Wedding cover designs - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation  with more features and share it your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates, Select wedding cover - inviteindia";
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$current_type= trim($_REQUEST['type']);
$current_wedid= trim($_REQUEST['wed_id']);
$covertype= trim($_REQUEST['covertype']);
if($covertype == '2')
	$smarty->assign('do_val', 'caddc');
else
	$smarty->assign('do_val', 'ballon');
$from_src= trim($_REQUEST['from']);
$smarty->assign('currentpage_js', 'ctheme_add_cover');
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$current_wedid."' and mrg_main_user_id = '".$user_log_id."' ";
	$selectwed_acces= $userslog_obj->selectVal($chkqry);
	if(count($selectwed_acces)){
	$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
	}
	else{
	exit;
	}
$user_allowed=$common_obj->checkWedFree($user_log_id, $current_wedid);
if($user_allowed){
$smarty->assign('blockpage', 1 ); 
$smarty->assign('errors', $free_errmsgs ); 
}
$chkqry1= "SELECT * FROM wed_covers_mas where wed_cover_status = '1' and wed_cover_type = '".$covertype."'";
$selectwed_cv= $userslog_obj->selectVal($chkqry1);
$smarty->assign('select_cover', $selectwed_cv );
$content_template = 'default/mrg_account/cwedcover.tpl';

if($covertype == '4' && $current_action == 'createit'){
	$fetchcvr= "SELECT male_name,female_name,wed_cover_male_name,wed_cover_female_name,wed_animate_cover FROM mrg_all_info where mrg_url_status_auto_id = '".$current_wedid."'";
	$fetchcvr_info= $userslog_obj->selectVal($fetchcvr);
	if($fetchcvr_info[0]['wed_animate_cover']) {
	$smarty->assign('mal_name', $fetchcvr_info[0]['wed_cover_male_name']);
	$smarty->assign('femal_name', $fetchcvr_info[0]['wed_cover_female_name']);
	} else {
	$smarty->assign('mal_name', $fetchcvr_info[0]['male_name']);
	$smarty->assign('femal_name', $fetchcvr_info[0]['female_name']);
	}

	$autoid = $selectwed_cv[0]['wed_cover_autoid'];
	$male_max_char = $selectwed_cv[0]['wed_cover_male_max_char'];
	$female_max_char = $selectwed_cv[0]['wed_cover_female_max_char'];
	$smarty->assign('mal_maxlength', $male_max_char);
	$smarty->assign('femal_maxlength', $female_max_char);
	$smarty->assign('cover_autoid', $autoid);
	$content_template = 'default/mrg_account/balloon_cwd.tpl';
}
$chkqry_covr= "SELECT wed_animate_cover FROM mrg_all_info where mrg_url_status_auto_id   = '".$current_wedid."' ";
$select_cov= $userslog_obj->selectVal($chkqry_covr);
$wed_animate_cover =  $select_cov[0]['wed_animate_cover'];
$smarty->assign('animate_cover', $wed_animate_cover);

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
// List avilable wed URLs.
$smarty->assign('wed_acc_id', $current_wedid );
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
