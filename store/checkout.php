<?php
include_once('../includes/configs/init.php');

$userslog_obj = new userslog();
$sessionId = session_id();

$cartSql = "SELECT c.*, p.product_name, p.price
            FROM cart_sessions c
            LEFT JOIN products p ON p.product_id = c.product_id
            WHERE c.session_id = '" . $sessionId . "'";
$cartItems = $userslog_obj->selectVal($cartSql);

if (!$cartItems || !count($cartItems)) {
    header('Location: products.php');
    exit;
}

$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += (float)$item['price'] * (int)$item['quantity'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = trim($_POST['customer_name'] ?? '');
    $customerEmail = trim($_POST['customer_email'] ?? '');
    $customerPhone = trim($_POST['customer_phone'] ?? '');
    $shippingAddress = trim($_POST['shipping_address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $state = trim($_POST['state'] ?? '');
    $country = trim($_POST['country'] ?? 'India');
    $postalCode = trim($_POST['postal_code'] ?? '');
    $paymentMethod = in_array($_POST['payment_method'] ?? '', array('ccavenue', 'paypal')) ? $_POST['payment_method'] : 'ccavenue';

    $orderNo = 'INV-' . date('YmdHis') . '-' . rand(1000, 9999);

    $orderSql = "INSERT INTO orders
        (order_no, customer_name, customer_email, customer_phone, shipping_address, city, state, country, postal_code, subtotal, shipping_charge, total_amount, payment_method, payment_status, order_status)
        VALUES
        ('" . addslashes($orderNo) . "', '" . addslashes($customerName) . "', '" . addslashes($customerEmail) . "', '" . addslashes($customerPhone) . "', '" . addslashes($shippingAddress) . "', '" . addslashes($city) . "', '" . addslashes($state) . "', '" . addslashes($country) . "', '" . addslashes($postalCode) . "', " . $subtotal . ", 0, " . $subtotal . ", '" . $paymentMethod . "', 'pending', 'new')";

    $inserted = $userslog_obj->insertVal($orderSql);
    $orderId = $userslog_obj->db_connect->lastInsertId();

    foreach ($cartItems as $item) {
        $lineTotal = (float)$item['price'] * (int)$item['quantity'];
        $itemSql = "INSERT INTO order_items (order_id, product_id, product_name, quantity, unit_price, total_price)
                    VALUES (" . $orderId . ", " . $item['product_id'] . ", '" . addslashes($item['product_name']) . "', " . (int)$item['quantity'] . ", " . (float)$item['price'] . ", " . $lineTotal . ")";
        $userslog_obj->insertVal($itemSql);
    }

    if ($paymentMethod == 'ccavenue') {
        header('Location: ../pay/ccavRequestHandler.php?order_id=' . $orderId . '&order_no=' . $orderNo . '&amount=' . $subtotal);
        exit;
    }

    if ($paymentMethod == 'paypal') {
        header('Location: paypal_checkout.php?order_id=' . $orderId . '&amount=' . $subtotal);
        exit;
    }
}

$smarty->assign('cart_items', $cartItems);
$smarty->assign('subtotal', $subtotal);
$smarty->assign('pagetitle', 'Checkout | InviteIndia');
$smarty->assign('metadesc', 'Secure checkout for wedding sarees and gift products.');
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_checkout.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
