<?php 
include_once( 'includes/configs/init.php' ); 
 //include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
/*----- Object creation end-----*/
$user_log_id_sess= trim($_SESSION['sess_user_id']);
$page_status = $_REQUEST['status'];
$page_ownpage = $_REQUEST['page'];
$smarty->assign('currentpage_js', 'wedhome');
$smarty->assign('c_page_status', $page_status);
$smarty->assign('page_ownpage', $page_ownpage);
$pagestring= $_SERVER["REQUEST_URI"];
$page_url=trim(substr( $pagestring, 1 ));
$pieces = explode("?", $page_url);
$page_url = $pieces[0];	
//$page_url = 'deivatest';
//$page_url = 'new_wedding';
$fb_url = urlencode($glb_site_url.$page_url);
$chkqry= "SELECT murl.ownpage_links, murl.ownpage_links_classic, murl.ownpage_links_mobile, murl.mrg_main_user_id, murl.mrg_url_sts_auto_id, murl.mrg_theme_id, murl.invitation_type, mthm.mrg_theme_url, mthm.mrg_theme_sub_sts, mthm.mrg_theme_sub_url, mthm.mrg_theme_catid, mthm.mrg_theme_type, usrlog.usrlog_plan, murl.pwd_protection_sts, murl.pwd FROM mrg_url_status murl, mrg_mas_theme mthm, tbl_user_login usrlog WHERE murl.mrg_page_url ='$page_url' and murl.mrg_status = '1' and mthm.mrg_theme_auto_id = murl.mrg_theme_id and mthm.mrg_theme_status='1' and usrlog.usrlog_id = murl.mrg_main_user_id";
$chk_page_access= $userslog_obj->selectVal($chkqry);
$pwd_sts = $chk_page_access[0]['pwd_protection_sts'];
$pwd_val = $chk_page_access[0]['pwd'];
if(!count($chk_page_access)){
	// Check birthday related querys
	$chkqry_birth= "SELECT * FROM birth_url_status burl, tbl_user_login usrlog WHERE burl.birth_page_url ='$page_url' and burl.birth_status = '1' and  usrlog.usrlog_id = burl.birth_main_user_id";

	$chkqry_birth= "SELECT burl.ownpage_links, burl.ownpage_links_classic, burl.birth_main_user_id, burl.birth_url_sts_auto_id, burl.birth_theme_id, mthm.mrg_theme_url, mthm.mrg_theme_sub_sts, mthm.mrg_theme_sub_url, mthm.mrg_theme_catid, mthm.mrg_theme_type, usrlog.usrlog_plan FROM birth_url_status burl, mrg_mas_theme mthm, tbl_user_login usrlog WHERE burl.birth_page_url ='$page_url' and burl.birth_status = '1' and mthm.mrg_theme_auto_id = burl.birth_theme_id and mthm.mrg_theme_status='1' and usrlog.usrlog_id = burl.birth_main_user_id";
	$chk_birth_access= $userslog_obj->selectVal($chkqry_birth);

	if(!count($chk_birth_access) ){
	echo '<img src="'.$glb_site_url.'/images/404.jpg">';
	exit;
	}
	include_once 'birhday_moments.php';
	exit;
}
$shownew = 1;
$master_user_id = $chk_page_access[0]['mrg_main_user_id'];
$theme_type = $chk_page_access[0]['mrg_theme_type'];
$master_id = $chk_page_access[0]['mrg_url_sts_auto_id'];
// Start - Secure page
if($pwd_sts){
if($_COOKIE['secured'] != 1) {
	$pers_details="SELECT pdet.male_name, pdet.female_name FROM mrg_all_info pdet where pdet.mrg_url_status_auto_id = '$master_id' ";
	$page_access= $userslog_obj->selectVal($pers_details);
	$male_name = $page_access[0]['male_name'];
	$female_name = $page_access[0]['female_name'];
	$smarty->assign('glb_id', $master_id);
	$smarty->assign('glb_m_name', $male_name);
	$smarty->assign('glb_f_name', $female_name);

		$head_template='default/mrg_template/pwd/header.tpl';
		$head_template = $common_obj->load_mobile_tpl_files($isMobile, $head_template);

		$cont_template='default/mrg_template/pwd/content.tpl';
		$cont_template = $common_obj->load_mobile_tpl_files($isMobile, $cont_template);

		$foot_template='default/mrg_template/pwd/fotter.tpl';
		$foot_template = $common_obj->load_mobile_tpl_files($isMobile, $foot_template);

	$smarty->assign('header', $smarty->fetch($head_template) );
	$smarty->assign('content', $smarty->fetch($cont_template) );
	$smarty->assign('footer', $smarty->fetch($foot_template) );
	/*----- Include Files Details End-----*/
	$smarty->display('default/index.tpl'); 
exit;
}
}
// End - Secure page

