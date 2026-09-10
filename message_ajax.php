<?php
include_once( 'includes/configs/init.php' ); 

/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
 
/*----- Object creation end-----*/


/*----- Variables Declaration Start-----*/

/*----- Variables Declaration End-----*/

$current_action= trim($_REQUEST['action']); 
if($current_action == "delete_frd"){
$cid= trim($_REQUEST['delid']);
$d_qry= "DELETE FROM `tbl_sms_friends` WHERE `smsfrd_id` = '".$cid."'  LIMIT 1";
$delerec= $userslog_obj->DeleteRec($d_qry);
echo $delerec;
}elseif($current_action == "select_frd"){
 $edit_id= trim($_REQUEST['edit_id']);
 
			$chkqry= "SELECT smsfrd_mobile_num, smsfrd_name FROM `tbl_sms_friends` where smsfrd_id ='".$edit_id."'  ";		 
			$selectsms_friends_page= $userslog_obj->selectVal($chkqry);
			echo   $selectsms_friends_page[0]['smsfrd_mobile_num']."|".$selectsms_friends_page[0]['smsfrd_name'];


}
elseif($current_action == "mobile_update"){
 			$edit_id= trim($_REQUEST['edit_id']);
			$mobnum= trim($_REQUEST['mobnum']);
			$mob_name= trim($_REQUEST['mob_name']);  
			$upqry= "UPDATE `tbl_sms_friends` SET `smsfrd_mobile_num` = '$mobnum',`smsfrd_name` = '$mob_name' WHERE `smsfrd_id` ='$edit_id' LIMIT 1";	  
			$up_friends_page= $userslog_obj->updateVal($upqry);
			echo $up_friends_page;
			 

}
elseif($current_action == "insert_friend"){
			$name= trim($_REQUEST['fname']);   
			  $mnum= trim($_REQUEST['fnum']);
			$user_log_id= trim($_SESSION['sess_user_id']); 
			$chkqry= "SELECT * FROM `tbl_sms_friends` where smsfrd_usrlog_id='".$user_log_id."' and smsfrd_mobile_num= '".$mnum."' ";   
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);  
 
 
			if($selectAffectedRows)
				{ echo 'exist';   }
			else
				{		
			
 			$inqry= "INSERT INTO `tbl_sms_friends` (`smsfrd_id`, `smsfrd_usrlog_id`, `smsfrd_mobile_num`, `smsfrd_name`,`smsfrd_status`, `smsfrd_grpup_id`, `smsfrd_added_date`, `smsfrd_modified_date`) VALUES (NULL, '".$user_log_id."', '".$mnum."', '".$name."', '1', '0', 'now()', 'now()')";
				 
			$order_list_id = $userslog_obj->insertVal($inqry); 
			echo $order_list_id;
				 }
			 

}


?> 
