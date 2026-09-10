<?php
ini_set('max_execution_time', 1800); //1800 seconds = 30 Mins
include_once('../includes/configs/init.php');
/*----- Object creation start-----*/
$sms_obj = new sms();
$cronsms_obj = new cronsms();
$common_obj = new common();
$curdate=date("Y-m-d");

$chkqry= "select a.smsfrd_mobile_num mobile_num, a.smsfrd_id inviteid, b.sms_invite_msg invite_msg from tbl_sms_friends a, sms_invite_tmpl b where a.smsfrd_rem_date = '".$curdate."' and a.smsfrd_status = '2' and a.smsfrd_msg_id = b.sms_invite_autoid and a.smsfrd_inviteid = b.sms_invite_inviteid";  echo $chkqry;
$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		{
		$sel_cron_sms= $sms_obj->selectVal($chkqry);
			foreach($sel_cron_sms as $key=>$field)
                     {       
					$cron_mobile_num= trim($field['mobile_num']);
					$cron_inviteid= trim($field['inviteid']);
					$cron_invite_msg= stripslashes(trim($field['invite_msg']));
					// Send SMS infos
					$cronsms_obj->sendsms($cron_invite_msg, $cron_mobile_num);
					
					$upqry= "UPDATE tbl_sms_friends SET smsfrd_status = '1' WHERE smsfrd_id ='".$cron_inviteid."' LIMIT 1 " ;
					$order_list_id = $sms_obj->updateVal($upqry);
					}
		}
?>