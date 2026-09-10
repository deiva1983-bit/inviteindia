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
$userslog_obj = new userslog();
$common_obj = new common();
 /*----- Object creation Start-----*/


 
/*----- Object creation End -----*/


/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'cus_review');
$page_title = "Wedding website, customer reviews and feedback - inviteindia.com";
$home_page_meta_desc = "Reviews and comments from brides, grooms, and wedding guests. This will enable others to create a perfect website for their wedding celebration.";
//Reivews and feedback from brides, grooms and wedding guests. It will help others to create perfect website for their wedding celebrations.
$home_page_meta_key = "Wedding website review & feedback, Wedding website features";
$smarty->assign('pagetitle', $page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
//if($doit != "")
$canurl = $ssl_path.'www.inviteindia.com/customer-review.php';
$smarty->assign('can_url', $canurl);
$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br />
			<label for='security_code'>Security Code: <span class='required'>*</span></label><input id='security_code' name='security_code' type='text'  class='inputval' />";
$smarty->assign('capchaImg', $capchaImg);

$frm_submit = $_REQUEST['do'];
$show_msg = 0;
if($frm_submit == 'reviewadd') {
		if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) ) {
			$r_name= trim($_REQUEST['cus_name']);
			$r_loc= addslashes(trim($_REQUEST['cus_location']));
			$uploaded_image= trim($_REQUEST['uploaded_image']);
			$uploaded_image_status = 0;
			if($uploaded_image != '') {
			$uploaded_image_status = 1;
			}
			$r_rv= addslashes(trim($_REQUEST['cus_review']));

			$inqry= "INSERT INTO `cus_reviews` (`review_id`,`review_name`,`review_loc`,`review_contents`,`review_profile_status`,`review_profile`, `review_date`, `review_status`) VALUES (NULL, '".$r_name."', '".$r_loc."','".$r_rv."', '".$uploaded_image_status."', '".$uploaded_image."', Now(), '1')";
			$lastinsert_id = $userslog_obj->insertVal($inqry);
			$show_msg = 1;
	} else {
			$capchaImg="<img src='CaptchaSecurityImages.php?width=100&height=40&characters=5' /><br />
					<label for='security_code'>Security Code: <span class='required'>*</span></label><input id='security_code' name='security_code' type='text'  class='inputval' />";
			$smarty->assign('capchaImg', $capchaImg);
			$err_msg="Please enter valid secure code.";
			$smarty->assign('error_msg', $err_msg);
			}
}


/* Fetch records from DB - Start */
$fetchqry_page = "SELECT * FROM cus_reviews where review_status  ='1' ORDER BY `review_date` DESC";
$pagination = $userslog_obj->selectVal($fetchqry_page);
$total_records      = count($pagination);
if($isMobile) 
	$limit = 5;
else
	$limit = 10;
$page="";
$limit = 5;
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

$fetchreviews_qry = "SELECT * FROM cus_reviews where review_status  ='1' ORDER BY `review_date` DESC LIMIT  $start ,$limit";

$fetchreviews = $userslog_obj->selectVal($fetchreviews_qry);
$cs_reviews = ''; $cs_reviews_mob = '';
	foreach($fetchreviews as $key=>$field){
		$row_class='odd_rows';
		if($key % 2 == 0)
			$row_class='even_rows';
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
		$cs_reviews .= '<div class="w3l_services_footer_top_right_main">
						<div class="w3l_services_footer_top_right_main_l1">
							<div class="w3ls_service_icon">
								<img src="assets/cus-review/'.$review_profile.'" alt='.$review_name.' width="86" height="86">
							</div>
						</div>
						<div class="w3l_services_footer_top_right_main_r">'.$review_name.'<p>'.$review_contents.'</p></div>
						<span class="border-bottom"></span><div class="clearfix border"></div><hr />
					</div>';


		$cs_reviews_mob .= '<li class="agile-ser-tp">
							<div class="text-center">
								<img src="assets/cus-review/'.$review_profile.'" alt='.$review_name.' style="width: 100px; height: 100px; display:inline;">
							</div> <h5 class="text-right">-- '.$review_name.'</h5>
						<p class="write_para">'.$review_contents.'</p> <hr />
					</li>';
	}


$pagination= $common_obj->Pagination($total_records,$limit,$targetpage,$page,$start,$varname);

$smarty->assign('pagenation', $pagination);
$smarty->assign('tpl_cs_reviews', $cs_reviews);
$smarty->assign('tpl_cs_reviews_mob', $cs_reviews_mob);
/* Fetch records from DB - End */
$content_template = 'default/customer_review.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
