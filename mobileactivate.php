<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : serviceproc.php
// Description : file to handle index page informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
 /*----- Object creation Start-----*/

$sms_obj = new sms();
$common_obj = new common();
 
/*----- Object creation End -----*/


/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'mobileactivate_page');
$smarty->assign('pagetitle', 'Send SMS: Send free SMS, Send free SMS to group');
/*----- Variables Declaration End-----*/
$current_action= trim($_REQUEST['do']);
$user_log_id= trim($_SESSION['sess_user_id']);
$cact=trim($_REQUEST['actc']);

/*$servie_id =  base64_decode($cact);
$exploded = explode("invite@", $servie_id); 
$servie_id = $exploded[1];*/
 
if(!isset($user_log_id))
{ exit; };
$chkqry= "SELECT * FROM `tbl_user_profile` where usrlog_id ='".$user_log_id."' ";
$selectAffectedRows = $sms_obj->selectVal($chkqry); 
//print_r ($selectAffectedRows);  
if($selectAffectedRows[0]['usrpro_sms_access'] != 1)
{ 
 $exiting_no= $selectAffectedRows[0]['usrpro_mobile_no']; 
 $smarty->assign('exiting_no', trim($exiting_no));
 if($current_action=="mobileactivate")
	{ 
	$mobnum= trim($_REQUEST['mobile_num']); 
	$sendpin = $common_obj->rand_str(4);
	 // SMS
	$user_log_id= trim($_SESSION['sess_user_id']);
	$upqry= "UPDATE `tbl_user_profile` SET `usrpro_mobile_no` = '".$mobnum."',`usrpro_mobile_pin_no` = '".$sendpin."' WHERE `usrlog_id` ='".$user_log_id."' LIMIT 1 " ;
	// send pin to sms proccess
	$order_list_id = $sms_obj->updateVal($upqry);	

	$content_template = 'default/mobilepin_activate.tpl';
	}
elseif($current_action=="mobilepin_activate")
	{
	$mob_pinnum= trim($_REQUEST['mobilepin_num']);
	$chkqry= "SELECT * FROM `tbl_user_profile` where usrlog_id ='".$user_log_id."' and usrpro_mobile_pin_no='".$mob_pinnum."' ";
	$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		{
		 $upqry= "UPDATE `tbl_user_profile` SET `usrpro_sms_access` = '1' WHERE `usrlog_id` ='".$user_log_id."' LIMIT 1 " ;

			$order_list_id = $sms_obj->updateVal($upqry);	 	 	
			header("Location: smscorner.php");
			
		}
	else
		echo '2';

 

	//$content_template = 'default/mobilepin_activate.tpl';
	}
else
	{
	$content_template = 'default/mobileactivate.tpl';
	}
}	
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
