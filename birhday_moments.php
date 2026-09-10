<?php 
if($theme_type == '2') {
include_once 'classic_moments.php';
exit;
}
$com_obj = new common();
$smarty->assign('currentpage_js', 'birthhome');
$gmap_status_js = 0;
$master_user_id = $chk_birth_access[0]['birth_main_user_id'];
$theme_sub_sts = $chk_birth_access[0]['mrg_theme_sub_sts'];
$mrg_theme_id = $chk_birth_access[0]['birth_theme_id'];
$mrg_theme_catid = $chk_birth_access[0]['mrg_theme_catid'];
$ownpage_links= trim($chk_birth_access[0]['ownpage_links']);
$usrlog= trim($chk_birth_access[0]['usrlog_plan']);
if($ownpage_links != '')
	$ownpage_links =str_replace("%domainname%", "$page_url", $ownpage_links);
$mrg_theme_folder = 'theme_'.$mrg_theme_id;
$smarty->assign('glb_usrlog', 1);
// its sub theme
$them_sub_url='';
if ($theme_sub_sts == 1){
	$them_sub_url = 'sub_'.$chk_birth_access[0]['mrg_theme_sub_url']."/";
	$mrg_theme_folder = $chk_birth_access[0]['mrg_theme_url']."/".$them_sub_url."/";
	}
$access_by_admin= ($user_log_id_sess == $master_user_id) ? 1 : 0;
$master_id = $chk_birth_access[0]['birth_url_sts_auto_id'];
$theme_url = "default/birth_template/".$chk_birth_access[0]['mrg_theme_url']."/";
$img_urls= $glb_site_url.'/templates/default/birth_template/'.$chk_birth_access[0]['mrg_theme_url'].'/';
$smarty->assign('glb_img_urls', $img_urls);

$home_page_info_qry="SELECT birth_all.*,kural.kural_brieff,des.des_brieff FROM birty_all_info birth_all, birth_mas_des des, birth_mas_thirukural kural WHERE person_head_msg_id = kural_auto_id and person_desc_msg_id = des_auto_id and birty_url_auto_id = '$master_id' ";
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
$dob_count = $chk_page_access[0]['txt_bperson_dob_count'];
if($dob_count == '0') $dob_count = 1;
$dobcount = $com_obj->getOrdinal($dob_count);
$event_date = $chk_page_access[0]['person_event_date'];
$birth_auto_id = $chk_page_access[0]['birty_url_auto_id'];
$person_name = $chk_page_access[0]['person_name'];
$person_dob = $chk_page_access[0]['person_dob'];
if($person_dob != ''){
	$person_dob =date('jS F, Y', strtotime("$person_dob"));
}

if($event_date != ''){
	$event_date =date('jS F, Y', strtotime("$event_date"));
}

$smarty->assign('glb_dobcount', $dobcount);
$smarty->assign('glb_dob_count', $dob_count);
$smarty->assign('glb_person_name', $person_name);
$pagetitle= "Birthday Invitation: $person_name on $event_date";
$des_brieff =str_replace("%replace_names%", "$wedding_name", $des_brieff);
$des_brieff =str_replace("%replacenames%", "$weddingname", $des_brieff);
$smarty->assign('smt_event_date', $event_date);
$event_addr = $chk_page_access[0]['person_event_addr'];
$smarty->assign('smt_event_addr', $event_addr);
if($page_status ==''){ // Display home page related conents
$content_template = $theme_url.'home.tpl';
$album_status_js = 0; 
$gmap_status_js = 0;
$birth_addr=str_ireplace('<p>','',$event_addr);
$birth_addr=str_ireplace('</p>','',$birth_addr); 
$event_addr = preg_replace('/<span .*?style="(.*?)">(.*?)<\/p>/','<span style="">$2</span>',$event_addr);
$smarty->assign('smt_birth_loc', $birth_addr);
$glb_hoster_name = $chk_page_access[0]['hoster_name'];
$glb_hoster_num = $chk_page_access[0]['hoster_num'];
;
$postalcode = $chk_page_access[0]['event_postalcode'];
$homeimg = $chk_page_access[0]['home_img'];
$birth_person_name="<div class='event-names'>$person_name</div>";

$smarty->assign('glb_hoster_name', $glb_hoster_name);
$smarty->assign('glb_hoster_num', $glb_hoster_num);
}
$homeimg = $chk_page_access[0]['home_img'];
if ($homeimg != "")
	$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/home_images/$birth_auto_id/".$homeimg);
