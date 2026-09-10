<?php
// First - send mail about expired card details
include_once( '../includes/configs/init.php' ); 
ini_set('max_execution_time', 3000); //3000 seconds = 1 Hr
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
$wed_exp_succ_subject = "Your wedding website premium features will getting expiring soon";
$cdate_2daysplus=date('Y-m-d' , strtotime("+1 day"));
$cdate=date('Y-m-d');
$min_price = $price_3;
//$cdate = '2015-04-09';
//$cdate_2daysplus = '2015-04-11';
//echo $cdate_2daysplus.'--'.$cdate; exit; 2015-04-05  --  2015-04-03
//$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date <= '".$cdate_2daysplus."' and  mrg_site_end_date >= '".$cdate."' and mrg_url_sts_auto_id > 104 and mrg_main_user_id != 37 ";
//$chkqry= "SELECT mrg_site_end_date, mrg_site_revert_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date <= '".$cdate_2daysplus."' and  mrg_site_revert_date >= '".$cdate."' and  mrg_main_user_id != '37' and mrg_url_sts_auto_id >= '1801' and mrg_site_revert_status = '0' ";

//$chkqry= "SELECT mrg_site_end_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_end_date <= '".$cdate_2daysplus."' and  mrg_site_end_date >= '".$cdate."' and  mrg_main_user_id != '37' and mrg_url_sts_auto_id >= '2307' ";

$chkqry= "SELECT mrg_site_end_date, mrg_theme_id, mrg_site_revert_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_revert_date <= '".$cdate_2daysplus."' and  mrg_site_revert_date >= '".$cdate."' and  mrg_main_user_id != '37' and mrg_main_user_id != '17992' and mrg_url_sts_auto_id >= '2712' and mrg_site_revert_status = '0' ";

$chkqry= "SELECT mrg_site_end_date, mrg_theme_id, mrg_site_revert_date, mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id, mrg_site_end_date  FROM mrg_url_status where mrg_status !='3' and  mrg_status !='4' and mrg_site_revert_date = '".$cdate_2daysplus."' and  mrg_main_user_id != '37' and mrg_main_user_id != '17992' and mrg_url_sts_auto_id >= '2712' and mrg_site_revert_status = '0' ";


$card_access= $userslog_obj->selectVal($chkqry);
if (count($card_access))
		{
		foreach($card_access as $key=>$row)
				{
					$mrg_page_url = trim($row['mrg_page_url']);
					//echo $mrg_page_url;
					$revert_date = trim($row['mrg_site_revert_date']);
					$revert_date_format =date('jS F, Y', strtotime("$revert_date"));
					$sts_auto_id = trim($row['mrg_url_sts_auto_id']);
					$theme_id = trim($row['mrg_theme_id']);
					$mrg_main_user_id = trim($row['mrg_main_user_id']);
					$wedexp = $wedexptmpl;
					$wedurl = 'https://www.inviteindia.com/'.$mrg_page_url;
					$sub=$going_to_expire_email_subject;
					//mrg_theme_auto_id
					$chkqrymail= "SELECT b.usrpro_email, a.usrlog_username, a.usrlog_plan FROM `tbl_user_profile` b, `tbl_user_login` a WHERE b.usrlog_id= '".$mrg_main_user_id."' and b.usrlog_id = a.usrlog_id ";
					$mailsend= $userslog_obj->selectVal($chkqrymail);
					$usrlogplan = $mailsend[0]['usrlog_plan'];
						if($usrlogplan == '0'){
							$wedexptmpl = $mail_obj->makeitfree_msgs();
							$animate_cover = 0;
							$usemail = $mailsend[0]['usrpro_email'];
							$username = $mailsend[0]['usrlog_username'];
							// echo $theme_id; exit;
							$mrg_theme_qry= "SELECT mrg_theme_auto_id FROM mrg_mas_theme WHERE mrg_theme_catid= '1' and mrg_theme_auto_id = '".$theme_id."' ";
							$paytheme = 0; echo $mrg_theme_qry;
							$theme_cnt = $userslog_obj->selectAffectedRows($mrg_theme_qry);
							if($theme_cnt){
							$paytheme = 1;
							}

							$mrginfosqry= "SELECT wed_animate_cover, wed_animate_reff_id FROM mrg_all_info WHERE mrg_url_status_auto_id= '".$sts_auto_id."' ";
							$mrginfos_details= $userslog_obj->selectVal($mrginfosqry);
							$animate_cover = $mrginfos_details[0]['wed_animate_cover'];
							$animate_reff_id = $mrginfos_details[0]['wed_animate_reff_id'];
							//echo $animate_cover; exit;
							$mrginfos_addqry= "SELECT `wed_music_active` FROM `mrg_all_info_add` where mrg_url_status_auto_id = '".$sts_auto_id."' "; 
							$mrginfos_addqry= $userslog_obj->selectVal($mrginfos_addqry);
							$music_active = $mrginfos_addqry[0]['wed_music_active'];
							
							$mailsend =0;
							if ($animate_cover) {
							// Show cover msgs
							$mailsend =1;
							}
							if($animate_reff_id){
							// Show animation detais
							$mailsend =1;
							}
							if($music_active){
							// Show music detais
							$mailsend =1;
							}
							if($paytheme){
							// show theme details
							$mailsend =1;
							} //echo 'dd'.$mailsend; exit;
							if($mailsend){
							//$order_list_id = $userslog_obj->updateVal($upqry_master);
							$wedexptmpl =eregi_replace("%usernm%", "$username", $wedexptmpl);
							$wedexptmpl =eregi_replace("%exp_date%", "$revert_date_format", $wedexptmpl);
							$wedexptmpl =eregi_replace("%succwedurl%", "<a href='$wedurl'>$wedurl</a>", $wedexptmpl);
							$wedexptmpl =eregi_replace("%min_price%", "$min_price", $wedexptmpl);
							$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
							$sub = "Your wedding website premium features will be expiring soon";
							// Send mail for expired details
							$common_obj->simplemail($usemail, $sub, $wedexptmpl, $headers);
							// send mail to deiva
							$mail='inviteindia.feedback@gmail.com';
							$common_obj->simplemail($mail, $sub, $wedexptmpl, $headers);
							//print $wedexptmpl;
							}
							
						}
					}
			}
// Expired Features
// Delete Very old records
?>