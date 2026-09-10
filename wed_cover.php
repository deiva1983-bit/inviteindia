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
$from_src= trim($_REQUEST['from']);
$smarty->assign('currentpage_js', 'theme_add_cover');
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$current_wedid."' and mrg_main_user_id = '".$user_log_id."' ";
	$selectwed_acces= $userslog_obj->selectVal($chkqry);
	if(count($selectwed_acces))
	{
	$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
	}
	else
	{
	exit;
	}
$chkqry_covr= "SELECT wed_lang_id FROM mrg_all_info_add where mrg_url_status_auto_id   = '".$current_wedid."' ";
$selectaddi = $userslog_obj->selectAffectedRows($chkqryres_add);
$lang_id = 1;
if($selectaddi){
	$select_langdetails= $userslog_obj->selectVal($chkqry_covr);
	$lang_id =  $select_langdetails[0]['wed_lang_id'];
}
$user_allowed=$common_obj->checkWedFree($user_log_id, $current_wedid);
if($user_allowed){
$smarty->assign('blockpage', 1 ); 
$smarty->assign('errors', $free_errmsgs ); 
}
if($current_action == 'addcover'){
$chkqry_covr= "SELECT wed_animate_cover FROM mrg_all_info where mrg_url_status_auto_id   = '".$current_wedid."' ";
$select_cov= $userslog_obj->selectVal($chkqry_covr);
$wed_animate_cover =  $select_cov[0]['wed_animate_cover'];
$smarty->assign('animate_cover', $wed_animate_cover);
	$chkqry1= "SELECT * FROM wed_covers_mas where wed_cover_status   = '1' and wed_cover_type = '1'";
	$selectwed_cv= $userslog_obj->selectVal($chkqry1);
	if (count($selectwed_cv))
			{			
            $msgdetails="";
			$imgslide=""; $imgslide_banner="";
	 	foreach($selectwed_cv as $key=>$field)
                     {
					 $cv_name= $field['wed_cover_name'];
					 $cv_demo= $field['wed_cover_demo'];
					 $imgslide .= "<div style='width: 100px;'><img src='images/wedding_cover/thump/thump_$cv_demo.jpg' /></div>";	
						$imgslide_banner .= "<img src='images/wedding_cover/slide/bg_$cv_demo.jpg' alt='#slideshow-$cv_demo'  height='100px' width='100px' />";
						
						
					 }
			}

$_SESSION['wed_settings_access'] = 1;
	if($current_wedid != "")
	{

		$up_img=trim($_REQUEST['save_image']);
		$up_change=trim($_REQUEST['change']);
		
		if($up_img == "Save Image")
		{
			 
		}
		else
		{
		$succ_con = 0;
		if ($from_src == 'wed_succ')
		{
		$succ_con = 1;
		$rewrite_url=$_SESSION['wed_url_engine'];		
		}
		$smarty->assign('glb_from_src', $from_src);
		$smarty->assign('glb_rewrite_url', $rewrite_url);
		 $content_template = 'default/mrg_account/show_cover.tpl';
		 }
		 
	} 
	else
	{ 
		echo "Sorry something Wrong, Please try again.";
	}
 
$smarty->assign('succ_con', $succ_con);
}else if ($current_action == 'coversett')
{

$pagedo=trim($_REQUEST['pagedo']);
$update_wedding=trim($_REQUEST['update_wedding_cover']);
if ($from_src == 1)
{
$smarty->assign('glb_from_src', $from_src);
}else
{
$smarty->assign('glb_from_src', 0);
}

if($pagedo != "")
{
$pieces = explode("-", $pagedo);
$imgid = $pieces[1];
$imgid = $imgid + 1;
$content_template = 'default/mrg_account/coversettings.tpl';

$chkqry_cov= "SELECT * FROM wed_covers_mas where wed_cover_autoid   = '".$imgid."' ";
$selectwed_covde= $userslog_obj->selectVal($chkqry_cov);
$mal_maxlength =  $selectwed_covde[0]['wed_cover_male_max_char'];
$femal_maxlength =  $selectwed_covde[0]['wed_cover_female_max_char'];
$cover_center_align =  $selectwed_covde[0]['wed_cover_center_align'];
$smarty->assign('mal_maxlength', $mal_maxlength);
$smarty->assign('femal_maxlength', $femal_maxlength);
	
$chkqry_covr= "SELECT wed_cover_male_name, wed_cover_female_name, male_name, marriage_date, female_name, marriage_date_only FROM mrg_all_info where mrg_url_status_auto_id   = '".$current_wedid."' ";
$select_cov= $userslog_obj->selectVal($chkqry_covr);
$cover_male_name =  $select_cov[0]['wed_cover_male_name'];
$cover_female_name =  $select_cov[0]['wed_cover_female_name'];
$male_name =  $select_cov[0]['male_name'];
$female_name =  $select_cov[0]['female_name'];
$marriage_date =  $select_cov[0]['marriage_date'];
$marriage_date_only =  trim($select_cov[0]['marriage_date_only']);
if ($marriage_date_only != "")
	$marriage_date =date('jS M, Y', strtotime("$marriage_date_only"));
else
	$marriage_date =date('jS M, Y', strtotime("$marriage_date"));

	
$mal_name = ($cover_male_name != "" ) ? $cover_male_name : $male_name;
$femal_name = ($cover_female_name != "" ) ? $cover_female_name : $female_name;

$req_grooms_name = trim($_REQUEST['txt_wed_grooms_name']);
$req_brides_name = trim($_REQUEST['txt_wed_brides_name']);
$mal_name = ($req_grooms_name != "" and $update_wedding == 'Add Cover') ? $req_grooms_name : $mal_name;

$femal_name = ($req_brides_name != "" and $update_wedding == 'Add Cover' ) ? $req_brides_name : $femal_name;
$mal_name_cnt = strlen($mal_name);
$femal_name_cnt = strlen($femal_name);
$mal_class = ''; $femal_class='';
$all_up = 0;
if($lang_id == 1) {
if($mal_name_cnt > $mal_maxlength)
{
$mal_class="ui-state-error";
$all_up = 1;
}
if($femal_name_cnt > $femal_maxlength)
{
$femal_class="ui-state-error";
$all_up = 1;
}
}
else {
$mal_name_cnt = 10;
$femal_name_cnt = 10;
}
if($update_wedding == 'Add Cover' and $all_up == 0)
{
	$upqry= "UPDATE mrg_all_info SET wed_animate_cover = 1, wed_cover_id = '".$imgid."', wed_cover_male_name = '".$mal_name."', wed_cover_female_name = '".$femal_name."' WHERE mrg_url_status_auto_id ='".$current_wedid."' LIMIT 1 " ;
	$userslog_obj->updateVal($upqry);
	$cu_img = "images/wedding_cover/bg_$imgid.jpg";
	$im = imagecreatefromjpeg($cu_img);
	
	$chkqry_covr_details= "SELECT wed_cover_attr_color, wed_cover_attr_text FROM wed_cover_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '1' ";
	$select_cov_details= $userslog_obj->selectVal($chkqry_covr_details);
	$cover_attr_color =  $select_cov_details[0]['wed_cover_attr_color'];
	$cover_attr_text =  $select_cov_details[0]['wed_cover_attr_text'];	
	
	$pieces_date_color = explode(",", $cover_attr_color);
	//The numbers are the RGB values of the color you want to use 
	$black = ImageColorAllocate($im, $pieces_date_color[0], $pieces_date_color[1], $pieces_date_color[2]); 
	
	//$black = ImageColorAllocate($im, $cover_attr_color); 
	$pieces = explode(",", $cover_attr_text);
	$p5 = trim($pieces[5]);
	$p5 = "templates/covers/ttf/$p5";
	Imagettftext($im, $pieces[0], $pieces[1], $pieces[2], $pieces[3], $black, $p5, $marriage_date); 	
	
	// Name update	
	if($lang_id == 1) 
	$mal_name = ucwords(strtolower ($mal_name) );
	$chkqry_covr_details= "SELECT wed_cover_name_range,	wed_cover_name_color, wed_cover_name_text FROM wed_cover_name_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '2' and wed_cover_name_range >= $mal_name_cnt LIMIT 0 , 1"; 	 
	
	$select_nm_details= $userslog_obj->selectVal($chkqry_covr_details);
	$cover_name_color = $select_nm_details[0]['wed_cover_name_color'];
	$cover_name_text =  $select_nm_details[0]['wed_cover_name_text'];
	$pieces_name_color = explode(",", $cover_name_color);
	//The numbers are the RGB values of the color you want to use 
	$nm_color = ImageColorAllocate($im, $pieces_name_color[0], $pieces_name_color[1], $pieces_name_color[2]); 
	$pieces_name_txt = explode(",", $cover_name_text);
	//print_r ($pieces_name_txt);
	$p5 = trim($pieces_name_txt[5]);
	$textsts_male = (preg_match("#^[-A-Za-z0-9.' ]*$#",$mal_name));
	if($lang_id == 2 && !$textsts_male) 
		$p5 = 'tamil/latha.ttf';
	$font_mname = "templates/covers/ttf/$p5";	
	
	
	
	
	// Event Details	
	$chkqry_covr_event_details= "SELECT wed_cover_name_text, wed_cover_name_color, wed_cover_namealign FROM wed_cover_name_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '5' LIMIT 0 , 1"; 	 
	
	$select_event_details= $userslog_obj->selectVal($chkqry_covr_event_details);
	$allign_default=0;
	if (count($select_event_details))
	{
	$cover_event_color = $select_event_details[0]['wed_cover_name_color'];
	$cover_event_text =  $select_event_details[0]['wed_cover_name_text'];
	$namealign =  $select_event_details[0]['wed_cover_namealign'];	
	$pieces_event_color = explode(",", $cover_event_color);
	//The numbers are the RGB values of the color you want to use 
	$evt_color = ImageColorAllocate($im, $pieces_event_color[0], $pieces_event_color[1], $pieces_event_color[2]); 
	$pieces_event_txt = explode(",", $cover_event_text);
	//print_r ($pieces_event_txt);
	$p5 = trim($pieces_event_txt[5]);
	$p5 = "templates/covers/ttf/$p5";	
	Imagettftext($im, $pieces_event_txt[0], $pieces_event_txt[1], $pieces_event_txt[2], $pieces_event_txt[3], $evt_color, $p5, '&');
	$centerword_x = $pieces_event_txt[2];	
	if(!$namealign) {
	$bbox = imagettfbbox($pieces_name_txt[0], $pieces_name_txt[1], $font_mname, $mal_name);
	$cal_val = ($bbox[2] >  $bbox[4]) ? $bbox[2] : $bbox[4];	
	$cal_x_val = ($pieces_event_txt[2] - $cal_val) ;
	$cal_x_val = $cal_x_val - 30;
	//echo $cal_val, '--', $pieces_event_txt[2];
	$cal_val = ($cal_x_val !=  '') ? $cal_x_val : $pieces_name_txt[2];
	Imagettftext($im, $pieces_name_txt[0], $pieces_name_txt[1], $cal_x_val, $pieces_name_txt[3], $nm_color, $font_mname, $mal_name);
	$allign_default = 1;
	}

	}
	if(!$allign_default)
	{
	Imagettftext($im, $pieces_name_txt[0], $pieces_name_txt[1], $pieces_name_txt[2], $pieces_name_txt[3], $nm_color, $font_mname, $mal_name);
	}
	
	if($lang_id == 1)
	$femal_name = ucwords(strtolower ($femal_name) );
	$chkqry_covr_fe_details= "SELECT wed_cover_name_range,	wed_cover_name_color, wed_cover_name_text FROM wed_cover_name_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '3' and wed_cover_name_range >= $femal_name_cnt LIMIT 0 , 1"; 	 
	
	$select_fenm_details= $userslog_obj->selectVal($chkqry_covr_fe_details);
	$cover_name_color = $select_fenm_details[0]['wed_cover_name_color'];
	$cover_name_text =  $select_fenm_details[0]['wed_cover_name_text'];
	$pieces_fename_color = explode(",", $cover_name_color);
	//The numbers are the RGB values of the color you want to use 
	$nm_color = ImageColorAllocate($im, $pieces_fename_color[0], $pieces_fename_color[1], $pieces_fename_color[2]); 
	$pieces_fename_txt = explode(",", $cover_name_text);
	//print_r ($pieces_name_txt);
	$p5 = trim($pieces_fename_txt[5]);
	$textsts = (preg_match("#^[-A-Za-z0-9.' ]*$#",$femal_name));
	if($lang_id == 2 && !$textsts) 
		$p5 = 'tamil/latha.ttf';
	$p5 = "templates/covers/ttf/$p5";
	Imagettftext($im, $pieces_fename_txt[0], $pieces_fename_txt[1], $pieces_fename_txt[2], $pieces_fename_txt[3], $nm_color, $p5, $femal_name);
	
	
	
	
	
	
	
	
	// Invitations Links
	/* $chkqry_covr_link= "SELECT wed_cover_name_color, wed_cover_name_text FROM wed_cover_name_details where wed_cover_id    = '".$imgid."' and wed_cover_attr = '4' LIMIT 0 , 1"; 	 
	
	$select_link_details= $userslog_obj->selectVal($chkqry_covr_link);
	
	$cover_link_color = $select_link_details[0]['wed_cover_name_color'];
	$cover_link_text =  $select_link_details[0]['wed_cover_name_text'];
	$pieces_link_color = explode(",", $cover_link_color);
	//The numbers are the RGB values of the color you want to use 
	$ln_color = ImageColorAllocate($im, $pieces_link_color[0], $pieces_link_color[1], $pieces_link_color[2]); 
	$pieces_link_txt = explode(",", $cover_link_text);
	//print_r ($pieces_name_txt);
	$p5 = trim($pieces_link_txt[5]);
	$p5 = "templates/covers/ttf/$p5";
	$link_txt = "GO TO INVITATION";
	Imagettftext($im, $pieces_link_txt[0], $pieces_link_txt[1], $pieces_link_txt[2], $pieces_link_txt[3], $ln_color, $p5, $link_txt);
	*/
	$dirName = "templates/covers/$current_wedid";
	if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
	$dirName=$dirName.'/mycover.jpg';
	Imagejpeg($im, $dirName, 100); 

	ImageDestroy($im);
	$smarty->assign('alert_status', 1);
}
$smarty->assign('femal_class', $femal_class);
$smarty->assign('mal_class', $mal_class);
$smarty->assign('mal_name', $mal_name);
$smarty->assign('femal_name', $femal_name);
$smarty->assign('do_imgid', $imgid);
//ui-state-error
}

}
 
$smarty->assign('imgslide', $imgslide);
$smarty->assign('imgslide_banners', $imgslide_banner);
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
// List avilable wed URLs.
$smarty->assign('wed_acc_id', $current_wedid );
$smarty->assign('do_val', 'addcover');
$smarty->assign('glb_albumstatus', $albumstatus); 
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
