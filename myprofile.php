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
 

/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
$smarty->assign('pagetitle', 'Invitation site');
/*----- Variables Declaration End-----*/
  $smarty->assign('glb_site_url', $glb_site_url);
$current_action= trim($_REQUEST['do']);
if($current_action!="loginchk")
 include_once( 'includes/configs/sessioninc.php' );
$user_log_id= trim($_SESSION['sess_user_id']);  
 $smarty->assign('topnav_select', 'myprofile');
if($current_action!="")
{
	
	// Login check and redirect to home page (start)
	if($current_action=="loginchk")
		{
		$ctxt_uname= trim($_REQUEST['txt_uname']);
		$ctxt_pword = base64_encode(trim($_REQUEST['txt_pword']));
		$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_username='".$ctxt_uname."' and usrlog_password='".$ctxt_pword."' and usrlog_status ='1'";
		$selectProfile= $userslog_obj->selectVal($chkqry);
		if(count($selectProfile))
			{
			$_SESSION['sess_user_id']= $selectProfile[0]['usrlog_id'];
			$_SESSION['sess_user_name']= $selectProfile[0]['usrlog_username'];
			if (isset($_COOKIE["last_req_url"]))
				{
					$forwardnow_url = base64_decode($_COOKIE["last_req_url"]);
					setcookie("last_req_url", "", time()-3600);
					header("Location: $forwardnow_url");
					exit;
				}
			else
				{
					header("Location: e-wedding.php");
					exit;
				}
			$content_template = 'default/myprofile.tpl';	
			
			/*----- Variables Declaration Start-----*/
			//$smarty->assign('pagetitle', 'inviteindia.com : Create your own invitation and share it');
			$smarty->assign('pagetitle', 'inviteindia.com : Join inviteindia.com and send free sms');
			/*----- Variables Declaration End-----*/
			
			}
		else
			{
			 $_SESSION['notvalid']='notvalid';
			header("Location: login.php");
			exit;
			}		
		}
		// Login check and redirect to home page (end)
			// Login check and redirect to home page (start)
	if($current_action=="mprofile")
		{
		 
				 
			  $chkqry= "SELECT ulog.usrlog_plan as plan, ulog.usrlog_username as username,ulog.usrlog_password as password,uprofile.usrpro_fname as fname,uprofile.usrpro_lname as lname,uprofile.usrpro_dob as dob,uprofile.usrpro_email as email,uprofile.usrpro_mobile_no as mnum,uprofile.usrpro_access as access,uprofile.usrpro_profile_img  as profileimg FROM tbl_user_login ulog,`tbl_user_profile` uprofile  where ulog.usrlog_id='".$user_log_id."' and uprofile.usrlog_id='".$user_log_id."' ";
			 
			$selectProfile= $userslog_obj->selectVal($chkqry);
			
			$myplan =  $selectProfile[0]['plan'];
			$plan_details = '';
			$plan_exp = '';

			if ($myplan == 3) {
			$plan_details = 'Silver';
			$plan_exp = $valid_3 .' Months.';
			} else if ($myplan == 2) { 
			$plan_details = 'Gold';
			$plan_exp = $valid_2 .' Months.';
			} else if ($myplan == 1) { 
			$plan_details = 'Platinum';
			$plan_exp = $valid_1 .' Months.';
			} else{ 
			$plan_details = 'Free member ship';
			$plan_exp = $free_indays .' Days';
			}
			$smarty->assign('glb_plan_details', $plan_details);
			$smarty->assign('glb_plan_exp', $plan_exp);
			//$smarty->assign('selectProfile', $selectProfile);
			$smarty->assign('username', $selectProfile[0]['username']);
			$smarty->assign('fname', $selectProfile[0]['fname']);
			$smarty->assign('lname', $selectProfile[0]['lname']);
			$smarty->assign('dob', $selectProfile[0]['dob']);
			$smarty->assign('email', $selectProfile[0]['email']);
			$smarty->assign('mnum', $selectProfile[0]['mnum']);
			$smarty->assign('profile', $selectProfile[0]['profile']);
 			
			$smarty->assign('u_log_id', $user_log_id);
			$content_template = 'default/myprofile_profile_control.tpl';
			/*----- Variables Declaration Start-----*/
			$smarty->assign('pagetitle', 'Online wedding invitations | My profile.');
			/*----- Variables Declaration End-----*/

		}
		// Login check and redirect to home page (end)

}
else
{
$content_template = 'default/myprofile.tpl';	
$smarty->assign('pagetitle', 'inviteindia.com : Join inviteindia.com and send free sms');
		 
}
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
