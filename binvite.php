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
$_SESSION['wed_invitation_access'] = 1;
$smarty->assign('topnav_select', 'wedd');
$chkqry= "SELECT mrg_page_url, mrg_status, mrg_url_sts_auto_id FROM mrg_url_status where mrg_status !='3' and mrg_main_user_id = '".$user_log_id."' order by mrg_url_created_date"; 
	$selectwed_access= $userslog_obj->selectVal($chkqry);
$totcountval= count($selectwed_access);

if($totcountval >= $max_card_per_acc)
{
echo "Sorry. You created maximum invitation cards, We allowed $max_card_per_acc invitaions per account."; exit;
}

$formaction = 'bsuccess.php?page=2';
$smarty->assign('glb_formaction', $formaction);
$content_template = 'default/mrg_account/btheme.tpl';	
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('currentpage_js', 'birth_create');
$home_page_title = "Free birthday website  | Online birthday invitation";
$home_page_meta_desc = "online birthday website. Create your birthday invitation with colourful themes and share with your friends";
$home_page_meta_key = "online marriage invitation, Wedding website templates, Birthday templates";
$smarty->assign('local_add', $local_add);
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') ); echo $content_template;
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
