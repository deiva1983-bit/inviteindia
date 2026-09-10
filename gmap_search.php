<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('glb_site_url', $glb_site_url);
$current_wedid= trim($_REQUEST['wedid']);
$current_action= trim($_REQUEST['do']);
$from_src= trim($_REQUEST['from']);
$smarty->assign('do_val', $current_action);
$smarty->assign('topnav_select', 'wedd');
$user_log_id= trim($_SESSION['sess_user_id']);
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$current_wedid."' and mrg_main_user_id = '".$user_log_id."' ";
	$selectwed_acces= $userslog_obj->selectVal($chkqry);
	if(count($selectwed_acces))
	{
	$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
	}
if($current_wedid != "")
{
$smarty->assign('glb_wed_id', $current_wedid);
$smarty->assign('wed_acc_id', $current_wedid);
}
$home_page_title = "Find the latitude and longitude of a point using Google Maps | Update your wedding address with google map - inviteindia";
$home_page_meta_desc = "Integrate your wedding location with google map - inviteindia";
$home_page_meta_key = "wedding ecards, Wedding locations, Online wedding card, latitude, longitude, google maps, get latitude and longitude";
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$smarty->assign('currentpage_js', 'searchloc_gmap');
if ($current_action == "searchloc")
{
	if ($common_obj->matchUID_WedID($user_log_id, $current_wedid))
	{
	$chkqry= "SELECT gmap_latitude, gmap_longitude FROM mrg_all_info WHERE mrg_url_status_auto_id = $current_wedid ";
    $selectsms_access= $userslog_obj->selectVal($chkqry);
	$gmap_latitude= '';
	$gmap_longitude= '';
	$show_notify=0;
		if (count($selectsms_access))
		{
		$show_notify=1;
		}
    $msgdetails="";
		 	foreach($selectsms_access as $key=>$field)
                     {
						$gmap_latitude= $field['gmap_latitude'];
						$gmap_longitude= $field['gmap_longitude'];
					 }
	$smarty->assign('lbl_latitude', $gmap_latitude);
	$smarty->assign('lbl_longitude', $gmap_longitude);
	$smarty->assign('lbl_show_notify', $show_notify);	
	$content_template = 'default/mrg_account/searchloc.tpl';
	}
}
$smarty->assign('glb_from_src', $from_src);
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
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