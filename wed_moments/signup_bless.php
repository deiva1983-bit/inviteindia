<?php
//include_once( 'lang/lang_ta.php' );
// Comments section
$gmap_status_js = 0;
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
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
$shownew = 0;
$classic_bg_image= ($classic_gbook_page != '0') ? $classic_gbook_page : $classic_all_page;
?>