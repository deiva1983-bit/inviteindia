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

class vendor extends ClassGeneral {

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

	
	function selectStateNameById($stateId){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$res = '';
		if ($stateId) {
			$qry_operation = "SELECT tbl_states_master_name FROM `tbl_states_master` where tbl_states_master_id = $stateId and tbl_states_master_status =1";
			$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		
			foreach($get_merchant_select as $key=>$field){
				$res =$field['tbl_states_master_name'];
			}
		}
		$this->db_connect->closedb();
		return $res;
	}
	

	function selectCityNameById($cityId){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$res = '';
		if ($cityId) {
			$qry_operation = "SELECT tbl_city_master_name FROM `tbl_city_master` where tbl_city_master_id = $cityId and tbl_city_master_status =1";
			$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		
			foreach($get_merchant_select as $key=>$field){
				$res =$field['tbl_city_master_name'];
			}
		}
		$this->db_connect->closedb();
		return $res;
	}

	function selectAreaNameById($areaId){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$res = '';
		if ($areaId) {
			$qry_operation = "SELECT tbl_city_area_name FROM `tbl_city_area` where tbl_city_area_id = $areaId";
			$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		
			foreach($get_merchant_select as $key=>$field){
				$res =$field['tbl_city_area_name'];
			}
		}
		$this->db_connect->closedb();
		return $res;
	}

	function selectCatNameById($areaId){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$res = '';
		if ($areaId) {
			$qry_operation = "SELECT * FROM `ven_products` WHERE `pdt_status` = 1 and pdt_auto_id = $areaId";
			$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		
			foreach($get_merchant_select as $key=>$field){
				$res =$field['pdt_products'];
			}
		}
		$this->db_connect->closedb();
		return $res;
	}

	function SeoURL($Cat_name, $State_name, $City_name, $Area_name){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$res = '';
		$res .= $Cat_name != "" ? ucfirst($Cat_name) : 'Wedding services';
		$res .= " in ";
		$res .= $Area_name != "" ? ucfirst($Area_name).',' : '';
		$res .= $City_name != "" ? ucfirst($City_name).',' : '';
		$res .= $State_name != "" ? ucfirst($State_name) : '';
		if($Area_name == "" && $City_name == "" && $State_name == "")
			$res .= "India";
		$res = trim($res);
		$res = str_replace(' ', '-', $res);
		return $res;
	}

	function fetchProdCount($Cat_id, $State_id, $City_id, $Area_id){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		$qry = "select ser_auto_id from tbl_vendor_services where ser_cat_id = $Cat_id and ser_state = $State_id and ser_city  =$City_id and ser_area = $Area_id and ser_status = 1";
		echo $qry;
		$get_select = $this->db_connect->querySelectAffectedrows($qry);
		$this->db_connect->closedb();
		return $get_select;
	}

	function fetchProdCountByState($Cat_id, $State_id){
		//echo $tablename.",".$fieldname.",".$whereCon; exit;
		if($Cat_id != 0)
		$qry = "select ser_auto_id from tbl_vendor_services where ser_cat_id = $Cat_id and ser_state = $State_id and ser_status = 1";
		else
		$qry = "select ser_auto_id from tbl_vendor_services where ser_state = $State_id and ser_status = 1";
		$get_select = $this->db_connect->querySelectAffectedrows($qry);
		$this->db_connect->closedb();
		return $get_select;
	}

	function SeoPageTitle($global_pdt_name, $global_state_name, $global_city_name, $global_area_name){
		$pageTitle='';
		$pageTitle = $global_pdt_name ? $global_pdt_name : 'Wedding planners';
		$pageTitle .= " in ";
		$pageTitle .= $global_area_name ? $global_area_name.", ": '';
		$pageTitle .= $global_city_name ? $global_city_name.", ": '';
		$pageTitle .= $global_state_name ? $global_state_name : 'India';
		if($global_state_name == "")
		$pageTitle .= ' - InviteIndia.com';
		return $pageTitle;
	}

	function SeoPageMetaDesc($global_pdt_name, $global_state_name, $global_city_name, $global_area_name){
		$metaDesc='';
		if($global_pdt_name == '' && $global_state_name == '' && $global_city_name == '' && $global_area_name == ''){
			$metaDesc = "Professional wedding vendors near your location, check reviews, prices and compare with other vendors.";
		} else {
			$metaDesc = "Professional ";
			$metaDesc .= $global_pdt_name ? $global_pdt_name : 'wedding vendors';
			//$metaDesc .= " services "
			if($global_state_name != ''){
			$metaDesc .= " in ";
			$metaDesc .= $global_area_name ? $global_area_name.", ": '';
			$metaDesc .= $global_city_name ? $global_city_name.", ": '';
			$metaDesc .= $global_state_name ? $global_state_name : 'India';
			} else {
			$metaDesc .= " near your location, ";
			}
			$metaDesc .= ". You can check reviews, prices and compare with other vendors.";
		}
		return $metaDesc;
	}

	function SeoPageKeyWords($global_pdt_name, $global_state_name, $global_city_name, $global_area_name){
		$metakey='';
		if($global_pdt_name == '' && $global_state_name == '' && $global_city_name == '' && $global_area_name == ''){
			$metakey = "Professional wedding services, Wedding vendors, Reviews, wedding planners, wedding suppliers.";
		} else {
			$metakey = "Professional ";
			if($global_state_name != ''){
			
			}
			$metakey .= $global_pdt_name ? $global_pdt_name : 'wedding';
			$metakey = " vendors, ";

			$metakey .= $global_pdt_name ? $global_pdt_name : 'wedding';
			$metakey = " vendors, ";


			//$metaDesc .= " services "
			if($global_state_name != ''){
			$metaDesc .= " in ";
			$metaDesc .= $global_area_name ? $global_area_name.", ": '';
			$metaDesc .= $global_city_name ? $global_city_name.", ": '';
			$metaDesc .= $global_state_name ? $global_state_name : 'India';
			} else {
			$metaDesc .= " near your location, ";
			}
			$metaDesc .= ". You can check reviews, prices and compare with other vendors.";
		}
		return $metaDesc;
	}
	
}
?>
