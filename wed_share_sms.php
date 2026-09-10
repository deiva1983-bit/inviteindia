<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mails_obj = new mails();
$cronsms_obj = new cronsms();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$current_page= trim($_REQUEST['page']);
$smarty->assign('currentpage_js', 'wed_share_sms');
$wedid= trim($_REQUEST['wed_id']);
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed) {
$chkpay_status= "SELECT * FROM `tbl_user_login` where usrlog_id ='".$user_log_id."' ";
$pay_status= $userslog_obj->selectVal($chkpay_status);	
$plan_id = trim($pay_status[0]['usrlog_plan']);
$user_status = trim($pay_status[0]['usrlog_activests']);
$paid_user= 0; $total_sms = 0;
if($plan_id) {
$paid_user= 1;
if($plan_id == 3) {
$total_sms = $account_sms_3;
} else if($plan_id == 2) {
$total_sms = $account_sms_2;
} else {
$total_sms = $account_sms_1;
}

$chksmscnt= "SELECT * FROM tbl_sms_friends where smsfrd_usrlog_id='".$user_log_id."' ";
$used_sms = $userslog_obj->selectAffectedRows($chksmscnt);
$total_sms_avilable = $total_sms - $used_sms;
}


$in_sms_type = '1';
if($current_action == 'sharem'){
$chkqry= "SELECT * FROM `tbl_user_profile` where usrlog_id ='".$user_log_id."' ";
$selectsms_access= $userslog_obj->selectVal($chkqry);	
$sms_access = trim($selectsms_access[0]['usrpro_sms_access']);
$mobile_no = trim($selectsms_access[0]['usrpro_mobile_no']);
$err_msg = '';
$process_sms = 1;
$qry_lastdate= "select marriage_date_only from mrg_all_info where mrg_url_status_auto_id = '".$wedid."' ";
$lastdate_mrg = $userslog_obj->selectVal($qry_lastdate);
$marriage_date_only = trim($lastdate_mrg[0]['marriage_date_only']);
if($marriage_date_only != '')
$marriage_date_only =date('Y-m-d', strtotime("$marriage_date_only"));
if($mobile_no != '0' && $sms_access == 1){
$show_complete_panel = 0;
}
if($mobile_no != '0' && $sms_access == 2){
$err_msg = 'Your number is not verified, Please enter your pin to verify your mobile number.';
$show_input_panel = 0;
$show_activate_panel = 1;
$process_sms = 0;
} else if ($mobile_no != '0' && $sms_access == 0) {
$show_complete_panel = 1;
$process_sms = 0;
$show_activate_panel = 1;
$err_msg = 'Your number is not verified, Please enter your pin to verify your mobile number.';
}  else if ($mobile_no == '0') {
$show_complete_panel = 1;
$show_input_panel = 1;
$show_activate_panel = 0;
$err_msg = 'Please register your mobile number.';
$process_sms = 0;
}

// Form submit functions start
$input_sub = trim($_REQUEST['share_by_sms']);
$frm_submit = 0;
if($input_sub == 'Send SMS') {
$frm_submit = 1;
$friends_mobile_no = trim($_REQUEST['friends_mobile_no']);
$invite_details = trim($_REQUEST['invite_details']);
$in_sms_type = trim($_REQUEST['sms_type']);

$sms_date = trim($_REQUEST['sms_date']);
if(!$paid_user) {
			$err_msg=$err_msg."Sorry, The SMS features available only for premium members.<br />";
			$process_sms = 0;
}
if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) ) {}
			else{
			$err_msg=$err_msg."Please enter valid secure code.<br />";
			$process_sms = 0;
			}
if(!$friends_mobile_no) {
			$err_msg=$err_msg."Please enter your friends mobile number.<br />";
			$process_sms = 0;
}
if(!$invite_details) {
			$err_msg=$err_msg."Please enter your invite message.<br />";
			$process_sms = 0;
} else {
$invite_details = trim($mobile_no).'-'.$invite_details.'-inviteindia.com';
}
$alert_status = 0;
$alert_msg = '';
if($process_sms) {
$invite_details_slashes = addslashes($invite_details);
$inqry= "INSERT INTO sms_invite_tmpl (sms_invite_autoid, sms_invite_msg, sms_invite_adminid, sms_invite_inviteid) VALUES (NULL, '".$invite_details_slashes."', '".$user_log_id."', '".$wedid."')";
$order_invite_id = $userslog_obj->insertVal($inqry);
$sms_status=1;
if($sms_date != '' and $in_sms_type == 2) {
$sms_date =date('Y-m-d', strtotime("$sms_date"));
$sms_status = 2;
$alert_msg = 'Your invite sms has been scheduled successfully.';
$alert_status = 1;
} else {
$sms_status = 1; // Send SMS immediatly
$alert_msg = 'Your invite sms has been delivered successfully.';
$alert_status = 1;
}

// Add your guest mobile numbers
//$lstchar = substr($friends_mobile_no, -1) ;
$friends_mobile_no = rtrim($friends_mobile_no, ",") ;
$fmobile_no = split (",", $friends_mobile_no); 
/* $input_len = 2; echo $total_sms_avilable;
if($input_len > $total_sms_avilable) {
echo 'Sorry, Your available SMS count is'. $total_sms_avilable;
exit;					
} */
$smsmobile_nos='';
while (list($key, $val) = each($fmobile_no)) {
   $slen = strlen($val);
   $fmob = $val;
   if($slen == 10) {
	// Schedule SMS	
	if ($sms_status == '1') { // Send SMS Immediatly.
		$smsmobile_nos .= $fmob.',';
		//$cronsms_obj->sendsms($invite_details, $fmob);
	}
	$inqry= "INSERT INTO `tbl_sms_friends` (`smsfrd_id`, `smsfrd_usrlog_id`, `smsfrd_inviteid`, `smsfrd_msg_id`, `smsfrd_mobile_num`, `smsfrd_name`, `smsfrd_rem_date`, `smsfrd_status`) VALUES (NULL, '".$user_log_id."', '".$wedid."', '".$order_invite_id."', '".$fmob."', '', '".$sms_date."', '".$sms_status."')";
	$userslog_obj->insertVal($inqry);
   }
  }
 if ($sms_status == '1') { // Send SMS Immediatly.
		if($smsmobile_nos != '') {
		$smsmobile_nos = rtrim($smsmobile_nos, ",") ;
		$cronsms_obj->sendsms($invite_details, $smsmobile_nos);
		}
		
	}

$friends_mobile_no ='';
$invite_details ='';
$sms_date ='';
$in_sms_type = '1';
}

$smarty->assign('glb_friends_mobile_no', $friends_mobile_no);
$smarty->assign('glb_invite_details', $invite_details);
$smarty->assign('glb_sms_date', $sms_date);
}
$smarty->assign('glb_form_submit', $frm_submit);
// Form submit functions end
$capchaImg="<div><p><label class='lab_black_color' style='width:200px;'>Your security code:</label><img src='CaptchaSecurityImages.php?width=100&height=40&characters=4'/></p></div><div><p><label class='lab_black_color' style='width:200px;'>Enter your security code:</label><input id='security_code' name='security_code' type='text'  class='inputval' autocomplete='off' /></p></div>";
$smarty->assign('capchaImg', $capchaImg);	

