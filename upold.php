<?php
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
ini_set('max_execution_time', 10000);
//$endOfCycle=date('Y-m-d', strtotime($packvalue));
//$endOfCycle=date('Y-m-d' , strtotime("+1 months"));
//$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 10 and mrg_url_sts_auto_id < 20 and donate_mail != 1" ;
/*$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 10 and mrg_url_sts_auto_id < 100 and donate_mail != 1 " ;
$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 100 and mrg_url_sts_auto_id < 200 and donate_mail != 1 " ;
$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 200 and mrg_url_sts_auto_id < 300 and donate_mail != 1 " ;

$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 300 and mrg_url_sts_auto_id < 500 and donate_mail != 1 " ;


$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 500 and mrg_url_sts_auto_id < 700 and donate_mail != 1 " ;
$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 700 and mrg_url_sts_auto_id < 900 and donate_mail != 1 " ; */

//$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 900 and mrg_url_sts_auto_id < 1500 " ;
$dayscnt = 30;
$fromid = trim($_REQUEST['from']);
$toid = trim($_REQUEST['to']);
$inc_date = trim($_REQUEST['dateinc']);
if($fromid == '' || $toid == '' || $inc_date == '' )
{
echo 'not accept'; exit;
}
$dayscnt = $dayscnt + $inc_date;
$endOfCycle=date('Y-m-d' , strtotime("+$dayscnt days"));
//$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id > 1746 and mrg_url_sts_auto_id < 1760 " ;
$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id >= '".$fromid."' and mrg_url_sts_auto_id <= '".$toid."' and mrg_main_user_id != '37' " ;
//$qry = "select mrg_url_sts_auto_id, mrg_page_url, mrg_main_user_id from mrg_url_status where mrg_url_sts_auto_id ='1232' " ;
 $userslog_obj = new userslog();
 $mail_obj = new mails();
 $common_obj = new common();
$selecttotpage= $userslog_obj->selectVal($qry);	
if (count($selecttotpage))
			{			

	 	foreach($selecttotpage as $key=>$row)
                     {
					 $mrg_page_url = trim($row['mrg_page_url']);
					$mrg_main_user_id = trim($row['mrg_main_user_id']);
					$mrg_url_sts_auto_id = trim($row['mrg_url_sts_auto_id']);
					//$subqry =  "SELECT COUNT(auto_id) AS totalmsgs, wed_owner_id  FROM wedding_msg WHERE wedding_id='$mrg_url_sts_auto_id'";
					//$result1= $userslog_obj->selectVal($subqry);
					//foreach($result1 as $key=>$row1){						
					//	 $totalmsgs = trim($row1['totalmsgs']);
					//	  $wed_owner_id = trim($row1['wed_owner_id']);
					//	  if($totalmsgs >= 1)
					//		  {
							  $mrg_page_url = "http://www.inviteindia.com/".$mrg_page_url;
						//	  $totalview = $totalmsgs * 7 ;
						//	echo "===>>>".$totalmsgs. "<<<===". $wed_owner_id. "===". $mrg_main_user_id."--".$mrg_url_sts_auto_id;
						//	echo '<br />';
							$usrqry2 = "SELECT b.usrpro_fname,b.usrpro_email,b.usrpro_lname,a.usrlog_username FROM tbl_user_profile b, tbl_user_login a WHERE a.usrlog_id = b.usrlog_id and a.usrlog_id = '$mrg_main_user_id' " ;
							$usrqry2= $userslog_obj->selectVal($usrqry2);
							foreach($usrqry2 as $key=>$row2){
							$fname = trim($row2['usrpro_fname']);
									$lname = trim($row2['usrpro_lname']);
									$email = trim($row2['usrpro_email']);
									$username = trim($row2['usrlog_username']);
									$myusername = ($fname != '') ? $fname." ".$lname : $username;
//									echo $myusername."===".$mrg_page_url."--".$email; exit;
									// Send mail to Both
									$mailcon = $mail_obj->getpaymail();
									$mailcon =str_replace("%username%", "$myusername", $mailcon);
									$mailcon =str_replace("%wedurls%", "$mrg_page_url", $mailcon);
									 $sub="Online wedding website - inviteindia.com";
										$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
										$common_obj->simplemail($email, $sub, $mailcon, $headers);
										// send mail to deiva
										$mail='inviteindia.feedback@gmail.com';
										$finurl = $email. "<br>" . $mailcon ;
										$common_obj->simplemail($mail, 'Mail sent to intimations about old  cards payment', $finurl, $headers);

										$upqry= "UPDATE `tbl_user_login` SET `usrlog_plan` = '3', usrlog_activests = '1', 	tbl_payments_ref =  '1' WHERE `usrlog_id` ='".$mrg_main_user_id."' LIMIT 1 " ;
									echo $upqry; echo '<br>';
									 //$userslog_obj->updateVal($upqry);
									$upqry= "UPDATE `mrg_url_status` SET `mrg_site_end_date` = '".$endOfCycle."', `mrg_status` = 1 WHERE mrg_main_user_id ='".$mrg_main_user_id."' and mrg_url_sts_auto_id = '".$mrg_url_sts_auto_id."' LIMIT 1 " ;
									echo $upqry;echo '<br>';
			//						$userslog_obj->updateVal($upqry);

									

									
							} 

							//  }
					}
					}
					
 ?>
