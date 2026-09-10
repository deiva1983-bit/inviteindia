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
header('Location: index-business.php'); exit;
}
$err='';
$doit=trim($_REQUEST['do']);
$page_acc = '';


$chk_buss_serv= "SELECT * FROM `tbl_vendor_service` WHERE `tbl_vendor_id` = '".$user_log_id_home."'";
$select_buss_serv= $userslog_obj->selectVal($chk_buss_serv);
$page_access=0;
if (count($select_buss_serv)) {
	$business_category = stripslashes(trim($select_buss_serv[0]['business_category']));
	$page_access=1;
}
$smarty->assign('tpl_business_category', $business_category );
$smarty->assign('tpl_page_access', $page_access );

//if($doit == "man") {
	$prod_hidd=trim($_REQUEST['sub_prod_hidd']);
		if($business_category == '1'){

			$chk_pre_rec= "SELECT * FROM `ven_service_venue` WHERE `ven_ser_ven_vendors_id` = '".$user_log_id_home."'";
			$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
			$action = count($select_pre_rec) ? "E" : "A";
			$action_base_id = $select_pre_rec[0]['ven_ser_ven_auto_id'];

			$ven_price_veg=addslashes(trim($_REQUEST['price_veg']));
			$ven_price_veg_status=$_REQUEST['price_veg_status'];
			$ven_price_veg_status = ($ven_price_veg_status == 'on') ? "1" : "0";

			$ven_price_non_veg=addslashes(trim($_REQUEST['price_non_veg']));
			$ven_price_non_veg_status=$_REQUEST['price_non_veg_status'];
			$ven_price_non_veg_status = ($ven_price_non_veg_status == 'on') ? "1" : "0";

			$ven_price_per_day=addslashes(trim($_REQUEST['price_per_day']));
			$ven_price_per_day_status=$_REQUEST['price_per_day_status'];
			$ven_price_per_day_status = ($ven_price_per_day_status == 'on') ? "1" : "0";

			if($prod_hidd == 'addp'){
				if($action == 'A') {
					$inqry= "INSERT INTO `ven_service_venue` (`ven_ser_ven_auto_id`,`ven_ser_ven_vendors_id`,`price_veg`,`price_veg_status`,`price_non_veg`,`price_non_veg_status`,`price_per_day`, `price_per_day_status`, `ven_ser_ven_status`) VALUES (NULL, '".$user_log_id_home."', '".$ven_price_veg."', '".$ven_price_veg_status."','".$ven_price_non_veg."', '".$ven_price_non_veg_status."', '".$ven_price_per_day."', '".$ven_price_per_day_status."', '1')";
					$lastinsert_id = $userslog_obj->insertVal($inqry);
					} else if ($action == 'E') {
					$upqry= "UPDATE `ven_service_venue` SET `price_veg` = '".$ven_price_veg."',`price_veg_status` = '".$ven_price_veg_status."',`price_non_veg` = '".$ven_price_non_veg."',`price_non_veg_status` = '".$ven_price_non_veg_status."',`price_per_day` = '".$ven_price_per_day."',`price_per_day_status` = '".$ven_price_per_day_status."'  WHERE `ven_ser_ven_auto_id` ='".$action_base_id."' and `ven_ser_ven_vendors_id` = '".$user_log_id_home."' LIMIT 1 " ;
					$order_list_id = $userslog_obj->updateVal($upqry);
					}
			}

				$chk_pre_rec_v= "SELECT * FROM `ven_service_venue` WHERE `ven_ser_ven_vendors_id` = '".$user_log_id_home."'";
				$select_pre_rec_v= $userslog_obj->selectVal($chk_pre_rec_v);
				$price_veg = stripslashes(trim($select_pre_rec_v[0]['price_veg']));
				$price_veg_status = $select_pre_rec_v[0]['price_veg_status'];
				$price_non_veg = stripslashes(trim($select_pre_rec_v[0]['price_non_veg']));
				$price_non_veg_status = $select_pre_rec_v[0]['price_non_veg_status'];
				$price_per_day = stripslashes(trim($select_pre_rec_v[0]['price_per_day']));
				$price_per_day_status = $select_pre_rec_v[0]['price_per_day_status'];


				$smarty->assign('price_veg_tpl', $price_veg );
				$smarty->assign('price_veg_status_tpl', $price_veg_status );
				$smarty->assign('price_non_veg_tpl', $price_non_veg );
				$smarty->assign('price_non_veg_status_tpl', $price_non_veg_status );
				$smarty->assign('price_per_day_tpl', $price_per_day );
				$smarty->assign('price_per_day_status_tpl', $price_per_day_status );


		}else if ($business_category == '2'){

			$chk_pre_rec= "SELECT * FROM `ven_service_photos` WHERE `ven_ser_pho_vendors_id` = '".$user_log_id_home."'";
			
			$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
			$action = count($select_pre_rec) ? "E" : "A";
			$action_base_id = $select_pre_rec[0]['ven_ser_pho_auto_id'];

			$price_candid_photography=addslashes(trim($_REQUEST['price_candid_photography']));
			$price_candid_photography_status=$_REQUEST['price_candid_photography_status'];
			$price_candid_photography_status = ($price_candid_photography_status == 'on') ? "1" : "0";

			$price_cinematography=addslashes(trim($_REQUEST['price_cinematography']));
			$price_cinematography_status=$_REQUEST['price_cinematography_status'];
			$price_cinematography_status = ($price_cinematography_status == 'on') ? "1" : "0";

			$price_studio_photography=addslashes(trim($_REQUEST['price_studio_photography']));
			$price_studio_photography_status = $_REQUEST['price_studio_photography_status'];
			$price_studio_photography_status = ($price_studio_photography_status == 'on') ? "1" : "0";
	
			$price_pre_wedding_shoot=addslashes(trim($_REQUEST['price_pre_wedding_shoot']));
			$price_pre_wedding_shoot_status = $_REQUEST['price_pre_wedding_shoot_status'];
			$price_pre_wedding_shoot_status = ($price_pre_wedding_shoot_status == 'on') ? "1" : "0";

			$price_photo_package=addslashes(trim($_REQUEST['price_photo_package']));
			$price_photo_package_status = $_REQUEST['price_photo_package_status'];
			$price_photo_package_status = ($price_photo_package_status == 'on') ? "1" : "0";

			$price_video_package=addslashes(trim($_REQUEST['price_video_package']));
			$price_video_package_status = $_REQUEST['price_video_package_status'];
			$price_video_package_status = ($price_video_package_status == 'on') ? "1" : "0";

		$photo_established_year=addslashes(trim($_REQUEST['photo_established_year']));
		$photo_delivery_time=addslashes(trim($_REQUEST['photo_delivery_time']));
		$photo_travel_cost=addslashes(trim($_REQUEST['photo_travel_cost']));
		$photo_status=addslashes(trim($_REQUEST['photo_status']));
		$photo_status = $photo_status == 'on' ? "1" : "0";
		$video_status=addslashes(trim($_REQUEST['video_status']));
		$video_status = $video_status == 'on' ? "1" : "0";
			if($prod_hidd == 'addp'){
				if($action == 'A') {
					$inqry= "INSERT INTO `ven_service_photos` (`ven_ser_pho_auto_id`,`ven_ser_pho_vendors_id`,`price_candid_photography`,`price_candid_photography_status`,`price_cinematography`,`price_cinematography_status`,`price_studio_photography`, `price_studio_photography_status`,`price_pre_wedding_shoot`, `price_pre_wedding_shoot_status`,`price_photo_package`, `price_photo_package_status`,`price_video_package`, `price_video_package_status`,`ven_ser_pho_status`) VALUES (NULL, '".$user_log_id_home."', '".$price_candid_photography."', '".$price_candid_photography_status."','".$price_cinematography."', '".$price_cinematography_status."', '".$price_studio_photography."', '".$price_studio_photography_status."', '".$price_pre_wedding_shoot."', '".$price_pre_wedding_shoot_status."', '".$price_photo_package."', '".$price_photo_package_status."','".$price_video_package."','".$price_video_package_status."', '1')";
					$lastinsert_id = $userslog_obj->insertVal($inqry);
					} else if ($action == 'E') {
					$upqry= "UPDATE `ven_service_photos` SET `price_candid_photography` = '".$price_candid_photography."',`price_candid_photography_status` = '".$price_candid_photography_status."',`price_cinematography` = '".$price_cinematography."',`price_cinematography_status` = '".$price_cinematography_status."',`price_studio_photography` = '".$price_studio_photography."', `price_studio_photography_status` = '".$price_studio_photography_status."', `price_pre_wedding_shoot` = '".$price_pre_wedding_shoot."', `price_pre_wedding_shoot_status` = '".$price_pre_wedding_shoot_status."', `price_photo_package` = '".$price_photo_package."', `price_photo_package_status` = '".$price_photo_package_status."', `price_video_package` = '".$price_video_package."',`price_video_package_status` = '".$price_video_package_status."', ven_ser_pho_status ='1'	WHERE `ven_ser_pho_auto_id` ='".$action_base_id."' and `ven_ser_pho_vendors_id` = '".$user_log_id_home."' LIMIT 1 " ;
					$order_list_id = $userslog_obj->updateVal($upqry);
					}
			}



				$chk_pre_rec_p= "SELECT * FROM `ven_service_photos` WHERE `ven_ser_pho_vendors_id` = '".$user_log_id_home."'";
				$select_pre_rec_p= $userslog_obj->selectVal($chk_pre_rec_p);
				$price_candid_photography = stripslashes(trim($select_pre_rec_p[0]['price_candid_photography']));
				$price_candid_photography_status = $select_pre_rec_p[0]['price_candid_photography_status'];
				$price_cinematography = stripslashes(trim($select_pre_rec_p[0]['price_cinematography']));
				$price_cinematography_status = $select_pre_rec_p[0]['price_cinematography_status'];
				$price_studio_photography = stripslashes(trim($select_pre_rec_p[0]['price_studio_photography']));
				$price_studio_photography_status = $select_pre_rec_p[0]['price_studio_photography_status'];
				$price_pre_wedding_shoot = stripslashes(trim($select_pre_rec_p[0]['price_pre_wedding_shoot']));
				$price_pre_wedding_shoot_status = $select_pre_rec_p[0]['price_pre_wedding_shoot_status'];
				$price_photo_package = stripslashes(trim($select_pre_rec_p[0]['price_photo_package']));
				$price_photo_package_status = $select_pre_rec_p[0]['price_photo_package_status'];
				$price_video_package = stripslashes(trim($select_pre_rec_p[0]['price_video_package']));
				$price_video_package_status = $select_pre_rec_p[0]['price_video_package_status'];



				
				$smarty->assign('price_candid_photography_tpl', $price_candid_photography );
				$smarty->assign('price_candid_photography_status_tpl', $price_candid_photography_status );
				$smarty->assign('price_cinematography_tpl', $price_cinematography );
				$smarty->assign('price_cinematography_status_tpl', $price_cinematography_status );
				$smarty->assign('price_studio_photography_tpl', $price_studio_photography );
				$smarty->assign('price_studio_photography_status_tpl', $price_studio_photography_status );

				$smarty->assign('price_pre_wedding_shoot_tpl', $price_pre_wedding_shoot );
				$smarty->assign('price_pre_wedding_shoot_status_tpl', $price_pre_wedding_shoot_status );
				$smarty->assign('price_photo_package_tpl', $price_photo_package );
				$smarty->assign('price_photo_package_status_tpl', $price_photo_package_status );
				$smarty->assign('price_video_package_tpl', $price_video_package );
				$smarty->assign('price_video_package_status_tpl', $price_video_package_status );



		}
		
		// insert pdts

		//}
		$chk_pre_rec= "SELECT * FROM `ven_service_photos` WHERE `ven_ser_pho_vendors_id` = '".$user_log_id_home."'";
		$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
		$established = stripslashes(trim($select_pre_rec[0]['established']));
		$delivery_time =($select_pre_rec[0]['delivery_time']); echo $delivery_time;
		$travel_cost = stripslashes(trim($select_pre_rec[0]['travel_cost']));
		$service_offer_photo = stripslashes(trim($select_pre_rec[0]['service_offer_photo']));
		$service_offer_video = stripslashes(trim($select_pre_rec[0]['service_offer_video']));
		$smarty->assign('tpl_established', $established );  echo $established;
		$smarty->assign('tpl_delivery_time', $delivery_time );
		$smarty->assign('tpl_travel_cost', $travel_cost );
		$smarty->assign('tpl_service_offer_photo', $service_offer_photo );
		$smarty->assign('tpl_service_offer_video', $service_offer_video );



$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );



$content_template = "$vendors_tpl_path/business-supplier-add-price.tpl"; 
 


/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch("$vendors_tpl_path/header.tpl") );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch("$vendors_tpl_path/../footer.tpl") );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
