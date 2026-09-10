<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
//include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$current_action= trim($_REQUEST['do']);
$invite_type = trim($_REQUEST['type']);
if($invite_type == '')
$invite_type = 1;
$smarty->assign('glb_invite_type', $invite_type);
// Request comes for change the theme
$bind_url="&do=$current_action";
$smarty->assign('topnav_select', 'wedd');
// http://localhost/social/select_theme.php?wed_id=44&do=sel0myli For Edit
// http://localhost/social/select_theme.php?do=cre0myli For Create
$home_page_title = "Wedding website | Birthday website - inviteindia";
$home_page_meta_desc = "Create your website for your wedding, birthday celebrations - inviteindia";
$home_page_meta_key = "Wedding website themes, Birthday website themes, Wedding invitation templates, Birthday invitation templates, Online wedding invitation";
$user_log_id= trim($_SESSION['sess_user_id']);
$blocktheme = 0;
if($current_action=="sel0myli")
{
if($invite_type == 2) {
$b_id= trim($_REQUEST['b_id']);
$bind_url=$bind_url."&b_id=$b_id";
$edit_theme_link='<a href=birth-secure.php?b_id='.$b_id.'&do=b12d id='.$b_id.' class="edit_wed_frm_change_theme button1">Edit Birthday Card</a>';
} else {
$wed_id= trim($_REQUEST['wed_id']);
$bind_url=$bind_url."&wed_id=$wed_id";
$edit_theme_link='<a href=wedding-secure.php?wed_id='.$wed_id.'&do=b12d id='.$wed_id.' class="edit_wed_frm_change_theme button1">Edit Wedding Card</a>';
}
$submit_page="dboper.php?req=thmedt-$invite_type$bind_url";
$chkqry1= "SELECT mrg_theme_id FROM mrg_url_status where mrg_url_sts_auto_id =". $wed_id; 
$selectalbum_access1= $userslog_obj->selectVal($chkqry1);
$old_theme_id = $selectalbum_access1[0]['mrg_theme_id'];
$smarty->assign('old_theme_id', $old_theme_id);
$user_allowed=$common_obj->checkWedFree($user_log_id, $wed_id);
if($user_allowed){
$blocktheme = 1;
$smarty->assign('blockpage', 1 ); 
$smarty->assign('errors', $free_blocktheme ); 
}
}
elseif($current_action=="cre0myli")
{
$bind_url=$bind_url;
$submit_page="dboper.php?req=thmcrt-$invite_type$bind_url";
$edit_theme_link='';
}
elseif($current_action=="demOkavi")
{
$smarty->assign('topnav_select', 'themes');
$submit_page="dboper.php?req=thmcrt-$invite_type$bind_url";
$bind_url=$bind_url;
$edit_theme_link='';
}
else
{
echo "Sorry..";
exit;
}
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
	//$chkqry= "SELECT mrg_theme_name theme_name, mrg_theme_url theme_url FROM mrg_mas_theme where mrg_theme_status ='1' order by mrg_theme_show_status desc"; 
	$chkqry= "SELECT mrg_theme_demo_img demo_img, mrg_theme_name theme_name, mrg_theme_url theme_url, mrg_theme_auto_id theme_id, theme_demo_url demo_url  FROM mrg_mas_theme where mrg_theme_status ='1' and mrg_theme_catid = '0' and theme_type = '$invite_type' and mrg_theme_name != 'test' order by mrg_theme_show_status asc"; 
	$selectalbum_access= $userslog_obj->selectVal($chkqry);
	$total_records = count($selectalbum_access);
	if($total_records)
	{	$content_template = 'default/mrg_account/select_theme.tpl';
		$commdetails="";
		$intv=0;
		foreach($selectalbum_access as $key=>$field)
                     {
                     $themename="";
                     $themename =trim($field['theme_name']);
					 $modval = $intv%3;
                     $demoimg =trim($field['demo_img']);
					 $themeurl =trim($field['theme_url']);
					 $themeid =trim($field['theme_id']);
					 $demourl =trim($field['demo_url']);
					 $srcid = 'theme_'.$themeid;
					 if($modval == 3)
						$commdetails.="<tr>";
					$nav_links = "<div style='text-align:center;'><a href='$submit_page&theme_id=$themeid&might=net' style='color:#FFFFFF; '><b>Select me</b></a> | <a href='$demourl' target='_blank' style='color:#FFFFFF; '><b>Demo theme</b></a></div>";
					$dbtitle=$themename.'&nbsp;';
					$titletag = $dbtitle . "<span style=float:right;><a href=$submit_page&theme_id=$themeid&might=net style=color:#e50912;><b>Select me</b></a> | <a href=$demourl style=color:#e50912; target=_blank><b>Demo theme</b></a></span>";
					$commdetails.="<td class=normal>
					<div style='text-align:center;'><h4>$themename</h4></div>
					<div style='text-align:center;'>
					<a class='vlightbox1' href='templates/default/mrg_template/$themeurl/$demoimg' title='$titletag'><img alt='' src='templates/default/mrg_template/$themeurl/$demoimg'  style='width: 250px; height: 300px; background-color: white; padding: 5px;' id='$srcid' /></a>
					</div>
					$nav_links
					</td>";
					 $intv++;
					 if($modval == 2)
						$commdetails.="</tr>";
                     }  
					 
	}
	else
	{
	// Dont have any themes.
	}
