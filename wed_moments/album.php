<?php
$classic_bg_image= ($classic_album_page != '0') ? $classic_album_page : $classic_all_page;
$album_status_js = 1;
$common_obj = new common();
$shownew =0;
$gmap_status_js = 0;
$chkqry= "SELECT photo_path, photo_name, photo_des, photo_auto_id FROM mrg_photos where photo_owner_id  ='".$master_id."' and photo_status ='1' ";
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
$smarty->assign('glb_master_id', $master_id);
$smarty->assign('glb_selectphoto_access', $selectphoto_access);
$smarty->assign('glb_commdetails', $commdetails);

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
$content_template = $theme_url.'album.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
?>