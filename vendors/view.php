<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
/*----- Object creation End -----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('topnav_select', 'vendors');
$smarty->assign('currentpage_js', 'vendors_pdts');
$smarty->assign('pagetitle', 'Indian Wedding Vendors, Indian Wedding suppliers - inviteindia.com');
$smarty->assign('metadesc', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products');
$smarty->assign('metakeywords', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products'); 
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id_home= trim($_SESSION['sess_ven_user_id']);
$ven_login_panel= trim($user_log_id_home) != "" ? 1 : 0; 
$smarty->assign('user_log_id_vend', $ven_login_panel);
if ($ven_login_panel == '0'){
//header('Location: login.php'); exit;
}
//state_id=8&city_id=117
$err='';
$req_pdtid=trim($_REQUEST['pdtid']);
$req_from=trim($_REQUEST['from']);
if(trim($_REQUEST['ur']) != '') {
	$backlink=base64_decode(trim($_REQUEST['ur']));
}
$rec_found=0;$sqryval_de='';$page_title='';$cont_p=''; $keyw='';
if ($req_from == 'res' or $req_from == 'adm') {
	$select_services_qry = "SELECT * FROM `tbl_vendor_services` where ser_auto_id = $req_pdtid";
	//ser_area
	$services_qry= $userslog_obj->selectVal($select_services_qry);
	if(count($services_qry)){
	$smarty->assign('searchrecs', $services_qry );
	$serarea = $services_qry[0]['ser_area'];
	$servicename = $services_qry[0]['ser_service_name'];
	$serstate = $services_qry[0]['ser_state'];
	$sercity = $services_qry[0]['ser_city'];
	$user_name = $services_qry[0]['ser_user_name'];
	$ser_mobno = $services_qry[0]['ser_mobno'];
	if($user_name != '')
	$cont_p = "Contact person: $user_name";
	if($ser_mobno != '')
	$cont_p .= ", Contact number: $ser_mobno";
	//$ur = $services_qry[0]['ur'];
	$addrss_add='';
	
	$keyw = "$servicename services, ";
	if ($serarea != '' and $serarea != 0) {
	$select_city_qry = "SELECT tbl_city_area_name FROM `tbl_city_area` where tbl_city_area_id = $serarea";
	$city_qry= $userslog_obj->selectVal($select_city_qry);
	$area_name = $city_qry[0]['tbl_city_area_name'];
	if($area_name != '')
		$addrss_add .= $area_name.', ';
		$keyw .= "$servicename in $area_name, ";
	}

	if ($sercity != '' and $sercity != 0) {
	$select_city_qry = "SELECT tbl_city_master_name FROM `tbl_city_master` where tbl_city_master_id = $sercity";
	$city_qry= $userslog_obj->selectVal($select_city_qry);
	$city_val = $city_qry[0]['tbl_city_master_name'];
	if($city_val != '') {
		$addrss_add .= $city_val.', ';
		$keyw .= "$servicename in $city_val, ";
		}
	}
	

	if ($serstate != '' and $serstate != 0) {
	$select_states_qry = "SELECT tbl_states_master_name FROM `tbl_states_master` where tbl_states_master_id = $serstate";
	$states_qry= $userslog_obj->selectVal($select_states_qry);
	$states_val = $states_qry[0]['tbl_states_master_name'];
	if($states_val != ''){
		$addrss_add .= $states_val.'. ';
		$keyw .= "$servicename in $states_val";
		}
	}
	$smarty->assign('tmpl_addrss_add', $addrss_add );
	$rec_found=1;

	$page_title = "$servicename in $addrss_add";
	$smarty->assign('pagetitle', $page_title);
	$page_desc = "$servicename in $addrss_add. $cont_p";
	$smarty->assign('metadesc', $page_desc);
	$smarty->assign('metakeywords', $keyw);
	}else{
	$rec_found=0;
	}
	//echo $states_qry;
}

//$select_services_qry = "SELECT a.ser_auto_id, a.ser_service_name, a.ser_desc, a.ser_address_1, a.ser_address_2, a.ser_user_name, a.ser_cat_id , a.ser_state, a.ser_city, a.ser_area, a.ser_landmark, a.ser_pincode, a.ser_phno, a.ser_mobno, b.tbl_states_master_name FROM `tbl_vendor_services` a, `tbl_states_master` b where a.ser_status = 1 and b.tbl_states_master_id = a.ser_state and ";
//SELECT a.ser_service_name, a.ser_desc, a.ser_address_1, a.ser_address_2, a.ser_user_name, a.ser_cat_id , a.ser_state, a.ser_city, a.ser_area, a.ser_landmark, a.ser_pincode, a.ser_phno, a.ser_mobno, b.tbl_states_master_name FROM `tbl_vendor_services` a, `tbl_states_master` b where b.tbl_states_master_id = a.ser_state and ser_state = 28 and ser_city = 469 and ser_area = 253 and ser_cat_id = 5 and ser_status = 1 

$smarty->assign('back_uri', $backlink );
$smarty->assign('tot_breadcramps', $breadcramps );
$smarty->assign('tot_rec_found', $rec_found );
// Fetch Services from Database  - End
$smarty->assign('top_nav', $smarty->fetch('../templates/default/vendors/topnav.tpl') );
$smarty->assign('glb_selecity_left', $selecity_left);

$content_template = '../templates/default/vendors/viewinfo.tpl';
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
