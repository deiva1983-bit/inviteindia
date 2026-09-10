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
if($current_action == 'b12d'){
$_SESSION['wed_invitation_access'] = 1;
	if($wedid != "")
	{
		$butt_sub= trim($_REQUEST['butt_website_settings']);
		if($butt_sub == 'Submit')
		{
			//$weddate means wedding date without style
			$weddate = trim($_REQUEST['weddate']);
			$upimg="";
			$home_images_sts= trim($_REQUEST['home_images_sts']);	
			$upimg=" , home_img_status = $home_images_sts";
			$wed_ids = $_SESSION['lastupdate_id'];
			$err_msg="";
			if($weddate == ''){
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please enter your wedding date. <br />";
				}
			if($home_images_sts == 2)
			{
				
				$male_img = trim($_FILES['uploaded_homeimage_male']['name']) ;
				$fmale_img = trim($_FILES['uploaded_homeimage_fmale']['name']) ;
				if($male_img != '' or $fmale_img != '')
					{
					$dirName = "templates/default/mrg_template/home_images/$wed_ids";
					if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
					$dirName = $dirName.'/';
					$male_imgext = strtolower(strrchr($male_img,'.'));
						if($male_imgext == '.jpg' or $male_imgext == '.jpeg' or $male_imgext == '.gif' or $male_imgext == '.png')
						{			
						$mimage_name=$user_log_id.time().'.jpg';
						$upimg .= " , home_male_img = '".$mimage_name."' ";
						$target_path=$dirName. $mimage_name;		
						move_uploaded_file($_FILES['uploaded_homeimage_male']['tmp_name'], $target_path); 
						$image = new SimpleImage();
						$image->load($target_path);
						if ($image->getWidth() > 250)
						$image->resizeToWidth(250);
						$image->save($dirName.$mimage_name);
						}
					$fmale_imgext = strtolower(strrchr($fmale_img,'.'));
						if($fmale_imgext == '.jpg' or $fmale_imgext == '.jpeg' or $fmale_imgext == '.gif' or $fmale_imgext == '.png')
						{			
						$fimage_name=time().$user_log_id.'.jpg';
						$upimg .= " , home_female_img = '".$fimage_name."' ";
						$target_path=$dirName. $fimage_name;		
						move_uploaded_file($_FILES['uploaded_homeimage_fmale']['tmp_name'], $target_path); 
						$image = new SimpleImage();
						$image->load($target_path);
						if ($image->getWidth() > 250)
						$image->resizeToWidth(250);
						$image->save($dirName.$fimage_name);
						}
					}
			}
			elseif($home_images_sts == 1)
			{
				$dirName = "templates/default/mrg_template/home_images/$wed_ids";
				if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
				$dirName = $dirName.'/';
				$sing_img = trim($_FILES['uploaded_homeimage']['name']) ;	
				$sing_imgext = strtolower(strrchr($sing_img,'.'));		
				
				if($sing_imgext == '.jpg' or $sing_imgext == '.jpeg' or $sing_imgext == '.gif' or $sing_imgext == '.png')
				{			
				$image_name=$user_log_id.time().'.jpg';
				$upimg.=" , home_img = '".$image_name."' ";
				$target_path=$dirName. $image_name;		
				move_uploaded_file($_FILES['uploaded_homeimage']['tmp_name'], $target_path); 
				$image = new SimpleImage();
				$image->load($target_path);
				if ($image->getWidth() > 350)
						$image->resizeToWidth(350);
				
				$image->save($dirName.$image_name);
				
				}
			}
			$invite_title= addslashes(trim($_REQUEST['txt_invite_title']));
			$invite_lang= addslashes(trim($_REQUEST['txt_invite_lang']));
			$invite_lang_old= addslashes(trim($_REQUEST['txt_lang_old']));
			if($invite_lang_old != $invite_lang) {
				$chkqryres_add= "SELECT url_add.wed_lang_id FROM mrg_all_info_add url_add WHERE url_add.mrg_url_status_auto_id = '".$wedid."' ";
				$selectaddi = $userslog_obj->selectAffectedRows($chkqryres_add);
				$lang_id = 1;
					if($selectaddi){
						$upqryadd= "UPDATE mrg_all_info_add SET wed_lang_id = '".$invite_lang."' WHERE mrg_url_status_auto_id ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
						$userslog_obj->updateVal($upqryadd);

						// Fetch Random description
						$fin_des='des_auto_id';
						$fin = $common_obj->getrandomdata('mrg_mas_des', $fin_des, " des_status=1 and desc_user_id =0 and lang_id = $invite_lang ");
						// Fetch Random description
						$fin_thiru='kural_auto_id';
						$fin_t = $common_obj->getrandomdata('mrg_mas_thirukural', $fin_thiru, "kural_status=1 and kural_user_id=0 and lang_id = $invite_lang");
						//echo $fin_t[$fin_thiru]."---".$fin[$fin_des]; //`thirukkural`, `description`
						$upimg.=" , thirukkural = '".$fin_t[$fin_thiru]."',  description = '".$fin[$fin_des]."' ";
					}
			}
			$upqry= "UPDATE mrg_all_info SET marriage_date_only = '".$weddate."', top_heading = '".$invite_title."' $upimg WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);
			if($order_list_id)
			{			
			$smarty->assign('alert_msg', 'Your personal information has been updated successfully.');
			$smarty->assign('alert_status', '1');
			}
			$smarty->assign('page_status_events', 'edit');
		}
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_access= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_access))
		{
			$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, url_sts.mrg_page_url, info.male_name, info.female_name, info.top_heading, info.marriage_date, info.marriage_location, info.reception_date, info.reception_location, info.home_img, info.marriage_status, info.reception_status, info.mrg_res_address_same_status, info.address_details_landmark, info.home_img_status, info.home_male_img, info.home_female_img, info.marriage_date_only FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id ";
			$selectwedres_access= $userslog_obj->selectVal($chkqryres);
			$chkqryres_add= "SELECT url_add.wed_lang_id FROM mrg_all_info_add url_add WHERE url_add.mrg_url_status_auto_id = '".$wedid."' ";
			$selectaddi = $userslog_obj->selectAffectedRows($chkqryres_add);
			$lang_id = 1;
			if($selectaddi){
				$add_access = $userslog_obj->selectVal($chkqryres_add);
				$lang_id = $add_access[0]['wed_lang_id'];
				}

			$_SESSION['lastupdate_id'] = $selectwedres_access[0]['mrg_url_sts_auto_id'];
			// List avilable wed URLs.
			$smarty->assign('wed_lang_id', $lang_id );
			$smarty->assign('img_status', $selectwedres_access[0]['home_img_status'] );
			$smarty->assign('wed_acc_id', $wedid );
			$smarty->assign('do_val', $current_action);			
			$smarty->assign('selectwedres_access', $selectwedres_access );
			$content_template = 'default/mrg_account/theme_options_edit_1.tpl';
		}
		else
		{ 
			echo "Sorry something Wrong, Please try again.";
		}
	}
	else
	{ 
		echo "Sorry something Wrong, Please try again.";
	}

}else if($current_action == 'b12dsan' and $current_page == '2' and $_SESSION['lastupdate_id'] != '')
{
	$wedid=$_SESSION['lastupdate_id'];
		$butt_sub= trim($_REQUEST['butt_create_web_invit_step2']);
		if($butt_sub == 'Submit')
		{
			//$weddate means wedding date without style
			$weddate= trim($_REQUEST['weddate']);
			$mrg_date= trim($_REQUEST['marriage_date']);
			$rec_date= trim($_REQUEST['reception_date']);
			$res_status= trim($_REQUEST['reception_status']);
			$addr_same_status= trim($_REQUEST['rec_wed_addr_same']);
			$res_status = $res_status ? 1 : 0 ;
			$addr_same_status = $addr_same_status ? 1 : 0 ;
			$rec_wed_addr_same= trim($_REQUEST['rec_wed_addr_same']);
			$mrg_location= addslashes(trim($_REQUEST['txt_area_wed_location']));
			$mrg_location = (strlen ($mrg_location) < 5 ) ? '' : $mrg_location ;
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
			/*if($mrg_date == "")
						{
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter marriage date/time";
						} */
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
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter wedding location.";
						}
					$rec_location=$mrg_location;
					}
					else
					{
						if($rec_location == "")
						{
						$smarty->assign('txt_rec_date', $rec_date);
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter reception location.";
						}
					}
				}
		        if($res_status == 0 and $mrg_location == "")
				{
				$content_template = 'default/mrg_account/theme_options_edit_2.tpl';	
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please enter wedding information Or Reception Information.";
				}
				if($mrg_location != '' and $mrg_date == '')
				{
				$content_template = 'default/mrg_account/theme_options_edit_2.tpl';	
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please Enter Marriage Date / Time.";
				}
				if($weddate == "")
				{
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please Enter Wedding/Reception Date.";
				}
				$smarty->assign('weddate_only', $weddate);
				$smarty->assign('txt_mrg_date', $mrg_date);
				$smarty->assign('txt_rec_date', $rec_date);
				$smarty->assign('txt_area_wed_loc', $mrg_location);
				$smarty->assign('txt_area_rec_loc', $rec_location);
				$smarty->assign('txt_area_wed_info', $wed_loc_info);
				$smarty->assign('err_req_msg', $err_msg);
				$smarty->assign('page_status_events', 'edit');
				// No Errors, So need to update fields and submit next page	
				if($err_msg == "")
				{
				if($mrg_location != '')
				$marriage_status=1;
				$upqry= "UPDATE mrg_all_info SET marriage_status = '".$marriage_status."', marriage_date = '".$mrg_date."', marriage_location='".$mrg_location."',reception_date='".$rec_date."',reception_location='".$rec_location."', `reception_status`='".$res_status."', `mrg_res_address_same_status`='".$addr_same_status."', marriage_date_only ='".$weddate."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);
				$smarty->assign('alert_msg', 'Your Event details are updated successfully.');

				}
		 $addr_same_status = ($addr_same_status) ? "checked=true" : "" ;
		}
		$content_template = 'default/mrg_account/theme_options_edit_2.tpl';
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_access= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_access))
		{
		// Preload all existing datas.
		$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, info.marriage_date, info.marriage_location, info.reception_date, info.reception_location, info.home_img, info.marriage_status, info.reception_status, info.mrg_res_address_same_status, info.address_details_landmark, info.marriage_date_only FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id ";
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);
		if($butt_sub == '')
			{
			$res_status = $selectwedres_access[0]['reception_status'];
			$addr_same_status = ($selectwedres_access[0]['mrg_res_address_same_status']) ? "checked=true" : "" ;
			}
		$smarty->assign('selectwedres_access_2', $selectwedres_access );
		} 
	$smarty->assign('res_addr_same', $addr_same_status);
	$smarty->assign('res_chk', $res_status);
	$smarty->assign('do_val', $current_action);
}
else if($current_action == 'b12land' and $current_page == '3' and $_SESSION['lastupdate_id'] != '')
{
		$butt_sub= trim($_REQUEST['butt_create_web_invit_step3']);
		if($butt_sub == 'Submit')
		{
		$wed_loc_info= addslashes(trim($_REQUEST['txt_area_location_info']));
		$smarty->assign('txt_area_wed_info', $wed_loc_info);
		$_SESSION['wed_invitation_access']="";
		$upqry= "UPDATE mrg_all_info SET address_details_landmark='".$wed_loc_info."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		$smarty->assign('alert_msg', 'Your Landmark details are updated successfully.');
		$smarty->assign('page_status_events', 'edit');
		}
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_access= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_access))
		{
		// Preload all existing datas.
		$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, info.address_details_landmark FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id ";
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);
		$smarty->assign('selectwedres_access_3', $selectwedres_access );
		}
		$smarty->assign('do_val', $current_action);
		$content_template = 'default/mrg_account/theme_options_edit_3.tpl';
}
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus);
$smarty->assign('user_log_id', $user_log_id );
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
