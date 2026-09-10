<?php
// First - send mail about expired card details
include_once( '../includes/configs/init.php' ); 
ini_set('max_execution_time', 3000); //3000 seconds = 1 Hr
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
$wed_exp_succ_subject = "Your wedding website expires soon. - InviteIndia.com";
$cdate_2daysplus=date('Y-m-d' , strtotime("+1 day"));
$cdate=date('Y-m-d');
//$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date <= '".$cdate_2daysplus."' and  mrg_site_end_date >= '".$cdate."' and mrg_url_sts_auto_id > 104 and mrg_main_user_id != 37 ";
$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date <= '".$cdate_2daysplus."' and  mrg_site_end_date >= '".$cdate."' and mrg_main_user_id != '37' and mrg_main_user_id != '17992' and mrg_url_sts_auto_id >= '2307' ";

$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date = '".$cdate_2daysplus."' and mrg_main_user_id != '37' and mrg_main_user_id != '17992' and mrg_url_sts_auto_id >= '2307' ";

$card_access= $userslog_obj->selectVal($chkqry);
$wedexptmpl = $mail_obj->getWedExp_tmpl();
if (count($card_access))
			{
	 	foreach($card_access as $key=>$row){
					 $mrg_page_url = trim($row['mrg_page_url']);
					 $mrg_site_end_date = trim($row['mrg_site_end_date']);
					 $mrg_site_end_date =date('jS F, Y', strtotime("$mrg_site_end_date"));
					 $sts_auto_id = trim($row['mrg_url_sts_auto_id']);
					 $mrg_main_user_id = trim($row['mrg_main_user_id']);
					 $mrg_page_url = trim($row['mrg_page_url']);
					 $wedexp = $wedexptmpl;
					 $wedurl = 'https://www.inviteindia.com/'.$mrg_page_url;
					 $sub='Your wedding website has going to expire';
					$chkqrymail= "SELECT b.usrpro_email, a.usrlog_username FROM `tbl_user_profile` b, `tbl_user_login` a WHERE b.usrlog_id= '".$mrg_main_user_id."' and b.usrlog_id = a.usrlog_id ";
					$mailsend= $userslog_obj->selectVal($chkqrymail);
					$usemail = $mailsend[0]['usrpro_email'];
					$username = $mailsend[0]['usrlog_username'];
					$wedexp =eregi_replace("%usernm%", "$username", $wedexp);
					$wedexp =eregi_replace("%expdate%", "$mrg_site_end_date", $wedexp);
					$wedexp =eregi_replace("%succwedurl%", "$wedurl", $wedexp);
					$wedexp =eregi_replace("%deletemon%", "$delete_rec_months", $wedexp);
					$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
					// Send mail for expired details
					$common_obj->simplemail($usemail, $sub, $wedexp, $headers);
					// send mail to deiva
					$mail='inviteindia.feedback@gmail.com';
					$common_obj->simplemail($mail, 'Wedding website notifications', $wedexp, $headers);
					 }
			}
// Expired Features
// Delete Very old records
?>