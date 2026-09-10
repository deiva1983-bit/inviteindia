<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
    // Response from Paypal
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
        $req .= "&$key=$value";
    }
	$writeval = $req ."------";
	fwrite($myfile, $writeval);
	//fclose($myfile);
    // assign posted variables to local variables
    $data['item_name']			= $_POST['item_name'];
    $data['pay_plan'] 		= $_POST['pay_plan'];
    $data['payment_status'] 	= $_POST['payment_status'];
    $data['payment_amount'] 	= $_POST['mc_gross'];
    $data['payment_currency']	= $_POST['mc_currency'];
    $data['txn_id']				= $_POST['txn_id'];
    $data['receiver_email'] 	= $_POST['receiver_email'];
    $data['payer_email'] 		= $_POST['payer_email'];
    $data['custom'] 		= $_POST['custom'];
    $pieces = explode("-", $data['custom']);
    $uid = $pieces[0];
    $pid = $pieces[1];
    $data['user_id'] 		= $uid;
    $data['plan_id'] 		= $pid;
	$data['pay_type'] 		= 1;
    // post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
    $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);	
    //$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);	
    //fwrite($myfile, 'PID');
    if (!$fp) {
        // HTTP ERROR
        //fwrite($myfile, 'HTTP ERR');
    } else {
    $orderid = $common_obj->updatePayment($data);
    
    // Update existing card expired date
    $packid = $common_obj->getPackInfo($uid);
    $packval = 'valid_'."$packid";
    $pvalue = $$packval;
    $packvalue = ($pvalue != 0) ? '+'.$pvalue.' month'  : '+'.$free_indays.' days' ;
    $endOfCycle=date('Y-m-d', strtotime($packvalue));
    $upqry= "UPDATE `mrg_url_status` SET `mrg_site_end_date` = '".$endOfCycle."', `mrg_status` = 1 WHERE `mrg_main_user_id` ='".$uid."' and mrg_status != '4' " ;
	$writeval = "========>".$upqry ."<========";
	fwrite($myfile, $writeval);
    $order_list_id = $userslog_obj->updateVal($upqry);
	
	$chkqry_free= "SELECT * FROM `mrg_url_status` where mrg_main_user_id='".$uid."' and mrg_site_revert_status ='1' ";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry_free);
		if($selectAffectedRows){
				$selectmsgs_free= $userslog_obj->selectVal($chkqry_free);
					foreach($selectmsgs_free as $key=>$field){
						$sts_auto_id =$field['mrg_url_sts_auto_id'];
						$free_details= "SELECT * FROM `mrg_all_info_tmp` where tmp_mrg_url_status_auto_id='".$sts_auto_id."' and tmp_status ='1' ";
						$selectAffectedRows_free_details = $userslog_obj->selectAffectedRows($free_details);
						if($selectAffectedRows_free_details){
							$chk_free_details= $userslog_obj->selectVal($free_details);
							$animate_cover = $chk_free_details[0]['tmp_wed_animate_cover'];
							$animate_reff_id = $chk_free_details[0]['wed_animate_reff_id'];
							$music_active = $chk_free_details[0]['wed_music_active'];
							$theme_active = $chk_free_details[0]['wed_theme_active'];
							$theme_id = $chk_free_details[0]['wed_theme_id'];
							$ownpagelinks = $chk_free_details[0]['ownpage_links'];
							$thmupdate = '';
							if($theme_active) {
							$thmupdate = " , `mrg_theme_id` = '".$theme_id."' ";
							}
							//echo $animate_cover.'--'.$animate_reff_id.'--'.$music_active.'--';
							// Update main table
							$upqry_master_main= "UPDATE `mrg_all_info` SET `wed_animate_cover` = '".$animate_cover."', `wed_animate_reff_id` = '".$animate_reff_id."' WHERE `mrg_url_status_auto_id` ='".$sts_auto_id."' LIMIT 1 " ;
							$order_list_id = $userslog_obj->updateVal($upqry_master_main);
							//echo $upqry_master_main;
							// Update main table - make it free card
							$upqry_master_add= "UPDATE `mrg_all_info_add` SET `wed_music_active` = '".$music_active."', `wed_social_icons` = '1' WHERE mrg_url_status_auto_id = '".$sts_auto_id."' LIMIT 1 " ;
							$order_list_id = $userslog_obj->updateVal($upqry_master_add);
							//echo $upqry_master_add;
							// Update main table
							$upqry_master= "UPDATE `mrg_url_status` SET `mrg_site_revert_status` = '2', ownpage_links = '".$ownpagelinks."' $thmupdate WHERE mrg_url_sts_auto_id = '".$sts_auto_id."' LIMIT 1 " ; //echo $upqry_master;
							//echo $upqry_master;
							$order_list_id = $userslog_obj->updateVal($upqry_master);
						}
					}
		}
    }
    fclose($myfile);
?>