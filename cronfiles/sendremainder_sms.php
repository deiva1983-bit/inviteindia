<?php
ini_set('max_execution_time', 1800); //1800 seconds = 30 Mins
include_once('../includes/configs/init.php');
/*----- Object creation start-----*/
$sms_obj = new sms();
$cronsms_obj = new cronsms();
$common_obj = new common();
$curdate=date("Y-m-d");
$chkqry= "SELECT a.wed_cron_end_username, a.wed_cron_autoid, a.wed_cron_wed_id, b.mobile_num FROM `wed_remainder_crons_mob` a, `wed_remainder_mob` b WHERE a.`wed_cron_date` = '".$curdate."' and a.wed_cron_status = 2 and a.wed_cron_mob_autoid=b.mobile_autoid and b.activate_status=1";
$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		{
		$sel_cron_sms= $sms_obj->selectVal($chkqry);
			foreach($sel_cron_sms as $key=>$field)
                     {       
					$cron_autoid= $field['wed_cron_autoid'];
					$cron_wed_id= $field['wed_cron_wed_id'];
					$cron_mobile_num= $field['mobile_num'];
					$cron_end_username= $field['wed_cron_end_username'];
					$wedd_details="select male_name, female_name, marriage_date, reception_date, marriage_date_only from mrg_all_info where mrg_url_status_auto_id= $cron_wed_id";
					$wedd_details_arr= $sms_obj->selectVal($wedd_details);
					$curr_male_name = $wedd_details_arr[0]['male_name'];
					$curr_female_name = $wedd_details_arr[0]['female_name'];
					$curr_marriage_date = $wedd_details_arr[0]['marriage_date_only'];
					$curr_reception_date = $wedd_details_arr[0]['reception_date'];
					$curr_mar_date = date('jS F, Y', strtotime("$curr_marriage_date"));
					$smstext_rem = eregi_replace("%username%", "$cron_end_username", $smstext_remainder_long);
					$smstext_rem = eregi_replace("%malename%", "$curr_male_name", $smstext_rem);
					$smstext_rem = eregi_replace("%femalename%", "$curr_female_name", $smstext_rem);
					$smstext_rem = eregi_replace("%weddate%", "$curr_mar_date", $smstext_rem);
					$strcount=strlen($smstext_rem);
					if($strcount > 139)
					{
					$smstext_rem = eregi_replace("%username%", "$cron_end_username", $smstext_remainder);
					$smstext_rem = eregi_replace("%malename%", "$curr_male_name", $smstext_rem);
					$smstext_rem = eregi_replace("%femalename%", "$curr_female_name", $smstext_rem);
					$smstext_rem = eregi_replace("%weddate%", "$curr_mar_date", $smstext_rem);
					$strcount=strlen($smstext_rem);
					}
					$cronsms_obj->sendsms($smstext_rem, $cron_mobile_num);
					
					$upqry= "UPDATE wed_remainder_crons_mob SET wed_cron_status = '1' WHERE wed_cron_autoid ='".$cron_autoid."' LIMIT 1 " ;
					$order_list_id = $sms_obj->updateVal($upqry);
					}
		}
?>