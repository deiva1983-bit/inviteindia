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
include_once( 'includes/configs/init.php' );

require_once("includes/functions/ajaxfileuploader.inc.php");

/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
/*----- Object creation end-----*/
$smarty->assign('topnav_select', 'termsofser');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'my_page');
$smarty->assign('pagetitle', 'Invitation site');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$canurl = $ssl_path.'www.inviteindia.com/terms.php';
$smarty->assign('can_url', $canurl);
 	$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/blogs.tpl';
$smarty->assign('pagetitle', 'Terms of service for wedding website - inviteindia');
$home_page_meta_desc='inviteindia have created Terms & Conditions statement for creating wedding site based on your website security. This page discloses about payment return policy, content format etc.';
$home_page_meta_key='Free wedding website, Terms & Conditions, Terms of service, Wedding website security';

/*----- Include Files Details Start-----*/

$smarty->assign('pagetitle', 'Wedding blogs and tips to plan your big day -InviteIndia.com');
$smarty->assign('pagetitle', 'The Ultimate Guide to Planning Your Wedding: Tips and Tricks');

$home_page_meta_desc='Planning a wedding can be overwhelming, but with this ultimate guide and blogs, you\'ll have all the tips and tricks you need to make your big day unforgettable.';
$home_page_meta_key = 'Wedding blogs, wedding tips, wedding guide';
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);

/* Fetch records from DB - Start */
$fetchqry_page = "select * from home_page_blogs where blog_status = 1 ORDER BY `blog_date` DESC";
$pagination = $userslog_obj->selectVal($fetchqry_page);
$total_records      = count($pagination);
if($isMobile) 
	$limit = 5;
else
	$limit = 9;
$page="";
if(isset($_REQUEST['f_list']) && ($_REQUEST['f_list']!=""))
{
$page=$_REQUEST['f_list'];
$start = ($page - 1) * $limit;
}
else
{
$start = 0;
}
$varname="f_list";

$c_action=$_REQUEST['action']; // Inner action

//$targetpage =$page_url.'?status=3';
$targetpage =$page_url.'?status=3';


$selectblogs = "select * from home_page_blogs where blog_status = 1 ORDER BY `blog_date` desc limit $start ,$limit";
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
				//$blogdetails .= '</div><div class="clearfix"></div></li>';
				$blogdetails .= '</div></li><div class="clearfix"></div><li><div class="w3ls_banner_bottom_grids">';
				}
		}
	}
//$blogdetails .= '</div><div class="clearfix"> </div></li>';
$blogdetails .= '</div></li>';
$smarty->assign('blog_det', $blogdetails);
$smarty->assign('blog_det_mobile', $blogdetails_mob);

$pagination= $common_obj->Pagination($total_records,$limit,$targetpage,$page,$start,$varname);

$smarty->assign('pagenation', $pagination);


$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);

$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
