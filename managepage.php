<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$validator_obj = new Validator();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Free wedding website | Create Online wedding invitation";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$smarty->assign('currentpage_js', 'own_page');
$wedid= trim($_REQUEST['wed_id']);
$wedown= trim($_REQUEST['wedown']); // Own page id
$smarty->assign('ownpage_per_invitations', $max_ownpage_per_invitations);
$smarty->assign('local_add', $local_add);
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed)
{

}else
{
echo "Sorry, You cant access this page.";
exit;
}
$user_allowed=$common_obj->checkWedFree($user_log_id, $wedid);
if($user_allowed){
$smarty->assign('blockpage', 1 );
}
if($current_action == 'kavied' and $wedown != ''){
	$butt_edit= trim($_REQUEST['butt_edit_ownpage']);
	$err = ''; $succ='';
	if($butt_edit == 'upnow'){
		$pagetitle= trim($_REQUEST['page_title']);
		$linkname= trim($_REQUEST['link_name']);
		$chkurlsts = $validator_obj->chkUrlsts($linkname, 'Your url.');
		if($linkname != ''){
		if(strlen($linkname) < $max_ownpage_per_invitations){
			$err = "<li id=links_red>Please enter valid link name. Minimum Character is $max_ownpage_per_invitations.</li>";
			}
		else if(strlen($linkname) > 20){
			$err = '<li id=links_red>Please enter valid link name. Maximum Character is 20.</li>';
			}
		if($chkurlsts != ""){
		$err = "<li id=links_red>$chkurlsts</li>";
		}
		}else{
		$err = '<li id=links_red>Please enter link name.</li>';
		}
		if($err ==''){
		$upqry= "UPDATE `wed_ownpage` SET `pagetitle` = '".addslashes($pagetitle)."',`pagelink` = '".addslashes($linkname)."' WHERE `wedown_autoid` ='".$wedown."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		generate_url($wedid, $wedown);
		$succ = '<li id="links_green">Your page is successfully updated.</li>';
		}
	}
	$chkqry_sele= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and wedown_autoid = '".$wedown."' ";
	$selecttotpage_sele= $userslog_obj->selectVal($chkqry_sele);
 			if (count($selecttotpage_sele)){
			$smarty->assign('own_pagetitle', $selecttotpage_sele[0]['pagetitle'] );
			$smarty->assign('own_pagelink', $selecttotpage_sele[0]['pagelink'] );
			}else{
			echo "Sorry"; exit;
			}
	$smarty->assign('errors', $err);
	$smarty->assign('succ', $succ);
	$smarty->assign('wedid', $wedid);
	$smarty->assign('wed_acc_id', $wedid );
	$content_template = 'default/mrg_account/edit_own_page.tpl';
}else{

if($current_action == 'del' and $wedown != ''){
	$chkqry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and wedown_autoid = '".$wedown."' ";
	$selecttotpage= $userslog_obj->selectVal($chkqry);
 			if (count($selecttotpage)){
			// Delete Master table
			$delqry="DELETE FROM `wed_ownpage` where wedid = '".$wedid."' and wedown_autoid = '".$wedown."' LIMIT 1";
			$userslog_obj->DeleteRec($delqry);
			
			// Delete Sub table
			$chkqrysub= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wedid."' and wed_ownpage_id = '".$wedown."' and `parah_status` = 1";
			$selecttotsub= $userslog_obj->selectVal($chkqrysub);
			if (count($selecttotsub)){
			$delqrysub="DELETE FROM `wed_ownpage_parah` where master_wed_id = '".$wedid."' and wed_ownpage_id = '".$wedown."' and `parah_status` = 1 ";
			$userslog_obj->DeleteRec($delqrysub);
			}
			$msg = "Deleted successfully.";
			
			// update all links on master table

			// Generate Links
			$sele_mas_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
			$seleqry= $userslog_obj->selectVal($sele_mas_qry);
			$managelinks= ''; $ownlinks_classic = ''; $mob_ownlinks_classic = '';
			if (count($seleqry)){
				foreach($seleqry as $key=>$field){
					$wedown_autoid= $field['wedown_autoid'];
					$pagelink= trim($field['pagelink']);
					$wid= trim($field['wedid']);
						$sele_sub_qry= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wid."' and wed_ownpage_id = '".$wedown."' and `parah_status` = 1";
					$sub_qry= $userslog_obj->selectVal($sele_sub_qry);
					if (count($sub_qry)){
						$managelinks .= "<li>&nbsp;|&nbsp;<a href='%domainname%?page=$wedown_autoid' target='frame1'><b>$pagelink</b></a></li>";
						$ownlinks_classic .= "<li><a href='#ownpage_$wedown_autoid' class='link'>{$pagelink}</a></li>";
						$mob_ownlinks_classic .= "<li id='ownpageid'><a href='%domainname%?page=$wedown_autoid' id='ownpagelinkid'>$pagelink</a></li>";
					}
				}
				$managelinks = addslashes ($managelinks);
			}
			$linkupqry = "UPDATE `mrg_url_status` SET `ownpage_links` = '$managelinks', ownpage_links_classic = '$ownlinks_classic', ownpage_links_mobile ='$mob_ownlinks_classic' WHERE `mrg_url_sts_auto_id` ='".$wedid."'  LIMIT 1 ";
			$userslog_obj->updateVal($linkupqry);

			}else{
			echo "Sorry"; exit;
			}
}
$content_template = 'default/mrg_account/manage_own_page.tpl';

 $chkqry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."'"; 
 $ownpagestatus = 0;
 $selecttotpage= $userslog_obj->selectVal($chkqry);
 $ownpagestatus = count($selecttotpage); 
 			if (count($selecttotpage)){
			$msgdetails="";$wed_pages='<ul>';
	 		foreach($selecttotpage as $key=>$field){
					 $wedown_autoid= $field['wedown_autoid'];
					 $pagetitle= trim($field['pagetitle']);
					 $pagelink= trim($field['pagelink']);  
					 $displaytext = ($pagetitle != '') ? $pagetitle : $pagelink ;
					 $status= $field['status'];	
					 //$editlink ="managepage.php?wed_id=$wedid&do=kavied&wedown=$wedown_autoid";
					 //ownpage.php?wed_id=1810&list_id=22
					 $editlink ="ownpage.php?wed_id=$wedid&do=kavied&list_id=$wedown_autoid";
					 $dellink ="managepage.php?wed_id=$wedid&do=del&wedown=$wedown_autoid";
					 $edit_tit_link ="managepage.php?wed_id=$wedid&do=kavied&wedown=$wedown_autoid";
					 //$wed_pages.="<li><input type='radio' name='ownpage_list' value='$wedown_autoid' id='$wedown_autoid' class='ownpage_list'> <label for='$wedown_autoid'>$displaytext</label></li>";
					 $wed_pages.='<li><label style="color: #404141; width: 300px;">'.$displaytext.'</label><span><a href='.$editlink.'>Edit contents</a></span>&nbsp;|&nbsp;<span><a href='.$dellink.' onClick="return confirm(\'Are you sure want to delete ?\')">Delete</a></span>&nbsp;|&nbsp;<span><a href='.$edit_tit_link.'>Edit Title & Links</a></span></li>';
					 }
					 $wed_pages.='</ul>';
			}else{
			}
$smarty->assign('ownpagestatus', $ownpagestatus);
}
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_acces= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_acces)){
		$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
		}

