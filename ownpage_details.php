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
$smarty->assign('local_add', $local_add);
$create_ownpage= trim($_REQUEST['butt_create_ownpage']);
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
$err ='';
$content_template = 'default/mrg_account/create_own_title.tpl';
if($page_allowed)
{
	$sub_tit_sts = trim($_REQUEST['hidd_sub_tit']);
	$add_title = trim($_REQUEST['add_title']);
	if($sub_tit_sts == 'insert_tit' && $add_title == 'insertnow'){
	$pagetitle = trim($_REQUEST['page_title']);
	$linkname = trim($_REQUEST['link_name']);
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
	$totlinks_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
		$totlinks= $userslog_obj->selectVal($totlinks_qry);
			if (count($totlinks) >= $max_ownpage_per_invitations){
			echo "Maximum $max_ownpage_per_invitations pages are allowed per invitations.";
			exit;
			}
			if($err == '')
			{
			$inqry= "INSERT INTO `wed_ownpage` (`wedown_autoid`, `wedid`, `pagetitle`, `pagelink`, `pagecontent`, `status`) VALUES (NULL, '".$wedid."', '".addslashes($pagetitle)."' , '".addslashes($linkname)."' , '', '1')";
			$order_list_id = $userslog_obj->insertVal($inqry);
						if($order_list_id){
						header("Location: ownpage.php?wed_id=$wedid&list_id=$order_list_id");
						exit;
						}
			}
	}
}else
{
echo "Sorry, You cant access this page.";
exit;
}
$smarty->assign('errors', $err);
$smarty->assign('tmplwedid', $wedid);
//Content for left nav 
$smarty->assign('do_val', 'ownpage');
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );

$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
