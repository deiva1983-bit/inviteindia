<?php 
include_once( '../includes/configs/init.php' ); 
$userslog_obj = new userslog();
$action_val= trim($_REQUEST['chk_action']);
$user_log_id= trim($_SESSION['sess_user_id']);
 if($action_val=="create_wed")
 {
 	$wed_url= trim($_REQUEST['wed_url']);
	$chkqry= "SELECT * FROM `mrg_url_status` where mrg_page_url='".$wed_url."' ";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		echo 'no';
	else
		echo 'exist';
 }
 elseif($action_val=="create_birth")
 {
 	$b_url= trim($_REQUEST['birth_url']);
	$chkqry= "SELECT * FROM `birth_url_status` where birth_page_url='".$b_url."' ";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		echo 'no';
	else
		echo 'exist';
 }
 elseif($action_val=="add_gmap_search")
 {
	 $lonbox= trim($_REQUEST['lonbox']);
 	 $theme_id= trim($_REQUEST['theme_id']);
 	 $latbox= trim($_REQUEST['latbox']);

	 $chkqry= "SELECT * FROM mrg_url_status where mrg_main_user_id='".$user_log_id."' and mrg_url_sts_auto_id='".$theme_id."' ";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	
	if($selectAffectedRows)
			{			
			$upqry= "UPDATE mrg_all_info SET gmap_latitude = '".$latbox."', gmap_longitude = '".$lonbox."' WHERE mrg_url_status_auto_id ='".$theme_id."' LIMIT 1 " ;			 
			$order_list_id = $userslog_obj->updateVal($upqry);		 	
			echo '1';
			}
	else
		{	
			echo '0';
		}
 } 
?>