function generate_url($wedid, $inviteid) {
	$userslog_obj = new userslog();
	//$sele_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
	//$sele_qry= "SELECT a.pagelink, a.wedown_autoid FROM `wed_ownpage` a, `wed_ownpage_parah` b where a.wedid = '".$wedid."' and a.wedown_autoid=b.wed_ownpage_id and a.`wedid` = b.master_wed_id and b.`parah_status` = 1";
	$sele_mas_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
	//echo $sele_mas_qry;
	$seleqry= $userslog_obj->selectVal($sele_mas_qry);
	if (count($seleqry)){
		$managelinks= ''; $ownlinks_classic = ''; $mob_ownlinks_classic = '';
		foreach($seleqry as $key=>$field){
		$wedown_autoid= $field['wedown_autoid'];
		$pagelink= trim($field['pagelink']);
		$wid= trim($field['wedid']);
			$sele_sub_qry= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wid."' and wed_ownpage_id = '".$wedown_autoid."' and `parah_status` = 1";
			//echo $sele_sub_qry;
			$sub_qry= $userslog_obj->selectVal($sele_sub_qry);
				if (count($sub_qry)){
					$managelinks .= "<li>&nbsp;|&nbsp;<a href='%domainname%?page=$wedown_autoid' target='frame1'><b>$pagelink</b></a></li>";
					$ownlinks_classic .= "<li><a href='#ownpage_$wedown_autoid' class='link'>{$pagelink}</a></li>";
					$mob_ownlinks_classic .= "<li id='ownpageid'><a href='%domainname%?page=$wedown_autoid' id='ownpagelinkid'>$pagelink</a></li>";
				}
		}
				$managelinks = addslashes ($managelinks);
				$ownlinks_classic = addslashes ($ownlinks_classic);
				$mob_ownlinks_classic = addslashes ($mob_ownlinks_classic);
				$linkupqry = "UPDATE `mrg_url_status` SET `ownpage_links` = '$managelinks', ownpage_links_classic = '$ownlinks_classic', ownpage_links_mobile ='$mob_ownlinks_classic' WHERE `mrg_url_sts_auto_id` ='".$wedid."'  LIMIT 1 ";
				$userslog_obj->updateVal($linkupqry);
	}
}

$smarty->assign('ownpagestatus', $ownpagestatus );
$smarty->assign('wed_pages', $wed_pages );
$smarty->assign('do_val', 'ownpage');
$smarty->assign('wed_acc_id', $wedid );
$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );

$smarty->assign('glb_albumstatus', $albumstatus); 

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
