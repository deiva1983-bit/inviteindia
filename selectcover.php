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
$current_wedid= trim($_REQUEST['wed_id']);
$cid= trim($_REQUEST['id']);
$imgid = $cid;
$smarty->assign('currentpage_js', 'ctheme_add_cover');
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
$chkqry_cov= "SELECT * FROM wed_covers_mas where wed_cover_autoid   = '".$cid."' and wed_cover_type='2' ";
$selectwed_covde= $userslog_obj->selectVal($chkqry_cov);
$mal_maxlength =  $selectwed_covde[0]['wed_cover_male_max_char'];
$femal_maxlength =  $selectwed_covde[0]['wed_cover_female_max_char'];
$left_side_tot =  $selectwed_covde[0]['wed_cover_center_align'];
$right_side_tot =  $selectwed_covde[0]['wed_cover_adjust'];
$smarty->assign('mal_maxlength', $mal_maxlength);
$smarty->assign('femal_maxlength', $femal_maxlength);

$chkqry_covr= "SELECT wed_cover_male_name, wed_cover_female_name, male_name, marriage_date, female_name, marriage_date_only, gmap_latitude, gmap_longitude FROM mrg_all_info where mrg_url_status_auto_id   = '".$current_wedid."' ";
$select_cov= $userslog_obj->selectVal($chkqry_covr);
$cover_male_name =  $select_cov[0]['wed_cover_male_name'];
$cover_female_name =  $select_cov[0]['wed_cover_female_name'];
$male_name =  $select_cov[0]['male_name'];
$female_name =  $select_cov[0]['female_name'];
$marriage_date =  $select_cov[0]['marriage_date'];
$latitude =  trim($select_cov[0]['gmap_latitude']);
$longitude =  trim($select_cov[0]['gmap_longitude']);
$showerr=0;
if ( $latitude == '' || $longitude == '' ) {
$showerr=1;
}


$marriage_date_only =  trim($select_cov[0]['marriage_date_only']);
if ($marriage_date_only != "")
	$marriage_date =date('jS M, Y', strtotime("$marriage_date_only"));
else
	$marriage_date =date('jS M, Y', strtotime("$marriage_date"));

$mal_name = ($cover_male_name != "" ) ? $cover_male_name : $male_name;
$femal_name = ($cover_female_name != "" ) ? $cover_female_name : $female_name;

$select_additional_info= "SELECT classic_cover_heading, classic_cover_content, classic_cover_mobile FROM mrg_all_info_add where mrg_url_status_auto_id   = '".$current_wedid."' ";
$additional_info= $userslog_obj->selectVal($select_additional_info);
$cover_heading =  $additional_info[0]['classic_cover_heading'];
$cover_content =  $additional_info[0]['classic_cover_content'];
$cover_mobile =  $additional_info[0]['classic_cover_mobile'];
$smarty->assign('tpl_cover_heading', $cover_heading);
$smarty->assign('tpl_cover_content', $cover_content);
$smarty->assign('tpl_cover_mobile', $cover_mobile);


