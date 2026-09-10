<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mails_obj = new mails();
$validator_obj = new Validator();
$current_action= trim($_REQUEST['do']);
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$current_page= trim($_REQUEST['page']);
// This is going to add first page.
$home_page_title = "Free birthday website  | Online birthday invitation";
$home_page_meta_desc = "online birthday website. Create your birthday invitation with colourful themes and share with your friends";
$home_page_meta_key = "online marriage invitation, Wedding website templates, Birthday templates";
$smarty->assign('local_add', $local_add);
if($current_page == 2) {
	$content_template = 'default/mrg_account/btheme_2.tpl';
	if($_SESSION['wed_invitation_access'] != 1)
	{
	$smarty->assign('err_status', 'show');
	$smarty->assign('err_req_msg', 'Invalid access.');
	$content_template = 'default/mrg_account/theme_created_fail.tpl';
	}
	else {
	$birth_url= trim($_REQUEST['birth_url']);
	$chkdomainsts = $validator_obj->chkWedUrlSts($birth_url, 'Domain name');
	if($chkdomainsts != ''){
		echo $chkdomainsts; exit;
		}
	$bperson_name= addslashes(trim($_REQUEST['txt_bperson_name']));
	$bperson_dob= addslashes(trim($_REQUEST['bperson_dob']));
	$invite_title= addslashes(trim($_REQUEST['txt_invite_title']));
	$invite_lang= addslashes(trim($_REQUEST['txt_invite_lang']));
	$home_images_sts= 1;
	$dirName = 'templates/default/birth_template/home_images/';
	$expire=time()+60*60*24*30;
	setcookie("cookie_homeimages_sts", $home_images_sts, $expire);
	if ($home_images_sts == 2) {	
	}
	else {
			setcookie("cookie_mimage_name", '', $expire);
			setcookie("cookie_fimage_name", '', $expire);
			$ext = strtolower(strrchr($_FILES['uploaded_homeimage']['name'],'.'));
			if($ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif' or $ext == '.png')
			{			
			$image_name=$user_log_id.time().'.jpg';
			$target_path=$dirName. $image_name;
			move_uploaded_file($_FILES['uploaded_homeimage']['tmp_name'], $target_path); 
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resizeToWidth(350);
			$image->save("templates/default/birth_template/home_images/".$image_name);
			}
	}

	$capchaImg="<div><p><label class='lab_black_color' style='width:200px;'>Security code:</label><img src='CaptchaSecurityImages.php?width=100&height=40&characters=5'/></p></div><div><p><label class='lab_black_color' style='width:200px;'>Enter your security code:</label><input id='security_code' name='security_code' type='text'  class='inputval' /></p></div>";
	$smarty->assign('capchaImg', $capchaImg);		
	//$_SESSION['lastinsert_id'] = $order_list_id;
	setcookie("cookie_invite_lang", $invite_lang, $expire);
	$_SESSION['bperson_name'] = $bperson_name;
	$_SESSION['bperson_dob'] = $bperson_dob;
	$_SESSION['image_name_home'] = $image_name;
	$_SESSION['birth_url_engine'] = $birth_url;
	$_SESSION['invite_title'] = $invite_title;
	}
}
else if($current_page == 3) {
	if($_SESSION['wed_invitation_access'] != 1) {
	$smarty->assign('err_status', 'show');
	$smarty->assign('err_req_msg', 'Invalid access.');
	$content_template = 'default/mrg_account/theme_created_fail.tpl';
	}
	else {
			$content_template = 'default/mrg_account/btheme_2.tpl';
			$birth_location= addslashes(trim($_REQUEST['txt_area_birth_location']));
			$birth_location = (strlen ($birth_location) < 5) ? '' : $birth_location ;
			$birth_title= addslashes(trim($_REQUEST['txt_birth_title']));
			$req_lat_ceremony= trim($_REQUEST['lat_birth']);
			$req_lng_ceremony= trim($_REQUEST['lng_birth']);
			$req_map_wedding_status= trim($_REQUEST['map_birth_status']);
			$req_addr_postcode= trim($_REQUEST['addr_postcode']);
			$event_date= trim($_REQUEST['bperson_event_date']);
			$validateevents = 0;
			$err_msg="";
			if($birth_location == '') {
			$err_msg=$err_msg."Please enter your event locations.";
			$smarty->assign('err_status', 'show');
			$validateevents = 1;
			}
			if($event_date == ""){
			$err_msg=$err_msg."Please enter your event date.";
			$smarty->assign('err_status', 'show');
			$validateevents = 1;
			}
			
			$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br /><br /><br /><label for='security_code'  style='width:120px;'>Security Code: </label><input id='security_code' name='security_code' type='text'  class='inputval' />";
			$smarty->assign('capchaImg', $capchaImg);			
			if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) ) {}
			else{
			$err_msg=$err_msg."Please enter valid secure code.";
			$validateevents = 1;
			$smarty->assign('err_status', 'show');
			}
				
			$smarty->assign('txt_area_birth_location', $birth_location);
			$smarty->assign('err_req_msg', $err_msg);
			$smarty->assign('map_wedding_status', $req_map_wedding_status);
			$smarty->assign('txt_req_addr_postcode', $req_addr_postcode);
			$smarty->assign('txt_req_lat_ceremony', $req_lat_ceremony);
			$smarty->assign('txt_req_lng_ceremony', $req_lng_ceremony);				
			$smarty->assign('txt_birth_title', $birth_title);
			$smarty->assign('txt_event_date', $event_date);
			
				// No Errors, So need to update fields and submit next page
				if($err_msg == "" && $validateevents == 0) {
				$_SESSION['wed_invitation_access']="";
				$theme_id= trim($_SESSION['selected_themeid']);
				$marriage_status = ( $mrg_location != '') ? 1 : 0 ;
				$res_status = ( $rec_location != '') ? 1 : 0 ;
				$packid = $common_obj->getPackInfo($user_log_id);
				$packval = 'valid_'."$packid";
				$pvalue = $$packval;
				if($pvalue != 0) {
				$packvalue = '+'.$pvalue.' month';
				$makeit_free='';
				}else{
				$packvalue = '+'.$free_indays.' days' ;
				$makeit_free = $glb_makeit_free. 'days';
				$makeit_free = date('Y-m-d', strtotime($makeit_free));
				}
				$endOfCycle=date('Y-m-d', strtotime($packvalue));
				if ($theme_id != '0' && $theme_id != '') 
					
				{
				$inqry= "INSERT INTO birth_url_status (`birth_url_sts_auto_id`, `birth_main_user_id`, `birth_page_url`,`birth_site_start_date`, `birth_site_end_date`, `birth_site_revert_date`, `birth_theme_id`, `birth_status`) VALUES (NULL, '".$user_log_id."', '".$_SESSION['birth_url_engine']."',  'now()' ,'".$endOfCycle."', '".$makeit_free."', '".$theme_id."', '1')";
				$cookie_male_image = $_COOKIE['cookie_mimage_name'];
				$cookie_female_image = $_COOKIE['cookie_fimage_name'];
				$cookie_homeimages_sts = $_COOKIE['cookie_homeimages_sts'];
				$cookie_invite_lang = 1;
				$lastinsert_id = $userslog_obj->insertVal($inqry);

				// Move home images under Invitation folder.
				$newpath = "templates/default/birth_template/home_images/$lastinsert_id";
				$oldpath = "templates/default/birth_template/home_images";
				if($cookie_homeimages_sts == 1) {
				 if($_SESSION['image_name_home'] != '') {
				 $sess_imgs = $_SESSION['image_name_home'];
				 if (is_dir($newpath)){}else{mkdir($newpath, 0755);}
				 $moveResult = copy($oldpath."/$sess_imgs", $newpath."/$sess_imgs");
				 if($moveResult) unlink($oldpath."/$sess_imgs");
				 }
				}
				setcookie("cookie_fimage_name", "", time()-3600);
				setcookie("cookie_mimage_name", "", time()-3600);
				setcookie("cookie_homeimages_sts", "", time()-3600);

				// Fetch Random description
				$fin_des='des_auto_id';
				//$fin = $common_obj->getrandomdata('mrg_mas_des', $fin_des, 'des_status=1 and desc_user_id =0');
				$fin = $common_obj->getrandomdata('birth_mas_des', $fin_des, " des_status=1 and desc_user_id =0 and lang_id = $cookie_invite_lang ");
				// Fetch Random description
				$fin_thiru='kural_auto_id';
				//$fin_t = $common_obj->getrandomdata('mrg_mas_thirukural', $fin_thiru, 'kural_status=1 and kural_user_id=0');
				$fin_t = $common_obj->getrandomdata('birth_mas_thirukural', $fin_thiru, "kural_status=1 and kural_user_id=0 and lang_id = $cookie_invite_lang");
				
				$event_date = date('Y-m-d', strtotime($event_date));
				$dob = date('Y-m-d', strtotime($_SESSION['bperson_dob']));

				$inqry= "INSERT INTO `birty_all_info` (`info_auto_id`, `birty_url_auto_id`, `person_name`, `person_dob`, `person_event_date`, `person_event_addr`, `person_head_msg_id`, `person_desc_msg_id`, `invitation_status`, `home_img`, `invitation_title`, `gmap_lat`, `gmap_long`, `event_postalcode`, `event_title`) VALUES (NULL, '".$lastinsert_id."', '".$_SESSION['bperson_name']."' , '".$dob."', '".$event_date."', '".$birth_location."', '".$fin_t[$fin_thiru]."', '".$fin[$fin_des]."', 
				'1', '".$_SESSION['image_name_home']."','".$_SESSION['invite_title']."', '".$req_lat_ceremony."', '".$req_lng_ceremony."', '".$req_addr_postcode."', '".$birth_title."')";
				$order_list_id = $userslog_obj->insertVal($inqry);

				$chkqry_mail= "SELECT usrpro_email FROM `tbl_user_profile` WHERE usrlog_id= '".$user_log_id."'";
				$chk_page_access_mail= $userslog_obj->selectVal($chkqry_mail);        
				$uemail = $chk_page_access_mail[0]['usrpro_email'];
		 
				// Will trigger mail functions
				$rewrite_url=$_SESSION['birth_url_engine'];
				$chkdomainsts = $validator_obj->chkWedUrlSts($rewrite_url, 'Domain name');
				if($chkdomainsts != ''){
				echo $chkdomainsts; exit;
				}
				$email_tmpl=$mails_obj->getSuccBirth_tmpl();
				$email_tmpl =str_replace("%usernm%", "$wedding_name", $email_tmpl);
				$finurl=$glb_site_url.$rewrite_url;
				$email_tmpl =str_replace("%succwedurl%", "$finurl", $email_tmpl);
				$sub=$wed_created_succ_subject;
				$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
				$common_obj->simplemail($uemail, $sub, $email_tmpl, $headers);	
				
				// send mail to deiva
				$mail='inviteindia.feedback@gmail.com';
				$common_obj->simplemail($mail, 'for test birth', $finurl, $headers);
				// Append URL Rewrite in htaccess
				$filename = ".htaccess";
				$fp = fopen($filename,'a');
				$vars= "RewriteRule ^$rewrite_url$ my_moments.php";
				$newline=PHP_EOL;
				fwrite($fp,$newline);
				fwrite($fp,$vars);
				fclose($fp); 
				//header("Location: e-wedding.php?do=dbvenamr");
				header("Location: birth_cover.php?wed_id=$lastinsert_id&do=addcover&from=wed_succ");
				exit;


				}

				}
	}
		
}
$smarty->assign('currentpage_js', 'birth_create');
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$smarty->assign('user_log_id', $user_log_id );
echo $content_template;

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
