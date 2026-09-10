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
$smarty->assign('topnav_select', 'wedd');
$content_template = 'default/mrg_account/wed_home.tpl';
$smarty->assign('currentpage_js', 'theme_select'); 
$smarty->assign('user_log_id', $user_log_id );
$_SESSION['lastupdate_id']='';
//$chkqry= "SELECT mrg_page_url, mrg_status, mrg_url_sts_auto_id, mrg_site_start_date, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and mrg_main_user_id = '".$user_log_id."' order by mrg_url_created_date"; 
$chkqry= "SELECT mrg_page_url, mrg_status, mrg_url_sts_auto_id, mrg_site_start_date, mrg_site_end_date  FROM mrg_url_status where mrg_main_user_id = '".$user_log_id."' order by mrg_url_created_date"; 
	$selectwed_access= $userslog_obj->selectVal($chkqry);
$totcountval_wed= count($selectwed_access);

// Fetch Birhtday related websites
$chkqry_birth= "SELECT birth_page_url, birth_status, birth_url_sts_auto_id, birth_site_start_date, birth_site_end_date  FROM birth_url_status where birth_main_user_id = '".$user_log_id."' order by birth_url_created_date"; 
$selectbirth_access= $userslog_obj->selectVal($chkqry_birth);
$totcountval_birth= count($selectbirth_access);
$totcountval = $totcountval_wed + $totcountval_birth;
if($totcountval)
	{
		// List avilable wed URLs.
		$smarty->assign('selectwed_count', $selectwed_access );
		$smarty->assign('selectbirth_count', $selectbirth_access );
	}
	else
	{ 
		$smarty->assign('selectwed_count', 0);
	}
	if($user_log_id == '17992' ) { $max_card_per_acc = 100; }
	$smarty->assign('tot_count', $totcountval);
	$smarty->assign('tot_count_wed', $totcountval_wed);
	$smarty->assign('tot_count_birth', $totcountval_birth);
	$smarty->assign('glb_free_indays', $free_indays);
	$smarty->assign('max_card_per_acc', $max_card_per_acc);
	$avi_in = $max_card_per_acc - $totcountval;
	$smarty->assign('avi_in', $avi_in);
$alert_show=1;
if($current_action == 'dbven')	
	$msg="Congrats, Your wedding invitation updated successfully... :)";	
elseif($current_action == 'dbvenamr')
	$msg="Congrats, Your wedding invitation created successfully... :)";
elseif($current_action == 'themven') 
	$msg="Congrats, Your wedding invitation theme updated successfully... :)";
elseif($current_action == 'stsdis') 
	$msg="Congrats, Your invitation disabled successfully... :)";
elseif($current_action == 'stsenbl') 
	$msg="Congrats, Your invitation enabled successfully... :)";
else
	$alert_show=0;
$home_page_title = "Online wedding invitation - inviteindia.com";
$home_page_meta_desc = "Our customized online wedding invitation design portfolio has over more design templates to choose from. Select your  wedding invitation and easily create.";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
$smarty->assign('maxcard_per_acc', $max_card_per_acc);

$smarty->assign('alert_msg', $msg );
$smarty->assign('alert_status', $alert_show );
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
