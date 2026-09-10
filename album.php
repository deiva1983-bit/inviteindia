<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
 //include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/
$smarty->assign('currentpage_js', 'album_galary');
$common_obj = new common();
/*----- Variables Declaration Start-----*/

/*----- Variables Declaration End-----*/

$id= '1';
$smarty->assign('glb_site_url', $glb_site_url); 					

 $chkqry= "SELECT photo_path, photo_name, photo_des FROM mrg_photos where photo_owner_id  ='".$id."' and photo_status ='1' ";
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
		//$smarty->assign('currentpage_js', 'sms_friends_acc');		
		$content_template = 'default/slides.tpl';			 
		$targetpage ='album.php?type=frmg';
		//$chkqry= "SELECT * FROM `tbl_sms_friends` where smsfrd_usrlog_id ='".$user_log_id."'  ";
		 
		$chkqrys= "SELECT photo_path, photo_name, photo_des FROM mrg_photos where photo_owner_id  ='".$id."' and photo_status ='1' LIMIT  $start ,$limit";

		//echo $chkqrys;
		$selectsms_friends_page= $userslog_obj->selectVal($chkqrys);
		$selectsms_friends= $userslog_obj->selectVal($chkqry);
		$total_records      = count($selectsms_friends);	 
		$smarty->assign('total_imgs', $selectsms_friends_page);	
		$pagination= $common_obj->Pagination($total_records,$limit,$targetpage,$page,$start,$varname);
		$smarty->assign('pagenation', $pagination);


 
$smarty->assign('image_gallary', $url);
 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
