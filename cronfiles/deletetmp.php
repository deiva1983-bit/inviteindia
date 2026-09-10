<?php
// Third - Completlt delete Expired cards
include_once( '../includes/configs/init.php' ); 
ini_set('max_execution_time', 3000); //3000 seconds = 1 Hr
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
$wed_exp_succ_subject = "Your wedding website deleted from our website - InviteIndia.com";
$cdate_2daysplus=date('Y-m-d' , strtotime("+2 days"));
$cdate=date('Y-m-d');
$cdate_monthback=date('Y-m-d' , strtotime("-300 days"));
// Delete Very old records
//$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status = '3' and  mrg_site_end_date <= '".$cdate_monthback."'  and mrg_url_sts_auto_id > 104";
$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status = '3' and  mrg_site_end_date <= '".$cdate_monthback."' and mrg_main_user_id != '37' and mrg_main_user_id != '17992' and mrg_url_sts_auto_id >= '2307' ";

$chkqry= "SELECT a.mrg_site_end_date, a.mrg_url_sts_auto_id, a.mrg_page_url, a.mrg_main_user_id, a.mrg_site_end_date  FROM mrg_url_status a, tbl_user_login b where a.mrg_main_user_id != '37' and mrg_main_user_id != '17992' and a.mrg_url_sts_auto_id >= '200' and a.mrg_url_sts_auto_id <= '300' and b.usrlog_id = a.mrg_main_user_id and b.usrlog_plan = 0";

$chkqry= "SELECT a.mrg_site_end_date, a.mrg_url_sts_auto_id, a.mrg_page_url, a.mrg_main_user_id, a.mrg_site_end_date  FROM mrg_url_status a, tbl_user_login b where a.mrg_main_user_id != '37' and mrg_main_user_id != '17992' and a.mrg_url_sts_auto_id >= '7000' and a.mrg_url_sts_auto_id <= '8000' and b.usrlog_id = a.mrg_main_user_id and b.usrlog_plan = 0";
$card_del= $userslog_obj->selectVal($chkqry);
if (count($card_del))
			{
	 	foreach($card_del as $key=>$row)
					{
					$delid = $row['mrg_url_sts_auto_id'];
					$page_url = $row['mrg_page_url'];
					//echo $delid.'=='.$page_url;
					$myfile = fopen("../crontextfiles/deletelists8000.txt", "a") or die("Unable to open file!");
					$txt = $delid."---->".$page_url."\n";
					fwrite($myfile, $txt);
					fclose($myfile);
					$common_obj->deleteWed($delid);
					$deletext = 'DELETED-'.$delid;
					$upqry = "UPDATE mrg_url_status SET mrg_status = '4', `mrg_page_url` = '".$deletext."' WHERE mrg_url_sts_auto_id ='".$delid."' LIMIT 1 " ;
					$userslog_obj->updateVal($upqry);
					}
			}
?>