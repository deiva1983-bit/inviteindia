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
	

	function myTruncate($string, $limit, $break=".", $pad="...") { // return with no change if string is shorter than $limit 
	
	if(strlen($string) <= $limit) return $string; // is $break present between $limit and the end of the string?
	 if(false !== ($breakpoint = strpos($string, $break, $limit))) 
		{ if($breakpoint < strlen($string) - 1) { $string = substr($string, 0, $breakpoint) . $pad; } } 

	return $string; }







}
?>
