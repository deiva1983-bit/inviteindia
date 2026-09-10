<?php
$gmap_status_js = 0;
$findownpageQry="SELECT * FROM `wed_ownpage_parah` WHERE `master_wed_id` = '".$master_id."' and `wed_ownpage_id` = '".$page_ownpage."' and `parah_status` = 1 ORDER BY `wed_parah_count_id` ASC";
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
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
?>