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
$home_page_title = "Free wedding website | Create Online wedding invitation | customize your wedding card";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates"; 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$current_type= trim($_REQUEST['type']);
$current_wedid= trim($_REQUEST['wedid']);
$smarty->assign('currentpage_js', 'theme_select_edit');
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$current_wedid."' and mrg_main_user_id = '".$user_log_id."' ";
	$selectwed_acces= $userslog_obj->selectVal($chkqry);
	if(count($selectwed_acces))
	{		
	$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
	}
	else
	{
	exit;
	}
if($current_action == 'manph'){

$_SESSION['wed_settings_access'] = 1;
	if($current_wedid != "")
	{

		$up_img=trim($_REQUEST['save_image']);
		$up_change=trim($_REQUEST['change']);
		
		if($up_img == "Save Image")
		{
			$txt_img_des= addslashes(trim($_REQUEST['txt_img_des']));
			$dirName = "templates/albums/$current_wedid";
			if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
			$dirName=$dirName.'/';
			
			$imagesize = $common_obj->getImageSize($_FILES['uploaded_albumimage']['tmp_name']);
			if($imagesize < 201) {
			if(trim($_FILES['uploaded_albumimage']['name']) != "")
			{
				$ext = strtolower(strrchr($_FILES['uploaded_albumimage']['name'],'.'));
				if($ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif' or $ext == '.png')
				{			
				$image_name=time().'.jpg';
				$target_path=$dirName. $image_name;		
				move_uploaded_file($_FILES['uploaded_albumimage']['tmp_name'], $target_path); 
				$image = new SimpleImage();
				$image->load($target_path);
				//$image->resizeToWidth(350);
				$image->save("templates/albums/$current_wedid/".$image_name);
				}
				$inqry= "INSERT INTO mrg_photos (photo_auto_id, photo_owner_id, photo_des,photo_path, photo_status, added_date) VALUES (NULL, '".$current_wedid."', '".$txt_img_des."', '".$image_name."', '1', now() )";				 
				$userslog_obj->insertVal($inqry);
			}
			} else {
			echo 'Sorry, We are unable to upload your images, Maximum image size is: 200kb.';
			}
		}
		
		if($up_change=='d')
		{
		$up_changeid=trim($_REQUEST['changeid']);
		$imgupqry="UPDATE `mrg_photos` SET `photo_status` = '0' WHERE `photo_owner_id` =$current_wedid and photo_auto_id = $up_changeid LIMIT 1";
		$userslog_obj->updateVal($imgupqry);		
		}else if($up_change=='e')
		{
		$up_changeid=trim($_REQUEST['changeid']);
		$imgupqry="UPDATE `mrg_photos` SET `photo_status` = '1' WHERE `photo_owner_id` =$current_wedid and photo_auto_id = $up_changeid LIMIT 1";
		$userslog_obj->updateVal($imgupqry);
		}

		$chkqry= "SELECT photo_path, photo_name, photo_des, photo_status FROM mrg_photos where photo_owner_id  ='".$current_wedid."' ";

		$selectphoto_access= $userslog_obj->selectVal($chkqry);

		$limit = 1;
		$page="";
		
		if(isset($_REQUEST['f_list']) && ($_REQUEST['f_list']!=""))
		{
   		$page=$_REQUEST['f_list'];
   		$start = ($page - 1) * $limit;
		}
		else
		{
   		$start = 0;
		}
		$varname="f_list";

		$c_action=$_REQUEST['action']; // Inner action
		

		$targetpage =$page_url."?wedid=$current_wedid&do=manph&type=frmg";
		
		 
		$chkqrys= "SELECT photo_path, photo_name, photo_des, photo_auto_id,photo_status FROM mrg_photos where photo_owner_id  ='".$current_wedid."' LIMIT  $start ,$limit";

		//echo $chkqrys;
		$selectsms_friends_page= $userslog_obj->selectVal($chkqrys);
		$selectsms_friends= $userslog_obj->selectVal($chkqry);
		$total_records      = count($selectphoto_access);	

		$img_urls= $glb_site_url."templates/albums/$current_wedid/".trim($selectsms_friends_page[0]['photo_path']);
		$img_id=$selectsms_friends_page[0]['photo_auto_id'];
		$smarty->assign('total_imgs', $img_urls);
		$smarty->assign('img_ids', $img_id);
		$img_id=$selectsms_friends_page[0]['photo_auto_id'];
		$img_sts=$selectsms_friends_page[0]['photo_status'];
		$disable_link = "<a href=wedsettings.php?wedid=$current_wedid&do=manph&type=frmg&change=d&f_list=$page&changeid=$img_id alt=Disable><span id=links_red><b>Disable</b></span></a>";
		$enable_link = "<a href=wedsettings.php?wedid=$current_wedid&do=manph&type=frmg&change=e&f_list=$page&changeid=$img_id	alt=Enable><span id=links_green><b>Enable</b></span></a>";
		$msg_action_url = ($img_sts == 1) ? "$disable_link" : "$enable_link" ;
                      
		$smarty->assign('action_url', $msg_action_url);	
		$pagination= $common_obj->Pagination($total_records,$limit,$targetpage,$page,$start,$varname);
		$smarty->assign('pagenation', $pagination); 
		// Comments section
		$chkqry1= "SELECT comm_comments,comm_name, comm_date FROM `mrg_comments` WHERE comm_owner_id ='".$current_wedid."' and comm_img_id='".$img_id."' ORDER BY comm_date DESC";
		$selectcomm= $userslog_obj->selectVal($chkqry1);
        $commdetails="";
		$comm_added_status=0;
		foreach($selectcomm as $key=>$field)
                     {
					 $comm_added_status=1;
                     $subjectname="";
                     $msginfo =wordwrap($field['comm_comments'], 23, "\n", true);
                     $name =wordwrap($field['comm_name']);
                     $date =$field['comm_date'];
                     $commdetails.="<div id=mrgwish>".$name.":</div><div>".$msginfo."</div><div id=border_line></div>";
                     }


		$smarty->assign('glb_comm_added_status', $comm_added_status);
		$smarty->assign('glb_total_pagination', $pagination);
		$smarty->assign('glb_total_records', $total_records);
		$smarty->assign('glb_curr_wedid', $current_wedid);
		$smarty->assign('glb_commdetails', $commdetails);
		$content_template = 'default/mrg_account/wed_album.tpl';
	}
	else
	{ 
		echo "Sorry something Wrong, Please try again.";
	}
$home_page_title = "Free wedding website | Manage wedding album";
$home_page_meta_desc = "Create your wedding invitation with colourful themes with more features and share with your friends, You can manage wedding album.";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates, Wedding album";
}else if($current_action == 'b12dsan' and $current_page == '2' and $_SESSION['lastupdate_id'] != '')
{
	$wedid=$_SESSION['lastupdate_id'];
	if($_SESSION['wed_invitation_access'] != 1)
	{
	$smarty->assign('err_status', 'show');
	$smarty->assign('err_req_msg', 'Invalid access.');
	$content_template = 'default/mrg_account/theme_created_fail.tpl';
	}
	else
	{
	$content_template = 'default/mrg_account/theme_options_edit_2.tpl';	
	$grooms_name= addslashes(trim($_REQUEST['txt_grooms_name']));
	$brides_name= addslashes(trim($_REQUEST['txt_brides_name']));
	$dirName = 'templates/default/mrg_template/home_images/';
			$ext = strtolower(strrchr($_FILES['uploaded_homeimage']['name'],'.'));
			if($ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif' or $ext == '.png')
			{			
			$image_name=time().'.jpg';
			$target_path=$dirName. $image_name;		
			move_uploaded_file($_FILES['uploaded_homeimage']['tmp_name'], $target_path); 
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resizeToWidth(350);
			$image->save("templates/default/mrg_template/home_images/".$image_name);
			}
	$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br /><br /><br />
			<label for='security_code'  style='width:120px;'>Security Code: </label><input id='security_code' name='security_code' type='text'  class='inputval' />";
	$smarty->assign('capchaImg', $capchaImg);	
	
		// Preload all existing datas.
		$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, info.marriage_date, info.marriage_location, info.reception_date, info.reception_location, info.home_img, info.marriage_status, info.reception_status, info.mrg_res_address_same_status, info.address_details_landmark FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id ";		 
		$selectwedres_access= $userslog_obj->selectVal($chkqryres);

        $addr_same_status = ($selectwedres_access[0]['mrg_res_address_same_status']) ? "checked=true" : "" ;
		 
		$smarty->assign('res_addr_same', $addr_same_status);
		$smarty->assign('res_chk', $selectwedres_access[0]['reception_status']);
		$smarty->assign('selectwedres_access_2', $selectwedres_access );

	$_SESSION['grooms_name'] = $grooms_name;
	$_SESSION['brides_name'] = $brides_name;
	$_SESSION['image_name_home'] = $image_name;
	//echo $_SESSION['grooms_name'];
	}
}
else if($current_action == 'dz23sl' and $current_page == '3' and $_SESSION['lastupdate_id'] != '')
{
	if($_SESSION['wed_invitation_access'] != 1 or $_SESSION['grooms_name'] == "" or $_SESSION['brides_name'] == "" )
	{
	$smarty->assign('err_status', 'show');
	$smarty->assign('err_req_msg', 'Invalid access.');
	$content_template = 'default/mrg_account/theme_created_fail.tpl';
	}
	else
	{
			$mrg_date= trim($_REQUEST['marriage_date']);
			$rec_date= trim($_REQUEST['reception_date']);
			$res_status= trim($_REQUEST['reception_status']);
			$addr_same_status= trim($_REQUEST['rec_wed_addr_same']);
			$res_status = $res_status ? 1 : 0 ;
			$addr_same_status = $addr_same_status ? 1 : 0 ;
			$rec_wed_addr_same= trim($_REQUEST['rec_wed_addr_same']);
			$mrg_location= addslashes(trim($_REQUEST['txt_area_wed_location']));
			$rec_location= addslashes(trim($_REQUEST['txt_area_rec_location']));
			$wed_loc_info= addslashes(trim($_REQUEST['txt_area_location_info']));
			$err_msg="";
			if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) ) {}
			else{			
			$err_msg="Please enter valid secure code. <br />";
			$content_template = 'default/mrg_account/theme_options_edit_2.tpl';	
			$smarty->assign('err_status', 'show');
			}

			$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br /><br /><br />
					<label for='security_code'  style='width:120px;'>Security Code: </label><input id='security_code' name='security_code' type='text'  class='inputval' />";
			$smarty->assign('capchaImg', $capchaImg);

				if($mrg_location == "")
				{
				$content_template = 'default/mrg_account/theme_options_edit_2.tpl';	
				$smarty->assign('err_status', 'show');
				$err_msg = $err_msg."Please enter Wedding Location.";
				}

				if($res_status)
				{
					if($rec_wed_addr_same)
					{
					$rec_location=$mrg_location;
					}
					else
					{
						if($rec_location == "")
						{
						$content_template = 'default/mrg_account/theme_options_edit_2.tpl';	
						$smarty->assign('txt_rec_date', $rec_date);
						$smarty->assign('err_status', 'show');
						$err_msg = $err_msg."<br /> Please enter reception location.";
						}
					}
				}
		        $addr_same_status = ($addr_same_status) ? "checked=true" : "" ;
		 
				$smarty->assign('res_addr_same', $addr_same_status);
				$smarty->assign('res_chk', $res_status);
				$smarty->assign('txt_mrg_date', $mrg_date);
				$smarty->assign('txt_rec_date', $rec_date);
				$smarty->assign('txt_area_wed_loc', $mrg_location);
				$smarty->assign('txt_area_rec_loc', $rec_location);
				$smarty->assign('txt_area_wed_info', $wed_loc_info);
				$smarty->assign('err_req_msg', $err_msg);
				if($_SESSION['image_name_home'] != "")
					$upimg=" , home_img = '".$_SESSION['image_name_home']."' ";
				else
					$upimg="";
				// No Errors, So need to update fields and submit next page	
				if($err_msg == "")
				{	
				$_SESSION['wed_invitation_access']="";
				$upqry= "UPDATE mrg_all_info SET male_name = '".$_SESSION['grooms_name']."',female_name = '".$_SESSION['brides_name']."', marriage_date = '".$mrg_date."', marriage_location='".$mrg_location."',reception_date='".$rec_date."',reception_location='".$rec_location."' $upimg ,address_details_landmark='".$wed_loc_info."', `reception_status`='".$res_status."', `mrg_res_address_same_status`='".$addr_same_status."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);
			 
				//$content_template = 'default/mrg_account/theme_created_success.tpl';
				header("Location: e-wedding.php?do=dbven");
				exit;
				}
	}
}
else if($current_action == 'manwish')
{
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

                     //$msgdetails.="<blockquote><p>Sed sodales nisl sit amet augue. Donec ultrices, augue ullamcorper posuere laoreet, turpis massa tristique justo, sed egestas metus magna sed purus.</p></blockquote>
                     }

 					 $smarty->assign('total_msg', $tot_msg);
					 $smarty->assign('wishdetails', $wishdetails);
	$content_template = 'default/mrg_account/wed_wish_manage.tpl';

	}
	$home_page_title = "Free wedding website | Manage wedding wishes";
$home_page_meta_desc = "Create your wedding invitation with colourful themes with more features and share with your friends, You can manage wedding wishes.";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates, Wedding wishes";
}else if($current_action == 'chgsts')
{
	if ($common_obj->matchUID_WedID($user_log_id, $current_wedid))
	{

		if($current_type==2) // Disable Wedding card
		{
		$upqry= "UPDATE mrg_url_status SET mrg_status = '2' WHERE mrg_url_sts_auto_id =$current_wedid and mrg_main_user_id=$user_log_id   LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		header("Location: e-wedding.php?do=stsdis");		
		}
		else if($current_type==1) // Enable Wedding card
		{
		$upqry= "UPDATE mrg_url_status SET mrg_status = '1' WHERE mrg_url_sts_auto_id =$current_wedid and mrg_main_user_id=$user_log_id   LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		header("Location: e-wedding.php?do=stsenbl");
		}
		exit;

	}
}
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
// List avilable wed URLs.

$smarty->assign('wed_acc_id', $current_wedid );
$smarty->assign('do_val', $current_action);

//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
