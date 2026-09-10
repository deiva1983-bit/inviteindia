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

class cover extends ClassGeneral {

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
	 





}
?>