$content_template = 'default/mrg_account/wedshare_by_sms.tpl';

}

}
else {
echo "Sorry, You cant access this page."; exit;
}


if($plan_id) {
$chksmscnt= "SELECT * FROM tbl_sms_friends where smsfrd_usrlog_id='".$user_log_id."' ";
$used_sms = $userslog_obj->selectAffectedRows($chksmscnt);
$total_sms_avilable = $total_sms - $used_sms;
}

$smarty->assign('glb_paid_user', $paid_user);
$smarty->assign('glb_total_sms', $total_sms);
$smarty->assign('glb_total_sms_avilable', $total_sms_avilable);

$smarty->assign('glb_in_sms_type', $in_sms_type);
$smarty->assign('glb_err_msg', $err_msg);
$smarty->assign('glb_show_activate_panel', $show_activate_panel);
$smarty->assign('glb_show_complete_panel', $show_complete_panel);
$smarty->assign('alert_status', $alert_status);
$smarty->assign('alert_msg', $alert_msg);
$smarty->assign('glb_show_input_panel', $show_input_panel);

$smarty->assign('glb_mobile_no', $mobile_no);
$smarty->assign('glb_marriage_date_only', $marriage_date_only);

$home_page_title = "Free wedding website | Invite your friends | Share wedding invitations";
$home_page_meta_desc = "Create your wedding invitation with colourful themes with more features and share with your friends, Invite your friends from Inviiteindia.com";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates, Invite your friends, Share wedding card";

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
//$content_template = 'default/mrg_account/theme_created_success.tpl';

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
