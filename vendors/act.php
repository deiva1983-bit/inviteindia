<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
/*----- Object creation End -----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('topnav_select', 'vendors');
$smarty->assign('currentpage_js', 'vendors_home');
$smarty->assign('pagetitle', 'inviteindia: Register your account, Interview question, Interview tips, Free SMS- Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
$smarty->assign('metadesc', 'Register your account, Interview question, Interview tips, Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
$smarty->assign('metakeywords', 'Register your account, Interview question, Interview tips,  Free SMS, Send Free SMS, Send free SMS to Group, Add friends,Send free SMS to your friends,Send free SMS to your friends Group'); 
 $smarty->assign('glb_site_url', $glb_site_url);

/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=trim($_REQUEST['do']);
$acc_created = 0;
$err = '';
if($doit == 'act'){
$tockid=trim($_REQUEST['tocken']);
$pieces = explode("inc", $tockid);
$uid = $pieces[0]; 
$tid = $pieces[1];
		$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_auto_id= '".$uid."' and ven_activate_code = '".$tid."' ";
		$selectAffectedRows_email = $userslog_obj->selectAffectedRows($chkqry);
		if($selectAffectedRows_email){
		$access= $userslog_obj->selectVal($chkqry);
		$uname= trim($access[0]['ven_username']);
		$status= trim($access[0]['ven_status']);
			if($status == 0){
			$imgupqry="UPDATE `tbl_mas_vendors` SET `ven_activate_code` = '1', `ven_status` = '1' WHERE `ven_auto_id` = '".$uid."' LIMIT 1";
			$userslog_obj->updateVal($imgupqry);
			$acc_created = 1;
			$err = 'Your account is activated, Please login.';
			}else{
			$err = 'Your account already activated, Please login.';
			}
		}else{
		$err = 'System Error.';
		}
}
$content_template = '../templates/default/vendors/activated.tpl';
	 
$smarty->assign('tpl_err', $err);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
