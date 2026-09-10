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
		if($business_category == '1'){ // Vendors

			if($prod_hidd == 'addp'){
			}

			$chk_pre_rec= "SELECT * FROM `ven_service_venue` WHERE `ven_ser_ven_vendors_id` = '".$user_log_id_home."'";
			$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
			$action = count($select_pre_rec) ? "E" : "A";
			$action_base_id = $select_pre_rec[0]['ven_ser_ven_auto_id'];

			$ven_established_year=addslashes(trim($_REQUEST['ven_established_year']));
			$ven_head_cnt=addslashes(trim($_REQUEST['ven_allowed_head']));
			$ven_space_details=addslashes(trim($_REQUEST['ven_space_details']));
			$ven_room_count=addslashes(trim($_REQUEST['ven_room_count']));
			$ven_room_starting_price=addslashes(trim($_REQUEST['ven_room_starting_price']));
			$ven_catering_policy=addslashes(trim($_REQUEST['ven_catering_policy']));
			$ven_decor_policy=addslashes(trim($_REQUEST['ven_decor_policy']));
			$ven_dj_policy=addslashes(trim($_REQUEST['ven_dj_policy']));
			$ven_alcohol_policy=addslashes(trim($_REQUEST['ven_alcohol_policy']));


			if($prod_hidd == 'addp'){
				if($action == 'A') {
					$inqry= "INSERT INTO `ven_service_venue` (`ven_ser_ven_auto_id`,`ven_ser_ven_vendors_id`,`established`,`head_count`,`space`,`room_count`,`room_starting_price`, `catering_policy`,`decor_policy`,`dj_policy`,`alcohol_policy`,`ven_ser_ven_status`) VALUES (NULL, '".$user_log_id_home."', '".$ven_established_year."', '".$ven_head_cnt."','".$ven_space_details."', '".$ven_room_count."', '".$ven_room_starting_price."', '".$ven_catering_policy."', '".$ven_decor_policy."', '".$ven_dj_policy."', '".$ven_alcohol_policy."', '1')";
					$lastinsert_id = $userslog_obj->insertVal($inqry);
					} else if ($action == 'E') {
					$upqry= "UPDATE `ven_service_venue` SET `established` = '".$ven_established_year."',`head_count` = '".$ven_head_cnt."',`space` = '".$ven_space_details."',`room_count` = '".$ven_room_count."',`room_starting_price` = '".$ven_room_starting_price."',`catering_policy` = '".$ven_catering_policy."',`decor_policy` = '".$ven_decor_policy."',`dj_policy` = '".$ven_dj_policy."',`alcohol_policy` = '".$ven_alcohol_policy."' WHERE `ven_ser_ven_auto_id` ='".$action_base_id."' and `ven_ser_ven_vendors_id` = '".$user_log_id_home."' LIMIT 1 " ;
					$order_list_id = $userslog_obj->updateVal($upqry);
					}
			}

		
		}else if ($business_category == '2'){  // Photos
		$chk_pre_rec= "SELECT * FROM `ven_service_photos` WHERE `ven_ser_pho_vendors_id` = '".$user_log_id_home."'";
		$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
		$action = count($select_pre_rec) ? "E" : "A";
		$action_base_id = $select_pre_rec[0]['ven_ser_pho_auto_id'];

		$photo_established_year=addslashes(trim($_REQUEST['photo_established_year']));
		$photo_delivery_time=addslashes(trim($_REQUEST['photo_delivery_time']));
		$photo_travel_cost=addslashes(trim($_REQUEST['photo_travel_cost']));
		$photo_status=addslashes(trim($_REQUEST['photo_status']));
		$photo_status = $photo_status == 'on' ? "1" : "0";
		$video_status=addslashes(trim($_REQUEST['video_status']));
		$video_status = $video_status == 'on' ? "1" : "0";
			if($prod_hidd == 'addp'){
				if($action == 'A') {
					$inqry= "INSERT INTO `ven_service_photos` (`ven_ser_pho_auto_id`,`ven_ser_pho_vendors_id`,`established`,`delivery_time`,`travel_cost`,`service_offer_photo`,`service_offer_video`, `ven_ser_pho_status`) VALUES (NULL, '".$user_log_id_home."', '".$photo_established_year."', '".$photo_delivery_time."','".$photo_travel_cost."', '".$photo_status."', '".$video_status."', '1')";
					echo $inqry; exit;
					$lastinsert_id = $userslog_obj->insertVal($inqry);
					} else if ($action == 'E') {
					$upqry= "UPDATE `ven_service_photos` SET `established` = '".$photo_established_year."',`delivery_time` = '".$photo_delivery_time."',`travel_cost` = '".$photo_travel_cost."',`service_offer_photo` = '".$photo_status."',`service_offer_video` = '".$video_status."' WHERE `ven_ser_pho_auto_id` ='".$action_base_id."' and `ven_ser_pho_vendors_id` = '".$user_log_id_home."' LIMIT 1 " ;
					$order_list_id = $userslog_obj->updateVal($upqry);
					}
			}
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

		$chk_pre_rec_v= "SELECT * FROM `ven_service_venue` WHERE `ven_ser_ven_vendors_id` = '".$user_log_id_home."'";
		$select_pre_rec_v= $userslog_obj->selectVal($chk_pre_rec_v);
		$established_v = stripslashes(trim($select_pre_rec_v[0]['established']));
		$head_count = stripslashes(trim($select_pre_rec_v[0]['head_count']));
		$space = stripslashes(trim($select_pre_rec_v[0]['space']));
		$room_count = stripslashes(trim($select_pre_rec_v[0]['room_count']));
		$room_starting_price = stripslashes(trim($select_pre_rec_v[0]['room_starting_price']));
		$catering_policy = stripslashes(trim($select_pre_rec_v[0]['catering_policy']));
		$decor_policy = stripslashes(trim($select_pre_rec_v[0]['decor_policy']));
		$dj_policy = stripslashes(trim($select_pre_rec_v[0]['dj_policy']));
		$alcohol_policy = stripslashes(trim($select_pre_rec_v[0]['alcohol_policy']));
		$catering_policy = stripslashes(trim($select_pre_rec_v[0]['catering_policy']));
		$smarty->assign('vtpl_established', $established_v );
		$smarty->assign('vtpl_head', $head_count );
		$smarty->assign('vtpl_space', $space );
		$smarty->assign('vtpl_room_count', $room_count );
		$smarty->assign('vtpl_room_starting_price', $room_starting_price );
		$smarty->assign('vtpl_catering_policy', $catering_policy );
		$smarty->assign('vtpl_decor_policy', $decor_policy );
		$smarty->assign('vtpl_dj_policy', $dj_policy );
		$smarty->assign('vtpl_alcohol_policy', $alcohol_policy );

$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );



$content_template = "$vendors_tpl_path/business-supplier-add-gen-serv.tpl"; 
 


/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch("$vendors_tpl_path/header.tpl") );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch("$vendors_tpl_path/../footer.tpl") );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
