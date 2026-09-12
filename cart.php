<?php
include_once('includes/configs/init.php');

$userslog_obj = new userslog();
$sessionId = session_id();

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
    if ($productId <= 0 || $qty <= 0) {
        header('Location: products.php');
        exit;
    }

    $productSql = "SELECT * FROM products WHERE product_id = " . $productId . " AND status = 1 LIMIT 1";
    $productRow = $userslog_obj->selectVal($productSql);
    if (!$productRow || !count($productRow)) {
        header('Location: products.php');
        exit;
    }

    $checkSql = "SELECT * FROM cart_sessions WHERE session_id = '" . $sessionId . "' AND product_id = " . $productId . " LIMIT 1";
    $existing = $userslog_obj->selectVal($checkSql);

    if ($existing && count($existing)) {
        $newQty = (int)$existing[0]['quantity'] + $qty;
        $updateSql = "UPDATE cart_sessions SET quantity = " . $newQty . " WHERE cart_id = " . $existing[0]['cart_id'];
        $userslog_obj->updateVal($updateSql);
    } else {
        $insertSql = "INSERT INTO cart_sessions (session_id, product_id, quantity, price)
                      VALUES ('" . $sessionId . "', " . $productId . ", " . $qty . ", " . (float)$productRow[0]['price'] . ")";
        $userslog_obj->insertVal($insertSql);
    }

    header('Location: cart.php');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $cartId = isset($_GET['cart_id']) ? (int)$_GET['cart_id'] : 0;
    if ($cartId > 0) {
        $deleteSql = "DELETE FROM cart_sessions WHERE cart_id = " . $cartId . " AND session_id = '" . $sessionId . "'";
        $userslog_obj->DeleteRec($deleteSql);
    }
    header('Location: cart.php');
    exit;
}

$cartSql = "SELECT c.*, p.product_name, p.image_url, p.price
            FROM cart_sessions c
            LEFT JOIN products p ON p.product_id = c.product_id
            WHERE c.session_id = '" . $sessionId . "'";
$cartItems = $userslog_obj->selectVal($cartSql);

$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += (float)$item['price'] * (int)$item['quantity'];
}

$smarty->assign('cart_items', $cartItems);
$smarty->assign('subtotal', $subtotal);
$smarty->assign('pagetitle', 'Shopping Cart | InviteIndia');
$smarty->assign('metadesc', 'View and manage your shopping cart for wedding sarees and gifts.');
$smarty->assign('header', $smarty->fetch('default/header.tpl'));
$smarty->assign('content', $smarty->fetch('default/store_cart.tpl'));
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));
$smarty->display('default/index.tpl');
?>
