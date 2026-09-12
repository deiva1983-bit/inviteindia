<?php
include_once('../includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: ../signin.php');
    exit;
}

$userslog_obj = new userslog();

$categorySql = "SELECT * FROM categories ORDER BY sort_order ASC, category_id DESC";
$categories = $userslog_obj->selectVal($categorySql);

$productSql = "SELECT p.*, c.category_name FROM products p LEFT JOIN categories c ON c.category_id = p.category_id ORDER BY p.product_id DESC LIMIT 100";
$products = $userslog_obj->selectVal($productSql);

$smarty->assign('categories', $categories);
$smarty->assign('products', $products);
$smarty->assign('pagetitle', 'Store Admin | InviteIndia');
$smarty->assign('metadesc', 'Manage products and categories for the wedding store.');
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_admin_dashboard.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
