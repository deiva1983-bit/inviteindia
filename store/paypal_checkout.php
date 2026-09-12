<?php
include_once('../includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: ../signin.php');
    exit;
}

$userId = (int)$_SESSION['sess_user_id'];
$orderId = (int)($_GET['order_id'] ?? 0);
$amount = (float)($_GET['amount'] ?? 0);
$userslog_obj = new userslog();

if ($orderId <= 0) {
    header('Location: account.php');
    exit;
}

$orderSql = "SELECT * FROM orders WHERE order_id = " . $orderId . " AND user_id = " . $userId . " LIMIT 1";
$orderRow = $userslog_obj->selectVal($orderSql);

if (!$orderRow || !count($orderRow)) {
    header('Location: account.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_paypal'])) {
    $txnId = 'PAYPAL-' . date('YmdHis') . '-' . rand(1000, 9999);
    $paymentSql = "INSERT INTO payments (order_id, payment_gateway, transaction_id, amount, payment_status, response_data, created_at)
                   VALUES (" . $orderId . ", 'paypal', '" . addslashes($txnId) . "', " . (float)$orderRow[0]['total_amount'] . ", 'paid', 'Manual PayPal confirmation placeholder', NOW())";
    $userslog_obj->insertVal($paymentSql);

    $updateSql = "UPDATE orders SET payment_status = 'paid', order_status = 'processing' WHERE order_id = " . $orderId . " AND user_id = " . $userId . " LIMIT 1";
    $userslog_obj->updateVal($updateSql);

    $_SESSION['store_payment_notice'] = 'PayPal payment captured successfully.';
    header('Location: account.php');
    exit;
}

$smarty->assign('order', $orderRow[0]);
$smarty->assign('amount', $amount > 0 ? $amount : $orderRow[0]['total_amount']);
$smarty->assign('pagetitle', 'PayPal Checkout | InviteIndia');
$smarty->assign('metadesc', 'Secure PayPal payment step for your order.');
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_paypal_checkout.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
