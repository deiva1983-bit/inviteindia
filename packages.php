<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$current_action= trim($_REQUEST['do']);
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$smarty->assign('topnav_select', 'pack');
$content_template = 'default/mrg_account/packages.tpl';
$smarty->assign('currentpage_js', 'pack'); 
$smarty->assign('glb_user_log_id', $user_log_id );
$_SESSION['lastupdate_id']='';
$home_page_title = "Online wedding invitation - inviteindia.com";
$home_page_meta_desc = "Our customized online wedding invitation design portfolio has over more design templates to choose from. Select your  wedding invitation and easily create.";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$package_page_title = 'Wedding website package and features - inviteindia.com';
$package_page_title = 'Wedding website package for your budget'.$common_page_title_end;
$package_page_title = 'Cheap wedding invites - Affordable package & features';
$smarty->assign('pagetitle', $package_page_title);
$package_page_desc = "InviteIndia offers an attractive package and features for your wedding website. You can create a wedding website and select the package according to your needs.";
$package_page_desc = "Whether you're planning a small or large wedding, we've got you covered. Check out our top picks for wedding website packages!";
$package_page_desc = "Start building your dream wedding invitation within your budget. Find tips, tools, and budget-friendly packages and features.";
$smarty->assign('metadesc', $package_page_desc);
$smarty->assign('metakeywords', $package_page_keywords);
//echo $user_log_id;
setcookie("last_req_url", "", time()-3600);
$last_url = base64_encode($_SERVER['REQUEST_URI']);
setcookie("last_req_url", $last_url, $expire);
$fetchimages= "SELECT stores_autoid, name, value FROM mystores WHERE userid ='$user_log_id' ";
				$fetchimages= $userslog_obj->selectVal($fetchimages);
				$giftdetails="";
				foreach($fetchimages as $key=>$field)
                     {
					 $name =	$field['name'];
					 $value =	$field['value'];
					 }
$req_image= trim($_REQUEST['save_image']);
	if($req_image == "Save Image")
		{
			$img_des= addslashes(trim($_REQUEST['img_name']));
			$dirName = "templates/stores/$user_log_id";
			if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
			$dirName=$dirName.'/';
			if(trim($_FILES['my_img']['name']) != "")
			{
				$ext = strtolower(strrchr($_FILES['my_img']['name'],'.'));
				if($ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif' or $ext == '.png')
				{			
				$image_name=time().'.jpg';
				$target_path=$dirName. $image_name;		
				move_uploaded_file($_FILES['my_img']['tmp_name'], $target_path); 
				//$image = new SimpleImage();
				//$image->load($target_path);
				//$image->save("templates/stores/$user_log_id/".$image_name);
				}
				$inqry= "INSERT INTO mystores (stores_autoid, stores_type, userid, name, value) VALUES (NULL, '1', '".$user_log_id."', '".$img_des."', '".$image_name."')";
				$userslog_obj->insertVal($inqry);
			}
		}
$canurl = $ssl_path.'www.inviteindia.com/packages.php';
$smarty->assign('can_url', $canurl);
$smarty->assign('glb_valid_1', $valid_1);
$smarty->assign('glb_valid_2', $valid_2);
$smarty->assign('glb_valid_3', $valid_3);
$smarty->assign('glb_free_indays', $free_indays);
$smarty->assign('glb_convert_free', $glb_convert_free);
$smarty->assign('glb_price_1', $price_1);
$smarty->assign('glb_price_2', $price_2);
$smarty->assign('glb_price_3', $price_3);
$smarty->assign('glb_free_price', $free_price);

$smarty->assign('glb_price_usd_1', $price_usd_1);
$smarty->assign('glb_price_usd_2', $price_usd_2);
$smarty->assign('glb_price_usd_3', $price_usd_3);
$smarty->assign('maxcard_per_acc', $max_card_per_acc);

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
