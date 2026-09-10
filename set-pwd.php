<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('do_val', 'wedd_music');
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
$smarty->assign('currentpage_js', 'theme_select_music');
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed){
$user_allowed=$common_obj->checkWedFree($user_log_id, $wedid);
if($user_allowed){
$smarty->assign('blockpage', 1 ); 
$smarty->assign('errors', $free_errmsgs ); 
}
}

    $wedid= trim($_REQUEST['wed_id']);
        $chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
        $selectwed_acces= $userslog_obj->selectVal($chkqry);
        if(count($selectwed_acces)){
        $smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
        }
if($current_action == 'rp'){
	$fetch_pre = "SELECT mrg_page_url, pwd, pwd_protection_sts FROM `mrg_url_status` WHERE `mrg_url_sts_auto_id` ='".$wedid."' and pwd_protection_sts = 1";
        $fetch_pre= $userslog_obj->selectVal($fetch_pre);
		$show_pannel = 0;
        if(count($fetch_pre)){
						$upqry= "UPDATE `mrg_url_status` SET `pwd` = '', pwd_protection_sts = '0' WHERE `mrg_url_sts_auto_id` ='".$wedid."' LIMIT 1 ";
						$order_list_id = $userslog_obj->updateVal($upqry);
						$err_msg = "Your passcode has been removed from your website.";
						$smarty->assign('rem_status', 1);
        }
}

$show_pannel = 1;
$glb_err_msg = 0;
$req_a= trim($_REQUEST['action']);
if($req_a != ''){
	$pass = trim($_REQUEST['pwd_set']);
	if($pass == ''){
	$err_msg = "Please provide passcode for you wedding website.";
	$glb_err_msg = 1;
	} else if (strlen ($pass) > 8 ) {
	$err_msg = "Please provide a valid passcode, the maximum length must be 8 characters.";
	$glb_err_msg = 1;
	} else if(preg_match('/[^a-z_\-0-9]/i', $pass)){
		$err_msg = "Please provide a valid passcode, which must be A to Z or 0 to 9, and do not include any special characters.";
		$glb_err_msg = 1;
	}
	if(!$glb_err_msg) {
		$upqry= "UPDATE `mrg_url_status` SET `pwd` = '".$pass."', pwd_protection_sts = 1 WHERE `mrg_url_sts_auto_id` ='".$wedid."' LIMIT 1 ";
		$order_list_id = $userslog_obj->updateVal($upqry);
		$smarty->assign('alert_status', 1);
	}
}

$fetch_pre = "SELECT mrg_page_url, pwd, pwd_protection_sts FROM `mrg_url_status` WHERE `mrg_url_sts_auto_id` ='".$wedid."' and pwd_protection_sts = 1";
        $fetch_pre= $userslog_obj->selectVal($fetch_pre);
		
        if(count($fetch_pre)){
		$show_pannel = 0;
        $page_url = $fetch_pre[0]['mrg_page_url'];
		$pwd = $fetch_pre[0]['pwd'];
		$smarty->assign('c_pwd', $pwd);
		$pwd_protection_sts = $fetch_pre[0]['pwd_protection_sts'];
        }

$smarty->assign('glb_show_pannel', $show_pannel);
$smarty->assign('glb_txt_msg', $err_msg);
$smarty->assign('do_val', $current_action);
$smarty->assign('glb_err_msg', $glb_err_msg); 
$smarty->assign('user_wedid', $wedid );
$smarty->assign('wed_acc_id', $wedid );

$content_template = 'default/mrg_account/pwd-set.tpl';
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
