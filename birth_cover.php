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
$from_src= trim($_REQUEST['from']);
$smarty->assign('currentpage_js', 'theme_add_cover');
$chkqry_birth= "SELECT birth_page_url FROM birth_url_status where birth_url_sts_auto_id  = '".$current_wedid."' and birth_main_user_id = '".$user_log_id."' ";
$selectbirth_acces= $userslog_obj->selectVal($chkqry_birth);
if(count($selectbirth_acces)) {
		$smarty->assign('page_url_status6', trim($selectbirth_acces[0]['birth_page_url'])."?status=6");
	} 
	else {
	exit;
	}

$chkqry_covr= "SELECT wed_lang_id FROM mrg_all_info_add where mrg_url_status_auto_id   = '".$current_wedid."' ";
$selectaddi = $userslog_obj->selectAffectedRows($chkqryres_add);
$lang_id = 1;
if($selectaddi){
	$select_langdetails= $userslog_obj->selectVal($chkqry_covr);
	$lang_id =  $select_langdetails[0]['wed_lang_id'];
}

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
// List avilable wed URLs.
$smarty->assign('wed_acc_id', $current_wedid );
$smarty->assign('do_val', $current_action);
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$content_template = 'default/birth_account/birth_success.tpl';
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/birth_account/left_nav_for_wedding.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
