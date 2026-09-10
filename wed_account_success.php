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
$home_page_title = "Online wedding invitation | Manage your wedding card | create wedding invitations - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends - inviteindia";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('local_add', $local_add);
if($current_page == 2)
{
	if($_SESSION['wed_invitation_access'] != 1)
	{
	$smarty->assign('err_status', 'show');
	$smarty->assign('err_req_msg', 'Invalid access.');
	$content_template = 'default/mrg_account/theme_created_fail.tpl';
	}
	else
	{
	$content_template = 'default/mrg_account/theme_options_1.tpl';	
	$wed_url= trim($_REQUEST['wed_url']);
	$chkdomainsts = $validator_obj->chkWedUrlSts($wed_url, 'Domain name');
	if($chkdomainsts != ''){
		echo $chkdomainsts; exit;
		}
	$grooms_name= addslashes(trim($_REQUEST['txt_grooms_name']));
	$brides_name= addslashes(trim($_REQUEST['txt_brides_name']));
	$invite_title= addslashes(trim($_REQUEST['txt_invite_title']));
	$invite_lang= addslashes(trim($_REQUEST['txt_invite_lang']));
	$home_images_sts= trim($_REQUEST['home_images_sts']);
	$dirName = 'templates/default/mrg_template/home_images/';
	$expire=time()+60*60*24*30;
	setcookie("cookie_homeimages_sts", $home_images_sts, $expire);
	if ($home_images_sts == 2)
	{	
	$male_img = trim($_FILES['uploaded_homeimage_male']['name']) ;
	$fmale_img = trim($_FILES['uploaded_homeimage_fmale']['name']) ;
	if($male_img != '' and $fmale_img != '')
		{
		$male_imgext = strtolower(strrchr($male_img,'.'));
			if($male_imgext == '.jpg' or $male_imgext == '.jpeg' or $male_imgext == '.gif' or $male_imgext == '.png')
			{			
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
			if($fmale_imgext == '.jpg' or $fmale_imgext == '.jpeg' or $fmale_imgext == '.gif' or $fmale_imgext == '.png')
			{			
			$fimage_name=time().$user_log_id.'.jpg';
			$target_path=$dirName. $fimage_name;
			move_uploaded_file($_FILES['uploaded_homeimage_fmale']['tmp_name'], $target_path); 
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resizeToWidth(350);
			$image->save("templates/default/mrg_template/home_images/".$fimage_name);
			setcookie("cookie_fimage_name", $fimage_name, $expire);
			}
		}
	else
		{
		echo 'Something went wrong. Please upload images'; exit;
		}
	}
	else
	{
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
			$image->save("templates/default/mrg_template/home_images/".$image_name);
			}
	}
	$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br /><br /><br />
			<label for='security_code'  style='width:120px;'>Security Code: </label><input id='security_code' name='security_code' type='text'  class='inputval' />";
	$smarty->assign('capchaImg', $capchaImg);		
	//$_SESSION['lastinsert_id'] = $order_list_id;
	setcookie("cookie_invite_lang", $invite_lang, $expire);
	$_SESSION['select_page_url'] = $wed_url;
	$_SESSION['grooms_name'] = $grooms_name;
	$_SESSION['brides_name'] = $brides_name;
	$_SESSION['image_name_home'] = $image_name;
	$_SESSION['wed_url_engine'] = $wed_url;
	$_SESSION['wed_invite_title'] = $invite_title;
	}
}
else if($current_page == 3)
{
	if($_SESSION['wed_invitation_access'] != 1)
	{
	$smarty->assign('err_status', 'show');
	$smarty->assign('err_req_msg', 'Invalid access.');
	$content_template = 'default/mrg_account/theme_created_fail.tpl';
	}
	else
	{
			$mrg_date= trim($_REQUEST['marriage_date']);
			$weddate= trim($_REQUEST['weddate']);
			$rec_date= trim($_REQUEST['reception_date']);
			$res_status= trim($_REQUEST['reception_status']);
			$res_status = $res_status ? 1 : 0 ;
			$rec_wed_addr_same= trim($_REQUEST['rec_wed_addr_same']);
			$mrg_location= addslashes(trim($_REQUEST['txt_area_wed_location']));
			$mrg_location = (strlen ($mrg_location) < 5) ? '' : $mrg_location ;
			$rec_location= addslashes(trim($_REQUEST['txt_area_rec_location']));
			$rec_location = (strlen ($rec_location) < 5) ? '' : $rec_location ;
			$wed_loc_info= addslashes(trim($_REQUEST['txt_area_location_info']));
			$wed_loc_info = (strlen ($wed_loc_info) < 5) ? '' : $wed_loc_info ;
			$mrg_date= addslashes($mrg_date);
			$mrg_date = (strlen ($mrg_date) < 5) ? '' : $mrg_date ;
			$rec_date= addslashes($rec_date);
			$rec_date = (strlen ($rec_date) < 5) ? '' : $rec_date ;
			$err_msg="";
			$marriage_status=0;
			if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) ) {}
			else{
			$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br /><br /><br />
					<label for='security_code'  style='width:120px;'>Security Code: </label><input id='security_code' name='security_code' type='text'  class='inputval' />";
			$smarty->assign('capchaImg', $capchaImg);
			$err_msg="Please enter valid secure code. <br />";
			$content_template = 'default/mrg_account/theme_options_1.tpl';	
			$smarty->assign('err_status', 'show');
			}
				/*
				if($mrg_location == "")
				{
				$content_template = 'default/mrg_account/theme_options_1.tpl';	
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please enter Wedding Location.";
				}*/
				if($res_status)
				{
						if($rec_date == "")
						{
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter reception date/time";
						}
						
					if($rec_wed_addr_same)
					{
						if($mrg_location == "")
						{
						$content_template = 'default/mrg_account/theme_options_1.tpl';
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter wedding location.";
						}
						
						$rec_location=$mrg_location;
						$smarty->assign('res_addr_same', "checked=true");
					}
					else
					{
						if($rec_location == "")
						{
						$content_template = 'default/mrg_account/theme_options_1.tpl';	
						$smarty->assign('txt_rec_date', $rec_date);
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter reception location.";
						}
					}
				$smarty->assign('res_chk', "checked=true");
				}
				if($res_status == 0 and $mrg_location == "")
				{
				$content_template = 'default/mrg_account/theme_options_1.tpl';	
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please enter wedding information Or Reception Information.";
				}
				if($mrg_location != '' and $mrg_date == '')
				{
				$content_template = 'default/mrg_account/theme_options_1.tpl';	
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."<br /> Please Enter Marriage Date / Time.";
				}				
				$smarty->assign('txt_weddate', $weddate);
				$smarty->assign('txt_mrg_date', $mrg_date);
				$smarty->assign('txt_rec_date', $rec_date);
				$smarty->assign('txt_area_wed_loc', $mrg_location);
				$smarty->assign('txt_area_rec_loc', $rec_location);
				$smarty->assign('txt_area_wed_info', $wed_loc_info);
				$smarty->assign('err_req_msg', $err_msg);

				// No Errors, So need to update fields and submit next page
				if($err_msg == "")
				{	
				$_SESSION['wed_invitation_access']="";
				$theme_id= trim($_SESSION['selected_themeid']);
				if($mrg_location != '')
						$marriage_status=1;

				$packid = $common_obj->getPackInfo($user_log_id);
				$packval = 'valid_'."$packid";
				$pvalue = $$packval;
				$packvalue = ($pvalue != 0) ? '+'.$pvalue.' month'  : '+'.$free_indays.' days' ;
				$endOfCycle=date('Y-m-d', strtotime($packvalue));

				$inqry= "INSERT INTO `mrg_url_status` (`mrg_url_sts_auto_id`, `mrg_main_user_id`, `mrg_page_url`,`mrg_site_start_date`, `mrg_site_end_date`, `mrg_theme_id`, `mrg_status`) VALUES (NULL, '".$user_log_id."', '".$_SESSION['wed_url_engine']."',  now() ,'".$endOfCycle."', '".$theme_id."', '1' )";
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
				$inqry= "INSERT INTO `mrg_all_info` (`info_auto_id`, `mrg_url_status_auto_id`, `male_name`, `female_name`, `marriage_date`, `marriage_location`, `reception_date`, `reception_location`, `top_heading`, `thirukkural`, `description`, `status`, `home_img`, `marriage_status`, `reception_status`, `address_details_landmark`, `mrg_res_address_same_status`, `home_img_status`, `home_male_img`, `home_female_img`, `marriage_date_only`) VALUES (NULL, '".$lastinsert_id."', '".$_SESSION['grooms_name']."' , '".$_SESSION['brides_name']."' , '".$mrg_date."', '".$mrg_location."', '".$rec_date."', '".$rec_location."', '".$_SESSION['wed_invite_title']."', '".$fin_t[$fin_thiru]."', '".$fin[$fin_des]."', '1', '".$_SESSION['image_name_home']."', ".$marriage_status.", ".$res_status.", '".$wed_loc_info."', '".$rec_wed_addr_same."', '".$cookie_homeimages_sts."', '".$cookie_male_image."', '".$cookie_female_image."', '".$weddate."')";
				$insubqry= "INSERT INTO mrg_all_info_add (addi_autoid, mrg_url_status_auto_id, wed_music_active, wed_music_id, wed_lang_id) VALUES (NULL, '".$lastinsert_id."', 0, 0, '".$cookie_invite_lang."')";
				// Move home images under Invitation folder.
				$newpath = "templates/default/mrg_template/home_images/$lastinsert_id";
				$oldpath = "templates/default/mrg_template/home_images";
				if($cookie_homeimages_sts == 2)
				{
				if (is_dir($newpath)){}else{mkdir($newpath, 0755);}
				$moveResult = copy($oldpath."/$cookie_male_image", $newpath."/$cookie_male_image");
				if($moveResult) unlink($oldpath."/$cookie_male_image");
				
				$moveResult = copy($oldpath."/$cookie_female_image", $newpath."/$cookie_female_image");
				if($moveResult) unlink($oldpath."/$cookie_female_image"); 
				}elseif($cookie_homeimages_sts == 1)
				{
				 if($_SESSION['image_name_home'] != '')
				 {
				 $sess_imgs = $_SESSION['image_name_home'];
				 if (is_dir($newpath)){}else{mkdir($newpath, 0755);}
				 $moveResult = copy($oldpath."/$sess_imgs", $newpath."/$sess_imgs");
				 if($moveResult) unlink($oldpath."/$sess_imgs");
				 }
				}
				setcookie("cookie_fimage_name", "", time()-3600);
				setcookie("cookie_mimage_name", "", time()-3600);
				setcookie("cookie_homeimages_sts", "", time()-3600);
				setcookie("cookie_invite_lang", "", time()-3600);
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
				$email_tmpl =str_replace("%usernm%", "$wedding_name", $email_tmpl);
				$finurl=$glb_site_url.$rewrite_url;
				$email_tmpl =str_replace("%succwedurl%", "$finurl", $email_tmpl);
				$sub=$wed_created_succ_subject;
				$headers .= 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
				$common_obj->simplemail($uemail, $sub, $email_tmpl, $headers);
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
$smarty->assign('currentpage_js', 'theme_select');
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
