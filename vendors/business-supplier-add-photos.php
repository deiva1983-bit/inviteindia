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

$timestamp = time();
$smarty->assign('tpl_timestamp', $timestamp );

$timestamp_md5  = md5('unique_salt' . $timestamp);
$smarty->assign('tpl_timestamp_md5', $timestamp_md5 );

if ($ven_login_panel == '0'){
header('Location: index-business.php'); exit;
}
$err='';
$doit=trim($_REQUEST['do']);
$page_acc = '';


$chkqry_mas= "SELECT * FROM `tbl_vendor_service` WHERE `tbl_vendor_id` = '".$user_log_id_home."'";
$select_cat_mas= $userslog_obj->selectVal($chkqry_mas);
$smarty->assign('page_access', 'add' );
if (count($select_cat_mas)){
	$smarty->assign('select_general_services', $select_cat_mas );
	$smarty->assign('page_access', 'edit' );
}

$chk_pre_rec= "SELECT * FROM `tbl_vendor_service_details` WHERE `business_info_vendor_id` = '".$user_log_id_home."'";
$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);

$action = count($select_pre_rec) ? "E" : "A";
$action_base_id = $select_pre_rec[0]['business_info_auto_id'];
echo $doit;
if($doit == "man") { echo $doit; echo "first";
	$prod_hidd = trim($_REQUEST['sub_prod_hidd']); echo $prod_hidd; $prod_hidd = "addp";
	if($prod_hidd == 'addp'){
		echo 'ddd'; 
		$service_logo = addslashes(trim($_FILES['uploaded_service_logo']['name']));
		$countfiles = count($_FILES['uploaded_service_logo']['name']);
		echo '<br />scount ->'.$countfiles;
		// Looping all files
			for($i=0;$i<$countfiles;$i++){
				$filename = $_FILES['uploaded_service_logo']['name'][$i];
				echo $filename;
				// Upload file
				//move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
			}



		// insert pdts
		if($action == 'A') {
		$inqry= "INSERT INTO `tbl_vendor_service_details` (`business_info_auto_id`,`business_info_vendor_id`,`business_info_short_desc`,`business_info_long_desc`) VALUES (NULL, '".$user_log_id_home."', '".$service_short_desc."', '".$service_long_desc."')";
		//$lastinsert_id = $userslog_obj->insertVal($inqry);
		} else if ($action == 'E') {
		$upqry= "UPDATE `tbl_vendor_service_details` SET `business_info_short_desc` = '".$service_short_desc."',`business_info_long_desc` = '".$service_long_desc."' WHERE `business_info_auto_id` ='".$action_base_id."' and `business_info_vendor_id` = '".$user_log_id_home."' LIMIT 1 " ;
		//$order_list_id = $userslog_obj->updateVal($upqry);
		}
		//}
		
	}
}

$chk_pre_rec= "SELECT * FROM `tbl_vendor_service_details` WHERE `business_info_vendor_id` = '".$user_log_id_home."'";
$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
$info_short_desc = stripslashes(trim($select_pre_rec[0]['business_info_short_desc']));
$info_long_desc = stripslashes(trim($select_pre_rec[0]['business_info_long_desc']));
$smarty->assign('tpl_info_short_desc', $info_short_desc );
$smarty->assign('tpl_info_long_desc', $info_long_desc );
$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );



$content_template = "$vendors_tpl_path/business-supplier-add-photos.tpl"; 
 


/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch("$vendors_tpl_path/header.tpl") );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch("$vendors_tpl_path/../footer.tpl") );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
