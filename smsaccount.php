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
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
 $smarty->assign('topnav_select', 'sms');
/*----- Object creation end-----*/


/*----- Variables Declaration Start-----*/

/*----- Variables Declaration End-----*/

$current_action= trim($_REQUEST['do']);
$user_log_id= trim($_SESSION['sess_user_id']);
 if($current_action=='actmgt')
{
$smarty->assign('currentpage_js', 'mobileactivate_page');  
 $current_type= trim($_REQUEST['type']);
	if($current_type=="frmg")
		{
		$limit = 5;
		$page="";
		
		if(isset($_REQUEST['f_list']) && ($_REQUEST['f_list']!=""))
		{
   		$page=$_REQUEST['f_list'];
   		$start = ($page - 1) * $limit;
		}
		else
		{
   		$start = 0;
		}
		$varname="f_list";

		$c_action=$_REQUEST['action']; // Inner action
		//$smarty->assign('currentpage_js', 'sms_friends_acc');
		$smarty->assign('pagetitle', 'Free SMS- Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
		$smarty->assign('metadesc', 'Free SMS- Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
		$smarty->assign('metakeywords', 'Free SMS, Send Free SMS, Send free SMS to Group, Add friends,Send free SMS to your friends,Send free SMS to your friends Group'); 	
		$content_template = 'default/smsacount_friends.tpl';
			if($_REQUEST['friends_add'] =="friends_add")
			{
			$mnum= trim($_REQUEST['txt_frd_mob_no']); $name= trim($_REQUEST['txt_frd_name']);
			$chkqry= "SELECT * FROM `tbl_sms_friends` where smsfrd_usrlog_id='".$user_log_id."' and smsfrd_mobile_num= '".$mnum."' ";  
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);  
			if($selectAffectedRows)
				{ echo 'exist'; exit; }
			else
				{	
				$inqry= "INSERT INTO `tbl_sms_friends` (`smsfrd_id`, `smsfrd_usrlog_id`, `smsfrd_mobile_num`, `smsfrd_name`,`smsfrd_status`, `smsfrd_grpup_id`, `smsfrd_added_date`, `smsfrd_modified_date`) VALUES (NULL, '".$user_log_id."', '".$mnum."', '".$name."', '1', '0', 'now()', 'now()')";
				 
				$order_list_id = $userslog_obj->insertVal($inqry);		 
				/* $inqry= "INSERT INTO `tbl_user_profile` (`usrpro_id`, `usrlog_id`, `usrpro_email`) VALUES (NULL, '".$order_list_id."', '".$uemail."')";
				$order_list_id = $userslog_obj->insertVal($inqry);	
				echo $order_list_id; */
				}
		

			}
			$targetpage ='smsaccount.php?do=actmgt&type=frmg';
			$chkqry= "SELECT * FROM `tbl_sms_friends` where smsfrd_usrlog_id ='".$user_log_id."'  ";
			$chkqrys= "SELECT * FROM `tbl_sms_friends` where smsfrd_usrlog_id ='".$user_log_id."' order by smsfrd_modified_date desc LIMIT  $start ,$limit";
			//echo $chkqrys;
			$selectsms_friends_page= $userslog_obj->selectVal($chkqrys);



			$selectsms_friends= $userslog_obj->selectVal($chkqry);
			$total_records      = count($selectsms_friends);	 
			$smarty->assign('sms_friends', $selectsms_friends_page);	
			$pagination= $common_obj->Pagination($total_records,$limit,$targetpage,$page,$start,$varname);
 			$smarty->assign('pagenation', $pagination);

		}
}
	
if($user_log_id)
{
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

if($current_action!="")
{
	
 	
}
else
{
$smarty->assign('currentpage_js', 'my_sms');
$smarty->assign('pagetitle', 'Free SMS- Send Free SMS, Send free SMS to Group');
$content_template = 'default/smshome.tpl';
}

$smarty->assign('user_log_id', $user_log_id);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
