<?php
include_once('includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    header('Location: signin.php');
    exit;
}

$userId = (int)$_SESSION['sess_user_id'];
$userslog_obj = new userslog();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_address'])) {
    $fullName = trim($_POST['full_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address1 = trim($_POST['address_line1'] ?? '');
    $address2 = trim($_POST['address_line2'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $state = trim($_POST['state'] ?? '');
    $postalCode = trim($_POST['postal_code'] ?? '');
    $country = trim($_POST['country'] ?? 'India');
    $isDefault = isset($_POST['is_default']) ? 1 : 0;

    if ($fullName != '' && $address1 != '' && $city != '' && $state != '') {
        $defaultSql = "SELECT * FROM customer_addresses WHERE user_id = " . $userId . " AND is_default = 1 LIMIT 1";
        $defaultAddress = $userslog_obj->selectVal($defaultSql);

        if ($isDefault || !$defaultAddress || !count($defaultAddress)) {
            $isDefault = 1;
        }

        $sql = "INSERT INTO customer_addresses (user_id, full_name, phone, address_line1, address_line2, city, state, postal_code, country, is_default)
                VALUES (" . $userId . ", '" . addslashes($fullName) . "', '" . addslashes($phone) . "', '" . addslashes($address1) . "', '" . addslashes($address2) . "', '" . addslashes($city) . "', '" . addslashes($state) . "', '" . addslashes($postalCode) . "', '" . addslashes($country) . "', " . $isDefault . ")";

        $userslog_obj->insertVal($sql);

        if ($isDefault) {
            $resetSql = "UPDATE customer_addresses SET is_default = 0 WHERE user_id = " . $userId . " AND address_id != LAST_INSERT_ID()";
            $userslog_obj->updateVal($resetSql);
        }

        $smarty->assign('success_msg', 'Address saved successfully.');
    } else {
        $smarty->assign('error_msg', 'Please complete all required fields.');
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $addressId = (int)($_GET['id'] ?? 0);
    if ($addressId > 0) {
        $delSql = "DELETE FROM customer_addresses WHERE address_id = " . $addressId . " AND user_id = " . $userId;
        $userslog_obj->DeleteRec($delSql);
        $smarty->assign('success_msg', 'Address removed successfully.');
    }
}

$addressSql = "SELECT * FROM customer_addresses WHERE user_id = " . $userId . " ORDER BY is_default DESC, address_id DESC";
$addresses = $userslog_obj->selectVal($addressSql);

$smarty->assign('addresses', $addresses);
$smarty->assign('pagetitle', 'Address Book | InviteIndia');
$smarty->assign('metadesc', 'Manage your saved delivery addresses securely.');
$smarty->assign('header', $smarty->fetch('default/header.tpl'));
$smarty->assign('content', $smarty->fetch('default/store_address_book.tpl'));
$smarty->assign('footer', $smarty->fetch('default/footer.tpl'));
$smarty->display('default/index.tpl');
?>