// Classic Themes
	$chkqry= "SELECT mrg_theme_demo_img demo_img, mrg_theme_name theme_name, mrg_theme_url theme_url, mrg_theme_auto_id theme_id, theme_demo_url demo_url  FROM mrg_mas_theme where mrg_theme_status ='1' and mrg_theme_catid = '1' and theme_type = '$invite_type' order by mrg_theme_show_status asc"; 
	$selectalbum_access= $userslog_obj->selectVal($chkqry);
	$total_records      = count($selectalbum_access);
	if($total_records)
	{		$content_template = 'default/mrg_account/select_theme.tpl';	
		$classic_commdetails="";
		$intv=0;
		foreach($selectalbum_access as $key=>$field)
                     {
					 
                     $themename="";
                     $themename =trim($field['theme_name']);
					 $modval = $intv%3;
                     $demoimg =trim($field['demo_img']);
					 $themeurl =trim($field['theme_url']);
					 $themeid =trim($field['theme_id']);
					 $demourl =trim($field['demo_url']);
					 $srcid = 'theme_'.$themeid;
					 if($modval == 3)
						$classic_commdetails.="<tr>";
					if($themename != 'add') {
					if($blocktheme){
					$nav_links = "<div style='text-align:center;'><a href='$demourl' target='_blank' style='color:#FFFFFF; '><b>Demo theme</b></a></div>";
					$dbtitle=$themename.'&nbsp;';
					$titletag = $dbtitle . "<span style=float:right;><a href=$demourl style=color:#FFFFFF; target=_blank><b>Demo theme</b></a></span>";
					} else {
					$nav_links = "<div style='text-align:center;'><a href='$submit_page&theme_id=$themeid&might=net' style='color:#FFFFFF; '><b>Select me</b></a> | <a href='$demourl' target='_blank' style='color:#FFFFFF; '><b>Demo theme</b></a></div>";
					$dbtitle=$themename.'&nbsp;';
					$titletag = $dbtitle . "<span style=float:right;><a href=$submit_page&theme_id=$themeid&might=net style=color:#e50912;><b>Select me</b></a> | <a href=$demourl style=color:#e50912; target=_blank><b>Demo theme</b></a></span>";
					}
					if($invite_type == 2) {
					$classic_commdetails.="<td class=normal>
					<div style='text-align:center;'><h4>$themename</h4></div>
					<div style='text-align:center;'>
					<a class='vlightbox1' href='templates/default/birth_template/$themeurl/$demoimg' title='$titletag'><img alt='' src='templates/default/birth_template/$themeurl/$demoimg'  style='width: 250px; height: 300px; background-color: white; padding: 5px;' /></a>
					</div>
					$nav_links
					</td>";
					} else if ($invite_type == 1) {
					$classic_commdetails.="<td class=normal>
					<div style='text-align:center;'><h4>$themename</h4></div>
					<div style='text-align:center;'>
					<a class='vlightbox1' href='templates/default/mrg_template/$themeurl/$demoimg' title='$titletag'><img alt='' src='templates/default/mrg_template/$themeurl/$demoimg'  style='width: 250px; height: 300px; background-color: white; padding: 5px;' /></a>
					</div>
					$nav_links
					</td>";
					}
					} else {
					 //$classic_commdetails.="<td class=normal><div><iframe src='http://www.flipkart.com/affiliate/displayWidget?affrid=WRID-143644547074688200' frameborder=0 height=300 width=300></iframe><div></td>";
					 }
					 $intv++;
					 if($modval == 2)
						$classic_commdetails.="</tr>";
                     }  
					 
	}
	else
	{
	// Dont have any themes.
	}

$smarty->assign('commdetails', $commdetails); 
$smarty->assign('classic_commdetails', $classic_commdetails);
$smarty->assign('edit_theme_link', $edit_theme_link); 
$smarty->assign('glb_submit_page', $submit_page); 
$smarty->assign('glb_albumstatus', $albumstatus);
$smarty->assign('currentpage_js', 'theme_select');

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
