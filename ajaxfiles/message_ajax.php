<?php 
include_once('../includes/configs/init.php');
session_start();
$sess_userlog_id= $_SESSION['sess_user_id'];
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$cronsms_obj = new cronsms();
$current_action= trim($_REQUEST['action']); 

if($current_action == "create_account"){
	$mno= trim($_REQUEST['mobnum']);
	if($mno == '') {
	echo 2; // Please enter mobile number.
	} else if($sess_userlog_id == '') {
	echo 3; // Something went wrong, Please try again..
	} else {
	$upqry= "UPDATE `tbl_user_profile` SET `usrpro_mobile_no` = '$mno' WHERE `usrlog_id` ='$sess_userlog_id' LIMIT 1";	  
	$up_mno= $userslog_obj->updateVal($upqry);
	echo 1; // Success, Your mobile number has been updated.
	}
} elseif($current_action == "send_pin"){
	$mno= trim($_REQUEST['mobnum']);
	if($mno == '') {
	echo 2; // Please enter mobile number.
	} else if($sess_userlog_id == '') {
	echo 3; // Something went wrong, Please try again..
	} else {
			$chkqry= "SELECT * FROM `tbl_user_profile` where usrpro_mobile_no ='".$mno."' and `usrlog_id` ='$sess_userlog_id' ";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows) {
				$fetch_pin_infos= $userslog_obj->selectVal($chkqry);
				$mobile_pin_no = $fetch_pin_infos[0]['usrpro_mobile_pin_no'];
				$sms_access = $fetch_pin_infos[0]['usrpro_sms_access'];
				if ($sms_access == '1') { // Your mobile already verified. So dont need to send pin again & again.
				echo 3;
				} else { // Not yet verified,  Send Pin..

					$chkqry= "SELECT * FROM `tbl_user_profile` where usrpro_mobile_no ='".$mno."' and  usrpro_sms_access = 2";
					$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
					$sendpin = $common_obj->rand_str(4);
					$act_sts=1;
					//Temp - It should be if(!$selectAffectedRows){
					if(1){
						$act_sts=0;
						$upqry= "UPDATE `tbl_user_profile` SET usrpro_mobile_pin_no = '".$sendpin."', usrpro_sms_access = '2' WHERE usrpro_mobile_no ='".$mno."' and `usrlog_id` ='$sess_userlog_id' LIMIT 1 " ;
						$up_pin = $userslog_obj->updateVal($upqry);
						// Send PIN now.
						if($up_pin) {
							$rem_text =eregi_replace("%sec_code%", "$sendpin", $smstext_reactivate);
							echo $cronsms_obj->sendsms($rem_text, $mno);
							echo 1; // Your send has sent your mobile number. Please activate
						}
					} else {
						echo 4; // We already sent Pin number to your mobile. Please check it. or Try again after 2 hours.
					}

				}
			} else {
			echo 2; // Mobile number does's not match with our db.
			}
	}
}  elseif($current_action == "verifypin"){
	$mno= trim($_REQUEST['mobnum']);
	$pinno= trim($_REQUEST['pinno']);
	if($mno == '') {
	echo 2; // Please enter mobile number.
	} else if($sess_userlog_id == '') {
	echo 3; // Something went wrong, Please try again..
	} else {
			$chkqry= "SELECT * FROM `tbl_user_profile` where usrpro_mobile_no ='".$mno."' and `usrlog_id` ='$sess_userlog_id' ";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows) {
				$chkqry= "SELECT * FROM `tbl_user_profile` where usrpro_mobile_no ='".$mno."' and `usrlog_id` ='$sess_userlog_id' and usrpro_mobile_pin_no = '".$pinno."' ";
				$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
				if($selectAffectedRows) { // Pin number is correct. Please allow user send sms.
					$upqry= "UPDATE `tbl_user_profile` SET usrpro_sms_access = '1' WHERE usrpro_mobile_no ='".$mno."' and `usrlog_id` ='$sess_userlog_id' LIMIT 1 " ;
					$up_pin = $userslog_obj->updateVal($upqry);
					echo 1; // Success. Your pin is verified.
				} else {
				echo 4; // Your pin number is wrong. Please try again.
				}

			} else {
			echo 2; // Mobile number does's not match with our db.
			}

	}

}


?> 
