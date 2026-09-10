<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();

// PayPal settings
//$paypal_email = 'deivainviteindia-facilitator@gmail.com';
$paypal_email = 'deivainviteindia@gmail.com';
$return_url = 'http://www.inviteindia.com/paysuccess.php';
$cancel_url = 'http://www.inviteindia.com';
$notify_url = 'http://www.inviteindia.com/paypal_res.php';
$item_name = 'Wedding Invitations';
$pay_plan = $_POST["pay_plan"] ;
$packval = 'price_usd_'."$pay_plan";
$item_amount = $$packval;
if($pay_plan ==''){
echo 'Plesase select your plan.'; exit;
}
if($item_amount ==''){
echo 'Plesase select your plan. Amount is missing.'; exit;
}

// Include Functions
//include("functions.php");

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){

	$usrid = $_POST["userlog_id"];
 
	$customfield = $usrid.'-'.$pay_plan;
	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";	
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	// Append querystring with custom field
	$querystring .= "&custom=$customfield";

	// Redirect to paypal IPN
	//header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);
	exit();

}else{
	
	// Response from Paypal
	$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	//$writeval = $req ."------";
	//fwrite($myfile, $writeval);
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
	$data['userlog_id'] 		= $_POST['userlog_id'];
	//$data['custom'] 			= $_POST['custom'];
		
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	//$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);	
	$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);	
	
	if (!$fp) {
		// HTTP ERROR
	} else {	

		fputs ($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp($res, "VERIFIED") == 0) {
			
				// Used for debugging
				//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Verified Response<br />data = <pre>".print_r($post, true)."</pre>");
				// PAYMENT VALIDATED & VERIFIED!
				$sqry = "INSERT INTO `tbl_payments` (pay_autoid, pay_userid, pay_txnid, pay_amount, pay_status, pay_planid, pay_createdtime, 	pay_type) VALUES ( null,
                '".$data['userlog_id']."' ,
                '".$data['txn_id']."' ,
                '".$data['payment_amount']."' ,
                '".$data['payment_status']."' ,
                '".$data['pay_plan']."' ,
                '".date("Y-m-d H:i:s")."' , 1 )" ; 
				$orderid = $userslog_obj->insertVal($sqry);
				 						
			
			}else if (strcmp ($res, "INVALID") == 0) {
			
				// PAYMENT INVALID & INVESTIGATE MANUALY! 
				// E-mail admin or alert user
				
				// Used for debugging
				//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
			}		
		}		
	fclose ($fp);
	}	
}
?>