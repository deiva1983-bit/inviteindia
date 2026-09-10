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
$user_log_id= trim($_SESSION['sess_user_id']);
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/


/*----- Variables Declaration Start-----*/

/*----- Variables Declaration End-----*/

$current_action= trim($_REQUEST['sms_chk']);
if($current_action=="sendsms")
{
$txt_mob_no= trim($_REQUEST['txt_mob_no']);
$msgText= trim($_REQUEST['msgText']);
$smsstatus=0;
if(!is_numeric($txt_mob_no)){
	
	$chkqry= "SELECT smsfrd_mobile_num FROM `tbl_sms_friends` where smsfrd_usrlog_id ='".$user_log_id."' and smsfrd_name='".$txt_mob_no."' and smsfrd_status='1' ";
 
	$selectsms_access= $userslog_obj->selectVal($chkqry);
	if(count($selectsms_access))
		{
		$mob=$selectsms_access[0]['smsfrd_mobile_num'];
		 // Send Text to SMS 
		$smsstatus=1;
		} 
	}
else
	{
		if(strlen($txt_mob_no)==10)	
			{
			$mob=$txt_mob_no;
			// Send Text to SMS 
			$smsstatus=1;
			}
	
	}
 if($smsstatus==1)
	{
	$_SESSION['sendmob']=$mob;
	header("Location: smscorner.php");
	exit;
	}


} 
?>
