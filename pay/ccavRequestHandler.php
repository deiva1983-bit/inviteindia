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

	// error_reporting(0) was here. Left off deliberately: this file now does a
	// database lookup and silently swallowing a failure in payment code is how
	// you end up with orders in an unknown state. Errors should go to the log,
	// not to the screen - set display_errors=0 and log_errors=1 in
	// includes/configs/init.php (see the note in index.php).
	error_reporting(E_ALL);
	ini_set('display_errors', 0);

	// Required for the server-side order lookup below. The original file never
	// created this object because it never touched the database - it trusted
	// the amount from the query string instead.
	$userslog_obj = new userslog();

	/* -------------------------------------------------------------------------
	   CREDENTIALS
	   -------------------------------------------------------------------------
	   SECURITY ISSUE - ACT ON THIS:
	   The literals below were hardcoded here as fallbacks, which means your
	   CCAvenue working key and access code are sitting in the source tree and
	   in every git commit that ever touched this file. The working key is the
	   AES key used to encrypt requests AND decrypt responses, so anyone holding
	   it can forge a valid "payment successful" payload for any order.

	   The fallbacks are intentionally left in place for now so payments do not
	   suddenly stop if $CC_workingKey is not defined in globalconfigs.php - but
	   they are a liability, not a safety net. Required steps, in order:
	     1. Rotate the working key and access code in the CCAvenue merchant
	        dashboard. Assume the current ones are compromised.
	     2. Put the new values in includes/configs/globalconfigs.php only
	        (that file is gitignored, which is why the DB credentials live there).
	     3. Delete the two fallback literals below so a missing config fails
	        loudly instead of silently using a leaked key.
	     4. Purge them from git history, or treat the repo as containing secrets.
	   ------------------------------------------------------------------------- */
	$workingKey = isset($CC_workingKey) ? $CC_workingKey : 'A49DF471EC07AB258E0595041DDCE072';
	$accessCode = isset($CC_access_code) ? $CC_access_code : 'AVHA85GE53BW26AHWB';

	$orderId = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;
	$orderNo = isset($_GET['order_no']) ? trim($_GET['order_no']) : '';

	if ($orderId > 0) {
		/* ---------------------------------------------------------------------
		   FIXED - PRICE TAMPERING
		   The amount used to come straight from $_GET['amount']:

		       $amount = isset($_GET['amount']) ? (float)$_GET['amount'] : 0;

		   store/checkout.php redirects here with the amount in the query
		   string, so a customer only had to edit the URL -
		   ccavRequestHandler.php?order_id=91&amount=1 - to be charged Rs 1 for
		   any order. The amount is now read from the orders row on the server
		   and the query parameter is ignored entirely. A price must never make
		   a round trip through the client.
		   --------------------------------------------------------------------- */
		$orderSql = "SELECT total_amount, order_no, payment_status FROM orders WHERE order_id = " . $orderId . " LIMIT 1";
		$orderRow = $userslog_obj->selectVal($orderSql);

		if (!$orderRow || !count($orderRow)) {
			echo 'Order not found. Please start checkout again.'; exit;
		}

		// Do not let an already-paid order be sent to the gateway a second time.
		if (strtolower(trim($orderRow[0]['payment_status'] ?? '')) === 'paid') {
			echo 'This order has already been paid.'; exit;
		}

		$amount = (float)$orderRow[0]['total_amount'];
		if ($amount <= 0) {
			echo 'This order has no payable amount. Please contact support.'; exit;
		}

		// Prefer the stored order number over the one supplied in the URL.
		$orderNo = trim($orderRow[0]['order_no'] ?? '') !== '' ? trim($orderRow[0]['order_no']) : $orderNo;

		$merchantData = 'merchant_id=' . rawurlencode((string)$mid)
			. '&order_id=' . rawurlencode((string)$orderId)
			. '&order_no=' . rawurlencode($orderNo)
			. '&amount=' . number_format($amount, 2, '.', '')
			. '&currency=INR';
		$encryptedData = encrypt($merchantData, $workingKey);

	} else {
		$merchant_data='';
		$pay_plan = isset($_POST["merchant_param1"]) ? trim($_POST["merchant_param1"]) : '';

		if ($pay_plan === '') {
			echo 'Please select your plan.'; exit;
		}

		/* ---------------------------------------------------------------------
		   HARDENED - plan lookup
		   Was: $packval = 'price_' . $pay_plan; $item_amount = $$packval;
		   A variable-variable built from client input let a caller probe any
		   in-scope variable whose name began with "price_". Restricted to an
		   explicit whitelist of plan ids instead. Extend the array when you add
		   a plan; anything not listed is rejected rather than defaulted.
		   --------------------------------------------------------------------- */
		$allowed_plans = array('1', '2', '3', '4', '5');
		if (!in_array((string)$pay_plan, $allowed_plans, true)) {
			echo 'Unknown plan selected.'; exit;
		}

		$packval = 'price_' . $pay_plan;
		$item_amount = isset($$packval) ? (float)$$packval : 0;

		/* ---------------------------------------------------------------------
		   FIXED - PHP 8 BEHAVIOUR CHANGE (introduced by your version upgrade)
		   Was: if ($item_amount == '') { ...exit; }
		   On PHP 7 a numeric 0 compared equal to '' so a missing price exited
		   safely. PHP 8 changed number-to-string comparison: 0 == '' is now
		   FALSE, so this guard stopped firing and a plan with no configured
		   price would build a zero-rupee payment request instead of erroring.
		   Now an explicit numeric test.
		   --------------------------------------------------------------------- */
		if ($item_amount <= 0) {
			echo 'Plan price is not configured. Please contact support.'; exit;
		}

		/* ---------------------------------------------------------------------
		   FIXED - parameter injection / duplicate amount
		   Was: foreach ($_POST as $key => $value) { $merchant_data .= $key.'='.$value.'&'; }
		   Two problems:
		     1. Values were concatenated raw, so a value containing "&" or "="
		        could inject extra gateway parameters into the encrypted request.
		     2. It copied every posted field verbatim - including a client
		        supplied "amount" - and only appended the server amount
		        afterwards, leaving two amount keys in one payload and the
		        client's copy first.
		   Now: amount/currency are stripped from the client data, and every
		   key and value is urlencoded.
		   --------------------------------------------------------------------- */
		$reserved = array('amount', 'currency', 'merchant_id', 'access_code', 'encRequest');
		foreach ($_POST as $key => $value) {
			if (in_array(strtolower((string)$key), $reserved, true) || !is_scalar($value)) {
				continue;
			}
			$merchant_data .= rawurlencode((string)$key) . '=' . rawurlencode((string)$value) . '&';
		}
		$merchant_data .= 'amount=' . number_format($item_amount, 2, '.', '') . '&currency=INR';
		$encryptedData = encrypt($merchant_data, $workingKey);
	}

	if ($encryptedData === '') {
		// encrypt() returns '' when openssl fails. Never post an empty
		// encRequest to the gateway - it produces a confusing failure page.
		echo 'Unable to start the payment securely. Please try again or contact support.'; exit;
	}
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
	// Quoted and escaped attributes. The originals were unquoted
	// (value=$encryptedData), which breaks the markup the moment a value
	// contains whitespace or a quote character.
	echo '<input type="hidden" name="encRequest" value="' . htmlspecialchars($encryptedData, ENT_QUOTES, 'UTF-8') . '">';
	echo '<input type="hidden" name="access_code" value="' . htmlspecialchars($accessCode, ENT_QUOTES, 'UTF-8') . '">';
	// Fallback for users with JavaScript disabled - the auto-submit below
	// would otherwise leave them on a blank page.
	echo '<noscript><button type="submit">Continue to secure payment</button></noscript>';
?>
</form>
<script language='javascript'>document.redirect.submit();</script>

