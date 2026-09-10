<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
 /*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$qry_req=trim($_REQUEST['req']);
$qry_req_temp = explode ("-", $qry_req);
$qry_req = trim($qry_req_temp[0]);
$second_arr = trim($qry_req_temp[1]);
$qry_do=trim($_REQUEST['do']);
$qry_wed_id=trim($_REQUEST['wed_id']);
$qry_birth_id=trim($_REQUEST['b_id']);
$qry_theme_id=trim($_REQUEST['theme_id']);
if (($qry_theme_id == 0) or ($qry_theme_id == '0')  or ($qry_theme_id == 'empty')) 
	{ $qry_theme_id='';}
$qry_might=trim($_REQUEST['might']);
$head_msg_id=trim($_REQUEST['head_msg_id']);
// For Edit theme --   req=thmedt&do=sel0myli&wed_id=44&theme_id=3&might=net
if($qry_req == 'thmedt' and $qry_do == "sel0myli" and $qry_wed_id != "" and $qry_theme_id != "" and $qry_might == "net")
{
$user_allowed=$common_obj->checkWedFree($user_log_id, $qry_wed_id);
if($user_allowed){
			$theme_status="SELECT * FROM `mrg_mas_theme` WHERE `mrg_theme_auto_id` = '".$qry_theme_id."' and `mrg_theme_catid` = 1 ";
			$themestatus= $userslog_obj->selectVal($theme_status);
				if(count($themestatus)){
				echo "Sorry, Your free trial version with all features has expired for this invitations. You can't access premium services. Please update your membership account to continue all the services.";
				} else {
				$upqry= "UPDATE mrg_url_status SET mrg_theme_id = '".$qry_theme_id."' WHERE mrg_url_sts_auto_id ='".$qry_wed_id."' and mrg_main_user_id='".$user_log_id."' LIMIT 1 " ;
				$order_list_id = $userslog_obj->updateVal($upqry);
				header("Location: e-wedding.php?do=themven");
				exit;
				}
}else{
$upqry= "UPDATE mrg_url_status SET mrg_theme_id = '".$qry_theme_id."' WHERE mrg_url_sts_auto_id ='".$qry_wed_id."' and mrg_main_user_id='".$user_log_id."' LIMIT 1 " ;
$order_list_id = $userslog_obj->updateVal($upqry);
header("Location: e-wedding.php?do=themven");
exit;
}
}
else if($qry_req == 'thmedt' and $qry_do == "sel0myli" and $qry_birth_id != "" and $qry_theme_id != "" and $qry_might == "net")
{
	$upqry= "UPDATE birth_url_status SET birth_theme_id = '".$qry_theme_id."' WHERE birth_url_sts_auto_id ='".$qry_birth_id."' and birth_main_user_id='".$user_log_id."' LIMIT 1 " ;
	$order_list_id = $userslog_obj->updateVal($upqry);
	header("Location: e-wedding.php?do=themven");
	exit;
}
elseif($qry_req == 'thmcrt' and ($qry_do == "cre0myli" or $qry_do == "demOkavi") and  $qry_theme_id != "" and $qry_might == "net")
{
	$_SESSION['selected_themeid'] = $qry_theme_id;
	if($second_arr == '1') {// Wedding themes
		header("Location: theme_options.php");
	} else if($second_arr == '2') { // Birthday themes
		header("Location: binvite.php");
	}
exit;
}
elseif($qry_theme_id != '' and $qry_do == "up89head" and $qry_might == "uph" and $user_log_id != '')
{

		// Update Own head text here..
		if (trim($_REQUEST['add_own_head_msg']) == 'Add My Own Text')
		{
			$own_txt_head_msg= addslashes(trim($_REQUEST['txt_add_own_head_msg']));
			$own_txt_head_msg = (strlen ($own_txt_head_msg) < 5) ? '' : $own_txt_head_msg ;
			if($own_txt_head_msg != "")
			{
			$inqry1= "INSERT INTO mrg_mas_thirukural (kural_auto_id, kural_brieff, kural_status, kural_user_id,	kural_added_date) VALUES (NULL, '".$own_txt_head_msg."', '1', '".$user_log_id."', 'now()')";
			$order_list_id = $userslog_obj->insertVal($inqry1);
			if($order_list_id != '' and $order_list_id != 0 and $qry_theme_id != '' and $qry_theme_id != 0)
			{
			$upqry= "UPDATE mrg_all_info SET thirukkural = '".$order_list_id."' WHERE mrg_url_status_auto_id ='".$qry_theme_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);
			}
			$show_succ="yes";
			}
			else
			{
			$show_err="yes";
			$err_msg="Please enter your text message.";
			}
		}

		 

		$smarty->assign('currentpage_js', 'theme_select');
  
		$smarty->assign('show_succ', $show_succ);
		$smarty->assign('err_msg', $err_msg);
		$smarty->assign('show_err', $show_err);
		$smarty->assign('glb_headdetails', $commdetails);

		
$content_template="default/mrg_account/change_headmsg.tpl";

$smarty->assign('glb_theme_id', $qry_theme_id);
$smarty->assign('header', $smarty->fetch('default/header4popup.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
exit;
}
elseif($qry_theme_id != '' and $head_msg_id != '' and $qry_do == "update_theme" and $qry_might == "soon")
{
		$upqry= "UPDATE mrg_all_info SET thirukkural = '".$head_msg_id."' WHERE mrg_url_status_auto_id ='".$qry_theme_id."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		echo $order_list_id;
}
elseif($qry_theme_id != '' and $qry_do == "up89des" and $qry_might == "uphdes" and $user_log_id != '')
{

		// Update Own head text here..
		if (trim($_REQUEST['add_own_head_des']) == 'Add My Description')
		{
			$own_txt_desc_msg= addslashes(trim($_REQUEST['txt_add_own_desc_msg']));
			$own_txt_desc_msg = (strlen ($own_txt_desc_msg) < 5) ? '' : $own_txt_desc_msg ;
			if($own_txt_desc_msg != "")
			{
			$inqry1= "INSERT INTO mrg_mas_des (des_auto_id, des_brieff, des_status, desc_user_id, desc_added_date) VALUES (NULL, '".$own_txt_desc_msg."', '1', '".$user_log_id."', 'now()')";
			$order_listid = $userslog_obj->insertVal($inqry1);
			if($order_listid != '' and $order_listid != 0 and $qry_theme_id != '' and $qry_theme_id != 0)
			{
			$upqry= "UPDATE mrg_all_info SET description = '".$order_listid."' WHERE mrg_url_status_auto_id ='".$qry_theme_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);
			}
			$show_succ="yes";
			}
			else
			{
			$show_err="yes";
			$err_msg="Please enter your Description message.";
			}
		} 

		$smarty->assign('currentpage_js', 'theme_select'); 
		$smarty->assign('show_succ', $show_succ);
		$smarty->assign('err_msg', $err_msg);
		$smarty->assign('show_err', $show_err);
		$smarty->assign('glb_descdetails', $descdetails);

		
$content_template="default/mrg_account/change_descmsg.tpl";

$smarty->assign('glb_theme_id', $qry_theme_id);
$smarty->assign('header', $smarty->fetch('default/header4popup.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
exit;
}
elseif($qry_theme_id != '' and $head_msg_id != '' and $qry_do == "update_desc_msg" and $qry_might == "soon_desc")
{
		$upqry= "UPDATE mrg_all_info SET description = '".$head_msg_id."' WHERE mrg_url_status_auto_id ='".$qry_theme_id."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		echo $order_list_id;
}
?>
