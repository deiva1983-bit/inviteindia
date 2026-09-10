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
$doit=$_REQUEST['do'];
$show_reg_form = 1;
$err='';
if($doit != "") {
	$ven_reg=trim($_REQUEST['ven_register']);
	if($ven_reg == 'add'){
		$uname= trim($_REQUEST['ven_username']);
		$pword= base64_encode(trim($_REQUEST['ven_pword']));
		$uemail= trim($_REQUEST['ven_email']);
		$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_username='".$uname."' and ven_status ='1' ";
		$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
		$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_email= '".$uemail."' ";
		$selectAffectedRows_email = $userslog_obj->selectAffectedRows($chkqry);
		if($selectAffectedRows){
			$err = 'Username already exists, Please choose different username.';
			} else if ($selectAffectedRows_email) {
			$err = 'Email already exists, Please choose different email.';
			} else {
			$show_reg_form = 0;
			$reg_email_tmpl = $mail_obj->actVendors();
			$rand_activate_cod = $common_obj->rand_str(15);
			$inqry= "INSERT INTO `tbl_mas_vendors` (`ven_auto_id`, `ven_username`, `ven_password`, `ven_email`, `ven_activate_code`, `ven_status`) VALUES (NULL, '".$uname."', '".$pword."', '".$uemail."', '".$rand_activate_cod."', '0')";
			$lastinsert_id = $userslog_obj->insertVal($inqry); 
			//echo $lastinsert_id;
			$venacturl='http://www.inviteindia.com/vendors/act.php?do=act&tocken=';
			$actcode = $venacturl.$lastinsert_id.'inc'.$rand_activate_cod;
			$reg_email_tmpl =str_replace("%usernm%", "$uname", $reg_email_tmpl);
			$reg_email_tmpl =str_replace("%actwedurl%", "$actcode", $reg_email_tmpl);
			//echo $reg_email_tmpl;
			$sub = 'InviteIndia.com - Vendors activation';
			$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
			$common_obj->simplemail($uemail, $sub, $reg_email_tmpl, $headers);
			}
		}
}
if($show_reg_form){
$content_template = '../templates/default/vendors/register.tpl';	
}else{
$content_template = '../templates/default/vendors/register_succ.tpl';	
}

	 
$smarty->assign('tpl_err', $err);
$smarty->assign('tpl_sele_status', $sele_status);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