else
	$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/$mrg_theme_folder/default_home.jpg");
if($page_status==1){ // Home page start	

$kural = $chk_page_access[0]['kural_brieff'];
$des_brieff = $chk_page_access[0]['des_brieff'];
$pageheading = $chk_page_access[0]['invitation_title']; 

$smarty->assign('glb_kural', $kural);
$smarty->assign('glb_des_brieff', $des_brieff);
$smarty->assign('glb_pageheading', $pageheading);
$content_template = $theme_url.'wedhome.tpl';
$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
} else if($page_status==2){ // Home page start
$gmap_lat = $chk_page_access[0]['gmap_lat'];
$gmap_long = $chk_page_access[0]['gmap_long'];
	$event_title = $chk_page_access[0]['event_title'];
	$glb_map_birth_sts = $chk_page_access[0]['event_gmap_status'];
	$tmpurl = "lattwed=$gmap_lat&lngwed=$gmap_long&wedmapsts=$glb_map_birth_sts";
	$tmpurl = base64_encode($tmpurl);
	$smarty->assign('url_events', $tmpurl);
	$smarty->assign('smt_map_event_status', $glb_map_birth_sts);
	$smarty->assign('smt_event_title', $event_title);
	$content_template = $theme_url.'events.tpl';
	$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
}else if($page_status==3){ // Guestbook start
	$msgtmp_newformat = ''; $msg_carousel = '';
	$chkqry= "SELECT messages,name,date,giftid,guestloc FROM `wedding_msg` WHERE `wedding_id` =$master_id and msg_status=1 and msg_type = 2 ORDER BY date DESC";
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
			$gloc='<tr valign="top"><td>&nbsp;</td><td style="font-size:12px;">'.$guestloc.'</td></tr>';
		$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
		$slideclass = ($key) ? 'no' : 'active';
		$msg_carousel .= '<li data-target="#carousel-example-generic" data-slide-to="'.$key.'" class='.$slideclass.'>
						<a href="#"></a>
					    </li>';

		$msgtmp_newformat .= '<div class="item '.$slideclass.'"><span class="quote"><img src="'.$img_urls.'img/quote.png" alt=""></span>
						<h3>'.$name.'</h3>
						<span>'.$date.'</span>
						<p><i>'.$msginfo.'</i></p>
					    </div>';

		}
		$smarty->assign('msgtmp_newformat_tpl', $msgtmp_newformat);
		$smarty->assign('msgtmp_carousel', $msg_carousel);
		$smarty->assign('tpl_default_signup', 1);
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
				if($master_user_id == '6442' || $master_user_id == '7773')
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
				
				$shownew =0;
				$smarty->assign('tpl_default_signup', 0);
				$content_template = $theme_url.'signup_blessings.tpl';
				}
			$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
			} // Guestbook end
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
			}
		else if($page_status==6)
		{
			$homeimg = $chk_page_access[0]['home_img'];
			$kural = $chk_page_access[0]['kural_brieff'];
			$des_brieff = $chk_page_access[0]['des_brieff'];
			$pageheading = $chk_page_access[0]['invitation_title']; 
			if ($homeimg != "")
				$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/home_images/$birth_auto_id/".$homeimg);
			else
				$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/$mrg_theme_folder/default_home.jpg");	
			$smarty->assign('glb_kural', $kural);
			$smarty->assign('glb_des_brieff', $des_brieff);
			$smarty->assign('glb_pageheading', $pageheading);
			$content_template = $theme_url.'wedhome.tpl';
			$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;

			/*
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
			*/
		}


