<?php
include_once('../includes/configs/init.php');

$userslog_obj = new userslog();
$sessionId = session_id();

// detect AJAX requests
$isAjax = false;
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $isAjax = true;
} elseif (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
    $isAjax = true;
} elseif (isset($_GET['ajax']) && $_GET['ajax']) {
    $isAjax = true;
}

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
    if ($productId <= 0 || $qty <= 0) {
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Invalid product or quantity'));
            exit;
        }
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

    if ($isAjax) {
        // compute current cart count
        $countSql = "SELECT SUM(quantity) as total_qty FROM cart_sessions WHERE session_id = '" . $sessionId . "'";
        $countRow = $userslog_obj->selectVal($countSql);
        $totalQty = 0;
        if ($countRow && isset($countRow[0]['total_qty'])) {
            $totalQty = (int)$countRow[0]['total_qty'];
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => true, 'cart_count' => $totalQty));
        exit;
    }

    header('Location: cart.php');
    exit;
}

// AJAX: return current cart count
if (isset($_GET['action']) && $_GET['action'] == 'count') {
    $countSql = "SELECT SUM(quantity) as total_qty FROM cart_sessions WHERE session_id = '" . $sessionId . "'";
    $countRow = $userslog_obj->selectVal($countSql);
    $totalQty = 0;
    if ($countRow && isset($countRow[0]['total_qty'])) {
        $totalQty = (int)$countRow[0]['total_qty'];
    }
    header('Content-Type: application/json');
    echo json_encode(array('success' => true, 'cart_count' => $totalQty));
    exit;
}

// AJAX: return preview of cart items (for mini-cart dropdown)
if (isset($_GET['action']) && $_GET['action'] == 'preview') {
    $cartSql = "SELECT c.cart_id, c.product_id, c.quantity, c.price, p.product_name, p.image_url
                FROM cart_sessions c
                LEFT JOIN products p ON p.product_id = c.product_id
                WHERE c.session_id = '" . $sessionId . "'";
    $items = $userslog_obj->selectVal($cartSql);
    $totalQty = 0;
    $subtotal = 0.0;
    $outItems = array();
    if ($items && count($items)) {
        foreach ($items as $it) {
            $qty = (int)$it['quantity'];
            $price = (float)$it['price'];
            $totalQty += $qty;
            $subtotal += $price * $qty;
            $outItems[] = array(
                'cart_id' => (int)$it['cart_id'],
                'product_id' => (int)$it['product_id'],
                'product_name' => $it['product_name'],
                'image_url' => $it['image_url'],
                'quantity' => $qty,
                'price' => $price
            );
        }
    }
    header('Content-Type: application/json');
    echo json_encode(array('success' => true, 'cart_count' => $totalQty, 'subtotal' => $subtotal, 'items' => $outItems));
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $cartId = isset($_GET['cart_id']) ? (int)$_GET['cart_id'] : 0;
    if ($cartId > 0) {
        $deleteSql = "DELETE FROM cart_sessions WHERE cart_id = " . $cartId . " AND session_id = '" . $sessionId . "'";
        $userslog_obj->DeleteRec($deleteSql);
    }
    if ($isAjax) {
        // return updated count and subtotal
        $cartSql = "SELECT SUM(quantity) as total_qty, SUM(quantity * price) as subtotal FROM cart_sessions WHERE session_id = '" . $sessionId . "'";
        $countRow = $userslog_obj->selectVal($cartSql);
        $totalQty = 0; $subtotal = 0.0;
        if ($countRow && isset($countRow[0]['total_qty'])) { $totalQty = (int)$countRow[0]['total_qty']; }
        if ($countRow && isset($countRow[0]['subtotal'])) { $subtotal = (float)$countRow[0]['subtotal']; }
        header('Content-Type: application/json');
        echo json_encode(array('success' => true, 'cart_count' => $totalQty, 'subtotal' => $subtotal));
        exit;
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
$smarty->assign('show_cart_global', 1);
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_cart.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
