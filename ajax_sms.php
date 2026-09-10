<?php
include_once( 'includes/configs/init.php' ); 
SESSION_START();
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
 
/*----- Object creation end-----*/


/*----- Variables Declaration Start-----*/

/*----- Variables Declaration End-----*/

$current_action= trim($_REQUEST['chk_action']); 
 if($current_action == "select_frd"){
$user_log_id= trim($_SESSION['sess_user_id']);
 
 			 $max= array();
 			$val1="";
			$chkqry= "SELECT smsfrd_mobile_num as mnum, smsfrd_name as name FROM `tbl_sms_friends` where smsfrd_usrlog_id ='".$user_log_id."'  ";		 
			$selectsms_friends_page= $userslog_obj->selectVal($chkqry);
			foreach($selectsms_friends_page as $key=>$val)
			{		
			//$max = ($val['name'] != "") ? "'.$val['name'] : "";	
			  $max[] = $val['mnum'];
			$val1 .=$val['mnum'].','.$val['name'].",";
			}
			
			 
echo $val1;	


}
 



?> 
