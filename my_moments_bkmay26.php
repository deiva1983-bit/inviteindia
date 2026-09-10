<?php 
include_once( 'includes/configs/init.php' ); 
 //include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/	 
		 $user_log_id_sess= trim($_SESSION['sess_user_id']);
		

         $page_status = $_REQUEST['status'];
         $smarty->assign('currentpage_js', 'wedhome');
			$smarty->assign('c_page_status', $page_status);
			$pagestring= $_SERVER["REQUEST_URI"];
          $page_url=trim(substr( $pagestring, 1 ));
          $pieces = explode("?", $page_url);
          $page_url = $pieces[0];		  

		  


         $chkqry= "SELECT murl.mrg_main_user_id, murl.mrg_url_sts_auto_id, murl.mrg_theme_id, mthm.mrg_theme_url, mthm.mrg_theme_sub_sts, mthm.mrg_theme_sub_url FROM mrg_url_status murl, mrg_mas_theme mthm WHERE murl.mrg_page_url ='$page_url' and murl.mrg_status = '1' and mthm.mrg_theme_auto_id = murl.mrg_theme_id and mthm.mrg_theme_status='1' ";
         $chk_page_access= $userslog_obj->selectVal($chkqry);        
		 if(!count($chk_page_access))
		{
		echo '<img src="'.$glb_site_url.'/images/404.jpg">';
		exit;
		}
         $master_user_id = $chk_page_access[0]['mrg_main_user_id'];
		 $theme_sub_sts = $chk_page_access[0]['mrg_theme_sub_sts'];         
         $mrg_theme_id = $chk_page_access[0]['mrg_theme_id'];
		 $mrg_theme_folder = 'theme_'.$mrg_theme_id;
	  // its sub theme
		$them_sub_url='';
		if ($theme_sub_sts == 1)
		{
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

         $homeimg = $chk_page_access[0]['home_img'];
		 $smarty->assign('glb_access_by_admin', $access_by_admin);
         $smarty->assign('glb_pageheading', $pageheading);
         $smarty->assign('glb_kural', $kural);
		if ($homeimg != "")		
			$smarty->assign('glb_homeimg', $glb_site_url.'/templates/default/mrg_template/home_images/'.$homeimg);
		else
		    $smarty->assign('glb_homeimg', $glb_site_url."/templates/default/mrg_template/$mrg_theme_folder/default_home.jpg");


         
         $smarty->assign('glb_male_name', $male_name);
         $smarty->assign('glb_female_name', $female_name);
         $wedding_name="<div class='wedding-names'>$male_name</div><div class='wedding-btn'>and</div><div class='wedding-names'>$female_name</div>";
         $des_brieff =eregi_replace("%replace_names%", "$wedding_name", $des_brieff);
         $smarty->assign('glb_des_brieff', $des_brieff);
         $smarty->assign('glb_page_url', $page_url);
         $smarty->assign('glb_master_id', $master_id);
		 $smarty->assign('glb_theme_owner_id', $master_user_id);
		 
		 $marriage_location = $chk_page_access[0]['marriage_location'];
		 $marriage_date = $chk_page_access[0]['marriage_date'];
		 $marriage_date =date('jS F, Y - h:i a', strtotime("$marriage_date"));
		 $glb_marriage_status = $chk_page_access[0]['marriage_status'];
         $glb_reception_status = $chk_page_access[0]['reception_status'];
         $reception_date = $chk_page_access[0]['reception_date'];
		 if($glb_marriage_status != 0)
			{
			$pagetitle= "Wedding Invitation: $male_name weds $female_name on $marriage_date";
			$rem_validation_date =date('Y-m-d', strtotime($chk_page_access[0]['marriage_date']));
		   
			}
		else
			{
			$pagetitle= "Reception Invitation: $male_name & $female_name Welcomes you";	
			$rem_validation_date =date('Y-m-d', strtotime("$reception_date"));
			}
		 $smarty->assign('pagetitle', $pagetitle);
		 $showalbum_tab= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
		 $showalbum_tab= $userslog_obj->selectVal($showalbum_tab);
		 $total_records_album_tab      = count($showalbum_tab);

         if($page_status==1)
         {           
            
            $reception_location = $chk_page_access[0]['reception_location'];            
			
			if($glb_reception_status)
			{
			$reception_date =date('jS F, Y - h:i a', strtotime("$reception_date"));
			}
            $smarty->assign('smt_marriage_location', $marriage_location);
            $smarty->assign('smt_marriage_status', $glb_marriage_status);
            $smarty->assign('smt_reception_status', $glb_reception_status);
            $smarty->assign('smt_reception_location', $reception_location);
            $smarty->assign('smt_reception_date', $reception_date);
            $smarty->assign('smt_marriage_date', trim($marriage_date));
            $content_template = $theme_url.'events.tpl';
         }
         else if($page_status==2)
         {
            $chkqry= "SELECT messages,name,date,giftid,guestloc FROM `wedding_msg` WHERE `wedding_id` =$master_id and msg_status=1 ORDER BY date DESC";
            $selectsms_access= $userslog_obj->selectVal($chkqry);
			if (count($selectsms_access))
			{
            $msgdetails="";
	 	foreach($selectsms_access as $key=>$field)
                     {
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
							
                     $gifimg_urls	= 	$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
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
				'.$msginfo.'				</div>
				</div>';
                     //$msgdetails.="<blockquote><p>Sed sodales nisl sit amet augue. Donec ultrices, augue ullamcorper posuere laoreet, turpis massa tristique justo, sed egestas metus magna sed purus.</p></blockquote>
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
				}
			}
				else if($page_status==4)
            {				

				$glb_marriage_status = $chk_page_access[0]['marriage_status'];
				$glb_map_lat = $chk_page_access[0]['gmap_latitude'];
				$glb_map_lat = ($glb_map_lat != "") ? $glb_map_lat : 0;
				$glb_map_lon = $chk_page_access[0]['gmap_longitude'];
				$glb_map_lon = ($glb_map_lon != "") ? $glb_map_lon : 0;
				$smarty->assign('js_map_lon', $glb_map_lon);
				$smarty->assign('js_map_lat', $glb_map_lat);

				$smarty->assign('glb_browser_name', $bname);
				$smarty->assign('glb_mrg_address', $marriage_location);
				$smarty->assign('glb_address_with_landmark', $address_with_landmark);
                $gmap_status_js = 1;
                $content_template = $theme_url.'gmap.tpl';
            }
		 else if($page_status==3)
		 {
		 $album_status_js = 1;
		 $common_obj = new common();
		

		$chkqry= "SELECT photo_path, photo_name, photo_des FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
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
		
		
		$smarty->assign('glb_commdetails', $commdetails);			 
		$content_template = $theme_url.'album.tpl';
		 }
		 else if($page_status==5)
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
			$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and ( kural_user_id = '0' or kural_user_id = '$master_user_id' ) and kural_auto_id < $glb_kural_auto_id ORDER BY kural_auto_id DESC	limit 1";
			$selectcomm= $userslog_obj->selectVal($chkqry);	
			$prevlink_style="";
			$prevlink_style= (count($selectcomm) == 1) ? "inline" : "none";	
			$smarty->assign('glb_prevlink_style', $prevlink_style);				
			
			
			$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and (desc_user_id = '0' or desc_user_id = '$master_user_id') and des_auto_id > $glb_desc_auto_id ORDER BY des_auto_id 	limit 1";
			 
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
		 $smarty->assign('glb_total_alb_records', $total_records_album_tab);
         $smarty->assign('album_status_js', $album_status_js);
         $smarty->assign('gmap_status_js', $gmap_status_js);
		 $smarty->assign('mrg_wed_auto_id', $wed_auto_id);
		 
//$top_urls =eregi_replace(" ", "-", $field['top_url']);
/*----- Include Files Details Start-----*/
	 
				
/*----- Assing Page titles-----*/
		 $smarty->assign('glb_show_wed_remainder', $show_wed_remainder);
         $smarty->assign('glb_wed_card_title_home', $wed_card_title_home);
         $smarty->assign('glb_wed_card_title_events', $wed_card_title_events);
         $smarty->assign('glb_wed_card_title_guestbook', $wed_card_title_guestbook);
         $smarty->assign('glb_wed_card_title_loc', $wed_card_title_loc);
         $smarty->assign('glb_wed_card_title_album', $wed_card_title_album);
		 $smarty->assign('glb_rem_validation_date', $rem_validation_date);
		 $smarty->assign('glb_rem_current_date', date("Y-m-d")); 
		 $smarty->assign('glb_tit_blessing', $tit_blessing);
		 $smarty->assign('glb_tit_add_bless', $tit_add_bless);
		 $smarty->assign('glb_tit_all_pg_bless', $all_pg_bless);
		$smarty->assign('glb_animate_reff_id', $animate_reff_id);
$headthemurl=$theme_url.$them_sub_url;
$smarty->assign('header', $smarty->fetch($headthemurl.'header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/mrg_template/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl'); 

?>

