<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$validator_obj = new Validator();
$mails_obj = new mails();
$current_action= trim($_REQUEST['do']);
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$website_count = $common_obj->checkWedCount($user_log_id);
$show_err = 0; $error_message = '';

$button_gnav_req = $_REQUEST['gnav_req'];
$button_request = $_REQUEST['frm_req'];
if($button_gnav_req == 'w'){
	$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
	if($_SESSION['gnav_personal_info']== '1')
		$gnav_personal_class = 'active';
	if($_SESSION['gnav_general_info']== '1')
		$gnav_general_class = 'active';
	if($_SESSION['gnav_ceremony_info']== '1')
		$gnav_ceremony_class = 'active';
	if($_SESSION['gnav_reception_info']== '1')
		$gnav_reception_class = 'active';
	$smarty->assign('gnav_personal_class', $gnav_personal_class);
	$smarty->assign('gnav_general_class', $gnav_general_class);
	$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
	$smarty->assign('gnav_reception_class', $gnav_reception_class); 
	$content_template = 'default/mrg_account/wedding_info.tpl';
} else if($button_gnav_req == 'r'){
	$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
	if($_SESSION['gnav_personal_info']== '1')
		$gnav_personal_class = 'active';
	if($_SESSION['gnav_general_info']== '1')
		$gnav_general_class = 'active';
	if($_SESSION['gnav_ceremony_info']== '1')
		$gnav_ceremony_class = 'active';
	if($_SESSION['gnav_reception_info']== '1')
		$gnav_reception_class = 'active';
	$smarty->assign('gnav_personal_class', $gnav_personal_class);
	$smarty->assign('gnav_general_class', $gnav_general_class);
	$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
	$smarty->assign('gnav_reception_class', $gnav_reception_class); 
	$content_template = 'default/mrg_account/reception_info.tpl';
}
if($button_request == "g"){ // Save General infos
	$wed_url= trim($_REQUEST['wed_url']);
	$weddate= trim($_REQUEST['weddate']);
	$invite_title= addslashes(trim($_REQUEST['txt_invite_title']));
	$invite_lang= addslashes(trim($_REQUEST['txt_invite_lang']));
	$chkdomainsts = $validator_obj->chkWedUrlSts($wed_url, 'Domain name');
	if($chkdomainsts != ''){
		echo $chkdomainsts; exit;
		}
	$home_images_sts= trim($_REQUEST['home_images_sts']);
	$dirName = 'templates/default/mrg_template/home_images/';
	$expire=time()+60*60*24*30;
	setcookie("cookie_homeimages_sts", $home_images_sts, $expire);
	if ($home_images_sts == 2){
	$male_img = trim($_FILES['uploaded_homeimage_male']['name']) ;
	$fmale_img = trim($_FILES['uploaded_homeimage_fmale']['name']) ;
	if($male_img != '' and $fmale_img != ''){
		$male_imgext = strtolower(strrchr($male_img,'.'));
		if($male_imgext == '.jpg' or $male_imgext == '.jpeg' or $male_imgext == '.gif' or $male_imgext == '.png'){
			$mimage_name=$user_log_id.time().'.jpg';
			$target_path=$dirName. $mimage_name;
			move_uploaded_file($_FILES['uploaded_homeimage_male']['tmp_name'], $target_path); 
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resizeToWidth(350);
			$image->save("templates/default/mrg_template/home_images/".$mimage_name);
			setcookie("cookie_mimage_name", $mimage_name, $expire);
			}
		$fmale_imgext = strtolower(strrchr($fmale_img,'.'));
		if($fmale_imgext == '.jpg' or $fmale_imgext == '.jpeg' or $fmale_imgext == '.gif' or $fmale_imgext == '.png'){
			$fimage_name=time().$user_log_id.'.jpg';
			$target_path=$dirName. $fimage_name;
			move_uploaded_file($_FILES['uploaded_homeimage_fmale']['tmp_name'], $target_path); 
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resizeToWidth(350);
			$image->save("templates/default/mrg_template/home_images/".$fimage_name);
			setcookie("cookie_fimage_name", $fimage_name, $expire);
			}
		}else{
		echo 'Something went wrong. Please upload images'; exit;
		}
	}else{
		setcookie("cookie_mimage_name", '', $expire);
		setcookie("cookie_fimage_name", '', $expire);
		$ext = strtolower(strrchr($_FILES['uploaded_homeimage']['name'],'.'));
		if($ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif' or $ext == '.png'){
		$image_name=$user_log_id.time().'.jpg';
		$target_path=$dirName. $image_name;
		move_uploaded_file($_FILES['uploaded_homeimage']['tmp_name'], $target_path); 
		$image = new SimpleImage();
		$image->load($target_path);
		$image->resizeToWidth(350);
		$image->save("templates/default/mrg_template/home_images/".$image_name);
		}
	}
	setcookie("cookie_invite_lang", $invite_lang, $expire);
	$_SESSION['wed_url_engine'] = $wed_url;
	$_SESSION['wed_invite_title'] = $invite_title;
	$_SESSION['wed_gen_weddate'] = $weddate;
	$_SESSION['image_name_home'] = $image_name;
	$_SESSION['gnav_general_info']= 1;
	$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
	if($_SESSION['gnav_personal_info']== '1')
		$gnav_personal_class = 'active';
	if($_SESSION['gnav_general_info']== '1')
		$gnav_general_class = 'active';
	if($_SESSION['gnav_ceremony_info']== '1')
		$gnav_ceremony_class = 'active';
	if($_SESSION['gnav_reception_info']== '1')
		$gnav_reception_class = 'active';
	$smarty->assign('gnav_personal_class', $gnav_personal_class);
	$smarty->assign('gnav_general_class', $gnav_general_class);
	$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
	$smarty->assign('gnav_reception_class', $gnav_reception_class); 

	///////////////////////////////////////////////////////////////////////////////
	/*******************Load Wedding details *************************************/
	///////////////////////////////////////////////////////////////////////////////
	$content_template = 'default/mrg_account/wedding_info.tpl';

} else if($button_request == "c"){
	$chk_wedd_sts= addslashes(trim($_REQUEST['chk_wedding_status']));
	$_SESSION['ceremony_mrg_location'] = $chk_wedd_sts;
	$mrg_location= addslashes(trim($_REQUEST['txt_area_wed_location']));
	$mrg_location_int = (int)strlen ($mrg_location);
	$mrg_location = ($mrg_location_int < 15) ? '' : $mrg_location ;
	$wed_title= addslashes(trim($_REQUEST['txt_wed_title']));
	$req_lat_ceremony= trim($_REQUEST['lat_ceremony']);
	$req_lng_ceremony= trim($_REQUEST['lng_ceremony']);
	$req_map_wedding_status= trim($_REQUEST['map_wedding_status']);
	$req_addr_postcode= trim($_REQUEST['addr_postcode']);
	$error_sts = 0; $error_msg = '';
	if ($chk_wedd_sts == '1') { // User should pass all required fields
		if ($mrg_location == '') {
		$error_sts = 1;
		}
	}
	if($error_sts) {
	$smarty->assign('show_err', $error_sts);
	$error_msg = 'Please enter your ceremony details';
	$smarty->assign('error_message', $error_msg);
	$smarty->assign('chk_wedding_status', $chk_wedd_sts);
	$smarty->assign('txt_area_wed_location', $mrg_location);
	$smarty->assign('txt_wed_title', $wed_title);
	$smarty->assign('lat_ceremony', $req_lat_ceremony);
	$smarty->assign('lng_ceremony', $req_lng_ceremony);
	$smarty->assign('map_wedding_status', $req_map_wedding_status);
	$smarty->assign('addr_postcode', $req_addr_postcode);	
	$content_template = 'default/mrg_account/wedding_info.tpl';
	} else {
	$_SESSION['ceremony_mrg_location'] = $mrg_location;
	$_SESSION['ceremony_title'] = $wed_title;
	$_SESSION['ceremony_lat'] = $req_lat_ceremony;
	$_SESSION['ceremony_lng'] = $req_lng_ceremony;
	$_SESSION['ceremony_map_sts'] = $req_map_wedding_status;
	$_SESSION['ceremony_postcode'] = $req_addr_postcode;
	$_SESSION['marriage_status'] = $chk_wedd_sts;
	$_SESSION['gnav_ceremony_info']='1';
	$content_template = 'default/mrg_account/reception_info.tpl';
	}
	$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
	if($_SESSION['gnav_personal_info']== '1')
		$gnav_personal_class = 'active';
	if($_SESSION['gnav_general_info']== '1')
		$gnav_general_class = 'active';
	if($_SESSION['gnav_ceremony_info']== '1')
		$gnav_ceremony_class = 'active';
	if($_SESSION['gnav_reception_info']== '1')
		$gnav_reception_class = 'active';
	$smarty->assign('gnav_personal_class', $gnav_personal_class);
	$smarty->assign('gnav_general_class', $gnav_general_class);
	$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
	$smarty->assign('gnav_reception_class', $gnav_reception_class); 
} else if($button_request == "r"){
	$rec_location= addslashes(trim($_REQUEST['txt_area_rec_location']));
	$rec_location = (strlen ($rec_location) < 5) ? '' : $rec_location ;
	$rec_title= addslashes(trim($_REQUEST['txt_rec_title']));
	$req_lat_reception= trim($_REQUEST['lat_reception']);
	$req_lng_reception= trim($_REQUEST['lng_reception']);
	$req_map_rec_status= trim($_REQUEST['map_rec_status']);
	$req_addr_postcode_reception= trim($_REQUEST['addr_postcode_reception']);
	$chk_recp_sts= addslashes(trim($_REQUEST['chk_reception_status']));
	$chk_recp_sts = ($chk_recp_sts == 1) ? '1' : '0';
	$error_sts = 0; $error_msg = '';
	if ($chk_recp_sts == '1') { // User should pass all required fields
		if ($rec_location == '') {
		$error_sts = 1;
		$error_msg = 'Please enter your reception details';
		}
	}
	if($chk_recp_sts != '1' && $_SESSION['marriage_status'] != '1') {
		$error_sts = 1;
		$error_msg = 'Please provide atleast wedding or reception details';
	}
	if($error_sts) {
	$smarty->assign('show_err', $error_sts);
	$smarty->assign('error_message', $error_msg);
	$smarty->assign('chk_recp_status', $chk_recp_sts);
	$smarty->assign('txt_area_recp_location', $rec_location);
	$smarty->assign('txt_recp_title', $rec_title);
	$smarty->assign('lat_recp', $req_lat_reception);
	$smarty->assign('lng_recp', $req_lng_reception);
	$smarty->assign('map_recp_status', $req_map_rec_status);
	$smarty->assign('addr_postcode_recp', $req_addr_postcode_reception);	
	$content_template = 'default/mrg_account/reception_info.tpl';
	} else {
	$_SESSION['reception_location'] = $rec_location;
	$_SESSION['reception_title'] = $rec_title;
	$_SESSION['reception_lat'] = $req_lat_reception;
	$_SESSION['reception_lng'] = $req_lng_reception;
	$_SESSION['reception_map_sts'] = $req_map_rec_status;
	$_SESSION['reception_postcode'] = $req_addr_postcode_reception;
	$_SESSION['reception_status'] = $chk_recp_sts;
	$_SESSION['gnav_reception_info']='1';
	}
	$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
	if($_SESSION['gnav_personal_info']== '1')
		$gnav_personal_class = 'active';
	if($_SESSION['gnav_general_info']== '1')
		$gnav_general_class = 'active';
	if($_SESSION['gnav_ceremony_info']== '1')
		$gnav_ceremony_class = 'active';
	if($_SESSION['gnav_reception_info']== '1')
		$gnav_reception_class = 'active';
	$smarty->assign('gnav_personal_class', $gnav_personal_class);
	$smarty->assign('gnav_general_class', $gnav_general_class);
	$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
	$smarty->assign('gnav_reception_class', $gnav_reception_class); 

	$content_template = 'default/mrg_account/reception_info.tpl';
	if($error_sts == ""){
		$_SESSION['wed_invitation_access']="";
		$theme_id= trim($_SESSION['selected_themeid']);
		$packid = $common_obj->getPackInfo($user_log_id);
		$packval = 'valid_'."$packid";
		$pvalue = $$packval;
		//$packvalue = ($pvalue != 0) ? '+'.$pvalue.' month'  : '+'.$free_indays.' days' ;
		if($pvalue != 0) {
			$packvalue = '+'.$pvalue.' month';
			$makeit_free='';
			} else {
			$packvalue = '+'.$free_indays.' days' ;
			$makeit_free = $glb_makeit_free. 'days';
			$makeit_free = date('Y-m-d', strtotime($makeit_free));
			}
		$endOfCycle=date('Y-m-d', strtotime($packvalue));
		if ($theme_id != '0' && $theme_id != '') {
			$inqry= "INSERT INTO `mrg_url_status` (`mrg_url_sts_auto_id`, `mrg_main_user_id`, `mrg_page_url`,`mrg_site_start_date`, `mrg_site_end_date`, `mrg_site_revert_date`, `mrg_theme_id`, `mrg_status`) VALUES (NULL, '".$user_log_id."', '".$_SESSION['wed_url_engine']."',  now() ,'".$endOfCycle."', '".$makeit_free."', '".$theme_id."', '1' )";
			$cookie_male_image = $_COOKIE['cookie_mimage_name'];
			$cookie_female_image = $_COOKIE['cookie_fimage_name'];
			$cookie_homeimages_sts = $_COOKIE['cookie_homeimages_sts'];
			$cookie_invite_lang = $_COOKIE['cookie_invite_lang'];
			$lastinsert_id = $userslog_obj->insertVal($inqry);
			// Fetch Random description
			$fin_des='des_auto_id';
			//$fin = $common_obj->getrandomdata('mrg_mas_des', $fin_des, 'des_status=1 and desc_user_id =0');
			$fin = $common_obj->getrandomdata('mrg_mas_des', $fin_des, " des_status=1 and desc_user_id =0 and lang_id = $cookie_invite_lang ");
			// Fetch Random description
			$fin_thiru='kural_auto_id';
			//$fin_t = $common_obj->getrandomdata('mrg_mas_thirukural', $fin_thiru, 'kural_status=1 and kural_user_id=0');
			$fin_t = $common_obj->getrandomdata('mrg_mas_thirukural', $fin_thiru, "kural_status=1 and kural_user_id=0 and lang_id = $cookie_invite_lang");

			// Assign all variables tempory - Start//
			$mrg_location = $_SESSION['ceremony_mrg_location'];
			$rec_location = $_SESSION['reception_location'];
			$req_lat_ceremony = $_SESSION['ceremony_lat'];
			$req_lng_ceremony = $_SESSION['ceremony_lng'];
			$req_map_wedding_status = $_SESSION['ceremony_map_sts'];
			$req_lat_reception = $_SESSION['reception_lat'];
			$req_lng_reception = $_SESSION['reception_lng'];
			$req_map_rec_status = $_SESSION['reception_map_sts'];
			$req_addr_postcode = $_SESSION['ceremony_postcode'];
			$req_addr_postcode_reception = $_SESSION['reception_postcode'];
			$res_status = $_SESSION['reception_status'];
			$marriage_status = $_SESSION['marriage_status'];
			$weddate = $_SESSION['wed_gen_weddate'];
			$wed_title = $_SESSION['ceremony_title'];
			$rec_title = $_SESSION['reception_title'];
			$wedding_names = $_SESSION['grooms_name']." & ".$_SESSION['brides_name'];
			// Assign all variables tempory - End//
			$mrg_date = ''; $rec_date = ''; $wed_loc_info = ''; $rec_wed_addr_same = 0;
			$inqry= "INSERT INTO `mrg_all_info` (`info_auto_id`, `mrg_url_status_auto_id`, `male_name`, `female_name`, `marriage_date`, `marriage_location`, `reception_date`, `reception_location`, `top_heading`, `thirukkural`, `description`, `status`, `home_img`, `marriage_status`, `reception_status`, `address_details_landmark`, `mrg_res_address_same_status`, `gmap_latitude`, `gmap_longitude`, `wedding_map_on_event_page`, `gmap_lat_reception`, `gmap_lng_reception`, `reception_map_on_event_page`, `wedding_postalcode`, `reception_postalcode`,  `home_img_status`, `home_male_img`, `home_female_img`, `marriage_date_only`) VALUES (NULL, '".$lastinsert_id."', '".$_SESSION['grooms_name']."' , '".$_SESSION['brides_name']."' , '".$mrg_date."', '".$mrg_location."', '".$rec_date."', '".$rec_location."', '".$_SESSION['wed_invite_title']."', '".$fin_t[$fin_thiru]."', '".$fin[$fin_des]."', '1', '".$_SESSION['image_name_home']."', ".$marriage_status.", ".$res_status.", '".$wed_loc_info."', '".$rec_wed_addr_same."', '".$req_lat_ceremony."','".$req_lng_ceremony."','".$req_map_wedding_status."','".$req_lat_reception."','".$req_lng_reception."', '".$req_map_rec_status."', '".$req_addr_postcode."', '".$req_addr_postcode_reception."', '".$cookie_homeimages_sts."', '".$cookie_male_image."', '".$cookie_female_image."', '".$weddate."')";
			$insubqry= "INSERT INTO mrg_all_info_add (addi_autoid, mrg_url_status_auto_id, wed_music_active, wed_music_id, wed_lang_id, event_wed_title, event_rec_title ) VALUES (NULL, '".$lastinsert_id."', 0, 0, '".$cookie_invite_lang."', '".$wed_title."', '".$rec_title."')";
	
			// Move home images under Invitation folder.
			$newpath = "templates/default/mrg_template/home_images/$lastinsert_id";
			$oldpath = "templates/default/mrg_template/home_images";
			if($cookie_homeimages_sts == 2){
				if (is_dir($newpath)){}else{mkdir($newpath, 0755);}
				$moveResult = copy($oldpath."/$cookie_male_image", $newpath."/$cookie_male_image");
				if($moveResult) unlink($oldpath."/$cookie_male_image");
				$moveResult = copy($oldpath."/$cookie_female_image", $newpath."/$cookie_female_image");
				if($moveResult) unlink($oldpath."/$cookie_female_image"); 
				} elseif ($cookie_homeimages_sts == 1){
					if($_SESSION['image_name_home'] != ''){
						$sess_imgs = $_SESSION['image_name_home'];
						if (is_dir($newpath)){}else{mkdir($newpath, 0755);}
						$moveResult = copy($oldpath."/$sess_imgs", $newpath."/$sess_imgs");
						if($moveResult) unlink($oldpath."/$sess_imgs");
					}
				}
			setcookie("cookie_fimage_name", "", time()-3600);
			setcookie("cookie_mimage_name", "", time()-3600);
			setcookie("cookie_homeimages_sts", "", time()-3600);
			$order_list_id = $userslog_obj->insertVal($inqry);
			$userslog_obj->insertVal($insubqry);
			$chkqry_mail= "SELECT usrpro_email FROM `tbl_user_profile` WHERE usrlog_id= '".$user_log_id."'";
			$chk_page_access_mail= $userslog_obj->selectVal($chkqry_mail);
			$uemail = $chk_page_access_mail[0]['usrpro_email'];
			// Will trigger mail functions
			$rewrite_url=$_SESSION['wed_url_engine'];
			$chkdomainsts = $validator_obj->chkWedUrlSts($rewrite_url, 'Domain name');
			if($chkdomainsts != ''){
			echo $chkdomainsts; exit;
			}

			$email_tmpl=$mails_obj->getSuccWed_tmpl();
			$email_tmpl =str_replace("%usernm%", "$wedding_names", $email_tmpl);
			$finurl=$glb_site_url.$rewrite_url;
			$email_tmpl =str_replace("%succwedurl%", "$finurl", $email_tmpl);
			$sub='Congratulations '.$wedding_names.'. Your wedding website are ready.';
			$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
			$common_obj->simplemail($uemail, $sub, $email_tmpl, $headers);

		$_SESSION['gnav_personal_info']='0';$_SESSION['gnav_general_info']='0';
		$_SESSION['gnav_ceremony_info']='0';$_SESSION['gnav_reception_info']='0';
		unset($_SESSION['grooms_name']); unset($_SESSION['grooms_dob']);
		unset($_SESSION['brides_name']); unset($_SESSION['brides_dob']);
		unset($_SESSION['wed_invite_title']); unset($_SESSION['reception_status']);
		unset($_SESSION['wed_gen_weddate']); unset($_SESSION['image_name_home']);
		unset($_SESSION['image_name_home']); unset($_SESSION['ceremony_mrg_location']);
		unset($_SESSION['ceremony_title']); unset($_SESSION['ceremony_lat']);
		unset($_SESSION['ceremony_lng']); unset($_SESSION['ceremony_map_sts']);
		unset($_SESSION['ceremony_postcode']); unset($_SESSION['marriage_status']);
		unset($_SESSION['reception_location']); unset($_SESSION['reception_title']);
		unset($_SESSION['reception_lat']); unset($_SESSION['reception_lng']);
		unset($_SESSION['reception_map_sts']); unset($_SESSION['reception_postcode']);

			// send mail to deiva
			$mail='inviteindia.feedback@gmail.com';
			$common_obj->simplemail($mail, 'for test', $finurl, $headers);
			// Append URL Rewrite in htaccess
			$filename = ".htaccess";
			$fp = fopen($filename,'a');
			$vars= "RewriteRule ^$rewrite_url$ my_moments.php";
			$newline=PHP_EOL;
			fwrite($fp,$newline);
			fwrite($fp,$vars);
			fclose($fp); 
			//header("Location: e-wedding.php?do=dbvenamr");
			header("Location: wed_cover.php?wed_id=$lastinsert_id&do=addcover&from=wed_succ");
			exit;
			}
			
	}
}

$_SESSION['wed_invitation_access'] = 1;
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_formaction', $formaction);
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('currentpage_js', 'web_create_latest');
$home_page_title = "Free wedding website | Create Online wedding invitation";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
