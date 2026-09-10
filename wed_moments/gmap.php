<?php
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
?>