<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Free wedding website | Create Online wedding invitation";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$current_page= trim($_REQUEST['page']);
$smarty->assign('currentpage_js', 'theme_select_edit');
$wedid= trim($_REQUEST['wed_id']);
$smarty->assign('local_add', $local_add);
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_acces= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_acces))
		{		
		$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
		}
if($current_action == 'wed' and $current_page == '5'){
	$content_template = 'default/mrg_account/theme_wed_edit.tpl';
	//$wedid=$_SESSION['lastupdate_id'];
	$butt_sub= trim($_REQUEST['butt_create_web_invit_step2']);
	if($butt_sub == 'Submit'){
			//$weddate means wedding date without style
			$mrg_location= addslashes(trim($_REQUEST['txt_area_wed_location']));
			$mrg_location = (strlen ($mrg_location) < 5 ) ? '' : $mrg_location ;
			$wed_title= addslashes(trim($_REQUEST['txt_wed_title']));
			$req_lat_ceremony= trim($_REQUEST['lat_ceremony']);
			$req_lng_ceremony= trim($_REQUEST['lng_ceremony']);
			$req_map_wedding_status= trim($_REQUEST['map_wedding_status']);
			$req_addr_postcode= trim($_REQUEST['addr_postcode']);
			$wed_sts= trim($_REQUEST['wedding_status']);
			$err_msg="";
			if($wed_sts){
				if($mrg_location == "") {
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."<p>Please enter your wedding date & address details.</p>";
				}
			}	
			$smarty->assign('txt_wed_sts', $wed_sts);
			$smarty->assign('txt_wed_title', $wed_title);
			$smarty->assign('txt_area_wed_loc', $mrg_location);
			$smarty->assign('txt_req_lat_ceremony', $req_lat_ceremony);
			$smarty->assign('txt_req_lng_ceremony', $req_lng_ceremony);
			$smarty->assign('txt_req_map_wedding_status', $req_map_wedding_status);
			$smarty->assign('txt_req_addr_postcode', $req_addr_postcode);
			$smarty->assign('err_req_msg', $err_msg);
			$smarty->assign('page_status_events', 'edit');
			$marriage_status = $wed_sts;
			// No Errors, So need to update fields and submit next page	
			if($err_msg == "") {
//				$marriage_status = ( $mrg_location != '') ? 1 : 0 ;
				$mrg_date = ''; $rec_date = ''; $wed_loc_info = ''; $addr_same_status = 0;
				$upqry= "UPDATE mrg_all_info SET marriage_status = '".$marriage_status."', marriage_date = '".$mrg_date."', marriage_location='".$mrg_location."', gmap_latitude ='".$req_lat_ceremony."' , `gmap_longitude` ='".$req_lng_ceremony."', `wedding_map_on_event_page` ='".$req_map_wedding_status."', `wedding_postalcode` ='".$req_addr_postcode."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);
				
				$add_info_qry="SELECT mrg_add.event_wed_title FROM mrg_all_info_add mrg_add WHERE mrg_url_status_auto_id ='".$_SESSION['lastupdate_id']."' LIMIT 1 ";
				$add_access = '';
				$selectaddi = $userslog_obj->selectAffectedRows($add_info_qry);
				if($selectaddi){
					$upqry1= "UPDATE mrg_all_info_add SET event_wed_title = '".$wed_title."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
					$order_list_id = $userslog_obj->updateVal($upqry1);
				}
				$smarty->assign('alert_msg', 'Your wedding details has been successfully updated.');
				}
		}
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id ='".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_access= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_access)) {
		// Preload all existing datas.
		$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, info.marriage_date, info.marriage_location, info.marriage_status, info.address_details_landmark, info.gmap_latitude, info.gmap_longitude, info.wedding_map_on_event_page, info.wedding_postalcode FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id "; 
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);
		$smarty->assign('selectwedres_access_2', $selectwedres_access );

		$add_info_qry="SELECT mrg_add.event_wed_title, mrg_add.event_rec_title FROM mrg_all_info_add mrg_add WHERE mrg_url_status_auto_id ='".$wedid."' ";
		$add_access = '';
		$selectaddi = $userslog_obj->selectAffectedRows($add_info_qry);
		if($selectaddi){
		$add_access = $userslog_obj->selectVal($add_info_qry);
		}
		$smarty->assign('selectwedres_add_info', $add_access);
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);
		$smarty->assign('selectwedres_access_2', $selectwedres_access );
		}
	$smarty->assign('do_val', $current_action);
} else if ($current_action == 'rec' and $current_page == '4'){
	//$wedid=$_SESSION['lastupdate_id'];
	$butt_sub= trim($_REQUEST['butt_create_web_invit_step2']);
	if($butt_sub == 'Submit'){
			//$weddate means wedding date without style
			$rec_location= addslashes(trim($_REQUEST['txt_area_rec_location']));
			$rec_location = (strlen ($rec_location) < 5) ? '' : $rec_location ;
			$rec_title= addslashes(trim($_REQUEST['txt_rec_title']));
			$req_lat_reception= trim($_REQUEST['lat_reception']);
			$req_lng_reception= trim($_REQUEST['lng_reception']);
			$req_map_rec_status= trim($_REQUEST['map_rec_status']);
			$req_addr_postcode_reception= trim($_REQUEST['addr_postcode_reception']);
			$rec_sts= trim($_REQUEST['reception_status']);
			$err_msg="";
			if($rec_sts){
				if($rec_location == "") {
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."<p>Please enter your reception date & address details.</p>";
				}
			}
			$smarty->assign('txt_res_sts', $rec_sts);
			$smarty->assign('txt_rec_title', $rec_title);
			$smarty->assign('txt_area_rec_loc', $rec_location);
			$smarty->assign('txt_req_lat_reception', $req_lat_reception);
			$smarty->assign('txt_req_lng_reception', $req_lng_reception);
			$smarty->assign('txt_req_map_rec_status', $req_map_rec_status);
			$smarty->assign('txt_req_addr_postcode_reception', $req_addr_postcode_reception);
			$smarty->assign('err_req_msg', $err_msg);
			$smarty->assign('page_status_events', 'edit');
			// No Errors, So need to update fields and submit next page	
			if($err_msg == ""){
				$mrg_date = ''; $rec_date = ''; $wed_loc_info = ''; $addr_same_status = 0;
				$upqry= "UPDATE mrg_all_info SET reception_date='".$rec_date."',reception_location='".$rec_location."', `reception_status`='".$rec_sts."', `gmap_lat_reception` ='".$req_lat_reception."', `gmap_lng_reception` ='".$req_lng_reception."', `reception_map_on_event_page` ='".$req_map_rec_status."', `reception_postalcode` ='".$req_addr_postcode_reception."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);
				
				$add_info_qry="SELECT mrg_add.event_rec_title FROM mrg_all_info_add mrg_add WHERE mrg_url_status_auto_id ='".$_SESSION['lastupdate_id']."' LIMIT 1 ";
				$add_access = '';
				$selectaddi = $userslog_obj->selectAffectedRows($add_info_qry);
				if($selectaddi){
					$upqry1= "UPDATE mrg_all_info_add SET event_rec_title = '".$rec_title."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
					$order_list_id = $userslog_obj->updateVal($upqry1);
				}

				$smarty->assign('alert_msg', 'Your reception details has been successfully updated.');
				}
		}
		$content_template = 'default/mrg_account/theme_rec_edit.tpl';	
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_access= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_access))
		{
		// Preload all existing datas.
		$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, info.marriage_date, info.marriage_location, info.reception_date, info.reception_location, info.home_img, info.marriage_status, info.reception_status, info.mrg_res_address_same_status, info.address_details_landmark, info.marriage_date_only, info.gmap_latitude, info.gmap_longitude, info.wedding_map_on_event_page, info.gmap_lat_reception, info.gmap_lng_reception, info.reception_map_on_event_page, info.wedding_postalcode, info.reception_postalcode FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id "; 
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);
		$smarty->assign('selectwedres_access_2', $selectwedres_access );

		$add_info_qry="SELECT mrg_add.event_wed_title, mrg_add.event_rec_title FROM mrg_all_info_add mrg_add WHERE mrg_url_status_auto_id ='".$wedid."' ";
		$add_access = '';
		$selectaddi = $userslog_obj->selectAffectedRows($add_info_qry);
		if($selectaddi){
		$add_access = $userslog_obj->selectVal($add_info_qry);
		}
		$smarty->assign('selectwedres_add_info', $add_access);
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);
		$smarty->assign('selectwedres_access_2', $selectwedres_access );
		}
	$smarty->assign('do_val', $current_action);
}
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
