<?php
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
$userslog_obj = new userslog();
$common_obj = new common();
 /*----- Object creation Start-----*/
 
/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'payment');
$home_page_title = "Free wedding website registrations | Create your wedding website";
$home_page_meta_desc = "Create your wedding website and share with your friends";
$home_page_meta_key = "Register wedding website, create online wedding website, share wedding website";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
 $user_log_id= trim($_SESSION['sess_user_id']);
 
 $chkqry= "SELECT usrpro_fname, usrpro_lname, usrpro_email,usrlog_id FROM tbl_user_profile where usrlog_id = '".$user_log_id."' "; 
	$selectwed= $userslog_obj->selectVal($chkqry);
	$email = $selectwed[0]['usrpro_email'];
	$fname = $selectwed[0]['usrpro_fname'];
	$lname = $selectwed[0]['usrpro_lname'];
	$usrlog = $selectwed[0]['usrlog_id'];
	$fromCou = $common_obj->getCountryList('from_Currency');
	$toCou = $common_obj->getCountryList('to_Currency');
	
	$smarty->assign('pay_fromCou', $fromCou);
	$smarty->assign('pay_toCou', $toCou);
	
$smarty->assign('email_pay', $email);
$smarty->assign('fname_pay', $fname);
$smarty->assign('lname_pay', $lname);
$smarty->assign('usrlog_pay', $usrlog);
$content_template = 'default/mrg_account/donate.tpl';
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
