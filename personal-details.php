<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$current_action= trim($_REQUEST['do']);
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$website_count = $common_obj->checkWedCount($user_log_id);
$show_err = 0; $error_message = '';
if($website_count >= $max_card_per_acc){ // Reached maximum count
$show_err = 1;
$error_message=$err_max_website;
} else {

}
$smarty->assign('show_err', $show_err);
$smarty->assign('error_msg', $error_message);
$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
if($_SESSION['gnav_personal_info']== '1')
	$gnav_personal_class = 'active';
if($_SESSION['gnav_general_info']== '1')
	$gnav_general_class = 'active';
if($_SESSION['gnav_ceremony_info']== '1')
	$gnav_ceremony_class = 'active';
if($_SESSION['gnav_reception_info']== '1')
	$gnav_reception_class = 'active';
$smarty->assign('gnav_personal_class', $gnav_personal_class);
$smarty->assign('gnav_general_class', $gnav_general_class);
$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
$smarty->assign('gnav_reception_class', $gnav_reception_class); 


$_SESSION['wed_invitation_access'] = 1;
$smarty->assign('topnav_select', 'wedd');
$chkqry= "SELECT mrg_page_url, mrg_status, mrg_url_sts_auto_id FROM mrg_url_status where mrg_status !='3' and mrg_main_user_id = '".$user_log_id."' order by mrg_url_created_date"; 
	$selectwed_access= $userslog_obj->selectVal($chkqry);
$totcountval= count($selectwed_access);
if($user_log_id == '17992' ) { $max_card_per_acc = 100; }
if($totcountval >= $max_card_per_acc)
{
echo "Sorry. You created maximum invitation cards, We allowed $max_card_per_acc invitaions per account."; exit;
}
$formaction = ($user_log_id > 4405 ? 'wedaccountsuccess.php?page=2' : 'wed_account_success.php?page=2');
$smarty->assign('glb_formaction', $formaction);
$content_template = 'default/mrg_account/pers_info.tpl';	
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('currentpage_js', 'web_create_latest');
$home_page_title = "Free wedding website | Create Online wedding invitation";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('local_add', $local_add);
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
