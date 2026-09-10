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
$smarty->assign('topnav_select', 'pack');
$content_template = 'default/mrg_account/membership.tpl';
$smarty->assign('currentpage_js', 'pack'); 
$smarty->assign('user_log_id', $user_log_id );
$_SESSION['lastupdate_id']='';
$home_page_title = "Online wedding invitation - inviteindia.com";
$home_page_meta_desc = "Our customized online wedding invitation design portfolio has over more design templates to choose from. Select your  wedding invitation and easily create.";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);

$smarty->assign('glb_valid_1', $valid_1);
$smarty->assign('glb_valid_2', $valid_2);
$smarty->assign('glb_valid_3', $valid_3);
$smarty->assign('glb_free_indays', $free_indays);

$smarty->assign('glb_price_1', $price_1);
$smarty->assign('glb_price_2', $price_2);
$smarty->assign('glb_price_3', $price_3);
$smarty->assign('glb_free_price', $free_price);

$smarty->assign('glb_price_usd_1', $price_usd_1);
$smarty->assign('glb_price_usd_2', $price_usd_2);
$smarty->assign('glb_price_usd_3', $price_usd_3);

$mplan= trim($_REQUEST['mplan']);
$smarty->assign('glb_mplan', $mplan);


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
