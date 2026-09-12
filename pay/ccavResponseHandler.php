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

    if ($orderId > 0) {
        $orderSql = "SELECT * FROM orders WHERE order_id = " . $orderId . " LIMIT 1";
        $orderRow = $userslog_obj->selectVal($orderSql);
        if ($orderRow && count($orderRow)) {
            $expectedAmount = (float)$orderRow[0]['total_amount'];
        }
    }

    if ($orderStatus === 'success') {
        if ($expectedAmount > 0 && $amount > 0 && abs($amount - $expectedAmount) > 0.01) {
            $trans_msg = '<br>Payment amount mismatch. Please contact support.';
        } else {
            $paymentStatus = 'paid';
            if ($orderId > 0) {
                $updateSql = "UPDATE orders SET payment_status = '" . addslashes($paymentStatus) . "', order_status = 'processing' WHERE order_id = " . $orderId . " LIMIT 1";
                $userslog_obj->updateVal($updateSql);

                $paymentSql = "INSERT INTO payments (order_id, payment_gateway, transaction_id, amount, payment_status, response_data, created_at)
                    VALUES (" . $orderId . ", 'ccavenue', '" . addslashes($trackingId) . "', " . $expectedAmount . ", 'paid', '" . addslashes(json_encode($data, JSON_UNESCAPED_SLASHES)) . "', NOW())";
                $userslog_obj->insertVal($paymentSql);
            }
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
