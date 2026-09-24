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
$package_page_title = 'Wedding Website Packages & Pricing | InviteIndia';
$package_page_desc = 'Explore affordable wedding website packages and pricing at InviteIndia. Create custom Indian wedding websites, digital invitations, and RSVP experiences for your big day.';
$package_page_keywords = 'wedding website packages, wedding website pricing, Indian wedding website plans, custom wedding invitations, wedding invitation packages';
$smarty->assign('pagetitle', $package_page_title);
$smarty->assign('metadesc', $package_page_desc);
$smarty->assign('metakeywords', $package_page_keywords);
//echo $user_log_id;
setcookie("last_req_url", "", time()-3600);
$last_url = base64_encode($_SERVER['REQUEST_URI']);
setcookie("last_req_url", $last_url, $expire);
$fetchimages = array();
if ($userslog_obj->db_connect->tableExists('mystores')) {
	$fetchimages = "SELECT stores_autoid, name, value FROM mystores WHERE userid ='$user_log_id' ";
	$fetchimages = $userslog_obj->selectVal($fetchimages);
}
$giftdetails="";
foreach($fetchimages as $key=>$field)
{
	$name =	$field['name'];
	$value =	$field['value'];
}
$req_image= trim($_REQUEST['save_image']);
	if($req_image == "Save Image")
		{
			if ($userslog_obj->db_connect->tableExists('mystores')) {
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
		}
$canurl = 'https://www.inviteindia.com/packages.php';
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
