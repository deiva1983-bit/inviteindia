<?php
include_once('../includes/configs/init.php');

$userslog_obj = new userslog();

$categorySlug = trim($_GET['cat'] ?? '');
$categoryWhere = "status = 1";
if ($categorySlug != '') {
    $categoryWhere = "slug = '" . mysqli_real_escape_string($userslog_obj->db_connect->socket, $categorySlug) . "' AND status = 1";
}

$categorySql = "SELECT * FROM categories WHERE " . $categoryWhere . " LIMIT 1";
$categoryRow = $userslog_obj->selectVal($categorySql);

if (!$categoryRow || !count($categoryRow)) {
    $categoryRow = array(array(
        'category_name' => 'Shop All Products',
        'slug' => 'all',
        'category_type' => 'wedding'
    ));
}

$selectedCategoryId = 0;
if (isset($categoryRow[0]['category_id'])) {
    $selectedCategoryId = (int)$categoryRow[0]['category_id'];
}

$productSql = "SELECT * FROM products WHERE status = 1";
if ($selectedCategoryId > 0) {
    $productSql .= " AND category_id = " . $selectedCategoryId;
}
$productSql .= " ORDER BY is_featured DESC, product_id DESC";

$products = $userslog_obj->selectVal($productSql);

$smarty->assign('category', $categoryRow[0]);
$smarty->assign('products', $products);
$smarty->assign('pagetitle', ($selectedCategoryId > 0 ? $categoryRow[0]['category_name'] : 'Shop Products') . ' | InviteIndia');
$smarty->assign('metadesc', 'Shop wedding sarees, bridal collections, gifting ideas, and accessories from InviteIndia.');
$smarty->assign('metakeywords', 'wedding sarees, bridal sarees, designer sarees, wedding gifts, accessories');
$smarty->assign('show_cart_global', 1);
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_products.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
