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
$smarty->assign('currentpage_js', 'pack');
$wedid= trim($_REQUEST['wed_id']);
$wedown= trim($_REQUEST['wedown']); // Own page id

$smarty->assign('local_add', $local_add);

$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed)
{

}else
{
echo "Sorry, You cant access this page.";
exit;
}
if($current_action == 'kavied' and $wedown != ''){
	$butt_edit= trim($_REQUEST['butt_edit_ownpage']);
	$err = ''; $succ='';
	if($butt_edit == 'editit'){
		$pagetitle= trim($_REQUEST['page_title']);
		$linkname= trim($_REQUEST['link_name']);
		$content= trim($_REQUEST['txt_area_own_page']);
		$smarty->assign('own_pagetitle', $pagetitle);
		$smarty->assign('own_pagelink', $linkname);
		$smarty->assign('own_pagecontent', $content);
		$chkurlsts = $validator_obj->chkUrlsts($linkname, 'Your url.');
		if($linkname != ''){
		if(strlen($linkname) < 3){
			$err = '<li id=links_red>Please enter valid link name. Minimum Character is 3.</li>';
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

		$content = (strlen ($content) < 5) ? '' : $content ;
		if($content == '')
		{
		$err .= '<li id=links_red>Please enter your content.</li>';
		}
		if($err ==''){
		$upqry= "UPDATE `wed_ownpage` SET `pagetitle` = '".addslashes($pagetitle)."',`pagelink` = '".addslashes($linkname)."',`pagecontent` = '".addslashes($content)."' WHERE `wedown_autoid` ='".$wedown."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		$succ = '<li id="links_green">Your page is successfully updated.</li>';

		// update all links on master table
		$updatelinks_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
		$updatelinks= $userslog_obj->selectVal($updatelinks_qry);
			if (count($updatelinks)){
			$managelinks= '';
			foreach($updatelinks as $key=>$field)
					 {
					 $wedown_autoid= $field['wedown_autoid'];
					 $pagelink= trim($field['pagelink']);
					 $managelinks .= "<li>&nbsp;|&nbsp;<a href='%domainname%?page=$wedown_autoid'><b>$pagelink</b></a></li>";
					 }
			$managelinks = addslashes ($managelinks);
			$linkupqry = "UPDATE `mrg_url_status` SET `ownpage_links` = '$managelinks' WHERE `mrg_url_sts_auto_id` ='".$wedid."'  LIMIT 1 ";
			$userslog_obj->updateVal($linkupqry);
			}
		}
	}
	if($err ==''){
	$chkqry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and wedown_autoid = '".$wedown."' ";
	$selecttotpage= $userslog_obj->selectVal($chkqry);
 			if (count($selecttotpage)){
			$smarty->assign('own_pagetitle', $selecttotpage[0]['pagetitle'] );
			$smarty->assign('own_pagelink', $selecttotpage[0]['pagelink'] );
			$smarty->assign('own_pagecontent', $selecttotpage[0]['pagecontent'] );
			$smarty->assign('own_wedown_autoid', $selecttotpage[0]['wedown_autoid'] );
			}else{
			echo "Sorry"; exit;
			}
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
			$delqry="DELETE FROM `wed_ownpage`where wedid = '".$wedid."' and wedown_autoid = '".$wedown."' LIMIT 1";
			$userslog_obj->DeleteRec($delqry);
			$msg = "Deleted successfully.";

				// update all links on master table
		$updatelinks_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
		$updatelinks= $userslog_obj->selectVal($updatelinks_qry);
			if (count($updatelinks)){
			$managelinks= '';
			foreach($updatelinks as $key=>$field)
					 {
					 $wedown_autoid= $field['wedown_autoid'];
					 $pagelink= trim($field['pagelink']);
					 $managelinks .= "<li>&nbsp;|&nbsp;<a href='%domainname%?page=$wedown_autoid'><b>$pagelink</b></a></li>";
					 }
			$managelinks = addslashes ($managelinks);			
			}else{
			$managelinks='';
			}

			$linkupqry = "UPDATE `mrg_url_status` SET `ownpage_links` = '$managelinks' WHERE `mrg_url_sts_auto_id` ='".$wedid."'  LIMIT 1 ";
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
 			if (count($selecttotpage))
			{			
            $msgdetails="";$wed_pages='<ul>';
	 	foreach($selecttotpage as $key=>$field)
                     {
					 $wedown_autoid= $field['wedown_autoid'];
					 $pagetitle= trim($field['pagetitle']);
					 $pagelink= trim($field['pagelink']);					  
					 $displaytext = ($pagetitle != '') ? $pagetitle : $pagelink ;
					 $status= $field['status'];	
					 $editlink ="managepage.php?wed_id=$wedid&do=kavied&wedown=$wedown_autoid";
					 $dellink ="managepage.php?wed_id=$wedid&do=del&wedown=$wedown_autoid";
					 //$wed_pages.="<li><input type='radio' name='ownpage_list' value='$wedown_autoid' id='$wedown_autoid' class='ownpage_list'> <label for='$wedown_autoid'>$displaytext</label></li>";
					 $wed_pages.='<li><label style="color: #404141; width: 300px;">'.$displaytext.'</label><span><a href='.$editlink.'>Edit</a></span>&nbsp;|&nbsp;<span><a href='.$dellink.' onClick="return confirm(\'Are you sure want to delete ?\')">Delete</a></span></li>';
					 }
					 $wed_pages.='</ul>';
			}else{
			
			}
$smarty->assign('ownpagestatus', $ownpagestatus);
}
$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
		$selectwed_acces= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_acces))
		{		
		$smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
		}
$smarty->assign('ownpagestatus', $ownpagestatus );			
$smarty->assign('wed_pages', $wed_pages );
$smarty->assign('do_val', 'ownpage');
$smarty->assign('wed_acc_id', $wedid );



$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
