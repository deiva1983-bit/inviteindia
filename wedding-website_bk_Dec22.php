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
$smarty->assign('currentpage_js', 'main_page_web');
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id_home= trim($_SESSION['sess_user_id']);
$show_login_= trim($user_log_id_home) != "" ? 1 : 0;
$smarty->assign('show_auth', $show_login_);
$canurl = $ssl_path.'www.inviteindia.com/wedding-website.php';
$smarty->assign('can_url', $canurl);
$sub_wedd_page_title = 'Wedding website features, wedding website themes';
$sub_wedd_page_title = 'Create a Wedding Website: Tips & Ideas';
$sub_wedd_page_title = '100% Free Wedding Websites, Customizable wedding themes';
$sub_wedd_page_title = '100% Free Indian wedding websites';
$sub_wedd_page_title = 'Wedding website, Wedding album, Invitations & More';
$sub_wedd_meta_desc = 'Creating a wedding website is very easy on InviteIndia.com. You can share all your wedding details in one place and easily reach your guests.';
$sub_wedd_meta_desc = 'Indian wedding websites, Wedding culture, Wedding ideas and Planning. Create your wedding portal and share all the wedding details in one place. It will easily reach your guests.';
$sub_wedd_meta_desc = 'Create your wedding website with an unlimited photo album, background music, wedding registry, SMS reminder, guest book, own pages, and much more.';
$sub_wedd_keywords = 'Customizable wedding themes, Wedding website features, FAQ Sections';
$smarty->assign('pagetitle', $sub_wedd_page_title.$common_page_title_end);
$smarty->assign('metadesc', $sub_wedd_meta_desc);
$smarty->assign('metakeywords', $sub_wedd_keywords);
/*----- Variables Declaration End-----*/
if($isMobile)
$selectfaq = 'select faq_questions,faq_answer from faqs where faq_status = 1 limit 0, 5';
else
$selectfaq = 'select faq_questions,faq_answer from faqs where faq_status = 1 limit 0, 9';
$selectfaq_lists = $userslog_obj->selectVal($selectfaq);
$msgdetails="";
	foreach($selectfaq_lists as $key=>$field){
		$faq_ques =stripslashes($field['faq_questions']);
		$faq_ans =stripslashes($field['faq_answer']);
		$msgdetails .= '<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading'.$key.'">
			<span class="panel-title write_paras">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$key.'" aria-expanded="true" aria-controls="collapse'.$key.'">'.$faq_ques.'</a>
			</span>
		  </div>
		  <div id="collapse'.$key.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$key.'">
			<div class="panel-body write_paras">
			  <p>'.$faq_ans.'</p>
			</div>
		  </div>
		</div>';
	}
$smarty->assign('faq_det', $msgdetails);




$selectreview = 'SELECT * FROM `cus_reviews` ORDER BY `cus_reviews`.`review_id` DESC limit 0, 3';
$selectrev_lists = $userslog_obj->selectVal($selectreview);
$msgdetails_r="";
	foreach($selectrev_lists as $key=>$field){
		$review_name = trim($field['review_name']);
		$review_loc = trim($field['review_loc']); 
		if($review_loc != '')
			$review_name .= ', '.$review_loc;
		$review_contents = trim($field['review_contents']);
		$review_profile_status = $field['review_profile_status'];
		if ($review_profile_status != '1') {
		$review_profile = 'default_user.png';
		} else {
		$review_profile = $field['review_profile'];
		}
		$msgdetails_r .= '<li>
					<div class="agileits_w3layouts_banner_info">
							<div>
								<img src="assets/cus-review/'.$review_profile.'" alt="'.$field['review_name'].'\' Review" class="img-styles">
							</div>
						<p class="write_para">'.$review_contents.'</p>
						<h4 class="w3l_services_footer_top_right_main_r">-- '.$review_name.'</h4>
					</div>
				</li>';
	}


$smarty->assign('tpl_cus_reviews', $msgdetails_r);
$smarty->assign('home_page_notes', $home_page_notes);
$content_template = 'default/websites.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/mainheader_sub.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
