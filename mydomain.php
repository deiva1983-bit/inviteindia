<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$current_action= trim($_REQUEST['do']);
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$smarty->assign('topnav_select', 'owndomain');
$content_template = 'default/mrg_account/customdom.tpl';
$smarty->assign('currentpage_js', 'owndomain'); 
$smarty->assign('user_log_id', $user_log_id );
$_SESSION['lastupdate_id']='';
$home_page_title = "Online wedding invitation - inviteindia.com";
$home_page_meta_desc = "Our customized online wedding invitation design portfolio has over more design templates to choose from. Select your  wedding invitation and easily create.";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);

$smarty->assign('glb_domain_inr', $own_domain_inr);
$smarty->assign('glb_domain_us', $own_domain_us);

$smarty->assign('glb_domain_inr_in', $own_domain_inr_in);
$smarty->assign('glb_domain_us_in', $own_domain_us_in);

$smarty->assign('glb_domain_inr_com', $own_domain_inr_com);
$smarty->assign('glb_domain_us_com', $own_domain_us_com);

$drow_down_show = 0;

$chkqry= "SELECT mrg_page_url, mrg_status, mrg_url_sts_auto_id, mrg_site_start_date, mrg_site_end_date  FROM mrg_url_status where mrg_main_user_id = '".$user_log_id."' and mrg_status != '4' order by mrg_url_created_date"; 
	$selectwed_access= $userslog_obj->selectVal($chkqry);
$totcountval= count($selectwed_access);
$option_val .= "<option value='select'>Select your wedding invitations.</option>";
	if($totcountval)
	{
		foreach($selectwed_access as $key=>$field){
		$page_url= 'http://www.inviteindia.com/'.$field['mrg_page_url'];
		$sts_auto_id= $field['mrg_url_sts_auto_id'];
		$option_val .= "<option value='$sts_auto_id'>$page_url</option>";
		}
	$drow_down_show = 1;
	}
$smarty->assign('glb_option_val', $option_val);
$smarty->assign('glb_drow_down_show', $drow_down_show);
// User details - start
$usrqry2 = "SELECT b.usrpro_fname,b.usrpro_email,b.usrpro_lname,a.usrlog_username FROM tbl_user_profile b, tbl_user_login a WHERE a.usrlog_id = b.usrlog_id and a.usrlog_id = '$user_log_id' " ;
$usrqry2 = $userslog_obj->selectVal($usrqry2);
$useremail = $usrqry2[0]['usrpro_email'];
$userfname = $usrqry2[0]['usrpro_fname'];
$userlname = $usrqry2[0]['usrpro_lname'];
$userusername = $usrqry2[0]['usrlog_username'];
$myusername = ($userfname != '') ? $userfname : $userusername;
$smarty->assign('usrpro_email', $useremail);
$smarty->assign('usrpro_fname', $myusername);
$smarty->assign('usrpro_lname', $userlname);
$smarty->assign('maxcard_per_acc', $max_card_per_acc);
// User details - end
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
