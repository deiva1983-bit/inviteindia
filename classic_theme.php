<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
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
$own_page= trim($_REQUEST['add_own_page']);
$upload_img= trim($_REQUEST['upload_img']);
$page_name= trim($_REQUEST['page_name']);
$pagedo= trim($_REQUEST['do']);
$imgid= trim($_REQUEST['img_id']);
$alert_msg=''; $alert_status=0;
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed) {
		if($own_page != '' || $upload_img != '') {
			if($own_page == 'own_page') {
				$content_template = 'default/mrg_account/ownimage.tpl';
			}
			else if ($upload_img == 'old_page') {
				$chkqry= "SELECT image_name, image_path, image_id FROM classic_bg_images where image_status = '1' order by image_id"; 
				$selectwed_access= $userslog_obj->selectVal($chkqry);
				$totcountval= count($selectwed_access);
					if($totcountval){
					$smarty->assign('selectimage_count', $totcountval );
					$smarty->assign('glb_image_deails', $selectwed_access );
					}else{ 
					$smarty->assign('selectimage_count', 0);
					}
				if($pagedo == 'imgup'){
					$chkqry= "SELECT * FROM `mrg_classic_tpl` where classic_wedid='".$wedid."' and classic_status ='1'";
					$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
					$pageqry = '';
					if($page_name == 1) {
						$pageqry = "classic_all_page = $imgid";
						$infld = 'classic_all_page';
						}else if($page_name == 2){
						$pageqry = "classic_home_page = $imgid";
						$infld = 'classic_home_page';
						}else if($page_name == 3){
						$pageqry = "classic_events_page = $imgid";
						$infld = 'classic_events_page';
						}else if($page_name == 4){
						$pageqry = "classic_gbook_page = $imgid";
						$infld = 'classic_gbook_page';
						}else if($page_name == 5){
						$pageqry = "classic_findloc_page = $imgid";
						$infld = 'classic_findloc_page';
						}else if($page_name == 6){
						$pageqry = "classic_album_page = '$imgid'";
						$infld = 'classic_album_page';
						}else if($page_name == 7){
						$pageqry = "classic_own_page = '$imgid'";
						$infld = 'classic_own_page';
						}
					if($selectAffectedRows){
					$upqry = "UPDATE `mrg_classic_tpl` SET $pageqry WHERE classic_wedid='".$wedid."' and classic_status ='1' ";
					$order_list_id = $userslog_obj->updateVal($upqry);
					} else {
					$inqry= "INSERT INTO `mrg_classic_tpl` (`classic_aid`, `classic_wedid`, `$infld`, `classic_status`) VALUES (NULL, '".$wedid."', '".$imgid."', '1')";
					$order_list_id = $userslog_obj->insertVal($inqry);
					}
				$alert_msg = 'Your Background image has been updated.';
				$alert_status=1;
				}
				$content_template = 'default/mrg_account/existingimage.tpl';
			}
		}
}
else {
echo "Sorry, You cant access this page.";
}
$smarty->assign('alert_msg', $alert_msg);
$smarty->assign('alert_status', $alert_status);
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
