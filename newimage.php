<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
ini_set("upload_max_filesize","300M");
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('do_val', 'chgbg');
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Wedding invitations -Classic theme settings - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Add background music for your wedding invitation and share with your friends - inviteindia";
$home_page_meta_key = "wedding animations, wedding ecards, wedding animations, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$wedid= trim($_REQUEST['wed_id']);
$smarty->assign('currentpage_js', 'chgbg');
$own_page= trim($_REQUEST['addownimage']);
$upload_img= trim($_REQUEST['addownimage']);
$page_name= trim($_REQUEST['page_name']);
echo $page_name;
$pagedo= trim($_REQUEST['do']);
$imgid= trim($_REQUEST['img_id']);
$alert_msg=''; $alert_status=0;
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed) {
		if($own_page != '' || $upload_img != '') {
			if ($own_page == 'Upload image') {
					$bg_img = trim($_FILES['uploaded_bg_img']['name']) ;
					if($bg_img != '')
						{
						$dirName = "images/classic_bg/users/$wedid";
						if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
						$dirName = $dirName.'/';
						$bg_imgext = strtolower(strrchr($bg_img,'.'));
							if($bg_imgext == '.jpg' or $bg_imgext == '.jpeg' or $bg_imgext == '.gif' or $bg_imgext == '.png')
							{
								//echo $_FILES["uploaded_bg_img"]["size"]; 
							$bg_name=$user_log_id.time().'.jpg';
							$upimg .= " , home_male_img = '".$bg_name."' ";
							$target_path=$dirName. $bg_name; //echo $target_path;
							$upload_status = move_uploaded_file($_FILES['uploaded_bg_img']['tmp_name'], $target_path); 
							
							//$image = new SimpleImage();
							//$image->load($target_path);
							//if ($image->getWidth() > 250)
							//$image->resizeToWidth(250);
							//$image->save($dirName.$bg_name);
							if($upload_status) {
							$bg_name = "users/$wedid/".$user_log_id.time();
							$chkqry= "SELECT * FROM `mrg_classic_tpl` where classic_wedid='".$wedid."' and classic_status ='1'";
							$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
							$pageqry = '';
							if($page_name == 1) {
								$pageqry = "classic_all_page = '$bg_name'";
								$infld = 'classic_all_page';
								}else if($page_name == 2){
								$pageqry = "classic_home_page = '$bg_name'";
								$infld = 'classic_home_page';
								}else if($page_name == 3){
								$pageqry = "classic_events_page = '$bg_name'";
								$infld = 'classic_events_page';
								}else if($page_name == 4){
								$pageqry = "classic_gbook_page = '$bg_name'";
								$infld = 'classic_gbook_page';
								}else if($page_name == 5){
								$pageqry = "classic_findloc_page = '$bg_name'";
								$infld = 'classic_findloc_page';
								}else if($page_name == 6){
								$pageqry = "classic_album_page = '$bg_name'";
								$infld = 'classic_album_page';
								}else if($page_name == 7){
								$pageqry = "classic_own_page = '$bg_name'";
								$infld = 'classic_own_page';
								}

							if($selectAffectedRows){
							$upqry = "UPDATE `mrg_classic_tpl` SET $pageqry WHERE classic_wedid='".$wedid."' and classic_status ='1' "; 
							$order_list_id = $userslog_obj->updateVal($upqry);
							} else {
							$inqry= "INSERT INTO `mrg_classic_tpl` (`classic_aid`, `classic_wedid`, `$infld`, `classic_status`) VALUES (NULL, '".$wedid."', '".$bg_name."', '1')";
							$order_list_id = $userslog_obj->insertVal($inqry);
							}
							$alert_msg = 'Your Background image has been updated.';
							$alert_status=1;
							}	else {
							$alert_msg = 'Image upload failed, .';
							$alert_status=1;
							}
							} 

						}
			}
		}
}
else {
echo "Sorry, You cant access this page.";
}
$smarty->assign('alert_msg', $alert_msg);
$smarty->assign('alert_status', $alert_status);
$content_template = 'default/mrg_account/newimage.tpl';
$smarty->assign('page_name', $page_name );
$smarty->assign('user_wedid', $wedid );
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
