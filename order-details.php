<?php
include_once('includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: signin.php');
    exit;
}

$userId = (int)$_SESSION['sess_user_id'];
$orderId = (int)($_GET['id'] ?? 0);
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

$itemSql = "SELECT * FROM order_items WHERE order_id = " . $orderId . " ORDER BY order_item_id ASC";
$orderItems = $userslog_obj->selectVal($itemSql);

$smarty->assign('order', $orderRow[0]);
$smarty->assign('items', $orderItems);
$smarty->assign('pagetitle', 'Order Details | InviteIndia');
$smarty->assign('metadesc', 'Detailed view of your order and items.');
$smarty->assign('header', $smarty->fetch('default/header.tpl'));
$smarty->assign('content', $smarty->fetch('default/store_order_details.tpl'));
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));
$smarty->display('default/index.tpl');
?>
