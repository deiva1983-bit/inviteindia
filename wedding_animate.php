<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('do_val', 'wedd_ani');
$from_src= trim($_REQUEST['from']);
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Wedding theme animations | Add wedding animations | Wedding invitation with animations - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Add animation for your wedding invitation and share with your friends - inviteindia";
$home_page_meta_key = "wedding animations, wedding ecards, wedding animations, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$wedid= trim($_REQUEST['wed_id']);
$smarty->assign('currentpage_js', 'theme_select_edit');
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed)
{
	$user_allowed=$common_obj->checkWedFree($user_log_id, $wedid);
	if($user_allowed){
	$smarty->assign('blockpage', 1 ); 
	$smarty->assign('errors', $free_errmsgs ); 
	}
	$wedid= trim($_REQUEST['wed_id']);
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_acces= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_acces))
		{
		$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
		}
	//Display Avilable animations.
	
		$chkqry1= "SELECT wed_animate_reff_id FROM `mrg_all_info` WHERE `mrg_url_status_auto_id` =$wedid";
			$selectsms_wed= $userslog_obj->selectVal($chkqry1);
			if (count($selectsms_wed))
			{
	 	foreach($selectsms_wed as $key=>$field)
					{
					 $reff_id= $field['wed_animate_reff_id'];
					}
			}
	if($reff_id == "")
	{
	$reff_id =0 ;
	}
	$smarty->assign('user_imgid', $reff_id );
			$chkqry= "SELECT wed_animate_id,wed_animate_name,wed_animate_image FROM `wed_animations` WHERE `wed_animate_status` =1";
			$selectsms_access= $userslog_obj->selectVal($chkqry);
			if (count($selectsms_access))
			{
			$msgdetails="";$wed_animations='<ul>';
	 	foreach($selectsms_access as $key=>$field)
					{
					 $animate_id= $field['wed_animate_id'];
					 $animate_name= $field['wed_animate_name'];
					 $animate_image= $field['wed_animate_image'];
					 if($reff_id == $animate_id){
					 $wed_animations.="<li><input type='radio' name='ani_lists' value='$animate_id' id='$animate_id' class='ani_lists' checked=checked> <label for='$animate_id'>$animate_name</label></li>";
					 }
					 else
					 {
					 $wed_animations.="<li><input type='radio' name='ani_lists' value='$animate_id' id='$animate_id' class='ani_lists'> <label for='$animate_id'>$animate_name</label></li>";
					 }
					 
					 }
					 $wed_animations.='</ul>';
			}
			$smarty->assign('glb_wed_animations', $wed_animations);
	$content_template = 'default/mrg_account/theme_animations.tpl';
}
else
{
echo "Sorry, You cant access this page.";
}
$smarty->assign('glb_from_src', $from_src); 
$smarty->assign('user_wedid', $wedid );
$smarty->assign('wed_acc_id', $wedid );
//$content_template = 'default/mrg_account/theme_created_success.tpl';
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