// Create male name with in image - Start
$saveclassic= trim($_REQUEST['save_classic']); 
if ($saveclassic == 'saveit') {
	$grooms_name= trim($_REQUEST['txt_wed_grooms_name']);
	$brides_name= trim($_REQUEST['txt_wed_brides_name']);

	$covercon= trim($_REQUEST['cover_con']);
	$covertit= trim($_REQUEST['cover_title']);
	$wed_mobile= trim($_REQUEST['txt_wed_mobile']);

	$mal_name_cnt = strlen($grooms_name);
	$femal_name_cnt = strlen($brides_name);
	//$mal_maxlength.$femal_maxlength
	$err = ''; $cont = 1;
	if($mal_name_cnt > $mal_maxlength){
	$err = 'Please enter valid male name';
	$cont = 0;
	}

	if($femal_name_cnt > $femal_maxlength){
	$err .= 'Please enter valid female name.';
	$cont = 0;
	}

	if($covercon == '') {
	$err .= 'Please enter cover contents.';
	$cont = 0;
	}
	
	if($covertit == '') {
	$err .= 'Please enter cover title.';
	$cont = 0;
	}

	if($showerr == 1){
	$err .= "We must required Google Map details for classic wedding cover. <a href='gmap_search.php?wedid={$current_wedid}&do=searchloc'>Click here</a> to update your address details.";
	$cont = 0;
	}

	$divider_val = '&';
	if($cont){ // All are fine, So we can insert DB & update the cover also.
		$upqry= "UPDATE mrg_all_info SET wed_animate_cover = 1, wed_cover_id = '".$imgid."', wed_cover_male_name = '".$grooms_name."', wed_cover_female_name = '".$brides_name."' WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
		$userslog_obj->updateVal($upqry);

		$upqrys= "UPDATE mrg_all_info_add SET classic_cover_heading = '".addslashes($covertit)."', classic_cover_content = '".addslashes($covercon)."', classic_cover_mobile = '".$wed_mobile."' WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
		$userslog_obj->updateVal($upqrys);

		$cu_img = "images/wedding_cover/bg_$imgid.jpg";
		$jpg_image = imagecreatefromjpeg($cu_img);
		 
		// Calculations
		// Print Text On Image
		// Start - 590
		// Start - 590, END - 967 = 377
		$chkqry_covr_details= "SELECT wed_cover_name_range, wed_cover_name_color, wed_cover_name_text FROM wed_cover_name_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '2' LIMIT 0 , 1";
		$select_nm_details= $userslog_obj->selectVal($chkqry_covr_details);
		$cover_name_color = $select_nm_details[0]['wed_cover_name_color'];
		$cover_name_text =  $select_nm_details[0]['wed_cover_name_text'];
		$pieces_name_txt = explode(",", $cover_name_text);
		$pieces_name_color = explode(",", $cover_name_color);
		//The numbers are the RGB values of the color you want to use 
		// Allocate A Color For The Text
		$cover_name_text = imagecolorallocate($jpg_image, $pieces_name_color[0], $pieces_name_color[1], $pieces_name_color[2]);
		$p5 = trim($pieces_name_txt[5]);
		$font_path = "templates/covers/ttf/$p5";
		$bbox = imagettfbbox($pieces_name_txt[0], 10, $font_path, $grooms_name);
		$textval = ($bbox[4] - $bbox[1]);
		// grooms_name print
		$lval = ((($right_side_tot - $textval) / 2 ) + $left_side_tot);
		imagettftext($jpg_image, $pieces_name_txt[0], 0, $lval, $pieces_name_txt[3], $cover_name_text, $font_path, $grooms_name);
		
		// Divider symbol print
		$chkqry_covr_details= "SELECT wed_cover_name_range, wed_cover_name_color, wed_cover_name_text FROM wed_cover_name_details where wed_cover_id  = '".$imgid."' and wed_cover_attr = '5' LIMIT 0 , 1";
		$select_div_details= $userslog_obj->selectVal($chkqry_covr_details);
		$cover_div_color = $select_div_details[0]['wed_cover_name_color'];
		$cover_div_text =  $select_div_details[0]['wed_cover_name_text'];
		$pieces_div_txt = explode(",", $cover_div_text);
		$pieces_div_color = explode(",", $cover_div_color);
		$divider_text = imagecolorallocate($jpg_image, $pieces_div_color[0], $pieces_div_color[1], $pieces_div_color[2]);
		
		// Divider symbol print
		$p5 = trim($pieces_div_txt[5]);
		$font_path = "templates/covers/ttf/$p5";
		$bbox = imagettfbbox($pieces_div_txt[0], 10, $font_path, $divider_val);
		$textval = ($bbox[4] - $bbox[1]);
		$lval = ((($right_side_tot - $textval) / 2 ) + $left_side_tot);
		imagettftext($jpg_image, $pieces_div_txt[0], 0, $lval, $pieces_div_txt[3], $divider_text, $font_path, $divider_val);

		// Female symbol print
		$chkqry_fname_details= "SELECT wed_cover_name_range, wed_cover_name_color, wed_cover_name_text FROM wed_cover_name_details where wed_cover_id  = '".$imgid."' and wed_cover_attr = '3' LIMIT 0 , 1";
		$select_fname_details= $userslog_obj->selectVal($chkqry_fname_details);
		$cover_fname_color = $select_fname_details[0]['wed_cover_name_color'];
		$cover_fname_text =  $select_fname_details[0]['wed_cover_name_text'];
		$pieces_fname_txt = explode(",", $cover_fname_text);
		$pieces_fname_color = explode(",", $cover_fname_color);
		$fname_text = imagecolorallocate($jpg_image, $pieces_fname_color[0], $pieces_fname_color[1], $pieces_fname_color[2]);
		
		// brides_name print
		$p5 = trim($pieces_fname_txt[5]);
		$font_path = "templates/covers/ttf/$p5";
		$bbox = imagettfbbox($pieces_fname_txt[0], 10, $font_path, $brides_name);
		$textval = ($bbox[4] - $bbox[1]);
		
		// grooms_name print
		$lval = ((($right_side_tot - $textval) / 2 ) + $left_side_tot);
		imagettftext($jpg_image, $pieces_fname_txt[0], 0, $lval, $pieces_fname_txt[3], $fname_text, $font_path, $brides_name);
		
		// Date symbol print
		$chkqry_date_details= "SELECT wed_cover_attr_color, wed_cover_attr_text FROM wed_cover_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '1' ";
		$select_date_details= $userslog_obj->selectVal($chkqry_date_details);
		$cover_date_color =  $select_date_details[0]['wed_cover_attr_color'];
		$cover_date_text =  $select_date_details[0]['wed_cover_attr_text'];
		$pieces_date_txt = explode(",", $cover_date_text);
		$pieces_date_color = explode(",", $cover_date_color);
		$date_text = imagecolorallocate($jpg_image, $pieces_date_color[0], $pieces_date_color[1], $pieces_date_color[2]);

		// brides_name print
		$p5 = trim($pieces_date_txt[5]);
		$font_path = "templates/covers/ttf/$p5";
		$bbox = imagettfbbox($pieces_date_txt[0], 10, $font_path, $marriage_date);
		$textval = ($bbox[4] - $bbox[1]);
		
		// grooms_name print
		$lval = ((($right_side_tot - $textval) / 2 ) + $left_side_tot);
		imagettftext($jpg_image, $pieces_date_txt[0], 0, $lval, $pieces_date_txt[3], $date_text, $font_path, $marriage_date);
		
		$dirName = "templates/covers/$current_wedid";
		if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
		$dirName=$dirName.'/mycover.jpg';
		Imagejpeg($jpg_image, $dirName, 100);
		
		// Clear Memory
		imagedestroy($jpg_image);

		$mal_name = $grooms_name;
		$femal_name = $brides_name;
	}

}
// Create male name with in image - End


