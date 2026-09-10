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
	fclose($myfile);
	
 
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
	//$data['custom'] 			= $_POST['custom'];
		
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);	
	//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);	
	$pieces = explode("-", $data['custom']);
	$uid = $pieces[0];
	$pid = $pieces[1];
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
                '".$uid."' ,
                '".$data['txn_id']."' ,
                '".$data['payment_amount']."' ,
                '".$data['payment_status']."' ,
                '".$pid."' ,
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
 
?>