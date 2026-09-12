<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php');
include_once('../includes/configs/init.php');
?>
<?php

	error_reporting(0);

	$workingKey = isset($CC_workingKey) ? $CC_workingKey : 'A49DF471EC07AB258E0595041DDCE072';
	$accessCode = isset($CC_access_code) ? $CC_access_code : 'AVHA85GE53BW26AHWB';
	$orderId = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;
	$orderNo = isset($_GET['order_no']) ? trim($_GET['order_no']) : '';
	$amount = isset($_GET['amount']) ? (float)$_GET['amount'] : 0;

	if ($orderId > 0 && $amount > 0) {
		$merchantData = 'merchant_id=' . rawurlencode((string)$mid) . '&order_id=' . rawurlencode((string)$orderId) . '&order_no=' . rawurlencode($orderNo) . '&amount=' . number_format($amount, 2, '.', '') . '&currency=INR';
		$encryptedData = encrypt($merchantData, $workingKey);
	} else {
		$merchant_data='';
		$pay_plan = isset($_POST["merchant_param1"]) ? $_POST["merchant_param1"] : '';
		$packval = 'price_' . $pay_plan;
		$item_amount = isset($$packval) ? $$packval : 0;
		if ($pay_plan == '') {
			echo 'Please select your plan.'; exit;
		}
		if ($item_amount == '') {
			echo 'Please select your plan. Amount is missing.'; exit;
		}
		$merchant_add_data = "&amount=$item_amount";
		foreach ($_POST as $key => $value) {
			$merchant_data .= $key . '=' . $value . '&';
		}
		$merchant_data .= $merchant_add_data;
		$encryptedData = encrypt($merchant_data, $workingKey);
	}
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
	echo "<input type=hidden name=encRequest value=$encryptedData>";
	echo "<input type=hidden name=access_code value=$accessCode>";
?>
</form>
<script language='javascript'>document.redirect.submit();</script>