// Fetch Sample Cover headings
$qrymsgs= "SELECT classic_text,classic_auto_id FROM `classic_cover_contents` WHERE classic_text_type  ='1' ";
$selectmsgs= $userslog_obj->selectVal($qrymsgs);
$msgtmplates="";
foreach($selectmsgs as $key=>$field){
	$classic_text = $field['classic_text'];
	$auto_id = $field['classic_auto_id'];
	//$addslashval=base64_decode($wedmsgs);
	//$msgtmplates .= '<li><a onclick="FillValueInField('.urlencode($wedmsgs).');" style="cursor:pointer;">'.$wedmsgs.'</a></li>';
	$msgtmplates .= '<li style="padding: 10px;"><a id="tmpl_title" class="tmpl_'.$auto_id.'" text="'.$classic_text.'" onclick="FillValueInField('.$auto_id.');" style="cursor:pointer;">'.$classic_text.'</a></li>';
}
$smarty->assign('head_msgtmplates', $msgtmplates);

// Fetch Sample Cover headings
$qrymsgs= "SELECT classic_text,classic_auto_id FROM `classic_cover_contents` WHERE classic_text_type  ='2' ";
$selectmsgs= $userslog_obj->selectVal($qrymsgs);
$msgtmplates="";
foreach($selectmsgs as $key=>$field){
	$classic_text = $field['classic_text'];
	$auto_id = $field['classic_auto_id'];
	//$addslashval=base64_decode($wedmsgs);
	//$msgtmplates .= '<li><a onclick="FillValueInField('.urlencode($wedmsgs).');" style="cursor:pointer;">'.$wedmsgs.'</a></li>';
	$msgtmplates .= '<li style="padding: 10px;"><a id="tmpl_desc" class="tmpl_'.$auto_id.'" text="'.$classic_text.'" onclick="FillValueInField('.$auto_id.');" style="cursor:pointer;">'.$classic_text.'</a></li>';
}
$smarty->assign('desc_msgtmplates', $msgtmplates);

$req_grooms_name = trim($_REQUEST['txt_wed_grooms_name']);
$req_brides_name = trim($_REQUEST['txt_wed_brides_name']);
$smarty->assign('mal_name', $mal_name);
$smarty->assign('showerr_gmap', $showerr);
$smarty->assign('femal_name', $femal_name);
$smarty->assign('covertit_glb', $covertit);
$smarty->assign('covercon_glb', $covercon);
$smarty->assign('mob_num', $wed_mobile);
$smarty->assign('err_status', $cont);
$smarty->assign('err_test', $err);
$content_template = 'default/mrg_account/classiccover.tpl';
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
// List avilable wed URLs.
$smarty->assign('wed_acc_id', $current_wedid );
$smarty->assign('do_val', 'caddc');
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
