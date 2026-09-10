<?php
$randomval = rand(1000, 9999);
$coverqry= "select wed_cover_adjust, wed_cover_map1, wed_cover_type from wed_covers_mas a, mrg_all_info b where b.mrg_url_status_auto_id = '$wed_auto_id' and b.wed_cover_id  = a.wed_cover_autoid ";
$selecoverqry= $userslog_obj->selectVal($coverqry);
$smarty->assign('wedcover_adjust', $selecoverqry[0]['wed_cover_adjust']);
$smarty->assign('cover_map1', $selecoverqry[0]['wed_cover_map1']);
$cover_type = $selecoverqry[0]['wed_cover_type'];
$smarty->assign('randomval', $randomval);
// Having covers
$body_bg=0;
$headthemurl= "default/mrg_template/covers/"; 
if($cover_type == 1) {
// Having covers
$body_bg=1;
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
else if($cover_type == 3){
$own_msgs = $add_access[0]['envelop_own_msgs'];
$text_status = $add_access[0]['envelop_text_status'];
$male_name = $chk_page_access[0]['wed_cover_male_name'];
$female_name = $chk_page_access[0]['wed_cover_female_name'];
$smarty->assign('glb_cover_male_name', $male_name);
$smarty->assign('glb_cover_female_name', $female_name);
$smarty->assign('glb_cover_date_title', $hm_marriage_date_title);
$smarty->assign('glb_own_msg_status', $text_status);
$smarty->assign('glb_own_msgs', $own_msgs);
$smarty->assign('glb_mtheme_url', $mtheme_url);
$content_template = 'default/mrg_template/covers/envelope_content.tpl';
}
else if($cover_type == 4){
$malecss='';$fmalecss='';
$male_name = $chk_page_access[0]['wed_cover_male_name'];
$female_name = $chk_page_access[0]['wed_cover_female_name'];
$male_name_len = strlen($male_name);
$female_name_len = strlen($female_name);
$male_name_arr = str_split($male_name);
$female_name_arr = str_split($female_name);

$smarty->assign('glb_male_arr', $male_name_arr);
$smarty->assign('glb_female_arr', $female_name_arr);
$smarty->assign('glb_male_name_len', $male_name_len);
$smarty->assign('glb_female_name_len', $female_name_len);

$content_template = 'default/mrg_template/covers/ballon_content.tpl';
}
$smarty->assign('glb_body_bg', $body_bg);
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
$footer_template= 'default/mrg_template/covers/fotter_iframe.tpl';
$footer_template = $common_obj->load_mobile_tpl_files($isMobile, $footer_template);
?>