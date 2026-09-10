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
$user_log_id= trim($_SESSION['sess_user_id']);
/*----- Object creation start-----*/
$sms_obj = new sms();
$userslog_obj = new userslog();
$common_obj = new common();

/*----- Object creation end-----*/

$action_val= $_REQUEST['chk_action'];
 
 if($action_val=="mobile_activte")
 {
 	$mobnum= trim($_REQUEST['mobnum']);
	$sendpin = $common_obj->rand_str(4);
	
	$user_log_id= trim($_SESSION['sess_user_id']);
	$upqry= "UPDATE `tbl_user_profile` SET `usrpro_mobile_no` = '".$mobnum."',`usrpro_mobile_pin_no` = '".$sendpin."' WHERE `usrlog_id` ='".$user_log_id."' LIMIT 1 " ;

			$order_list_id = $sms_obj->updateVal($upqry);
	 // Send Pin to SMS
	
			echo 1;


	 
 }elseif($action_val=="pin_activte")
{
	$mob_pinnum= trim($_REQUEST['mob_pinnum']);
	$chkqry= "SELECT * FROM `tbl_user_profile` where usrlog_id ='".$user_log_id."' and usrpro_mobile_pin_no='".$mob_pinnum."' ";
	$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		{
		 $upqry= "UPDATE `tbl_user_profile` SET `usrpro_sms_access` = '1' WHERE `usrlog_id` ='".$user_log_id."' LIMIT 1 " ;

			$order_list_id = $sms_obj->updateVal($upqry);

			echo $order_list_id;

		}
	else
		echo '2';
}
elseif($action_val=="mobile_exits")
{
	$mob_pinnum= trim($_REQUEST['mob_pinnum']);
	$chkqry= "SELECT * FROM `tbl_user_profile` where usrlog_id ='".$user_log_id."' and usrpro_mobile_pin_no='".$mob_pinnum."' ";
	$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		{
		 $upqry= "UPDATE `tbl_user_profile` SET `usrpro_sms_access` = '1' WHERE `usrlog_id` ='".$user_log_id."' LIMIT 1 " ;
			$order_list_id = $sms_obj->updateVal($upqry);
			echo $order_list_id;
		}
	else
		echo '2';
}
elseif($action_val=="insert_tit66")
{

	$wedid = trim($_REQUEST['wedidtpl']);
	$inviteid = trim($_REQUEST['inviteid']);
	$title_status= trim($_REQUEST['title_sts']);
	$imgallign= trim($_REQUEST['imgallign']);
	$titlevalue= trim($_REQUEST['titleval']);
	$parahval= trim($_REQUEST['parahid']);
	$img_status = 1;
	if($imgallign == 3) {
	$img_status = 0;
	}
	$chkqryval = "SELECT * FROM `wed_ownpage_parah` where master_wed_id ='".$wedid."' and wed_ownpage_id='".$inviteid."' and wed_parah_count_id = '".$parahval."'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqryval);
	if($selectAffectedRows){
		$upqry= "UPDATE `wed_ownpage_parah` SET `parah_title_status` = '".$title_status."', `parah_title` = '".$titlevalue."', `parah_image_status` = '".$img_status."', `parah_image_align` = '".$imgallign."' where master_wed_id ='".$wedid."' and wed_ownpage_id='".$inviteid."' and wed_parah_count_id = '".$parahval."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		} else {
		$inqry= "INSERT INTO `wed_ownpage_parah` (`wed_parah_id`, `master_wed_id`, `wed_ownpage_id`, `wed_parah_count_id`, `parah_title_status`, `parah_title`, `parah_image_status`, `parah_image_align`, `parah_image_src`, `parah_content`, `parah_status`) VALUES (NULL, '".$wedid."', '".$inviteid."', '".$parahval."', '".$title_status."', '".$titlevalue."', '".$img_status."', '".$imgallign."', '', '', '1')";
		$order_list_id = $userslog_obj->insertVal($inqry);
		}
echo $order_list_id;
}
elseif($action_val=="insert_desc")
{
	$wedid = trim($_REQUEST['wedidtpl']);
	$inviteid = trim($_REQUEST['inviteid']);
	$parahval= trim($_REQUEST['parahid']);
	$bodytxt= trim(addslashes($_REQUEST['body_txt']));
	$bodytxt =str_replace('"', "'", $bodytxt);
	$chkqryval = "SELECT * FROM `wed_ownpage_parah` where master_wed_id ='".$wedid."' and wed_ownpage_id='".$inviteid."' and wed_parah_count_id = '".$parahval."'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqryval);
	if($selectAffectedRows){
		$upqry= "UPDATE `wed_ownpage_parah` SET `parah_content` = '".$bodytxt."' where master_wed_id ='".$wedid."' and wed_ownpage_id='".$inviteid."' and wed_parah_count_id = '".$parahval."' LIMIT 1 " ;
		//echo $upqry;
		$order_list_id = $userslog_obj->updateVal($upqry);
		} else {
		$inqry= "INSERT INTO `wed_ownpage_parah` (`wed_parah_id`, `master_wed_id`, `wed_ownpage_id`, `wed_parah_count_id`, `parah_content`, `parah_status`) VALUES (NULL, '".$wedid."', '".$inviteid."', '".$parahval."', '".$bodytxt."', '1')";
		$order_list_id = $userslog_obj->insertVal($inqry);
		}
	
	// Generate Links
		$sele_mas_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
	$seleqry= $userslog_obj->selectVal($sele_mas_qry);
	if (count($seleqry)){
		$managelinks= '';
		foreach($seleqry as $key=>$field){
		$wedown_autoid= $field['wedown_autoid'];
		$pagelink= trim($field['pagelink']);
		$wid= trim($field['wedid']);
			$sele_sub_qry= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wid."' and wed_ownpage_id = '".$wedown_autoid."' and `parah_status` = 1";
			$sub_qry= $userslog_obj->selectVal($sele_sub_qry);
				if (count($sub_qry)){
					$managelinks .= "<li>&nbsp;|&nbsp;<a href='%domainname%?page=$wedown_autoid'><b>$pagelink</b></a></li>";
				}
		}
				$managelinks = addslashes ($managelinks);
				$linkupqry = "UPDATE `mrg_url_status` SET `ownpage_links` = '$managelinks' WHERE `mrg_url_sts_auto_id` ='".$wedid."'  LIMIT 1 ";
				$userslog_obj->updateVal($linkupqry);
	}
echo $order_list_id;
}
?>