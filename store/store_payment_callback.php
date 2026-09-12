<?php
include_once('../includes/configs/init.php');

$userslog_obj = new userslog();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed';
    exit;
}

$orderId = isset($_POST['order_id']) ? (int)$_POST['order_id'] : 0;
$txnId = trim($_POST['txn_id'] ?? '');
$gateway = in_array(trim($_POST['gateway'] ?? ''), array('ccavenue', 'paypal')) ? trim($_POST['gateway']) : 'ccavenue';
$amount = (float)($_POST['amount'] ?? 0);
$status = strtolower(trim($_POST['status'] ?? 'failed'));

if ($orderId <= 0) {
    http_response_code(400);
    echo 'Missing order id';
    exit;
}

$orderSql = "SELECT * FROM orders WHERE order_id = " . $orderId . " LIMIT 1";
$orderRow = $userslog_obj->selectVal($orderSql);

if (!$orderRow || !count($orderRow)) {
    http_response_code(404);
    echo 'Order not found';
    exit;
}

$expectedAmount = (float)$orderRow[0]['total_amount'];
if ($amount > 0 && abs($amount - $expectedAmount) > 0.01) {
    http_response_code(400);
    echo 'Amount mismatch';
    exit;
}

$paymentStatus = ($status === 'success' || $status === 'paid') ? 'paid' : 'failed';
$updateSql = "UPDATE orders SET payment_status = '" . addslashes($paymentStatus) . "', order_status = '" . ($paymentStatus === 'paid' ? 'processing' : 'cancelled') . "' WHERE order_id = " . $orderId . " LIMIT 1";
$userslog_obj->updateVal($updateSql);

$paymentSql = "INSERT INTO payments (order_id, payment_gateway, transaction_id, amount, payment_status, response_data, created_at)
               VALUES (" . $orderId . ", '" . addslashes($gateway) . "', '" . addslashes($txnId) . "', " . $expectedAmount . ", '" . addslashes($paymentStatus) . "', '" . addslashes(json_encode($_POST, JSON_UNESCAPED_SLASHES)) . "', NOW())";
$userslog_obj->insertVal($paymentSql);

echo 'OK';
?>
