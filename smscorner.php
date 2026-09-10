<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
 //include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/


/*----- Variables Declaration Start-----*/

/*----- Variables Declaration End-----*/

$current_action= trim($_REQUEST['do']);
$smarty->assign('glb_site_url', $glb_site_url); 					
$user_log_id= trim($_SESSION['sess_user_id']);
 $smarty->assign('topnav_select', 'sms');
if (isset($_SESSION['sendmob']))	
	{
	$chkqry= "SELECT smsfrd_mobile_num FROM `tbl_sms_friends` where smsfrd_usrlog_id ='".$user_log_id."' and smsfrd_mobile_num='".$_SESSION['sendmob']."' and smsfrd_status='1' ";
 
	$selectsms_access= $userslog_obj->selectVal($chkqry);
	if(count($selectsms_access))
		{		 
		$smsstatus=1;
		}
		else
		{
		$smsstatus=0;
		} 

	$smarty->assign('sms_send_exist', $smsstatus);
	$smarty->assign('sms_send_status', 'ok');
	$smarty->assign('sms_send_mob', $_SESSION['sendmob']);
	unset($_SESSION['sendmob']);
	}
else
$smarty->assign('sms_send_status', 'no');
if($user_log_id)
{
$encript_val=base64_encode("invite@".$user_log_id); 
$chkqry= "SELECT usrpro_sms_access FROM `tbl_user_profile` where usrlog_id ='".$user_log_id."' ";
$selectsms_access= $userslog_obj->selectVal($chkqry);	
if($selectsms_access[0]['usrpro_sms_access'])
	$sms_sts="mylot@119*1"; // allowed - 1
else		 
	$sms_sts="mylot@129*1"; // register mobile -2 
}
else
{
$sms_sts="mylot@139*1"; //register account - 3
}
 
$smarty->assign('sms_status', $sms_sts);
$smarty->assign('sms_in_type', substr($sms_sts,7,1));
$smarty->assign('sms_en', $encript_val);
if($current_action!="")
{
	
 	
}
else
{
$smarty->assign('currentpage_js', 'my_sms');

$smarty->assign('pagetitle', 'inviteindia: Free SMS- Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
$smarty->assign('metadesc', 'Free SMS- Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
$smarty->assign('metakeywords', 'Free SMS, Send Free SMS, Send free SMS to Group, Add friends,Send free SMS to your friends,Send free SMS to your friends Group'); 
 

$content_template = 'default/smshome.tpl';
}
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
