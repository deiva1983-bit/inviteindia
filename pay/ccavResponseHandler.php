<?php include('Crypto.php');
include_once('../includes/configs/init.php');
?>
<?php

	error_reporting(0);
	$smarty->assign('currentpage_js', 'my_page');
	$userslog_obj = new userslog();
	$common_obj = new common();
	$smarty->assign('glb_site_url', $glb_site_url);
	$smarty->assign('topnav_select', 'main');
	$smarty->assign('currentpage_js', 'main_page');


	$workingKey='A49DF471EC07AB258E0595041DDCE072';		//Working Key should be provided here.
	//$workingKey= $CC_workingKey;
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	//$rcvdString = 'order_id=19045&tracking_id=108590842690&bank_ref_no=191451380137&order_status=Success&failure_message=&payment_mode=Net Banking&card_name=HDFC Bank&status_code=null&status_message=S&currency=INR&amount=0.10&billing_name=invitewedkavi&billing_address=2B dfdf&billing_city=Kanchipuram&billing_state=Tamilnadu&billing_zip=631501&billing_country=India&billing_tel=9092502124&billing_email=inviteindia.feedback@gmail.com&delivery_name=invitewedkavi&delivery_address=2B dfdf&delivery_city=Kanchipuram&delivery_state=Tamilnadu&delivery_zip=631501&delivery_country=India&delivery_tel=9092502124&merchant_param1=3&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&vault=N&offer_type=null&offer_code=null&discount_value=0.0&mer_amount=0.10&eci_value=null&retry=N&response_code=0&billing_notes=&trans_date=25/05/2019 16:34:27';
	$decryptValues=explode('&', $rcvdString);
	//print_r ($decryptValues);
	//print_r ("----");
	$dataSize=sizeof($decryptValues);
	echo "<center>";
    $data='';
	$myfile = fopen("newfilelat.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $decryptValues);
	fwrite($myfile, $rcvdString);
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	{ 
		$order_status=$information[1]; 
		}else if($i==26) {
		$pay_plan=$information[1];
		}
		else if($i==10) {
		$pay_amt=$information[1];
		}
		else if($i==0) {
		$order_id_user_log_status=$information[1];
		}
		else if($i==1) {
		$tracking_id=$information[1];
		}else if($i==18) {
		$billing_email=$information[1];
		}
	}
	$data['pay_plan'] 		= $pay_plan;
    $data['item_name']		= '';
    $data['payment_status'] 	= $order_status;
    $data['payment_amount'] 	= $pay_amt;
    $data['payment_currency']	= 'INR';
    $data['txn_id']				= $tracking_id;
    $data['receiver_email'] 	= 'deivainviteindia@gmail.com';
    $data['payer_email'] 		= $billing_email;
    $data['user_id'] 		= $order_id_user_log_status;
    $data['plan_id'] 		= $pay_plan;
    $data['pay_type'] 		= 2;
	$trans_msg='';
	if($order_status==="Success")
	{ 
   $orderid = $common_obj->updatePayment($data);    
    // Update existing card expired date
    $packid = $common_obj->getPackInfo($order_id_user_log_status);
    $packval = 'valid_'."$packid";
    $pvalue = $$packval;
    $packvalue = ($pvalue != 0) ? '+'.$pvalue.' month'  : '+'.$free_indays.' days' ;
    $endOfCycle=date('Y-m-d', strtotime($packvalue));
    $upqry= "UPDATE `mrg_url_status` SET `mrg_site_end_date` = '".$endOfCycle."', `mrg_status` = 1 WHERE `mrg_main_user_id` ='".$order_id_user_log_status."' and mrg_status != '4' " ;
//	fwrite($myfile, $writeval);
    $order_list_id = $userslog_obj->updateVal($upqry);
	$chkqry_free= "SELECT * FROM `mrg_url_status` where mrg_main_user_id='".$order_id_user_log_status."' and mrg_site_revert_status ='1' ";
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
		$trans_msg = "<br>Thank you for shopping with us. Your payment is successfully completed. You can share your wedding invitations.";
		
	}
	else if($order_status==="Aborted")
	{
		$trans_msg = "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		$trans_msg = "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		$trans_msg = "<br>aSecurity Error. Illegal access detected";
	
	}

	$trans_msg .= "<br><br>";
/*
	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}
*/
	$smarty->assign('pagetitle', "Wedding website - Payment confirmation");
	$smarty->assign('metadesc', "Wedding website - Payment confirmation");

    $smarty->assign('trans_msgs', $trans_msg);
	//$smarty->assign('header', $smarty->fetch('default/header.tpl') );
	/*----- Include Files Details Start-----*/
	$content_template = '../templates/default/about_trans.tpl';
	$smarty->assign('header', $smarty->fetch('../templates/default/header_pay.tpl') );
	$smarty->assign('content', $smarty->fetch($content_template) );
	$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
	/*----- Include Files Details End-----*/
	$smarty->display('../templates/default/index.tpl');

?>
