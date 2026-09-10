<?php 
ini_set('max_execution_time', 1800); //1800 seconds = 30 Mins
include_once('../includes/configs/init.php'); 
/*----- Object creation start-----*/
$sms_obj = new sms();
$cronsms_obj = new cronsms();
$common_obj = new common(); 
$mails_obj = new mails();
$curdate=date("Y-m-d"); 
$chkqry= "SELECT a.wed_cron_end_username, a.wed_cron_email_autoid, a.wed_cron_email, a.wed_cron_wed_id FROM `wed_remainder_crons_email` a WHERE a.`wed_cron_date` = '".$curdate."' and a.wed_cron_status = 2 ";

$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		{
		
		$sel_cron_sms= $sms_obj->selectVal($chkqry);
			foreach($sel_cron_sms as $key=>$field)
                     {        
					$cron_autoid= $field['wed_cron_email_autoid'];
					$cron_wed_id= $field['wed_cron_wed_id'];
					$cron_email= $field['wed_cron_email'];
					$cron_end_username= $field['wed_cron_end_username'];
					
					$wedd_details="select a.male_name, a.female_name, a.marriage_date, a.reception_date, a.marriage_location, a.reception_location, a.marriage_status, a.reception_status, a.mrg_res_address_same_status, a.marriage_date_only, b.mrg_page_url from mrg_all_info a, mrg_url_status b where a.mrg_url_status_auto_id= $cron_wed_id and b.mrg_url_sts_auto_id= a.mrg_url_status_auto_id";
					//echo $wedd_details; exit;
					$wedd_details_arr= $sms_obj->selectVal($wedd_details);
					$curr_male_name = $wedd_details_arr[0]['male_name'];
					$curr_female_name = $wedd_details_arr[0]['female_name'];
					$curr_reception_date = $wedd_details_arr[0]['reception_date'];
					$curr_marriage_date = $wedd_details_arr[0]['marriage_date_only'];
					$curr_reception_date = $curr_marriage_date;
					$curr_marriage_location = $wedd_details_arr[0]['marriage_location'];
					$curr_reception_location = $wedd_details_arr[0]['reception_location'];
					$curr_marriage_status = $wedd_details_arr[0]['marriage_status'];
					$curr_reception_status = $wedd_details_arr[0]['reception_status'];
					$curr_mrg_res_address_same_status = $wedd_details_arr[0]['mrg_res_address_same_status'];
					$wedurl = $wedd_details_arr[0]['mrg_page_url'];
					$wedurl='http://www.inviteindia.com/'.$wedurl;
					
					if($curr_marriage_status != 0)
						$emailrem_tmpl=$mails_obj->getRemainderEmailWithWedDate();
					else
						$emailrem_tmpl=$mails_obj->getRemainderEmailWithRecDateOnly();
					
					if ($curr_marriage_date != "")
					$curr_mar_date = date('jS F, Y', strtotime("$curr_marriage_date"));
					else
					$curr_mar_date = date('jS F, Y', strtotime("$curr_reception_date"));
					$emailrem_tmpl = eregi_replace("%enduname%", "$cron_end_username", $emailrem_tmpl);
					$emailrem_tmpl = eregi_replace("%wednames%", "$curr_male_name and $curr_female_name", $emailrem_tmpl);
					$emailrem_tmpl = eregi_replace("%datetime%", "$curr_mar_date", $emailrem_tmpl);
					$emailrem_tmpl = eregi_replace("%eventaddress_rec%", "$curr_reception_location", $emailrem_tmpl);
					$emailrem_tmpl = eregi_replace("%eventaddress_mar%", "$curr_marriage_location", $emailrem_tmpl);
					$emailrem_tmpl = eregi_replace("%wedsurl%", $wedurl, $emailrem_tmpl);
					$emailsub="Remainder from inviteindia.com.";
					$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
					$common_obj->simplemail($cron_email, $emailsub, $emailrem_tmpl, $headers);
					$upqry= "UPDATE wed_remainder_crons_email SET wed_cron_status = '1' WHERE wed_cron_email_autoid ='".$cron_autoid."' LIMIT 1 " ;
					$order_list_id = $sms_obj->updateVal($upqry);
					}
		}
?>