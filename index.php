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

$smarty->assign('topnav_select', 'main');
/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'main_page');
$smarty->assign('glb_site_url', $glb_site_url);	
	//$smarty->assign('pagetitle', 'inviteindia: Interview questions and answers, Interview Tips, Technical Tips,How to face Interview');
	//$smarty->assign('metadesc', 'Free SMS- Send Free SMS, Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
	//$smarty->assign('metakeywords', 'Free SMS, Send Free SMS, Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');

$user_log_id_home= trim($_SESSION['sess_user_id']);	
$show_login_= trim($user_log_id_home) != "" ? 1 : 0;
$smarty->assign('show_auth', $show_login_);
$ranvalue = rand(1,2);
$smarty->assign('glb_ranvalue', $ranvalue);
//$smarty->assign('pagetitle', $home_page_title);
//$smarty->assign('metadesc', $home_page_meta_desc);
//$smarty->assign('metakeywords', $home_page_meta_key);
$canurl = 'https://www.inviteindia.com/';
$smarty->assign('can_url', $canurl);

$home_page_title = 'Create Custom Indian Wedding Websites and E-Cards | InviteIndia';
$home_page_meta_desc = 'Create custom Indian wedding websites and e-cards with InviteIndia. Personalize elegant invitations, manage RSVPs, and share effortlessly with your guests.';
$home_page_keywords = 'wedding website, Indian wedding website, wedding invitation website, wedding card website, e-invitation, wedding website templates, wedding planning website';

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_keywords);

$selectblogs = 'select * from home_page_blogs where blog_status = 1 ORDER BY `blog_date` desc limit 0, 9';
$selectblogs_lists = $userslog_obj->selectVal($selectblogs);
$blogdetails=""; $blogdetails = '<li><div class="w3ls_banner_bottom_grids">'; $blogdetails_mob="";
	foreach($selectblogs_lists as $key=>$field){
		$blog_name =stripslashes($field['blog_name']);
		$blog_short_desc =stripslashes($field['blog_short_desc']);
		$blog_date =$field['blog_date'];
		$blog_date = date('jS F, Y', strtotime("$blog_date"));
		$blog_image = stripslashes($field['blog_image']);
		$blog_url =stripslashes($field['blog_url']);
		if($isMobile) {
			$blogdetails_mob .= '<li><div class="w3ls_banner_bottom_grids">';
			$blogdetails_mob .= "<div class='col-md-4 agileits_services_grid'>
					<h3>$blog_name</h3>
					<p>$blog_short_desc</p>
					<div class='w3_agile_services_grid1'>
						<img src='$blog_image' alt='$blog_name' class='img-responsive' />
						<div class='w3_blur'></div>
					</div>
					<div class='w3layouts_more'>
						<a href='$blog_url' data-toggle='modal' data-target='$blog_url'>Read More<i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
					</div>
					<div class='text-right'>$blog_date</div>
				</div>";
			$blogdetails_mob .= '</div><div class="clearfix"> </div></li>';
		} else {
		$index = $key+1;
		$blogdetails .= "<div class='col-md-4 agileits_services_grid'>
					<h3>$blog_name</h3>
					<p>$blog_short_desc</p>
					<div class='w3_agile_services_grid1'>
						<img src='$blog_image' alt='$blog_name' class='img-responsive' />
						<div class='w3_blur'></div>
					</div>
					<div class='w3layouts_more'>
						<a href='$blog_url' data-toggle='modal' data-target='$blog_url'>Read More<i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
					</div>
					<div class='text-right'>$blog_date</div>
				</div>";
				if($index % 3 == 0){
				//$blogdetails .= '</div><div class="clearfix"> </div></li>';
				$blogdetails .= '</div></li><li><div class="w3ls_banner_bottom_grids">';
				}
		}
	}
//$blogdetails .= '</div><div class="clearfix"> </div></li>';
$blogdetails .= '</div></li>';
$smarty->assign('blog_det', $blogdetails);
$smarty->assign('blog_det_mobile', $blogdetails_mob);
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_keywords);
/*----- Variables Declaration End-----*/
$smarty->assign('home_page_notes', $home_page_notes);
$content_template = 'default/main.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
$head_content_template = 'default/mainheader.tpl';
$head_content_template = $common_obj->load_mobile_tpl_files($isMobile, $head_content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch($head_content_template) );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
