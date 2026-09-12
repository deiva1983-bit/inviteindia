<?php
include_once('../includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: ../signin.php');
    exit;
}

$userslog_obj = new userslog();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_category'])) {
    $categoryName = trim($_POST['category_name'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $type = trim($_POST['category_type'] ?? 'wedding');
    $status = isset($_POST['status']) ? 1 : 0;

    if ($categoryName != '') {
        if ($slug == '') {
            $slug = strtolower(str_replace(' ', '-', $categoryName));
        }

        $sql = "INSERT INTO categories (category_name, slug, category_type, status) VALUES ('" . addslashes($categoryName) . "', '" . addslashes($slug) . "', '" . addslashes($type) . "', " . $status . ")";
        $userslog_obj->insertVal($sql);
        $smarty->assign('success_msg', 'Category added successfully.');
    } else {
        $smarty->assign('error_msg', 'Category name is required.');
    }
}

$categories = $userslog_obj->selectVal("SELECT * FROM categories ORDER BY sort_order ASC, category_id DESC");

$smarty->assign('categories', $categories);
$smarty->assign('pagetitle', 'Manage Categories | InviteIndia');
$smarty->assign('metadesc', 'Create product categories for the wedding store.');
$smarty->assign('header', $smarty->fetch('../templates/default/header.tpl'));
$smarty->assign('content', $smarty->fetch('../templates/default/store_admin_categories.tpl'));
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl'));
$smarty->display('../templates/default/index.tpl');
?>
