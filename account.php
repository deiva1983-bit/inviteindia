<?php
include_once('includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: signin.php');
    exit;
}

$userId = (int)$_SESSION['sess_user_id'];
$userslog_obj = new userslog();

$ordersSql = "SELECT * FROM orders WHERE user_id = " . $userId . " ORDER BY order_id DESC LIMIT 20";
$orders = $userslog_obj->selectVal($ordersSql);

$addressSql = "SELECT * FROM customer_addresses WHERE user_id = " . $userId . " ORDER BY is_default DESC, address_id DESC";
$addresses = $userslog_obj->selectVal($addressSql);

$smarty->assign('orders', $orders);
$smarty->assign('addresses', $addresses);
$smarty->assign('pagetitle', 'My Account | InviteIndia');
$smarty->assign('metadesc', 'Manage your account, addresses, and order history.');
$smarty->assign('header', $smarty->fetch('default/header.tpl'));
$smarty->assign('content', $smarty->fetch('default/account.tpl'));
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));
$smarty->display('default/index.tpl');
?>
