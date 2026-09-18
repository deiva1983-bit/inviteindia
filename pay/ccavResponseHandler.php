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

$workingKey = isset($CC_workingKey) ? $CC_workingKey : 'A49DF471EC07AB258E0595041DDCE072';
$encResponse = $_POST['encResp'] ?? '';
$rcvdString = decrypt($encResponse, $workingKey);
$trans_msg = '<br>Security Error. Illegal access detected';

if ($rcvdString !== '') {
    $decryptValues = explode('&', $rcvdString);
    $data = array();

    foreach ($decryptValues as $pair) {
        if (trim($pair) === '') {
            continue;
        }

        $parts = explode('=', $pair, 2);
        if (count($parts) === 2) {
            $data[$parts[0]] = urldecode($parts[1]);
        }
    }

    $orderStatus = strtolower($data['order_status'] ?? 'failure');
    $orderId = isset($data['order_id']) ? (int)$data['order_id'] : 0;
    $trackingId = $data['tracking_id'] ?? '';
    $amount = isset($data['amount']) ? (float)$data['amount'] : 0;
    $expectedAmount = 0;
    $orderFound = false;
    $alreadyPaid = false;

    // Use the real mysqli escaper bound to the live connection rather than
    // addslashes(). addslashes() is not a SQL escape function: it knows nothing
    // about the connection charset and does not escape everything MySQL treats
    // as special, so it is not a dependable injection defence. The proper fix
    // is prepared statements - see the audit note at the bottom of this file.
    $esc = function ($v) use ($userslog_obj) {
        return mysqli_real_escape_string($userslog_obj->db_connect->socket, (string)$v);
    };

    if ($orderId > 0) {
        $orderSql = "SELECT total_amount, payment_status FROM orders WHERE order_id = " . $orderId . " LIMIT 1";
        $orderRow = $userslog_obj->selectVal($orderSql);
        if ($orderRow && count($orderRow)) {
            $orderFound = true;
            $expectedAmount = (float)$orderRow[0]['total_amount'];
            $alreadyPaid = (strtolower(trim($orderRow[0]['payment_status'] ?? '')) === 'paid');
        }
    }

    if ($orderStatus === 'success') {

        /* -------------------------------------------------------------------
           FIXED: the amount check used to read

               if ($expectedAmount > 0 && $amount > 0 && abs(diff) > 0.01)

           Every one of those three conditions had to be true to reject, so
           the check silently passed whenever the order was missing from the
           orders table, or total_amount was 0/NULL, or the gateway sent no
           amount. In those cases the order was marked PAID without any amount
           having been verified at all.

           Now: a success is only honoured when the order exists, has a real
           expected amount, and the gateway-reported amount matches it. Anything
           else is held for manual review instead of being auto-approved. Fail
           closed is the correct default for money.
           ------------------------------------------------------------------- */
        if (!$orderFound || $expectedAmount <= 0) {
            // Do not touch the order. An unmatched success is an accounting
            // exception a human needs to look at, not a confirmation.
            error_log('CCAvenue: success for unknown/zero-amount order_id=' . $orderId . ' tracking_id=' . $trackingId);
            $trans_msg = '<br>We have received your payment and are verifying it. Our team will confirm your order by email shortly.';

        } else if ($amount <= 0 || abs($amount - $expectedAmount) > 0.01) {
            error_log('CCAvenue: amount mismatch order_id=' . $orderId . ' paid=' . $amount . ' expected=' . $expectedAmount);
            $trans_msg = '<br>Payment amount mismatch. Please contact support before paying again.';

        } else if ($alreadyPaid) {
            /* ---------------------------------------------------------------
               ADDED: replay / double-submit protection.
               The old handler had none. Because the only authenticity proof
               here is that the payload decrypts, the same encResp could be
               POSTed to this URL over and over - each time re-running the
               UPDATE and inserting another row into payments. That corrupts
               revenue reporting and can trigger duplicate fulfilment.
               Treating an already-paid order as a no-op makes the handler
               idempotent, which is what a payment callback must be.

               ALSO ADD THIS AT THE DATABASE LEVEL, because two concurrent
               posts can both pass this check:
                   ALTER TABLE payments
                     ADD UNIQUE KEY uniq_txn (payment_gateway, transaction_id);
               --------------------------------------------------------------- */
            $trans_msg = '<br>This order is already paid. Thank you for shopping with us.';

        } else {
            $updateSql = "UPDATE orders SET payment_status = 'paid', order_status = 'processing'
                          WHERE order_id = " . $orderId . " AND payment_status <> 'paid' LIMIT 1";
            $userslog_obj->updateVal($updateSql);

            // Record the amount ACTUALLY paid, not the expected amount. Writing
            // the expected figure (as before) would hide any discrepancy from
            // your own books - the one place you would want to see it.
            $paymentSql = "INSERT INTO payments (order_id, payment_gateway, transaction_id, amount, payment_status, response_data, created_at)
                VALUES (" . $orderId . ", 'ccavenue', '" . $esc($trackingId) . "', " . (float)$amount . ", 'paid', '" . $esc(json_encode($data, JSON_UNESCAPED_SLASHES)) . "', NOW())";
            $userslog_obj->insertVal($paymentSql);

            $trans_msg = '<br>Thank you for shopping with us. Your payment is successfully completed.';
        }
    } else if ($orderStatus === 'aborted') {
        $trans_msg = '<br>Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail.';
    } else if ($orderStatus === 'failure') {
        $trans_msg = '<br>Thank you for shopping with us. However, the transaction has been declined.';
    }
}

$smarty->assign('pagetitle', 'Payment confirmation');
$smarty->assign('metadesc', 'Payment confirmation');
$smarty->assign('trans_msgs', $trans_msg);
$content_template = '../templates/default/about_trans.tpl';
$smarty->assign('header', $smarty->fetch('../templates/default/header_pay.tpl'));
$smarty->assign('content', $smarty->fetch($content_template));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
