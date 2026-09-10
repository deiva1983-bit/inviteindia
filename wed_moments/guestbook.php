<?php
$gmap_status_js = 0;
$chkqry= "SELECT messages,name,date,giftid,guestloc FROM `wedding_msg` WHERE `wedding_id` =$master_id and msg_status=1 ORDER BY date DESC";
$selectsms_access= $userslog_obj->selectVal($chkqry);
if (count($selectsms_access)){
$msgdetails="";
foreach($selectsms_access as $key=>$field){
	$subjectname="";
	$cdate= $field['date'];
	$date =date('jS F, Y', strtotime("$cdate"));
	$mdate =date('jS M, Y', strtotime("$cdate"));
	//$msginfo =wordwrap($field['messages'], 80, '<br />', true);
	$msginfo =$field['messages'];
	$name =wordwrap($field['name'], 23, "<br />", true);
	$wedgift_items= "gift".$field['giftid'].".gif";
	$guestloc= $field['guestloc'];
	$gloc='';
	if($guestloc != "")
		$gloc='<tr valign="top"><td>&nbsp;</td><td>'.$guestloc.'</td></tr>';
	$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
	$bg_cls= ($key % 2) ? 'odd_div' : 'even_div';
	if($isMobile) {
	//$bg_color= ($key % 2) ? 'gainsboro' : 'lavender';
			$msgdetails.='<div id="blessing_div" class='.$bg_cls.'>
								<div class="col-md-12">
									<table><tr><td><img width="100" height="100" border="0" src='.$gifimg_urls.'></td>
										<td><table width="100%"><tbody><tr valign="top"><td colspan=2>&nbsp;</td></tr><tr valign="top">
					<td width="4%">&nbsp;</td><td width="100%" style="font-weight:bold;">'.$name.'</td></tr>'.$gloc.'<tr valign="top">
					<td>&nbsp;</td><td>'.$mdate.'</td></tr></tbody></table>
										</td></tr>
									</table>
								</div>
								<div class="col-md-12"><div style="width:100%;  margin-bottom:1px; overflow:hidden;">'.$msginfo.'</div></div>
			</div>';
	} else {
	$msgdetails.='<div id="blessing_div" class='.$bg_cls.'>
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
			
			<div style="width:57%;  margin-top:20px; overflow:hidden; padding:20px;" id="td_msg">
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
		$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
?>