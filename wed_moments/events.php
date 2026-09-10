<?php
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
	if($isMobile) { $glb_map_wedd_status = 0; $glb_map_rec_status = 0; $gmap_status_js = 0;}
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
?>