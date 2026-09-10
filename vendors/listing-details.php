<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
$vendor_obj = new vendor();
/*----- Object creation End -----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('topnav_select', 'vendors');
$smarty->assign('currentpage_js', 'vendors_pdts');
$smarty->assign('pagetitle', 'wedding planners in india - InviteIndia.com');
$smarty->assign('metadesc', 'Find your wedding vendors with trusted reviews and organize your perfect wedding.');
$smarty->assign('metakeywords', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products'); 
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id_home= trim($_SESSION['sess_ven_user_id']);
$ven_login_panel= trim($user_log_id_home) != "" ? 1 : 0; 
$smarty->assign('user_log_id_vend', $ven_login_panel);


$req_id = trim($_REQUEST['id']);


$search_qry= "SELECT * FROM `tbl_vendor_service` where tbl_vendor_id = '$req_id'";
$search_pdts= $userslog_obj->selectVal($search_qry);
$combine_addr = '';
	if (count($search_pdts)){
	foreach($search_pdts as $key=>$field){		
		$business_name= $field['business_name'];
		$business_email_address= $field['business_email_address'];

		$business_website_url= $field['business_website_url'];
		$business_phone_number= $field['business_phone_number'];
		$business_phone_alternate_number= $field['business_phone_alternate_number'];		
		$ser_city= $field['business_city_id'];
		$state_id= $field['business_state_id'];
		$business_address1= trim($field['business_address1']);
		$business_address2= trim($field['business_address2']);
		$business_postal= trim($field['business_postal']);
		$business_profile_pic= trim($field['business_profile_pic']);
		$business_cat= trim($field['business_category']);
		if(!$business_profile_pic) {
		$business_profile_pic = 'assets/cover_default_'.$business_cat.'.jpg';
		}
		$business_profile_pic .= "?id=".rand(10,100);
		

		$sqry_city = "SELECT tbl_city_master_name FROM `tbl_city_master` where tbl_city_master_id = $ser_city";
		if($sqry_city) {
		$sqry_city= $userslog_obj->selectVal($sqry_city);
		$citynames = trim($sqry_city[0]['tbl_city_master_name']);
		}
		
		$sqry_state = "SELECT tbl_states_master_name FROM `tbl_states_master` where tbl_states_master_id = $state_id";
		if($state_id) {
		$sqry_city= $userslog_obj->selectVal($sqry_state);
		$statename = trim($sqry_city[0]['tbl_states_master_name']);
		}

		if ($business_address1 != '')
		$combine_addr .= $business_address1 .', ';
		if ($business_address2 != '')
		$combine_addr .= $business_address2 .', ';

		if ($citynames != '')
		$combine_addr .= $citynames .', ';

		if ($statename != '')
		$combine_addr .= $statename;

		if ($business_postal != '')
		$combine_addr .= ' - '.$business_postal;

		$smarty->assign('tpl_business_name', $business_name);
		$smarty->assign('tpl_business_email_address', $business_email_address);
		$smarty->assign('tpl_business_website_url', $business_website_url);
		$smarty->assign('tpl_business_phone_number', $business_phone_number);
		$smarty->assign('tpl_business_phone_alternate_number', $business_phone_alternate_number);
	}
	}

	$vendor_service_details_qry= "SELECT * FROM `tbl_vendor_service_details` where business_info_vendor_id = '$req_id'";
	$vendor_service_details = $userslog_obj->selectVal($vendor_service_details_qry);
	if (count($vendor_service_details)){
		foreach($vendor_service_details as $key=>$field){
		$short_desc= $field['business_info_short_desc'];
		$long_desc= $field['business_info_long_desc'];
		}
	}
	$sub_head_1='';
	$sub_head_2='';
	$sub_head_3='';
	$sub_head_4='';
	$show_price_panel = 0;
	if($business_cat == 1){ // venue

			$sub_head_1= 'for Venue Hire';
			$vendor_service_details_qry= "SELECT * FROM `ven_service_venue` where ven_ser_ven_vendors_id = '$req_id'";
			$vendor_service_details = $userslog_obj->selectVal($vendor_service_details_qry);
			if (count($vendor_service_details)){
				foreach($vendor_service_details as $key=>$field){
				$head_count= $field['head_count'];
				$room_count= $field['room_count'];
				$established= $field['established'];

				
				$price_veg= $field['price_veg'];
				$price_veg_status= $field['price_veg_status'];
				$price_non_veg= $field['price_non_veg'];
				$price_non_veg_status= $field['price_non_veg_status'];
				$price_per_day= $field['price_per_day'];
				$price_per_day_status= $field['price_per_day_status'];
				if ($price_veg_status || $price_non_veg_status || $price_per_day_status)
				$show_price_panel = 1;
				$catering_policy= $field['catering_policy'];
				$decor_policy= $field['decor_policy'];
				$dj_policy= $field['dj_policy'];
				$alcohol_policy= $field['alcohol_policy'];
				
				
					
				
				}
				$smarty->assign('tpl_head_count', $head_count);
				$smarty->assign('tpl_room_count', $room_count);
				$smarty->assign('tpl_established', $established);

				$smarty->assign('tpl_price_veg', $price_veg);
				$smarty->assign('tpl_price_veg_status', $price_veg_status);
				$smarty->assign('tpl_price_non_veg', $price_non_veg);
				$smarty->assign('tpl_price_non_veg_status', $price_non_veg_status);
				$smarty->assign('tpl_price_per_day', $price_per_day);
				$smarty->assign('tpl_price_per_day_status', $price_per_day_status);

				$smarty->assign('tpl_catering_policy', $catering_policy);
				$smarty->assign('tpl_decor_policy', $decor_policy);
				$smarty->assign('tpl_dj_policy', $dj_policy);
				$smarty->assign('tpl_alcohol_policy', $alcohol_policy);
			}

	$content_template = "$vendors_tpl_path/listing-details-venue.tpl"; // 14
	}elseif($business_cat == 2){ // Photo
			$sub_head_1= 'for Photographers Hire';
			$vendor_service_details_qry= "SELECT * FROM ven_service_photos where ven_ser_pho_vendors_id = '$req_id'";
			$vendor_service_details = $userslog_obj->selectVal($vendor_service_details_qry);
			if (count($vendor_service_details)){
				foreach($vendor_service_details as $key=>$field){
				$delivery_time= $field['delivery_time'];
				$established= $field['established'];

				$price_candid_photography= $field['price_candid_photography'];
				$price_candid_photography_status= $field['price_candid_photography_status'];

				$price_cinematography= $field['price_cinematography'];
				$price_cinematography_status= $field['price_cinematography_status'];

				$price_studio_photography= $field['price_studio_photography'];
				$price_studio_photography_status= $field['price_studio_photography_status'];

				$price_pre_wedding_shoot= $field['price_pre_wedding_shoot'];
				$price_pre_wedding_shoot_status= $field['price_pre_wedding_shoot_status'];

				$price_photo_package= $field['price_photo_package'];
				$price_photo_package_status= $field['price_photo_package_status'];

				$price_video_package= $field['price_video_package'];
				$price_video_package_status= $field['price_video_package_status'];

				}
			}
		$smarty->assign('delivery_time_tpl', $delivery_time);
		$smarty->assign('established_tpl', $established);

		$smarty->assign('price_candid_photography_tpl', $price_candid_photography);
		$smarty->assign('price_candid_photography_status_tpl', $price_candid_photography_status);
		$smarty->assign('price_cinematography_tpl', $price_cinematography);
		$smarty->assign('price_cinematography_status_tpl', $price_cinematography_status);
		$smarty->assign('price_studio_photography_tpl', $price_studio_photography);
		$smarty->assign('price_studio_photography_status_tpl', $price_studio_photography_status);
		$smarty->assign('price_pre_wedding_shoot_tpl', $price_pre_wedding_shoot);
		$smarty->assign('price_pre_wedding_shoot_status_tpl', $price_pre_wedding_shoot_status);
		$smarty->assign('price_photo_package_tpl', $price_photo_package);
		$smarty->assign('price_photo_package_status_tpl', $price_photo_package_status);
		$smarty->assign('price_video_package_tpl', $price_video_package);
		$smarty->assign('price_video_package_status_tpl', $price_video_package_status);


		$smarty->assign('delivery_time_tpl', $delivery_time);
		$smarty->assign('established_tpl', $established);
	$content_template = "$vendors_tpl_path/listing-details-photo.tpl"; //15
	}

	//SELECT * FROM `ven_service_venue`

	 
	
	/******* To generate Stage, City, Area & Cat drop downs - Quick Search section --- Begin************/
	$chkqry= "SELECT tbl_states_master_id, tbl_states_master_name FROM `tbl_states_master` WHERE `tbl_states_master_status` = 1";
	$select_states= $userslog_obj->selectVal($chkqry);
	$sele_status = '<option value="0">Select State</option>';
	if (count($select_states)){
	foreach($select_states as $key=>$field){
		$states_name= trim($field['tbl_states_master_name']);
		$states_master_id= $field['tbl_states_master_id'];
		if ($req_state_id != 0 && $req_state_id != '' && $states_master_id == $req_state_id){
		$sele_status .= "<option value=$states_master_id selected='selected'>$states_name</option>";
		}else{
		$sele_status .= "<option value=$states_master_id>$states_name</option>";
		}
	}
	}


	if ($req_state_id != 0) {
		$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_status = 1 and tbl_city_master_state_id = $req_state_id";
	}else{
		$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_status = 1 and ";
	}
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_city = '<option value="0">Select City</option>';
	if (count($select_city)){
	foreach($select_city as $key=>$field){
		$city_name= trim($field['tbl_city_master_name']);
		$city_master_id= $field['tbl_city_master_id'];
		if ($req_city_id == $city_master_id){
		$sele_city .= "<option value=$city_master_id selected='selected'>$city_name</option>";
		} else {
		$sele_city .= "<option value=$city_master_id>$city_name</option>";
		}
	}
	}


	$chkqry= "SELECT * FROM `ven_products` WHERE `pdt_status` = 1";
	$select_pdts= $userslog_obj->selectVal($chkqry);
	$right_side_nav='';
	$sele_pdt = '<option value="0">Select Product Services</option>';
	$surl=''; $url_generate=''; $products_name='';
	$surl = $vendor_obj->SeoURL($products_name, $global_state_name, $global_city_name, $global_area_name);
	$url_generate = "../$surl/$req_state_id-$req_city_id-$req_area_id-$pdt_auto_id";
	$right_side_nav .= "<li><a href='$url_generate'>All</a></li>";

	if (count($select_pdts)){
	foreach($select_pdts as $key=>$field){
		$products_name= trim($field['pdt_products']);
		$pdt_auto_id= $field['pdt_auto_id'];
		$surl=''; $url_generate='';
		$surl = $vendor_obj->SeoURL($products_name, $global_state_name, $global_city_name, $global_area_name);
		$url_generate = "../$surl/$req_state_id-$req_city_id-$req_area_id-$pdt_auto_id";


		if($req_cat_id != $pdt_auto_id) {
		$right_side_nav .= "<li><a href='$url_generate'>$products_name</a></li>";
		$sele_pdt .= "<option value=$pdt_auto_id>$products_name</option>";
		} else {
		$right_side_nav .= "<li><a href='$url_generate' class='selected'>$products_name</a></li>";
		$sele_pdt .= "<option value=$pdt_auto_id selected='selected'>$products_name</option>";
		}
		

	}
	}
/******* To generate Stage, City, Area & Cat drop downs - Quick Search section --- End ************/

$smarty->assign('tpl_sele_city', $sele_city);
$smarty->assign('tpl_sele_pdt', $sele_pdt);
$smarty->assign('tpl_sele_status', $sele_status);
$smarty->assign('pdt_contents_tmpl', $search_pdts);
$smarty->assign('combine_addr', $combine_addr);
$smarty->assign('business_profile_pic', $business_profile_pic);
$smarty->assign('short_desc', $short_desc);
$smarty->assign('long_desc', $long_desc);
$smarty->assign('tbl_business_cat', $business_cat);
$smarty->assign('tbl_show_price_panel', $show_price_panel);


// Fetch Services from Database  - End
$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );
$smarty->assign('glb_selecity_left', $selecity_left);
//$meta_search_hide = 1;
$smarty->assign('glb_meta_search_hide', $meta_search_hide);


/*
$content_template = '../templates/default/vendors/search.tpl';
if($isMobile)
$content_template = '../templates/default/vendors/search_mobile.tpl';
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
$smarty->display('../../templates/default/index.tpl'); */


$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );




/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch("$vendors_tpl_path/header.tpl") );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch("$vendors_tpl_path/../footer.tpl") );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');


?>
