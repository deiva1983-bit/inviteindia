<?php
include_once('../includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: ../signin.php');
    exit;
}

$userId = (int)$_SESSION['sess_user_id'];
$orderId = (int)$_GET['id'] ?? 0;

if ($orderId == 0) {
    header('Location: account.php');
    exit;
}

$userslog_obj = new userslog();

// Get order details
$orderSql = "SELECT * FROM orders WHERE order_id = " . $orderId . " AND user_id = " . $userId;
$order = $userslog_obj->db_connect->getOneFromSQL($orderSql);

if (!$order) {
    header('Location: account.php');
    exit;
}

// Get order items
$itemsSql = "SELECT * FROM order_items WHERE order_id = " . $orderId;
$items = $userslog_obj->db_connect->getArrayFromSQL($itemsSql);
$userslog_obj->db_connect->closedb();

$smarty->assign('order', $order);
$smarty->assign('items', $items);
$smarty->assign('pagetitle', 'Order Details - ' . $order['order_no'] . ' | InviteIndia');
$smarty->assign('metadesc', 'View your order details and status.');
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/order_details.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
