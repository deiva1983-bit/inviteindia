<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url); 
$home_page_title = "Create Online wedding invitation | Adding wedding cover | Wedding cover designs - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation  with more features and share it your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates, Select wedding cover - inviteindia";
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$current_type= trim($_REQUEST['type']);
$current_wedid= trim($_REQUEST['wed_id']);
$a_id= trim($_REQUEST['id']);
$smarty->assign('currentpage_js', 'ctheme_add_envelop');
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$current_wedid."' and mrg_main_user_id = '".$user_log_id."' ";
	$selectwed_acces= $userslog_obj->selectVal($chkqry);
	if(count($selectwed_acces)){
	$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
	}
	else{
	exit;
	}
$user_allowed=$common_obj->checkWedFree($user_log_id, $current_wedid);
if($user_allowed){
$smarty->assign('blockpage', 1 ); 
$smarty->assign('errors', $free_errmsgs ); 
}
if($current_action){
$wedding_cover= trim($_REQUEST['update_wedding_cover']);
$wedding_cover_own= trim($_REQUEST['update_wedding_cover_own']);
$ctype = trim($_REQUEST['content_type']);
$ctype = ($ctype != '')? $ctype : 2;
$err_msg = ''; $succ_msg ='';
if($wedding_cover == 'Add Envelope Cover' and $ctype =='2') { // Add/update your cover
$all_up = 1;
$req_grooms_name = trim($_REQUEST['txt_wed_grooms_name']);
$req_brides_name = trim($_REQUEST['txt_wed_brides_name']);

$grooms_len = trim($_REQUEST['txt_wed_grooms_len']);
$bride_len = trim($_REQUEST['txt_wed_bride_len']);


$mal_name_cnt = strlen($req_grooms_name);
$femal_name_cnt = strlen($req_brides_name);
$mal_class = ''; $femal_class='';
$all_up = 0;
if($mal_name_cnt > $grooms_len or $mal_name_cnt == '0'){
$mal_class="ui-state-error";
$all_up = 1;
}
if($femal_name_cnt > $bride_len or $femal_name_cnt == '0')
{
$femal_class="ui-state-error";
$all_up = 1;
}

if($all_up == 0){
	$upqry= "UPDATE mrg_all_info SET wed_animate_cover = 1, wed_cover_id = '8', wed_cover_male_name = '".$req_grooms_name."', wed_cover_female_name = '".$req_brides_name."' WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
	$userslog_obj->updateVal($upqry);
	$upqry1= "UPDATE mrg_all_info_add SET envelop_text_status = 0 WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
	$userslog_obj->updateVal($upqry1);
	$succ_msg = 'Congrats, Envelope cover have successfully added with your wedding site.';
} else {
$err_msg = "Something went wrong, Please provide proper inputs.";
}

}else if($wedding_cover_own == "Add Envelope Cover" and $ctype =='1'){
$all_up = 1;
$envelope_msg= addslashes(trim($_REQUEST['envelope_msg']));
$envelope_msg = (strlen ($envelope_msg) < 5) ? '' : $envelope_msg ;
$all_up = ( $envelope_msg != '') ? 1 : 0 ;
if($all_up) {
	$upqry= "UPDATE mrg_all_info SET wed_animate_cover = 1, wed_cover_id = '8' WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
	$userslog_obj->updateVal($upqry);
	$upqry1= "UPDATE mrg_all_info_add SET envelop_text_status = 1, envelop_own_msgs = '".$envelope_msg."' WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
	$userslog_obj->updateVal($upqry1);
	$succ_msg = 'Congrats, Envelope cover have successfully added with your wedding site.';
} else {
$err_msg = "Something went wrong, Please provide proper inputs.";
}

}

$smarty->assign('glb_err_msg', $err_msg);
$smarty->assign('glb_succ_msg', $succ_msg);
$smarty->assign('glb_ctype', $ctype);
$content_template = 'default/mrg_account/envelope_select.tpl';
$chkqry_cov= "SELECT * FROM wed_covers_mas where wed_cover_autoid   = '".$a_id."' ";
$selectwed_covde= $userslog_obj->selectVal($chkqry_cov);
$mal_maxlength =  $selectwed_covde[0]['wed_cover_male_max_char'];
$femal_maxlength =  $selectwed_covde[0]['wed_cover_female_max_char'];
$cover_center_align =  $selectwed_covde[0]['wed_cover_center_align'];
$smarty->assign('mal_maxlength', $mal_maxlength);
$smarty->assign('femal_maxlength', $femal_maxlength);
	
$chkqry_covr= "SELECT a.wed_cover_male_name, b.envelop_own_msgs, a.wed_cover_female_name, a.male_name, a.female_name FROM mrg_all_info a, mrg_all_info_add b where a.mrg_url_status_auto_id   = '".$current_wedid."' and b.mrg_url_status_auto_id = '".$current_wedid."'";
$select_cov= $userslog_obj->selectVal($chkqry_covr);
$cover_male_name =  $select_cov[0]['wed_cover_male_name'];
$cover_female_name =  $select_cov[0]['wed_cover_female_name'];
$male_name =  $select_cov[0]['male_name'];
$female_name =  $select_cov[0]['female_name'];
$own_msgs =  $select_cov[0]['envelop_own_msgs'];
$mal_name = ($cover_male_name != "" ) ? $cover_male_name : $male_name;
$femal_name = ($cover_female_name != "" ) ? $cover_female_name : $female_name;

$mal_name = ($req_grooms_name != "" ) ? $req_grooms_name : $mal_name;
$female_name = ($req_brides_name != "" ) ? $req_brides_name : $female_name;
$own_msgs = ($envelope_msg != "" ) ? $envelope_msg : $own_msgs;
$smarty->assign('glb_own_msgs', $own_msgs);
$smarty->assign('femal_class', $femal_class);
$smarty->assign('mal_class', $mal_class);
$smarty->assign('mal_name', $mal_name);
$smarty->assign('femal_name', $femal_name);
$smarty->assign('c_wed_id', $current_wedid);
} else {
$chkqry1= "SELECT * FROM wed_covers_mas where wed_cover_status = '1' and wed_cover_type = '3'";
$selectwed_cv= $userslog_obj->selectVal($chkqry1);
$smarty->assign('select_cover', $selectwed_cv );
$content_template = 'default/mrg_account/envelope.tpl';
}

$chkqry_covr= "SELECT wed_animate_cover FROM mrg_all_info where mrg_url_status_auto_id   = '".$current_wedid."' ";
$select_cov= $userslog_obj->selectVal($chkqry_covr);
$wed_animate_cover =  $select_cov[0]['wed_animate_cover'];
$smarty->assign('animate_cover', $wed_animate_cover);

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
// List avilable wed URLs.
$smarty->assign('wed_acc_id', $current_wedid );
$smarty->assign('do_val', 'envelop');
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
