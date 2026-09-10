<?php
// functions.php
function check_txnid($tnxid){
	global $link;
	if (!is_scalar($tnxid)) {
		return true;
	}

	if (is_object($link) && method_exists($link, 'query')) {
		$tnxid = $link->real_escape_string((string)$tnxid);
		$result = $link->query("SELECT * FROM `payments` WHERE txnid = '$tnxid'");
		if ($result && $result->num_rows > 0) {
			return false;
		}
		return true;
	}

	return true;
}

function check_price($price, $id){
    $valid_price = false;
    //you could use the below to check whether the correct price has been paid for the product
    
	/* 
	$sql = mysql_query("SELECT amount FROM `products` WHERE id = '$id'");		
    if (mysql_numrows($sql) != 0) {
		while ($row = mysql_fetch_array($sql)) {
			$num = (float)$row['amount'];
			if($num == $price){
				$valid_price = true;
			}
		}
    }
	return $valid_price;
	*/
	return true;
}

function updatePayments($data){	
    global $link;
	if(is_array($data)){
		if (is_object($link) && method_exists($link, 'query')) {
			$txnId = isset($data['txn_id']) ? $data['txn_id'] : '';
			$paymentAmount = isset($data['payment_amount']) ? $data['payment_amount'] : '';
			$paymentStatus = isset($data['payment_status']) ? $data['payment_status'] : '';
			$itemNumber = isset($data['item_number']) ? $data['item_number'] : '';
			$createdAt = date("Y-m-d H:i:s");

			$qry = "INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES (
				'" . $link->real_escape_string((string)$txnId) . "',
				'" . $link->real_escape_string((string)$paymentAmount) . "',
				'" . $link->real_escape_string((string)$paymentStatus) . "',
				'" . $link->real_escape_string((string)$itemNumber) . "',
				'" . $link->real_escape_string((string)$createdAt) . "'
			)";
			if ($link->query($qry) === true) {
				return $link->insert_id;
			}
		}
	}
	return 0;
}
?>