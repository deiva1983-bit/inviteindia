<?php include('Crypto.php');
include_once('../includes/configs/init.php');
?>
<?php

	error_reporting(0);
	$smarty->assign('currentpage_js', 'my_page');
	$userslog_obj = new userslog();
	$common_obj = new common();
	$mail_obj = new mails();
	$smarty->assign('glb_site_url', $glb_site_url);
	$smarty->assign('topnav_select', 'aboutus');
	$workingKey='A49DF471EC07AB258E0595041DDCE072';		//Working Key should be provided here.
	//$workingKey= $CC_workingKey;
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	/**
	order_id=4131&tracking_id=105027974491&bank_ref_no=160102610684&order_status=Success&failure_message=&payment_mode=Net Banking&card_name=HDFC Bank&status_code=null&status_message=null&currency=INR&amount=1.0&billing_name=deivainviteindia&billing_address=2B&billing_city=Chennai&billing_state=TN&billing_zip=631501&billing_country=India&billing_tel=1234567890&billing_email=deivainviteindia@gmail.com&delivery_name=deivainviteindia&delivery_address=2B&delivery_city=Chennai&delivery_state=TN&delivery_zip=631501&delivery_country=India&delivery_tel=1234567890&merchant_param1=&merchant_param2=own&merchant_param3=4131&merchant_param4=3861&merchant_param5=http/www.godhelpme.com&vault=N&offer_type=null&offer_code=null&discount_value=0.0&mer_amount=1.0&eci_value=null


	$rcvdString ='order_id=2926&tracking_id=104025661988&bank_ref_no=153624599403&order_status=Success&failure_message=&payment_mode=Net%20Banking&card_name=HDFCBank&status_code=null&status_message=null&currency=INR&amount=1.0&billing_name=deivauser&billing_address=2B&billing_city=Chennai&billing_state=TN&billing_zip=631501&billing_country=India&billing_tel=1234567890&billing_email=deivauser@gmail.com&delivery_name=deivauser&delivery_address=2B&delivery_city=Chennai&delivery_state=TN&delivery_zip=631501&delivery_country=India&delivery_tel=1234567890&merchant_param1=3&merchant_param2=own&merchant_param3=2926&merchant_param4=1804&merchant_param5=&vault=N&offer_type=null&offer_code=null&discount_value=0.0&mer_amount=1.0&eci_value=null';
	**/
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";
    $data='';
	

	$myfile = fopen("newfilecc_own_domain.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $decryptValues);
	fwrite($myfile, "----");
	fwrite($myfile, $rcvdString);
	fwrite($myfile, ">>>>>>>>>>>>>>>>>>>>>>");
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3){ 
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
		}else if($i==27) { // It should be 'own' from merchant_param2
		$billing_email_dontknow=$information[1];
		}else if($i==28) { // It should be  user id from merchant_param3
		$mid=$information[1];
		}else if($i==29) { // It should be  user id from merchant_param3
		$wedid=$information[1];
		}
	}
	$pay_plan = '9'; // 9 means Own domain
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
	$data['pay_wedid'] 		= $wedid;
	$trans_msg=''; 
	if($order_status==="Success")
	{
   $orderid = $common_obj->updatePayment_owndomain($data);
//mrg_main_user_id ='".$data['user_id']."' and mrg_url_sts_auto_id ='".$data['pay_wedid']."'
   //$sele_qry= "SELECT mrg_page_url, own_domain FROM `mrg_url_status` where mrg_url_sts_auto_id='".$wedid."' and mrg_main_user_id='".$order_id_user_log_status."' ";
   $sele_qry= "SELECT a.mrg_page_url as page_url, b.own_domain_name as domain_name, b.own_domain_contact_name as contact_name, b.own_domain_contact_no as contact_no FROM `mrg_url_status` a, tbl_own_domain b where a.mrg_url_sts_auto_id='".$wedid."' and a.mrg_main_user_id='".$order_id_user_log_status."' and a.own_domain_child_id = b.own_domain ";
		$selectAffectedRows_sele_qry = $userslog_obj->selectAffectedRows($sele_qry);
		$page_url='';$own_domain='';$contact_name='';$contact_no='';
		if($selectAffectedRows_sele_qry){ 
			$pass_access= $userslog_obj->selectVal($sele_qry);
			$page_url = 'www.inviteindia.com/'.$pass_access[0]['page_url'] ;
			$own_domain = $pass_access[0]['domain_name'] ;
			$contact_name = $pass_access[0]['contact_name'] ;
			$contact_no = $pass_access[0]['contact_no'] ;
			} else {
			echo 'Sorry, We are unable to update your transaction. Please call us our customer service.'; exit;
			}
	// Will trigger mail functions
   // Send mail to User
	$domain_email_tmpl=$mail_obj->getOwnDomain();
	$domain_admin_email_tmpl=$mail_obj->getOwnDomain_admin();
	//$domain_email_tmpl =eregi_replace("%usernm%", "Hi,", $domain_email_tmpl);
	$domain_email_tmpl =eregi_replace("%inv_url%", "$page_url", $domain_email_tmpl);
	$domain_email_tmpl =eregi_replace("%own_web%", "$own_domain", $domain_email_tmpl);
	$sub=$own_domain_subject;
	$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
	$common_obj->simplemail($billing_email, $sub, $domain_email_tmpl, $headers);

	// Send mail to admin
	$domain_admin_email_tmpl =eregi_replace("%inv_url%", "$page_url", $domain_admin_email_tmpl);
	$domain_admin_email_tmpl =eregi_replace("%own_web%", "$own_domain", $domain_admin_email_tmpl);
	$domain_admin_email_tmpl =eregi_replace("%cont_no%", "$contact_no", $domain_admin_email_tmpl);
	$domain_admin_email_tmpl =eregi_replace("%cont_name%", "$contact_name", $domain_admin_email_tmpl);
	$domain_admin_email_tmpl =eregi_replace("%billing_email%", "$billing_email", $domain_admin_email_tmpl);
	$common_obj->simplemail('deivainviteindia@gmail.com', $sub, $domain_admin_email_tmpl, $headers);
	//print $domain_email_tmpl;

	$trans_msg = "<br>Thank you for shopping with us. Your payment is successfully completed. You're website will be avilable with in 36 hours. <br> Call us if you have any doubts: +91 868 104 3002 or inviteindia.feedback@gmail.com.";
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