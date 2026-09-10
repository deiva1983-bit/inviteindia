<?php
$content_template = $theme_url.'home.tpl';
$kural = $chk_page_access[0]['kural_brieff'];
$des_brieff = $chk_page_access[0]['des_brieff'];
$homeimg = $chk_page_access[0]['home_img'];
$glb_home_img_status= $chk_page_access[0]['home_img_status'];
$glb_home_male_img= $chk_page_access[0]['home_male_img'];
$glb_home_female_img= $chk_page_access[0]['home_female_img'];
$wedding_name="<div class='wedding-names'>$male_name</div><div class='wedding-btn'>Weds</div><div class='wedding-names'>$female_name</div>";
$weddingname="<div class='wedding-names'>$male_name</div><div class='wedding-names'>$female_name</div>";
$des_brieff =str_replace("%replace_names%", "$wedding_name", $des_brieff);
$des_brieff =str_replace("%replacenames%", "$weddingname", $des_brieff);
$smarty->assign('glb_des_brieff', $des_brieff);
$smarty->assign('glb_kural', $kural);
$gmap_status_js = 0;
if($glb_home_img_status== 1){
	if ($homeimg != "") {
		$i = $glb_site_url."/templates/default/mrg_template/home_images/$wed_auto_id/".$homeimg;
		$smarty->assign('glb_homeimg', $i);
		$imagedata = getimagesize($i);
		$istyle_sin= ($imagedata[1] > 400) ? 'small' : 'long';
		$smarty->assign('glb_istyle_sin', $istyle_sin);
		}
	else
		$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/mrg_template/$mrg_theme_folder/default_home.jpg");
	}
	else if($glb_home_img_status == 2){
	if($glb_home_male_img != '' and $glb_home_female_img != ''){
		$double_1 = $glb_site_url."/templates/default/mrg_template/home_images/$wed_auto_id/".$glb_home_male_img;
		$double_2 = $glb_site_url."templates/default/mrg_template/home_images/$wed_auto_id/".$glb_home_female_img;
		$smarty->assign('glb_maleimg' ,$double_1);
		$smarty->assign('glb_femaleimg' ,$double_2);
		$imagedata_1 = getimagesize($double_1);
		$imagedata_double_1= ($imagedata_1[1] > 400) ? 'small' : 'long';
		$imagedata_2 = getimagesize($double_2);
		$imagedata_double_2= ($imagedata_2[1] > 400) ? 'small' : 'long';
		$smarty->assign('glb_imagedata_double_1', $imagedata_double_1);
		$smarty->assign('glb_imagedata_double_2', $imagedata_double_2);
	}else{
	$glb_home_img_status = 1;
	$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/mrg_template/$mrg_theme_folder/default_home.jpg");
	}
}
$smarty->assign('glb_home_img_status', $glb_home_img_status);
if($page_status==6){
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
}
$classic_bg_image= ($classic_home_page != '0') ? $classic_home_page : $classic_all_page;
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
?>