if($theme_type == '2') {
include_once 'classic_moments.php';
exit;
}
$theme_sub_sts = $chk_page_access[0]['mrg_theme_sub_sts'];
$mrg_theme_id = $chk_page_access[0]['mrg_theme_id'];
$smarty->assign('master_theme_id', $mrg_theme_id);
$smarty->assign('glb_browser_name', $bname);
$chkind = array("1", "2", "3", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "23", "24", "25", "26", "27", "28", "29", "31", "32", "33", "34", "39", "40");
if (in_array($mrg_theme_id, $chkind)) {
    $show_frame_music = 1;
}
if($show_frame_music){
	$iframe_url = $glb_site_url.$page_url;
	$display_iframe = 0;
	$add_info_qry="SELECT * FROM mrg_all_info_add mrg_add WHERE mrg_url_status_auto_id ='$master_id' ";
	$selectaddi = $userslog_obj->selectAffectedRows($add_info_qry);
	$music_id=0;$music_active=0;$add_access='';$lang_id=1;
	if($selectaddi){
	$add_access = $userslog_obj->selectVal($add_info_qry);
	$music_id = $add_access[0]['wed_music_id'];
	$music_active = $add_access[0]['wed_music_active'];
	$lang_id = $add_access[0]['wed_lang_id'];
	$smarty->assign('glb_music_id', $music_id);
	$smarty->assign('glb_music_active', $music_active);
	}
	/****************** Common For ALL Pages- Start**********************/
	$smarty->assign('glb_frame_url', $iframe_url);
	$theme_sub_sts = $chk_page_access[0]['mrg_theme_sub_sts'];
	$mrg_theme_catid = $chk_page_access[0]['mrg_theme_catid'];
	$ownpage_links= trim($chk_page_access[0]['ownpage_links']);
	$links_mobile= trim($chk_page_access[0]['ownpage_links_mobile']);
	$usrlog= trim($chk_page_access[0]['usrlog_plan']);
	if($ownpage_links != '')
		$ownpage_links =str_replace("%domainname%", "$page_url", $ownpage_links);
	if($links_mobile != '')
		$linksmobile =str_replace("%domainname%", "$page_url", $links_mobile);
	$mrg_theme_folder = 'theme_'.$mrg_theme_id;
	$smarty->assign('glb_usrlog', $usrlog);
	// Check whether its sub theme or main theme.
	$them_sub_url='';
	if ($theme_sub_sts == 1){
	$them_sub_url = 'sub_'.$chk_page_access[0]['mrg_theme_sub_url']."/";
	$mrg_theme_folder = $chk_page_access[0]['mrg_theme_url']."/".$them_sub_url."/";
	}
	$theme_url = "default/mrg_template/".$chk_page_access[0]['mrg_theme_url']."/";
	$mtheme_url = $chk_page_access[0]['mrg_theme_url'];
	$img_urls= $glb_site_url.'/templates/default/mrg_template/'.$chk_page_access[0]['mrg_theme_url'].'/';
	$smarty->assign('glb_site_url', $glb_site_url);
	$smarty->assign('glb_img_urls', $img_urls);
	// Find classic bg images
	$classic_bg_image = '';
	if($mrg_theme_catid == 1){
		$selectbg = 'select classic_all_page,classic_home_page,classic_events_page,classic_gbook_page,classic_findloc_page,classic_album_page,classic_home_page,classic_own_page from mrg_classic_tpl where classic_wedid = '.$master_id.' and classic_status = 1';
		$selectbgcnt = $userslog_obj->selectAffectedRows($selectbg);
		if($selectbgcnt){
			$selectbgimages= $userslog_obj->selectVal($selectbg);
			$classic_all_page = $selectbgimages[0]['classic_all_page'];
			$classic_home_page = $selectbgimages[0]['classic_home_page'];
			$classic_events_page = $selectbgimages[0]['classic_events_page'];
			$classic_gbook_page = $selectbgimages[0]['classic_gbook_page'];
			$classic_findloc_page = $selectbgimages[0]['classic_findloc_page'];
			$classic_album_page = $selectbgimages[0]['classic_album_page'];
			$classic_own_page = $selectbgimages[0]['classic_own_page'];
		}
	}
	$home_page_info_qry="SELECT mrg_all.*,kural.kural_brieff,des.des_brieff FROM mrg_all_info mrg_all, mrg_mas_des des, mrg_mas_thirukural kural WHERE thirukkural = kural_auto_id and description = des_auto_id and mrg_url_status_auto_id = '$master_id' ";
	$chk_page_access= $userslog_obj->selectVal($home_page_info_qry);
	include_once( "lang/lang_$lang_id.php" );
	$smarty->assign('glb_lang_id', $lang_id);
	$album_status_js = 0; 
	$gmap_status_js = 1;
	$wed_auto_id = $chk_page_access[0]['mrg_url_status_auto_id'];
	$animate_reff_id = $chk_page_access[0]['wed_animate_reff_id'];
	$pageheading = $chk_page_access[0]['top_heading'];
	$male_name = $chk_page_access[0]['male_name'];
	$female_name = $chk_page_access[0]['female_name'];
	$smarty->assign('glb_pageheading', $pageheading);
	$smarty->assign('glb_male_name', $male_name);
	$smarty->assign('glb_female_name', $female_name);
	$smarty->assign('glb_page_url', $page_url);
	$smarty->assign('glb_master_id', $master_id);
	$smarty->assign('glb_theme_owner_id', $master_user_id);
	$access_by_admin= ($user_log_id_sess == $master_user_id) ? 1 : 0;
	$smarty->assign('glb_access_by_admin', $access_by_admin);
	$marriage_date = $chk_page_access[0]['marriage_date'];
	$marriage_date_only = trim($chk_page_access[0]['marriage_date_only']);
	if($marriage_date_only != ''){
	$marriage_date_title =date('jS F, Y', strtotime("$marriage_date_only"));
	$reception_date = $chk_page_access[0]['reception_date'];
	}else{
	$marriage_date =date('jS F, Y - h:i a', strtotime("$marriage_date"));
	$marriage_date_title =$marriage_date;
	$reception_date = $chk_page_access[0]['reception_date'];
	$reception_date = date('jS F, Y - h:i a', strtotime("$reception_date"));
	}
	$hm_marriage_date_title =date('jS F, Y', strtotime("$marriage_date_only"));
	$smarty->assign('glb_marriage_date_title', $hm_marriage_date_title);
	$glb_marriage_status = $chk_page_access[0]['marriage_status'];
	$glb_reception_status = $chk_page_access[0]['reception_status'];
	if($glb_marriage_status != 0){
	$pagetitle= "Wedding Invitation: $male_name weds $female_name on $marriage_date_title";
	//$rem_validation_date =date('Y-m-d', strtotime($chk_page_access[0]['marriage_date']));
	}else{
	$pagetitle= "Reception Invitation: $male_name & $female_name Welcomes you";	
	//$rem_validation_date =date('Y-m-d', strtotime("$reception_date"));
	}
	$smarty->assign('pagetitle', $pagetitle);
	$showalbum_tab= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
	$showalbum_tab= $userslog_obj->selectVal($showalbum_tab);
	$total_records_album_tab      = count($showalbum_tab);
	$smarty->assign('glb_total_alb_records', $total_records_album_tab);
	$smarty->assign('mrg_wed_auto_id', $wed_auto_id);
	$smarty->assign('glb_show_wed_remainder', $show_wed_remainder);
	$smarty->assign('glb_wed_card_title_home', $wed_card_title_home);
	$smarty->assign('glb_wed_card_title_events', $wed_card_title_events);
	$smarty->assign('glb_wed_card_title_guestbook', $wed_card_title_guestbook);
	$smarty->assign('glb_wed_card_title_loc', $wed_card_title_loc);
	$smarty->assign('glb_wed_card_title_album', $wed_card_title_album);
	$smarty->assign('glb_rem_current_date', date("Y-m-d")); 
	$smarty->assign('glb_tit_blessing', $tit_blessing);
	$smarty->assign('glb_tit_add_bless', $tit_add_bless);
	$smarty->assign('glb_tit_all_pg_bless', $all_pg_bless);
	$smarty->assign('glb_animate_reff_id', $animate_reff_id);
	$smarty->assign('glb_wed_card_cover', "Cover Design");
	$smarty->assign('two_images_max_height', "max-height: 350px;");
	$smarty->assign('glb_fb_url', $fb_url);
	$smarty->assign('ownpage_links', $ownpage_links);
	$smarty->assign('ownpage_linksmobile', $linksmobile);
	$smarty->assign('shownew_tpl', $shownew);
	$headthemurl=$theme_url.$them_sub_url;
	$footer_template='default/mrg_template/footer.tpl';
	$footer_template = $common_obj->load_mobile_tpl_files($isMobile, $footer_template);
	$marriage_location = $chk_page_access[0]['marriage_location'];
	$address = $chk_page_access[0]['address_details'];
	$address_with_landmark = $chk_page_access[0]['address_details_landmark'];
		$animate_cover = $chk_page_access[0]['wed_animate_cover'];
	// I thing we can remove it after confirmed - END
	if($page_status=='' and $page_ownpage == '') {
	$display_iframe = 1;
	$smarty->assign('glb_master_id', $master_id);
	$footer_template='default/mrg_template/footer.tpl';
	$footer_template = $common_obj->load_mobile_tpl_files($isMobile, $footer_template);
	$smarty->assign('footer', $smarty->fetch($footer_template) );
	$iframe_red = ($animate_cover == 1) ? 'c' : 'h';
	$smarty->assign('glb_iframe_red', $iframe_red );
	/* if($music_active)
		$smarty->display('default/index_frame_audio.tpl'); 
	else
		$smarty->display('default/index_frame.tpl'); 
	*/
	$smarty->display('default/index_frame_audio.tpl');
	exit;
	}
	if(($page_status=='h' or $page_status=='' or $page_status=='6') and ($page_ownpage == '') ){
	include_once( 'wed_moments/home.php' ); 
	} 
	if($page_status==1){	
	include_once( 'wed_moments/events.php' );
	}else if($page_status==2){
	include_once( 'wed_moments/guestbook.php' );
	}else if($page_status==4){
	include_once( 'wed_moments/gmap.php' );
	}else if($page_status==3){
	include_once( 'wed_moments/album.php' );
	}else if($page_status==5){
	include_once( 'wed_moments/signup_bless.php' );
	}else if($page_status=='c' and $animate_cover != 0 and $page_ownpage == ''){
	include_once( 'wed_moments/cover.php' );
	}
	
	if($page_ownpage != ''){ 
	include_once( 'wed_moments/ownpage.php' );
	}
	/****************** Load your home page contents- End**********************/
	$smarty->assign('classic_bg_image', trim($classic_bg_image));
	$smarty->assign('glb_animate_cover', $animate_cover);
    $smarty->assign('album_status_js', $album_status_js);
    $smarty->assign('gmap_status_js', $gmap_status_js);
	$headthemurl = $common_obj->load_mobile_tpl_files($isMobile, $headthemurl.'header.tpl');
	$smarty->assign('header', $smarty->fetch($headthemurl) );
	$smarty->assign('content', $smarty->fetch($content_template) );
	$smarty->assign('footer', $smarty->fetch($footer_template) );
	/*----- Include Files Details End-----*/
	$smarty->display('default/index.tpl'); 

} else {

$mrg_theme_catid = $chk_page_access[0]['mrg_theme_catid'];
$ownpage_links= trim($chk_page_access[0]['ownpage_links']);
$usrlog= trim($chk_page_access[0]['usrlog_plan']);
if($ownpage_links != '')
	$ownpage_links =str_replace("%domainname%", "$page_url", $ownpage_links);
$mrg_theme_folder = 'theme_'.$mrg_theme_id;
$smarty->assign('glb_usrlog', $usrlog);
// its sub theme
$them_sub_url='';
if ($theme_sub_sts == 1){
	$them_sub_url = 'sub_'.$chk_page_access[0]['mrg_theme_sub_url']."/";
	$mrg_theme_folder = $chk_page_access[0]['mrg_theme_url']."/".$them_sub_url."/";
	}
$access_by_admin= ($user_log_id_sess == $master_user_id) ? 1 : 0;
$master_id = $chk_page_access[0]['mrg_url_sts_auto_id'];
$theme_url = "default/mrg_template/".$chk_page_access[0]['mrg_theme_url']."/";
$img_urls= $glb_site_url.'/templates/default/mrg_template/'.$chk_page_access[0]['mrg_theme_url'].'/';
$smarty->assign('glb_site_url', $glb_site_url);
$smarty->assign('glb_img_urls', $img_urls);
$content_template = $theme_url.'home.tpl';
$home_page_info_qry="SELECT mrg_all.*,kural.kural_brieff,des.des_brieff FROM mrg_all_info mrg_all, mrg_mas_des des, mrg_mas_thirukural kural WHERE thirukkural = kural_auto_id and description = des_auto_id and mrg_url_status_auto_id = '$master_id' ";
$chk_page_access= $userslog_obj->selectVal($home_page_info_qry);
$add_info_qry="SELECT * FROM mrg_all_info_add mrg_add WHERE mrg_url_status_auto_id ='$master_id' ";
$selectaddi = $userslog_obj->selectAffectedRows($add_info_qry);
$music_id=0;$music_active=0;$add_access='';$lang_id=1;
if($selectaddi){
$add_access = $userslog_obj->selectVal($add_info_qry);
$music_id = $add_access[0]['wed_music_id'];
$music_active = $add_access[0]['wed_music_active'];
$lang_id = $add_access[0]['wed_lang_id'];
$smarty->assign('glb_music_id', $music_id);
$smarty->assign('glb_music_active', $music_active);
}
// Find classic bg images
$classic_bg_image = '';
if($mrg_theme_catid == 1){
	$selectbg = 'select classic_all_page,classic_home_page,classic_events_page,classic_gbook_page,classic_findloc_page,classic_album_page,classic_home_page,classic_own_page from mrg_classic_tpl where classic_wedid = '.$master_id.' and classic_status = 1';
	$selectbgcnt = $userslog_obj->selectAffectedRows($selectbg);
	if($selectbgcnt){
		$selectbgimages= $userslog_obj->selectVal($selectbg);
		$classic_all_page = $selectbgimages[0]['classic_all_page'];
		$classic_home_page = $selectbgimages[0]['classic_home_page'];
		$classic_events_page = $selectbgimages[0]['classic_events_page'];
		$classic_gbook_page = $selectbgimages[0]['classic_gbook_page'];
		$classic_findloc_page = $selectbgimages[0]['classic_findloc_page'];
		$classic_album_page = $selectbgimages[0]['classic_album_page'];
		$classic_own_page = $selectbgimages[0]['classic_own_page'];
	}
}
include_once( "lang/lang_$lang_id.php" );
$smarty->assign('glb_lang_id', $lang_id);
$album_status_js = 0; 
$gmap_status_js = 1;
$wed_auto_id = $chk_page_access[0]['mrg_url_status_auto_id'];
$animate_reff_id = $chk_page_access[0]['wed_animate_reff_id'];
$pageheading = $chk_page_access[0]['top_heading'];
$kural = $chk_page_access[0]['kural_brieff'];
$des_brieff = $chk_page_access[0]['des_brieff'];
$male_name = $chk_page_access[0]['male_name'];
$female_name = $chk_page_access[0]['female_name'];
$address = $chk_page_access[0]['address_details'];
$address_with_landmark = $chk_page_access[0]['address_details_landmark'];
$animate_cover = $chk_page_access[0]['wed_animate_cover'];
$homeimg = $chk_page_access[0]['home_img'];
$smarty->assign('glb_access_by_admin', $access_by_admin);
$smarty->assign('glb_pageheading', $pageheading);
$smarty->assign('glb_kural', $kural);
$smarty->assign('glb_male_name', $male_name);
$smarty->assign('glb_female_name', $female_name);
$wedding_name="<div class='wedding-names'>$male_name</div><div class='wedding-btn'>and</div><div class='wedding-names'>$female_name</div>";
$weddingname="<div class='wedding-names'>$male_name</div><div class='wedding-names'>$female_name</div>";
$des_brieff =str_replace("%replace_names%", "$wedding_name", $des_brieff);
$des_brieff =str_replace("%replacenames%", "$weddingname", $des_brieff);
$smarty->assign('glb_des_brieff', $des_brieff);
$smarty->assign('glb_page_url', $page_url);
$smarty->assign('glb_master_id', $master_id);
$smarty->assign('glb_theme_owner_id', $master_user_id);
$marriage_location = $chk_page_access[0]['marriage_location'];
$marriage_date = $chk_page_access[0]['marriage_date'];
$marriage_date_only = trim($chk_page_access[0]['marriage_date_only']);
if($marriage_date_only != ''){
	//$marriage_date =da te('jS F, Y - h:i a', strtotime("$marriage_date"));
	//$marriage_date =date('jS F, Y - h:i a', strtotime("$marriage_date"));
	$marriage_date_title =date('jS F, Y', strtotime("$marriage_date_only"));
	$reception_date = $chk_page_access[0]['reception_date'];
	}else{
	$marriage_date =date('jS F, Y - h:i a', strtotime("$marriage_date"));
	$marriage_date_title =$marriage_date;
	$reception_date = $chk_page_access[0]['reception_date'];
	$reception_date = date('jS F, Y - h:i a', strtotime("$reception_date"));
}
$hm_marriage_date_title =date('jS F, Y', strtotime("$marriage_date_only"));
$smarty->assign('glb_marriage_date_title', $hm_marriage_date_title);
$glb_marriage_status = $chk_page_access[0]['marriage_status'];
$glb_reception_status = $chk_page_access[0]['reception_status'];
if($glb_marriage_status != 0){
	$pagetitle= "Wedding Invitation: $male_name weds $female_name on $marriage_date_title";
	//$rem_validation_date =date('Y-m-d', strtotime($chk_page_access[0]['marriage_date']));
	}else{
	$pagetitle= "Reception Invitation: $male_name & $female_name Welcomes you";	
	//$rem_validation_date =date('Y-m-d', strtotime("$reception_date"));
	}
$smarty->assign('pagetitle', $pagetitle);
$showalbum_tab= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
$showalbum_tab= $userslog_obj->selectVal($showalbum_tab);
$total_records_album_tab      = count($showalbum_tab);
if(($page_status=='h' or $page_status=='' or $page_status=='6') and ($page_ownpage == '') ){
	$glb_home_img_status  = $chk_page_access[0]['home_img_status'];
	$glb_home_male_img  = $chk_page_access[0]['home_male_img'];
	$glb_home_female_img  = $chk_page_access[0]['home_female_img'];
	if($glb_home_img_status == 1){
		if ($homeimg != "")
			$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/mrg_template/home_images/$wed_auto_id/".$homeimg);
		else
			$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/mrg_template/$mrg_theme_folder/default_home.jpg");	
		}
		else if($glb_home_img_status == 2){
		if($glb_home_male_img != '' and $glb_home_female_img != ''){
			$smarty->assign('glb_maleimg', $glb_site_url."/templates/default/mrg_template/home_images/$wed_auto_id/".$glb_home_male_img);
			$smarty->assign('glb_femaleimg', $glb_site_url."templates/default/mrg_template/home_images/$wed_auto_id/".$glb_home_female_img);
		}else{
		$glb_home_img_status = 1;
		$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/mrg_template/$mrg_theme_folder/default_home.jpg");	
		}
		}
		$smarty->assign('glb_home_img_status', $glb_home_img_status);
		$classic_bg_image= ($classic_home_page != '0') ? $classic_home_page : $classic_all_page;
		}
if($page_status==1){
	$reception_location = $chk_page_access[0]['reception_location'];
	
	$glb_map_lat_wed = $chk_page_access[0]['gmap_latitude'];
	$glb_map_lat_wed = ($glb_map_lat_wed != "") ? $glb_map_lat_wed : 0;
	$glb_map_lon_wed = $chk_page_access[0]['gmap_longitude'];
	$glb_map_lon_wed = ($glb_map_lon_wed != "") ? $glb_map_lon_wed : 0;
	$glb_map_wedd_status = $chk_page_access[0]['wedding_map_on_event_page'];
	$glb_map_lat_rec = $chk_page_access[0]['gmap_lat_reception'];
	$glb_map_lat_rec = ($glb_map_lat_rec != "") ? $glb_map_lat_rec : 0;
	$glb_map_lon_rec = $chk_page_access[0]['gmap_lng_reception'];
	$glb_map_lon_rec = ($glb_map_lon_rec != "") ? $glb_map_lon_rec : 0;
	$glb_map_rec_status = $chk_page_access[0]['reception_map_on_event_page'];
	if($isMobile) { $glb_map_wedd_status = 0; $glb_map_rec_status = 0;}
	$tmpurl = "lattwed=$glb_map_lat_wed&lngwed=$glb_map_lon_wed&lattrec=$glb_map_lat_rec&lngrec=$glb_map_lon_rec&wedmapsts=$glb_map_wedd_status&resmapsts=$glb_map_rec_status";
	$tmpurl = base64_encode($tmpurl);
	$smarty->assign('url_events', $tmpurl);
	$smarty->assign('smt_map_wedd_status', $glb_map_wedd_status);
	$smarty->assign('smt_map_rec_status', $glb_map_rec_status);
	$smarty->assign('smt_wed_title', $add_access[0]['event_wed_title']);
	$smarty->assign('smt_rec_title', $add_access[0]['event_rec_title']);
	$smarty->assign('smt_marriage_location', $marriage_location);
	$smarty->assign('smt_marriage_status', $glb_marriage_status);
	$smarty->assign('smt_reception_status', $glb_reception_status);
	$smarty->assign('smt_reception_location', $reception_location);
	$smarty->assign('smt_reception_date', $reception_date);
	$smarty->assign('smt_marriage_date', trim($marriage_date));
	$smarty->assign('restrict_title', '4827');
	$content_template = $theme_url.'events.tpl';
	$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
	$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
	}else if($page_status==2){
	$chkqry= "SELECT messages,name,date,giftid,guestloc FROM `wedding_msg` WHERE `wedding_id` =$master_id and msg_status=1 ORDER BY date DESC";
	$selectsms_access= $userslog_obj->selectVal($chkqry);
	if (count($selectsms_access)){
	$msgdetails="";
	foreach($selectsms_access as $key=>$field){
		$subjectname="";
		$cdate= $field['date'];
		$date =date('jS F, Y', strtotime("$cdate"));
		//$msginfo =wordwrap($field['messages'], 80, '<br />', true);
		$msginfo =$field['messages'];
		$name =wordwrap($field['name'], 23, "<br />", true);
		$wedgift_items= "gift".$field['giftid'].".gif";
		$guestloc= $field['guestloc'];
		$gloc='';
		if($guestloc != "")
			$gloc='<tr valign="top"><td>&nbsp;</td><td>'.$guestloc.'</td></tr>';
		$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
		if($isMobile) {
				$msgdetails.='<div class=blessing_div>
				<div style="float:left; height:100px;">
				<img width="100" height="100" border="0" style="margin:20px;" src='.$gifimg_urls.'></div>
				<div style="margin-top:20px;">
				<table width="100%">
				<tbody><tr valign="top"><td colspan=2>&nbsp;</td></tr><tr valign="top">
				<td width="4%">&nbsp;</td>
				<td width="96%" style="font-weight:bold;">'.$name.'</td>
				</tr>'.$gloc.'
				<tr valign="top">
				<td>&nbsp;</td><td style="font-weight:bold;">'.$date.'</td></tr>
				</tbody></table>
				</div>
				
				<div style="width:100%;  margin-top:20px; overflow:hidden; padding:15px;">
				'.$msginfo.'</div>
				</div>';
		} else {
		$msgdetails.='<div class=blessing_div>
				<div style="float:left; height:100px;">
				<img width="100" height="100" border="0" style="margin:20px;" src='.$gifimg_urls.'></div>
				<div style="float:left; width:25%; margin-top:20px;">
				<table width="100%">
				<tbody><tr valign="top">
				<td width="4%">&nbsp;</td>
				<td width="96%" style="font-weight:bold;">'.$name.'</td>
				</tr>'.$gloc.'
				<tr valign="top">
				<td>&nbsp;</td><td style="font-weight:bold;">'.$date.'</td></tr>
				</tbody></table>
				</div>
				
				<div style="width:57%;  margin-top:20px; overflow:hidden; padding:20px;">
				'.$msginfo.'</div>
				</div>';
				}
		}
		$smarty->assign('msgdetails_tpl', $msgdetails);
		$content_template = $theme_url.'wishes.tpl';
		}else
				{
				// Comments section
				$qrygift= "SELECT wedgift_autoid,wedgift_items,wedgift_status FROM `wed_gift_gif` WHERE wedgift_status ='1' ORDER BY wedgift_autoid ASC";
				$selectgifts= $userslog_obj->selectVal($qrygift);
				$giftdetails="";
				foreach($selectgifts as $key=>$field)
					{
					 $wedgift_aid =	$field['wedgift_autoid'];
					 $wedgift_items =	$field['wedgift_items'].".gif";
					 $gifimg_urls	= 	$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
					 $giftdetails.="<a onclick=chg_img($wedgift_aid); style='text-decoration:none;' href='javascript:void(0);'>
					 <div style='float:left; margin:7px;'><img width='100' height='100' border='0' src=$gifimg_urls></div></a>";
					}
				$smarty->assign('album_giftdetails', $giftdetails); 
				
				// Fetch Sample msg templates
				$qrymsgs= "SELECT msg_tmpl_msgs, msg_tmpl_autoid  FROM `tbl_msg_templates` WHERE msg_tmpl_status  ='1' and msg_tmpl_type = '1' and msg_tmpl_lang ='1' ORDER BY msg_tmpl_addeddate ASC";
				$selectmsgs= $userslog_obj->selectVal($qrymsgs);
				$msgtmplates="";
				foreach($selectmsgs as $key=>$field)
                     {					 
					$wedmsgs_org =	$field['msg_tmpl_msgs'];
					$tmpl_autoid =	$field['msg_tmpl_autoid'];
					
					$wedmsgs =	base64_decode($wedmsgs_org);
					//$addslashval=base64_decode($wedmsgs);
					//$msgtmplates .= '<li><a onclick="FillValueInField('.urlencode($wedmsgs).');" style="cursor:pointer;">'.$wedmsgs.'</a></li>';
					$msgtmplates .= '<li><a id="tmpl_'.$tmpl_autoid.'" class="tmpl_'.$tmpl_autoid.'" text="'.$wedmsgs.'" onclick="FillValueInField('.$tmpl_autoid.');" style="cursor:pointer;">'.$wedmsgs.'</a></li>';
				}
				$smarty->assign('album_msgtmplates', $msgtmplates); 
				
				$shownew =0;
				$content_template = $theme_url.'signup_blessings.tpl';
				}
			$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
			}
				else if($page_status==4)
			{
				$shownew =0;
				$glb_marriage_status = $chk_page_access[0]['marriage_status'];
				$glb_map_lat = $chk_page_access[0]['gmap_latitude'];
				$glb_map_lat = ($glb_map_lat != "") ? $glb_map_lat : 0;
				$glb_map_lon = $chk_page_access[0]['gmap_longitude'];
				$glb_map_lon = ($glb_map_lon != "") ? $glb_map_lon : 0;
				$smarty->assign('js_map_lon', $glb_map_lon);
				$smarty->assign('js_map_lat', $glb_map_lat);
				$tmpurl = "latt=$glb_map_lat&lng=$glb_map_lon&malename=$male_name&femalename=$female_name";
				$tmpurl = base64_encode($tmpurl);
				$smarty->assign('url_tmp', $tmpurl);
				$smarty->assign('glb_browser_name', $bname);
				$smarty->assign('glb_mrg_address', $marriage_location);
				$smarty->assign('glb_address_with_landmark', $address_with_landmark);
				$gmap_status_js = 1;
				$content_template = $theme_url.'gmap.tpl';
				$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
				$classic_bg_image= ($classic_findloc_page != '0') ? $classic_findloc_page : $classic_all_page;
			}
		 else if($page_status==3)
		 {
		 $classic_bg_image= ($classic_album_page != '0') ? $classic_album_page : $classic_all_page;
		 $album_status_js = 1;
		 $shownew =0;

		$chkqry= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
		$selectphoto_access= $userslog_obj->selectVal($chkqry);

		$limit = 1;
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
		
		$targetpage =$page_url.'?status=3';
		
		 
		$chkqrys= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' LIMIT  $start ,$limit";

		//echo $chkqrys;
		$selectsms_friends_page= $userslog_obj->selectVal($chkqrys);
		$selectsms_friends= $userslog_obj->selectVal($chkqry);
		$total_records      = count($selectsms_friends);	 
		$img_urls= $glb_site_url.'templates/albums/'.$master_id.'/'.trim($selectsms_friends_page[0]['photo_path']);
		$img_id=$selectsms_friends_page[0]['photo_auto_id'];
		$smarty->assign('total_imgs', $img_urls);
		$smarty->assign('img_ids', $img_id);

		$pagination= $common_obj->Pagination($total_records,$limit,$targetpage,$page,$start,$varname);
		$smarty->assign('pagenation', $pagination);
		// Comments section
		$chkqry1= "SELECT comm_comments,comm_name, comm_date FROM `mrg_comments` WHERE comm_owner_id ='".$master_id."' and comm_img_id='".$img_id."' ORDER BY comm_date DESC";
		$selectcomm= $userslog_obj->selectVal($chkqry1);
		$commdetails="";
		foreach($selectcomm as $key=>$field)
			{
			$subjectname="";
			$msginfo =wordwrap($field['comm_comments'], 23, "\n", true);
			$name =wordwrap($field['comm_name']);
			$date =$field['comm_date'];
			$commdetails.="<div id=wishtabs_comm><div id=mrgwish>".$name.":</div><div id=mrginfo>".$msginfo."</div></div><div id=border_line></div>";
			}
		$smarty->assign('glb_master_id', $master_id);
		$smarty->assign('glb_selectphoto_access', $selectphoto_access);
		$smarty->assign('glb_commdetails', $commdetails);

		// Start
		$chkqry= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
			$selectphoto_access= $userslog_obj->selectVal($chkqry);
			$total_records      = count($selectphoto_access);
			$albuminfos="";
			if ($total_records) {			
			foreach($selectphoto_access as $key=>$field){
			$photopath =$field['photo_path'];
			$img_urls= $glb_site_url.'templates/albums/'.$master_id.'/'.trim($photopath);
			$albuminfos .= '<div class="galleria-image" style="overflow: hidden; position: relative; visibility: visible; width: 18px; height: 27px;"><img src='.$img_urls.' style="display: block; opacity: 1; min-width: 0px; min-height: 0px; max-width: none; max-height: none; transform: translate3d(0px, 0px, 0px); width: 18px; height: 27px; position: absolute; top: 0px; left: 0px;" width="18" height="27"></div>';
			}
			}
		$smarty->assign('glb_master_id', $master_id);
		$smarty->assign('glb_albums', $albuminfos);
		//End
		$content_template = $theme_url.'album.tpl';
		 }
		 else if($page_status==5)
			{
				//include_once( 'lang/lang_ta.php' );
				// Comments section
				$qrygift= "SELECT wedgift_autoid,wedgift_items,wedgift_status FROM `wed_gift_gif` WHERE wedgift_status ='1' ORDER BY wedgift_autoid ASC";
				$selectgifts= $userslog_obj->selectVal($qrygift);
				$giftdetails="";
				foreach($selectgifts as $key=>$field)
					{
					 $wedgift_aid =	$field['wedgift_autoid'];
					 $wedgift_items =	$field['wedgift_items'].".gif";
					 $gifimg_urls	= 	$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
					 $giftdetails.="<a onclick=chg_img($wedgift_aid); style='text-decoration:none;' href='javascript:void(0);'>
					 <div style='float:left; margin:7px;'><img width='100' height='100' border='0' src=$gifimg_urls></div></a>";
					}
				$smarty->assign('album_giftdetails', $giftdetails);
				// Fetch Sample msg templates
				if($master_user_id == '6442')
				$qrymsgs= "SELECT msg_tmpl_msgs, msg_tmpl_autoid  FROM `tbl_msg_templates` WHERE msg_tmpl_status  ='1' and msg_tmpl_type = '1' and msg_tmpl_lang ='1' ORDER BY msg_tmpl_addeddate ASC";
				else
				$qrymsgs= "SELECT msg_tmpl_msgs, msg_tmpl_autoid  FROM `tbl_msg_templates` WHERE msg_tmpl_status  ='1' and msg_tmpl_type = '1' ORDER BY msg_tmpl_addeddate ASC";
				$selectmsgs= $userslog_obj->selectVal($qrymsgs);
				$msgtmplates="";
				foreach($selectmsgs as $key=>$field)
					{
					$wedmsgs_org =	$field['msg_tmpl_msgs'];
					$tmpl_autoid =	$field['msg_tmpl_autoid'];
					
					$wedmsgs =	base64_decode($wedmsgs_org);
					//$addslashval=base64_decode($wedmsgs);
					//$msgtmplates .= '<li><a onclick="FillValueInField('.urlencode($wedmsgs).');" style="cursor:pointer;">'.$wedmsgs.'</a></li>';
					$msgtmplates .= '<li><a id="tmpl_'.$tmpl_autoid.'" class="tmpl_'.$tmpl_autoid.'" text="'.$wedmsgs.'" onclick="FillValueInField('.$tmpl_autoid.');" style="cursor:pointer;">'.$wedmsgs.'</a></li>';
					}
				$smarty->assign('album_msgtmplates', $msgtmplates);
				$content_template = $theme_url.'signup_blessings.tpl';
				$shownew = 0;
				$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
			}
		else if($page_status==6)
		{
			$glb_kural_auto_id  = $chk_page_access[0]['thirukkural'];
			$glb_desc_auto_id  = $chk_page_access[0]['description'];
			$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and ( kural_user_id = '0' or kural_user_id = '$master_user_id' ) and kural_auto_id > $glb_kural_auto_id ORDER BY kural_auto_id limit 1";
			$selectcomm= $userslog_obj->selectVal($chkqry);
			$nextlink_style="";
			$nextlink_style= (count($selectcomm) == 1) ? "inline" : "none";
			$smarty->assign('glb_nextlink_style', $nextlink_style);
			//echo $nextlink_style;
			$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and ( kural_user_id = '0' or kural_user_id = '$master_user_id' ) and kural_auto_id < $glb_kural_auto_id ORDER BY kural_auto_id DESC limit 1";
			$selectcomm= $userslog_obj->selectVal($chkqry);
			$prevlink_style="";
			$prevlink_style= (count($selectcomm) == 1) ? "inline" : "none";
			$smarty->assign('glb_prevlink_style', $prevlink_style);
			$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and (desc_user_id = '0' or desc_user_id = '$master_user_id') and des_auto_id > $glb_desc_auto_id ORDER BY des_auto_id limit 1";
			$selectcomm= $userslog_obj->selectVal($chkqry);
			$nextlink_desc_style="";
			$nextlink_desc_style= (count($selectcomm) == 1) ? "inline" : "none";
			$smarty->assign('glb_desclink_nextstyle', $nextlink_desc_style);
			$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and (desc_user_id = '0' or desc_user_id = '$master_user_id')  and des_auto_id < $glb_desc_auto_id ORDER BY des_auto_id DESC	limit 1";
			$selectcomm= $userslog_obj->selectVal($chkqry);
			$nextlink_desc_prevstyle="";
			$nextlink_desc_prevstyle= (count($selectcomm) == 1) ? "inline" : "none";
			$smarty->assign('glb_desclink_prevstyle', $nextlink_desc_prevstyle);
			$smarty->assign('glb_tmpl_kural_auto_id', $glb_kural_auto_id);
			$smarty->assign('glb_tmpl_desc_auto_id', $glb_desc_auto_id);
			$classic_bg_image= ($classic_home_page != '0') ? $classic_home_page : $classic_all_page;
		}
		// Display your own pages
		if($page_ownpage != ''){ 
			// $findownpageQry="SELECT pagecontent from wed_ownpage where wedid = $master_id and wedown_autoid = $page_ownpage and status =1";
			$findownpageQry="SELECT * FROM `wed_ownpage_parah` WHERE `master_wed_id` = '".$master_id."' and `wed_ownpage_id` = '".$page_ownpage."' and `parah_status` = 1 ORDER BY `wed_parah_count_id` ASC";
			//echo $findownpageQry;
			$findownpageCnt= $userslog_obj->selectVal($findownpageQry);
				if(count($findownpageCnt)){
				$smarty->assign('glb_pgeinfos', $findownpageCnt);
				$smarty->assign('glb_findownpageCnt', count($findownpageCnt));
				}
			$chkqry_wed= "SELECT pagetitle FROM wed_ownpage WHERE wedid ='".$master_id."' and wedown_autoid = '".$page_ownpage."' and status='1' ";
			$chk_page_access_wed= $userslog_obj->selectVal($chkqry_wed);
			$pagetitle_own = $chk_page_access_wed[0]['pagetitle'];
			$smarty->assign('glb_pagetitle', $pagetitle_own);
			$classic_bg_image= ($classic_own_page != '0') ? $classic_own_page : $classic_all_page;
			$content_template = $theme_url.'wedownpage.tpl';
			//print $findownpageQry."---".$master_user_id;
		}
		 $smarty->assign('glb_total_alb_records', $total_records_album_tab);
         $smarty->assign('album_status_js', $album_status_js);
         $smarty->assign('gmap_status_js', $gmap_status_js);
		 $smarty->assign('mrg_wed_auto_id', $wed_auto_id);
//$top_urls =str_replace(" ", "-", $field['top_url']);
/*----- Include Files Details Start-----*/

/*----- Assing Page titles-----*/
		 $smarty->assign('glb_show_wed_remainder', $show_wed_remainder);
         $smarty->assign('glb_wed_card_title_home', $wed_card_title_home);
         $smarty->assign('glb_wed_card_title_events', $wed_card_title_events);
         $smarty->assign('glb_wed_card_title_guestbook', $wed_card_title_guestbook);
         $smarty->assign('glb_wed_card_title_loc', $wed_card_title_loc);
         $smarty->assign('glb_wed_card_title_album', $wed_card_title_album);
		 //$smarty->assign('glb_rem_validation_date', $rem_validation_date);
		 $smarty->assign('glb_rem_current_date', date("Y-m-d")); 
		 $smarty->assign('glb_tit_blessing', $tit_blessing);
		 $smarty->assign('glb_tit_add_bless', $tit_add_bless);
		 $smarty->assign('glb_tit_all_pg_bless', $all_pg_bless);
		$smarty->assign('glb_animate_reff_id', $animate_reff_id);
		$smarty->assign('glb_wed_card_cover', "Cover Design");
		$smarty->assign('two_images_max_height', "max-height: 350px;");
		$smarty->assign('glb_fb_url', $fb_url);
		$smarty->assign('ownpage_links', $ownpage_links);
		$smarty->assign('shownew_tpl', $shownew);
$headthemurl=$theme_url.$them_sub_url;
$footer_template='default/mrg_template/footer.tpl';
if($page_status=='' and $animate_cover != 0 and $page_ownpage == '')
		{
			$randomval = rand(1000, 9999);
			$coverqry= "select wed_cover_adjust, wed_cover_map1, wed_cover_type from wed_covers_mas a, mrg_all_info b where b.mrg_url_status_auto_id = '$wed_auto_id' and b.wed_cover_id  = a.wed_cover_autoid ";
			$selecoverqry= $userslog_obj->selectVal($coverqry);
			$smarty->assign('wedcover_adjust', $selecoverqry[0]['wed_cover_adjust']);
			$smarty->assign('cover_map1', $selecoverqry[0]['wed_cover_map1']);
			$cover_type = $selecoverqry[0]['wed_cover_type'];
			$smarty->assign('randomval', $randomval);
			// Having covers
			$headthemurl= "default/mrg_template/covers/"; 
			if($cover_type == 1) {
			// Having covers
			$content_template = 'default/mrg_template/covers/content.tpl';
			} else if($cover_type == 2){
			$cover_heading = ''; $cover_content = '';
			$cover_heading = $add_access[0]['classic_cover_heading'];
			$cover_content = $add_access[0]['classic_cover_content'];
			$cover_mobile = $add_access[0]['classic_cover_mobile'];

			$glb_map_lat = $chk_page_access[0]['gmap_latitude'];
			$glb_map_lat = ($glb_map_lat != "") ? $glb_map_lat : 0;
			$glb_map_lon = $chk_page_access[0]['gmap_longitude'];
			$glb_map_lon = ($glb_map_lon != "") ? $glb_map_lon : 0;
			$reception_location = $chk_page_access[0]['reception_location'];
			$wed_loc = ($glb_marriage_status != 0) ? $marriage_location : $reception_location;

			$wed_loc = preg_replace('/<span .*?style="(.*?)">(.*?)<\/p>/','<span style="">$2</span>',$wed_loc);
		//	$newstr = preg_replace('/<span .*?style="(.*?)">(.*?)<\/span>/','<span class="">$2</span>',$str);

			$wed_loc1 = $male_name.'<br />weds<br />'.$female_name;
			$smarty->assign('glb_wed_loc1ss', $wed_loc1);
			$smarty->assign('glb_cover_heading', $cover_heading);
			$smarty->assign('glb_cover_content', $cover_content);
			$smarty->assign('glb_cover_mobile', $cover_mobile);
			$smarty->assign('glb_lat', $glb_map_lat);
			$smarty->assign('glb_long', $glb_map_lon);
			$smarty->assign('glb_wed_loc', $wed_loc);
			
			$content_template = 'default/mrg_template/covers/classic_content.tpl';
			}
			$footer_template= 'default/mrg_template/covers/fotter.tpl';		
		}
$smarty->assign('classic_bg_image', trim($classic_bg_image));
$smarty->assign('glb_animate_cover', $animate_cover);
$smarty->assign('header', $smarty->fetch($headthemurl.'header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch($footer_template) );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl'); 
}
?>