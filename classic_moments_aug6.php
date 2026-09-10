<?php 
$theme_sub_sts = $chk_page_access[0]['mrg_theme_sub_sts'];
$mrg_theme_id = $chk_page_access[0]['mrg_theme_id'];
$mrg_theme_catid = $chk_page_access[0]['mrg_theme_catid'];
$ownpage_links= trim($chk_page_access[0]['ownpage_links']);
$links_classic= trim($chk_page_access[0]['ownpage_links_classic']);
$usrlog= trim($chk_page_access[0]['usrlog_plan']);
if($ownpage_links != '')
	$ownpage_links =eregi_replace("%domainname%", "$page_url", $ownpage_links);
$mrg_theme_folder = 'theme_'.$mrg_theme_id;
$smarty->assign('glb_usrlog', 1);
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
$des_brieff =eregi_replace("%replace_names%", "$wedding_name", $des_brieff);
$des_brieff =eregi_replace("%replacenames%", "$weddingname", $des_brieff);
$smarty->assign('glb_des_brieff', $des_brieff);
$smarty->assign('glb_page_url', $page_url);
$smarty->assign('glb_theme_owner_id', $master_user_id);
$marriage_location = $chk_page_access[0]['marriage_location'];
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
$counter_date =date('M d Y', strtotime("$marriage_date_only"));
$smarty->assign('glb_counter_date', $counter_date);
$smarty->assign('glb_marriage_date_title', $hm_marriage_date_title);
$glb_marriage_status = $chk_page_access[0]['marriage_status'];
$glb_reception_status = $chk_page_access[0]['reception_status'];
if($glb_marriage_status != 0){
	$pagetitle= "Wedding Invitation: $male_name weds $female_name on $marriage_date_title";
	}else{
	$pagetitle= "Reception Invitation: $male_name & $female_name Welcomes you";	
	}
$smarty->assign('pagetitle', $pagetitle);
$showalbum_tab= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
$showalbum_tab= $userslog_obj->selectVal($showalbum_tab);
$total_records_album_tab      = count($showalbum_tab);
//if(($page_status=='h' or $page_status=='' or $page_status=='6') and ($page_ownpage == '') ){
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
		//}
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
		$smarty->assign('links_classic', $links_classic);
		
		$shownew= 0;
		$smarty->assign('shownew_tpl', $shownew);
$headthemurl=$theme_url.$them_sub_url;
$footer_template='default/mrg_template/footer.tpl';
$footer_template= '';
// Event page details - start
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
	$classic_bg_image= ($classic_events_page != '0') ? $classic_events_page : $classic_all_page;
// Event page details - end
$msgtmp_newformat = ''; $msg_carousel = '';
// Signup blessing -Start
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
			$gloc='<tr valign="top"><td>&nbsp;</td><td><b>'.$guestloc.'</b></td></tr>';
		$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
		/*
		if ($isMobile) {
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
				<td>&nbsp;</td><td><b>'.$date.'</b></td></tr>
				</tbody></table>
				</div>
				
				<div style="float:left; margin-top:20px; overflow:hidden; padding-left:20px;">
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
				<td>&nbsp;</td><td><b>'.$date.'</b></td></tr>
				</tbody></table>
				</div>
				
				<div style="width:500px; float:left; margin-top:20px; overflow:hidden; padding-left:20px;">
				'.$msginfo.'</div>
				</div>';		
		}
		*/
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
		//$smarty->assign('msgdetails_tpl', $msgdetails);
		$smarty->assign('msgtmp_newformat_tpl', $msgtmp_newformat);
		$smarty->assign('msgtmp_carousel', $msg_carousel);
		//$content_template = $theme_url.'wishes.tpl';
		$default_signup = 1;
		} else {
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
					// Fetch English templates only
					// $qrymsgs= "SELECT msg_tmpl_msgs, msg_tmpl_autoid  FROM `tbl_msg_templates` WHERE msg_tmpl_status  ='1' and msg_tmpl_type = '1' and msg_tmpl_lang ='1' ORDER BY msg_tmpl_addeddate ASC";
				
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
				
				//$default_signup = 1;$content_template = $theme_url.'signup_blessings.tpl';
				$default_signup = 0;
				}
			$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
			$smarty->assign('tpl_default_signup', $default_signup);
// Signup blessing - end


