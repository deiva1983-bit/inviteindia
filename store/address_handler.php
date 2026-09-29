<?php
include_once('../includes/configs/init.php');

if (!isset($_SESSION['sess_user_id']) || trim($_SESSION['sess_user_id']) == '') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

$userId = (int)$_SESSION['sess_user_id'];
$userslog_obj = new userslog();
$action = $_POST['action'] ?? '';

if ($action == 'add') {
    $addressId = $userslog_obj->addAddress(
        $userId,
        $_POST['full_name'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['address_line1'] ?? '',
        $_POST['address_line2'] ?? '',
        $_POST['city'] ?? '',
        $_POST['state'] ?? '',
        $_POST['postal_code'] ?? '',
        $_POST['country'] ?? 'India',
        isset($_POST['is_default']) ? 1 : 0
    );

    if ($addressId) {
        echo json_encode(['success' => true, 'address_id' => $addressId]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to add address']);
    }
    exit;
}

if ($action == 'update') {
    $addressId = (int)$_POST['address_id'] ?? 0;
    $success = $userslog_obj->updateAddress(
        $addressId,
        $userId,
        $_POST['full_name'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['address_line1'] ?? '',
        $_POST['address_line2'] ?? '',
        $_POST['city'] ?? '',
        $_POST['state'] ?? '',
        $_POST['postal_code'] ?? '',
        $_POST['country'] ?? 'India',
        isset($_POST['is_default']) ? 1 : 0
    );

    echo json_encode(['success' => $success ? true : false]);
    exit;
}

if ($action == 'delete') {
    $addressId = (int)$_POST['address_id'] ?? 0;
    $success = $userslog_obj->deleteAddress($addressId, $userId);

    echo json_encode(['success' => $success ? true : false]);
    exit;
}

if ($action == 'get') {
    $addressId = (int)$_POST['address_id'] ?? 0;
    $address = $userslog_obj->getAddress($addressId);

    if ($address) {
        echo json_encode(['success' => true, 'data' => $address]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Address not found']);
    }
    exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid action']);
?>
