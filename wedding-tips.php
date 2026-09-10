<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : serviceproc.php
// Description : file to handle index page informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
header('Access-Control-Allow-Origin: *');
include_once( 'includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$common_obj = new common();
$userslog_obj = new userslog();
 
/*----- Object creation End -----*/

$smarty->assign('topnav_select', 'main_sub');
/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'main_page_tips');
$smarty->assign('glb_site_url', $glb_site_url);

$cur_page = $_REQUEST['page'];
$smarty->assign('current_page', $cur_page+3);
$smarty->assign('current_page_id', $cur_page);
// 4 - Bride tips
if($cur_page == '1') {
	$canurl = $ssl_path.'www.inviteindia.com/wedding-tips-for-brides';
	$sub_wedd_page_title = 'Wedding Planning Tips and Tricks for Brides - InviteIndia.com';
	$sub_wedd_meta_desc = 'Important wedding tips that every bride should know before the wedding celebration.';
	$sub_wedd_keywords = 'Wedding tips for brides';
	$content_template = "default/bride_tips.tpl";
} else if($cur_page == '2') {
	$canurl = $ssl_path.'www.inviteindia.com/wedding-tips-for-grooms';
	$sub_wedd_page_title = 'Top wedding tips for the grooms';
	$sub_wedd_meta_desc = 'The complete wedding tips for the groom, natural makeup tips, budget planning for your wedding ceremony.';
	$sub_wedd_keywords = 'Wedding tips for grooms';
	$content_template = "default/groom_tips.tpl";
} else if($cur_page == '3') {
	$canurl = $ssl_path.'www.inviteindia.com/preparing-guest-list-for-wedding';
	$sub_wedd_page_title = 'Tips for preparing a guest list for a wedding';
	$sub_wedd_meta_desc = 'Making a guest list for a wedding is one of the most important processes because we all expect to invite loved ones.';
	$sub_wedd_keywords = 'wedding guest list';
	$content_template = "default/prepare_guest_list.tpl";
} else if($cur_page == '4') {
	$canurl = $ssl_path.'www.inviteindia.com/panda-kaal-muhurtham-procedure-in-tamil-wedding';
	$sub_wedd_page_title = 'Wedding rituals - Pandakaal Muhurtham - InviteIndia.com';
	$sub_wedd_meta_desc = 'Pandakaal Muhurtham is one of the oldest wedding cultures in India, what is the Pandakaal Muhurtham and how is it performed.';
	$sub_wedd_keywords = 'Wedding rituals, Pandakaal Muhurtham, Planting of mukurttakal, Wedding ceremonies';
	$content_template = "default/tips_pandakaal.tpl";
}

// Fetch comments
$sele_qry="SELECT * FROM `artical_comments` WHERE `comment_status`='1' And `page_id` = '".$cur_page."' ORDER BY `artical_comments`.`comm_date` DESC";
$fetchcmns = $userslog_obj->selectVal($sele_qry);
$totalrows = $userslog_obj->selectAffectedRows($sele_qry);
$cs_reviews = '';
	foreach($fetchcmns as $key=>$field){
		$cmd_id = trim($field['comment_id']);
		$usr_nm = stripslashes(trim($field['user_name']));
		$usr_mail = stripslashes(trim($field['user_email']));
		$usr_cmt = stripslashes(trim($field['user_comment']));
		$page_id = trim($field['page_id']);
		$cmd_dt = trim($field['comm_date']);
		$today = date("F j, Y, g:i a");
		$cmd_dt = date("F j, Y, g:i a", strtotime($cmd_dt));
				$cs_reviews .= '<div class="w3l_services_footer_top_right_main">
						<div class="w3l_services_footer_top_right_main_l1">
							<div class="w3ls_service_icon">
								<img src="assets/cus-review/default_user.png" alt="Article comments" class="author_comm">
							</div>
						</div>
						<div class="w3l_services_footer_top_right_main_r">'.$usr_nm.'<div class="comment-metadata">'.$cmd_dt.'</div><p>'.$usr_cmt.'</p></div>
						<div class="clearfix border"></div><hr />
					</div>';
	}
$smarty->assign('glb_totalrows', $totalrows);
$smarty->assign('cs_reviews_tpl', $cs_reviews);
$smarty->assign('can_url', $canurl);
$smarty->assign('pagetitle', $sub_wedd_page_title.$common_page_title_end);
$smarty->assign('metadesc', $sub_wedd_meta_desc);
$smarty->assign('metakeywords', $sub_wedd_keywords);
/*----- Variables Declaration End-----*/

$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/mainheader_tips.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
