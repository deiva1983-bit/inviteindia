<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : service_ajax.php
// Description : file to handle add service ajax information
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 23-02-2010
// Modified date: 23-02-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once('../includes/configs/init.php');
session_start();
$sess_userlog_id= $_SESSION['sess_user_id'];
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/

$action_val= $_REQUEST['chk_action'];
 if($action_val=="create_user")
 {
 	$uname= trim($_REQUEST['uname']);  	$pword= base64_encode(trim($_REQUEST['pword']));  	$uemail= trim($_REQUEST['uemail']);	
	$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_username='".$uname."' and usrlog_status ='1'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		echo 'exist';
	else
		{	
		$inqry= "INSERT INTO `tbl_user_login` (`usrlog_id`, `usrlog_username`, `usrlog_password`, `usrlog_status`) VALUES (NULL, '".$uname."', '".$pword."', '1')";
		$order_list_id = $userslog_obj->insertVal($inqry); 
		$inqry= "INSERT INTO `tbl_user_profile` (`usrpro_id`, `usrlog_id`, `usrpro_email`) VALUES (NULL, '".$order_list_id."', '".$uemail."')";
		$order_list_id = $userslog_obj->insertVal($inqry);
		echo $order_list_id; 
		}
 }
 elseif($action_val=="update_accounts")
 {
   	$cpass= base64_encode(trim($_REQUEST['cpass']));  
	$pword= base64_encode(trim($_REQUEST['pword']));  	 
	$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_id='".$sess_userlog_id."' and usrlog_password='".$cpass."' and usrlog_status ='1'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	
	if($selectAffectedRows)
			{			
			$upqry= "UPDATE `tbl_user_login` SET `usrlog_password` = '".$pword."' WHERE `usrlog_id` ='".$sess_userlog_id."' LIMIT 1 " ;			 
			$order_list_id = $userslog_obj->updateVal($upqry);		 	
			echo $order_list_id;
			}
	else
		{	
		echo "not"; 
		}   
 }
  elseif($action_val=="update_personal")
 {
   	$fname= trim($_REQUEST['txt_fname']);  	$lname= trim($_REQUEST['lname']);  	$dob= trim($_REQUEST['dob']);		$mobilenos= trim($_REQUEST['mobilenos']);	 
	 
			$upqry= "UPDATE `tbl_user_profile` SET `usrpro_fname` = '".$fname."',`usrpro_lname` = '".$lname."',`usrpro_dob` = '".$dob."',`usrpro_mobile_no` = '".$mobilenos."' WHERE `usrlog_id` ='".$sess_userlog_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);		 	
			echo $order_list_id;
			  
 }
   elseif($action_val=="update_profile_img")
 {
   	$img= trim($_SESSION['image_nameTMP']); 
			$upqry= "UPDATE `tbl_user_profile` SET `usrpro_profile_img` = '".$img."' WHERE `usrlog_id` ='".$sess_userlog_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);		
			$_SESSION['image_nameTMP']=""; 	
			echo $order_list_id;
			  
 }elseif($action_val=="update_ani")
 {
			$img_id= $_REQUEST['imgid'];
			$theme_id= $_REQUEST['themeid'];	
			$chkqry= "SELECT * FROM `mrg_url_status` where mrg_main_user_id='".$sess_userlog_id."' and mrg_url_sts_auto_id ='".$theme_id."'";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows)
			{			
			$upqry= "UPDATE `mrg_all_info` SET `wed_animate_reff_id` = '".$img_id."' WHERE `mrg_url_status_auto_id` = '".$theme_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);			
			echo "Your animation sucessfully updated.";
			}
			
			  
 }
  elseif($action_val=="update_music")
 {			
			$theme_id= $_REQUEST['themeid'];	
			$chkqry= "SELECT * FROM `mrg_url_status` where mrg_main_user_id='".$sess_userlog_id."' and mrg_url_sts_auto_id ='".$theme_id."'";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows)
			{
			$music_id= $_REQUEST['musicid'];
				$chkqry= "SELECT * FROM `mrg_all_info_add` where mrg_url_status_auto_id = '".$theme_id."' ";
				$selectMus = $userslog_obj->selectAffectedRows($chkqry);
				if($selectMus){
				$upqry= "UPDATE `mrg_all_info_add` SET wed_music_active	 = '1', wed_music_id =  $music_id WHERE 	mrg_url_status_auto_id = '".$theme_id."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);	
				}else{
				$insubqry= "INSERT INTO `mrg_all_info_add` (addi_autoid, mrg_url_status_auto_id, wed_music_active, wed_music_id) VALUES (NULL, '".$theme_id."', 1, $music_id)";	
				$userslog_obj->insertVal($insubqry);
				}
				echo "Your music sucessfully updated.";
			}
}
 elseif($action_val=="rem_music")
 {			
			$theme_id= $_REQUEST['themeid'];	
			$chkqry= "SELECT * FROM `mrg_url_status` where mrg_main_user_id='".$sess_userlog_id."' and mrg_url_sts_auto_id ='".$theme_id."'";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows)
			{
				$music_id= $_REQUEST['musicid'];
				$chkqry= "SELECT * FROM `mrg_all_info_add` where mrg_url_status_auto_id = '".$theme_id."' ";
				$selectMus = $userslog_obj->selectAffectedRows($chkqry);
				if($selectMus){
				$upqry= "UPDATE `mrg_all_info_add` SET wed_music_active	 = '0', wed_music_id =  '0' WHERE mrg_url_status_auto_id = '".$theme_id."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);	
				}
			echo "Your music sucessfully removed.";
			}
}
 elseif($action_val=="remove_ani")
 {			
			$theme_id= $_REQUEST['themeid'];	
			$chkqry= "SELECT * FROM `mrg_url_status` where mrg_main_user_id='".$sess_userlog_id."' and mrg_url_sts_auto_id ='".$theme_id."'";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows)
			{			
			$upqry= "UPDATE `mrg_all_info` SET `wed_animate_reff_id` = '0' WHERE `mrg_url_status_auto_id` = '".$theme_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);			
			echo "Your animation sucessfully removed.";
			}
			
			  
 }
 elseif($action_val=="remkavimyli")
 {			
			$wedaccid= $_REQUEST['wed_accid'];				 		
			$upqry= "UPDATE `mrg_all_info` SET `wed_animate_cover` = '0' WHERE `mrg_url_status_auto_id` = '".$wedaccid."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);
			 
			
			  
 } elseif($action_val=="add_ballon"){
	$wedaccid= $_REQUEST['wed_accid'];
	$mal_name= $_REQUEST['mname'];
	$femal_name= $_REQUEST['fname'];
	$imgid= $_REQUEST['cid'];
	$upqry= "UPDATE `mrg_all_info` SET `wed_animate_cover` = '1', wed_cover_id = '".$imgid."', wed_cover_male_name = '".$mal_name."', wed_cover_female_name = '".$femal_name."' WHERE `mrg_url_status_auto_id` = '".$wedaccid."' LIMIT 1 " ;
	$order_list_id = $userslog_obj->updateVal($upqry);
	echo 1;
} elseif($action_val=="tips_comm"){
	$comm_name= addslashes($_REQUEST['comm_name']);
	$comm_email= addslashes($_REQUEST['comm_email']);
	$user_comments= addslashes($_REQUEST['user_comments']);
	$page_id= $_REQUEST['page_id'];
	$insubqry= "INSERT INTO `artical_comments` (comment_id, user_name, user_email, user_comment, page_id, comm_date, comment_status) VALUES (NULL, '".$comm_name."', '".$comm_email."', '".$user_comments."', '".$page_id."', now(), 2)";	
	$userslog_obj->insertVal($insubqry);
	echo 1;
} else {
echo $action_val;
}
?>