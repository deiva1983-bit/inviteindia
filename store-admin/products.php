<?php
include_once('../includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: ../signin.php');
    exit;
}

$userslog_obj = new userslog();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_product'])) {
    $categoryId = (int)($_POST['category_id'] ?? 0);
    $productName = trim($_POST['product_name'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $salePrice = isset($_POST['sale_price']) && $_POST['sale_price'] !== '' ? (float)$_POST['sale_price'] : 'NULL';
    $stockQty = (int)($_POST['stock_qty'] ?? 0);
    $sku = trim($_POST['sku'] ?? '');
    $fabric = trim($_POST['fabric'] ?? '');
    $color = trim($_POST['color'] ?? '');
    $occasion = trim($_POST['occasion'] ?? '');
    $status = isset($_POST['status']) ? 1 : 0;
    $featured = isset($_POST['is_featured']) ? 1 : 0;
    $description = trim($_POST['description'] ?? '');

    if ($categoryId > 0 && $productName != '' && $price > 0) {
        if ($slug == '') {
            $slug = strtolower(str_replace(' ', '-', $productName));
        }

        $salePriceSql = ($salePrice === 'NULL') ? 'NULL' : (string)$salePrice;

        $sql = "INSERT INTO products (category_id, product_name, slug, short_description, description, price, sale_price, stock_qty, sku, fabric, color, occasion, is_featured, status, payment_methods)
                VALUES (" . $categoryId . ", '" . addslashes($productName) . "', '" . addslashes($slug) . "', '" . addslashes($productName) . "', '" . addslashes($description) . "', " . $price . ", " . $salePriceSql . ", " . $stockQty . ", '" . addslashes($sku) . "', '" . addslashes($fabric) . "', '" . addslashes($color) . "', '" . addslashes($occasion) . "', " . $featured . ", " . $status . ", 'ccavenue,paypal')";

        $userslog_obj->insertVal($sql);
        $smarty->assign('success_msg', 'Product added successfully.');
    } else {
        $smarty->assign('error_msg', 'Please fill required product fields.');
    }
}

$categorySql = "SELECT * FROM categories ORDER BY sort_order ASC, category_id DESC";
$categories = $userslog_obj->selectVal($categorySql);

$products = $userslog_obj->selectVal("SELECT p.*, c.category_name FROM products p LEFT JOIN categories c ON c.category_id = p.category_id ORDER BY p.product_id DESC LIMIT 100");

$smarty->assign('categories', $categories);
$smarty->assign('products', $products);
$smarty->assign('pagetitle', 'Manage Products | InviteIndia');
$smarty->assign('metadesc', 'Add, edit and list products for the store.');
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_admin_products.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
