<?php
// Second - update Expired cards
include_once( '../includes/configs/init.php' ); 
ini_set('max_execution_time', 3000); //3000 seconds = 1 Hr
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
$wed_exp_succ_subject = "Your wedding website expires by today. - InviteIndia.com";
$cdate=date('Y-m-d');
$wedexptmpl = $mail_obj->getWedExpired_tmpl();
// Expired Features
//$expchkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date < '".$cdate."' and mrg_url_sts_auto_id > 104";
$expchkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date < '".$cdate."' and  mrg_main_user_id != '37' and mrg_main_user_id != '17992' and mrg_url_sts_auto_id >= '2307' ";
$card_exp= $userslog_obj->selectVal($expchkqry);
if (count($card_exp)){
	 	foreach($card_exp as $key=>$row){
					$auto_id = $row['mrg_url_sts_auto_id'];
					$mrg_main_user_id = trim($row['mrg_main_user_id']);
					$chkqrymail= "SELECT b.usrpro_email, a.usrlog_username FROM `tbl_user_profile` b, `tbl_user_login` a WHERE b.usrlog_id= '".$mrg_main_user_id."' and b.usrlog_id = a.usrlog_id ";
					$mailsend= $userslog_obj->selectVal($chkqrymail);
					$username = $mailsend[0]['usrlog_username'];
					$usemail = $mailsend[0]['usrpro_email'];
					$mrg_pageurl = $row['mrg_page_url'];
					$upqry = "UPDATE mrg_url_status SET mrg_status = '3' WHERE mrg_url_sts_auto_id ='".$auto_id."' LIMIT 1 " ;
					$wedexp = $wedexptmpl;
					$wedurl = 'https://www.inviteindia.com/'.$mrg_pageurl;
					$wedexp =eregi_replace("%succwedurl%", "$wedurl", $wedexp);
					$wedexp =eregi_replace("%usernm%", "$username", $wedexp);
					$wedexp =eregi_replace("%deletemon%", "$delete_rec_months", $wedexp);
					//print $wedexp;
					$userslog_obj->updateVal($upqry);
					// send mail with card expird details
					$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
					// Send mail for expired details
					$common_obj->simplemail($usemail, $wed_exp_succ_subject, $wedexp, $headers);
					// send mail to deiva
					$mail='inviteindia.feedback@gmail.com';
					$common_obj->simplemail($mail, 'for expired', $wedexp, $headers);
					}
			}

// Delete Very old records
?>