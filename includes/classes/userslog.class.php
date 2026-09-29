<?php
ob_start();
//-------------------------------------------------------------------------------------------------------------------
// File name   : merchants.class.php
// Description : Handles merchants related tasks
// Class Name  : Merchants
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 19-02-2010
// Modified date: 19-02-2010
// ------------------------------------------------------------------------------------------------------------------

class userslog extends ClassGeneral {

		var $db_connect;
		var $tbl_name;
		
	function __construct(){	
		global $glb_obj_genral;
		$this->db_connect = $glb_obj_genral->db_connect;
	}
	// ---------------------------------------------------------------------------------------------------------------
	// function: GetMerchantSelect ( -- arguments -- )
	// ---------------------------------------------------------------------------------------------------------------
	// purpose:		Select the merchants information
	// arguments:		$tablename,$values
	// ---------------------------------------------------------------------------------------------------------------

	
	function selectVal($qry_operation){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		$this->db_connect->closedb();		 
		return $get_merchant_select;	
	}
	// ---------------------------------------------------------------------------------------------------------------
	// function: get_merchant_insert ( -- arguments -- )
	// ---------------------------------------------------------------------------------------------------------------
	// purpose:		Insert the merchants information
	// arguments:		$tablename,$values
	// ---------------------------------------------------------------------------------------------------------------


	function insertVal($qry_operation){
	//echo $tablename.",".$fieldname.",".$fieldval; exit;			
	//$order_list_id = $userslog_obj->queryExecute($inqry);	
		$get_merchant_insert = $this->db_connect->queryExecute($qry_operation);
		$this->db_connect->closedb();
		return $get_merchant_insert;
		 
	}

	function updateVal($qry_operation){
	//echo $tablename.",".$fieldname.",".$fieldval; exit;			
	//$order_list_id = $userslog_obj->queryExecute($inqry);	
		$get_merchant_insert = $this->db_connect->queryExecuteUpdate($qry_operation);
		$this->db_connect->closedb();
		return $get_merchant_insert;
		 
	}
	
	
	// ---------------------------------------------------------------------------------------------------------------
	// function: GetMerchantSelect ( -- arguments -- )
	// ---------------------------------------------------------------------------------------------------------------
	// purpose:		Select the merchants information
	// arguments:		$tablename,$values
	// ---------------------------------------------------------------------------------------------------------------

	
	function selectAffectedRows($qry_operation){	
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		 
		$get_merchant_select = $this->db_connect->querySelectAffectedrows($qry_operation);
		$this->db_connect->closedb();
		return $get_merchant_select;	
	}
	// ---------------------------------------------------------------------------------------------------------------
	// function: GetAllInfo ( -- arguments -- )
	// ---------------------------------------------------------------------------------------------------------------
	// purpose:		Get all information of merchants
	// arguments:		$tablename,$values
	// ---------------------------------------------------------------------------------------------------------------
	function DeleteRec($qry_operation){
	//echo $tablename.",".$wherecon; exit;				
		$get_all_info = $this->db_connect->queryExecuteUpdate($qry_operation);
		$this->db_connect->closedb();
		return $get_all_info;
	}
	// ---------------------------------------------------------------------------------------------------------------
	// function: GetMerchantsList ( -- arguments -- )
	// ---------------------------------------------------------------------------------------------------------------
	// purpose:		Get all information of merchants
	// arguments:		$tablename,$values
	// ---------------------------------------------------------------------------------------------------------------
	function GetMerchantsList($app_qry="",$start="",$limit=""){
	/* echo $app_qry;		*/	
		$get_merchants_list = $this->db_connect->querySelect("CALL uspGet_merchants_list(\"$app_qry\",\"$start\", \"$limit\")");
		$this->db_connect->closedb();
		return $get_merchants_list;
	}
	

	function myTruncate($string, $limit, $break=".", $pad="...") {
		if(strlen($string) <= $limit) return $string;
		if(false !== ($breakpoint = strpos($string, $break, $limit)))
			{ if($breakpoint < strlen($string) - 1) { $string = substr($string, 0, $breakpoint) . $pad; } }
		return $string;
	}

	// Get all addresses for a user
	function getUserAddresses($userId) {
		$sql = "SELECT * FROM customer_addresses WHERE user_id = " . (int)$userId . " ORDER BY is_default DESC, created_at DESC";
		return $this->selectVal($sql);
	}

	// Get single address
	function getAddress($addressId) {
		$sql = "SELECT * FROM customer_addresses WHERE address_id = " . (int)$addressId;
		$result = $this->db_connect->querySelect($sql);
		$this->db_connect->closedb();
		return !empty($result) ? $result[0] : null;
	}

	// Add new address
	function addAddress($userId, $fullName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country = 'India', $isDefault = 0) {
		$sql = "INSERT INTO customer_addresses (user_id, full_name, phone, address_line1, address_line2, city, state, postal_code, country, is_default)
				VALUES (" . (int)$userId . ", '" . addslashes($fullName) . "', '" . addslashes($phone) . "', '" . addslashes($addressLine1) . "', '" . addslashes($addressLine2) . "', '" . addslashes($city) . "', '" . addslashes($state) . "', '" . addslashes($postalCode) . "', '" . addslashes($country) . "', " . (int)$isDefault . ")";
		return $this->insertVal($sql);
	}

	// Update address
	function updateAddress($addressId, $userId, $fullName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country = 'India', $isDefault = 0) {
		$sql = "UPDATE customer_addresses SET
				full_name = '" . addslashes($fullName) . "',
				phone = '" . addslashes($phone) . "',
				address_line1 = '" . addslashes($addressLine1) . "',
				address_line2 = '" . addslashes($addressLine2) . "',
				city = '" . addslashes($city) . "',
				state = '" . addslashes($state) . "',
				postal_code = '" . addslashes($postalCode) . "',
				country = '" . addslashes($country) . "',
				is_default = " . (int)$isDefault . "
				WHERE address_id = " . (int)$addressId . " AND user_id = " . (int)$userId;
		return $this->updateVal($sql);
	}

	// Delete address
	function deleteAddress($addressId, $userId) {
		$sql = "DELETE FROM customer_addresses WHERE address_id = " . (int)$addressId . " AND user_id = " . (int)$userId;
		return $this->DeleteRec($sql);
	}

	// Get user's recent orders
	function getUserOrders($userId, $limit = 10) {
		$sql = "SELECT * FROM orders WHERE user_id = " . (int)$userId . " ORDER BY created_at DESC LIMIT " . (int)$limit;
		return $this->selectVal($sql);
	}

	// Get order details with items
	function getOrderDetails($orderId, $userId) {
		$orderSql = "SELECT * FROM orders WHERE order_id = " . (int)$orderId . " AND user_id = " . (int)$userId;
		$order = $this->db_connect->getOneFromSQL($orderSql);

		if (!$order) return null;

		$itemsSql = "SELECT * FROM order_items WHERE order_id = " . (int)$orderId;
		$items = $this->db_connect->getArrayFromSQL($itemsSql);
		$this->db_connect->closedb();

		$order['items'] = $items;
		return $order;
	}




}
?>