if($page_status=='ppp1'){ // Home page start	
$homeimg = $chk_page_access[0]['home_img'];
$kural = $chk_page_access[0]['kural_brieff'];
$des_brieff = $chk_page_access[0]['des_brieff'];
$pageheading = $chk_page_access[0]['invitation_title']; 
if ($homeimg != "")
	$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/home_images/$birth_auto_id/".$homeimg);
else
	$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/$mrg_theme_folder/default_home.jpg");	
$smarty->assign('glb_kural', $kural);
$smarty->assign('glb_des_brieff', $des_brieff);
$smarty->assign('glb_pageheading', $pageheading);
$content_template = $theme_url.'wedhome.tpl';
$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
}

if($page_status==12){ // Home page start
	$glb_map_event_sts = $chk_page_access[0]['reception_map_on_event_page'];
	$tmpurl = "lattwed=$gmap_lat&lngwed=$gmap_long&wedevent=$glb_map_event_sts";
	$tmpurl = base64_encode($tmpurl);
	$smarty->assign('url_events', $tmpurl);
	$smarty->assign('smt_map_event_status', $glb_map_event_sts);
	echo $event_title; exit;
	$smarty->assign('smt_event_title', $event_title);
	$content_template = $theme_url.'events.tpl';
	$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
	}


if($page_status==11){ // Event process start
	$glb_map_event_sts = $chk_page_access[0]['reception_map_on_event_page'];
	$tmpurl = "lattwed=$gmap_lat&lngwed=$gmap_long&wedevent=$glb_map_event_sts";
	$tmpurl = base64_encode($tmpurl);
	$smarty->assign('url_events', $tmpurl);
	$smarty->assign('smt_map_event_status', $glb_map_event_sts);
	$smarty->assign('smt_event_title', $event_title);
	$content_template = $theme_url.'events.tpl';
	$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
	} // Event process end
	else if($page_status==22){ // Guestbook start
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
			$gloc='<tr valign="top"><td>&nbsp;</td><td style="font-size:12px;">'.$guestloc.'</td></tr>';
		$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
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
				<td>&nbsp;</td><td style="font-size:12px;">'.$date.'</td></tr>
				</tbody></table>
				</div>
				
				<div style="width:300px; float:left; font-size:12px; margin-top:20px; overflow:hidden; padding-left:20px;">
				'.$msginfo.'</div>
				</div>';
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
				if($master_user_id == '6442' || $master_user_id == '7773')
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
				
				$shownew =0;
				$content_template = $theme_url.'signup_blessings.tpl';
				}
			$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
			} // Guestbook end
// Valid Assign
$smarty->assign('glb_access_by_admin', $access_by_admin);
$smarty->assign('pagetitle', $pagetitle);
$smarty->assign('glb_person_name', $person_name);
$smarty->assign('glb_site_url', $glb_site_url);
$smarty->assign('glb_page_url', $page_url);
$smarty->assign('glb_master_id', $master_id);
$smarty->assign('glb_theme_owner_id', $master_user_id);
$showalbum_tab= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
$showalbum_tab= $userslog_obj->selectVal($showalbum_tab);
$total_records_album_tab      = count($showalbum_tab);
if(($page_status=='h' or $page_status=='' or $page_status=='6') and ($page_ownpage == '') ){
	$home_img = $chk_page_access[0]['home_img'];
		/* if ($home_img != "")
			$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/home_images/$wed_auto_id/".$homeimg);
		else
			$smarty->assign('glb_homeimg', $glb_site_url."/templates/default/birth_template/$mrg_theme_folder/default_home.jpg");	
			*/	
		$classic_bg_image= ($classic_home_page != '0') ? $classic_home_page : $classic_all_page;
}

		
		 $smarty->assign('glb_total_alb_records', $total_records_album_tab);
         $smarty->assign('album_status_js', $album_status_js);
         $smarty->assign('gmap_status_js', $gmap_status_js);
		 $smarty->assign('mrg_wed_auto_id', $wed_auto_id);
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
$footer_template='default/birth_template/footer.tpl';

$smarty->assign('classic_bg_image', trim($classic_bg_image));
$smarty->assign('glb_animate_cover', $animate_cover);
if($page_status ==''){ // Display home page related conents
$smarty->assign('header', $smarty->fetch($headthemurl.'header.tpl') );
} else {
$smarty->assign('header', $smarty->fetch($headthemurl.'sub_header.tpl') );
}
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch($footer_template) );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl'); 

?>