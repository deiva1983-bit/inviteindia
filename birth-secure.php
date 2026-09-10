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
$bid= trim($_REQUEST['b_id']);
$smarty->assign('local_add', $local_add);
$page_allowed=$common_obj->matchUID_BirthID($user_log_id, $bid);
$smarty->assign('birth_acc_id', $bid );
if($current_action == 'b12d'){
$_SESSION['wed_invitation_access'] = 1;
	if($bid != "") {
		$butt_sub= trim($_REQUEST['butt_edit_1']);
		if($butt_sub == 'Submit') {
			$birth_ids = $_SESSION['lastupdate_id_wedd'];				
				$homeimage = trim($_FILES['uploaded_homeimage']['name']) ;
				$upimg = '';
				if($homeimage != ''){
					$dirName = "templates/default/birth_template/home_images/$birth_ids";
					if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
					$dirName = $dirName.'/';
					$imgext = strtolower(strrchr($homeimage,'.'));
						if($imgext == '.jpg' or $imgext == '.jpeg' or $imgext == '.gif' or $imgext == '.png') {
						$mimage_name=$user_log_id.time().'.jpg';
						$upimg .= " , 	home_img = '".$mimage_name."' ";
						$target_path=$dirName. $mimage_name;
						move_uploaded_file($_FILES['uploaded_homeimage']['tmp_name'], $target_path); 
						$image = new SimpleImage();
						$image->load($target_path);
						if ($image->getWidth() > 500)
						$image->resizeToWidth(500);
						if ($image->getHeight() > 500)
						$image->resizeToHeight(500);
						$image->save($dirName.$mimage_name);
						}
					}
			
			$person_name= addslashes(trim($_REQUEST['txt_bperson_name']));
			if($person_name != ''){
			$upimg .= " , 	person_name = '".$person_name."' ";
			}
			$person_dob= $_REQUEST['bperson_dob'];
			$host_name= $_REQUEST['txt_hoster_name'];
			$host_num= $_REQUEST['txt_hoster_num'];
			$dob_count= $_REQUEST['txt_bperson_dob_count'];
			$invite_title= addslashes(trim($_REQUEST['txt_invite_title']));
			$p_dob = date('Y-m-d', strtotime(str_replace('-', '/', $person_dob)));
			$upqry= "UPDATE birty_all_info SET person_dob = '".$p_dob."', txt_bperson_dob_count = '".$dob_count."', hoster_name = '".$host_name."', hoster_num = '".$host_num."', invitation_title 	= '".$invite_title."' $upimg WHERE `birty_url_auto_id` ='".$birth_ids."' LIMIT 1 " ;
			$list_id = $userslog_obj->updateVal($upqry);
			if($list_id)
			{			
			$smarty->assign('alert_msg', 'Your personal details has been successfully updated.');
			$smarty->assign('alert_status', '1');
			}
		}


			$chkqryres= "SELECT url_sts.birth_url_sts_auto_id, info.person_name, info.person_dob, info.txt_bperson_dob_count, info.invitation_title, info.home_img, info.hoster_name, info.hoster_num FROM birth_url_status url_sts, birty_all_info info WHERE url_sts.birth_url_sts_auto_id = '".$bid."' AND url_sts.birth_url_sts_auto_id = info.birty_url_auto_id ";
			$selectbirth_access= $userslog_obj->selectVal($chkqryres);
			// List avilable wed URLs.
			$_SESSION['lastupdate_id_wedd'] = $selectbirth_access[0]['birth_url_sts_auto_id'];
			$smarty->assign('do_val', $current_action);
			$smarty->assign('selectbirth_access', $selectbirth_access );
			$content_template = 'default/birth_account/birth_edit_1.tpl'; 	
	}
	else
	{ 
		echo "Sorry something Wrong, Please try again.";
	}

}else if($current_action == 'b12dsan' and $current_page == '2') {
	$wedid=$_SESSION['lastupdate_id']; 
		$butt_sub= trim($_REQUEST['butt_invit_step2']);
		if($butt_sub == 'Submit') {
			//$weddate means wedding date without style
			$birth_title= trim($_REQUEST['txt_birth_title']);
			$birth_location= addslashes(trim($_REQUEST['txt_area_birth_location']));
			$birth_location = (strlen ($birth_location) < 5 ) ? '' : $birth_location ;
			$lat_birth= trim($_REQUEST['lat_birth']);
			$lng_birth= trim($_REQUEST['lng_birth']);
			$addr_postcode= trim($_REQUEST['addr_postcode']);
			$event_date= trim($_REQUEST['bperson_event_date']);
			$birth_status= trim($_REQUEST['map_birth_status']);
			$p_event_date = date('Y-m-d', strtotime(str_replace('-', '/', $event_date)));
			$err_msg="";
			$marriage_status=0;
			echo $mrg_date;

			if($birth_location == "") {
			$smarty->assign('err_status', 'show');
			$err_msg = $err_msg."<br /> Please enter your event location, date & time details.";
			}

			if($event_date == "") {
			$smarty->assign('err_status', 'show');
			$err_msg = $err_msg."<br /> Please enter event date.";
			}				
		        
			$smarty->assign('txt_birth_title', $birth_title);
			$smarty->assign('txt_birth_location', $birth_location);
			$smarty->assign('txt_lat_birth', $lat_birth);
			$smarty->assign('txt_lng_birth', $lng_birth);
			$smarty->assign('txt_addr_postcode', $addr_postcode);
			$smarty->assign('txt_event_date', $p_event_date);
			$smarty->assign('err_req_msg', $err_msg);
			$smarty->assign('txt_err_statusg', $err_status);
			$smarty->assign('txt_birth_status', $birth_status);
			// No Errors, So need to update fields and submit next page	
			if($err_msg == "") {
			$upqry= "UPDATE birty_all_info SET event_title = '".$birth_title."', person_event_addr = '".$birth_location."', gmap_lat='".$lat_birth."',gmap_long='".$lng_birth."' , event_postalcode='".$addr_postcode."', event_gmap_status='".$birth_status."', person_event_date = '".$p_event_date."' WHERE birty_url_auto_id ='".$bid."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);
			$smarty->assign('alert_msg', 'Your Event details are updated successfully.');
			}
		 $addr_same_status = ($addr_same_status) ? "checked=true" : "" ;
		}
		$content_template = 'default/birth_account/birth_edit_2.tpl';		
		// Preload all existing datas.
		$chkqryres= "SELECT url_sts.birth_url_sts_auto_id, info.person_event_date, info.person_event_addr, info.event_postalcode, info.gmap_lat, info.gmap_long, info.event_title, info.event_gmap_status  FROM  birth_url_status url_sts, birty_all_info info WHERE url_sts.birth_url_sts_auto_id = '".$bid."' AND url_sts.birth_url_sts_auto_id = info.birty_url_auto_id ";
		$birthaccess= $userslog_obj->selectVal($chkqryres);
		$smarty->assign('birthaccess_access_2', $birthaccess );
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
 // Start Guest book settings
else if($current_action == 'b12lasm') {
	$change_msgstatus = trim($_REQUEST['change']);
	$changeid = trim($_REQUEST['changeid']);
	$_SESSION['wed_settings_access'] = 1;

	if($current_wedid != "")
	{
	if($change_msgstatus != "")
		{
		$update_val = ($change_msgstatus == 'e') ? '1' : '0';
		$upqry= "UPDATE `wedding_msg` SET msg_status = '".$update_val."' WHERE `wedding_id` =$current_wedid and wed_owner_id=$user_log_id and  auto_id=$changeid LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		}

	 $chkqry= "SELECT messages,name,date,msg_status,auto_id FROM `wedding_msg` WHERE `wedding_id` =$current_wedid and wed_owner_id=$user_log_id ORDER BY date DESC";

            $selectsms_access= $userslog_obj->selectVal($chkqry);
			$tot_msg = count ($selectsms_access);
            $wishdetails="";
	 		foreach($selectsms_access as $key=>$field)
                     {
					 $subjectname="";
                     $cdate= $field['date'];
                     $msg_status= $field['msg_status'];
					 $auto_id= $field['auto_id'];
					 $disable_link = "<a href=wedsettings.php?wedid=$current_wedid&do=manwish&type=frmg&change=d&changeid=$auto_id alt=Disable><span id=links_red><b>Disable</b></span></a>";
					 $enable_link = "<a href=wedsettings.php?wedid=$current_wedid&do=manwish&type=frmg&change=e&changeid=$auto_id	alt=Enable><span id=links_green><b>Enable</b></span></a>";
					 $msg_action_url = ($msg_status == 1) ? "$disable_link" : "$enable_link" ;
                     $date =date('jS F, Y', strtotime("$cdate"));
                     $msginfo =wordwrap($field['messages'], 80, '<br />', true);
                     $name =wordwrap($field['name'], 23, "<br />", true);
                     $wishdetails.="<div id='wishtabs'><div class='wisher-name'>".$name.":</div><div class='wisher-comments'><p>".$msginfo."</p></div><div class='descr'>".$date." &nbsp;&nbsp;&nbsp;&nbsp;| <span>".$msg_action_url."</span></div></div><div id='border_line'></div>";
                     }

 					 $smarty->assign('total_msg', $tot_msg);
					 $smarty->assign('wishdetails', $wishdetails);
	$content_template = 'default/mrg_account/wed_wish_manage.tpl';
	}
}
// End Guest book settings

 // Start Guest book settings
else if($current_action == 'ani') {
	$change_msgstatus = trim($_REQUEST['change']);
	$changeid = trim($_REQUEST['changeid']);
	$_SESSION['wed_settings_access'] = 1;

	if($current_wedid != "")
	{
	if($change_msgstatus != "")
		{
		$update_val = ($change_msgstatus == 'e') ? '1' : '0';
		$upqry= "UPDATE `wedding_msg` SET msg_status = '".$update_val."' WHERE `wedding_id` =$current_wedid and wed_owner_id=$user_log_id and  auto_id=$changeid LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		}

	 $chkqry= "SELECT messages,name,date,msg_status,auto_id FROM `wedding_msg` WHERE `wedding_id` =$current_wedid and wed_owner_id=$user_log_id ORDER BY date DESC";

            $selectsms_access= $userslog_obj->selectVal($chkqry);
			$tot_msg = count ($selectsms_access);
            $wishdetails="";
	 		foreach($selectsms_access as $key=>$field)
                     {
					 $subjectname="";
                     $cdate= $field['date'];
                     $msg_status= $field['msg_status'];
					 $auto_id= $field['auto_id'];
					 $disable_link = "<a href=wedsettings.php?wedid=$current_wedid&do=manwish&type=frmg&change=d&changeid=$auto_id alt=Disable><span id=links_red><b>Disable</b></span></a>";
					 $enable_link = "<a href=wedsettings.php?wedid=$current_wedid&do=manwish&type=frmg&change=e&changeid=$auto_id	alt=Enable><span id=links_green><b>Enable</b></span></a>";
					 $msg_action_url = ($msg_status == 1) ? "$disable_link" : "$enable_link" ;
                     $date =date('jS F, Y', strtotime("$cdate"));
                     $msginfo =wordwrap($field['messages'], 80, '<br />', true);
                     $name =wordwrap($field['name'], 23, "<br />", true);
                     $wishdetails.="<div id='wishtabs'><div class='wisher-name'>".$name.":</div><div class='wisher-comments'><p>".$msginfo."</p></div><div class='descr'>".$date." &nbsp;&nbsp;&nbsp;&nbsp;| <span>".$msg_action_url."</span></div></div><div id='border_line'></div>";
                     }

 					 $smarty->assign('total_msg', $tot_msg);
					 $smarty->assign('wishdetails', $wishdetails);
	$content_template = 'default/mrg_account/wed_wish_manage.tpl';
	}
}

//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/birth_account/left_nav_for_birth.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') ); echo $content_template;
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
