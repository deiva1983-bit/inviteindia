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
		if(count($selectwed_acces)){
		$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
		}
$_SESSION['wed_invitation_access'] = 1;
	if($wedid != ""){
		$butt_sub= trim($_REQUEST['butt_create_web_invit_edit']);
		if($butt_sub == 'Submit'){
			$upimg="";
			$home_images_sts= trim($_REQUEST['home_images_sts']);	
			$upimg=" , home_img_status = $home_images_sts";
			$wed_ids = $_SESSION['lastupdate_id'];
			$grooms_name= addslashes(trim($_REQUEST['txt_grooms_name']));
			$brides_name= addslashes(trim($_REQUEST['txt_brides_name']));
			$g_dob= addslashes(trim($_REQUEST['groom_dob']));
			$b_dob= addslashes(trim($_REQUEST['bride_dob']));

			$upqry= "UPDATE mrg_all_info SET male_name = '".$grooms_name."', female_name = '".$brides_name."', groom_dob = '".$g_dob."', bride_dob ='".$b_dob."' WHERE `mrg_url_status_auto_id` ='".$_SESSION['lastupdate_id']."' LIMIT 1 " ;

			$order_list_id = $userslog_obj->updateVal($upqry);
			if($order_list_id){
			$smarty->assign('alert_msg', 'Your personal information has been updated successfully.');
			$smarty->assign('alert_status', '1');
			}
		}

		$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, info.male_name, info.female_name, info.groom_dob, info.bride_dob FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id ";
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
			$content_template = 'default/mrg_account/theme_options_edit_personal.tpl';

	}
	else
	{ 
		echo "Sorry something Wrong, Please try again.";
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
