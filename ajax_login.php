<?php 
session_start();
include_once( 'includes/configs/init.php' ); 
$userslog_obj = new userslog();
 if($_POST['flag'] == "")
 {

		$ctxt_uname= trim($_REQUEST['user_name']);
		$ctxt_pword = base64_encode(trim($_REQUEST['password']));				 
		$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_username='".$ctxt_uname."' and usrlog_password='".$ctxt_pword."' and usrlog_status ='1'";
		 
		$selectProfile= $userslog_obj->selectVal($chkqry);		 
		if(count($selectProfile))
			{
			$_SESSION['sess_user_id']= $selectProfile[0]['usrlog_id'];
			$_SESSION['sess_user_name']= $selectProfile[0]['usrlog_username'];			 
			echo '1';		 			
			}
		else
			{
			echo '0';   
			}
		 	
} 
else
{
$_SESSION['sess_user_id']= "";
$_SESSION['sess_user_name']="";
echo '1';
}
?>