// Signup blessing new - start
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
				$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
			// Signup blessing new - end

				// Google map - Find location start
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
				$classic_bg_image= ($classic_findloc_page != '0') ? $classic_findloc_page : $classic_all_page;
				// Google map - Find location end

				// Album start
					// Start
					$chkqry= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
						$selectphoto_access= $userslog_obj->selectVal($chkqry);
						$total_records      = count($selectphoto_access);
						$albuminfos=""; $albuminfosnew = '';
						if ($total_records) {			
						foreach($selectphoto_access as $key=>$field){
						$photopath =$field['photo_path'];
						$img_urls= $glb_site_url.'templates/albums/'.$master_id.'/'.trim($photopath);
						$albuminfos .= '<div class="galleria-image" style="overflow: hidden; position: relative; visibility: visible; width: 18px; height: 27px;"><img src='.$img_urls.' style="display: block; opacity: 1; min-width: 0px; min-height: 0px; max-width: none; max-height: none; transform: translate3d(0px, 0px, 0px); width: 18px; height: 27px; position: absolute; top: 0px; left: 0px;" width="18" height="27"></div>';

						$albuminfosnew .= '<li><a href="'.$img_urls.'"><img src="'.$img_urls.'" alt=""></a></li>';


						}
						}
					$smarty->assign('glb_master_id', $master_id);
					$smarty->assign('glb_albums', $albuminfos);
					$smarty->assign('albuminfosnew', $albuminfosnew);
					//End
				// Album End

		// Fetch custom page details - start
		$chkqry_own= "SELECT wedown_autoid, pagetitle FROM wed_ownpage WHERE wedid ='".$master_id."' and status='1' ";
		$selectown= $userslog_obj->selectVal($chkqry_own);
		$ownpageinfos="";
		foreach($selectown as $key=>$field)
			{
			$subjectname="";
			$pagetitle =wordwrap($field['pagetitle']);
			$autoid =$field['wedown_autoid'];
			$ownpageinfos .= "<div id='ownpage_{$autoid}' class='clearfix singlepagecontainer'  style='padding-top: 50px; padding-left: 20px; padding-right: 20px; min-height:448px;'>";
				if ($pagetitle != '') {
				$ownpageinfos .= '<h1  style="text-align: center;"><span id="pageheddings">'.$pagetitle.'</span></h1>';				
				}
			$ownpageinfos .= '<div class="group"><div class="people"><table>';
			// Fetch parah details on your own page.
			$findownpageQry="SELECT * FROM `wed_ownpage_parah` WHERE `master_wed_id` = '".$master_id."' and `wed_ownpage_id` = '".$autoid."' and `parah_status` = 1 ORDER BY `wed_parah_count_id` ASC";
			$findownpage= $userslog_obj->selectVal($findownpageQry);
				foreach($findownpage as $key=>$field) {
				$parah_title_status =$field['parah_title_status'];
				$parah_title =$field['parah_title'];
				$parah_image_align =$field['parah_image_align'];
				$parah_image_src =$field['parah_image_src'];
				$wed_parah_count_id =$field['wed_parah_count_id'];
				$parah_content =$field['parah_content'];
							$ownpageinfos .= '<tr><td style="width: 100%;">';
							if($parah_title_status == 1) {
							$ownpageinfos .= '<h4><span id="eventsubhead">';
								if($parah_title != '') {
								$ownpageinfos .= $parah_title;
								}
							$ownpageinfos .= '</span></h4>';
							} else {
							$ownpageinfos .= '<h2 class="title" style="margin: 1px;">&nbsp;</h2>';
							}
							$ownpageinfos .= '<div>';
							if($parah_image_align == '1') {
							$ownpageinfos .= '<span style="float:left; padding-right: 10px; padding-bottom: 10px;">';
							} else if($parah_image_align == '2') {
							$ownpageinfos .= '<span style="float:right;">';
							}

							if($parah_image_src != '') {
							$ownpageinfos .= '<img width="150px" height="100" border="0"  padding="10px" class="home_img" src="templates/default/mrg_template/ownpage_images/'.$master_id.'/'.$autoid.'/'.$parah_image_src.'">';
							} else {
								/* if($wed_parah_count_id == '1')
									$ownpageinfos .= '<img width="150px" height="100" border="0"  class="home_img" src="images/proposal_1.jpg">';
								else if($wed_parah_count_id == '2')
									$ownpageinfos .= '<img width="150px" height="100" border="0"  class="home_img" src="images/family_1.jpg">';
								else
									$ownpageinfos .= '<img width="150px" height="100" border="0"  class="home_img" src="images/lovehim.jpg">';
								*/
							}
							$ownpageinfos .= '</span><div style="font-size:12px; margin-top:2px;">'.$parah_content.'</div></div></td></tr>
							<tr><td>&nbsp;</td></tr>';

				}
				$ownpageinfos .= '</table></div></div></div>';
			}
			$smarty->assign('glb_ownpageinfos', $ownpageinfos);

if($page_status==6) {
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


		// Fetch custom page details - end
if($page_status=='' and $animate_cover != 0 and $page_ownpage == '')
		{
			$coverqry= "select wed_cover_adjust, wed_cover_map1, wed_cover_type from wed_covers_mas a, mrg_all_info b where b.mrg_url_status_auto_id = '$wed_auto_id' and b.wed_cover_id  = a.wed_cover_autoid ";
			$selecoverqry= $userslog_obj->selectVal($coverqry);
			$smarty->assign('wedcover_adjust', $selecoverqry[0]['wed_cover_adjust']);
			$smarty->assign('cover_map1', $selecoverqry[0]['wed_cover_map1']);
			$cover_type = $selecoverqry[0]['wed_cover_type'];
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

?>