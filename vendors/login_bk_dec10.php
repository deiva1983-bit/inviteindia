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
$smarty->assign('currentpage_js', 'vendors_login');
$smarty->assign('pagetitle', 'Indian Wedding Vendors, Indian Wedding suppliers - inviteindia.com');
$smarty->assign('metadesc', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products');
$smarty->assign('metakeywords', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products');
$smarty->assign('glb_site_url', $glb_site_url);

/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
$err='';
if($doit == 'out') {
unset($_SESSION['sess_ven_user_id']);
}else if($doit == 1) {
		$uname= trim($_REQUEST['ven_username']);
		$pword= base64_encode(trim($_REQUEST['ven_pword']));
		$login_hidd= trim($_REQUEST['ven_login_hidd']);
		if($login_hidd == 'logind'){
			$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_username='".$uname."' and ven_password='".$pword."' and ven_status ='2' ";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows) {
			$err = 'Please activate your account.';
			} else  {
					$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_username='".$uname."' and ven_password='".$pword."' and ven_status ='1' ";
					$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
						if($selectAffectedRows) {
							$select_access = $userslog_obj->selectVal($chkqry);
							$_SESSION['sess_ven_user_id'] = $select_access[0]['ven_auto_id'];
						}else{
						$err = 'Please register your account.';
						}
					}
		}
}
$smarty->assign('tpl_err', $err);
$user_log_id_home= trim($_SESSION['sess_ven_user_id']);
$ven_login_panel= trim($user_log_id_home) != "" ? 1 : 0; 
$smarty->assign('user_log_id_vend', $ven_login_panel);
if ($ven_login_panel){
header('Location: products.php'); exit;
}
$smarty->assign('login_panel', $ven_login_panel);
$smarty->assign('top_nav', $smarty->fetch('../templates/default/vendors/topnav.tpl') );
$content_template = '../templates/default/vendors/login.tpl'; 

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
